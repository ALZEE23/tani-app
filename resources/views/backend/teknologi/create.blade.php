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
                    <h4 class="fw-semibold mb-8">Form kecamatan</h4>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a class="text-muted text-decoration-none" href="/">Dashboard</a></li>
                            <li class="breadcrumb-item" aria-current="page">kecamatans/create</li>
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
                    <form action="{{ route('teknologi.add') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label for="model">Pilih Model:</label>
                            <select name="model" id="model" onchange="changeModel(this.value)">
                                <option value="" selected disabled></option>
                                <option value="pupuk">Pupuk</option>
                                <option value="pestisida-organik">Pestisida Organik</option>
                                <option value="pestisida">Pestisida Kimia</option>
                                <option value="budidaya">Budidaya</option>
                                <option value="pencegahan">Pencegahan</option>
                            </select>
                        </div>

                        <div id="pupukForm" style="display: none;">
                            <!-- Form untuk model 'pupuk' -->
                            <!-- Pastikan elemen-elemen form sesuai dengan kebutuhan Anda -->
                            <label for="judulPupuk">Judul:</label>
                            <div>
                            <input type="text" name="judul" id="judulPupuk">
                            </div>

                            <label for="coverPupuk">Cover:</label>
                            <div>
                            <input type="file" name="cover" id="coverPupuk">
                            </div>

                            <label for="filePupuk">File:</label>
                            <div>
                            <input type="file" name="file" id="filePupuk">
                            </div>

                            <label for="kategoriPupuk">Kategori:</label>
                            <div>
                            <input type="text" name="kategori" id="kategoriPupuk">
                            </div>
                        </div>

                        <div id="pestisidaOrganikForm" style="display: none;">
                            <!-- Form untuk model 'pupuk' -->
                            <!-- Pastikan elemen-elemen form sesuai dengan kebutuhan Anda -->
                            <label for="judulPestisidaOrganik">Judul:</label>
                            <div>
                            <input type="text" name="judul" id="judulPestisidaOrganik">
                            </div>

                            <label for="coverPestisidaOrganik">Cover:</label>
                            <div>
                            <input type="file" name="cover" id="coverPestisidaOrganik">
                            </div>

                            <label for="filePestisidaOrganik">File:</label>
                            <div>
                            <input type="file" name="file" id="filePestisidaOrganik">
                            </div>

                            <label for="kategoriPestisidaOrganik">Kategori:</label>
                            <div>
                            <input type="text" name="kategori" id="kategoriPestisidaOrganik">
                            </div>
                        </div>

                        <div id="pestisidaForm" style="display: none;">
                            <!-- Form untuk model 'pupuk' -->
                            <!-- Pastikan elemen-elemen form sesuai dengan kebutuhan Anda -->
                            <label for="judulPestisida">Judul:</label>
                            <div>
                            <input type="text" name="judul" id="judulPestisida">
                            </div>

                            <label for="coverPestisida">Cover:</label>
                            <input type="file" name="cover" id="coverPestisida">

                            <label for="filePestisida">File:</label>
                            <div>
                            <input type="file" name="file" id="filePestisida">
                            </div>

                            <label for="kategoriPestisida">Kategori:</label>
                            <div>
                            <input type="text" name="kategori" id="kategoriPestisida">
                            </div>
                        </div>

                        <div id="budidayaForm" style="display: none;">
                            <!-- Form untuk model 'pupuk' -->
                            <!-- Pastikan elemen-elemen form sesuai dengan kebutuhan Anda -->
                            <label for="judulBudidaya">Judul:</label>
                            <div>
                            <input type="text" name="judul" id="judulBudidaya">
                            </div>

                            <label for="coverBudidaya">Cover:</label>
                            <div>
                            <input type="file" name="cover" id="coverBudidaya" accept="image/*">
                            </div>

                            <label for="fileBudidaya">File:</label>
                            <div>
                            <input type="file" name="file" id="fileBudidaya" accept="application/pdf,application/msword,application/vnd.openxmlformats-officedocument.wordprocessingml.document,video/*">
                            </div>

                            <label for="kategoriBudidaya">Kategori:</label>
                            <div>
                            <input type="text" name="kategori" id="kategoriBudidaya">
                            </div>
                        </div>

                        <div id="pencegahanForm" style="display: none;">
                            <!-- Form untuk model 'pupuk' -->
                            <!-- Pastikan elemen-elemen form sesuai dengan kebutuhan Anda -->
                            <label for="judulPencegahan">Judul:</label>
                            <div>
                            <input type="text" name="judul" id="judulPencegahan">
                            </div>

                            <label for="coverPencegahan">Cover:</label>
                            <div>
                            <input type="file" name="cover" id="coverPencegahan">
                            </div>

                            <label for="filePencegahan">File:</label>
                            <div>
                            <input type="file" name="file" id="filePencegahan">
                            </div>

                            <label for="kategoriPencegahan">Kategori:</label>
                            <div>
                            <input type="text" name="kategori" id="kategoriPencegahan">
                            </div>
                        </div>

                        <!-- Tambahkan bagian form untuk model-model lainnya sesuai kebutuhan -->

                        <button type="submit">Simpan</button>
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
<script>
    function changeModel(model) {
        // Sembunyikan semua form terlebih dahulu
        document.getElementById('pupukForm').style.display = 'none';
        document.getElementById('pestisidaOrganikForm').style.display = 'none';
        document.getElementById('pestisidaForm').style.display = 'none';
        document.getElementById('budidayaForm').style.display = 'none';
        document.getElementById('pencegahanForm').style.display = 'none';
        // Sembunyikan form-model lainnya sesuai kebutuhan

        // Tampilkan form yang sesuai dengan model yang dipilih
        if (model === 'pupuk') {
            document.getElementById('pupukForm').style.display = 'block';
        }
        else if (model === 'pestisida-organik') {
            document.getElementById('pestisidaOrganikForm').style.display = 'block';
        }
        else if (model === 'pestisida') {
            document.getElementById('pestisidaForm').style.display = 'block';
        }
        else if (model === 'budidaya') {
            document.getElementById('budidayaForm').style.display = 'block';
        }
        else if (model === 'pencegahan') {
            document.getElementById('pencegahanForm').style.display = 'block';
        }
        // Tampilkan form-model lainnya sesuai kebutuhan
    }
</script>