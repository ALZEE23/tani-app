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
        @if (isset($key))
        <div class="select-wrapper d-flex justify-content-center">
            <label for="kecamatan">Pilih Kecamatan:</label>
            <select id="kecamatan" name="kecamatan" onchange="redirectToSelectedkecamatan()">
                @foreach ($kecamatan as $data)
                <option {{ $key == $data->kecamatan ? 'selected' : '' }} value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @else
        <div class="select-wrapper d-flex justify-content-center">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="redirectToSelecteddesa()">
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @endif
        @if (isset($key))
        <div class="select-wrapper d-flex justify-content-center">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="redirectToSelecteddesa()">
                @foreach ($desa as $data)
                <option {{ $key == $data->desa ? 'selected' : '' }} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @else
        <div class="select-wrapper d-flex justify-content-center">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="redirectToSelecteddesa()">
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @endif
        <!-- @ endif -->
        <script>
            function redirectToSelecteddesa() {
                const selecteddesa = document.getElementById('desa').value;
                window.location.href = "{{ url('gakpoktan-filter') }}/" + encodeURIComponent(selecteddesa);
            }
        </script>


        <br>
        <br>
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
        <button class="btn btn-primary">tambah</button>
    </a>
    <a href="{{route('export-excel-gakpoktan')}}"><button class="btn btn-secondary">Excel</button></a>
    <a href="{{route('export-pdf-gakpoktan')}}"><button class="btn btn-secondary">Pdf</button></a>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Nama Ketua Poktan</th>
                                <th scope="col">Luas Lahan</th>
                            <tr>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($poktans as $data)
                            <tr>
                                <td scope="col">{{$no++}}</td>
                                <td scope="col">{{$data->desa}}</td>
                                <td scope="col">{{$data->nama_ketua_poktan}}</td>
                                <td scope="col">{{$data->luas_lahan}}</td>
                            </tr>
                            @endforeach
                        </tbody>
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