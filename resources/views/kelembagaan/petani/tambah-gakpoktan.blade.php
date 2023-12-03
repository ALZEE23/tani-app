@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Gakpoktan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('store-gakpoktan')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
             <label for="desa">Pilih Desa:</label>
        <select id="desa" name="desa">
            <option value="desa2">desa 1</option>
            <option value="desa2">desa 2</option>
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
        </div>
        <div class="">
            <input id="nama" type="text" name="nama_gakpoktan" required placeholder="Nama gakpoktan">
            {{-- <label for="nama">&nbsp;&nbsp;Nama</label> --}}
        </div>
        <div class="">
            <input id="nama" type="text" name="nama_ketua" required placeholder="Nama Ketua">
            {{-- <label for="nama">&nbsp;&nbsp;Nama</label> --}}
        </div>
        <div class="">
            <input id="nama" type="number" name="pangan" required placeholder="Jumlah Poktan Pangan">
            {{-- <label for="nama">&nbsp;&nbsp;Nama</label> --}}
        </div>

        <div class="">
            <input id="jabatan" type="number" name="berkebunan" required placeholder="Jumlah Poktan Perkebunan">
            {{-- <label for="jabatan">&nbsp;&nbsp;Jabatan</label> --}}
        </div>

        <div class="">
            <input id="wilayah" type="number" name="holtikultura" required placeholder="Jumlah Poktan Holtikultura">
            {{-- <label for="wilayah">&nbsp;&nbsp;Wilayah</label> --}}
        </div>

        <div class="">
            <input id="notelepon" type="number" name="peternakan" required placeholder="Jumlah Poktan Ternak">
            {{-- <label for="notelepon">&nbsp;&nbsp;No. Telepon</label> --}}
        </div>
        <div class="">
            <input id="notelepon" type="number" name="perikanan" required placeholder="Jumlah Poktan Perikanan">
            {{-- <label for="notelepon">&nbsp;&nbsp;No. Telepon</label> --}}
        </div>
        <div class="">
            <input id="notelepon" type="number" name="kwt" required placeholder="Jumlah Poktan KWT">
            {{-- <label for="notelepon">&nbsp;&nbsp;No. Telepon</label> --}}
        </div>


        <button class="btn waves-effect waves-light" type="submit">Submit</button>
        <br>
        <br>
        <br>
        <br>
        <br>
    </form>
</div>

<style>
    .container {
        padding-top: 20px;
    }

   
    .btn {
        margin-top: 20px;
    }
</style>    
@endsection