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
        <form action="{{ route('tambah') }}" method="POST" enctype="multipart/form-data" id="myForm">
            @csrf

            <label for="judul">Judul:</label>
            <input type="text" name="judul" id="judul" required>

            <label for="cover">Cover:</label>
            <div class="file-input" id="coverInput">
                <input type="file" name="cover" id="cover" accept="image/*" required>
                <div class="drop-zone" id="coverDropZone">Seret dan lepas file di sini</div>
            </div>

            <div id="fileTypeSelection">
                <label for="fileType">Pilih jenis file:</label>
                <select name="fileType" id="fileType">
                    <option value="file">File</option>
                    <option value="video">Video</option>
                </select>
            </div>

            <div id="fileInput" style="display: none;">
                <label for="file">File:</label>
                <div class="file-input">
                    <input type="file" name="file" id="file" accept=".pdf, .doc, .docx">
                    <div class="drop-zone" id="fileDropZone">Seret dan lepas file di sini</div>
                </div>
            </div>

            <div id="videoInput" style="display: none;">
                <label for="videoLink">Link Video:</label>
                <input type="text" name="link" id="videoLink">
            </div>

            <label for="kategori">Kategori:</label>
            <select name="kategori" id="kategori">
                <option value="Padat">Padat</option>
                <option value="Cair">Cair</option>
            </select>

            <button type="submit">Submit</button>
        </form>

        <script>
            const fileTypeSelection = document.getElementById('fileTypeSelection');
            const fileInput = document.getElementById('fileInput');
            const videoInput = document.getElementById('videoInput');

            const fileType = document.getElementById('fileType');
            fileType.addEventListener('change', function() {
                if (fileType.value === 'file') {
                    fileInput.style.display = 'block';
                    videoInput.style.display = 'none';
                } else if (fileType.value === 'video') {
                    fileInput.style.display = 'none';
                    videoInput.style.display = 'block';
                }
            });
        </script>

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

    input,
    select {
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

    .file-input>* {
        grid-area: stack;
    }

    .file-input>input {
        opacity: 0;
    }

    .file-input>.drop-zone {
        margin: 12px;
        border: dashed 2px #aaaaaa;
        border-radius: 4px;
        transition: margin 200ms;
    }

    .file-input.active>.drop-zone {
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

    label.addEventListener('dragenter', function() {
        onEnter(coverInput);
        onEnter(fileInput);
    });
    label.addEventListener('dragleave', function() {
        onLeave(coverInput);
        onLeave(fileInput);
    });

    coverInput.addEventListener('dragover', function(e) {
        e.preventDefault();
    });
    coverInput.addEventListener('drop', function(e) {
        e.preventDefault();
        handleFile(coverInput, e);
    });

    fileInput.addEventListener('dragover', function(e) {
        e.preventDefault();
    });
    fileInput.addEventListener('drop', function(e) {
        e.preventDefault();
        handleFile(fileInput, e);
    });
</script>
@endsection