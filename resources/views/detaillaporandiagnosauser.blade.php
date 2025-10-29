@extends('layout')

@section('isi')
@php
    // Gunakan Carbon untuk mendapatkan format bulan & tahun untuk link kembali
    // Kita harus mengimport Carbon secara eksplisit di view ini karena tidak otomatis tersedia
    $carbon = new Carbon\Carbon();
    try {
        $dateForReturn = $carbon->createFromFormat('d F Y (H:i)', $tanggal_diagnosa);
        $bulanTahunForReturn = $dateForReturn->translatedFormat('F Y');
    } catch (\Exception $e) {
        $bulanTahunForReturn = 'N/A'; // Fallback jika parsing gagal
    }
@endphp

<style>
    /* Custom styling untuk Blade View ini */
    .text-gradient {
        font-weight: 700;
        background: linear-gradient(45deg, #007bff, #28a745); /* Ganti gradien biar beda dari list */
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }
    .card-info-user {
        border-left: 5px solid #007bff; /* Border kiri biru */
        border-radius: 0.75rem;
    }
    .progress-bar-labeled {
        font-weight: bold;
        color: #1a1a1a; /* Warna teks gelap di progress bar */
    }
    .table-detail thead th {
        background-color: #343a40; /* Dark gray for a sleek look */
        color: white;
    }
</style>

<div class="container mt-5 mb-5">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-gradient">Detail Diagnosa: **{{ $user->name }}**</h1>
        {{-- Menggunakan variabel $bulanTahunForReturn yang sudah dihitung di block PHP --}}
        <a href="{{ route('admin.list-user-diagnosa') }}?bulan={{ urlencode($bulanTahunForReturn) }}" 
           class="btn btn-primary shadow-sm">
            <i class="bi bi-arrow-left me-1"></i> Kembali ke Daftar User Bulan {{ $bulanTahunForReturn }}
        </a>
    </div>

    {{-- INFORMASI USER DAN WAKTU --}}
    <div class="card shadow-lg mb-5 card-info-user">
        <div class="card-header bg-light border-bottom">
            <h5 class="mb-0 text-primary fw-bold"><i class="bi bi-person-circle me-2"></i> Informasi User & Waktu Diagnosa</h5>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <p class="mb-1"><strong>Nama User:</strong> {{ $user->name }}</p>
                    <p class="mb-1"><strong>Kecamatan:</strong> {{ $user->kecamatan ?: 'N/A' }}</p>
                </div>
                <div class="col-md-6">
                    <p class="mb-1"><strong>Desa:</strong> {{ $user->desa ?: 'N/A' }}</p>
                    <p class="mb-1"><strong>Waktu Diagnosa:</strong> <span class="badge bg-primary fs-6">{{ $tanggal_diagnosa }}</span></p>
                </div>
            </div>
        </div>
    </div>

    @if ($diagnosas->isEmpty())
        <div class="alert alert-info text-center shadow-sm p-4">
            <i class="bi bi-exclamation-circle-fill me-2"></i> 
            Tidak ditemukan detail hasil diagnosis untuk waktu ini. Coba cek kembali.
        </div>
    @else
        <h3 class="mb-3 text-secondary fw-bold">Hasil Diagnosis Penyakit</h3>
        
        {{-- TABEL DETAIL HASIL --}}
        <div class="card shadow-lg">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped table-hover mb-0 table-detail">
                        <thead>
                            <tr>
                                <th scope="col" style="width: 30%;">Penyakit</th>
                                <th scope="col" style="width: 70%;">Persentase Keyakinan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($diagnosas as $diagnosa)
                                <tr>
                                    <td class="fw-bold align-middle">{{ $diagnosa->penyakit->nama_penyakit }}</td>
                                    <td class="align-middle">
                                        {{-- Progress bar --}}
                                        <div class="progress" role="progressbar" aria-label="Persentase" aria-valuenow="{{ number_format($diagnosa->persentase, 2) }}" aria-valuemin="0" aria-valuemax="100" style="height: 30px; background-color: #e9ecef;">
                                            <div class="progress-bar progress-bar-labeled 
                                                @if ($diagnosa->persentase >= 70) bg-danger
                                                @elseif ($diagnosa->persentase >= 40) bg-warning
                                                @else bg-success
                                                @endif
                                            " style="width: {{ number_format($diagnosa->persentase, 2) }}%; color: #343a40;">
                                                {{ number_format($diagnosa->persentase, 2) }}%
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        @php
            // Ambil diagnosa dengan persentase tertinggi
            $penyakitTeratas = $diagnosas->first();
        @endphp

        {{-- KESIMPULAN --}}
        @if ($penyakitTeratas && $penyakitTeratas->penyakit)
            <div class="card mt-5 border-success shadow-lg card-info-user" style="border-left-color: #28a745 !important;">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-check-circle-fill me-2"></i> **Kesimpulan Utama**</h5>
                </div>
                <div class="card-body">
                    <p class="lead">Penyakit dengan tingkat keyakinan **tertinggi** adalah:</p>
                    <h3 class="text-success fw-bolder">{{ $penyakitTeratas->penyakit->nama_penyakit }}</h3>
                    <h4 class="text-secondary">Keyakinan: <span class="badge bg-success fs-5">{{ number_format($penyakitTeratas->persentase, 2) }}%</span></h4>
                </div>
            </div>
        @endif
        
    @endif
</div>
@endsection
