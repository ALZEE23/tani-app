@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Pasar</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('pasar.store')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <input id="nama" type="text" name="nama" required placeholder="Nama Pemilik Pasar">
            {{-- <label for="nama">&nbsp;&nbsp;Nama</label> --}}
        </div>

        <div class="">
            <input id="alamat" type="text" name="alamat" required placeholder="Alamat Lokasi Pemilik Modal">
            {{-- <label for="alamat">&nbsp;&nbsp;alamat</label> --}}
        </div>
        <div class="">
            <input id="link_gmap" type="text" name="link_gmap" required placeholder="Link Google Map">
            {{-- <label for="link_gmap">&nbsp;&nbsp;link_gmap</label> --}}
        </div>
        <div class="">
            <input id="kontak_pemilik" type="text" name="kontak_pemilik" required placeholder="Kontak Pemilik">
            {{-- <label for="kontak_pemilik">&nbsp;&nbsp;kontak_pemilik</label> --}}
        </div>
        <select name="sub_sektor" id="subsektor">
            <option value="">Pilih Subsektor</option>
            <option value="Hortikultura">Hortikultura</option>
            <option value="Pangan">Pangan</option>
            <option value="Perkebunan">Perkebunan</option>
            <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
        </select>
        <div class="">
            <select name="komoditas" id="komoditas">
                <option value="">Pilih Komoditas</option>
            </select>
        </div>


        
        <div class="file-field ">
            <div class="btn">
                <span>Foto</span>
                <input type="file" name="foto">
            </div>
            <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
            </div>
        </div>

        <button class="btn waves-effect waves-light" type="submit">Submit</button>
        <br>
        <br>
        <br>
        <br>
        <br>
    </form>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                    $('#komoditas').empty();

                    // Add a default option
                    $('#komoditas').append('<option value="">Pilih Komoditas</option>');
                    $.each(hargaArray, function(index, product) {
                        $('#komoditas').append('<option value="' + product.produk + '">' + product.produk + '</option>');
                    });
                    $('#komoditas').formSelect();
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

<style>
    .container {
        padding-top: 20px;
    }


    .btn {
        margin-top: 20px;
    }
</style>
@endsection