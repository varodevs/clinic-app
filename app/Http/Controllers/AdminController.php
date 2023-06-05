<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Therapy;
use App\Models\Employee;
use App\Models\User;

class AdminController extends Controller
{
    /**
     * Returns to Treatments page.
     */
    public function Admin_view()
    {
        $appointment = new Appointment();
        $sel=1;
        $array = $appointment->getAppoints();
        return view('admin', compact('array', 'sel'));
    }

    public function Admin_appo()
    {
        $appointment = new Appointment();
        $sel=1;

        $array = $appointment->getAppoints();
        return view('admin', compact('array', 'sel'));
    }

    public function Admin_pat()
    {
        $patient = new Patient();
        $sel=2;

        $array = $patient->getPatients();
        return view('admin', compact('array', 'sel'));
    }

    public function Admin_emp()
    {
        $employee = new Employee();
        $sel=3;

        $array = $employee->getEmployees();
        return view('admin', compact('array', 'sel'));
    }

    public function Admin_usr()
    {
        $user = new User();
        $sel=4;

        $array = $user->getUsers();
        return view('admin', compact('array', 'sel'));
    }

    public function Admin_delUsr(Request $request)
    {
        $id_user = $request->input('id_user');
        $user = new User();
        $sel=4;

        $result = $user->deleteUser($id_user);
        return redirect()->route('admin-usr', ['sel' => $sel]);
    }

    public function Admin_updUsr(Request $request)
    {
        $user = new User();

        $sel=4;

        $result = $user->updateUser($request->id_user,$request->username,$request->email,$request->password,$request->cod_verify,$request->active,$request->img_path);

        return redirect()->route('admin-usr', ['sel' => $sel]);
    }

    public function Admin_updPat(Request $request){
        $patient = new Patient();
        $sel=2;
        $result = $patient->updatePatient($request->cod_patient,$request->first_name,$request->last_name,$request->phone,$request->date_birth,$request->age,$request->sex,$request->img_path);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    public function Admin_delPat(Request $request){
        $cod_patient = $request->input('cod_patient');
        $patient = new Patient();
        $sel=2;
        $result = $patient->deletePatient($cod_patient);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }
}