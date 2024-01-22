@extends('layouts.back')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-primary shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-primary d-flex align-items-center justify-content-center">
                            <i class="ti ti-list-details text-white fs-7" title="BTC"></i>
                        </div>
                        <h6 class="mb-0 ms-2">DESA</h6>
                        <div class="ms-auto text-primary d-flex align-items-center">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{$desa}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-danger shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-danger d-flex align-items-center justify-content-center">
                            <i class="ti ti-list-details text-white fs-7" title="LTC"></i>
                        </div>
                        <h6 class="mb-0 ms-3">KECAMATAN</h6>
                        <div class="ms-auto text-info d-flex align-items-center">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{$kecamatan}}</h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-success shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-success d-flex align-items-center justify-content-center">
                            <i class="ti ti-user-circle text-white fs-7" title="LTC"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Petani</h6>
                        <div class="ms-auto text-info d-flex align-items-center">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{$petani}}</h3>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-warning shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-warning d-flex align-items-center justify-content-center">
                            <i class="ti ti-list-details text-white fs-7" title="XRP"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Alsintan</h6>
                        <div class="ms-auto text-info d-flex align-items-center">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{$alsintan}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-warning shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-warning d-flex align-items-center justify-content-center">
                            <i class="ti ti-list-details text-white fs-7" title="XRP"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Pasar</h6>
                        <div class="ms-auto text-info d-flex align-items-center">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{$pasar}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-info shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-info d-flex align-items-center justify-content-center">
                            <i class="ti ti-list-details text-white fs-7" title="XRP"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Poktan</h6>
                        <div class="ms-auto text-info d-flex align-items-center">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{$poktan}}</h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="card bg-light-warning shadow-none">
                <div class="card-body p-4">
                    <div class="d-flex align-items-center">
                        <div class="round rounded bg-warning d-flex align-items-center justify-content-center">
                            <i class="ti ti-list-details text-white fs-7" title="XRP"></i>
                        </div>
                        <h6 class="mb-0 ms-3">Gapoktan</h6>
                        <div class="ms-auto text-info d-flex align-items-center">
                        </div>
                    </div>
                    <div class="d-flex align-items-center justify-content-between mt-4">
                        <h3 class="mb-0 fw-semibold fs-7">{{$gakpoktan}}</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection