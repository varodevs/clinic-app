@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
            <h3 class="mx-3 align-self-start">Admin</h3>
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
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" disabled>
                </div>
            </div>
            <div class="col-12 d-flex justify-content-center">
                <div>
                    <ul class="nav justify-content-center">
                        <li class="nav-item">
                          <a class="nav-link active" aria-current="page" href="{{ route('admin-appo') }}">Appointments</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin-pat') }}">Patients</a>
                        </li>
                        <li class="nav-item">
                          <a class="nav-link" href="{{ route('admin-emp') }}">Employees</a>    
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('admin-usr') }}">Users</a>    
                          </li>
                        <li class="nav-item">
                          <a class="nav-link disabled" href="" tabindex="-1" aria-disabled="true">Create</a>
                        </li>
                      </ul>
                </div>
            </div>
            <div class="col-12 px-4">
                @if ($sel != null)
                    @switch($sel)
                    @case(1)
                        @include('tables.appointments', ['array' => $array])
                        @break
                    @case(2)
                        @include('tables.patients', ['array' => $array])
                        @break
                    @case(3)
                        @include('tables.employees', ['array' => $array])
                        @break
                    @case(4)
                        @include('tables.users', ['array' => $array])
                        @break
                    @default
                        @include('tables.appointments', ['array' => $array])           
                @endswitch
                @else
                    @include('tables.appointments', ['array' => $array])
                
                    
                @endif
                                
            </div>
        </div>
    </div>

@endsection