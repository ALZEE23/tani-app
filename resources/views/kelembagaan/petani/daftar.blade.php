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
        <a href="{{route('poktan-register')}}">
            <button class="btn btn-primary">Daftar Menjadi Anggota</button>
        </a>
        <br>
        <!-- @ if (auth()->user()->role == 'dinas') -->
        <style>
            .select-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        </style>
        @if (auth()->user()->role == 'petugas')
        @if (isset($key))
        <div class="select-wrapper d-flex justify-content-center">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="csdesa()">
                @foreach ($desa as $data)
                <option {{session('desa') == $data->desa ? 'selected' : '' }} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @else
        <div class="select-wrapper d-flex justify-content-center">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="csdesa()">
                @foreach ($desa as $data)
                <option {{ session('desa') == $data->desa ? 'selected' : '' }} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @endif
        @endif
        <!-- @ endif -->
        <script>
            function changekec() {
                const kec = document.getElementById('kecamatan').value;
                window.location.href = "{{ url('/cskecamatan/session') }}/" + encodeURIComponent(kec);
            }

            function csdesa() {
                const desa = document.getElementById('desa').value;
                window.location.href = "{{ url('/csdesa/session') }}/" + encodeURIComponent(desa);
            }
        </script>
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
            margin: 0 auto;
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


    <a href="{{route('export-excel-gakpoktan')}}"><button class="btn btn-secondary">Excel</button></a>
    <a href="{{route('export-pdf-gakpoktan')}}"><button class="btn btn-secondary">Pdf</button></a>
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <style>
                    th {
                        vertical-align: middle;
                        /* Menengahkan teks secara vertikal di dalam sel */
                        line-height: normal;
                        /* Mengatur ketinggian baris ke nilai normal */
                    }
                </style>
                <div class="">
                    <table class="table table-bordered" border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th width="10%">Tgl Daftar</th>
                                <th>Desa Lokasi Lahan</th>
                                <th>Nama Poktan</th>
                                <th>Nik Petani</th>
                                <th>Nama Petani</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($daftarpoktans as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</td>

                                <td>{{$data->desa}}</td>
                                <td>{{$data->poktan}}</td>
                                <td>{{$data->nik}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->status}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{route('detail-register-poktan',$data->id)}}">Lihat</a>
                                    @if ($data->status != 'Anggota')
                                    <br>
                                    <a style="margin-top: 10px;" class="btn btn-secondary" href="{{route('acc-register',$data->id)}}">Acc</a>
                                    @endif
                                </td>
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