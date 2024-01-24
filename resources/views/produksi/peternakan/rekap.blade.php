@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Produksi</h5>
    </div>
</div>

<div class="container">
    <h6 class="text-center">peternakan</h6>
    <div class="select-wrapper">
        @if (auth()->user()->role == 'petugas')
        <a href="{{route('produksi.peternakan.tambah')}}"><button class="btn btn-secondary" style="width: 300px;">Tambah</button></a><br><br>

        @endif
        <form id="filter-form">


            <select name="jenis_ternak" id="jenis_ternak-select">
                <option value="">Pilih Jenis Ternak</option>
                <option value="sapi">sapi</option>
                <option value="kambing">kambing</option>
                <option value="ayam">ayam</option>
            </select>
            <select name="kolom" id="kolom-select">
                <option value="">Pilih Data</option>
                <option value="jumlah_ternak">Jumlah Ternak</option>
                <option value="jumlah_kandang">Jumlah Kandang</option>
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

</div>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive">
                @if (auth()->user()->role == 'dinas')
                <button id="export-excel">Excel</button>
                <button id="export-pdf"> PDF</button>
                <br>
                <br>
                @endif
                <h6>Geser >></h6>

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
                        $('#jenis_ternak-select,#kolom-select,#tahun_awal-select, #bulan_awal-select, #tahun_akhir-select, #bulan_akhir-select').change(function() {
                            var jenis_ternakValue = $('#jenis_ternak-select').val();
                            var tawal = $('#tahun_awal-select').val();
                            var bawal = $('#bulan_awal-select').val();
                            var kolom = $('#kolom-select').val();
                            console.log(kolom)
                            var takhir = $('#tahun_akhir-select').val();
                            var bakhir = $('#bulan_akhir-select').val();

                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'GET',
                                url: '/filter-produksi-ternak-kab',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    jenis_ternak: jenis_ternakValue,
                                    bulan_awal: bawal,
                                    bulan_akhir: bakhir,
                                    tahun_awal: tawal,
                                    tahun_akhir: takhir,
                                    kolom: kolom,
                                },
                                success: function(response) {
                                    console.log(response);
                                    displayDataTable(response.test);
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

            </div>
        </div>
    </div>
</div>
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