<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Boostrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.rtl.min.css" integrity="sha384-gXt9imSW0VcJVHezoNQsP+TNrjYXoGcrqBZJpry9zJt8PCQjobwmhMGaDHTASo9N" crossorigin="anonymous">
    <link rel="icon" href="img/logoweb.png">

<style>
        .form-floating > label {
            right: initial;
            left: 0;
            transform-origin: 0 0;
        }
        /* Perbaikan CSS untuk memposisikan ikon error */
        .form-floating > .form-control.is-invalid {
            background-position: right calc(0.375em + 0.1875rem) center;
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
</style>

    <title>Sistem Pakar Padi</title>
  </head>
  <body>
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <main class="form-signin w-100 m-auto">
                <form action="/registrasi" method="post">
                    @csrf
                    <center>
                        <a href="/">
                            <img class="mb-3" src="img/logo.jpg "alt="logo" width="120" height="120"/>
                        </a>
                    </center>
                    <br>
                    <h1 class="h3 mb-3 fw-normal" align="center">Masukkan Data Diri Anda</h1>
                    <div class="form-floating">
                        <input type="text" name="name"  class="form-control @error('name') is-invalid @enderror " id="name" placeholder="name" value="{{ old('name') }}"/>
                        <label for="name">Nama</label>
                        @error('name')                               <!--Menampilkan pesan error-->
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com"/ value="{{ old('email') }}">
                        <label for="email">Email</label>
                        @error('email')                       <!--Menampilkan pesan error-->
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password"/>
                        <label for="password">Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="form-floating mt-2">
                        <input type="password" name="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Konfirmasi Password"/>
                        <label for="password_confirmation">Konfirmasi Password</label>
                        @error('password')
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    {{-- Field Kecamatan (DROPDOWN) --}}
                    <div class="form-floating mb-2 mt-2">
                        <select class="form-select no-arrow-select @error('kecamatan') is-invalid @enderror" id="kecamatan" name="kecamatan">
                            <option value="" disabled selected>-- Pilih Kecamatan --</option>
                            {{-- Opsi akan diisi oleh JavaScript di bawah --}}
                        </select>
                        <label for="kecamatan">Kecamatan</label>
                        @error('kecamatan')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    {{-- Field Desa (DROPDOWN DINAMIS) --}}
                    <div class="form-floating mb-2">
                        <select 
                            class="form-select no-arrow-select @error('desa') is-invalid @enderror" id="desa" name="desa" disabled>
                            <option value="" disabled selected>-- Pilih Desa --</option>
                            {{-- Opsi akan diisi oleh JavaScript di bawah --}}
                        </select>
                        <label for="desa">Desa</label>
                        @error('desa')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                    <div class="form-floating">
                        <input type="text" name="alamat"  class="form-control @error('alamat') is-invalid @enderror " id="alamat" placeholder="alamat" value="{{ old('alamat') }}"/>
                        <label for="name">Alamat Lengkap</label>
                        @error('alamat')                               <!--Menampilkan pesan error-->
                        <div class="invalid-feedback">
                            {{ $message }}
                        </div>
                        @enderror
                    </div>
                    <div class="mt-3">
                        <p align="center">Sudah punya akun? <a href="/login" class="link-success link-offset-2 link-underline-opacity-25 link-underline-opacity-100-hover">Masuk Sekarang</a></p>
                    </div>
                    <div class="d-flex justify-content-center mb-5">
                        <button class="btn btn-outline-success w-50 py-2 mt-1" type="submit">Daftar</button>
                    </div>
                </form>
            </main>
        </div>
    </div>
    
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // DATA LOKASI - Kamu bisa pindahkan ini ke API endpoint atau file terpisah nanti.
            const dataLokasi = {
                "Ajibarang": ["Ajibarang Kulon", "Ajibarang Wetan", "Banjarsari", "Ciberung", "Darmakradenan", "Jingkang", "Kalibenda", "Karangbawang", "Kracak", "Lesmana", "Pancasan", "Pancurendang", "Pandansari", "Sawangan", "Tipar Kidul"],
                "Banyumas": ["Desa 2x", "Desa 2y", "Desa 2z"],
                "Kecamatan 3": ["Desa 3p", "Desa 3q", "Desa 3r", "Desa 3s"],
                // Tambahkan data Kecamatan dan Desa lain di sini
            };

            const selectKecamatan = document.getElementById('kecamatan');
            const selectDesa = document.getElementById('desa');
            
            // Mengisi dropdown Kecamatan
            function populateKecamatan() {
                const oldKecamatan = "{{ old('kecamatan') }}";
                
                Object.keys(dataLokasi).forEach(kecamatan => {
                    const option = document.createElement('option');
                    option.value = kecamatan;
                    option.textContent = kecamatan;
                    if (oldKecamatan && oldKecamatan === kecamatan) {
                        option.selected = true;
                    }
                    selectKecamatan.appendChild(option);
                });
                
                // Jika ada error validasi, isi ulang desa yang dipilih sebelumnya
                if (oldKecamatan) {
                    populateDesa(oldKecamatan);
                }
            }

            // Mengisi dropdown Desa berdasarkan Kecamatan yang dipilih
            function populateDesa(selectedKecamatan) {
                // Bersihkan opsi lama di dropdown Desa
                selectDesa.innerHTML = '<option value="" disabled selected>-- Pilih Desa --</option>';
                
                if (selectedKecamatan && dataLokasi[selectedKecamatan]) {
                    const oldDesa = "{{ old('desa') }}";
                    selectDesa.disabled = false;
                    
                    dataLokasi[selectedKecamatan].forEach(desa => {
                        const option = document.createElement('option');
                        option.value = desa;
                        option.textContent = desa;
                        if (oldDesa && oldDesa === desa) {
                            option.selected = true;
                        }
                        selectDesa.appendChild(option);
                    });
                } else {
                    selectDesa.disabled = true;
                }
            }

            // Event listener: Kalau Kecamatan berubah, panggil populateDesa
            selectKecamatan.addEventListener('change', function() {
                const selectedKecamatan = this.value;
                populateDesa(selectedKecamatan);
            });

            // Jalankan fungsi pengisian saat halaman dimuat
            populateKecamatan();
        });
    </script>
  </body>
</html>