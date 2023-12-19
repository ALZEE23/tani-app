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
            @if (auth()->user()->role == 'dinas_peternakan')
            <select name="kecamatan" id="kecamatan-select">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatan as $data)
                <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
                @endforeach
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>
            @endif

            <select name="jenis_ternak" id="jenis_ternak-select">
                <option value="">Pilih Jenis Ternak</option>
                <option value="sapi">sapi</option>
                <option value="kambing">kambing</option>
                <option value="ayam">ayam</option>
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

                <table class="table table-bordered" id="data-table">
                    <thead>
                        <tr>
                            <td class="tg-0lax">no</td>
                            <td class="tg-0lax">Desa</td>
                            <td class="tg-0lax">Jenis Ternak</td>
                            <td class="tg-0lax">Jumlah Kandang</td>
                            <td class="tg-0lax">Jumlah Ternak</td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                                url: '/filter-produksi-ternak',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    desa: desaValue,
                                    jenis_ternak: jenis_ternakValue,
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
                                            jenis_ternak: sekarangByDesa[desa].jenis_ternak || null,
                                            jumlah_ternak: sekarangByDesa[desa].jumlah_ternak || 0,
                                            jumlah_kandang: sekarangByDesa[desa].jumlah_kandang || 0,
                                            kecamatan: sekarangByDesa[desa].kecamatan || 0
                                        };

                                        if (bulanLaluByDesa[desa]) {
                                            mergedItem.sebelum_desa = bulanLaluByDesa[desa].sebelum_desa || null;
                                            mergedItem.sebelum_jenis_ternak = bulanLaluByDesa[desa].sebelum_jenis_ternak || null;
                                            mergedItem.sebelum_jumlah_ternak = bulanLaluByDesa[desa].sebelum_jumlah_ternak || 0;
                                            mergedItem.sebelum_jumlah_kandang = bulanLaluByDesa[desa].sebelum_jumlah_kandang || 0;
                                        } else {
                                            mergedItem.sebelum_desa = null;
                                            mergedItem.sebelum_jenis_ternak = null;
                                            mergedItem.sebelum_jumlah_ternak = 0;
                                            mergedItem.sebelum_jumlah_kandang = 0;
                                        }

                                        mergedData.push(mergedItem);
                                    });

                                    console.log(mergedData);

                                    var tableBody = $('#data-table tbody');
                                    tableBody.empty(); // Mengosongkan isi tbody sebelum memasukkan data baru


                                    mergedData.forEach(function(item, index) {
                                        var row = '<tr>' +
                                            '<td>' + (index + 1) + '</td>' +
                                            '<td>' + item.desa + '</td>' +
                                            '<td>' + item.jenis_ternak + '</td>' +
                                            '<td>' + item.jumlah_kandang + '</td>' +
                                            '<td>' + item.jumlah_ternak + '</td>' +
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