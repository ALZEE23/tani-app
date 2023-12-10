@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg primary-bg" style="min-height: 147px;"></div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Teknologi Pertanian</h5>
    </div>
</div>

<div class="container -bottom-32">
    <div class="col-lg-12">
        <div class="row">
            <a href="{{route('teknologi.tambah')}}"><button class="btn btn-secondary">Tambah</button></a>
        </div>
        @foreach($budidayas as $budidaya)
            <div class="card col-lg-4">
                <div class="image">
                    <img src="{{ asset('storage/' . $budidaya->cover) }}" />
                </div>
                <div class="card-inner">
                    <div class="header">
                        <h2>{{ $budidaya->judul }}</h2>
                    </div>
                    <div class="content">
                        @if(strtolower(pathinfo($budidaya->file, PATHINFO_EXTENSION)) == 'mp4')
                            <!-- Jika file PDF, tampilkan link download -->
                            <p><a href="{{ asset('storage/' . $budidaya->file) }}">download</a></p>
                        @else
                            <!-- Jika bukan PDF, tampilkan link download -->
                            <p><a href="{{ asset('storage/' . $budidaya->file) }}" download>download</a></p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br><br><br><br>
</div>
<br><br><br><br>
@endsection

<style>
    /* Sesuaikan style card dengan desain yang diinginkan */
    body {
        background: #eeeded;
    }

    .card {
        box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
        transition: all 0.2s ease-in-out;
        box-sizing: border-box;
        overflow: hidden;
        margin-top: 10px;
        margin-bottom: 10px;
        margin-right: 10px; /* Atur margin kanan */
        margin-left: 10px; /* Atur margin kiri */
        background-color: #5c5a5a;
        display: box;
    }

    .card:hover {
        box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
    }

    .card > .card-inner {
        padding: 10px;
    }

    .card .header h2, h3 {
        margin-bottom: 0px;
        margin-top: 0px;
    }

    .card .header {
        margin-bottom: 5px;
    }

    .card img {
        max-width: 100%; /* Menggunakan max-width untuk mengontrol lebar gambar */
        padding-left: 0;
        padding-right: 0;
        height: auto; /* Menjaga aspek ratio gambar */
    }
    
    .container {
        text-align: center;
        display: flex;
    }

    .image-wrapper {
        display: inline-block;
        margin-top: 10px;
    }

    .select-wrapper {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    select {
        width: 200px;
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }
</style>
