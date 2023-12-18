@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Prodksi peternakan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('produksi.peternakan.store')}}" method="POST" enctype="multipart/form-data">
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
        <select name="jenis_ternak">
            <option value="">Pilih Jenis Ternak</option>
            <option value="sapi">sapi</option>
            <option value="kambing">kambing</option>
            <option value="ayam">ayam</option>
        </select>

        <div class="">
            <input id="jumlah_kandang" type="text" name="jumlah_kandang" required placeholder="jumlah kandang">
        </div>
        <div class="">
            <input id="jumlah_ternak" type="text" name="jumlah_ternak" required placeholder="jumlah ternak">
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