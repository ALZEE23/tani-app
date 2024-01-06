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
                    <h4 class="fw-semibold mb-8">Form petugas</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">petugass/Edit</li>
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
                    <h5 class="mb-3">Edit petugas</h5>
                    <form action="{{ route('petugas.update',$petugas->id) }}" method="post" enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama</label>
                            <input class="form-control" required type="text" name="nama" id="formFile" value="{{$petugas->name}}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">email</label>
                            <input class="form-control" required type="text" name="email" id="formFile" value="{{$petugas->email}}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">username</label>
                            <input class="form-control" required type="text" name="username" id="formFile" value="{{$petugas->username}}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">nik</label>
                            <input class="form-control" required type="text" name="nik" id="formFile" value="{{$petugas->nik}}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">No Telepon</label>
                            <input class="form-control" required type="text" name="no_telepon" id="formFile" value="{{$petugas->no_telepon}}">
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