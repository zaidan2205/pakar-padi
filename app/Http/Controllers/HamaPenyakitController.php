<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Penyakit;

class HamaPenyakitController extends Controller
{
    public function view() {
        return view('hamapenyakit');
    }

    public function daftarPenyakit()
    {
        // Mengambil semua data dari tabel 'penyakit' dengan urut berdasarkan abjad nama penyakit 
        $penyakits = Penyakit::orderBy('nama_penyakit', 'asc')->get();

        // Mengirimkan data 'penyakits' ke view
        return view('hamapenyakit', [
            'penyakits' => $penyakits
        ]);
    }

    // Method baru untuk menampilkan detail
    public function detailPenyakit($id)
    {
        // Mencari data penyakit berdasarkan ID, jika tidak ditemukan, akan otomatis 404
        $penyakit = Penyakit::findOrFail($id);

        // Mengirimkan satu objek penyakit ke view
        return view('deskripsipenyakit', ['penyakit' => $penyakit]);
    }
}
