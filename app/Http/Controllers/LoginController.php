<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function view() {
        return view('login');
    }

    //Buat menyimpan data inputan sementara ke var credentials sebelum ....
    public function login(Request $request) {           
        $credentials = $request->validate([          //Mengisi var credentials dengan isi var request (inputan user) namun dengan menambahkan validasi tertentu
            'email' => ['required', 'email:dns'],      //syarat inputan email
            'password' => ['required']                    //syarat inputan password
        ]);

        if(Auth::attempt($credentials)) {   //Jika percobaan login menggunakan isi var credentials berhasil 
            $request->session()->regenerate();  //Buat session baru (session dibuat ulang) menggunakan data yang di var request
            return redirect()->intended('/');
        }

        return back()->with('logingagal', 'Login Gagal<br>Pastikan email dan password yang Anda masukkan sudah benar!');     //Jika percobaan login menggunakan isi var credentials gagal (inputan email dan atau password salah) 
                                                              //akan dikembalikan ke halaman login dengan memberikan kata kunci logingagal yang berisi pesan "Login Gagal, Pastikan blabla..." 
    }

    public function logout(Request $request) {         //method untuk logout
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect("/");

    }
}
