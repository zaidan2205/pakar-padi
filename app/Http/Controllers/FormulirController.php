<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Gejala;
use App\Models\Penyakit;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class FormulirController extends Controller
{
    // Kelompokkan ID gejala per halaman
    private $groups = [
        1 => [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21], // Halaman 1
        2 => [22, 23, 24, 25, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, 52, 53, 54, 55, 56, 57, 58, 59], // Halaman 2
        3 => [60, 61, 62, 63, 64, 65, 66, 67, 68, 69, 70, 71, 72, 73, 74, 75, 76, 77, 78, 79, 80, 81, 82, 83, 84, 85, 86, 87, 88, 89, 90, 91, 92], // Halaman 3
        4 => [93, 94, 95, 96, 97, 98, 99, 100, 101, 102, 103, 104, 105, 106], // Halaman 4
        5 => [107, 108, 109, 110, 111, 112, 113, 114, 115, 116, 117, 118, 119, 120, 121, 122, 123, 124, 125, 126, 127, 128, 129, 130, 131, 132, 133, 134, 135, 136, 137, 138, 139, 140, 141], // Halaman 5
        6 => [142, 143, 144, 145, 146, 147, 148, 149, 150, 151, 152], // Halaman 6
        7 => [153, 154, 155, 156, 157, 158, 159, 160, 161, 162, 163, 164, 165, 166, 167, 168, 169, 170, 171, 172], // Halaman 7
        8 => [173, 174, 175, 176, 177, 178, 179, 180], // Halaman 8
        9 => [181, 182, 183, 184, 185] // Halaman 9
    ];

    /**
     * Display a list of gejala for the form grouped by page.
     */
    public function show($halaman)
    {
        $gejala_ids = $this->groups[$halaman] ?? [];
        
        if (empty($gejala_ids)) {
            return redirect()->route('home');
        }

        $gejalas = Gejala::whereIn('id', $gejala_ids)->get();
        $total_halaman = count($this->groups);

        // Buat ID diagnosa sementara baru jika ini adalah halaman pertama
        if ($halaman == 1) {
            $diagnosaSementara = Diagnosa::create([
                'user_id' => Auth::id(), 
                'penyakit_id' => Penyakit::first()->id, 
                'persentase' => 0
            ]);
            Session::put('temp_diagnosa_id', $diagnosaSementara->id);
        }

        return view('formulir', compact('gejalas', 'halaman', 'total_halaman'));
    }

    /**
     * Store the user's answers and calculate the diagnosis result.
     */
    public function store(Request $request, $halaman)
    {
        $user_id = Auth::id();
        $halaman_berikutnya = $halaman + 1;
        $total_halaman = count($this->groups);
        
        // Ambil ID diagnosa sementara dari session
        $temp_diagnosa_id = Session::get('temp_diagnosa_id');
        if (!$temp_diagnosa_id) {
            return redirect()->route('formulir.show', ['halaman' => 1])->with('error', 'Sesi diagnosa tidak ditemukan. Silakan mulai kembali.');
        }

        $gejala_ids_halaman_ini = $this->groups[$halaman];
        $jawaban_input = $request->input('jawaban', []);
        
        foreach ($gejala_ids_halaman_ini as $gejala_id) {
            // Ambil nilai dari input, jika tidak ada, default ke 0
            $nilai = (float)($jawaban_input[$gejala_id] ?? 0);
            
            DB::table('nilai_users')->updateOrInsert(
                [
                    'diagnosa_id' => $temp_diagnosa_id,
                    'gejala_id' => $gejala_id,
                ],
                [
                    'user_id' => $user_id,
                    'nilai_user' => $nilai,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]
            );
        }

        if ($halaman == $total_halaman) {
            
            // Dapatkan semua jawaban dari diagnosa sementara
            $allUserAnswers = DB::table('nilai_users')
                               ->where('diagnosa_id', $temp_diagnosa_id)
                               ->get();
            
            $penyakits = Penyakit::all();

            foreach ($penyakits as $penyakit) {
                // Buat diagnosa baru untuk setiap penyakit
                $diagnosaFinal = Diagnosa::create([
                    'user_id' => $user_id,
                    'penyakit_id' => $penyakit->id,
                ]);

                foreach ($allUserAnswers as $answer) {
                    DB::table('nilai_users')->insert([
                        'diagnosa_id' => $diagnosaFinal->id,
                        'gejala_id' => $answer->gejala_id,
                        'user_id' => $user_id,
                        'nilai_user' => $answer->nilai_user,
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }

                $cfPakarUserList = [];
                $gejalasNilaiPakar = $penyakit->gejalas;

                foreach ($allUserAnswers as $gejalaUser) {
                    $gejalaPakar = $gejalasNilaiPakar->where('id', $gejalaUser->gejala_id)->first();
                    
                    if ($gejalaPakar) {
                        $nilaiUser = $gejalaUser->nilai_user;
                        $nilaiPakar = $gejalaPakar->pivot->nilai_pakar;
                        $cfPakarUser = $nilaiUser * $nilaiPakar;
                        $cfPakarUserList[] = $cfPakarUser;
                    }
                }
                
                $cfKombinasiAkhir = 0;
                if (count($cfPakarUserList) > 0) {
                    $cfKombinasi = $cfPakarUserList[0];
                    for ($i = 1; $i < count($cfPakarUserList); $i++) {
                        $cfPakarUserBerikutnya = $cfPakarUserList[$i];
                        $cfKombinasi = $cfKombinasi + $cfPakarUserBerikutnya * (1 - $cfKombinasi);
                    }
                    $cfKombinasiAkhir = $cfKombinasi;
                }

                $persentaseAkhir = $cfKombinasiAkhir * 100;
                $diagnosaFinal->persentase = $persentaseAkhir;
                $diagnosaFinal->save();
            }
            
            // Hapus data sementara di tabel diagnosa dan nilai_users
            DB::table('nilai_users')->where('diagnosa_id', $temp_diagnosa_id)->delete();
            Diagnosa::find($temp_diagnosa_id)->delete();
            Session::forget('temp_diagnosa_id');
            
            return redirect()->route('daftardiagnosa')->with('success', 'Proses Diagnosa Berhasil');

        } else {
            return redirect()->route('formulir.show', ['halaman' => $halaman_berikutnya]);
        }
    }
}
