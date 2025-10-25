<!-- Halaman ini menggunakan layout utama dari halaman layout  -->
@extends('layout')    

<!-- @section('isi') adalah bagian halaman yang berbeda dari layout utama || Isi dari @yield('isi') di halaman layout  -->
@section('isi')          
<div class="card mb-4 mt-4">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="img/sawah.jpg" class="img-fluid rounded-start" alt="...">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h4 class="card-title mb-4">Selamat datang di Website Sistem Pakar Deteksi Hama Penyakit @auth Padi, <br>{{ auth()->user()->name }} @else Padi @endauth </h4>
        <p style="text-align: justify">
            Sistem ini merupakan solusi digital terdepan untuk deteksi dini hama dan penyakit padi. 
            Sebagai mitra terpercaya bagi para petani, kami hadir untuk membantu Anda menjaga kesehatan tanaman padi dan mengoptimalkan hasil panen. 
        </p>
        <p style="text-align: justify">
            Platform ini dikembangkan menggunakan teknologi sistem pakar yang mumpuni untuk memberikan analisis akurat dan rekomendasi penanganan yang 
            efektif. Melalui antarmuka yang intuitif, Anda dapat melakukan diagnosis dengan mudah. Cukup masukkan jawab pertanyaan mengenai gejala yang 
            Anda dapati, dan sistem kami akan mendiagnosis masalah serta menyajikan informasi detail mengenai jenis hama atau penyakit, langkah-langkah 
            pengendalian, dan tindakan pencegahan yang tepat. 
        </p>
        <p style="text-align: justify">
            Kami berkomitmen untuk mendukung ketahanan pangan nasional dengan memberdayakan setiap petani melalui akses informasi yang cepat dan akurat. 
            Mari bersama-sama wujudkan pertanian yang lebih produktif dan berkelanjutan.</p>
        @can('admin')
          <p style="text-align: justify">
            
          </p>
        @else
          @auth
            <p style="text-align: justify">
              Mulai konsultasi Anda sekarang dan pastikan tanaman Anda tumbuh optimal.
            </p>
            <center>
              <a href="{{ route('konsultasi.baru') }}" class="btn btn-outline-success mt-3">Lakukan Tes Sekarang!</a>
            </center>
          @else
            <p style="text-align: justify">
              Mulai konsultasi Anda sekarang dan pastikan tanaman Anda tumbuh optimal.
            </p>
            <center>
              <h5><br>Login Terlebih Dahulu Untuk Melakukan Tes!</h5>
            </center>
          @endauth
        @endcan  
      </div>
    </div>
  </div>
</div>
@can('admin')
@else
@auth
  <div class="card mb-4 mt-4">
    <div class="row g-0">
      <div class="col-md-4">
        <img src="img/ahli.jpg" class="img-fluid rounded-start" alt="...">
      </div>
      <div class="col-md-8">
        <div class="card-body">
          <h4 class="card-title mb-4">Ingin berkonsultasi langsung dengan ahlinya?</h4>
          <p style="text-align: justify">
              Anda bisa bertemu dengan petugas POPT Kabupaten Banyumas untuk mendapatkan solusi dan bantuan terkait 
              masalah tanaman Anda. Tersedia dua pilihan untuk Anda yaitu bertukar pesan terlebih dahulu atau langsung 
              mengunjungi Laboratorium Pengamatan Hama Penyakit Kabupaten Banyumas.
          </p>
          <center>
          <a href="https://wa.me/{{ $kontak->no_whatsapp }}?text=Selamat%20pagi%2Fsiang%2Fsore%2C%20Bapak%2FIbu.%20Saya%20pengguna%20sistem%20pakar%20hama%20penyakit%20padi%20dan%20ingin%20berkonsultasi%20terkait%20hasil%20identifikasi%20hama%2Fpenyakit%20pada%20tanaman%20padi%20saya.%20Apakah%20Bapak%2FIbu%20bersedia%20untuk%20dijadwalkan%20konsultasi%20atau%20pertemuan%20langsung%3F%20Mohon%20petunjuk%20lebih%20lanjut.%20Terima%20kasih." class="btn btn-outline-success mt-4">
            <i class="bi bi-whatsapp"></i> 
            Chat Whatsapp
          </a>
          <a href="tel:+{{ $kontak->no_whatsapp }}" class="btn btn-outline-success mt-4 mx-5"><i class="bi bi-telephone"></i> Telephone</a>
          <a href="https://www.google.com/maps/search/?api=1&query=LPHP+Banyumas%2C+Banyumas" class="btn btn-outline-success mt-4"><i class="bi bi-geo-alt"></i></i> Alamat Kantor</a>
          <center>
        </div>
      </div>
    </div>
  </div>
@endauth  
@endcan

@endsection
