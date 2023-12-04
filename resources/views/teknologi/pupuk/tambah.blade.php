@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Tambahkan Informasi</h5>
    </div>
</div>



    <label for="file-input">
    <div class="drop-zone">
        <p><b>Select a file</b>or drop it here</p>
    </div>
    <input type="file" id="file">
    </label>
    
    

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