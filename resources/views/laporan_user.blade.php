@extends('layout')

@section('isi')
<!-- Asumsi Bootstrap 5 diimpor di layout.blade.php -->
<div class="diagnosis-container mt-5">
    <center><h3 class="text-gradient mb-5">Laporan Hasil Diagnosa User</h3></center>
    
    {{-- Cek apakah ada data laporan --}}
    @if ($data_laporan_per_bulan->isEmpty())
        <div class="alert alert-warning text-center">
            Belum ada user yang melakukan tes diagnosa yang tercatat.
        </div>
    @else
        
        {{-- Loop OUTER: Bulan --}}
        @foreach ($data_laporan_per_bulan as $dataBulan)
            <div class="card shadow mb-5">
                
                {{-- Header Bulan --}}
                <div class="card-header nav-gradient text-white d-flex justify-content-between align-items-center">
                    <h2 class="fs-5 mb-0">{{ $dataBulan['bulan_display'] }}</h2>
                    <span class="badge bg-light text-hijau fs-6">{{ $dataBulan['jumlah_user_unik'] }} User Melakukan Tes</span>
                </div>
                
                <div class="card-body p-4">
                    
                    {{-- START ACCORDION untuk Daftar User --}}
                    <div class="accordion" id="accordionBulan_{{ $dataBulan['bulan_key'] }}">
                        
                        {{-- Loop INNER: User Unik --}}
                        @foreach ($dataBulan['unique_users'] as $user)
                            <div class="accordion-item shadow mb-2 border-0">
                                
                                {{-- HEADER: Nama User (Tombol Collapse) --}}
                                <h2 class="accordion-header" id="headingUser_{{ $user['user_id'] }}_{{ $dataBulan['bulan_key'] }}">
                                    <button class="accordion-button collapsed py-3" 
                                            type="button" 
                                            data-bs-toggle="collapse" 
                                            data-bs-target="#collapseUser_{{ $user['user_id'] }}_{{ $dataBulan['bulan_key'] }}" 
                                            aria-expanded="false" 
                                            aria-controls="collapseUser_{{ $user['user_id'] }}_{{ $dataBulan['bulan_key'] }}">
                                        <div class="d-flex flex-column align-items-start">
                                            <span class="fw-bold fs-6 text-dark">{{ $user['name'] }}</span>
                                            <span class="small text-muted">{{ $user['email'] }}</span>
                                        </div>
                                    <!--    <span class="badge bg-hijau ms-auto me-2">{{ $user['kecamatan'] }}</span> -->
                                    </button>
                                </h2>

                                {{-- BODY: Detail Diagnosa User (muncul saat diklik) --}}
                                <div id="collapseUser_{{ $user['user_id'] }}_{{ $dataBulan['bulan_key'] }}" 
                                     class="accordion-collapse collapse" 
                                     aria-labelledby="headingUser_{{ $user['user_id'] }}_{{ $dataBulan['bulan_key'] }}" 
                                     data-bs-parent="#accordionBulan_{{ $dataBulan['bulan_key'] }}">
                                    
                                    <div class="accordion-body bg-light p-3">
                                        <h6 class="mb-1 text-hijau fw-bold">{{ $user['desa'] }}, {{ $user['kecamatan'] }}</h6>
                                        <h6 class="border-bottom pb-2 mb-3 text-hijau fw-bold">{{ $user['alamat'] }}</h6>

                                        {{-- Loop INNER-INNER: Detail Diagnosa --}}
                                        @foreach ($user['diagnoses'] as $diagnosa)
                                            {{-- 1. Cek Bendera Pemisah Sesi --}}
                                            @if (isset($diagnosa['is_session_separator']) && $diagnosa['is_session_separator'])
                                                {{-- Jika ini item pertama dari sesi lama (sebelumnya), tampilkan pemisah --}}
                                                <div class="d-flex justify-content-center my-3 mb-2">
                                                    {{-- Garis Pemisah Sesi --}}
                                                    <hr class="w-75 border-dark-subtle border-1 border-dashed">
                                                </div>
                                            @endif
                                            
                                            {{-- 2. Tampilkan Item Diagnosa --}}
                                            <div class="history-item d-flex justify-content-between align-items-center border-start border-3 border-hijau-muda ps-2 py-2 mb-2 bg-white rounded">
                                                <div class="d-flex flex-column">
                                                    <span class="penyakit fw-semibold text-dark">{{ $diagnosa['penyakit'] }}</span>
                                                    <span class="small text-muted">{{ $diagnosa['tanggal_tes'] }} WIB</span>
                                                </div>
                                                <span class="persentase fw-bold persentase">{{ $diagnosa['persentase'] }}%</span>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- END ACCORDION --}}
                </div>
            </div>
        @endforeach
    @endif
    <style>
        .text-hijau {
            color: #3f8e56ff;
        }
        
        .bg-hijau {
            background: #3f8e56ff;
        }
        
        /* DEFINISI WARNA HIJAU MUDA CUSTOM */
        .border-hijau-muda {
            /* Hex: #60d394 adalah hijau mint yang lembut */
            border-color: #40975aff !important; 
        }
    </style>
</div>


@endsection
