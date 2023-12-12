@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Penyuluh</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('store-penyuluh')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <input id="nama" type="text" name="nama" required placeholder="Nama">
            {{-- <label for="nama">&nbsp;&nbsp;Nama</label> --}}
        </div>

        <div class="">
            <input id="jabatan" type="text" name="jabatan" required placeholder="Jabatan">
            {{-- <label for="jabatan">&nbsp;&nbsp;Jabatan</label> --}}
        </div>

        <div class="">
            <label for="desa">Pilih Wilayah:</label>
            <select id="wilayah" name="wilayah">
                @foreach ($kecamatan as $data)
                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="">
            <input id="notelepon" type="tel" name="notelepon" required placeholder="No Telepon">
            {{-- <label for="notelepon">&nbsp;&nbsp;No. Telepon</label> --}}
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
        <div class="file-field ">
            <div class="btn">
                <span>File RKTP</span>
                <input type="file" name="file_rktp">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>

        <div class="file-field ">
            <div class="btn">
                <span>File Program Daerah</span>
                <input type="file" name="file_program_daerah">
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