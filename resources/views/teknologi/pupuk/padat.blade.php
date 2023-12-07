@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Teknologi Pertanian</h5>
    </div>
</div>
<div class="col-lg-12">
    <div class="row">
        <a href="{{route('tambah')}}"><button class="btn btn-secondary">Tambah</button></a>
    </div>
@foreach($pupuks as $pupuk)
  <div class="card col-lg-4">
    <div class="image">
      <img src="http://loremflickr.com/320/150?random=6" />
    </div>
    <div class="card-inner">
      <div class="header">
        <h2>{{ $pupuk->judul }}</h2>
    </div>
    <div class="content">
      <p><a href="">download</a></p>
    </div>
      </div>
  </div>
</div>
@endforeach
@endsection
<br><br><br>
<style>

.row{
    height: 20px;
    margin-top: 5px;
    
}
    /* Sesuaikan style card dengan desain yang diinginkan */
    body {
  background: #eeeded;
}

.card {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  transition: all 0.2s ease-in-out;
  box-sizing: border-box;
  margin-top:10px;
  margin-bottom:10px;
 
  margin right:5px;
  background-color:#FFF;
  display: box;
}

.card:hover {
  box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
}
.card > .card-inner {
  padding:10px;
}
.card .header h2, h3 {
  margin-bottom: 0px;
  margin-top:0px;
}
.card .header {
  margin-bottom:5px;
}
.card img{
  width:100%;
}
    .card-content {
        padding: 10px;
    }

    /* Style untuk gambar profile */
   

    .container {
        text-align: center;
        display: flex;
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