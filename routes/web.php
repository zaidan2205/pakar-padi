<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\FormulirController;
use App\Http\Controllers\DiagnosisController;
use App\Http\Controllers\PertanyaanController;
use App\Http\Controllers\RegistrasiController;
use App\Http\Controllers\HamaPenyakitController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/laravel', function () {
    return view('welcome');
});


Route::get('/', [HomeController::class, 'view'])->name('home');

Route::get('/login', [LoginController::class, 'view'])->name('login')->middleware('guest'); //middleware('guest') hanya bisa diakses saat belum login

Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [LoginController::class, 'logout']);

Route::get('/registrasi', [RegistrasiController::class, 'view']);

Route::post('/registrasi', [RegistrasiController::class, 'simpan']);

Route::get('/pertanyaan', [PertanyaanController::class, 'view']);
  

Route::get('/hamapenyakit', [HamaPenyakitController::class, 'daftarpenyakit']);

Route::get('/diagnosis', [DiagnosisController::class, 'daftardiagnosa'])->name('daftardiagnosa')->middleware('auth');
// Pilih salah satu antara atas ini atau bawah ini, karena routenya sama, beda fungsi yg dieksekusi
//Route::get('/diagnosis', [DiagnosisController::class, 'hitung']);

// Route baru untuk menampilkan detail penyakit
Route::get('/penyakit/{id}', [HamaPenyakitController::class, 'detailPenyakit'])->name('deskripsipenyakit');

// Route baru untuk menampilkan detail penyakit
// Dimatiin karena kembar sama yg atas jadi error ga bisa buka deskrispsi penyakit
//Route::get('/penyakit/{id}', [DiagnosisController::class, 'detailPenyakit'])->name('deskripsipenyakit');   //ngasih nama route nya jadi deskripsipenyakit

// Route ini menghubungkan URL '/form-konsultasi' dengan method 'index' di FormulirController.
// Ini akan menampilkan halaman formulir dan diberi nama 'formulir.index' agar mudah dipanggil di view.
Route::get('/form-konsultasi', function () {
    return redirect()->route('formulir.show', ['halaman' => 1]);
})->name('formulir.index');

Route::get('/konsultasi-baru', [HomeController::class, 'konsultasiBaru'])->name('konsultasi.baru');



// Route untuk menampilkan halaman formulir per grup
Route::get('/formulir/{halaman}', [FormulirController::class, 'show'])->name('formulir.show');


// Route untuk memproses jawaban
Route::post('/formulir/{halaman}', [FormulirController::class, 'store'])->name('formulir.store');

// Tambahkan route untuk halaman hasil diagnosa
Route::get('/diagnosa/hasil', [DiagnosisController::class, 'showHasil'])->name('hasil.diagnosa');


// Rute untuk menampilkan formulir update kontak
Route::get('/kontak', [KontakController::class, 'show'])->name('daftar-kontak')->middleware('admin');

// Rute untuk memproses data formulir
Route::post('/kontak', [KontakController::class, 'update'])->name('update.kontak');

// Rute untuk menampilkan laporan
Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan')->middleware('admin');;



