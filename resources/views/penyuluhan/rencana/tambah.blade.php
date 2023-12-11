@extends('layouts.masuk')

@section('content')
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<!-- jQuery library -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<!-- Bootstrap JS -->
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<!-- Bootstrap Datepicker CSS and JS -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>


<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambahkan Rencana Kegiatan</h5>
    </div>
</div>

<div class="container">

    <form action="{{ route('store-rencana') }}" method="post">
        @csrf   
<h1 class="select-title">Pilih Tanggal</h1>
<input type="text" class="form-control datepicker" id="tanggal" data-date-format="yyyy-mm-dd">

<h1 class="select-title">Rencana Kegiatan Penyuluhan</h1>

<textarea class="form-control input-text" id="rencana" rows="2"></textarea>
<button type="submit" class="add">Simpan</button>

</form>
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
#tanggal {
        color: black;
        font-weight: 600;
        background-color: grey; /* Warna latar belakang */
        border: none;
        display: flex;
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    text-align: center;
    font-size: 18px;
    }

    #rencana {
        color: black;
        font-weight: 600;
        background-color: grey; /* Warna latar belakang */
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

<script>
    $(document).ready(function () {
      $('.datepicker').datepicker();
    });
  </script>
  
@endsection