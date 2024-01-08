@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Akses Pasar</h5>
    </div>
</div>

<div class="container">
    <h6 class="text-center">Pasar {{auth()->user()->kecamatan}}</h6>
    <div class="image-wrapper">
        <img alt="image" src="{{ asset('images/market.png') }}" style="width: 100px; height:100px">
    </div>
    @if (auth()->user()->role == 'dinas')
    @if (isset($key))
    <div class="select-wrapper">
        <label for="kecamatan">Pilih Kecamatan:</label>

        <select id="kecamatan" name="kecamatan" onchange="redirectToSelectedKecamatan()">
            <option value="">Pilih Kecamatan</option>
            @foreach ($kecamatan as $data)
            <option {{ $key == $data->kecamatan ? 'selected' : '' }} value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
            @endforeach
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
    </div>
    @else
    <div class="select-wrapper">
        <label for="kecamatan">Pilih Kecamatan:</label>
        <select id="kecamatan" name="kecamatan" onchange="redirectToSelectedKecamatan()">
            <option value="">Pilih Kecamatan</option>
            @foreach ($kecamatan as $data)
            <option {{ $data->kecamatan == session('kecamatan') ? 'selected':''}} value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
            @endforeach
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
    </div>
    @endif

    @endif

    <script>
        function redirectToSelectedKecamatan() {
            const selectedKecamatan = document.getElementById('kecamatan').value;
            window.location.href = "{{ url('pasar-filter') }}/" + encodeURIComponent(selectedKecamatan);
        }
    </script>

    <!-- Card Profil -->
    @if(auth()->user()->role == 'petugas')<br>
    <a href="{{route('pasar.tambah')}}">
        <button class="btn btn-primary">tambah</button>
    </a>
    @endif
    <div class="select-wrapper">
        <label for="komoditas">Pilih Komoditas:</label>
        <select id="komoditas-select" name="komoditas-select">
            <option value="Hortikultura">Hortikultura</option>
            <option value="Pangan">Pangan</option>
            <option value="Perkebunan">Perkebunan</option>
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
    </div>
    <br>
    <br>
    <h6>Harga Umum Seluruh Majalengka</h6>
    <h6 id="last">Update :</h6>
    <div class="table">
        <div class="table-bordered">
            <div class="row valign-wrapper">

                <table id="your-table-id">
                    <thead>
                        <tr>
                            <th>Kode Produk</th>
                            <th>Harga</th>
                        </tr>
                    </thead>
                    @php
                    @endphp
                    <tbody>
                        @foreach ($harga as $h)
                        <tr>
                            <td>{{$h->kode_produk}}</td>
                            <td>Rp.{{$h->harga}}</td>
                        </tr>
                        @endforeach
                    </tbody>

                </table>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

                <script>
                    function formatRupiah(angka) {
                        var reverse = angka.toString().split('').reverse().join('');
                        var ribuan = reverse.match(/\d{1,3}/g);
                        var formatted = ribuan.join('.').split('').reverse().join('');
                        return 'Rp. ' + formatted;
                    }
                    $(document).ready(function() {

                        $('#komoditas-select').change(function() {
                            var komoditasValue = $(this).val();
                            var kecamatanValue = $('#kecamatan').val();

                            console.log(kecamatanValue);

                            // Kirim permintaan Ajax
                            $.ajax({
                                type: 'POST',
                                url: '{{route("pasar.filter_komoditas")}}',
                                data: {
                                    _token: '{{ csrf_token() }}',
                                    komoditas: komoditasValue,
                                    kecamatan: kecamatanValue
                                },
                                success: function(response) {
                                    console.log(response);
                                    const isoDate = response.last;

                                    // Buat objek Date dari tanggal ISO 8601
                                    const date = new Date(isoDate);

                                    // Daftar nama bulan dalam bahasa Indonesia
                                    const monthsInIndonesian = [
                                        'jan', 'feb', 'mar', 'apr', 'mei', 'jun',
                                        'jul', 'ags', 'sep', 'okt', 'nov', 'des'
                                    ];

                                    // Dapatkan komponen tanggal, bulan, dan tahun
                                    const day = date.getDate();
                                    const monthIndex = date.getMonth();
                                    const year = date.getFullYear();

                                    // Buat format tanggal '4 jan 2024'
                                    const formattedDate = `${day} ${monthsInIndonesian[monthIndex]} ${year}`;

                                    console.log(formattedDate);
                                    $('#last').empty();
                                    $('#last').append("Update : " + formattedDate);

                                    // Ambil array dari properti harga
                                    var hargaArray = response.harga;
                                    console.log(hargaArray);
                                    // Proses array jika ada data di dalamnya
                                    if (Array.isArray(hargaArray) && hargaArray.length > 0) {
                                        // Kosongkan tabel sebelum menambahkan data baru
                                        $('#your-table-id tbody').empty();

                                        // Loop melalui array hargaArray
                                        hargaArray.forEach(function(data) {
                                            var newRow = '<tr>' +
                                                '<td>' + data.kode_produk + '</td>' +
                                                '<td>' + formatRupiah(data.harga) + '</td>' +
                                                '</tr>';
                                            $('#your-table-id tbody').append(newRow);
                                        });
                                    } else {
                                        console.log("Array harga kosong atau tidak ada data");
                                        $('#your-table-id tbody').empty();

                                        // Lakukan penanganan jika array kosong atau tidak ada data
                                    }
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

    @if ($pasars->isEmpty())
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <h5>Tidak ada data</h5>
            </div>
        </div>
    </div>
    @else
    @foreach ($pasars as $data)
    <div class="card">
        <div class="card-content">
            <div class="row valign-wrapper">
                <div class="col s3">
                    <img src="{{asset('storage/foto/'.$data->foto)}}" alt="Profile Image" style="width: 75px; height: 75px;">
                </div>
                <div class="col s9">
                    <span class="card-title">{{$data->nama_pemilik}}</span>
                    <p>{{$data->alamat_lokasi}}</p>
                    <p>Kontak: {{$data->kontak_pemilik}}</p>
                    <a href="{{$data->link_gmap}}">Klik Lokasi</a> |
                    @if(auth()->user()->role == 'petugas')
                    <a href="{{route('delete.pasar',$data->id)}}">Hapus</a>
                    @endif
                </div>
            </div>
        </div>
    </div>

    @endforeach
    @endif

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