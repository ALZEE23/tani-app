@extends('layouts.masuk')

@section('content')

<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<div class="pagehead-bg  seconda-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Dokumentasi Kegiatan Penyuluhan</h5>
    </div>
</div>

<div class="container">
    {{-- <h3 class="select-title">Pilih Wilayah Binaan</h3>
    <div class="form">
        @if (isset($key))
        <select id="desa" name="desa" onchange="redirectToSelectedDesa()">
        
            @foreach ($desa as $data)
            <option {{ $key == $data->desa ? 'selected' : '' }} value="{{ $data->desa }}">{{ $data->desa }}</option>
        @endforeach
        
          </select>
        @else
        
        <select id="desa" name="desa" onchange="redirectToSelectedDesa()">
        @foreach ($desa as $data)
                    <option value="{{$data->desa}}">{{$data->desa}}</option>
                    @endforeach
        </select>
        @endif

        </div> --}}

    
    <h3 class="select-title">Pilih Tanggal Kegiatan</h3>
    <input type="text" class="form-control datepicker" id="tanggal" data-date-format="yyyy-mm-dd">
    
    <h3 class="select-title">Tambahkan Foto (Format JPG/PNG, maksimal 5MB)</h3>
    <div class="image-preview-container">
        <div class="preview">
            <img id="preview-selected-image-1" />
        </div>
        <label for="file-upload-1">Upload Image</label>
        <input type="file" id="file-upload-1" accept="image/*" onchange="previewImage(event, 1);" />
    </div>
    
    <div class="image-preview-container">
        <div class="preview">
            <img id="preview-selected-image-2" />
        </div>
        <label for="file-upload-2">Upload Image</label>
        <input type="file" id="file-upload-2" accept="image/*" onchange="previewImage(event, 2);" />
    </div>
    
    <div class="image-preview-container">
        <div class="preview">
            <img id="preview-selected-image-3" />
        </div>
        <label for="file-upload-3">Upload Image</label>
        <input type="file" id="file-upload-3" accept="image/*" onchange="previewImage(event, 3);" />
    </div>
    
    <h3 class="select-title">keterangan Dokumentasi</h3>
    <textarea class="form-control input-text" id="keterangan" rows="2"></textarea>
</div>

<a href="{{route('tambah-dokumentasi')}}" class="add">Simpan</a>

<style>
    h1 {
    margin: 0 auto;
    margin-top: 5rem;
    margin-bottom: 2rem;
    text-align: center;
}

.image-preview-container {
    width: 50%;
    margin: 0 auto;
    border: 1px solid rgba(0, 0, 0, 0.1);
    padding: 3rem;
    border-radius: 20px;
}

.image-preview-container img {
    width: 100%;
    display: none;
    margin-bottom: 30px;
}
.image-preview-container input {
    display: none;
}

.image-preview-container label {
    display: block;
    width: 45%;
    height: 45px;
    margin-left: 25%;
    text-align: center;
    background-color: #0e7aae; /* Warna latar belakang */
    color: #fff;
    font-size: 15px;
    text-transform: Uppercase;
    font-weight: 400;
    border-radius: 5px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}
 
body
{
    height: 2000px;
}
.container {
    text-align: center;
}

   .select-title
 {
    color: black;
    font-weight: 600;
    margin-bottom: 5px;
    margin-left: 5px;
}

.form {
        background-color: #0e7aae; /* Warna latar belakang */
        border-radius: 20px;
        display: flex;
    justify-content: center; /* Pindahkan tombol ke sebelah kanan */
    align-items: center;
    text-align: center;
    margin-bottom: 20px;
    }

    .foto {
 
    display: flex;
    justify-content: space-between;
    margin-bottom: 20px;
    padding: 30px;
}

.foto-container {
    flex: 1;
    text-align: center;
}

    #tanggal {
        color: white;
        font-weight: 600;
        background-color: #0e7aae; /* Warna latar belakang */
        border-radius: 20px;
        display: flex;
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    text-align: center;
    font-size: 35px;
    }

    #keterangan {
        color: black;
        font-weight: 600;
        border-radius: 20px;
        background-color: #0e7aae; /* Warna latar belakang */
        border: none;
        display: flex;
    justify-content: center; /* Memusatkan secara horizontal */
    align-items: center; /* Memusatkan secara vertikal */
    text-align: center;
    font-size: 35px;
}


  
    .add {
    display: flex;
    justify-content: center;
    align-items: center;
    margin-top: 20px;
    font-size: 20px;
    color: white;
    background-color: #0e7aae;
    border-radius: 30px;
    width: 250px;
    font-weight: 600;
    padding: 20px;
    text-align: center;
    margin-left: 70%; /* Memindahkan ke sebelah kanan */
}


</style>

<script>
    function redirectToSelectedDesa() {
      const selectedKecamatan = document.getElementById('desa').value;
      window.location.href = "{{ url('dokumentasi/filter') }}/" + encodeURIComponent(selectedDesa);
    }

 /**
 * Create an arrow function that will be called when an image is selected.
 */
const previewImage = (event, imageNumber) => {
    /**
     * Get the selected files.
     */
    const imageFiles = event.target.files;
    /**
     * Count the number of files selected.
     */
    const imageFilesLength = imageFiles.length;
    /**
     * If at least one image is selected, then proceed to display the preview.
     */
    if (imageFilesLength > 0) {
        /**
         * Get the image path.
         */
        const imageSrc = URL.createObjectURL(imageFiles[0]);
        /**
         * Select the image preview element.
         */
        const imagePreviewElement = document.querySelector(`#preview-selected-image-${imageNumber}`);
        /**
         * Assign the path to the image preview element.
         */
        imagePreviewElement.src = imageSrc;
        /**
         * Show the element by changing the display value to "block".
         */
        imagePreviewElement.style.display = "block";
    }
};


    </script>
@endsection