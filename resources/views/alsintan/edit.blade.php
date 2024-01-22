@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg primary-bg" style="min-height: 147px;"></div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Edit Data Alsintan</h5>
    </div>
</div>

<div class="container">
    <!-- Form Tambah Data -->
    <form action="{{ route('alsintan.update',$id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="desa" class="form-label">Desa</label>
            <select class="form-select" id="desa" name="desa" required>
                <option value="" selected disabled>Pilih Desa</option>
                @foreach ($desa as $data)
                <option {{ $alsintan->desa == $data->desa ? 'selected':''}} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="subsektor" class="form-label">Subsektor</label>
            <select class="form-select" id="subsektor" name="subsektor" required>
                <option value="" selected disabled>Pilih Subsektor</option>
                <option {{ $alsintan->subsektor == "Pangan" ? 'selected':''}} value="Pangan">Pangan</option>
                <option {{ $alsintan->subsektor == "Perkebunan" ? 'selected':''}} value="Perkebunan">Perkebunan</option>
                <option {{ $alsintan->subsektor == "Hortikultura" ? 'selected':''}} value="Hortikultura">Hortikultura</option>
                <option {{ $alsintan->subsektor == "Perikanan" ? 'selected':''}} value="Perikanan">Perikanan</option>
                <option {{ $alsintan->subsektor == "Peternakan" ? 'selected':''}} value="Peternakan">Peternakan</option>
                <option {{ $alsintan->subsektor == "KWT" ? 'selected':''}} value="KWT">KWT</option>
                <option {{ $alsintan->subsektor == "UPJA" ? 'selected':''}} value="UPJA">UPJA</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gapoktan" class="form-label">Gapoktan</label>
            <select class="form-select" id="gapoktan" name="gapoktan" required>
                <option value="" selected disabled>Pilih Gapoktan / Poktan</option>
                @foreach ($result as $data)
                @if ($data->nama_poktan == null)
                <option {{ $alsintan->gapoktan == $data->nama_gakpoktan ? 'selected':''}} value="{{$data->nama_gakpoktan}}">{{$data->nama_gakpoktan}}</option>
                @else
                <option {{ $alsintan->gapoktan == $data->nama_poktan ? 'selected':''}} value="{{$data->nama_poktan}}">{{$data->nama_poktan}}</option>
                @endif
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="ketua_gapoktan" class="form-label">Ketua Gapoktan</label>
            <input type="text" class="form-control" id="ketua_gapoktan" name="ketua_gapoktan" required value="{{$alsintan->ketua_gapoktan}}">
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" value="{{$alsintan->kontak}}" required>
        </div>
        <div class="mb-3">
            <label for="alat" class="form-label">Alat</label>
            <input type="text" class="form-control" id="alat" value="{{$alsintan->alat}}" name="alat" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_alat" class="form-label">Jumlah Alat</label>
            <input type="number" class="form-control" id="jumlah_alat" value="{{$alsintan->jumlah_alat}}" name="jumlah_alat" required>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" value="{{$alsintan->tahun}}" required>
        </div>
        <div class="mb-3">
            <label for="Gambar" class="form-label">Gambar</label>
            <input type="file" class="form-control" id="Gambar" name="gambar">
        </div><br>
        <!-- Sisanya formulir tetap sama -->
        <!-- ... -->
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
<br><br><br>
@endsection
<!-- Script JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>