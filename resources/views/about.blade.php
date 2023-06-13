@extends('layout')

@section('content')
<div class="col-12">
    <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
        <h3 class="mx-3">About us</h3>
    </div>
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h2>Get to know us</h2></div>
        <div class="text-center w-75"><p>Welcome to VitalCore, where we are dedicated to helping you achieve optimal health and wellness through personalized physiotherapy services. Our team of highly skilled and experienced physiotherapists is committed to providing exceptional care and improving your quality of life.</p></div>
    </div>
    <div class="d-flex justify-content-center col-12 mt-5">
        <img src="{{ asset('img/imagebg.jpg') }}" alt="" class="align-self-center w-75 h-25">
    </div>
</div>
@endsection