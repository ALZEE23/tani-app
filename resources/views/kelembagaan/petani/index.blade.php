@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Kelembagaan</h5>
    </div>
</div>

<div class="container">
    <h6 class="text-center">Petani</h6>
    <div class="image-wrapper">
        <img alt="image" src="{{ asset('images/menu-petani.png') }}" style="width: 100px; height:100px">
    </div>
    <div class="select-wrapper">
        <a href="{{route('kelembagaan-gakpoktan')}}"><button class="btn btn-secondary" style="width: 300px;">Gapoktan</button></a><br><br>
        <a href="{{route('kelembagaan-poktan')}}"><button class="btn btn-secondary" style="width: 300px;">Poktan</button></a><br><br>
        <a href="{{route('poktan-register')}}"><button class="btn btn-secondary" style="width: 300px;">Daftar Menjadi Anggkota Poktan</button></a><br><br>
        <a href="{{route('detail-poktan')}}"><button class="btn btn-secondary" style="width: 300px;">Cek Keanggotaan Poktan</button></a>
    </div>

    <!-- Card Profil -->
</div>
<br><br><br>
<style>
    /* Sesuaikan style card dengan desain yang diinginkan */


    /* Style untuk gambar profile */
    img {
        border-radius: 50%;
        /* Untuk membuat gambar menjadi bulat */
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