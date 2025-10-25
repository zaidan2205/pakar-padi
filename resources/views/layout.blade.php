<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" xintegrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('img/logoweb.png') }}" >
    <title>Sistem Pakar Padi</title>
    <style>
      .kosongdiagnosa {
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #aaa;
      }
        .diagnosis-container {
            max-width: 800px;
            margin: auto;
            background: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #5cb85c;
            text-align: center;
        }
        .history-section {
            border-bottom: 2px solid #ccc;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }
        .history-section h2 {
            font-size: 1.5rem;
            color: #555;
            margin-top: 0;
        }
        .history-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .history-item:last-child {
            border-bottom: none;
        }
        .disease-link {
            text-decoration: none;
            color: #333;
            font-weight: bold; /* Tetap bold agar mudah dibaca */
        }
        /* Style saat tautan di-hover */
        .disease-link:hover {
            color: #00bbffff;
            text-decoration: underline;
        }
        .history-item .penyakit {
             font-weight: bold;
        }
        .history-item .persentase {
            font-weight: bold;
            color: #ff5a02ff;
        }
        .no-history-message {
            text-align: center;
            color: #777;
        }

        .normal-text {                     /*Membuat teks jadi gak tebal */
          font-weight: normal;
        }

        .text-gradient {
          background: linear-gradient(to right, #307143ff, #e3d31cff); /* warna gradasi background */
          -webkit-background-clip: text; /* background terpotong atau berbentuk sesuai bentuk teks */
          color: transparent; /* Membuat teks transparan agar teks menjadi berwarna seperti background */
          line-height: 1.3; /* Menambahkan ruang ekstra untuk tulisan (biar huruf y dan g ga kepotong lagi bawahnya) */
        }

        .nav-gradient {
          background: linear-gradient(to right, #307143ff, #e3d31cff); /* Warna gradasi background */
        }



      
    </style>
  </head>
  <body>
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <i class="bi bi-check-circle"></i> {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert"> 
            <i class="bi bi-exclamation-triangle"></i> {{ session('error') }}</i>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-light">
        <div class="container">
          <a href="/">
            <img src="{{ asset('img/logo.jpg') }}" alt="logo" width="95" height="95" class="d-inline-block align-text-top">
          </a>
          <h4 class="text-gradient">&ensp;Sitem Pakar<br>&ensp;Hama Penyakit Padi</h4>
            <div class="collapse navbar-collapse" id="navbarNav">
              <ul class="navbar-nav ms-auto">
              </ul>
              <ul class="navbar-nav">
                <li class="nav-item mt-2">
                  @auth
                    <h2 class="fs-5">
                      Selamat Datang, <br> {{ auth()->user()->name }}
                    </h2>
                  @endauth
                </li>
              </ul>
            </div>
        </div>
    </nav>
    
    <nav class="navbar navbar-expand-lg bg-body-tertiary nav-gradient navbar-dark">
      <div class="container">
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            
            @can('admin')
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="Home" href="/">Beranda</a>
              <a class="nav-link {{ Request::is('laporan') ? 'active' : '' }} mx-3" href="/laporan">Laporan</a>
              <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }}" href="/kontak">Kontak</a>
            @else
              <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" aria-current="Home" href="/">Beranda</a>
            @auth
              <a class="nav-link {{ Request::is(['hamapenyakit', 'penyakit*']) ? 'active' : '' }} mx-3" href="/hamapenyakit">Hama & Penyakit</a>  
              <a class="nav-link {{ Request::is('diagnosis') ? 'active' : '' }}" href="/diagnosis">Hasil Diagnosis</a>
            @endauth
            @endcan
          </div>
          <div class="collapse navbar-collapse" id="navbarNav">
            @auth
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a href="/logout" class="nav-link active" style="color: black;" onclick="event.preventDefault(); document.getElementById('logout').submit();">
                    <i class="bi bi-box-arrow-right"></i> Logout
                  </a>
                  {{-- Form logout yang tersembunyi --}}
                  <form id="logout" action="/logout" method="post" style="display: none;">
                    @csrf
                  </form>
                </li>
              </ul>
            @else
              <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                  <a class="nav-link active" style="color: black;" href="/login"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                </li>
              </ul>            
            @endauth
          </div>
        </div>
      </div>
    </nav>

    <div class="container mt-4">
        @yield('isi')    <!-- Bagian ini yang berbeda tiap halaman, sisanya sama  -->
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>