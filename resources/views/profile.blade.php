@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
            <h3 class="mx-3 align-self-start">Your Profile</h3>
        </div>
        <div class="col-12 d-flex flex-column">
            <div class="col-2 align-self-start m-3">
                <div class="d-flex flex-column justify-content-center w-50">
                    <img src="{{ asset('img/profile.png') }}" alt="" class="rounded-circle" height="110vh">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1" disabled>
                  </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Next appointment</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div>
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('admin-appo') }}">Personal information</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin-pat') }}">Appointments</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin-emp') }}">Therapy history</a>    
                        </li>
                      </ul>
                </div>
            </div>
            <div class="col-12 px-4">
                @if ($sel != null)
                    @switch($sel)
                    @case(1)
                        @include('tables.appointments')
                        @break
                    @case(2)
                        @include('tables.appointments')
                        @break
                    @case(3)
                        @include('tables.appointments')
                        @break                
                    @default
                        @include('tables.appointments')                        
                @endswitch
                @else
                    @include('tables.appointments')
                
                    
                @endif
                                
            </div>
        </div>
    </div>

@endsection