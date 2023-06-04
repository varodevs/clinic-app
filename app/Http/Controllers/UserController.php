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
        $patient = new Patient();
        $employee = new Employee();
        $appoint = new Appointment();

        if(session('id_user') != null && session('id_user') != ""){
            $user = $user->getUserdById(session('id_user'));
            $sel = 2;
        if($user->role_cod_role != 6){
            $employee = $employee->getEmployeeByUser(session('id_user'));

            $array = $appoint->getAppointsByPatient($employee->cod_employee);
            $last = $appoint->getLastAppoint();
            $last = $appoint->getLastAppoint();
            if($last != null){
                $date_appoint = $last->date_appoint;
            }else{
                $date_appoint = "";
            }
            return view('profile', compact('employee', 'array','sel','date_appoint'));
        }else{
            $patient = $patient->getPatientByUser(session('id_user'));

            if($patient != null){
                $id_patient = $patient->cod_patient;
            }else{
                $id_patient = "";
            }

            $array = $appoint->getAppointsByPatient($id_patient);
            $last = $appoint->getLastAppoint();
            if($last != null){
                $date_appoint = $last->date_appoint;
            }else{
                $date_appoint = "";
            }
            return view('profile', compact('patient', 'array','sel','date_appoint'));
        }

        
        }else{
            return view('home');
        }        
    }

    public function userProfile(){
        $user = new User();        
        $patient = new Patient();
        $employee = new Employee();
        $appoint = new Appointment();

        if(session('id_user') != null && session('id_user') != ""){
            $user = $user->getUserdById(session('id_user'));
            $sel = 1;
            if($user->role_cod_role != 6){
                $employee = $employee->getEmployeeByUser(session('id_user'));

                $array = $appoint->getAppointsByPatient($employee->cod_employee);
                $last = $appoint->getLastAppoint();
                $last = $appoint->getLastAppoint();
                if($last != null){
                    $date_appoint = $last->date_appoint;
                }else{
                    $date_appoint = "";
                }

                return view('profile', compact('employee','patient','sel','date_appoint'));
            }else{
                $patient = $patient->getPatientByUser(session('id_user'));

                if($patient != null){
                    $id_patient = $patient->cod_patient;
                }else{
                    $id_patient = "";
                }
    
                $array = $appoint->getAppointsByPatient($id_patient);
                $last = $appoint->getLastAppoint();
                if($last != null){
                    $date_appoint = $last->date_appoint;
                }else{
                    $date_appoint = "";
                }
    
                return view('profile', compact('employee','patient','sel','date_appoint'));
            }
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
