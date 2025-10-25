@extends('layout')

@section('isi')
<div class="diagnosis-container mt-5">
    <h1 class="text-gradient mb-5">Laporan Rata-Rata Penyakit</h1>
    @if ($rata_rata_per_bulan->isEmpty())
        <div class="alert alert-warning text-center">
            Belum ada data diagnosa yang tersedia.
        </div>
    @else
        @foreach ($rata_rata_per_bulan as $bulan => $rata_rata_penyakit)
            <div class="history-section">
                <h2 class="fs-5">{{ $bulan }}</h2>
                <p class="text-muted">Terdapat {{ $jumlah_user_per_bulan[$bulan] ?? 0 }} user yang melakukan proses diagnosis</p>  <!-- ?? 0 biar kalau NULL jadi menampilkan 0 dan ga error -->
                @if (!empty($rata_rata_penyakit))
                    @foreach ($rata_rata_penyakit->sortByDesc('rata_rata_persentase') as $penyakit)
                        <div class="history-item">
                            <span class="penyakit">{{ $penyakit['nama_penyakit'] }}</span>
                            <span class="persentase">{{ number_format($penyakit['rata_rata_persentase'], 2) }}%</span>
                        </div>
                    @endforeach
                @else
                    <div class="alert alert-info text-center">
                        Tidak ada data untuk bulan ini.
                    </div>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection