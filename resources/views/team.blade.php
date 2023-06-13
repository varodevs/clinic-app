@extends('layout')

@section('content')
<div class="col-12">
  <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
    <h3 class="mx-3">Our Team</h3>
</div>
    <div class="container-fluid d-flex flex-column align-items-center pt-5">
        <div class="text-center w-50"><h4>From VitalCore team</h4></div>
        <div class="text-center w-75"><p>At VitalCore, we understand that each individual is unique, and that's why we take a customized approach to your treatment. We believe in treating the root cause of your condition, not just the symptoms, to ensure long-lasting results.</p></div>
    </div>

    <div class="c-12 d-flex flex-row flex-wrap justify-content-center pt-5 _div-treat" mb-5>

        <div class="card w-25 m-3">
            <img src="{{ asset('img/fisio1.jpg') }}" class="card-img-top align-self-center w-50" alt="...">
            <div class="card-body">
              <h5 class="card-title">Robert McFadden</h5>
              <p class="card-text">Specialist in Masotherapy and kinesiotherapy.</p>              
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/fisio2.jpg') }}" class="card-img-top align-self-center w-50" alt="...">
            <div class="card-body">
              <h5 class="card-title">Kirsty Samuels</h5>
              <p class="card-text">Specialist in Ostheopathy and Respiratory.</p>              
            </div>
          </div>
          <div class="card w-25 m-3">
            <img src="{{ asset('img/fisio3.jpg') }}" class="card-img-top align-self-center w-50" alt="...">
            <div class="card-body">
              <h5 class="card-title">Sarah Stewart</h5>
              <p class="card-text">Specialist in Neuroligical and Physiatry.</p>              
            </div>
          </div>
    </div>
</div>
@endsection