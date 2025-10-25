<?php



namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function view() {

        // Ambil data user yang sedang login
        //$user = auth()->user();     //Ini kalau udah ada loginnya
        $user = User::find(1);  //var user itu berisi data dari Model User (tabel users) dengan id 1
        
        // Ambil data kontak dari database
        $kontak = DB::table('kontaks')->first();

        
        return view('home', compact('user', 'kontak'));


        /**
         * Misal dengan compact('user'), 
         * kamu memberitahu Laravel untuk membuat array ['user' => $user] 
         */
    }

    public function index() {
        // Mengarahkan ke halaman formulir.blade.php
        return view('formulir'); 
    }
    
    public function konsultasiBaru() {
    // Ini akan mengarahkan ke halaman formulir
    return redirect()->route('formulir.index');
    }

    
}
