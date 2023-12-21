@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Kritik dan Saran</h5>
    </div>
</div>

<div class="container">
    <div class="select-wrapper">
        <form id="filter-form">
            @if (auth()->user()->role == 'petugas' || auth()->user()->role == 'dinas')
            <select name="kecamatan" id="kecamatan-select">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatan as $data)
                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
            @endif


            <select name="tahun" id="tahun-select">
                <option value="">Pilih Tahun</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <!-- Tambahkan opsi tahun lainnya sesuai kebutuhan -->
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
                <button id="export-excel">Excel</button>
                <button id="export-pdf"> PDF</button>
                <br>
                <br>
                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <td class="tg-0lax">no</td>
                            <td class="tg-0lax">Kecamatan</td>
                            <td class="tg-0lax">Tanggal</td>
                            <td class="tg-0lax">Kritik dan Saran</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
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
                        $('#kecamatan-select, #jenis_ternak-select, #tahun-select, #bulan-select').change(function() {
                            var desaValue = $('#kecamatan-select').val();
                            var jenis_ternakValue = $('#jenis_ternak-select').val();
                            var tahunValue = $('#tahun-select').val();
                            var bulanValue = $('#bulan-select').val();

                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '/filter-kritik',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    desa: desaValue,
                                    tahun: tahunValue,
                                },
                                success: function(response) {
                                    console.log(response);
                                    var data_sekarang = response.data_sekarang || [];

                                    var sekarangByDesa = {};

                                    data_sekarang.forEach(function(item) {
                                        sekarangByDesa[item.desa] = item;
                                    });



                                    var tableBody = $('#data-table tbody');
                                    tableBody.empty(); // Mengosongkan isi tbody sebelum memasukkan data baru


                                    data_sekarang.forEach(function(item, index) {
                                        var row = '<tr>' +
                                            '<td>' + (index + 1) + '</td>' +
                                            '<td>' + item.kecamatan + '</td>' +
                                            '<td>' + item.tanggal + '</td>' +
                                            '<td>' + item.KritikDanSaran + '</td>' +
                                            '</tr>';

                                        tableBody.append(row);
                                    });
                                },

                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });
                    });

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

                        // Untuk mengunduh file Excel
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