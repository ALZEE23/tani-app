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
    <h6 class="text-center">Penyuluh</h6>
    <div class="image-wrapper">
        <img alt="image" src="{{ asset('images/business.png') }}" style="width: 100px; height:100px">
    </div>
    @if (isset($key))
    <div class="select-wrapper">
        <label for="kecamatan">Pilih Kecamatan:</label>
        <select id="kecamatan" name="kecamatan" onchange="redirectToSelectedKecamatan()">
            @foreach ($kecamatan as $data)
            <option {{ $key == $data->kecamatan ? 'selected' : '' }} value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
            @endforeach
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
    </div>
    @else
    <div class="select-wrapper">
        <label for="kecamatan">Pilih Kecamatan:</label>
        <select id="kecamatan" name="kecamatan" onchange="redirectToSelectedKecamatan()">
            @foreach ($kecamatan as $data)
            <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
            @endforeach
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
    </div>
    @endif

    <script>
        function redirectToSelectedKecamatan() {
            const selectedKecamatan = document.getElementById('kecamatan').value;
            window.location.href = "{{ url('penyuluha-filter') }}/" + encodeURIComponent(selectedKecamatan);
        }
    </script>

    <!-- Card Profil -->
    @if (auth()->user()->role == 'petugas')<br>
    <a href="{{route('tambah-penyuluh')}}">
        <button class="btn btn-primary">tambah</button>
    </a>
    @endif
    <br>
    @if ($penyuluhs->isEmpty())
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <h5>Tidak ada data</h5>
            </div>
        </div>
    </div>
    @else
    @foreach ($penyuluhs as $penyuluh)
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <div class="col s3">
                    <img src="{{asset('storage/foto/'.$penyuluh->foto)}}" alt="Profile Image" style="width: 75px; height: 75px;">
                </div>
                <div class="col s9">
                    <span class="card-title">Nama: {{$penyuluh->nama}}</span>
                    <p>Jabatan: {{$penyuluh->jabatan}}</p>
                    <p>No. Telepon: {{$penyuluh->no_telepon}}</p>
                    <a href="{{asset('storage/file_rktp/'.$penyuluh->file_rktp)}}">File RKTP</a> |
                    <a href="{{asset('storage/file_program_daerah/'.$penyuluh->file_program_desa)}}">File Program</a><br>
                    <a href="{{route('edit.penyuluh',$penyuluh->id)}}">Edit</a>|
                    <a href="{{route('delete.penyuluh',$penyuluh->id)}}">Hapus</a>
                </div>
            </div>
        </div>
    </div>

    @endforeach
    @endif

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