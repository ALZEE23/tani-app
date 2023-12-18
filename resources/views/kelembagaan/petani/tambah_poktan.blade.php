@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Poktan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('store-poktan')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa">
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="">
            <input id="nama" type="text" name="nama_poktan" required placeholder="Nama Poktan">
        </div>
        <div class="">
            <input id="nama" type="text" name="nama_ketua_poktan" required placeholder="Nama Ketua Poktan">
        </div>
        <div class="">
            <input id="nama" type="number" name="no_telepon_ketua" required placeholder="No Telepon Ketua Poktan">
        </div>

        <div class="">
            <input id="jabatan" type="text" name="nama_sekretaris_poktan" required placeholder="Nama Sekretaris Poktan">
        </div>
        <div class="">
            <input id="wilayah" type="number" name="no_telepon_sekretaris" required placeholder="No Telepon Sekretaris Poktan">
        </div>

        <div class="">
            <input id="wilayah" type="text" name="nama_bendahara_poktan" required placeholder="Nama Bendahara Poktan">
        </div>
        <div class="">
            <input id="wilayah" type="number" name="no_telepon_bendahara" required placeholder="No Telepon Bendahara Poktan">
        </div>
        <div class="">
            <input id="wilayah" type="text" name="titik_koordinat" required placeholder="Titik Koordinat Usaha Tani">
        </div>
        <div class="">
            <input id="wilayah" type="number" name="jumlah_anggota_poktan" required placeholder="Jumlah Anggota Poktan">
        </div>
        <div class="">
            <select name="kelas_poktan" id="">
                <option value="pemula">pemula</option>
                <option value="pemula">suhu</option>
            </select>
        </div>
        <div class="">
            <input id="nilai_kelas_poktan" type="number" name="nilai_kelas_poktan" required placeholder="Nilai Kelas Poktan">
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>SK Pembentukan Poktan</span>
                <input type="file" name="sk_pembentukan_poktan">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>SK Pengukuhan Poktan</span>
                <input type="file" name="sk_pengukuhan_poktan">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Berkas Penilaian Poktan</span>
                <input type="file" name="berkas_penilaian_poktan">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>AD ART</span>
                <input type="file" name="ad_art">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>RDK</span>
                <input type="file" name="rdk">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>RDKK</span>
                <input type="file" name="rdkk">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Surat Pendampingan Penyusunan RDKK</span>
                <input type="file" name="surat_pendamping">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="">
            <input id="username" type="text" name="username" required placeholder="Username">
        </div>
        <div class="">
            <input id="password" type="password" name="password" required placeholder="Password">
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