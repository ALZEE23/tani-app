<!-- resources/views/teknologi/pestisida/tambah.blade.php -->

@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg primary-bg" style="min-height: 147px;"></div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Teknologi Pertanian</h5>
    </div>
</div>

<div class="container">
    <h6 class="text-center">Tambah Pestisida Baru</h6>

    <!-- Form Tambah Pestisida -->
    <form action="{{ route('pestisida.tambah') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <select name="komoditas" id="komoditas" class="form-select">
            <option value="Perkebunan">Pilih Komoditas</option>
            <option value="Perkebunan">Perkebunan</option>
            <option value="Pangan">Pangan</option>
            <option value="Hortikultura">Hortikultura</option>
        </select>
        <div class="mb-3">
            <label for="opt" class="form-label">Hama</label>
            <input type="text" class="form-control" id="opt" name="opt" required>
        </div>
        <div class="mb-3">
            <label for="bahan_aktif" class="form-label">Bahan Aktif</label>
            <input type="text" class="form-control" id="bahan_aktif" name="bahan_aktif" required>
        </div>
        <div class="mb-3">
            <label for="produk" class="form-label">Merek Dagang</label>
            <input type="text" class="form-control" id="produk" name="produk" required>
        </div>
        <div class="mb-3">
            <label for="kelompok" class="form-label">Kelompok</label>
            <input type="text" class="form-control" id="kelompok" name="kelompok" required>
        </div>

        <!-- Tombol Simpan -->
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection