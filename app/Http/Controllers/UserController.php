<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function userDashboard()
    {
        $user = new User();
        $appoint = new Appointment();
        $patient = new Patient();
        $employee = new Employee();

        if(session('id_user') != null && session('id_user') != ""){
            $user = $user->getUserdById(session('id_user'));
            $sel = 2;
        if($user->role_cod_role != 6){
            $employee = $employee->getEmployeeByUser(session('id_user'));

            $appoints = $appoint->getAppointsByPatient($employee->cod_employee);
            $last = $appoint->getLastAppoint();
            $last_date = $last->date_appoint;
            return view('profile', compact('employee', 'appoints','sel','last_date'));
        }else{
            $patient = $patient->getPatientByUser(session('id_user'));

            $appoints = $appoint->getAppointsByPatient($patient->cod_patient);

            return view('profile', compact('patient', 'appoints','sel','last_date'));
        }

        
        }else{
            return view('home');
        }        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
