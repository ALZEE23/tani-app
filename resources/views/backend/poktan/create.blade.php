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
                    <h4 class="fw-semibold mb-8">Form poktan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">poktans/create</li>
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
                    <h5 class="mb-3">Tambah poktan</h5>
                    <form action="{{ route('poktan.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Desa</label>
                            <select name="desa" id="" class="form-control">
                                @foreach ($desa as $data)
                                <option value="{{$data->desa}}">{{$data->desa}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama poktan</label>
                            <input class="form-control" type="text" name="nama_poktan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama ketua poktan</label>
                            <input class="form-control" type="text" name="nama_ketua_poktan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">No telepon ketua poktan</label>
                            <input class="form-control" type="text" name="no_telepon_ketua_poktan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama Sekretaris poktan</label>
                            <input class="form-control" type="text" name="nama_sektretaris_poktan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">No telepon sekretaris poktan</label>
                            <input class="form-control" type="text" name="no_telepon_sekretaris_poktan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nama bendahara poktan</label>
                            <input class="form-control" type="text" name="nama_bendahara_poktan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">No telepon bendahara poktan</label>
                            <input class="form-control" type="text" name="no_telepon_bendahara_poktan" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Titik Koordinat Usaha Tani</label>
                            <input class="form-control" type="text" name="koordinat" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Jumlah Anggota Poktan</label>
                            <input class="form-control" type="text" name="jumlah_anggota" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">kelas poktan</label>
                            <select name="kelas" id="" class="form-select">
                                <option value="Baru">Baru</option>
                                <option value="Senior">Senior</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Nilai Kelas Poktan</label>
                            <input class="form-control" type="text" name="nilai" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">SK Pembentukan Poktan</label>
                            <input class="form-control" type="file" name="skpp" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">SK Pengukuhan poktan</label>
                            <input class="form-control" type="file" name="skpp2" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Berkas penilaian poktan</label>
                            <input class="form-control" type="file" name="bpp" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">AD / ART</label>
                            <input class="form-control" type="file" name="adart" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">RDK</label>
                            <input class="form-control" type="file" name="rdk" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">RDKK</label>
                            <input class="form-control" type="file" name="rdkk" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Surat Pendampigan penyusunan RDKK</label>
                            <input class="form-control" type="file" name="sppr" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">username</label>
                            <input class="form-control" type="text" name="username" id="formFile">
                        </div>
                        <div class="mb-3">
                            <label for="formFile" class="form-label">password</label>
                            <input class="form-control" type="password" name="password" id="formFile">
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