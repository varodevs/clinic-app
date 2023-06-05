@extends('layout')

@section('content')
<div class="col-12">
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h2>Welcome to ActiveLife Physio</h2></div>
        <div class="text-center w-75"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
    </div>
    
    <div class="c-12 d-flex flex-column align-items-center pt-5 _div-treat" mb-5>
        <div class="c-3 text-center w-50 m-3"><h4>TREATMENTS</h4></div>
        <div id="carouselExampleControls" class="carousel slide w-25" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5>MASOTHERAPY</h5>
                        <img src="{{ asset('img/fisioterapia-deportiva.jpg') }}" class="_img-carou" alt="..." width="100%" height="200vh">                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5>KINESIOTHERAPY</h5>
                        <img src="{{ asset('img/ejercicio-fisioterapia.webp') }}" class="_img-carou" alt="..." width="100%" height="200vh">                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>                    
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5>OSTEOPATHY</h5>
                        <img src="{{ asset('img/osteopatia.jpg') }}" class="_img-carou" alt="..." width="100%" height="200vh">                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                    
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5>RESPIRATORY</h5>
                        <img src="{{ asset('img/respiratoria.webp') }}" class="_img-carou" alt="..." width="100%" height="200vh">                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>            
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5>NERUROLOGICAL</h5>
                        <img src="{{ asset('img/fisioterapia_neurologica.webp') }}" class="_img-carou" alt="..." width="100%" height="200vh">                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>                    
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5>ELECTROTHERAPY</h5>
                        <img src="{{ asset('img/electro.webp') }}" alt="..." width="100%" height="200vh">                    
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev _button-carou" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next _button-carou" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
</div>
@endsection