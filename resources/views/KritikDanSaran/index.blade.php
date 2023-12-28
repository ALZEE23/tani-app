@extends('layouts.masuk')

@section('content')


<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="pagehead-bg  primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Kritik Dan Saran</h5>
    </div>
</div>

<div class="container">
    <div class="image-wrapper">
        <img alt="image" src="{{ asset('images/menu-petani.png') }}" style="width: 100px; height:100px">
    </div>

    <form action="{{ route('store-KritikDanSaran') }}" method="post">
        @csrf
        <h6 class="select-title">Masukkan Kritik Dan Saran Terkait Kegiatan</h6>
        <textarea class="form-control" name="KritikDanSaran" style="height: 121px;" rows="2">Masukan Kritik dan Saran</textarea>
        <br>
        <button type="submit" class="btn btn-primary">Kirim</button>
        <br><br><br>
    </form>

</div>
</div>

<style>
    .container {
        text-align: center;
    }

    img {
        border-radius: 50%;
        margin-right: 10%;
        /* Untuk membuat gambar menjadi bulat */
    }

    .image-wrapper {
        display: inline-block;
        margin-top: 10px;
        /* Sesuaikan jarak antara teks dan gambar */
    }

    .select-title {
        color: black;
        font-weight: 600;
        margin-top: 20px;

    }

    #keterangan {
        color: black;
        font-weight: 600;
        background-color: #0e7aae;
        border: none;
        display: flex;
        justify-content: center;
        /* Memusatkan secara horizontal */
        align-items: center;
        /* Memusatkan secara vertikal */
        text-align: center;
        font-size: 15px;
        margin-bottom: 20px;
        border-radius: 20px;
    }

    .add {
        display: flex;
        justify-content: center;
        /* Memusatkan secara horizontal */
        align-items: center;
        /* Memusatkan secara vertikal */
        font-size: 20px;
        color: white;
        background-color: #0e7aae;
        border-radius: 30px;
        font-weight: 500;
        width: 150;
        padding: 10px;
        margin-left: auto;
        /* Tambahkan properti ini untuk memindahkan ke sebelah kanan */
        margin-right: auto;
        /* Tambahkan properti ini untuk memindahkan ke sebelah kanan */
    }
</style>

@endsection