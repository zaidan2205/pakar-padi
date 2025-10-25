@extends('layout')
@section('isi')
    <div class="container">
        @if ($halaman == 1)
            <h1 class="text-gradient mt-5 mb-4">Gejala Umum</h1>
        @elseif ($halaman == 2)
            <h1 class="text-gradient mt-5 mb-4">Organisme Pengganggu Tanaman</h1>
        @elseif ($halaman == 3)
            <h1 class="text-gradient mt-5 mb-4">Masalah pada Daun</h1>
        @elseif ($halaman == 4)
            <h1 class="text-gradient mt-5 mb-4">Masalah pada Malai dan Anakan Padi</h1>
        @elseif ($halaman == 5)
            <h1 class="text-gradient mt-5 mb-4">Muncul Bercak pada Tanaman</h1>
        @elseif ($halaman == 6)
            <h1 class="text-gradient mt-5 mb-4">Waktu atau Fase Kerusakan</h1>
        @elseif ($halaman == 7)
            <h1 class="text-gradient mt-5 mb-4">Kerusakan pada Bulir dan Batang <br> Terdapat Bekas Hisapan dan Telur</h1>
        @elseif ($halaman == 8)
            <h1 class="text-gradient mt-5 mb-4">Permasalahan pada Bibit, Akar, dan Pemupukan</h1>
        @else
            <h1 class="text-gradient mt-5 mb-4">Kondisi Sawah dan Area Kerusakan</h1>
        @endif
        <h5 class="normal-text mb-4" style="text-align: right; display: block; color: #808080;">Halaman {{ $halaman }} / {{ $total_halaman }}</h5>
        <form action="{{ route('formulir.store', ['halaman' => $halaman]) }}" method="POST">
            @csrf
            
            @foreach ($gejalas as $gejala)
                <div class="form-group mb-4">
                    <label for="jawaban-{{ $gejala->id }}">
                        {{ $gejala->id }}. Apakah {{ $gejala->nama_gejala }}?
                    </label>
                    <select name="jawaban[{{ $gejala->id }}]" id="jawaban-{{ $gejala->id }}" class="form-control">
                        <option value="" disabled selected>- Pilih Jawaban -</option> 
                        <option value="1">Sangat Yakin</option>
                        <option value="0.8">Yakin</option>
                        <option value="0.6">Cukup Yakin</option>
                        <option value="0.4">Kurang Yakin</option>
                        <option value="0.2">Tidak Tahu</option>
                        <option value="0">Tidak</option>
                    </select>
                </div>
            @endforeach

            @php
                $total_halaman = 9;
            @endphp

            @if ($halaman < $total_halaman)
                <center>
                    <button type="submit" class="btn btn-outline-success mt-3 mb-5">Simpan & Lanjut</button>
                </center>
            @else
                <center>
                    <button type="submit" class="btn btn-outline-success mt-3 mb-5">Lihat Hasil</button>
                </center>
            @endif
        </form>
    </div>
@endsection