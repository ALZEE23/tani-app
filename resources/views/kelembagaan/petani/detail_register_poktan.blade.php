@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Detail Register Anggota Poktan</h5>
    </div>
</div>
<div class="container">

    <div class="">
        <label for="desa">Desa:</label>
         <input disabled id="nik" type="text" name="nik" required value="{{$daftarpoktan->desa}}">

    </div>
    <script>
        function csdesa() {
            const desa = document.getElementById('desa').value;
            window.location.href = "{{ url('/csdesa/session') }}/" + encodeURIComponent(desa);
        }
    </script>
    <div class="">
        <label for=" poktan">Poktan:</label>
        <input disabled id="nik" type="text" name="nik" required value="{{$daftarpoktan->poktan}}">

    </div>

    <div class="">
        <label for=" poktan">Nik:</label>
        <input disabled id="nik" type="text" name="nik" required placeholder="NIK SESUAI KTP" value="{{$daftarpoktan->nik}}">
    </div>
    <div class="">
        <label for=" poktan">Nama:</label>
        <input disabled id="nama" type="text" name="nama" required placeholder="NAMA SESUAI KTP" value="{{$daftarpoktan->nama}}">
    </div>
    <style>
        .foto-container {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            /* Jarak antar elemen */
        }

        .foto-item {
            text-align: center;
            flex-basis: calc(20% - 20px);
            /* Atur lebar setiap elemen, sesuaikan dengan jumlah elemen di dalam satu baris */
        }

        .foto-item img {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 0 auto;
            /* Membuat gambar menjadi rata tengah */
        }

        /* CSS untuk layar kecil (mode mobile) */
        @media (max-width: 767px) {
            .foto-container {
                display: block;
                /* Mengatur ulang menjadi tata letak blok untuk perangkat seluler */
            }

            .foto-item {
                margin-bottom: 20px;
                /* Menambahkan jarak antar elemen di mode mobile */
            }

            .foto-item img {
                width: 100%;
                /* Menyesuaikan lebar gambar dengan lebar layar */
            }
        }
    </style>
    <div class="foto-container">
        <div class="foto-item">
            <span>Foto KTP</span>
            <img src="{{asset('storage/foto_ktp')}}/{{$daftarpoktan->foto_ktp}}" alt="">
        </div>
        <hr>
        <div class="foto-item">
            <span>Foto KK</span>
            <img src="{{asset('storage/foto_kk')}}/{{$daftarpoktan->foto_kk}}" alt="">
        </div>
        <hr>
        <div class="foto-item">
            <span>Foto Surat Lahan</span>
            <img src="{{asset('storage/foto_sppt')}}/{{$daftarpoktan->foto_surat_lahan_desa}}" alt="">
        </div>
        <hr>
        <div class="foto-item">
            <span>Foto Surat HGU</span>
            <img src="{{asset('storage/surat_hgu_perkebunan')}}/{{$daftarpoktan->foto_surat_hgu}}" alt="">
        </div>
        <hr>
        <div class="foto-item">
            <span>Foto SPPT</span>
            @php
            $images = explode(',', $daftarpoktan->foto_sppt);
            foreach ($images as $image) {
            echo $response = '<img alt="image" src="' . asset('storage/foto_sppt/' . trim($image)) . '" style="border-radius: 10px;"><br>';
            }
            @endphp
            <img src="{{asset('storage/foto_sppt')}}/{{$daftarpoktan->foto_sppt}}" alt="">
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
</div>

<style>
    .container {
        padding-top: 20px;
    }


    .btn {
        margin-top: 20px;
    }
</style>
@endsection