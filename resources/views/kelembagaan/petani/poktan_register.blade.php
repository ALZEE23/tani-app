@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Daftar Menjadi Anggota Poktan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('store-register-poktan')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="csdesa()">
                @foreach ($desa as $data)
                <option {{session('desa') == $data->desa ? 'selected':''}} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <script>
            function csdesa() {
                const desa = document.getElementById('desa').value;
                window.location.href = "{{ url('/csdesa/session') }}/" + encodeURIComponent(desa);
            }
        </script>
        <div class="">
            <label for=" poktan">Pilih Poktan:</label>
            <select id="poktan" name="poktan">
                @foreach ($poktan as $data)
                <option value="{{$data->nama_poktan}}">{{$data->nama_poktan}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>

        <div class="">
            <input id="nik" type="text" name="nik" required placeholder="NIK SESUAI KTP">
        </div>
        <div class="">
            <input id="nama" type="text" name="nama" required placeholder="NAMA SESUAI KTP">
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Foto KTP</span>
                <input type="file" name="foto_ktp">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Foto Kartu Keluarga</span>
                <input type="file" name="foto_kk">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Foto SPPT terbaru</span>
                <div class="">
                    <input type="file" name="foto_sppt[]" id="fileInput" multiple />
                    <!-- Kontainer untuk pratinjau gambar -->
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
                </div>
            </div>


            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Foto Surat Ket. Lahan Desa</span>
                <input type="file" name="foto_surat_lahan_desa">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <div class="file-field ">
            <div class="btn">
                <span>Surat HGU Perkebunan</span>
                <input type="file" name="surat_hgu_perkebunan">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>
        <br>
        <span>Foto SPPT :</span><br>
        <div id="imagePreview"></div><br>

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
.preview-image{
    margin-right: 8px;
}

    .btn {
        margin-top: 20px;
    }
</style>
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
@endsection