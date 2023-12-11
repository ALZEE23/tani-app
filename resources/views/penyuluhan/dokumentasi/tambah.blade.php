@extends('layouts.masuk')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

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
        <option selected>PangkalanPari</option>
        <option value="1">2021</option>
        <option value="2">2022</option>
        <option value="3">2023</option>
      </select>
    </div>
    
    <h3 class="select-title">Pilih Tanggal Kegiatan</h3>
    <input type="text" class="form-control datepicker" id="tanggal" data-date-format="yyyy-mm-dd">
    
    <h3 class="select-title">Tambahkan Foto (Format JPG/PNG, maksimal 1 foto 5MB ) </h3>
    <div class="form">
    <select>
        <option selected>JatiTujuh</option>
        <option value="1">One</option>
        <option value="2">Two</option>
        <option value="3">Three</option>
      </select>
    </div>

    <h3 class="select-title">keterangan Dokumentasi</h3>
    
    <textarea class="form-control input-text" id="keterangan" rows="2"></textarea>
</div>

<a href="{{route('tambah-dokumentasi')}}" class="add">Simpan</a>

<style>

.container {
    text-align: center;
}

   .select-title
 {
    color: black;
    font-weight: 600;
    margin-bottom: 5px;
    margin-left: 5px;
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

    #tanggal {
        color: white;
        font-weight: 600;
        background-color: #0e7aae; /* Warna latar belakang */
        border-radius: 20px;
        display: flex;
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    text-align: center;
    font-size: 35px;
    }

    #keterangan {
        color: black;
        font-weight: 600;
        border-radius: 20px;
        background-color: #0e7aae; /* Warna latar belakang */
        border: none;
        display: flex;
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    text-align: center;
    font-size: 35px;
}


  
    .add {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    font-size: 20px;
    color: white;
    background-color: #0e7aae;
    border-radius: 30px;
    width: 250px;
    font-weight: 600;
    padding: 20px;
    text-align: center;
    margin-left: 70%; /* Memindahkan ke sebelah kanan */
}


</style>

@endsection