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
                    <h4 class="fw-semibold mb-8">Form penyuluh</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">penyuluhs/create</li>
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
                    <h5 class="mb-3">Tambah penyuluh</h5>
                    <form action="{{ route('penyuluh.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama</label>
                            <input class="form-control" type="text" name="nama" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Jabatan</label>
                            <input class="form-control" type="text" name="jabatan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Wilayah</label>
                            <select name="wilayah" id="" class="form-control">
                                @foreach ($kecamatan as $data)
                                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">no telepon</label>
                            <input class="form-control" type="text" name="notelepon" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">foto</label>
                            <input class="form-control" type="file" name="foto" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">file_rktp</label>
                            <input class="form-control" type="file" name="file_rktp" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">file_program_daerah</label>
                            <input class="form-control" type="file" name="file_program_daerah" id="formFile">
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