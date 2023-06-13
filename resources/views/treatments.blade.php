@extends('layout')

@section('content')
<div class="col-12">
  <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
    <h3 class="mx-3">Treatments</h3>
</div>
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h2>Treatments we offer</h2></div>
        <div class="text-center w-75"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p></div>
    </div>

    <div class="c-12 d-flex flex-row flex-wrap justify-content-center pt-5 _div-treat" mb-5>

        <div class="card w-25 m-3">
            <img src="{{ asset('img/fisioterapia-deportiva.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Masotherapy</h5>
              <p class="card-text">Heal with massage therapy.</p>
              <a href="#" class="btn btn-primary">Read more</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/ejercicio-fisioterapia.webp') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Kinesiotherapy</h5>
              <p class="card-text">Improve your functional abilities.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/osteopatia.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Osteopathy</h5>
              <p class="card-text">A better musculoskeletal condition.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/respiratoria.webp') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Respiratory therapy</h5>
              <p class="card-text">Healing by a proper respiratory habit.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/fisioterapia_neurologica.webp') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Neurological therapy</h5>
              <p class="card-text">Treatment of you neurological conditions.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/fisiatria.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Phisiatry</h5>
              <p class="card-text">Stimulation to improve physical function.</p>
              <a href="#" class="btn btn-primary">Read More</a>
            </div>
          </div>
    </div>
</div>
@endsection