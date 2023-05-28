@extends('layout')

@section('content')
<div class="col-12">
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h2>Welcome to ActiveLife Physio</h2></div>
        <div class="text-center w-75"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
    </div>

    <div class="c-12 d-flex flex-column align-items-center pt-5 _div-treat">
        <div class="text-center w-50"><h4>TREATMENTS</h4></div>
        <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="{{ asset('img/maso.jpg') }}" class="d-block" alt="..." height="100vh">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/kinesio.jpg') }}" class="d-block" alt="..." height="100vh">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/fisiatria.jpg') }}" class="d-block" alt="..." height="100vh">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/respiratoria.jpg') }}" class="d-block" alt="..." height="100vh">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/miofacial.jpg') }}" class="d-block" alt="..." height="100vh">
                </div>
                <div class="carousel-item">
                    <img src="{{ asset('img/electro.jpg') }}" class="d-block" alt="..." height="100vh">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endsection