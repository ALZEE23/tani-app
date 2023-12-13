@extends('layouts.masuk')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Rencana Kegiatan Penyuluhan</h5>
    </div>
</div>

<div class="container">
<h3 class="select-title">Pilih Tahun</h3>
<div class="form">
<select>
    <option selected>2023</option>
    <option value="1">2021</option>
    <option value="2">2022</option>
    <option value="3">2023</option>
  </select>
</div>

<h3 class="select-title">Pilih Bulan</h3>
<div class="form">
<select>
    <option selected>Juli</option>
    <option value="1">Januari</option>
    <option value="2">Februari</option>
    <option value="3">Maret</option>
    <option value="4">April</option>
    <option value="5">Mei</option>
    <option value="6">Juni</option>
    <option value="7">Juli</option>
    <option value="8">Agustus</option>
    <option value="9">September</option>
    <option value="10">Oktober</option>
    <option value="11">November</option>
    <option value="12">Desember</option>
  </select>
</div>

<h3 class="select-title">Pilih Kecamatan</h3>
<div class="form">

@if (isset($key))
<select id="kecamatan" name="kecamatan" onchange="redirectToSelectedKecamatan()">

    @foreach ($kecamatan as $data)
            <option {{ $key == $data->kecamatan ? 'selected' : '' }} value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
            @endforeach

  </select>
@else

<select id="kecamatan" name="kecamatan" onchange="redirectToSelectedKecamatan()">
@foreach ($kecamatan as $data)
            <option value="{{$data->kecamatan}}">{{$data->kecamatan}}</option>
            @endforeach
</select>
@endif
            
</div>

<h3 class="select-title">Pilih Desa</h3>
<div class="form">
@if (isset($key))
<select id="desa" name="desa" onchange="redirectToSelectedDesa()">

    @foreach ($desa as $data)
            <option {{ $key == $data->desa ? 'selected' : '' }} value="{{$data->desa}}">{{$data->desa}}</option>
            @endforeach

  </select>
@else

<select id="desa" name="desa" onchange="redirectToSelectedDesa()">
@foreach ($desa as $data)
            <option value="{{$data->desa}}">{{$data->desa}}</option>
            @endforeach
</select>
@endif

</div>

<h3 class="select-title">Penyuluh Wilbin</h3>
<div class="form">
    @if (isset($key))
    <select id="penyuluh" name="penyuluh" onchange="redirectToSelectedPenyuluh()">
        @foreach ($penyuluh as $penyuluhItem)
            <option {{ $key == $penyuluhItem ? 'selected' : '' }} value="{{$penyuluhItem}}">{{$penyuluhItem}}</option>
        @endforeach
    </select>
    
@else
    <select id="penyuluh" name="penyuluh" onchange="redirectToSelectedPenyuluh()">
        @foreach ($penyuluh as $nama)
            <option value="{{$nama}}">{{$nama}}</option>
        @endforeach
    </select>
@endif

</div>


</div>

<a href="{{route('tambah-rencana')}}" class="add">Tambahkan Kegiatan</a>

<!-- ... Kode sebelumnya ... -->


<div class="row">
  @foreach ($rencana as $data)
      <div class="col-sm-4">
          <div class="card">
              <div class="card-body">
                  <h5 class="card-title">{{$data->tanggal }}</h5>
                  <h6 class="card-text">{{$data->rencana }}</h6>
              </div>
          </div>
      </div>
  @endforeach
</div>
<!-- ... Kode selanjutnya ... -->





<style>
body{
    height: 2000px;
}
.container{
 text-align: center;
}
  
.select-title
 {
    color: black;
    font-weight: 600;
}

.form {
        background-color: #0e7aae; /* Warna latar belakang */
        border-radius: 20px;
        display: flex;
    justify-content: center; /* Pindahkan tombol ke sebelah kanan */
    align-items: center;
    text-align: center;
    }

    .add {
    display: flex;
    justify-content: center;
    align-items: center;
    font-size: 18px;
    color: white;
    background-color: #0e7aae;
    border-radius: 20px;
    width: 200px;
    font-weight: 600;
    margin-top: 10px;
    padding: 10px;
    margin-left: auto; /* Tambahkan properti ini untuk memindahkan ke sebelah kanan */
}

.card {
    margin-bottom: 20px; /* Jarak antar kartu */
}

.row {
    display: flex;
    flex-wrap: wrap;
    justify-content: flex-start; /* Mulai dari kiri */
}

.col-sm-4 {
    flex: 0 0 33.3333%; /* Mengatur lebar agar 3 kartu per baris */
    max-width: 33.3333%;
}



</style>

<script>
        function redirectToSelectedKecamatan() {
            const selectedKecamatan = document.getElementById('kecamatan').value;
            window.location.href = "{{ url('rencana/filter') }}/" + encodeURIComponent(selectedKecamatan);
        }
    </script>

<script>
    function redirectToSelectedDesa() {
        const selectedKecamatan = document.getElementById('desa').value;
        window.location.href = "{{ url('rencana/filter') }}/" + encodeURIComponent(selectedDesa);
    }
</script>

<script>
    function redirectToSelectedPenyuluh() {
        const selectedKecamatan = document.getElementById('penyuluh').value;
        window.location.href = "{{ url('rencana/filter') }}/" + encodeURIComponent(selectedPenyuluh);
    }
</script>

@endsection