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
        $result = $patient->updatePatient($request->input0,$request->input1,$request->input2,$request->input3,$request->date_birth,$request->input5,$request->input6,$request->input7);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    public function Admin_delPat(Request $request){
        $cod_patient = $request->input('cod_patient');
        $patient = new Patient();
        $sel=2;
        $result = $patient->deletePatient($cod_patient);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    public function Admin_updEmp(Request $request){
        $employee = new Patient();
        $sel=3;
        $result = $employee->updateEmployee($request->input0,$request->input1,$request->input2,$request->input3,$request->date4,$request->date5,$request->input6,$request->input7);
        return redirect()->route('admin-pat', ['sel' => $sel]);
    }

    public function Admin_delEmp(Request $request){
        $cod_emp = $request->input('cod_emp');
        $employee = new Patient();
        $sel=3;
        $result = $employee->deleteEmployee($cod_emp);
        return redirect()->route('admin-emp', ['sel' => $sel]);
    }

    public function delAppoAdm(Request $request){
        $id_appo = $request->input('id_appo');

        $appoint = new Appointment();
        $sel = 1;
        $result = $appoint->deleteAppoint($id_appo);

        return redirect()->route('admin-appo', ['sel' => $sel]);
    }

    public function updAppoAdm(Request $request){
        $id_appo = $request->input('id_appo');

        $appoint = new Appointment();
        $sel = 1;
        $result = $appoint->updateAppoint($id_appo,$request->input1,$request->input2);

        return redirect()->route('admin-appo', ['sel' => $sel]);
    }
}