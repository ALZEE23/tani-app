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
    <h6 class="text-center">Rekap Tanaman</h6>
    <div class="select-wrapper">
        <form id="filter-form">
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
            <select name="kolom" id="kolom-select">
                <option value="">Pilih Data</option>
                <option value="panen">panen</option>
                <option value="gagal_panen">gagal_panen</option>
                <option value="produksi">Produksi</option>
                <option value="tanam">tanam</option>
                <option value="provitas">provitas</option>
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
                <option value="8">Agustuus</option>
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
<table id="data-table">
    <thead>
    </thead>
    <tbody>
        <!-- Di sinilah data akan ditambahkan oleh JavaScript -->
    </tbody>
</table>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    var nomorUrutan = 1;

    // jQuery
    $(document).ready(function() {
        $('#komoditas-select, #kolom-select, #tahun_awal-select, #bulan_awal-select, #tahun_akhir-select, #bulan_akhir-select').change(function() {

            var komoditasValue = $('#komoditas-select').val();
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
                    console.log(response);
                    if (response.grouped_data) {
                        createTableHeaders(response.grouped_data);
                        populateTableBody(response.grouped_data);
                    }
                },

                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    function createTableHeaders(data) {
        const thead = document.querySelector('thead');
        thead.innerHTML = ''; // Clear existing thead content

        const headerRow = document.createElement('tr');
        const months = Object.keys(data[Object.keys(data)[0]]); // Get month names from the server response

        // First column is for 'Kecamatan'
        const kecamatanHeader = document.createElement('th');
        kecamatanHeader.textContent = 'Kecamatan';
        headerRow.appendChild(kecamatanHeader);

        // Create columns for each month in the response
        months.forEach(month => {
            const monthHeader = document.createElement('th');
            monthHeader.textContent = month;
            headerRow.appendChild(monthHeader);
        });

        thead.appendChild(headerRow);
    }
    

    // Function to populate table body based on the server response
    function populateTableBody(data) {
        const tbody = document.querySelector('tbody');
        tbody.innerHTML = ''; // Clear existing tbody content

        Object.keys(data).forEach(kecamatan => {
            const row = document.createElement('tr');

            // Create cell for 'Kecamatan'
            const kecamatanCell = document.createElement('td');
            kecamatanCell.textContent = kecamatan;
            row.appendChild(kecamatanCell);

            // Create cells for each month's data
            Object.values(data[kecamatan]).forEach(value => {
                const cell = document.createElement('td');
                cell.textContent = value;
                row.appendChild(cell);
            });

            tbody.appendChild(row);
        });
    }
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