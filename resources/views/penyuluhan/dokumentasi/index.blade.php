@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>
<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Dokumentasi Kegiatan Penyuluhan</h5>
    </div>
</div>

<div class="container">
    <div class="select-wrapper">
        @if (auth()->user()->role == 'petugas')
        <a href="{{route('tambah-dokumentasi')}}"><button class="btn btn-secondary" style="width: 300px;">Tambah</button></a><br><br>

        @endif
        <form id="filter-form">
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

            @if (auth()->user()->role == 'dinas')
            <select name="kecamatan" id="kecamatan-select">
                <option value="">Pilih Kecamatan</option>
                @foreach ($kecamatan as $data)
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
                <!-- Tambahkan opsi desa lainnya sesuai kebutuhan -->
            </select>




        </form>
        <br>
        <!-- Pastikan ini di atas penutup tag </body> -->


    </div>

    <!-- Card Profil -->

</div>
<div class="container">
    <div class="section pb0 cssss">



    </div>
    <br>
    <br><br>
    <br>
    <!-- Add materialize.js -->
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="table-responsive">

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
                        $('#kecamatan-select, #tahun-select, #bulan-select,#desa-select').change(function() {
                            var kecamatan = $('#kecamatan-select').val();
                            var desa = $('#desa-select').val();
                            var tahunValue = $('#tahun-select').val();
                            var bulanValue = $('#bulan-select').val();
                            console.log(kecamatan);
                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '/filter-dokumentasi',
                                data: {
                                    _token: '{{ csrf_token() }}', // Tambahkan _token untuk laravel
                                    kecamatan: kecamatan,
                                    desa: desa,
                                    tahun: tahunValue,
                                    bulan: bulanValue
                                },
                                success: function(data) {
                                    // Tanggapan dari server sukses diterima
                                    // Manipulasi tampilan dengan data yang diterima dari server
                                    console.log(data); // Untuk menampilkan tanggapan dari server di konsol

                                    // Memasukkan data ke dalam kontainer Carousel
                                    $('.cssss').html(data);
                                    $('.carousel').carousel();
                                },
                                error: function(xhr, status, error) {
                                    // Tanggapan dari server gagal atau terjadi kesalahan
                                    console.error(xhr.responseText);
                                },

                                error: function(error) {
                                    console.log(error);
                                }
                            });
                        });
                    });
                </script>
                <script>
                    // Ambil semua elemen dengan kelas "download-all"
                    const downloadAllButtons = document.querySelectorAll('.download-all');

                    // Loop melalui setiap tombol "Download Semua"
                    downloadAllButtons.forEach(button => {
                        // Tambahkan event listener untuk klik pada setiap tombol
                        button.addEventListener('click', function(event) {
                            // Dapatkan elemen div yang berisi tautan unduhan
                            const downloadLinks = event.target.nextElementSibling;

                            // Ubah tampilan dari 'none' menjadi 'block' untuk menampilkan tautan unduhan
                            downloadLinks.style.display = 'block';
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