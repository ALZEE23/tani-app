@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Alsintan</h5>
    </div>
</div>

<div class="container">
    <div class="select-wrapper">
        @if (auth()->user()->role == 'petugas')
        <a href="{{route('alsintan.store')}}"><button class="btn btn-secondary" style="width: 300px;">Tambah</button></a><br><br>

        @endif
        <form id="filter-form">
            @if (auth()->user()->role == 'dinas')
            <select name="kecamatan" id="kecamatan-select">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatans as $data)
                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
            @endif

            <select name="desa" id="desa-select">
                <option value="">Pilih Desa</option>
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                    
                @endforeach
            </select>

            <select name="komoditas" id="komoditas-select">
                <option value="">Pilih Subsektor</option>
                <option value="Perkebunan">Perkebunan</option>
                <option value="Pangan">Pangan</option>
                <option value="Hortikultura">Hortikultura</option>
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
                @if (auth()->user()->role == 'dinas'|| auth()->user()->role == 'petugas')
                <button id="export-excel">Excel</button>
                <button id="export-pdf"> PDF</button>
                <br>
                <br>
                @endif
                <h6>Geser >></h6>

                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <td class="tg-0lax">no</td>
                            <td class="tg-0lax">Desa</td>
                            <td class="tg-0lax">Poktan</td>
                            <td class="tg-0lax">Ketua Poktan</td>
                            <td class="tg-0lax">Kontak</td>
                            <td class="tg-0lax">Jenis Alat/Mesin</td>
                            <td class="tg-0lax">Jumlah</td>
                            <td class="tg-0lax">Tahun Bantuan</td>
                            <td class="tg-0lax">Foto</td>
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
                        $('#kecamatan-select').change(function() {
                            var kecValue = $('#kecamatan-select').val();
                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '/get-desa',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    kecamatan: kecValue,
                                },
                                success: function(response) {
                                    console.log(response);
                                    $('#desa-select').empty();
                                    // Tambahkan opsi pertama sebagai default
                                    $('#desa-select').append('<option value="">Pilih Desa</option>');
                                    $('#data-table tbody').empty();

                                    // Tambahkan data ke dalam tbody
                                    $.each(response.alsintans, function(key, value) {
                                        $('#data-table tbody').append(`
                                        <tr>
                                            <td class="tg-0lax">${key + 1}</td>
                                            <td class="tg-0lax">${value.desa}</td>
                                            <td class="tg-0lax">${value.gapoktan}</td>
                                            <td class="tg-0lax">${value.ketua_gapoktan}</td>
                                            <td class="tg-0lax">${value.kontak}</td>
                                            <td class="tg-0lax">${value.alat}</td>
                                            <td class="tg-0lax">${value.jumlah_alat}</td>
                                            <td class="tg-0lax">${value.tahun}</td>
                                            <td class="tg-0lax"><img style="width: 100px;" src="{{asset('storage/gambar/${value.gambar}')}}"></td>
                                        </tr>
                                    `);
                                    });
                                    // Loop melalui response dan tambahkan opsi untuk setiap elemen dalam response
                                    $.each(response.desa, function(key, value) {
                                        $('#desa-select').append('<option value="' + value + '">' + value + '</option>');
                                    });
                                    $('#desa-select').formSelect();
                                }
                            });
                        });
                    });
                    $(document).ready(function() {
                        $('#desa-select').change(function() {
                            var desaValue = $('#desa-select').val();
                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '/get-alsintan',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    desa: desaValue,
                                },
                                success: function(response) {
                                    console.log(response);
                                    $('#data-table tbody').empty();

                                    // Tambahkan data ke dalam tbody
                                    $.each(response.alsintans, function(key, value) {
                                        $('#data-table tbody').append(`
                                        <tr>
                                            <td class="tg-0lax">${key + 1}</td>
                                            <td class="tg-0lax">${value.desa}</td>
                                            <td class="tg-0lax">${value.gapoktan}</td>
                                            <td class="tg-0lax">${value.ketua_gapoktan}</td>
                                            <td class="tg-0lax">${value.kontak}</td>
                                            <td class="tg-0lax">${value.alat}</td>
                                            <td class="tg-0lax">${value.jumlah_alat}</td>
                                            <td class="tg-0lax">${value.tahun}</td>
                                            <td class="tg-0lax"><img style="width: 100px;" src="{{asset('storage/gambar/${value.gambar}')}}"></td>
                                        </tr>
                                    `);
                                    });
                                    // Loop melalui response dan tambahkan opsi untuk setiap elemen dalam response
                                    $.each(response.desa, function(key, value) {
                                        $('#desa-select').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                    $('#desa-select').formSelect();
                                }
                            });
                        });
                    });
                    $(document).ready(function() {
                        $('#komoditas-select').change(function() {
                            var desaValue = $('#desa-select').val();
                            var komoditasValue = $('#komoditas-select').val();
                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '/get-alsintan2',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    desa: desaValue,
                                    komoditas: komoditasValue,
                                },
                                success: function(response) {
                                    console.log(response);
                                    $('#data-table tbody').empty();

                                    // Tambahkan data ke dalam tbody
                                    $.each(response.alsintans, function(key, value) {
                                        $('#data-table tbody').append(`
                                        <tr>
                                            <td class="tg-0lax">${key + 1}</td>
                                            <td class="tg-0lax">${value.desa}</td>
                                            <td class="tg-0lax">${value.gapoktan}</td>
                                            <td class="tg-0lax">${value.ketua_gapoktan}</td>
                                            <td class="tg-0lax">${value.kontak}</td>
                                            <td class="tg-0lax">${value.alat}</td>
                                            <td class="tg-0lax">${value.jumlah_alat}</td>
                                            <td class="tg-0lax">${value.tahun}</td>
                                            <td class="tg-0lax"><img style="width: 100px;" src="{{asset('storage/gambar/${value.gambar}')}}"></td>
                                        </tr>
                                    `);
                                    });
                                    // Loop melalui response dan tambahkan opsi untuk setiap elemen dalam response
                                    $.each(response.desa, function(key, value) {
                                        $('#desa-select').append('<option value="' + key + '">' + value + '</option>');
                                    });
                                    $('#desa-select').formSelect();
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