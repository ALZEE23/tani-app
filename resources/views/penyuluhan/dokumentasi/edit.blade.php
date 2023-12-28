@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Edit Dokumentasi Kegiatan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('update-dokumentasi',$dokumentasi->id)}}" method="POST" enctype="multipart/form-data" class="dropzone" id="myDropzone">
        @csrf
        @method('PUT')
        <input type="hidden" name="id" value="{{$dokumentasi->id}}">
        <div class="">
            <label for="desa">Pilih Desa:</label>
            <select id="wilayah" name="desa">
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        Tanggal
        <input type="date" name="tanggal" class="form-control" value="{{$dokumentasi->tanggal}}">
        <div class="">
            <textarea name="rencana" id="" cols="30" rows="40" style="height: 143px; width: 350px;">{{$dokumentasi->keterangan}}</textarea>
        </div>
        <div class="">
            <label for="">Foto Baru</label>
            <input type="file" name="file[]" id="fileInput" multiple />
            <!-- Kontainer untuk pratinjau gambar -->
            <br>
            <label for="">Foto Lama</label><br>
            @php
            $images = explode(',', $dokumentasi->foto);
            @endphp
            @foreach ($images as $img)

            <img alt="image" src="{{asset('storage/dokumentasi/' . trim($img))}}" style="border-radius: 10px; height:100px">
            @endforeach

            <style>
                .image-preview {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 10px;
                }

                .preview-image {
                    max-width: 200px;
                    max-height: 200px;
                    width: auto;
                    height: auto;
                }
            </style>
            <div id="imagePreview"></div>
        </div>

        <button class="btn waves-effect waves-light" type="submit">Submit</button>

    </form>
    <br>
    <br>
    <br>
    <br>
    <br>
</div>
<script>
    document.getElementById('fileInput').addEventListener('change', function(event) {
        var preview = document.getElementById('imagePreview');
        preview.innerHTML = ''; // Membersihkan pratinjau sebelum menambahkan yang baru

        var files = event.target.files; // Mengambil file yang dipilih
        for (var i = 0; i < files.length; i++) {
            var reader = new FileReader();
            reader.onload = function(e) {
                var image = new Image();
                image.src = e.target.result;
                image.classList.add('preview-image');
                preview.appendChild(image);
            };
            reader.readAsDataURL(files[i]);
        }
    });
</script>


<style>
    .container {
        padding-top: 20px;
    }


    .btn {
        margin-top: 20px;
    }
</style>
@endsection