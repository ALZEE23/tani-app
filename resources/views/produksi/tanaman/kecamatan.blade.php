@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Produksi Tanaman</h5>

    </div>
    <br>
    @if(count($belum_panen) > 0)
    @foreach ($belum_panen as $belum)

    <?php
    // Mendapatkan tanggal dari variabel $belum->tanggal (misalnya "2023-10-01")
    $tanggalPanen = $belum->tanggal;
    // Mengonversi format tanggal ke "F Y" (Oktober 2023)
    $tanggalOktober2023 = strftime("%B %Y", strtotime($tanggalPanen));

    // Pesan dengan tanggal yang sudah diubah
    echo "<h6 style='color:red'>Kamu belum mengisi data panen untuk bulan {$tanggalOktober2023}.</h6>";
    ?>


    @endforeach
    @endif
</div>

<div class="container">
    <!-- <h6 class="text-center">Tanaman</h6> -->
    <div class="select-wrapper">
        @if (auth()->user()->role == 'petugas')
        <a href="{{route('produksi.tanaman.tambah')}}"><button class="btn btn-secondary" style="width: 300px;">Tambah Satuan</button></a><br><br>
        <!-- <a href="{{route('produksi.tanaman.tambahexel')}}"><button class="btn btn-secondary" style="width: 300px;">Tambah Exel</button></a><br><br> -->
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

            <select name="komoditas" id="subsektor">
                <option value="">Pilih Subsektor</option>
                <option value="Pangan">Pangan</option>
                <option value="Hortikultura">Hortikultura</option>
            </select>
            <select name="komoditas2" id="komoditas2">
                <option value="">Pilih Komoditas</option>
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
                <h6>Geser >></h6>
                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <td class="tg-0lax" rowspan="2">no</td>
                            <td class="tg-0lax" rowspan="2">Kecamatan</td>
                            <td class="tg-0lax" rowspan="2">Desa</td>
                            <td class="tg-0lax" rowspan="2">Bulan</td>
                            <td class="tg-0lax" colspan="2">Tanaman(HA)</td>
                            <td class="tg-0lax" colspan="2">Panen(HA)</td>
                            <td class="tg-0lax" colspan="2">Gagal Panen(HA)</td>
                            <td class="tg-0lax" colspan="2">Produksi(T)</td>
                            <td class="tg-0lax" colspan="6">Akumulasi Bulan Laporan</td>
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
                            <td class="tg-0lax">total Tanam</td>
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
                        $('#kecamatan-select, #komoditas,#komoditas2, #tahun-select, #bulan-select').change(function() {
                            var kecamatanValue = $('#kecamatan-select').val();
                            var komoditasValue = $('#komoditas').val();
                            var komoditas2Value = $('#komoditas2').val();
                            var tahunValue = $('#tahun-select').val();
                            var bulanValue = $('#bulan-select').val();

                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '/filter-produksi',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    kecamatan: kecamatanValue,
                                    komoditas: komoditasValue,
                                    komoditas2: komoditas2Value,
                                    tahun: tahunValue,
                                    bulan: bulanValue
                                },
                                success: function(response) {
                                    console.log(response);
                                    var data_sekarang = response.data_sekarang;

                                    var tableBody = $('#data-table tbody');
                                    tableBody.empty(); // Mengosongkan isi tbody sebelum memasukkan data baru


                                    data_sekarang.forEach(function(item, index) {
                                        var date = new Date(item.tanggal);
                                        var monthNames = [
                                            "Januari", "Februari", "Maret",
                                            "April", "Mei", "Juni", "Juli",
                                            "Agustus", "September", "Oktober",
                                            "November", "Desember"
                                        ];
                                        var monthIndex = date.getMonth();
                                        var monthName = monthNames[monthIndex];
                                        var totalPanen = parseInt(item.panen_bulan_sekarang) + parseInt(item.panen_bulan_terakhir); // Menghitung total panen
                                        var totaltanam = parseInt(item.tanam_bulan_sekarang) + parseInt(item.tanam_bulan_lalu); // Menghitung total panen
                                        var totalgagal_panen = parseInt(item.gagal_panen_bulan_sekarang) + parseInt(item.gagal_panen_bulan_terakhir); // Menghitung total panen
                                        var totalproduksi = parseInt(item.produksi_bulan_sekarang) + parseInt(item.produksi_bulan_terakhir); // Menghitung total panen
                                        var totalprovitas = totalproduksi / totalPanen; // Menghitung total panen
                                        var total = totalPanen + totaltanam + totalgagal_panen; // Menghitung total panen
                                        var row = '<tr>' +
                                            '<td>' + (index + 1) + '</td>' +
                                            '<td>' + item.kecamatan + '</td>' +
                                            '<td>' + item.desa + '</td>' +
                                            '<td>' + monthName + '</td>' +
                                            '<td>' + item.tanam_bulan_lalu + '</td>' +
                                            '<td>' + item.tanam_bulan_sekarang + '</td>' +
                                            '<td>' + item.panen_bulan_terakhir + '</td>' +
                                            '<td>' + item.panen_bulan_sekarang + '</td>' +
                                            '<td>' + item.gagal_panen_bulan_terakhir + '</td>' +
                                            '<td>' + item.gagal_panen_bulan_sekarang + '</td>' +
                                            '<td>' + item.produksi_bulan_terakhir + '</td>' +
                                            '<td>' + item.produksi_bulan_sekarang + '</td>' +
                                            '<td>' + totaltanam + '</td>' +
                                            '<td>' + totalPanen + '</td>' +
                                            '<td>' + totalgagal_panen + '</td>' +
                                            '<td>' + totalproduksi + '</td>' +
                                            '<td>' + totalprovitas + '</td>' +
                                            '<td>' + total + '</td>' +
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