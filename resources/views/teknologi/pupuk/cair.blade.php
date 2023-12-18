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
            @if (auth()->user()->role == 'petugas') 
            <a href="{{ route('store') }}"><button class="btn btn-secondary">Tambah</button></a>
            @endif 
        </div>
        @foreach($pupuks as $pupuk)
            <div class="card col-lg-4" >
                <div class="image">
                    @if (auth()->user()->role == 'petugas')
                    <div class="dropdown" style="position: absolute; top: 15px; right: 10px; z-index: 999;" id="dropdown-{{ $pupuk->id }}">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <!-- Icon titik tiga secara vertikal -->
                                &#8942;
                            </button>
                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item" href="{{ route('pupuk.edit', $pupuk->id) }}">Edit</a>
                                <a class="dropdown-item" href="{{ route('pupuk.delete', $pupuk->id) }}" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $pupuk->id }}').submit();">Delete</a>
                                <form id="delete-form-{{ $pupuk->id }}" action="{{ route('pupuk.delete', $pupuk->id) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
                    </div>
                    @endif
                    @if(strtolower(pathinfo($pupuk->file, PATHINFO_EXTENSION)) === 'mp4')
                        <!-- Jika file MP4, tampilkan pemutar video -->
                        <video width="100%" height="auto" controls poster="{{ asset('storage/' . $pupuk->cover) }}">
                            <source src="{{ asset('storage/' . $pupuk->file) }}" type="video/mp4">
                            Your browser does not support the video tag.
                        </video>
                    @else
                        <!-- Jika bukan MP4, tampilkan gambar -->
                        <img src="{{ asset('storage/' . $pupuk->cover) }}" />
                    @endif
                </div>
                <div class="card-inner">
                    <div class="header">
                        <h2>{{ $pupuk->judul }}</h2>
                    </div>
                    <div class="content">
                        @if(strtolower(pathinfo($pupuk->file, PATHINFO_EXTENSION)) === 'mp4')
                            <!-- Jika file MP4, tampilkan link download -->
                            <p><a href="{{ asset('storage/' . $pupuk->file) }}" download>download</a></p>
                        @else
                            <!-- Jika bukan MP4, tampilkan link download -->
                            <p><a href="{{ asset('storage/' . $pupuk->file) }}" download>download</a></p>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
    <br><br>
</div>
<br><br><br>
@endsection

<script>
    document.addEventListener("DOMContentLoaded", function () {
        @foreach($pupuks as $pupuk)
            var dropdown{{ $pupuk->id }} = document.getElementById('dropdown-{{ $pupuk->id }}');
            
            dropdown{{ $pupuk->id }}.addEventListener('click', function () {
                var menu = dropdown{{ $pupuk->id }}.querySelector('.dropdown-menu');
                
                // Toggle class 'show' untuk menampilkan atau menyembunyikan dropdown
                menu.classList.toggle('show');
            });
        @endforeach
    });
</script>
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
        box-shadow: 0 5px 5px rgba(0,0,0,0.19), 0 6px 6px rgba(0,0,0,0.23);
        
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

    .card img,video {
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
    .dropdown-menu {
        display: none; /* Sembunyikan menu by default */
        position: absolute;
        right: 0;
        
        z-index: 1;
    }

    .dropdown-menu.show {
        display: block; /* Tampilkan menu jika memiliki class 'show' */
    }
    
    @media(max-width:576px){
        .card{
        width: 360px;
        max-width: 100%;
        }
        
        .card img {
        max-width: 100%;
        object-fit: cover;
         /* Menggunakan max-width untuk mengontrol lebar gambar */
        padding-left: 0;
        padding-right: 0;
        height: 200px; /* Menjaga aspek ratio gambar */
    }
        .card video {
        max-width: 100%;
        width: 355px;
         /* Menggunakan max-width untuk mengontrol lebar gambar */
        padding-left: 0;
        padding-right: 0;
        height: 200px; /* Menjaga aspek ratio gambar */
    }
}

@media(max-width:378px){
    .card{
        width: 320px;
    }
}
</style>
