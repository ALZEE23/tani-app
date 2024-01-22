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
        <a href="{{route('poktan-register')}}">
            <button class="btn btn-primary">Daftar Menjadi Anggota</button>
        </a>
        <br>
        <!-- @ if (auth()->user()->role == 'dinas') -->
        <style>
            .select-wrapper {
                display: flex;
                justify-content: center;
                align-items: center;
                flex-direction: column;
            }
        </style>
        @if (auth()->user()->role == 'petugas')
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
        @endif
        <!-- @ endif -->
        <script>
            function changekec() {
                const kec = document.getElementById('kecamatan').value;
                window.location.href = "{{ url('/cskecamatan/session') }}/" + encodeURIComponent(kec);
            }

            function csdesa() {
                const desa = document.getElementById('desa').value;
                window.location.href = "{{ url('/csdesa/session') }}/" + encodeURIComponent(desa);
            }
        </script>
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


    @if (auth()->user()->role == 'dinas' || auth()->user()->role == 'petugas'|| auth()->user()->role == 'petugas_poktan' )
    <button id="export-excel">Excel</button>
    <button id="export-pdf"> PDF</button>
    @endif
    <br>
    <br>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <style>
                    th {
                        vertical-align: middle;
                        /* Menengahkan teks secara vertikal di dalam sel */
                        line-height: normal;
                        /* Mengatur ketinggian baris ke nilai normal */
                    }
                </style>
                <div class="">
                    <table class="table table-bordered" border="1" id="data-table">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th width="10%">Tgl Daftar</th>
                                <th>Desa Lokasi Lahan</th>
                                <th>Nama Poktan</th>
                                <th>Nik Petani</th>
                                <th>Nama Petani</th>
                                <th>Status</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $no = 1;
                            @endphp
                            @foreach ($daftarpoktans as $data)
                            <tr>
                                <td>{{$no++}}</td>
                                <td>{{ \Carbon\Carbon::parse($data->created_at)->format('d/m/Y') }}</td>

                                <td>{{$data->desa}}</td>
                                <td>{{$data->poktan}}</td>
                                <td>{{$data->nik}}</td>
                                <td>{{$data->nama}}</td>
                                <td>{{$data->status}}</td>
                                <td>
                                    <a class="btn btn-secondary" href="{{route('detail-register-poktan',$data->id)}}">Lihat</a>
                                    @if ($data->status != 'Anggota' && auth()->user()->role == 'petugas_poktan')
                                    <br>
                                    <a style="margin-top: 10px; background-color:#96cf66" class="btn btn-danger" href="{{route('acc-register',$data->id)}}">Acc</a>
                                    @endif
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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>
<script>
    function exportToExcel() {
        var excludeColumnIndex = 8; // Index of the "Opsi" column

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
<br><br><br>
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