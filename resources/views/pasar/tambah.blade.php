@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Pasar</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('pasar.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <input id="nama" type="text" name="nama" required placeholder="Nama Pemilik Pasar">
            {{-- <label for="nama">&nbsp;&nbsp;Nama</label> --}}
        </div>

        <div class="">
            <input id="alamat" type="text" name="alamat" required placeholder="Alamat Lokasi Pemilik Modal">
            {{-- <label for="alamat">&nbsp;&nbsp;alamat</label> --}}
        </div>
        <div class="">
            <input id="link_gmap" type="text" name="link_gmap" required placeholder="Link Google Map">
            {{-- <label for="link_gmap">&nbsp;&nbsp;link_gmap</label> --}}
        </div>
        <div class="">
            <input id="kontak_pemilik" type="text" name="kontak_pemilik" required placeholder="Kontak Pemilik">
            {{-- <label for="kontak_pemilik">&nbsp;&nbsp;kontak_pemilik</label> --}}
        </div>
        <div class="">
            <Select name="sub_sektor">
                <option value="">Pilih Sub Sektor</option>
                <option value="pangan">Tanaman pangan</option>
            </Select>
        </div>
        <div class="">
            <Select name="komoditas">
                <option value="">Pilih Komoditas</option>
                <option value="padi">Padi</option>
                <option value="Jagung">Jagung</option>
                <option value="kedelai">Kedelai</option>
            </Select>
        </div>


        <div class="">
            <label for="desa">Pilih Kecamatan:</label>
            <select id="wilayah" name="kecamatan">
                @foreach ($kecamatan as $data)
                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Foto</span>
                <input type="file" name="foto">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit">Submit</button>
        <br>
        <br>
        <br>
        <br>
        <br>
    </form>
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