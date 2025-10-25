<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diagnosa;
use App\Models\Penyakit;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class LaporanController extends Controller
{
    /**
     * Menampilkan laporan rata-rata persentase penyakit per bulan.
     */
    public function index()
    {
        // Ambil semua data diagnosa dan relasi penyakit
        $diagnosas = Diagnosa::with('penyakit')->get();
        
        // Jika tidak ada data, kembalikan array kosong
        if ($diagnosas->isEmpty()) {
            return view('laporan', [
                'rata_rata_per_bulan' => collect(), 
                'jumlah_user_per_bulan' => collect()
            ]);
        }
        
        // Kelompokkan data per bulan
        $groupedByMonth = $diagnosas->groupBy(function($item) {
            return Carbon::parse($item->created_at)->translatedFormat('F Y');
        });

        // Hitung rata-rata persentase per penyakit per bulan
        $rata_rata_per_bulan = $groupedByMonth->map(function ($groupPerBulan) {
            return $groupPerBulan->groupBy('penyakit_id')->map(function ($groupPerPenyakit) {
                return [
                    'nama_penyakit' => $groupPerPenyakit->first()->penyakit->nama_penyakit,
                    'rata_rata_persentase' => $groupPerPenyakit->avg('persentase'),
                ];
            });
        });
        
        // Hitung jumlah user unik per bulan
        $jumlah_user_per_bulan = $groupedByMonth->map(function ($groupPerBulan) {
            return $groupPerBulan->unique('user_id')->count();
        });


        return view('laporan', [
            'rata_rata_per_bulan' => $rata_rata_per_bulan->sortByDesc(function ($value, $key) {
                return Carbon::parse($key)->timestamp;
            }), 
            'jumlah_user_per_bulan' => $jumlah_user_per_bulan
        ]);
    }
}
