@extends('layouts.masuk')

@section('content')

<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Kegiatan Penyuluhan</h5>
    </div>
</div>

<div class="container">
    <div class="image-wrapper">
        <img alt="image" src="{{ asset('images/menu-petani.png') }}" style="width: 100px; height:100px">
    </div>
    <div class="select-wrapper">
        @if (auth()->user()->role != 'petani')
              <a href="{{route('penyuluhan-rencana')}}"><button class="btn btn-secondary" style="width: 350px;">Rencana Kegiatan Penyuluhan</button></a><br><br>
        @endif
        <a href="{{route('penyuluhan-dokumentasi')}}"><button class="btn btn-secondary" style="width: 350px;">Dokumentasi Kegiatan Penyuluhan</button></a><br><br>
    </div>
</div>
<style>
    body {
        /* background-color: #b3ccb4; */
    }

    .container {
        text-align: center;
    }

    .image-wrapper {
        display: inline-block;
        margin-top: 10px;
        /* Sesuaikan jarak antara teks dan gambar */
    }

    .select-wrapper {
        margin-top: 20px;
        /* Sesuaikan jarak dari gambar ke select */
    }
</style>

@endsection