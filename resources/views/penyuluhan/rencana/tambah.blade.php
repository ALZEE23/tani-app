@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Reencana Kegiatan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('rencana-store')}}" method="POST" enctype="multipart/form-data">
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
        </select>
        Penyuluh Walbin
        <select name="penyuluh">
            @foreach ($penyuluh as $data)
            <option value="{{$data}}">{{$data}}</option>
            @endforeach
        </select>

        <div class="">
            <textarea name="rencana" id="" cols="30" rows="40" style="height: 143px; width: 350px;">Renacana Kegiatan</textarea>
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