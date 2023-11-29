@extends('layouts.masuk')

@section('content')
<div class="pagehead-bg   primary-bg" style="min-height: 147px;">
</div>

<div class="container has-pagehead is-pagetitle">
    <div class="section">
        <h5 class="pagetitle">Kelembagaan</h5>
    </div>
</div>
<style>
    .containerr {
        display: flex;
        justify-content: space-around;
        align-items: center;
    }

    .image-wrapperr {
        height: 100px;
        width: 100px;
        margin-top: 100px;
    }

    .image-wrapperr img {
        height: 100px;
        width: 100px;
    }
</style>

<div class="containerr">
    <div class="image-wrapperr">
        <a href="{{route('kelembagaan-penyuluh')}}">
            
            <img alt="image" src="{{ asset('images/business.png') }}">
            <h6 class="text-center">Penyuluh</h6>
        </a>
    </div>
    <div class="image-wrapperr">
        <a href="{{route('kelembagaan-petani')}}">

        <img alt="image" src="{{ asset('images/menu-petani.png') }}">
        <h6 class="text-center">Petani</h6>
        </a>
    </div>
</div>


@endsection