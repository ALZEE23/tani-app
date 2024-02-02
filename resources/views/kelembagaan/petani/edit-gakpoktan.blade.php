@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Gapoktan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('update-gakpoktan')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa">
                @foreach ($desa as $data)
                <option {{$data->desa == $gakpoktan->desa ? "selected":''}} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="">
            <!-- <label for="nama">&nbsp;&nbsp;Nama Gapoktan</label> -->

            <input id="nama" type="text" name="nama_gakpoktan" value="{{$gakpoktan->nama_gakpoktan}}" required placeholder="Nama Gapoktan">
        </div>
        <div class="">
            <!-- <label for="nama">&nbsp;&nbsp;Nama Ketua</label> -->
            <input id="nama" type="text" name="nama_ketua" value="{{$gakpoktan->nama_ketua}}" placeholder="Nama Ketua">
            <input id="id" type="hidden" name="id" value="{{$gakpoktan->id}}" placeholder="Nama Ketua">
        </div>
        <div class="">
            <!-- <label for="notelepon">&nbsp;&nbsp;No. Telepon</label> -->
            <input id="notelepon" type="text" name="notelepon" required placeholder="No telepon" value=" {{$gakpoktan->no_telepopn}}">
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