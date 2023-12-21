@extends('layouts.masuk')

@section('content')
    <div class="pagehead-bg primary-bg" style="min-height: 147px;"></div>

    <div class="container has-pagehead is-pagetitle">
        <div class="section">
            <h5 class="pagetitle">Teknologi Pertanian</h5>
        </div>
    </div>

    <div class="container">
        <h6 class="text-center">Alsintan</h6>

        <!-- Form Pencarian -->
        <br>

        <div class="row">
            <form action="{{ route('alsintan.filterByKecamatan') }}" method="GET">
                <div class="mb-3">
                    <label for="filter_kecamatan" class="form-label">Filter Kecamatan</label>
                    <select class="form-select" id="filter_kecamatan" name="kecamatan_filter">
                        <option value="" {{ !$kecamatanFilter ? 'selected' : '' }}>Semua Kecamatan</option>
                        @foreach ($kecamatans as $kecamatan)
                            <option value="{{ $kecamatan->kecamatan }}" {{ $kecamatanFilter == $kecamatan->kecamatan ? 'selected' : '' }}>
                                {{ $kecamatan->kecamatan }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="filter_desa" class="form-label">Filter Desa</label>
                    <select class="form-select" id="filter_desa" name="desa_filter">
                        <option value="" {{ !$desaFilter ? 'selected' : '' }}>Semua Desa</option>
                        @foreach ($desaOptions as $desaOption)
                            <option value="{{ $desaOption }}" {{ $desaFilter == $desaOption ? 'selected' : '' }}>
                                {{ $desaOption }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="filter_subsektor" class="form-label">Filter Subsektor</label>
                    <select class="form-select" id="filter_subsektor" name="subsektor_filter">
                        <option value="" {{ !$subsektorFilter ? 'selected' : '' }}>Semua Subsektor</option>
                        @foreach ($subsektors as $subsektor)
                            <option value="{{ $subsektor->subsektor }}" {{ $subsektorFilter == $subsektor->subsektor ? 'selected' : '' }}>
                                {{ $subsektor->subsektor }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Filter</button>
            </form>
        </div>

        <div class="row">
            <a href="{{ route('alsintan.store') }}"><button class="btn btn-secondary">Tambah</button></a>
            <!-- Add this button wherever you want in your view -->
            <a href="{{ route('export-alsintan') }}" class="btn btn-success">Export to Excel</a>
        </div>

        <div class="table-responsive">
            <table class="table" id="alsintanTable">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Desa</th>
                        <th scope="col">Nama Gapoktan</th>
                        <th scope="col">Ketua Gapoktan</th>
                        <th scope="col">Kontak</th>
                        <th scope="col">Jenis Alat Dan Mesin</th>
                        <th scope="col">Jumlah Alat Dan Mesin</th>
                        <th scope="col">Tahun Bantuan</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($alsintans as $index => $alsintan)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $alsintan->desa }}</td>
                            <td>{{ $alsintan->gapoktan }}</td>
                            <td>{{ $alsintan->ketua_gapoktan }}</td>
                            <td>{{ $alsintan->kontak }}</td>
                            <td>{{ $alsintan->alat }}</td>
                            <td>{{ $alsintan->jumlah_alat }}</td>
                            <td>{{ $alsintan->tahun }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
