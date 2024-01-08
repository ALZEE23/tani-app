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
        <a href="{{route('cek-anggota')}}"><button class="btn btn-secondary" style="width: 300px;">Cek Keanggotaan Petani</button></a>
    </div>

    <!-- Card Profil -->
    <div class=""><br>
        <label for=" poktan">MASUKAN NIK SESUAI KTP:</label>
        <form action="{{route('procek')}}" method="get">
            <input type="text" name="nik" style="width: 200px;" value="{{$_GET['nik']}}">
            <button type="submit" class="btn btn-secondary">cari</button>
        </form>
    </div>

</div>
<style>
    /* Gaya untuk membuat teks rata kiri */
    .card {
        text-align: left;
    }

    .info {
        /* display: block; */
        margin-left: 10px;
        margin-top: 10px;
        /* Jarak antar baris */
    }
</style>
<div class="container">
    @if(count($daftarpoktan) > 0)
    @foreach ($daftarpoktan as $data)
    <div class="card">
        <br>
        <span class="info">Nama : {{$data->name}}</span><br>
        <span class="info">Nik : {{$data->nik}}</span><br>
        <span class="info">Nama Ibu Kandung : {{$data->nama_ibu}}</span><br>
        <span class="info">Desa : {{$data->desa}}</span><br>
        <!-- <span class="info">Status : {{$data->status}}</span> -->
        <br>
        <span class="info">MT1</span><br>
        <span class="info">Komoditas : {{$data->komoditas_mt1}}</span><br>
        <span class="info">Kios : {{$data->nama_kios_pengecer}}</span><br>
        <span class="info">Luasan : {{$data->rencana_mt1}}</span><br>
        @if (auth()->user()->role == 'dinas' || auth()->user()->role == 'petugas')

        <span class="info">Urea : {{$data->pupuk_urea_mt1}} Kg</span><br>
        <span class="info">Phonska : {{$data->pupuk_npk_formula_mt1}} Kg</span><br>
        <br>
        @endif

        <span class="info">MT2</span><br>
        <span class="info">Komoditas : {{$data->komoditas_mt2}}</span><br>
        <span class="info">Kios : {{$data->nama_kios_pengecer}}</span><br>
        <span class="info">Luasan : {{$data->rencana_mt2}}</span><br>

        @if (auth()->user()->role == 'dinas' || auth()->user()->role == 'petugas')
        <span class="info">Urea : {{$data->pupuk_urea_mt2}} Kg</span><br>
        <span class="info">Phonska : {{$data->pupuk_npk_formula_mt2}}</span><br>
        <br>
        @endif

        <span class="info">MT3</span><br>
        <span class="info">Komoditas : {{$data->komoditas_mt3}}</span><br>
        <span class="info">Kios : {{$data->nama_kios_pengecer}}</span><br>
        <span class="info">Luasan : {{$data->rencana_mt3}}</span><br>

        @if (auth()->user()->role == 'dinas' || auth()->user()->role == 'petugas')
        <span class="info">Urea : {{$data->pupuk_urea_mt3}} Kg</span><br>
        <span class="info">Phonska : {{$data->pupuk_npk_formula_mt3}} Kg</span><br>
    </div>
    @endif
    @endforeach
    @else
    <div class="card" style="background-color:green;">
        <p class="text-center" style="color:white">Belum terdaftar di poktan manapun.</p>

    </div>
    @endif
</div>

<br><br><br>

<style>
    /* Sesuaikan style card dengan desain yang diinginkan */
    .card {
        margin-top: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-content {
        padding: 10px;
    }

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

    /* Style untuk label select */
    label {
        display: block;
        margin-bottom: 5px;
    }

    /* Style untuk select */
    select {
        width: 200px;
        /* Sesuaikan lebar select */
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .imgp {
        margi
    }
</style>

@endsection