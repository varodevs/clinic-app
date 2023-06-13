@extends('layout')

@section('content')
<div class="col-12">
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h2 class="_h2">Welcome to VitalCore Physio</h2></div>
        <div class="text-center w-75"><p>At our physiotherapy clinic, we are dedicated to helping you restore your mobility, alleviate pain, and enhance your overall quality of life. Our team of skilled physiotherapists is committed to providing personalized care and tailored treatment plans to meet your unique needs.</p></div>
    </div>
    
    <div class="c-12 d-flex flex-column align-items-center pt-5" mb-5>
        <div class="c-3 text-center w-50 m-3"><h4 class="_h4">TREATMENTS</h4></div>
        <div id="carouselExampleControls" class="carousel slide w-25" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5 class="_h5">MASOTHERAPY</h5>
                        <img src="{{ asset('img/fisioterapia-deportiva.jpg') }}" alt="..." width="100%" height="200vh">                    
                        <p class="_carou-p">Heal with massage therapy.</p>
                    </div>
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5 class="_h5">KINESIOTHERAPY</h5>
                        <img src="{{ asset('img/ejercicio-fisioterapia.webp') }}" alt="..." width="100%" height="200vh">                    
                        <p class="_carou-p">Improve your functional abilities.</p>
                    </div>                    
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5 class="_h5">OSTEOPATHY</h5>
                        <img src="{{ asset('img/osteopatia.jpg') }}" alt="..." width="100%" height="200vh">                    
                        <p class="_carou-p">A better musculoskeletal condition.</p>
                    </div>
                    
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5 class="_h5">RESPIRATORY</h5>
                        <img src="{{ asset('img/respiratoria.webp') }}" alt="..." width="100%" height="200vh">                    
                        <p class="_carou-p">Healing by a proper respiratory habit.</p>
                    </div>            
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5 class="_h5">NERUROLOGICAL</h5>
                        <img src="{{ asset('img/fisioterapia_neurologica.webp') }}" alt="..." width="100%" height="200vh">                    
                        <p class="_carou-p">Treatment of you neurological conditions.</p>
                    </div>                    
                </div>
                <div class="carousel-item">
                    <div class="c-3 d-flex flex-column align-self-center text-center">
                        <h5 class="_h5">ELECTROTHERAPY</h5>
                        <img src="{{ asset('img/electro.webp') }}" alt="..." width="100%" height="200vh">                    
                        <p class="_carou-p">Stimulation to improve physical function.</p>
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
    <div class="c-12 d-flex flex-column align-items-center pt-5" mb-5>
        <div class="c-3 text-center w-50 m-3"><h4 class="align-self-center _h4">ABOUT US</h4></div>
        <div  class="c-12 d-flex justify-content-evenly pt-5">
            <div>
                <img src= {{ asset('img/about-us.jpg') }} height="250vh" />
            </div>
            <div class="w-25"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
        </div>
    </div>
    <div class="d-flex flex-column mb-5">
        <div class="c-3 align-self-center text-center w-50 h-100 mt-5"><h4 class="align-self-center _h4">CONTACT US</h4></div>    
    <div>
        <div class="d-flex justify-content-evenly">
            <div style="height: 100%;" class="d-flex flex-column justify-content-cente w-50 _div-login">
                <form class="d-flex flex-column justify-content-center _form" action="" method="POST">
                @csrf
                <div class="d-flex justify-content-evenly w-75">
                    <div>
                        <label class="_form-label" for="fname">First Name</label>
                        <input class="form-control" type="text" name="fname" id="fname">
                        <label class="_form-label" for="sname">Phone Number</label>
                        <input class="form-control" type="text" name="sname" id="sname">
                    </div>
                    <div>
                        <label class="_form-label" for="lname">Last Name</label>
                        <input class="form-control" type="text" name="lname" id="lname">
                        <label class="_form-label" for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" placeholder="name@email.com">
                        
                    </div>
                </div>
                    <div class="w-75">
                        <label class="_form-label" for="textarea" >Describe your problem:</label>
                        <textarea class="form-control" name="textarea" id="textarea"></textarea>
                    </div>
                
                </form>
            </div>
            <div id="map" style="width: 300px;height: 300px;"></div>
        </div>

    </div>
</div>
</div>
@endsection
