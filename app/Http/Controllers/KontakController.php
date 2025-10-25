<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class KontakController extends Controller
{
    // Method untuk menampilkan form update
    public function show()
    {
        // Ambil data kontak dari database
        $kontak = DB::table('kontaks')->first();

        // Kirim data ke view
        return view('kontak', compact('kontak'));
    }

    // Method untuk memproses update
    public function update(Request $request)
    {
        // Validasi input
        $request->validate([
            'whatsapp_number' => 'required|string|max:20',
            'telephone_number' => 'required|string|max:20',
        ]);

        // Langsung update data yang ada
        DB::table('kontaks')->update([
            'no_whatsapp' => $request->whatsapp_number,
            'no_telephone' => $request->telephone_number,
        ]);
        
        return redirect()->back()->with('successkontak', 'Nomor kontak berhasil diperbarui!');
    }
}
