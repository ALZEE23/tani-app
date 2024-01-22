@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Prodksi peternakan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('produksi.peternakan.storeexel')}}" method="POST" enctype="multipart/form-data">
        @csrf

       

        Import Excel
        <input type="file" name="peternakan" class="form-file">

<br>
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