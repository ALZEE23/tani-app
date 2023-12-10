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
            <input id="jabatan" type="number" name="nama_sekretaris_poktan" required placeholder="Nama Sekretaris Poktan">
        </div>
        <div class="">
            <input id="wilayah" type="number" name="no_telepon_sekretaris" required placeholder="No Telepon Sekretaris Poktan">
        </div>

        <div class="">
            <input id="wilayah" type="number" name="nama_bendahara_poktan" required placeholder="Nama Bendahara Poktan">
        </div>
        <div class="">
            <input id="wilayah" type="number" name="no_telepon_bendahara" required placeholder="No Telepon Bendahara Poktan">
        </div>
        <div class="">
            <input id="wilayah" type="number" name="titik_koordinat" required placeholder="Titik Koordinat Usaha Tani">
        </div>
        <div class="">
            <input id="wilayah" type="number" name="jumlah_anggota_poktan" required placeholder="Jumlah Anggota Poktan">
        </div>
        <div class="">
            <select name="kelas_poktan" id="">
                <option value="pemula">Kelas Poktan</option>
            </select>
        </div>
        <div class="">
            <input id="nilai_kelas_poktan" type="number" name="nilai_kelas_poktan" required placeholder="Nilai Kelas Poktan">
        </div>
        <div class="">
            <input id="sk_pembentukan_poktan" type="file" name="sk_pembentukan_poktan" required placeholder="Sk Pembentukan Poktan">
        </div>
        <div class="">
            <input id="sk_pengukuhan_poktan" type="file" name="sk_pengukuhan_poktan" required placeholder="Sk Pengukuhan Poktan">
        </div>
        <div class="">
            <input id="berkas_penilaian_poktan" type="file" name="berkas_penilaian_poktan" required placeholder="Berkas Penilaian Poktan">
        </div>
        <div class="">
            <input id="rdk" type="file" name="rdk" required placeholder="RDK">
        </div>
        <div class="">
            <input id="rdk" type="file" name="rdkk" required placeholder="RDKK">
        </div>
        <div class="">
            <input id="rdk" type="file" name="surat_pendampingan" required placeholder="Surat Pendampingan Peemyusunan RDKK">
        </div>
        <div class="">
            <input id="notelepon" type="text" name="username" required placeholder="Username">
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