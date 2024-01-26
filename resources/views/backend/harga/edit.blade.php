@extends('layouts.back')
@section('content')
<div class="container-fluid">
    <!-- --------------------------------------------------- -->
    <!--  Form Basic Start -->
    <!-- --------------------------------------------------- -->
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Form Edit Harga</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">harga/create</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h5 class="mb-3">Edit Harga</h5>
                    <form action="{{ route('harga.update',$harga->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Komoditas</label>
                            <select name="komoditas" id="komoditas" class="form-select">
                                <option value="Perkebunan">Pilih Komoditas</option>
                                <option {{$harga->komoditas == 'Perkebunan' ? 'selected':''}} value="Perkebunan">Perkebunan</option>
                                <option {{$harga->komoditas == 'Pangan' ? 'selected':''}} value="Pangan">Pangan</option>
                                <option {{$harga->komoditas == 'Hortikultura' ? 'selected':''}} value="Hortikultura">Hortikultura</option>
                            </select>

                            <label for="produk" class="form-label">Produk</label>
                            <input type="text" name="produk" id="produk" class="form-control" value="{{$harga->produk}}">


                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control" value="{{$harga->harga}}">
                            <label for="" class="form-label">Kode Produk</label>
                            <input type="text" name="kode_produk" class="form-control" value="{{$harga->kode_produk}}">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" value="{{session('kecamatan')}}">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-success font-medium rounded-pill px-4">
                            <div class="d-flex align-items-center">
                                <i class="ti ti-send me-2 fs-4"></i>
                                Submit
                            </div>
                        </button>
                    </form>
                </div>
                <!-- ---------------------
                                                    end Custom File Uploads
                                                ---------------- -->
            </div>
        </div>
        <!-- Row -->
    </section>
    <!-- --------------------------------------------------- -->
    <!--  Form Basic End -->
    <!-- --------------------------------------------------- -->
</div>
@endsection