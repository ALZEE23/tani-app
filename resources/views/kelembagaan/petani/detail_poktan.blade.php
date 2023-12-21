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
        <a href=""><button class="btn btn-secondary" style="width: 300px;">Poktan</button></a><br><br>

        <!-- @ if (auth()->user()->role == 'dinas') -->
        <style>
            .select-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        </style>
    </div>

    <style>
        /* Untuk tabel */
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            overflow-x: auto;
            display: block;
            margin: 30px;
        }

        /* Untuk mengatur lebar kolom */
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        /* Untuk mengatur lebar pada tampilan kecil */
        @media (max-width: 767.98px) {

            .table th,
            .table td {
                padding: 0.3rem;
            }
        }
    </style>

    <a href="{{route('tambah-poktan')}}">
        <button class="btn btn-primary">Detail poktan</button>
    </a>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    @if (auth()->user()->role == 'petugas')
                    <a href="{{route('edit_poktan',$poktan->id)}}" class="btn btn-primary">Edit</a>
                    @endif
                    <br>
                    <table class="table table-bordered center">
                        <thead>
                            <tr>
                                <th scope="col">Desa</th>
                                <th scope="col">{{$poktan->desa}}</th>
                            </tr>
                            <tr>
                                <th scope="col">Nama Poktan</th>
                                <th scope="col">{{$poktan->nama_poktan}}</th>
                            </tr>
                            <tr>
                                <th scope="col">Nama Ketua</th>
                                <th scope="col">{{$poktan->ketua_poktan}}</th>
                            </tr>
                            <tr>
                                <th scope="col">No Telepon Ketua</th>
                                <th scope="col">{{$poktan->nomor_telepon_ketua}}</th>
                            </tr>
                            <tr>
                                <th scope="col">Nama Sekretaris</th>
                                <th scope="col">{{$poktan->nama_sekretaris_poktan}}</th>
                            </tr>
                            <tr>
                                <th scope="col">No Telepon Sekretaris</th>
                                <th scope="col">{{$poktan->nomor_telepon_sekretaris}}</th>
                            </tr>
                            <tr>
                                <th scope="col">Titik Koordinat</th>
                                <th scope="col">{{$poktan->titik_koordinat}}</th>
                            </tr>
                            <tr>
                                <th scope="col">Jumlah Anggota</th>
                                <th scope="col">{{$poktan->jumlah_anggota}}</th>
                            </tr>
                            <tr>
                                <th scope="col">Kelas Poktan</th>
                                <th scope="col">{{$poktan->kelas_poktan}}</th>
                            </tr>
                            <tr>
                                <th scope="col">Nilai Kelas Poktan</th>
                                <th scope="col">{{$poktan->nama_poktan}}</th>
                            </tr>
                            <tr>
                                <th scope="col">SK Pembentukan Poktan</th>
                                <th scope="col"><a href="{{asset('storage/sk_pembentukan_poktan/'.$poktan->sk_pembentukan_poktan)}}" class="btn btn-secondary">Lihat</a></th>

                            </tr>
                            <tr>
                                <th scope="col">SK Pengukuhan Poktan</th>
                                <th scope="col"><a href="{{asset('storage/sk_pengukuhan_poktan/'.$poktan->sk_pengukuhan_poktan)}}" class="btn btn-secondary">Lihat</a></th>
                            </tr>
                            <tr>
                                <th scope="col">Berkas Penilaian</th>
                                <th scope="col"><a href="{{asset('storage/berkas_penilaian/'.$poktan->berkas_penilaian)}}" class="btn btn-secondary">Lihat</a></th>
                            </tr>
                            <tr>
                                <th scope="col">AD / ART</th>
                                <th scope="col"><a href="{{asset('storage/ad_art/'.$poktan->ad_art)}}" class="btn btn-secondary">Lihat</a></th>
                            </tr>
                            <tr>
                                <th scope="col">RDK</th>
                                <th scope="col"><a href="{{asset('storage/rdk/'.$poktan->rdk)}}" class="btn btn-secondary">Lihat</a></th>
                            </tr>
                            <tr>
                                <th scope="col">RDKK</th>
                                <th scope="col"><a href="{{asset('storage/rdkk/'.$poktan->rdkk)}}" class="btn btn-secondary">Lihat</a></th>
                            </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Profil -->
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