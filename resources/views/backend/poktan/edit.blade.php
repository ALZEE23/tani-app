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
                    <h4 class="fw-semibold mb-8">Form gakpoktan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">gakpoktans/create</li>
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
                    <h5 class="mb-3">Tambah gakpoktan</h5>
                    <form action="{{ route('gakpoktan.update',$gakpoktan->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Desa</label>
                            <select name="desa" id="" class="form-control">
                                @foreach ($desa as $data)
                                <option {{ $data->desa == $gakpoktan->desa ? 'selected' : '' }} value="{{ $data->desa }}">{{ $data->desa }}</option>
                                    @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama Gakpoktan</label>
                            <input class="form-control" type="text" name="nama_gakpoktan" id="formFile" value="{{$gakpoktan->nama_gakpoktan}}">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama Ketua</label>
                            <input class="form-control" type="text" name="nama_ketua" id="formFile" value="{{$gakpoktan->nama_ketua}}">
                        </div>
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">Jumlah Poktan Pangan</label>
                            <input class="form-control" type="text" name="pangan" id="formFile" value="{{$gakpoktan->pangan}}">
                        </div>
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">Jumlah Poktan Perkebunan</label>
                            <input class="form-control" type="text" name="berkebunan" id="formFile" value="{{$gakpoktan->berkebunan}}">
                        </div>
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">Jumlah Poktan Hortiluktura</label>
                            <input class="form-control" type="text" name="holtikultura" id="formFile" value="{{$gakpoktan->hortikultura}}">
                        </div>
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">Jumlah Poktan Ternak</label>
                            <input class="form-control" type="text" name="peternakan" id="formFile" value="{{$gakpoktan->peternakan}}">
                        </div>
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">Jumlah Poktan Perikanan</label>
                            <input class="form-control" type="text" name="perikanan" id="formFile" value="{{$gakpoktan->perikanan}}">
                        </div>
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">Kwt</label>
                            <input class="form-control" type="text" name="kwt" id="formFile" value="{{$gakpoktan->kwt}}">
                        </div>
                        <div class=" mb-3">
                            <label for="formFile" class="form-label">No Telepon</label>
                            <input class="form-control" type="text" name="notelepon" id="formFile" value="{{$gakpoktan->no_telepopn}}">
                        </div>

                        <br>
                        <button type=" submit" class="btn btn-success font-medium rounded-pill px-4">
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