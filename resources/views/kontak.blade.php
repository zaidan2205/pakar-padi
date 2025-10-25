@extends('layout')

@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header text-center">
                    <h5 class="card-title mb-0">Nomor Kontak</h5>
                </div>
                <div class="card-body">
                    <!-- Menampilkan pesan sukses dari controller -->
                    @if (session('successkontak'))
                        <div class="alert alert-success alert-dismissible fade show">
                            <i class="bi bi-check-circle"></i> {{ session('successkontak') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <form action="{{ route('update.kontak') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="whatsapp_number" class="form-label">Nomor WhatsApp <small class="form-text text-muted">(Gunakan Kode Negara 62)</small></label>
                            <input type="text" class="form-control" id="whatsapp_number" name="whatsapp_number" value="{{ $kontak->no_whatsapp }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="telephone_number" class="form-label">Nomor Telepon <small class="form-text text-muted">(Gunakan Kode Area 62281)</small></label>
                            <input type="text" class="form-control" id="telephone_number" name="telephone_number" value="{{ $kontak->no_telephone }}" required>
                        </div>
                        <center>
                            <div class="gap-2">
                                <button type="submit" class="btn btn-outline-success">Simpan Perubahan</button>
                            </div>
                        </center>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection