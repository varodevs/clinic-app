@extends('layout')

@section('content')

    <div class="col-12">
        <div class="container-fluid d-flex flex-column justify-content-center _div-azul">
            <h3 class="mx-3 align-self-start">Admin</h3>
        </div>
        <div class="d-flex justify-content-center _content">
            <div>
                <div>
                    <h4>Admin</h4>
                    <img src="{{ asset('img/profile.png') }}" alt="">
                </div>
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">Name</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
                  <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">ID</span>
                    <input type="text" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                  </div>
            </div>
            <div>
                <table>
                    <thead>
                        <tr>
                            <td>ID</td>
                            <td>Date</td>
                            <td>Employee</td>
                            <td>Patient</td>
                            <td>Confirmed</td>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                        use App\Models\Employee;
                        use App\Models\Appointment;
                        use App\Models\Patient;
                        $appointment = new Appointment();
                            foreach ($item as {{ 'appointment' }}) {
                                echo "<td>"
                                echo $item->'cod_appoint'
                                echo "</td>"
                            }
                        @endphp
                    </tbody>
            </div>
            <div></div>
            <div></div>
        </div>
    </div>

@endsection