<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegistrasiController extends Controller
{
    public function view() {
        return view('registrasi');   
    }

    //Buat menyimpan data inputan sementara ke var validatedData sebelum dimasukkan ke tabel. Sekaligus memberi syarat data inputan harus max berapa char, min berapa char, unique, dll
    public function simpan(Request $request) {
        $validatedData = $request->validate([         //Mengisi var validatedData dengan isi var request (inputan user) namun dengan menambahkan validasi tertentu
            'name' => ['required', 'max:255'],     //syarat inputan nama
            'email' => ['required', 'email:dns', 'unique:users'], //syarat inputan email
            'password' => ['required', 'min:8'] //syarat inputan password
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);  //Data password di var validatedData akan dienkripsi
        
        User::create($validatedData);   // Menginput data yang ada di var validatedData ke dalam tabel users lewat Model User

        return redirect('/login')->with('registrasisukses', 'Akun berhasil dibuat! Silahkan login.'); //Dialihkan ke halaman login dengan memberikan kata kunci registrasisukses pada session 
                                                                                                      // yang berisi pesan "Akun berhasil dibuat"
    }
}
