@extends('layouts.masuk')
@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambah Gapoktan</h5>
    </div>
</div>
<div class="container">
    <form action="{{route('store-gakpoktan')}}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="">
            <label for="desa">Pilih Desa:</label>
            <select id="desa" name="desa">
                @foreach ($desa as $data)
                <option value="{{$data->desa}}">{{$data->desa}}</option>
                @endforeach
                <!-- Tambahkan opsi kecamatan lainnya sesuai kebutuhan -->
            </select>
        </div>
        <div class="">
            <!-- <label for="nama">&nbsp;&nbsp;Nama Gapoktan</label> -->

            <input id="nama" type="text" name="nama_gakpoktan" required placeholder="Nama Gapoktan">
        </div>
        <div class="">
            <!-- <label for="nama">&nbsp;&nbsp;Nama Ketua</label> -->
            <input id="nama" type="text" name="nama_ketua" required placeholder="Nama Ketua">
        </div>
        <!-- <div class="">
            <label for="nama">&nbsp;&nbsp;Jumlah Poktan Pangan</label>
            <input id="nama" type="number" name="pangan" required placeholder="">
        </div>

        <div class="">
            <label for="jabatan">&nbsp;&nbsp;Jumlah Poktan Perkebunan</label>
            <input id="jabatan" type="number" name="berkebunan" required placeholder="">
        </div>

        <div class="">
            <label for=" wilayah">&nbsp;&nbsp;Jumlah Poktan Holtikultura"</label>
            <input id="wilayah" type="number" name="holtikultura" required placeholder="">
        </div> -->

        <!-- <div class="">
            <input id=" notelepon" type="number" name="peternakan" required placeholder="Jumlah Poktan Ternak">
            <label for="notelepon">&nbsp;&nbsp;No. Telepon</label>
        </div>
        <div class="">
            <input id="notelepon" type="number" name="perikanan" required placeholder="Jumlah Poktan Perikanan">
            <label for="notelepon">&nbsp;&nbsp;No. Telepon</label>
        </div>
        <div class="">
            <input id="notelepon" type="number" name="kwt" required placeholder="Jumlah Poktan KWT">
            <label for="notelepon">&nbsp;&nbsp;No. Telepon</label>
        </div> -->
        <div class="">
            <!-- <label for="notelepon">&nbsp;&nbsp;No. Telepon</label> -->
            <input id="notelepon" type="text" name="notelepon" required placeholder="No telepon">
        </div>


        <button class="btn waves-effect waves-light" type="submit">Submit</button>
        <br>
        <br>
        <br>
        <br>
        <br>
    </form>
</div>

<style>
    .container {
        padding-top: 20px;
    }


    .btn {
        margin-top: 20px;
    }
</style>
@endsection