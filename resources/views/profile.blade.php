@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul" id="section">
            <h3 class="mx-3 align-self-start">Your Profile</h3>
        </div>
        <div class="col-12 d-flex flex-column">
            <div class="col-2 align-self-start m-3">
                <div class="_profile-imgDiv">
                    <img src="{{ asset('storage/'.$img_path) }}" alt="Profile image" class="rounded-circle">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Username</span>
                    <input type="text" class="form-control" placeholder="ID" aria-label="ID" aria-describedby="basic-addon1" value="{{ session('username') }}" disabled>
                  </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div>
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('profile') }}">Personal information</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('dashboard') }}">Appointments</a>
                        </li>
                        @if (session('role') == 6)
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('history') }}">Clinic history</a>    
                        </li>
                        @endif 
                      </ul>
                </div>
            </div>
            <div class="col-12 px-4">                
                @if ($sel != null)
                    @switch($sel)
                    @case(1)
                        @if ($sel2 == 1)
                        @include('profile-emp', ['employee' => $employee])
                        @elseif ($sel2 == 2)
                        @include('profile-user', ['patient' => $patient])
                        @endif                                            
                        @break
                    @case(2)
                        @if ($sel2 == 1)
                        @include('tables.appointments-admin', ['array' => $array])
                        @elseif ($sel2 == 2)
                        @include('tables.appointments', ['array' => $array])
                        @endif
                        
                        @break
                    @case(3)
                        @if (session('role') == 6)
                        @include('tables.clinic-history')
                        @endif                        
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