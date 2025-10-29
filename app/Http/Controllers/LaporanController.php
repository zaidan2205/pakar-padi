<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\User;
use App\Models\Penyakit; // Tambahkan import ini
use Carbon\Carbon;
use Illuminate\Support\Collection;

class LaporanController extends Controller // Nama class diganti jadi LaporanController
{
    /**
     * Menampilkan laporan rata-rata persentase penyakit per bulan dan jumlah user unik,
     * difilter berdasarkan Nama Kecamatan (sesuai data di tabel users).
     */
    public function index(Request $request)
    {
        // --- 1. SETUP FILTER KECAMATAN ---
        $selectedKecamatanId = $request->query('kecamatan'); 

        // Daftar opsi kecamatan (Kunci: ID untuk URL, Nilai: Nama ASLI di DB)
        $kecamatanOptions = [
            '1' => 'Ajibarang',
            '2' => 'Banyumas',
            '3' => 'Kecamatan Abadi',
            '4' => 'Kecamatan Tenteram',
            // Pastikan ID dan Nama ini sesuai dengan data uji lo
        ];

        // --- 2. QUERY DATA DIAGNOSA DENGAN FILTER ---
        $diagnosasQuery = Diagnosa::with('penyakit', 'user'); 

        // Inisialisasi variabel untuk nama kecamatan yang akan digunakan di query
        $kecamatanNama = null;

        // Cek jika ada filter kecamatan yang dipilih DAN ID-nya valid di options
        if ($selectedKecamatanId && array_key_exists($selectedKecamatanId, $kecamatanOptions)) {
            // *** PERBAIKAN KRUSIAL DI SINI ***
            // Ambil Nama Kecamatan dari array options
            $kecamatanNama = $kecamatanOptions[$selectedKecamatanId];
            
            // Lakukan filter menggunakan NAMA KECAMATAN
            $diagnosasQuery->whereHas('user', function ($query) use ($kecamatanNama) {
                // Sekarang kita mencari kecamatannya berdasarkan STRING NAMA, bukan ID.
                $query->where('kecamatan', $kecamatanNama);
            });
        }
        
        $diagnosas = $diagnosasQuery->get();

        // --- DEBUGGING OPSIONAL ---
        // Uncomment baris di bawah ini dan refresh halaman dengan filter untuk melihat hasil query
        /*
        if ($selectedKecamatanId) {
            if ($diagnosas->isEmpty()) {
                dd("Gagal menampilkan data. Filter: '{$kecamatanNama}'. Hasil: Kosong. Cek data di tabel 'users'!");
            } else {
                dd("Sukses! Menampilkan " . $diagnosas->count() . " data. Data user pertama: ", $diagnosas->first()->user->kecamatan);
            }
        }
        */
        // --- END DEBUGGING ---


        if ($diagnosas->isEmpty()) {
            return view('laporan', [
                'rata_rata_per_bulan' => collect(), 
                'jumlah_user_per_bulan' => collect(),
                'kecamatan_options' => $kecamatanOptions,
                'selected_kecamatan' => $selectedKecamatanId,
            ]);
        }
        
        // --- 3. PROSES PENGHITUNGAN RATA-RATA (Sama seperti sebelumnya) ---
        
        $groupedByMonth = $diagnosas->groupBy(function($item) {
            return Carbon::parse($item->created_at)->translatedFormat('F Y');
        });

        $rata_rata_per_bulan = $groupedByMonth->map(function ($groupPerBulan) {
            $rataRataPerPenyakit = $groupPerBulan->groupBy('penyakit_id')->map(function ($groupPerPenyakit) {
                return [
                    'nama_penyakit' => $groupPerPenyakit->first()->penyakit->nama_penyakit,
                    'rata_rata_persentase' => $groupPerPenyakit->avg('persentase'),
                ];
            });

            return $rataRataPerPenyakit->filter(function ($item) {
                return $item['rata_rata_persentase'] > 0; 
            });
        });
        
        $jumlah_user_per_bulan = $groupedByMonth->map(function ($groupPerBulan) {
            return $groupPerBulan->unique('user_id')->count();
        });


        return view('laporan', [
            'rata_rata_per_bulan' => $rata_rata_per_bulan->sortByDesc(function ($value, $key) {
                return Carbon::parse($key)->timestamp;
            }), 
            'jumlah_user_per_bulan' => $jumlah_user_per_bulan,
            'kecamatan_options' => $kecamatanOptions,
            'selected_kecamatan' => $selectedKecamatanId,
        ]);
    }
    
    /**
     * Metode index2() untuk laporan detail per user. (FOKUS)
     * PASTI HANYA memproses data yang ada di tabel 'diagnosa'.
     *
     * @return \Illuminate\View\View
     */
    public function index2()
    {
        Carbon::setLocale('id');

        // Mengambil semua data diagnosa yang ada, termasuk relasi user dan penyakit
        $diagnosas = Diagnosa::with(['user', 'penyakit'])->get();
        
        if ($diagnosas->isEmpty()) {
            return view('laporan_user', [ 
                'data_laporan_per_bulan' => collect() 
            ]);
        }
        
        // 1. Kelompokkan berdasarkan Bulan (Tahun-Bulan).
        $groupedByMonthKey = $diagnosas->groupBy(function($item) {
            return Carbon::parse($item->created_at)->format('Y-m'); 
        });

        $data_laporan_per_bulan = $groupedByMonthKey->map(function ($groupPerBulan, $bulanKey) {
            
            // 2. Dalam satu Bulan, kelompokkan berdasarkan User
            $groupedByUser = $groupPerBulan->groupBy('user_id');

            $uniqueUsersData = $groupedByUser->map(function ($diagnosesPerUser, $userId) {
                $firstDiagnosa = $diagnosesPerUser->first(); 
                
                // FILTER: Hapus semua diagnosa yang persentasenya kurang dari atau sama dengan 0
                $filteredDiagnosesPerUser = $diagnosesPerUser->filter(function ($diagnosa) {
                    return is_numeric($diagnosa->persentase) && $diagnosa->persentase > 0;
                });
                
                // Jika setelah difilter, datanya kosong, user ini diabaikan (return null)
                if ($filteredDiagnosesPerUser->isEmpty()) {
                    return null;
                }

                // 3. Logika Grup Sesi 3 Menit
                
                // Pastikan data diurutkan berdasarkan waktu pembuatan (terlama ke terbaru)
                $sortedByTime = $filteredDiagnosesPerUser->sortBy('created_at');

                $sessions = collect();
                $currentSession = collect();
                $lastTimestamp = null;
                
                // ITERASI untuk membuat Sesi (jeda > 3 menit = Sesi baru). Sesi di sini masih urut lama ke baru.
                foreach ($sortedByTime as $diagnosa) {
                    $currentTimestamp = Carbon::parse($diagnosa->created_at);

                    // Pengecekan Sesi: Jika ini bukan data pertama DAN jeda >= 3 menit
                    if ($lastTimestamp !== null && $currentTimestamp->diffInMinutes($lastTimestamp) >= 3) {
                        // Jeda 3 menit atau lebih: Sesi baru dimulai
                        if ($currentSession->isNotEmpty()) {
                            $sessions->push($currentSession);
                        }
                        $currentSession = collect([$diagnosa]); // Mulai Sesi baru
                    } else {
                        // Lanjut Sesi yang sama
                        $currentSession->push($diagnosa);
                    }
                    $lastTimestamp = $currentTimestamp;
                }

                // Dorong Sesi terakhir setelah loop selesai
                if ($currentSession->isNotEmpty()) {
                    $sessions->push($currentSession);
                }

                // Balik urutan sesi (Terbaru ke Terlama)
                $sessions = $sessions->reverse()->values();

                // 4. URUTKAN setiap Sesi berdasarkan Persentase (DESC) dan Rata menjadi satu List
                $finalDiagnosesList = collect();
                $sessionIndex = 0; // <-- Inisialisasi index untuk melacak sesi
                
                // Karena sessions sudah dibalik (newest first), maka final list akan menampilkan sesi terbaru duluan
                $sessions->each(function ($session) use (&$finalDiagnosesList, &$sessionIndex) {
                    
                    // Map data ke format yang dibutuhkan View, sambil menyimpan persentase mentah untuk sorting
                    $mappedSession = $session->map(function ($diagnosa) {
                        $persentase = $diagnosa->persentase;
                        
                        return [
                            'diagnosa_id' => $diagnosa->id,
                            'penyakit' => optional($diagnosa->penyakit)->nama_penyakit ?? 'Tidak Terdeteksi', 
                            'persentase' => number_format($persentase, 2), 
                            'persentase_raw' => floatval($persentase), // Digunakan untuk sorting
                            'tanggal_tes' => Carbon::parse($diagnosa->created_at)->translatedFormat('d F Y | H:i'),
                        ];
                    });
                    
                    // Urutkan Sesi saat ini berdasarkan Persentase Mentah (DESC)
                    $sortedSession = $mappedSession->sortByDesc('persentase_raw')->values();

                    // === LOGIC BARU: Tambahkan Flag Pemisah Sesi ===
                    // Hanya tambahkan pemisah untuk Sesi ke-2, ke-3, dst.
                    if ($sessionIndex > 0) {
                        // Ambil item pertama
                        $firstItem = $sortedSession->first();
                        
                        // Cek kalau itemnya ada, lalu tambahkan flag
                        if ($firstItem) {
                            $firstItem['is_session_separator'] = true;
                            // Ganti item pertama dengan versi yang sudah dimodifikasi di Collection
                            $sortedSession->splice(0, 1, [$firstItem]); 
                        }
                    }
                    // =============================================

                    // Gabungkan Sesi yang sudah terurut ke List Akhir
                    $finalDiagnosesList = $finalDiagnosesList->merge($sortedSession);
                    
                    $sessionIndex++; // <-- Naikkan index
                });

                // Bersihkan key temporer ('persentase_raw') sebelum dikirim ke View
                $diagnosesList = $finalDiagnosesList->map(function($item) {
                    unset($item['persentase_raw']);
                    return $item;
                })->values(); 
                
                
                return [
                    'user_id' => $userId,
                    'name' => optional($firstDiagnosa->user)->name ?? 'User Tidak Dikenal',
                    'email' => optional($firstDiagnosa->user)->email ?? 'N/A',
                    'kecamatan' => optional($firstDiagnosa->user)->kecamatan ?? 'N/A',
                    'desa' => optional($firstDiagnosa->user)->desa ?? 'N/A',
                    'alamat' => optional($firstDiagnosa->user)->alamat ?? 'Alamat Tidak Tersedia',
                    'total_tes' => $diagnosesList->count(), 
                    'diagnoses' => $diagnosesList, 
                ];
            })
            // Hapus user yang return null dari map di atas
            ->filter()
            ->values();
            
            
            return [
                'bulan_display' => Carbon::createFromFormat('Y-m', $bulanKey)->translatedFormat('F Y'),
                'bulan_key' => $bulanKey,
                'jumlah_user_unik' => $uniqueUsersData->count(),
                'unique_users' => $uniqueUsersData, 
            ];
        });

        // Urutkan Bulan dari yang terbaru (Tahun-Bulan terbaru di atas)
        $data_laporan_sorted = $data_laporan_per_bulan->sortByDesc(function ($item) {
            return Carbon::createFromFormat('Y-m', $item['bulan_key'])->timestamp;
        });

        return view('laporan_user', [
            'data_laporan_per_bulan' => $data_laporan_sorted
        ]);
    }
}