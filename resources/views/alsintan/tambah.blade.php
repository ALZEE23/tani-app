@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg primary-bg" style="min-height: 147px;"></div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Data Alsintan</h5>
    </div>
</div>

<div class="container">
    <!-- Form Tambah Data -->
    <form action="{{ route('alsintan.tambah') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="kecamatan" class="form-label">Kecamatan</label>
            <select name="kecamatan" id="kecamatan">
                @foreach ($kecamatan as $data)
                    <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                @error('kecamatan')
                    <span class=" invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
            </select>
        </div>
        <div class="mb-3">
            <label for="desa" class="form-label">Desa</label>
            <select class="form-select" id="desa" name="desa" required>
                <option value="" selected disabled>Pilih Desa</option>
                @foreach ($desa as $data)
                    <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="subsektor" class="form-label">Subsektor</label>
            <select class="form-select" id="subsektor" name="subsektor" required>
                <option value="" selected disabled>Pilih Subsektor</option>
                <option value="Pangan">Pangan</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="gapoktan" class="form-label">Gapoktan</label>
            <select class="form-select" id="gapoktan" name="gapoktan" required>
                <option value="" selected disabled>Pilih Gapoktan</option>
                <option value="Gebyog">Gebyog</option>
            </select>
        </div> 
        <div class="mb-3">
            <label for="ketua_gapoktan" class="form-label">Ketua Gapoktan</label>
            <input type="text" class="form-control" id="ketua_gapoktan" name="ketua_gapoktan" required>
        </div>
        <div class="mb-3">
            <label for="kontak" class="form-label">Kontak</label>
            <input type="text" class="form-control" id="kontak" name="kontak" required>
        </div>
        <div class="mb-3">
            <label for="alat" class="form-label">Alat</label>
            <input type="text" class="form-control" id="alat" name="alat" required>
        </div>
        <div class="mb-3">
            <label for="jumlah_alat" class="form-label">Jumlah Alat</label>
            <input type="number" class="form-control" id="jumlah_alat" name="jumlah_alat" required>
        </div>
        <div class="mb-3">
            <label for="tahun" class="form-label">Tahun</label>
            <input type="number" class="form-control" id="tahun" name="tahun" required>
        </div>
        <!-- Sisanya formulir tetap sama -->
        <!-- ... -->
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    </form>
</div>
<br><br><br>
@endsection
<!-- Script JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function updateDesaOptions() {
        var kecamatanDropdown = document.getElementById('kecamatan');
        var desaDropdown = document.getElementById('desa');

        var selectedKecamatan = kecamatanDropdown.value;

        // Kosongkan opsi desa sebelum menambahkan yang baru
        desaDropdown.innerHTML = '<option value="" selected disabled>Pilih Desa</option>';

        // Tambahkan opsi desa yang sesuai dengan kecamatan
        @foreach ($desa as $data)
            // Hanya tambahkan opsi jika kecamatan sesuai
            if ("{{ $data->kecamatan }}" == selectedKecamatan) {
                var option = document.createElement('option');
                option.value = "{{ $data->desa }}";
                option.text = "{{ $data->desa }}";
                desaDropdown.appendChild(option);
            }
        @endforeach
    }

    // Panggil fungsi untuk mengupdate opsi desa saat kecamatan berubah
    document.getElementById('kecamatan').addEventListener('change', function () {
        updateDesaOptions();
    });

    // Panggil fungsi pada saat halaman dimuat
    updateDesaOptions();
</script>
