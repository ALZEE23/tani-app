@extends('layouts.masuk')

@section('content')


<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Kritik Dan Saran</h5>
    </div>
</div>

<div class="container">
    <div class="image-wrapper">
        <img alt="image" src="{{ asset('images/menu-petani.png') }}" style="width: 250px; height:250px">
    </div>
    <h3 class="select-title">Masukkan Kritik Dan Saran Terkait Kegiatan</h3>
    <textarea class="form-control input-text" id="keterangan" rows="2"></textarea>
    <a class="add">Kirim</a>
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
    .select-title
 {
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
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    text-align: center;
    font-size: 35px;
    margin-bottom: 20px;
}
.add {
      display: flex;
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    font-size: 20px;
    color: white;
    background-color: #0e7aae;
    border-radius: 30px;
    font-weight: 600;
    width: 250px;
    padding: 10px;
    margin-left: auto; /* Tambahkan properti ini untuk memindahkan ke sebelah kanan */
    margin-right: auto; /* Tambahkan properti ini untuk memindahkan ke sebelah kanan */
    }
</style>

@endsection