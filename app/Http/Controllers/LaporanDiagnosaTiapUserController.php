<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Collection; // Tambahkan ini jika menggunakan IDE helper

class LaporanDiagnosaTiapUserController extends Controller
{
    /**
     * Menampilkan laporan rata-rata persentase penyakit per bulan dan jumlah user unik.
     */
    public function showMonthlyReport()
    {
        // Pastikan locale Carbon diatur ke Bahasa Indonesia untuk format tanggal yang benar
        Carbon::setLocale('id');

        // Ambil data diagnosa yang bukan diagnosa sementara (persentase > 0)
        $diagnosas = Diagnosa::where('persentase', '>', 0)
                            ->with('penyakit')
                            ->get();

        if ($diagnosas->isEmpty()) {
            return view('admin.laporan', [ 
                'rata_rata_per_bulan' => collect(),
                'jumlah_user_per_bulan' => collect()
            ]);
        }

        $dataByMonth = $diagnosas->groupBy(function ($item) {
            // Format bulan (contoh: Januari 2024)
            return $item->created_at->translatedFormat('F Y');
        });

        $rataRataPerBulan = collect();
        $jumlahUserPerBulan = collect();

        foreach ($dataByMonth as $bulanTahun => $diagnosasDiBulan) {
            // Group by Penyakit ID dan hitung rata-rata persentase
            $rataRataPenyakit = $diagnosasDiBulan->groupBy('penyakit_id')->map(function ($items) {
                return [
                    'nama_penyakit' => $items->first()->penyakit->nama_penyakit,
                    'rata_rata_persentase' => round($items->avg('persentase'), 2), // Bulatkan persentase
                ];
            });

            // Hitung jumlah user unik yang melakukan diagnosa di bulan ini
            $jumlahUser = $diagnosasDiBulan->pluck('user_id')->unique()->count();
            
            $rataRataPerBulan->put($bulanTahun, $rataRataPenyakit->values());
            $jumlahUserPerBulan->put($bulanTahun, $jumlahUser);
        }

        return view('laporan', [ 
            'rata_rata_per_bulan' => $rataRataPerBulan,
            'jumlah_user_per_bulan' => $jumlahUserPerBulan
        ]);
    }
    
    /**
     * Menampilkan daftar user yang melakukan diagnosa di bulan tertentu (sudah dioptimasi).
     */
    public function showUserList(Request $request)
    {
        Carbon::setLocale('id');
        $bulanTahun = $request->query('bulan'); // Format: F Y (cth: Januari 2024)
        
        if (!$bulanTahun) {
            return redirect()->back()->with('error', 'Parameter bulan tidak valid.');
        }

        // Parse bulan dan tahun
        try {
            $date = Carbon::createFromFormat('F Y', $bulanTahun);
        } catch (\Exception $e) {
             return redirect()->back()->with('error', 'Format bulan tidak dikenali.');
        }

        $startOfMonth = $date->copy()->startOfMonth();
        $endOfMonth = $date->copy()->endOfMonth(); 

        // 1. Ambil ID user unik yang melakukan diagnosa di bulan tersebut
        $userIds = Diagnosa::where('persentase', '>', 0)
                            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
                            ->pluck('user_id')
                            ->unique();
                            
        // 2. Ambil data user
        $users = User::whereIn('id', $userIds)
                      ->select('id', 'name', 'kecamatan', 'desa') 
                      ->get();

        // 3. OPTIMASI N+1: Ambil semua tanggal diagnosa terakhir (latest) untuk user-user ini dalam 1 query
        // Dengan cara ini, kita menghindari query DB di dalam loop.
        $latestDiagnosaTimes = Diagnosa::whereIn('user_id', $userIds)
            ->where('persentase', '>', 0)
            ->whereBetween('created_at', [$startOfMonth, $endOfMonth])
            ->orderBy('created_at', 'desc')
            ->get()
            // Kelompokkan berdasarkan user_id dan ambil data yang paling atas (terbaru)
            ->groupBy('user_id')
            ->map(function (Collection $diagnoses) {
                return $diagnoses->first()->created_at;
            });
            
        // 4. Map data latest time ke object user
        foreach ($users as $user) {
            $latestTime = $latestDiagnosaTimes->get($user->id);

            $user->tanggal_diagnosa_terakhir = $latestTime;
            $user->tanggal_diagnosa_format = $latestTime ? $latestTime->translatedFormat('d F Y (H:i)') : 'N/A';
        }

        return view('admin.daftarlaporandiagnosauser', [
            'users' => $users,
            'bulan_laporan' => $bulanTahun,
        ]);
    }

    /**
     * Menampilkan detail hasil diagnosa user pada tanggal dan jam tertentu.
     */
    public function showUserDiagnosisDetail($user_id, Request $request)
    {
        $tanggalWaktu = $request->query('waktu'); 
        
        if (!$tanggalWaktu) {
            return redirect()->back()->with('error', 'Parameter waktu tidak valid.');
        }

        Carbon::setLocale('id');
        
        // Catatan: Jika format tanggal tidak sesuai, createFromFormat akan gagal.
        try {
            $date = Carbon::createFromFormat('d F Y (H:i)', $tanggalWaktu);
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Format tanggal dan waktu diagnosa tidak valid.');
        }

        // Pencarian dengan rentang waktu 1 menit (±30 detik) ini adalah workaround yang bagus 
        // untuk memastikan diagnosa ditemukan meskipun ada perbedaan milidetik di database.
        $diagnosas = Diagnosa::where('user_id', $user_id)
                            ->where('persentase', '>', 0)
                            ->whereBetween('created_at', [$date->copy()->subMinutes(1), $date->copy()->addMinutes(1)]) 
                            ->with('penyakit')
                            ->orderByDesc('persentase')
                            ->get();
                            
        if ($diagnosas->isEmpty()) {
            return redirect()->back()->with('error', 'Detail diagnosa tidak ditemukan.');
        }
                            
        $user = User::findOrFail($user_id);
        
        return view('admin.detail-diagnosa-user', [
            'user' => $user,
            'diagnosas' => $diagnosas,
            'tanggal_diagnosa' => $tanggalWaktu,
        ]);
    }
}
