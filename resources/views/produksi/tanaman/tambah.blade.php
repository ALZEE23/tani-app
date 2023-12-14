@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Prodksi Tanaman</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('produksi.tanaman.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <label for="desa">Pilih Desa:</label>
            <select id="wilayah" name="desa">
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>

        Tanggal
        <input type="date" name="tanggal">
        <select name="komoditas">
            <option value="">Pilih Komoditas</option>
            <option value="teh">TEH</option>
            <option value="kopi">KOPI</option>
            <option value="tebu">TEBU</option>
            <option value="tobacco">TEMBAKAU</option>
            <option value="cengkeh">CENGKEH</option>
            <option value="kelapa">KELAPA</option>
            <option value="aren">AREN</option>
            <option value="nilam">NILAM</option>
            <option value="lada">LADA</option>
            <option value="kemiri">KEMIRI</option>
        </select>
        <div class="">
            <input id="tanam" type="text" name="tanam" required placeholder="Tanam Bulan Ini (Hektar)">
        </div>
        <div class="">
            <input id="panen" type="text" name="panen" required placeholder="Panen Bulan Ini (Hektar)">
        </div>
        <div class="">
            <input id="panen" type="text" name="gagal_panen" required placeholder="Gagal Panen Bulan Ini (Hektar)">
        </div>
        <div class="">
            <input id="produksi" type="text" name="produksi" required placeholder="Produksi Bulan Ini (Ton)">
        </div>
        <div class="">
            <input id="provitas" type="text" name="provitas" required placeholder="Provitas Bulan Ini (Ton)">
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