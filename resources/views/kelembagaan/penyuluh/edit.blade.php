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
    <form action="{{route('update-penyuluh')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <input id="nama" type="text" name="nama" required placeholder="Nama" value="{{$penyuluh->nama}}">
            <input id="nama" type="hidden" name="id" required placeholder="Nama" value="{{$penyuluh->id}}">
            {{-- <label for="nama">&nbsp;&nbsp;Nama</label> --}}
        </div>

        <div class="">
            <input id="jabatan" type="text" name="jabatan" required placeholder="Jabatan" value="{{$penyuluh->jabatan}}">
            {{-- <label for="jabatan">&nbsp;&nbsp;Jabatan</label> --}}
        </div>

        <div class="">
            <input id="wilayah" type="text" name="wilayah" required placeholder="wilayah" value="{{$penyuluh->wilayah}}">
            {{-- <label for="wilayah">&nbsp;&nbsp;Wilayah</label> --}}
        </div>

        <div class="">
            <input id="notelepon" type="tel" name="notelepon" required placeholder="No Telepon" value="{{$penyuluh->no_telepon}}">
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
        <div class="file-field ">
            <span>Dokumen Sebelumnya</span><br>
            <img src="{{asset('storage/foto/'.$penyuluh->foto)}}" alt="Profile Image" style="width: 75px; height: 75px;">
            <a href="{{asset('storage/file_rktp/'.$penyuluh->file_rktp)}}">File RKTP</a> |
            <a href="{{asset('storage/file_program_daerah/'.$penyuluh->file_program_desa)}}">File Program</a>
        </div>
        <button class="btn waves-effect waves-light" type="submit">Submit</button>

</div>



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