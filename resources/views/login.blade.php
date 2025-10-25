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
    <link rel="icon" href="img/logoweb.png">

<style>
        .form-floating > label {
            right: initial;
            left: 0;
            transform-origin: 0 0;
        }
    </style>

    <title>Sistem Pakar Padi</title>
  </head>
  <body>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <main class="form-signin w-100 m-auto">

                <!-- Buat nampilih kalau regis berhasil -->
                @if (session('registrasisukses'))   <!-- Jika di session ada kata kunci registrasisukses -->
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle"></i> {{ session('registrasisukses') }}   <!-- Menampilakan Isi pesan registrasisukses -->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session('logingagal'))   <!-- Jika di session ada kata kunci logingagal -->
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {!! session('logingagal') !!}       <!-- Menampilakan Isi pesan di logingagal -->
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif

                <form action="/login" method="post">
                    @csrf
                    <center>
                        <a href="/">
                            <img class="mb-3" src="img/logo.jpg "alt="logo" width="120" height="120"/>
                        </a>
                    </center>
                    <br>
                    <h1 class="h3 mb-3 fw-normal" align="center">Masukkan Akun Anda</h1>
                    <div class="form-floating">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" value="{{ old('email') }}"/>
                        <label for="email">Email</label>
                        @error('email')                        <!--Menampilkan pesan error-->
                        <div class="invalid-feedback">         
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password"/>
                        <label for="password">Password</label>
                        @error('password')                            <!--Menampilkan pesan error-->
                        <div class="invalid-feedback">         
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <p align="center">Belum punya akun? <a href="/registrasi" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Daftar Sekarang</a></p>
                    </div>
                    <div class="d-flex justify-content-center">
                        <button class="btn btn-outline-success w-50 py-2 mt-1" type="submit">Masuk</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>