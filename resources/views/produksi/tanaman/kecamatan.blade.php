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
    <h6 class="text-center">Tanaman</h6>
    <div class="select-wrapper">
        @if (auth()->user()->role == 'petugas')
        <a href="{{route('produksi.tanaman.tambah')}}"><button class="btn btn-secondary" style="width: 300px;">Tambah</button></a><br><br>
        @endif
        <form id="filter-form">
            @if (auth()->user()->role == 'dinas')
            <select name="kecamatan" id="kecamatan-select">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatan as $data)
                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
            @endif

            <select name="komoditas" id="komoditas-select">
                <option value="">Pilih Komoditas</option>
                <option value="teh">TEH</option>
                <option value="kopi">KOPI</option>
                <option value="tebu">TEBU</option>
                <option value="tobacco">TEMBAKAU</option>
                <option value="cengkeh">CENGKEH</option>
                <option value="kelapa">KELAPA</option>
                <option value="aren">AREN</option>
                <option value="nilam">NILAM</option>
                <option value="lada">LADA</option>
                <option value="kemiri">KEMIRI</option>
            </select>

            <select name="tahun" id="tahun-select">
                <option value="">Pilih Tahun</option>
                <option value="2023">2023</option>
                <option value="2024">2024</option>
                <!-- Tambahkan opsi tahun lainnya sesuai kebutuhan -->
            </select>

            <select name="bulan" id="bulan-select">
                <option value="">Pilih Bulan</option>
                <option value="1">Januari</option>
                <option value="2">Februari</option>
                <option value="3">Maret</option>
                <option value="4">April</option>
                <option value="5">Mei</option>
                <option value="6">Juni</option>
                <option value="7">Juli</option>
                <option value="8">Agustuus</option>
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
                @if (auth()->user()->role == 'petugas' || auth()->user()->role == 'dinas')
                <button id="export-excel">Excel</button>
                <button id="export-pdf"> PDF</button>
                <br>
                <br>
                @endif
                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <td class="tg-0lax" rowspan="2">no</td>
                            <td class="tg-0lax" rowspan="2">Kecamatan</td>
                            <td class="tg-0lax" rowspan="2">Desa</td>
                            <td class="tg-0lax" colspan="2">Tanaman(HA)</td>
                            <td class="tg-0lax" colspan="2">Panen(HA)</td>
                            <td class="tg-0lax" colspan="2">Gagal Panen(HA)</td>
                            <td class="tg-0lax" colspan="2">Produksi(T)</td>
                            <td class="tg-0lax" colspan="5">Rekap Bulan Ini</td>
                        </tr>
                        <tr>
                            <td class="tg-0lax">Bulan Lalu</td>
                            <td class="tg-0lax">Bulan Ini</td>
                            <td class="tg-0lax">Bulan Lalu</td>
                            <td class="tg-0lax">Bulan Ini</td>
                            <td class="tg-0lax">Bulan Lalu</td>
                            <td class="tg-0lax">Bulan Ini</td>
                            <td class="tg-0lax">Bulan Lalu</td>
                            <td class="tg-0lax">Bulan Ini</td>
                            <td class="tg-0lax">Tanam</td>
                            <td class="tg-0lax">Panen</td>
                            <td class="tg-0lax">Gagal Panen</td>
                            <td class="tg-0lax">Produksi</td>
                            <td class="tg-0lax">Provitas</td>
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
                        $('#kecamatan-select, #komoditas-select, #tahun-select, #bulan-select').change(function() {
                            var desaValue = $('#kecamatan-select').val();
                            var komoditasValue = $('#komoditas-select').val();
                            var tahunValue = $('#tahun-select').val();
                            var bulanValue = $('#bulan-select').val();

                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '/filter-produksi',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    desa: desaValue,
                                    komoditas: komoditasValue,
                                    tahun: tahunValue,
                                    bulan: bulanValue
                                },
                                success: function(response) {
                                    console.log(response);
                                    var data_sekarang = response.data_sekarang || [];
                                    var data_bulan_lalu = response.data_bulan_lalu || [];

                                    var sekarangByDesa = {};
                                    var bulanLaluByDesa = {};

                                    data_sekarang.forEach(function(item) {
                                        sekarangByDesa[item.desa] = item;
                                    });

                                    data_bulan_lalu.forEach(function(item) {
                                        bulanLaluByDesa[item.sebelum_desa] = item;
                                    });

                                    var mergedData = [];

                                    Object.keys(sekarangByDesa).forEach(function(desa) {
                                        var mergedItem = {
                                            desa: desa,
                                            komoditas: sekarangByDesa[desa].komoditas || null,
                                            tanam: sekarangByDesa[desa].tanam || 0,
                                            panen: sekarangByDesa[desa].panen || 0,
                                            gagal_panen: sekarangByDesa[desa].gagal_panen || 0,
                                            produksi: sekarangByDesa[desa].produksi || 0,
                                            provitas: sekarangByDesa[desa].provitas || 0,
                                            kecamatan: sekarangByDesa[desa].kecamatan || 0
                                        };

                                        if (bulanLaluByDesa[desa]) {
                                            mergedItem.sebelum_desa = bulanLaluByDesa[desa].sebelum_desa || null;
                                            mergedItem.sebelum_komoditas = bulanLaluByDesa[desa].sebelum_komoditas || null;
                                            mergedItem.sebelum_tanam = bulanLaluByDesa[desa].sebelum_tanam || 0;
                                            mergedItem.sebelum_panen = bulanLaluByDesa[desa].sebelum_panen || 0;
                                            mergedItem.sebelum_gagal_panen = bulanLaluByDesa[desa].sebelum_gagal_panen || 0;
                                            mergedItem.sebelum_produksi = bulanLaluByDesa[desa].sebelum_produksi || 0;
                                            mergedItem.sebelum_provitas = bulanLaluByDesa[desa].sebelum_provitas || 0;
                                        } else {
                                            mergedItem.sebelum_desa = null;
                                            mergedItem.sebelum_komoditas = null;
                                            mergedItem.sebelum_tanam = 0;
                                            mergedItem.sebelum_panen = 0;
                                            mergedItem.sebelum_gagal_panen = 0;
                                            mergedItem.sebelum_produksi = 0;
                                            mergedItem.sebelum_provitas = 0;
                                        }

                                        mergedData.push(mergedItem);
                                    });

                                    console.log(mergedData);

                                    var tableBody = $('#data-table tbody');
                                    tableBody.empty(); // Mengosongkan isi tbody sebelum memasukkan data baru


                                    mergedData.forEach(function(item, index) {
                                        var totalPanen = parseInt(item.panen) + parseInt(item.sebelum_panen); // Menghitung total panen
                                        var totaltanam = parseInt(item.tanam) + parseInt(item.sebelum_tanam); // Menghitung total panen
                                        var totalgagal_panen = parseInt(item.gagal_panen) + parseInt(item.sebelum_gagal_panen); // Menghitung total panen
                                        var totalproduksi = parseInt(item.produksi) + parseInt(item.sebelum_produksi); // Menghitung total panen
                                        var totalprovitas = parseInt(item.provitas) + parseInt(item.sebelum_provitas); // Menghitung total panen
                                        var row = '<tr>' +
                                            '<td>' + (index + 1) + '</td>' +
                                            '<td>' + item.kecamatan + '</td>' +
                                            '<td>' + item.desa + '</td>' +
                                            '<td>' + item.sebelum_tanam + '</td>' +
                                            '<td>' + item.tanam + '</td>' +
                                            '<td>' + item.sebelum_panen + '</td>' +
                                            '<td>' + item.panen + '</td>' +
                                            '<td>' + item.sebelum_gagal_panen + '</td>' +
                                            '<td>' + item.gagal_panen + '</td>' +
                                            '<td>' + item.sebelum_produksi + '</td>' +
                                            '<td>' + item.produksi + '</td>' +
                                            '<td>' + totaltanam + '</td>' +
                                            '<td>' + totalPanen + '</td>' +
                                            '<td>' + totalgagal_panen + '</td>' +
                                            '<td>' + totalproduksi + '</td>' +
                                            '<td>' + totalprovitas + '</td>' +
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