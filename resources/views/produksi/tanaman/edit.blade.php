@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Prodksi Tanaman</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('produksi.tanaman.update')}}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="">
            <label for="desa">Pilih Desa:</label>
            <select id="wilayah" name="desa">
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <input type="hidden" name="id" value="{{$produksitanaman->id}}">
        <select name="subsektor" id="subsektor">
            <option value="{{$produksitanaman->subsektor}}">{{$produksitanaman->subsektor}}</option>
            <option value="">Pilih Subsektor</option>
            <option value="Pangan">Pangan</option>
            <option value="Hortikultura">Hortikultura</option>
        </select>
        <select name="komoditas" id="komoditas">
            <option value="{{$produksitanaman->komoditas}}">{{$produksitanaman->komoditas}}</option>
            <option value="">Pilih Komoditas</option>
        </select>
        <div class="">
            <select name="tanam_bulan_lalu" id="tanam_bulan_lalu">
                <option value="{{$produksitanaman->tanam_bulan_lalu}}">Tanam Bulan Lalu :{{$produksitanaman->tanam_bulan_lalu}}</option>
                <option value="">Tanam Bulan Lalu</option>
                <option value="0">Tanam Bulal Lalu 0</option>
                <option value="1">Tarik Data Tanam Bulan Lalu</option>
            </select>
        </div>
        <div class="">
            <span>Tanam Bulan Sekarang</span>
            <input id="tanam_bulan_sekarang" type="text" value="{{$produksitanaman->tanam_bulan_sekarang}}" name="tanam_bulan_sekarang" required placeholder="Tanam Bulan Sekarang (Hektar)">
        </div>
        <div class="">
            <select name="panen_bulan_terakhir" id="panen_bulan_terakhir">
                <option value="{{$produksitanaman->panen_bulan_terakhir}}">{{$produksitanaman->panen_bulan_terakhir}}</option>
                <option value="">Panen Bulan Terakhir</option>
                <option value="0">Panen Bulal Lalu 0</option>
                <option value="1">Tarik Data Panen Bulan Lalu</option>
            </select>
        </div>
        <div class="">
            <select name="panen_dari_data_tanam_yang_bulan" id="panen_dari_data_tanam_yang_bulan">
                <option value="{{$produksitanaman->panen_dari_data_tanam_yang_bulan}}">{{$produksitanaman->panen_dari_data_tanam_yang_bulan}}</option>
                <option value="">Data Panen dardata Tanam Bulan</option>
                <option value="-">Data Panen dari data Tanam Bulan : - </option>

            </select>
        </div>
        <input type="hidden" name="id_panen" value="{{$produksitanaman->id_panen}}" id="id_panen">
        <input type="hidden" name="id_gagal_panen" value="{{$produksitanaman->id_gagal_panen}}" id="id_gagal_panen">
        <div class="">
            <span>Panen Bulan Sekarang</span>
            <input id="panen_bulan_sekarang" type="text" value="{{$produksitanaman->panen_bulan_sekarang}}" name="panen_bulan_sekarang" required placeholder="Panen Bulan Sekarang (Hektar)">
        </div>
        <div class="">
            <select name="gagal_panen_bulan_terakhir" id="gagal_panen_bulan_terakhir">
                <option value="{{$produksitanaman->gagal_panen_bulan_terakhir}}">Gagal Panen Bulan Terakhir : {{$produksitanaman->gagal_panen_bulan_terakhir}}</option>
                <option value="">Gagal Panen Bulan Lalu</option>
                <option value="0">0</option>
                <option value="1">Tarik Data Panen Bulan Lalu</option>
            </select>
        </div>
        <div class="">
            <select name="gagal_panen_dari_data_tanam_yang_bulan" id="gagal_panen_dari_data_tanam_yang_bulan">
                <option value="{{$produksitanaman->gagal_panen_terakhir_dari_bulan}}">Gagal Panen Dari data tanam : {{$produksitanaman->gagal_panen_terakhir_dari_bulan}}</option>
                <option value="">Data Gagal Panen dari data Tanam Bulan</option>
                <option value="">Data Gagal Panen dari data Tanam Bulan : - </option>
            </select>
        </div>
        <input type="hidden" id="panen_gagal_panen_dari_data_tanam_yang_bulan" name="panen_gagal_panen_dari_data_tanam_yang_bulan" value="{{$produksitanaman->panen_gagal_panen_dari_data_tanam_yang_bulan}}">
        <div class="">
            <span>Gagal Panen Bulan Sekarang</span>
            <input id="gagal_panen_bulan_sekarang" type="text" name="gagal_panen_bulan_sekarang" required placeholder="Gagal Panen Bulan Sekarang (Hektar)" value="{{$produksitanaman->gagal_panen_bulan_sekarang}}">
        </div>
        <div class="">
            <select name="produksi_bulan_terakhir" id="produksi_bulan_terakhir">
                <option value="{{$produksitanaman->produksi_bulan_terakhir}}">Produksi Bulan Terakhir :{{$produksitanaman->produksi_bulan_terakhir}}</option>

                <option value="">Produksi Bulan Terakhir</option>
                <option value="0">Tanam Bulal Lalu 0</option>
                <option value="1">Tarik Data Tanam Bulan Lalu</option>
            </select>
        </div>
        <div class="">
            <span>Produksi Bulan Sekarang</span>
            <input id="produksi_bulan_sekarang" value="{{$produksitanaman->produksi_bulan_sekarang}}" type="text" name="produksi_bulan_sekarang" required placeholder="Produksi Bulan Sekarang (Hektar)">
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

                    // Add a default option\
                    var uniqueKomoditasSet = new Set();
                    $('#komoditas').append('<option value="">Pilih Komoditas</option>');
                    if (komoditasValue === 'Hortikultura') {
                        const allowedKomoditas = ['Bawang Daun', 'Bawang Merah', 'Bawang Putih', 'Kembang Kol', 'Kentang', 'Kubis', 'Petsai/Sawi', 'Wortel', 'Bayam', 'Buncis', 'Kangkung'];

                        $.each(hargaArray, function(index, product) {
                            if (allowedKomoditas.includes(product.produk) && !uniqueKomoditasSet.has(product.produk)) {
                                uniqueKomoditasSet.add(product.produk);
                                $('#komoditas').append('<option value="' + product.produk + '">' + product.produk + '</option>');
                            }
                        });
                    } else {
                        // Jika komoditasValue bukan Hortikultura, tambahkan semua komoditas ke opsi
                        $.each(hargaArray, function(index, product) {
                            if (!uniqueKomoditasSet.has(product.produk)) {
                                uniqueKomoditasSet.add(product.produk);
                                $('#komoditas').append('<option value="' + product.produk + '">' + product.produk + '</option>');
                            }
                        });
                    }
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
    $(document).ready(function() {

        $('#komoditas').change(function() {
            var komoditasValue = $(this).val();
            var DesaValue = $('#wilayah').val();
            console.log(komoditasValue)
            console.log(DesaValue)

            $.ajax({
                type: 'POST',
                url: '{{route("pasar.filter_komoditas2")}}',
                data: {
                    _token: '{{ csrf_token() }}',
                    komoditas: komoditasValue,
                    desa: DesaValue
                },
                success: function(response) {
                    console.log(response);
                    if (response.count == 0) {
                        $('#tanam_bulan_lalu').empty();
                        $('#tanam_bulan_lalu').append(
                            `<option value="0">Tanam Bulan Lalu: 0 </option>`
                        );

                        $('#panen_bulan_terakhir').empty();
                        $('#panen_bulan_terakhir').append(
                            `<option value="0">Panen Bulan Lalu: 0 </option>`
                        );

                        $('#gagal_panen_bulan_terakhir').empty();
                        $('#gagal_panen_bulan_terakhir').append(
                            `<option value="0">Gagal Panen Bulan Lalu: 0 </option>`
                        );

                        $('#produksi_bulan_terakhir').empty();
                        $('#produksi_bulan_terakhir').append(
                            `<option value="0">Produksi Bulan Lalu: 0 </option>`
                        );


                        $('#tanam_bulan_lalu').formSelect();
                        $('#panen_bulan_terakhir').formSelect();
                        $('#gagal_panen_bulan_terakhir').formSelect();
                        $('#produksi_bulan_terakhir').formSelect();

                    } else {

                        $('#tanam_bulan_lalu').empty();
                        $('#tanam_bulan_lalu').append(
                            `<option value="${response.last.total_tanam}">Tanam Bulan Lalu : ${response.last.total_tanam}</option>`
                        );

                        $('#panen_bulan_terakhir').empty();
                        $('#panen_bulan_terakhir').append(
                            `<option value="${response.last.panen_bulan_sekarang}">Panen Bulan Lalu : ${response.last.panen_bulan_sekarang}</option>`
                        );

                        $('#gagal_panen_bulan_terakhir').empty();
                        $('#gagal_panen_bulan_terakhir').append(
                            `<option value="${response.last.gagal_panen_bulan_sekarang}">Gagal Panen Bulan Lalu : ${response.last.gagal_panen_bulan_sekarang}</option>`
                        );

                        $('#produksi_bulan_terakhir').empty();
                        $('#produksi_bulan_terakhir').append(
                            `<option value="${response.last.produksi_bulan_sekarang}">Produksi Bulan Lalu : ${response.last.produksi_bulan_sekarang}</option>`
                        );


                        $('#tanam_bulan_lalu').formSelect();
                        $('#panen_bulan_terakhir').formSelect();
                        $('#gagal_panen_bulan_terakhir').formSelect();
                        $('#produksi_bulan_terakhir').formSelect();
                    }

                    if (response.panen.length == 0) {
                        $('#panen_dari_data_tanam_yang_bulan').empty();
                        $('#panen_dari_data_tanam_yang_bulan').append(
                            `<option value="0">Data Panen dari data Tanam Bulan : - </option>`
                        );
                        $('#panen_dari_data_tanam_yang_bulan').formSelect();

                        var pannskrng = $('#panen_bulan_sekarang').val(0);

                    } else {
                        $('#panen_dari_data_tanam_yang_bulan').empty();

                        response.panen.forEach((item) => {
                            if (typeof item.tanggal === "string") {
                                // Konversi ke objek Date jika masih string
                                item.tanggal = new Date(item.tanggal);
                            }

                            item.tanggal = item.tanggal.toLocaleDateString("id-ID", {
                                year: "numeric",
                                month: "long",
                            });

                            // Create the option string and append it directly
                            var optionString = `<option value="${item.sisa_tanam}">Data Panen dari data Tanam Bulan ${item.tanggal} : ${item.sisa_tanam}</option>`;
                            var idPanenElement = document.getElementById("id_panen");

                            // Tetapkan nilai yang diinginkan ke elemen input tersembunyi
                            idPanenElement.value = item.id;
                            $('#panen_dari_data_tanam_yang_bulan').append(optionString);
                        });

                        $('#panen_dari_data_tanam_yang_bulan').formSelect();
                    }

                    if (response.gagal_panen.length == 0) {
                        $('#gagal_panen_dari_data_tanam_yang_bulan').append(
                            `<option value="0">Data Panen dari data Tanam Bulan : - </option>`
                        );
                        $('#panen_dari_data_tanam_yang_bulan').formSelect();
                    } else {
                        $('#gagal_panen_dari_data_tanam_yang_bulan').empty();

                        console.log(response.gagal_panen)
                        response.gagal_panen.forEach((item) => {
                            if (typeof item.tanggal === "string") {
                                // Konversi ke objek Date jika masih string
                                item.tanggal = new Date(item.tanggal);
                            }

                            item.tanggal = item.tanggal.toLocaleDateString("id-ID", {
                                year: "numeric",
                                month: "long",
                            });

                            // Create the option string and append it directly
                            var optionString2 = `<option value="${item.sisa_tanam}">Data Gagal Panen dari data Tanam Bulan ${item.tanggal} : ${item.sisa_tanam}</option>`;
                            var idPanenElement = document.getElementById("id_gagal_panen");
                            var idPanenGagalPanenElement = document.getElementById("panen_gagal_panen_dari_data_tanam_yang_bulan");

                            // Tetapkan nilai yang diinginkan ke elemen input tersembunyi
                            idPanenGagalPanenElement.value = item.tanam_bulan_sekarang;
                            idPanenElement.value = item.id;
                            panen_gagal_panen_dari_data_tanam_yang_bulan =
                                $('#gagal_panen_dari_data_tanam_yang_bulan').append(optionString2);
                        });

                        $('#panen_dari_data_tanam_yang_bulan').formSelect();
                        $('#gagal_panen_dari_data_tanam_yang_bulan').formSelect();
                    }


                },
                error: function(error) {
                    console.log(error);
                }
            });
        });
    });

    $('#panen_bulan_sekarang').on('change', function() {
        // Get the selected value from #panen_dari_data_tanam_yang_bulan
        var selectedValue = $(this).val();
        var gagal_panen_bulan_sekarang = $('#gagal_panen_bulan_sekarang').val();

        // Assuming the value of #panen_bulan_sekarang is numeric
        var panenbulanyang = parseFloat($('#panen_dari_data_tanam_yang_bulan').val());

        // Check if #panen_bulan_sekarang is greater than the selected value
        if (selectedValue > panenbulanyang) {
            alert("Panen Bulan Sekarang tidak boleh lebih besar dari Panen dari data Tanam Bulan yang dipilih.");
            $(this).val(panenbulanyang);
            // You might want to clear or adjust the value to meet your requirements
            // $('#panen_bulan_sekarang').val(selectedValue);
        }

    });
    $('#gagal_panen_bulan_sekarang').on('change', function() {
        console.log("Masuk")
        // Get the selected value from #panen_dari_data_tanam_yang_bulan
        var gagal_panen_bulan_sekarang = $(this).val();

        // Assuming the value of #panen_bulan_sekarang is numeric
        var panenbulanyang = parseFloat($('#panen_dari_data_tanam_yang_bulan').val());
        var gagalpanenbulanyang = parseFloat($('#panen_gagal_panen_dari_data_tanam_yang_bulan').val());


        if (gagal_panen_bulan_sekarang > gagalpanenbulanyang) {
            alert("Gagal Panen Bulan Sekarang tidak boleh lebih besar dari data Tanam Bulan yang dipilih.");
            $('#gagal_panen_bulan_sekarang').val(0);
            console.log(gagalpanenbulanyang)
            // You might want to clear or adjust the value to meet your requirements
            // $('#panen_bulan_sekarang').val(selectedValue);
        }

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