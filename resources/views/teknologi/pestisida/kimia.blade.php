@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;"></div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Teknologi Pertanian</h5>
    </div>
</div>

<div class="container">
    <h6 class="text-center">Pestisida</h6>

    <!-- Form Pencarian -->
    <form action="{{ route('pestisida.search') }}" method="GET">
        <div class="form-group">
            <input type="text" class="form-control" name="search" placeholder="Cari...">
        </div>
        <button type="submit" class="btn btn-primary">Cari</button> 
        <a href="{{route('pestisida.kimia')}}" class="btn btn-secondary mb-3">Tampilkan semua</a>
        <a href="{{route('pestisida.tambah')}}" class="btn btn-secondary mb-3">Tambah</a>
    </form>

   <br>
    <!-- Tabel -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th scope="col">No</th>
                <th scope="col">OPT</th>
                <th scope="col">Bahan Aktif</th>
                <th scope="col">Produk</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pestisidas as $index => $pestisida)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $pestisida->opt }}</td>
                    <td>{{ $pestisida->bahan_aktif }}</td>
                    <td>{{ $pestisida->produk }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
