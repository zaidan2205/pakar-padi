<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use Carbon\Carbon;

class DiagnosisController extends Controller
{
   public function daftardiagnosa()
    {
        // Ambil semua diagnosa dari user yang sedang login, diurutkan dari yang terbaru
        $riwayatdiagnosa = Diagnosa::where('user_id', Auth::id())
                              ->orderBy('created_at', 'desc')
                              ->get();

        // Mengelompokkan hasil diagnosa berdasarkan tanggal dan waktu yang spesifik
        // Ini memastikan setiap tes yang berbeda akan menjadi grup terpisah
        $groupedDiagnosas = $riwayatdiagnosa->groupBy(function ($item) {
            $carbonDate = Carbon::parse($item->created_at);

            // Trik untuk membulatkan menit ke kelipatan 3 terdekat
            $roundedMinute = floor($carbonDate->minute / 3) * 3;

            // Atur menit ke nilai yang sudah dibulatkan
            $carbonDate->minute($roundedMinute);
            $carbonDate->second(0);

            // Gunakan format tahun-bulan-hari jam:menit sebagai kunci grouping
            return $carbonDate->isoFormat('dddd, D MMMM YYYY | H:m');
        });

        // Kirim data yang sudah dikelompokkan ke view
        return view('diagnosis', ['groupedDiagnosas' => $groupedDiagnosas]);
    }

    /**
     * Menampilkan detail dari satu hasil diagnosa
     */
    public function detailPenyakit(Penyakit $penyakit)
    {
        $gejalas = $penyakit->gejalas()->get();
        return view('deskripsipenyakit', compact('penyakit', 'gejalas'));
    }

    public function showHasil()
    {
        // Mendapatkan ID user yang sedang login
        $user_id = Auth::id();

        // Ambil hasil diagnosa yang sudah dihitung (paling baru)
        $diagnosa_terbaru = Diagnosa::where('user_id', $user_id)
                                    ->with('penyakit')
                                    ->orderBy('created_at', 'desc')
                                    ->first();

        // Jika tidak ada hasil diagnosa, kembali ke halaman utama
        if (!$diagnosa_terbaru) {
            return redirect()->route('home')->with('error', 'Belum ada hasil diagnosa.');
        }

        return view('hasil-diagnosa', compact('diagnosa_terbaru'));
    }
}

    
/** Hitung CF di controller formulir sekarang
*  public function hitung()
*   {
*       // Ambil semua diagnosa yang belum dihitung, sekaligus load data relasinya
*        // Ini lebih efisien karena hanya butuh 1-2 query database
*        $diagnosasYangBelumDihitung = Diagnosa::with('penyakit.gejalas', 'gejalas')->whereNull('persentase')->get();
*
*        foreach ($diagnosasYangBelumDihitung as $diagnosa) {
*            
*            // 1. Tahap CFpakaruser
*            // Menyimpan hasil perkalian nilai user dan pakar
*            $cfPakarUserList = [];
*
*            $gejalasInputUser = $diagnosa->gejalas;
*            $gejalasNilaiPakar = $diagnosa->penyakit->gejalas;
*
*            foreach ($gejalasInputUser as $gejalaUser) {
*                $gejalaPakar = $gejalasNilaiPakar->where('id', $gejalaUser->id)->first();
*                
*                if ($gejalaPakar) {
*                    $nilaiUser = $gejalaUser->pivot->nilai_user;
*                    $nilaiPakar = $gejalaPakar->pivot->nilai_pakar;
*                    
*                    // Rumus CFpakaruser: nilai_user x nilai_pakar
*                    $cfPakarUser = $nilaiUser * $nilaiPakar;
*                    $cfPakarUserList[] = $cfPakarUser;
*                }
*            }
*
*            // 2. Tahap CFkombinasi
*            $cfKombinasiAkhir = 0;
*            
*            // Pastikan ada data untuk dihitung
*            if (count($cfPakarUserList) > 0) {
*                // Inisialisasi CFkombinasi dengan hasil CFpakaruser pertama
*                $cfKombinasi = $cfPakarUserList[0];
*                
*                // Lakukan perulangan mulai dari hasil CFpakaruser kedua
*                for ($i = 1; $i < count($cfPakarUserList); $i++) {
*                    $cfPakarUserBerikutnya = $cfPakarUserList[$i];
*                    
*                    // Rumus CFkombinasi: CFkombinasi_sebelumnya + CFpakaruser_berikutnya * (1 - CFkombinasi_sebelumnya)
*                    $cfKombinasi = $cfKombinasi + $cfPakarUserBerikutnya * (1 - $cfKombinasi);
*                }
*                
*                $cfKombinasiAkhir = $cfKombinasi;
*            }
*
*            // 3. Tahap CFpersentase
*            // Rumus CFpersentase: CFkombinasi_akhir x 100%
*            $persentaseAkhir = $cfKombinasiAkhir * 100;
*            
*            $diagnosa->persentase = $persentaseAkhir;
*            $diagnosa->save();
*        }
*
*        return 'Semua diagnosa yang belum dihitung sudah selesai diproses!';
*    }
*/
    





/** Dah diganti pakai fungsi hitung yang baru dan benar
*    public function hitung()
 *   {
  *      // Mengambil semua diagnosa yang persentasenya masih null
*        $diagnosasYangBelumDihitung = Diagnosa::whereNull('persentase')->get();
*
*        foreach ($diagnosasYangBelumDihitung as $diagnosa) {
*       
*         $totalNilai = 0;
*         $jumlahGejala = 0;
*
*        // Ambil gejala yang diinput user (dari tabel `nilai_users`)
*        $gejalasInputUser = $diagnosa->gejalas()->get();
*        // Ambil gejala dan nilai pakarnya (dari tabel `nilai_pakars`)
*        $gejalasNilaiPakar = $diagnosa->penyakit->gejalas()->get();
*
*        foreach ($gejalasInputUser as $gejalaUser) {
*            $gejalaPakar = $gejalasNilaiPakar->where('id', $gejalaUser->id)->first();
*            
*            if ($gejalaPakar) {
*                $nilaiUser = $gejalaUser->pivot->nilai_user;
*                $nilaiPakar = $gejalaPakar->pivot->nilai_pakar;
*                
*                $totalNilai += ($nilaiUser + $nilaiPakar);
*                $jumlahGejala++;
*            }
*        }
*        
*        $persentasess = $jumlahGejala > 0 ? $totalNilai : 0;
*        
*        $diagnosa->persentase = $persentasess;
*        $diagnosa->save();
*    }
*
*    return 'Semua diagnosa yang belum dihitung sudah selesai diproses!';
*}
*/

