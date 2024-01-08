@extends('layouts.back')

@section('content')
<br><br>
<br><br>
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Data Alsintan</h5>
    </div>
</div>

<div class="container">
    <!-- Form Tambah Data -->
    <form action="{{ route('alsintan.tambah2') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="desa" class="form-label">Desa</label>
            <select class="form-select" id="desa" name="desa" required>
                <option value="" selected disabled>Pilih Desa</option>
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="subsektor" class="form-label">Subsektor</label>
            <select class="form-select" id="subsektor" name="subsektor" required>
                <option value="" selected disabled>Pilih Subsektor</option>
                <option value="Pangan">Pangan</option>
                <option value="Perkebunan">Perkebunan</option>
                <option value="Hortikultura">Hortikultura</option>
                <option value="Perikanan">Perikanan</option>
                <option value="Perikanan">Perikanan</option>
                <option value="KWT">KWT</option>
                <option value="UPJA">UPJA</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gapoktan" class="form-label">Gapoktan</label>
            <select class="form-select" id="gapoktan" name="gapoktan" required>
                <option value="" selected disabled>Pilih Gapoktan</option>
                <option value="Gebyog">Gebyog</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ketua_gapoktan" class="form-label">Ketua Gapoktan</label>
            <input type="text" class="form-control" id="ketua_gapoktan" name="ketua_gapoktan" required>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" required>
        </div>
        <div class="mb-3">
            <label for="alat" class="form-label">Alat</label>
            <input type="text" class="form-control" id="alat" name="alat" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_alat" class="form-label">Jumlah Alat</label>
            <input type="number" class="form-control" id="jumlah_alat" name="jumlah_alat" required>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required>
        </div>
        <div class="mb-3">
            <label for="Gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="Gambar" name="gambar" required>
        </div><br>
        <!-- Sisanya formulir tetap sama -->
        <!-- ... -->
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
<br><br><br>
@endsection