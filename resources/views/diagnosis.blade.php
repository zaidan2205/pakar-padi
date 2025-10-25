@extends('layout')



@section('isi')
<div class="diagnosis-container mt-5">
    @if ($groupedDiagnosas->isEmpty())
        <div class="alert alert-warning text-center">Anda Belum Pernah Melakukan Tes</div>
    @else
        <h1 class="text-gradient mb-5">Riwayat Hasil Diagnosa</h1>
        @foreach($groupedDiagnosas as $tanggalWaktu => $diagnosas)
            <div class="history-section">
                <h2 class="fs-5">{{ $tanggalWaktu }} WIB</h2>

                {{-- mengecek apakah data di $diagnosas ada yang persentasenya > 0 --}}
                {{-- contains mengembalikan nilai True/False --}}
                {{-- variable adaHasil bernilai True jika ada yang persentasenya > 0, jika semua persentase < 0 maka bernilai False --}}
                @php
                    $adaHasil = $diagnosas->contains(function ($diagnosa) {
                        return $diagnosa->persentase > 0;
                    });
                @endphp

                {{-- menampilkan data diagnosa yang persentasenya > 0 ($adaHasil == True) --}}
                @if ($adaHasil)     
                    @foreach ($diagnosas->sortByDesc('persentase') as $diagnosa)
                        @if ($diagnosa->persentase > 0)
                            <div class="history-item">
                                @if ($diagnosa->penyakit)
                                    <a href="{{ route('deskripsipenyakit', $diagnosa->penyakit->id) }}" class="disease-link">
                                        <span class="penyakit">{{ $diagnosa->penyakit->nama_penyakit }}</span>
                                    </a>
                                @else
                                    <span class="penyakit">Penyakit Tidak Ditemukan</span>
                                @endif
                                <span class="persentase">{{ number_format($diagnosa->persentase, 2) }}%</span>
                            </div>
                        @endif
                    @endforeach
                @else
                    {{-- Menampilkan alert karena semua data persentasenya < 0 --}}
                    <div class="alert alert-warning text-center">Tidak Ada Hasil Diagnosa. Mungkin Anda Tidak Menjawab Satupun Pertanyaan.</div>
                @endif
            </div>
        @endforeach
    @endif
</div>
@endsection
