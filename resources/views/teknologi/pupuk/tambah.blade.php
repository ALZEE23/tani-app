@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambahkan Informasi</h5>
    </div>
</div>



    <form action="{{ route('tambah') }}" method="POST" enctype="multipart/form-data">
    @csrf
    
    <label for="judul">Judul:</label>
    <input type="text" name="judul" required>

    <label for="cover">Cover:</label>
    <input type="file" name="cover" accept="image/*" required>

    <label for="file">File:</label>
    <input type="file" name="file" accept=".pdf, .doc, .docx" required>

    <label for="kategori">Kategori:</label>
    <select name="kategori">
        <!-- Tambahkan pilihan kategori sesuai kebutuhan -->
        <option value="Padat">Padat</option>
        <option value="Cair">Cair</option>
    </select>

    <button type="submit">Submit</button>
</form>

    
    

<style>
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

    .file-input > .drop-zone{
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
    
    function onEnter(){
        label.classList.add('active');
    }

    function onLeave(){
        label.classList.remove('active');
    }

    label.addEventListener('dragenter', onEnter);

    label.addEventListener('drop', onLeave);
    label.addEventListener('dragend',onLeave);
    label.addEventListener('dragleave',onLeave);
    label.addEventListener('dragexit',onLeave);
    
    const input = document.querySelector('input');
    input.addEventListener('change', event => {
        if (input.files.length > 0) {

        }
    })
</script>

@endsection