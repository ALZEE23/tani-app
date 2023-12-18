@extends('layouts.back')
@section('content')
<div class="container-fluid">
    <!-- --------------------------------------------------- -->
    <!--  Form Basic Start -->
    <!-- --------------------------------------------------- -->
    <div class="card bg-light-info shadow-none position-relative overflow-hidden">
        <div class="card-body px-4 py-3">
            <div class="row align-items-center">
                <div class="col-9">
                    <h4 class="fw-semibold mb-8">Form Edit Harga Pasar Kecamatan {{session('kecamatan')}}</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">harga/create</li>
                        </ol>
                    </nav>
                </div>
                <div class="col-3">
                    <div class="text-center mb-n5">
                        <img src="../../dist/images/breadcrumb/ChatBc.png" alt="" class="img-fluid mb-n4">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section>
        <div class="row">
            <div class="col-12">
                <div class="card card-body">
                    <h5 class="mb-3">Tambah kecamatan</h5>
                    <form action="{{ route('harga.update',$harga->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="formFile" class="form-label">Komoditas</label>
                            <select name="komoditas" id="komoditas" class="form-select">
                                <option value="Perkebunan">Pilih Komoditas</option>
                                <option {{$harga->komoditas == 'Perkebunan' ? 'selected':''}} value="Perkebunan">Perkebunan</option>
                                <option {{$harga->komoditas == 'Pangan' ? 'selected':''}} value="Pangan">Pangan</option>
                                <option {{$harga->komoditas == 'Hortikultura' ? 'selected':''}} value="Hortikultura">Hortikultura</option>
                            </select>

                            <label for="produk" class="form-label">Produk</label>
                            <select name="produk" id="produk" class="form-select"></select>


                            <label for="harga" class="form-label">Harga</label>
                            <input type="number" name="harga" class="form-control">
                            <label for="kecamatan" class="form-label">Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" value="{{session('kecamatan')}}">
                        </div>
                        <script>
                            document.getElementById('komoditas').addEventListener('change', function() {
                                var komoditas = this.value;
                                var produkDropdown = document.getElementById('produk');
                                produkDropdown.innerHTML = '';

                                if (komoditas === 'Perkebunan') {
                                    createOptions([
                                        'PADI', 'KEDELAI', 'KACANG TANAH', 'KACANG HIJAU',
                                        'UBI KAYU', 'UBI JALAR'
                                    ]);
                                } else if (komoditas === 'Pangan') {
                                    createOptions([
                                        'PADI', 'KEDELAI', 'KACANG TANAH', 'KACANG HIJAU',
                                        'UBI KAYU', 'UBI JALAR'
                                    ]);
                                } else if (komoditas === 'Hortikultura') {
                                    createOptions([
                                        'Bawang Daun', 'Bawang Merah', 'Bawang Putih', 'Kembang Kol',
                                        'Kentang', 'Kubis', 'Petsai/Sawi', 'Wortel', 'Bayam', 'Buncis',
                                        'Cabe Besar/TW/Teropong', 'Cabai Keriting', 'Cabe Rawit', 'Jamur Tiram*)',
                                        'Jamur Merang*)', 'Jamur Lainnya*)', 'Kacang Panjang', 'Kangkung',
                                        'Mentimun', 'Labu Siam', 'Paprika', 'Terung', 'Tomat'
                                    ]);
                                }
                            });

                            function createOptions(options) {
                                var produkDropdown = document.getElementById('produk');
                                options.forEach(function(option) {
                                    var opt = document.createElement('option');
                                    opt.appendChild(document.createTextNode(option));
                                    opt.value = option;
                                    produkDropdown.appendChild(opt);
                                });
                            }
                        </script>
                        <br>
                        <button type="submit" class="btn btn-success font-medium rounded-pill px-4">
                            <div class="d-flex align-items-center">
                                <i class="ti ti-send me-2 fs-4"></i>
                                Submit
                            </div>
                        </button>
                    </form>
                </div>
                <!-- ---------------------
                                                    end Custom File Uploads
                                                ---------------- -->
            </div>
        </div>
        <!-- Row -->
    </section>
    <!-- --------------------------------------------------- -->
    <!--  Form Basic End -->
    <!-- --------------------------------------------------- -->
</div>
@endsection