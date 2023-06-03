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

        $result = $user->deleteUser($id_user);
        return view('admin');
    }

    public function Admin_updUsr(Request $request)
    {
        $user = new User();
        $row = $request->input('row');

        $id_user = $row(0);
        $username= $row(1);
        $email= $row(2);
        $password= $row(3);
        $cod_verify= $row(4);
        $active= $row(5);
        $img_path= $row(6);

        $result = $user->updateUser($id_user,$username,$email,$password,$cod_verify,$active,$img_path);
    }
}