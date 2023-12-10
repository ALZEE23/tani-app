@extends('layouts.back')
@section('content')
<div class="container">
    <br><br><br><br>
    <!-- --------------------------------------------------- -->
    <!--  Form Basic Start -->
    <!-- --------------------------------------------------- -->
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">gakpoktan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted " href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">gakpoktan</li>
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
    <div class="card w-100 position-relative overflow-hidden">
        <div class="px-4 py-3 border-bottom">
            <h5 class="card-title fw-semibold mb-0 lh-sm">Table Data gakpoktan</h5><br>
            <a href="{{route('gakpoktan.create')}}"><button type="button" class="btn mb-1 waves-effect waves-light btn-success">
                    Tambah
                </button></a>
            <a href="{{route('export-excel-gakpoktan')}}"><button type="button" class="btn mb-1 waves-effect waves-light btn-success">
                    Excel
                </button></a>
            <a href="{{route('export-pdf-gakpoktan')}}"><button type="button" class="btn mb-1 waves-effect waves-light btn-success">
                    PDf
                </button></a>
        </div>
        <div class="card-body p-4">
            <div class="table-responsive rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle table-striped" id="example">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">No</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Desa</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Nama Gakpoktan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Nama Ketua</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Pangan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Perkebunan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Hortikultura</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Peternakan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Perikanan</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Kwwt</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">No Tlpn</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">No Tlpn</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($gakpoktans as $data)
                        <tr>
                            <td scope="col">{{$no++}}</td>
                            <td scope="col">{{$data->desa}}</td>
                            <td scope="col">{{$data->nama_gakpoktan}}</td>
                            <td scope="col">{{$data->nama_ketua}}</td>
                            <td scope="col">{{$data->pangan}}</td>
                            <td scope="col">{{$data->berkebunan}}</td>
                            <td scope="col">{{$data->hortikultura}}</td>
                            <td scope="col">{{$data->peternakan}}</td>
                            <td scope="col">{{$data->perikanan}}</td>
                            <td scope="col">{{$data->kwt}}</td>
                            <td scope="col">{{$data->no_telepopn}}</td>
                            <td>
                                <div>
                                    <form action="{{ route('gakpoktan.edit', $data->id) }}" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('gakpoktan.destroy', $data->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin untuk menghapus data ini?')">
                                            <i class="ti ti-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- --------------------------------------------------- -->
    <!--  Form Basic End -->
    <!-- --------------------------------------------------- -->
</div>
<script>
    $(document).ready(function() {
        var table = $('#example').DataTable({
            pageLength: 5,
            lengthMenu: [
                [5, 10, 20, -1],
                [5, 10, 20, 'Todos']
            ]
        })
    });
</script>
@endsection