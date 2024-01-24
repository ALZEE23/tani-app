@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle" style="color:white">Produksi</h5>
    </div>
</div>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th,
    td {
        border: 1px solid #ddd;
        padding: 8px;
        text-align: left;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
<div class="container">
    <br>
    <h3 class="text-center">Rekap Tanaman</h3>
    <div class="select-wrapper">
        <form id="filter-form">

            <select name="komoditas" id="subsektor">
                <option value="">Pilih Subsektor</option>
                <option value="Pangan">Pangan</option>
                <option value="Hortikultura">Hortikultura</option>
            </select>
            <select name="komoditas2" id="komoditas2">
                <option value="">Pilih Komoditas</option>
            </select>
            <select name="kolom" id="kolom-select">
                <option value="">Pilih Data</option>
                <option value="panen_bulan_sekarang">panen</option>
                <option value="gagal_panen_bulan_sekarang">gagal_panen</option>
                <option value="produksi_bulan_sekarang">Produksi</option>
                <option value="tanam_bulan_sekarang">tanam</option>
            </select>

            <select name="tahun_awal" id="tahun_awal-select">
                <option value="">Pilih Tahun Awal</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <!-- Tambahkan opsi tahun lainnya sesuai kebutuhan -->
            </select>

            <select name="bulan_awal" id="bulan_awal-select">
                <option value="">Pilih Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
                <!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
            </select>
            <select name="tahun_akhir" id="tahun_akhir-select">
                <option value="">Pilih Tahun akhir</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <!-- Tambahkan opsi tahun lainnya sesuai kebutuhan -->
            </select>

            <select name="bulan_akhir" id="bulan_akhir-select">
                <option value="">Pilih Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustus</option>
                <option value="9">September</option>
                <option value="10">Oktober</option>
                <option value="11">November</option>
                <option value="12">Desember</option>
                <!-- Tambahkan opsi bulan lainnya sesuai kebutuhan -->
            </select>

        </form>
        <br>
        <!-- Pastikan ini di atas penutup tag </body> -->


    </div>

    <!-- Card Profil -->
    @if (auth()->user()->role == 'dinas')
    <button id="export-excel">Excel</button>
    <button id="export-pdf"> PDF</button>
    <br>
    <br>
    @endif
</div>

<div class="table-responsive">
    <div id="dataTableContainer"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/FileSaver.js/2.0.5/FileSaver.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.4/jspdf.min.js"></script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script> -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.13/jspdf.plugin.autotable.min.js"></script>

<script>
    var nomorUrutan = 1;


    // jQuery
    $(document).ready(function() {
        $('#komoditas2, #kolom-select, #tahun_awal-select, #bulan_awal-select, #tahun_akhir-select, #bulan_akhir-select').change(function() {
            const selectedKolom = document.getElementById('kolom-select').value;
            var komoditasValue = $('#komoditas2').val();
            var kolom = $('#kolom-select').val();
            var tawal = $('#tahun_awal-select').val();
            var bawal = $('#bulan_awal-select').val();
            var takhir = $('#tahun_akhir-select').val();
            var bakhir = $('#bulan_akhir-select').val();
            console.log(komoditasValue);
            // Kirim permintaan Ajax
            $.ajax({
                type: 'POST',
                url: '{{route("produksi.tanaman.rekap.proses")}}',
                data: {
                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                    bulan_awal: bawal,
                    bulan_akhir: bakhir,
                    tahun_awal: tawal,
                    tahun_akhir: takhir,
                    kolom: kolom,
                    komoditas: komoditasValue,
                },
                success: function(response) {
                    console.log(response)
                    displayDataTable(response.test);
                    // Mengelompokkan data berdasarkan tahun dan bulan

                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    function displayDataTable(data) {
        // Mendapatkan nama kecamatan, tahun, dan bulan
        let allKecamatans = [];
        let allYears = [];
        let allMonths = {};

        for (let year in data) {
            allYears.push(year);
            allMonths[year] = [];

            for (let month in data[year]) {
                allMonths[year].push(month);

                for (let kecamatan in data[year][month]) {
                    if (!allKecamatans.includes(kecamatan)) {
                        allKecamatans.push(kecamatan);
                    }
                }
            }
        }

        // Mengurutkan nama kecamatan, tahun, dan bulan
        allKecamatans.sort();
        allYears.sort();

        // Membuat tabel HTML
        let tableHtml = '<table id="data-table">';
        tableHtml += '<tr><th rowspan="2">No.</th><th rowspan="2">Kecamatan</th>'; // Kolom untuk nomor urut dan kecamatan

        for (let year of allYears) {
            tableHtml += `<th colspan="${allMonths[year].length}">${year}</th>`;
        }

        tableHtml += '</tr>';

        for (let year of allYears) {
            for (let month of allMonths[year]) {
                tableHtml += `<th>${month}</th>`;
            }
        }

        tableHtml += '</tr>';

        allKecamatans.forEach((kecamatan, index) => {
            tableHtml += `<tr><td>${index + 1}</td><td>${kecamatan}</td>`;

            for (let year of allYears) {
                for (let month of allMonths[year]) {
                    let value = data[year][month][kecamatan] || 0;
                    tableHtml += `<td>${value}</td>`;
                }
            }

            tableHtml += '</tr>';
        });

        tableHtml += '<tr><td colspan="2">Total :</td>';

        for (let year of allYears) {
            for (let month of allMonths[year]) {
                let monthTotal = allKecamatans.reduce((acc, kecamatan) => {
                    return acc + parseInt(data[year][month][kecamatan] || 0, 10);
                }, 0);
                tableHtml += `<td>${monthTotal}</td>`;
            }
        }

        tableHtml += '</tr></table>';

        // Menampilkan tabel dalam container
        $('#dataTableContainer').html(tableHtml);
    }

    function exportToExcel() {
        var wb = XLSX.utils.table_to_book(document.getElementById('data-table'), {
            sheet: 'Sheet JS'
        });
        var wbout = XLSX.write(wb, {
            bookType: 'xlsx',
            type: 'binary'
        });

        function s2ab(s) {
            var buf = new ArrayBuffer(s.length);
            var view = new Uint8Array(buf);
            for (var i = 0; i < s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
            return buf;
        }

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
<script>

</script>
<script>
    $(document).ready(function() {

        $('#subsektor').change(function() {
            console.log("A")
            var komoditasValue = $(this).val();
            var kecamatanValue = "A";

            $.ajax({
                type: 'POST',
                url: '{{route("pasar.filter_komoditas")}}',
                data: {
                    _token: '{{ csrf_token() }}',
                    komoditas: komoditasValue,
                    kecamatan: kecamatanValue
                },
                success: function(response) {
                    var hargaArray = response.harga;

                    // Clear existing options
                    $('#komoditas2').empty();

                    // Add a default option\
                    var uniqueKomoditasSet = new Set();
                    $('#komoditas2').append('<option value="">Pilih Komoditas</option>');
                    if (komoditasValue === 'Hortikultura') {
                        const allowedKomoditas = ['Bawang Daun', 'Bawang Merah', 'Bawang Putih', 'Kembang Kol', 'Kentang', 'Kubis', 'Petsai/Sawi', 'Wortel', 'Bayam', 'Buncis', 'Kangkung'];

                        $.each(hargaArray, function(index, product) {
                            if (allowedKomoditas.includes(product.produk) && !uniqueKomoditasSet.has(product.produk)) {
                                uniqueKomoditasSet.add(product.produk);
                                $('#komoditas2').append('<option value="' + product.produk + '">' + product.produk + '</option>');
                            }
                        });
                    } else {
                        // Jika komoditasValue bukan Hortikultura, tambahkan semua komoditas ke opsi
                        $.each(hargaArray, function(index, product) {
                            if (!uniqueKomoditasSet.has(product.produk)) {
                                uniqueKomoditasSet.add(product.produk);
                                $('#komoditas2').append('<option value="' + product.produk + '">' + product.produk + '</option>');
                            }
                        });
                    }
                    $('#komoditas2').formSelect();

                    console.log(response);
                    const isoDate = response.last;

                    // Buat objek Date dari tanggal ISO 8601
                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });
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