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

        .no-arrow-select {
            /* 1. Menghilangkan panah dropdown bawaan browser */
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            
            /* 2. Menghilangkan background SVG Bootstrap (panah kustom) */
            background-image: none !important; 
            
            /* 3. FIX ALIGNMENT HORIZONTAL (Kanan): Mengatur ulang padding-right agar sama dengan form-control biasa */
            padding-right: 0.75rem !important; 
            
            /* 4. FIX ALIGNMENT HORIZONTAL (Kiri): Ini untuk memastikan teks dimulai di posisi yang sama dengan input di atasnya */
            padding-left: 0.75rem !important;
        }

        /* PENTING: Kita paksa posisi sub-menu (dropdown-menu di dalam dropend) 
        agar selalu muncul di kanan dan mengatasi misalignment vertikal.
        */
        .dropend .dropdown-menu {
          margin-top: 0;
          margin-left: .125rem; /* Sedikit jarak agar tidak terlalu mepet */
          left: 100%; /* Posisikan 100% dari tepi kiri LI parent */
          
          /* 🔥 SOLUSI UTAMA 🔥 
          Angkat menu ke atas dengan nilai negatif. 
          Nilai -7px atau -8px biasanya mengkompensasi padding/border LI induk.
          */
          top: -8px;     
        }
        
        /* Opsi: Pastikan ikon panah ada di tengah */
        .dropdown-toggle::after {
          vertical-align: middle;
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
              <a class="nav-link {{ Request::is('kontak') ? 'active' : '' }} mx-3" href="/kontak">Kontak</a>
              <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle {{ Request::is('laporan*') ? 'active' : '' }}" href="" id="laporanDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Laporan</a>
        <ul class="dropdown-menu shadow-lg border-0 rounded-lg" aria-labelledby="laporanDropdown">
            
            {{-- 🔥 FIX UTAMA: Hapus class 'nav-item' dari <li> nested ini --}}
            <li class="dropend"> 
                <a class="dropdown-item dropdown-toggle {{ Request::is('laporan*') && !Request::is('laporan_user') ? 'active' : '' }}" 
                   href="#" id="rataRataDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Laporan Rata-Rata
                </a>
                <ul class="dropdown-menu shadow-lg border-0 rounded-lg" aria-labelledby="rataRataDropdown">
                    <li><a class="dropdown-item {{ request('kecamatan') == 1 && Request::is('laporan') ? 'active' : '' }}" href="/laporan?kecamatan=1">Kecamatan Ajibarang</a></li>
                    <li><a class="dropdown-item {{ request('kecamatan') == 2 && Request::is('laporan') ? 'active' : '' }}" href="/laporan?kecamatan=2">Kecamatan 2</a></li>
                    <li><a class="dropdown-item {{ request('kecamatan') == 3 && Request::is('laporan') ? 'active' : '' }}" href="/laporan?kecamatan=3">Kecamatan 3</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item {{ !request()->has('kecamatan') && Request::is('laporan') ? 'active' : '' }}" href="/laporan">Semua Kecamatan</a></li>
                </ul>
            </li>

            <li>
                <a class="dropdown-item {{ Request::is('laporan_user') ? 'active' : '' }}" href="/laporan_user">Laporan User</a>
            </li>
        </ul>
    </li>
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
     <script>
    document.addEventListener("DOMContentLoaded", function() {
        // Cari semua dropdown-toggle yang berada di dalam dropdown-menu, yang berarti nested
        const nestedToggles = document.querySelectorAll('.dropdown-menu .dropend a.dropdown-toggle');
        
        nestedToggles.forEach(function(element) {
            element.addEventListener('click', function (e) {
                // 1. PENTING: Hentikan propagasi event agar menu utama tidak ikut tertutup
                e.stopPropagation();
                e.preventDefault(); 
                
                let parentLi = this.closest('.dropend');

                // 2. Toggle class 'show' pada list item parent (.dropend) dan menu (.dropdown-menu)
                let nestedMenu = parentLi.querySelector('.dropdown-menu');
                
                // Pastikan menu ini belum terbuka. Jika belum, kita buka.
                if (!nestedMenu.classList.contains('show')) {
                    // Tutup semua sub-menu lain di level yang sama sebelum membuka yang baru
                    parentLi.closest('.dropdown-menu').querySelectorAll('.dropend.show').forEach(sib => {
                        sib.classList.remove('show');
                        sib.querySelector('.dropdown-menu').classList.remove('show');
                    });
                    
                    // Buka menu yang diklik
                    parentLi.classList.add('show');
                    nestedMenu.classList.add('show');
                } else {
                    // Jika sudah terbuka, kita tutup
                    parentLi.classList.remove('show');
                    nestedMenu.classList.remove('show');
                }
            });
        });
    });
</script>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>