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
                    <h4 class="fw-semibold mb-8">kecamatan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a class="text-muted " href="/">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item" aria-current="page">kecamatan</li>
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
            <h5 class="card-title fw-semibold mb-0 lh-sm">Table Data</h5><br>

            <!-- Dropdown untuk memilih kategori -->
            <div class="mb-3">
                <label for="model">Pilih Model:</label>
    <select name="model" id="model" onchange="changeModel(this.value)">
        <option value="" selected disabled></option>
        <option value="pupuk">Pupuk</option>                    
        <option value="pestisida">Pestisida</option>
        <option value="budidaya">Budidaya</option>
        <option value="pencegahan">Pencegahan</option>
    </select>
            </div>

            <a href="{{ route('teknologi.create') }}" class="btn mb-1 waves-effect waves-light btn-success">
                Tambah
            </a>
        </div>

        <!-- Div kontainer untuk tabel -->
        <div class="card-body p-4">
            <div class="table rounded-2 mb-4">
    <table class="table border text-nowrap customize-table mb-0 align-middle" id="example">
        <!-- Tambahkan header tabel sesuai model -->
        <thead class="text-dark fs-4">
            <tr>
                <th><h6 class="fs-4 fw-semibold mb-0">No</h6></th>
                <th><h6 class="fs-4 fw-semibold mb-0">Cover</h6></th>
                <th><h6 class="fs-4 fw-semibold mb-0">Judul</h6></th>
                <th><h6 class="fs-4 fw-semibold mb-0">File</h6></th>
                <th><h6 class="fs-4 fw-semibold mb-0">Kategori</h6></th>
                <th><h6 class="fs-4 fw-semibold mb-0">Opsi</h6></th>
            </tr>
        </thead>
        <tbody>
            @php $no = 1; @endphp
            @foreach ($data as $item)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $item->cover }}</td>
                    <td>{{ $item->judul }}</td>
                    <td>{{ $item->file }}</td>
                    <td>{{ $item->kategori }}</td>
                    <td>
                        <div>
                            <!-- Tambahkan tombol edit dan delete -->
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
    </div>
    <!-- --------------------------------------------------- -->
    <!-- Form Basic End -->
    <!-- --------------------------------------------------- -->

    <!-- JavaScript -->
    <script>
    function changeModel(model) {
        console.log('Changing model to:', model);
        window.location.href = '/teknologi-backend?model=' + model;
    }
</script>
</div>
@endsection