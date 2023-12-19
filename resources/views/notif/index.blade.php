@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Pemberitahuan</h5>
    </div>
</div>

<div class="container">
    @if ($notif->isEmpty())
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <h5>Tidak ada data</h5>
            </div>
        </div>
    </div>
    @else
    @foreach ($notif as $data)
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <div class="col s12">
                    <span class="card-title">{{$data->judul}}</span>
                    <p>{{$data->pesan}}</p>
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