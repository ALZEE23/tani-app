@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Kelembagaan</h5>
    </div>
</div>

<div class="container">
    <h6 class="text-center">Petani</h6>
    <div class="image-wrapper">
        <img alt="image" src="{{ asset('images/menu-petani.png') }}" style="width: 100px; height:100px">
    </div>

    <div class="select-wrapper">
        <a href=""><button class="btn btn-secondary" style="width: 300px;">Poktan</button></a><br><br>

        <!-- @ if (auth()->user()->role == 'dinas') -->
        <style>
            .select-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        </style>
        @if (auth()->user()->role == 'dinas')
        @if (isset($key))
        <div class="select-wrapper d-flex justify-content-center">
            <label for="kecamatan">Pilih Kecamatan:</label>
            <select id="kecamatan" name="kecamatan" onchange="changekec()">
                @foreach ($kecamatan as $data)
                <option {{ $key == $data->kecamatan ? 'selected' : '' }} value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @else
        <div class="select-wrapper d-flex justify-content-center">
            <label for="kecamatan">Pilih Kecamatan:</label>
            <select id="kecamatan" name="kecamatan" onchange="changekec()">
                @foreach ($kecamatan as $data)
                <option {{session('kecamatan') == $data->kecamatan ? 'selected':'' }} value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @endif
        @endif
        @if (isset($key))
        <div class="select-wrapper d-flex justify-content-center">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="csdesa()">
                @foreach ($desa as $data)
                <option {{session('desa') == $data->desa ? 'selected' : '' }} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @else
        <div class="select-wrapper d-flex justify-content-center">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa" onchange="csdesa()">
                @foreach ($desa as $data)
                <option {{ session('desa') == $data->desa ? 'selected' : '' }} value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
        </div>
        @endif

        <!-- @ endif -->
        <div class="">
            <label for="subsektor">Subsektor:</label>
            <select id="subsektor" name="subsektor" onchange="subcek()">
                <option value="null">Pilih</option>
                <option {{ session('subcek') == 'Pangan' ? 'selected' : '' }} value="Pangan">Pangan</option>
                <option {{ session('subcek') == 'Perkebunan' ? 'selected' : '' }} value="Perkebunan">Perkebunan</option>
                <option {{ session('subcek') == 'Hortikultura' ? 'selected' : '' }} value="Hortikultura">Hortikultura</option>
                <option {{ session('subcek') == 'Perikanan' ? 'selected' : '' }} value="Perikanan">Perikanan</option>
                <option {{ session('subcek') == 'Peternakan' ? 'selected' : '' }} value="Peternakan">Peternakan</option>
                <option {{ session('subcek') == 'KWT' ? 'selected' : '' }} value="KWT">KWT</option>
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <script>
            function changekec() {
                const kec = document.getElementById('kecamatan').value;
                window.location.href = "{{ url('/cskecamatan/session') }}/" + encodeURIComponent(kec);
            }

            function subcek() {
                const kec = document.getElementById('subsektor').value;
                window.location.href = "{{ url('/subcek/session') }}/" + encodeURIComponent(kec);
            }

            function csdesa() {
                const desa = document.getElementById('desa').value;
                window.location.href = "{{ url('/csdesa/session') }}/" + encodeURIComponent(desa);
            }
        </script>


        <br>
        <br>
    </div>

    <style>
        /* Untuk tabel */
        .table {
            width: 100%;
            max-width: 100%;
            margin-bottom: 1rem;
            background-color: transparent;
            overflow-x: auto;
            display: block;
            margin: 0 auto;
        }

        /* Untuk mengatur lebar kolom */
        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        /* Untuk mengatur lebar pada tampilan kecil */
        @media (max-width: 767.98px) {

            .table th,
            .table td {
                padding: 0.3rem;
            }
        }
    </style>
    @if (auth()->user()->role == 'petugas')

    <a href="{{route('tambah-poktan')}}">
        <button class="btn btn-primary">tambah</button>
    </a>
    @endif

    @if (auth()->user()->role == 'dinas' || auth()->user()->role == 'petugas')
    <button id="export-excel">Excel</button>
    <button id="export-pdf"> PDF</button>
    @endif
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="table-responsive">
                    <table class="table table-bordered" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col">Desa</th>
                                <th scope="col">Nama Poktan</th>
                                <th scope="col">Nama Ketua Poktan</th>
                                <th scope="col">Luas Lahan (HA)</th>
                                <th scope="col">Opsi</th>
                            <tr>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($poktans as $data)
                            <tr>
                                <td scope="col">{{$no++}}</td>
                                <td scope="col">{{$data->desa}}</td>
                                <td scope="col">{{$data->nama_poktan}}</td>
                                <td scope="col">{{$data->ketua_poktan}}</td>
                                <td scope="col">{{$data->luas}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{route('detail-poktan',$data->id)}}">Detail Profile</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <!-- Card Profil -->
</div>
<br><br><br>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script>
    function exportToExcel() {
        var excludeColumnIndex = 5; // Index of the "Opsi" column

        // Clone the table and remove the "Opsi" column
        var originalTable = document.getElementById('data-table');
        var clonedTable = originalTable.cloneNode(true);

        // Remove the "Opsi" column header
        var headerRow = clonedTable.querySelector('thead tr');
        if (headerRow && headerRow.cells.length > excludeColumnIndex) {
            headerRow.deleteCell(excludeColumnIndex);
        }

        // Remove the "Opsi" column from each data row
        var rows = clonedTable.getElementsByTagName('tr');
        for (var i = 0; i < rows.length; i++) {
            var cells = rows[i].getElementsByTagName('td');
            if (cells.length > excludeColumnIndex) {
                cells[excludeColumnIndex].remove();
            }
        }

        // Create a new workbook from the modified table
        var wb = XLSX.utils.table_to_book(clonedTable, {
            sheet: 'Sheet JS'
        });

        // Convert the workbook to binary Excel format
        var wbout = XLSX.write(wb, {
            bookType: 'xlsx',
            type: 'binary'
        });

        // Function to convert binary data to a Blob
        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }

        // Save the Blob as an Excel file
        saveAs(new Blob([s2ab(wbout)], {
            type: "application/octet-stream"
        }), 'data.xlsx');
    }


    // Tambahkan event listener pada tombol export
    document.getElementById('export-excel').addEventListener('click', exportToExcel);

    function exportToPDF() {
        if (typeof jsPDF !== 'undefined') {
            const doc = new jsPDF();

            doc.autoTable({
                html: '#data-table'
            });

            doc.save('data.pdf');
        } else {
            console.error('Error: jsPDF is not defined.');
        }
    }

    // Tambahkan event listener pada tombol export ke PDF
    document.getElementById('export-pdf').addEventListener('click', exportToPDF);
</script>
<style>
    /* Sesuaikan style card dengan desain yang diinginkan */
    .card {
        margin-top: 20px;
        border-radius: 8px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .card-content {
        padding: 10px;
    }

    /* Style untuk gambar profile */
    img {
        border-radius: 50%;
        /* Untuk membuat gambar menjadi bulat */
    }

    .container {
        text-align: center;
    }

    .image-wrapper {
        display: inline-block;
        margin-top: 10px;
        /* Sesuaikan jarak antara teks dan gambar */
    }

    .select-wrapper {
        margin-top: 20px;
        /* Sesuaikan jarak dari gambar ke select */
    }

    /* Style untuk label select */
    label {
        display: block;
        margin-bottom: 5px;
    }

    /* Style untuk select */
    select {
        width: 200px;
        /* Sesuaikan lebar select */
        padding: 5px;
        border-radius: 5px;
        border: 1px solid #ccc;
        font-size: 14px;
    }

    .imgp {
        margi
    }
</style>

@endsection