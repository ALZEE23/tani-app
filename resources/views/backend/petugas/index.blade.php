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
                    <h4 class="fw-semibold mb-8">petugas</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted " href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">petugas</li>
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
            <h5 class="card-title fw-semibold mb-0 lh-sm">Table Data petugas</h5><br>
            <a href="{{route('petugas.create')}}"><button type="button" class="btn mb-1 waves-effect waves-light btn-success">
                    Tambah
                </button></a>
        </div>
        <div class="card-body p-4">
            <div class="rounded-2 mb-4">
                <table class="table border text-nowrap customize-table mb-0 align-middle" id="example">
                    <thead class="text-dark fs-4">
                        <tr>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">No</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Nama</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Email</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Username</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Nik</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">No Telepon</h6>
                            </th>
                            <th>
                                <h6 class="fs-4 fw-semibold mb-0">Opsi</h6>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        $no = 1;
                        @endphp
                        @foreach ($petugas as $data)
                        <tr>
                            <td>{{$no++}}</td>
                            </td>
                            <td>{{$data->name}}</td>
                            <td>{{$data->email}}</td>
                            <td>{{$data->username}}</td>
                            <td>{{$data->nik}}</td>
                            <td>{{$data->no_telepon}}</td>

                            <td>
                                <div>
                                    <form action="{{ route('petugas.edit', $data->id) }}" method="GET" class="d-inline">
                                        <button type="submit" class="btn btn-warning">
                                            <i class="ti ti-edit"></i>
                                        </button>
                                    </form>
                                    <form action="{{ route('petugas.destroy', $data->id) }}" method="POST" class="d-inline">
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