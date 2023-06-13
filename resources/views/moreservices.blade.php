@extends('layout')

@section('content')
<div class="col-12">
  <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
    <h3 class="mx-3">More services</h3>
</div>
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h2>More tratments in our installations</h2></div>
        <div class="text-center w-75"><p>We give you the possibility to get some special treatments.</p></div>
    </div>

    <div class="c-12 d-flex flex-row flex-wrap justify-content-center pt-5 _div-treat" mb-5>

        <div class="card w-25 m-3">
            <img src="{{ asset('img/yoga.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Yoga</h5>
              <p class="card-text">Enrole in amazing yoga classes.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/magnetoterapia.jpg') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Magnetotherapy</h5>
              <p class="card-text">Experience the healing benefits of magnets.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/hidro.webp') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Hidrotherapy</h5>
              <p class="card-text">Hidrotherapy is a great way to keep a healthy system.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/electro.webp') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Electrotherapy</h5>
              <p class="card-text">This treatment makes you recover with electricity.</p>
              <a href="#" class="btn btn-primary">Go somewhere</a>
            </div>
          </div>        
    </div>
</div>
@endsection