@extends('layouts.masuk')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<div class="pagehead-bg  seconda-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Dokumentasi Kegiatan Penyuluhan</h5>
    </div>
</div>

<div class="container">
    <h3 class="select-title">Pilih Wilayah Binaan</h3>
    <div class="form">
    <select>
        <option selected>2023</option>
        <option value="1">2021</option>
        <option value="2">2022</option>
        <option value="3">2023</option>
      </select>
    </div>
    
    <h3 class="select-title">Pilih Bulan</h3>
    <div class="form">
    <select>
        <option selected>Juli</option>
        <option value="1">Januari</option>
        <option value="2">Februari</option>
        <option value="3">Maret</option>
        <option value="4">April</option>
        <option value="5">Mei</option>
        <option value="6">Juni</option>
        <option value="7">Juli</option>
        <option value="8">Agustus</option>
        <option value="9">September</option>
        <option value="10">Oktober</option>
        <option value="11">November</option>
        <option value="12">Desember</option>
      </select>
    </div>
    
    <h3 class="select-title">Pilih Kecamatan</h3>
    <div class="form">
    <select>
        <option selected>JatiTujuh</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
    
    <h3 class="select-title">Pilih Desa</h3>
    <div class="form">
    <select>
        <option selected>PangkalanPari</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>
</div>

<a href="{{route('tambah-dokumentasi')}}" class="add">Tambahkan Dokumentasi</a>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
      <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
      <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="d-block w-100" src="..." alt="First slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Second slide">
      </div>
      <div class="carousel-item">
        <img class="d-block w-100" src="..." alt="Third slide">
      </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

<style>

.container {
    text-align: center;

}


   .select-title
 {
    color: black;
    font-weight: 600;
}

.form {
        background-color: #0e7aae; /* Warna latar belakang */
        border-radius: 20px;
        display: flex;
    justify-content: center; /* Pindahkan tombol ke sebelah kanan */
    align-items: center;
    text-align: center;
    margin-bottom: 20px;
    }

    .add {
    display: flex;
    justify-content: center;
    align-items: center;
    text-align: center;
    font-size: 18px;
    color: white;
    background-color: #0e7aae;
    border-radius: 20px;
    width: 200px;
    font-weight: 600;
    margin-top: 10px;
    padding: 10px;
    margin-left: auto; /* Tambahkan properti ini untuk memindahkan ke sebelah kanan */
}



</style>

@endsection