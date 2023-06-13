@extends('layout')

@section('content')
<div class="col-12">
    <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
        <h3 class="mx-3">About us</h3>
    </div>
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h2>Get to know us</h2></div>
        <div class="text-center w-75"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
    </div>
    <div class="d-flex justify-content-center col-12 mt-5">
        <img src="{{ asset('img/imagebg.jpg') }}" alt="" class="align-self-center w-75 h-25">
    </div>
</div>
@endsection