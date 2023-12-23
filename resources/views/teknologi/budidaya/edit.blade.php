@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg primary-bg" style="min-height: 147px;"></div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambahkan Informasi</h5>
    </div>
</div>

<div class="container">
<div class="row">
<form action="{{ route('budidaya.update', $budidaya->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <label for="judul">Judul:</label>
    <input type="text" name="judul" id="judul" value="{{$budidaya->judul}}" required>

    <label for="cover">Cover:</label>
    <div class="file-input" id="coverInput">
        <input type="file" name="cover" id="cover" accept="image/*" required>
        <div class="drop-zone" id="coverDropZone">Seret dan lepas file di sini</div>
    </div>

    <label for="file">File:</label>
    <div class="file-input" id="fileInput">
        <input type="file" name="file" id="file" accept=".pdf, .doc, .docx, .mp4" required>
        <div class="drop-zone" id="fileDropZone">Seret dan lepas file di sini</div>
    </div>

    <label for="kategori">Kategori:</label>
    <div>
    <select name="kategori" id="kategori">
        <!-- Tambahkan pilihan kategori sesuai kebutuhan -->
        <option value="Hortikultura" {{ $budidaya->kategori === 'Hortikultura' ? 'selected' : '' }} id="kategori" name="kategori" >Hortikultura</option>
        <option value="Pangan" {{ $budidaya->kategori === 'Pangan' ? 'selected' : '' }} id="kategori" name="kategori" >Pangan</option>
        <option value="Perkebunan" {{ $budidaya->kategori === 'Perkebunan' ? 'selected' : '' }} id="kategori" name="kategori">Perkebunan</option>
    </select>
    </div>
    <button type="submit">Update</button>
</form>
</div>
</div>
<br><br><br>

<style>
    body {
        font-family: Arial, sans-serif;
    }

    .container {
        max-width: 600px;
        margin: 0 auto;
    }

    form {
        margin-top: 20px;
    }

    label {
        display: block;
        margin-bottom: 5px;
    }

    input, select {
        width: 100%;
        padding: 8px;
        margin-bottom: 15px;
        box-sizing: border-box;
    }

    button {
        background-color: #4CAF50;
        color: white;
        padding: 10px 15px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    button:hover {
        background-color: #45a049;
    }

    .file-input {
        display: grid;
        grid-template-areas: "stack";
        width: 360px;
        height: 200px;
        background-color: #eeeeee;
        border-radius: 8px;
    }

    .file-input > * {
        grid-area: stack;
    }

    .file-input > input {
        opacity: 0;
    }

    .file-input > .drop-zone {
        margin: 12px;
        border: dashed 2px #aaaaaa;
        border-radius: 4px;
        transition: margin 200ms;
    }

    .file-input.active > .drop-zone {
        margin: 14px;
        background-color: #dadada;
    }
</style>

<script>
    const label = document.querySelector('label');
    const coverInput = document.getElementById('coverInput');
    const fileInput = document.getElementById('fileInput');
    
    function onEnter(element) {
        element.classList.add('active');
    }

    function onLeave(element) {
        element.classList.remove('active');
    }

    function handleFile(element, event) {
        onLeave(element);

        if (event.dataTransfer.items) {
            for (let i = 0; i < event.dataTransfer.items.length; i++) {
                if (event.dataTransfer.items[i].kind === 'file') {
                    const file = event.dataTransfer.items[i].getAsFile();
                    const fileType = file.type.toLowerCase();

                    if (element.id === 'coverDropZone' && fileType.startsWith('image/')) {
                        // Handle image file
                    } else if (element.id === 'fileDropZone' && (fileType.startsWith('video/') || fileType === 'application/pdf')) {
                        // Handle video or PDF file
                    }
                }
            }
        }
    }

    label.addEventListener('dragenter', function () { onEnter(coverInput); onEnter(fileInput); });
    label.addEventListener('dragleave', function () { onLeave(coverInput); onLeave(fileInput); });

    coverInput.addEventListener('dragover', function (e) { e.preventDefault(); });
    coverInput.addEventListener('drop', function (e) { e.preventDefault(); handleFile(coverInput, e); });

    fileInput.addEventListener('dragover', function (e) { e.preventDefault(); });
    fileInput.addEventListener('drop', function (e) { e.preventDefault(); handleFile(fileInput, e); });
</script>
@endsection
