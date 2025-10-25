@extends('layout')

@section('isi')

<div class="card mb-3">
    <img src="{{ asset($penyakit->gambar) }}" class="card-img-top" alt="...">
    <div class="card-body">
        <br>
        <center>
            <h4 class="card-title">{{ $penyakit->nama_penyakit }}</h4>
        </center>
        <p class="card-text">{!! $penyakit->deskripsi !!}</p>
        <p class="card-text">{!! $penyakit->penanganan !!}</p>
    </div>
</div>

@endsection