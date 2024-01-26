@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Pestisida Kimia</h5>
    </div>
</div>

<div class="container">
    <form action="{{ route('pestisida.search') }}" method="GET">
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <input type="text" class="form-control" name="search" placeholder="Cari...">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <button type="submit" class="btn btn-primary mb-3">Cari</button>
                    <a href="{{ route('pestisida.kimia') }}" class="btn btn-secondary mb-3">Tampilkan semua</a>
                    @if (auth()->user()->role == 'petugas')
                    <a href="{{ route('pestisida.tambah') }}" class="btn btn-secondary mb-3">Tambah</a>
                    @endif
                    <a href="{{ route('pestisida.import') }}" class="btn btn-secondary mb-3">Import</a>
                </div>
            </div>
        </div>
    </form>

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive">
                @if (auth()->user()->role == 'dinas'|| auth()->user()->role == 'petugas')
                <button id="export-excel">Excel</button>
                <button id="export-pdf"> PDF</button>
                <br>
                <br>
                @endif
                <h6>Geser >></h6>

                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <td class="tg-0lax">no</td>
                            <td class="tg-0lax">Komoditas</td>
                            <td class="tg-0lax">Hama</td>
                            <td class="tg-0lax">Kelompok pestisida</td>
                            <td class="tg-0lax">Bahan Aktif</td>
                            <td class="tg-0lax">Merek Dagang</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($pestisidas as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            <td>{{$data->komoditas}}</td>
                            <td>{{$data->opt}}</td>
                            <td>{{$data->kelompok}}</td>
                            <td>{{$data->bahan_aktif}}</td>
                            <td>{{$data->produk}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                    <tbody></tbody>
                </table>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
                <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
                <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
                <!-- Manually Create Pagination Links -->
                <!-- Display Pestisidas Data -->
                @foreach ($pestisidas as $pestisida)
                <!-- Display Each Pestisida Record -->
                @endforeach

                <!-- Manually Create Limited Pagination Links -->
                @if ($pestisidas->currentPage() > 1)
                <a href="{{ $pestisidas->previousPageUrl() }}" rel="prev">&laquo; Prev</a>
                @endif

                @if ($pestisidas->currentPage() > 2)
                <a href="{{ $pestisidas->url(1) }}">1</a>
                @endif

                @if ($pestisidas->currentPage() > 3)
                <span>...</span>
                @endif

                @if ($pestisidas->currentPage() > 1)
                <a href="{{ $pestisidas->previousPageUrl() }}">{{ $pestisidas->currentPage() - 1 }}</a>
                @endif

                @if ($pestisidas->currentPage() !== 1 && $pestisidas->currentPage() !== $pestisidas->lastPage())
                <span>{{ $pestisidas->currentPage() }}</span>
                @endif

                @if ($pestisidas->currentPage() < $pestisidas->lastPage())
                    <a href="{{ $pestisidas->nextPageUrl() }}" rel="next">{{ $pestisidas->currentPage() + 1 }} &raquo;</a>
                    @endif

                    @if ($pestisidas->currentPage() < $pestisidas->lastPage() - 1)
                        <a href="{{ $pestisidas->url($pestisidas->lastPage()) }}">{{ $pestisidas->lastPage() }}</a>
                        @endif
                        <br><br><br>
            </div>
        </div>
    </div>
</div>


@endsection