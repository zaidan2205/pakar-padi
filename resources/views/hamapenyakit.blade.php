<!-- Halaman ini menggunakan layout utama dari halaman layout  -->
@extends('layout')    

<!-- @section('isi') adalah bagian halaman yang berbeda dari layout utama || Isi dari @yield('isi') di halaman layout  -->
@section('isi')          

<!-- Nanti yang bawah dihapus, buat contoh aja-->
<center><h1 class="text-gradient mt-5 mb-5">Daftar Hama dan Penyakit Padi</h1></center>
<div class="row ">
    @foreach ($penyakits as $penyakit)
    <div class="col-md-4 mb-3 mb-sm-0">
        <div class="card">
            <div class="position-absolute px-3 py-2 text-white" style="background-color:rgba(0, 0, 0, 0.5); border-bottom-right-radius: 15px;">{{ $penyakit->kategori }}</div>
            <img src="{{ $penyakit->gambar }}" class="card-img-top" alt="..." > <!--tambah height="300" kalau pelu mendekin foto-->
            <div class="card-body">
                <h5 class="card-title">{{ $penyakit->nama_penyakit }}</h5>
                <p class="card-text">
                    @if (strlen($penyakit->deskripsi) > 182)
                        {!! substr($penyakit->deskripsi, 0, 182) . '...' !!}
                    @else
                        {!! $penyakit->deskripsi !!}
                    @endif
                </p>
                <a href="{{ route('deskripsipenyakit', ['id' => $penyakit->id]) }}" class="btn btn-outline-success">Lihat Detail</a>
            </div>
        </div>
        <br>
    </div>
    @endforeach
</div>

@endsection