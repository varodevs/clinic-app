<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Ch;
use App\Models\Employee;
use App\Models\Patient;
use App\Models\User;

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
            $sel2 = 1;
            $employee = $employee->getEmployeeByUser(session('id_user'));

            $id_emp = $employee->cod_emp;

            $array = $appoint->getAppointsByEmp($id_emp);
            $last = $appoint->getLastAppointEmp($id_emp);

            if($last != null){
                $date_appoint = $last->date_appoint;
            }else{
                $date_appoint = now();
            }
                

            return view('profile', compact('employee', 'array','sel','sel2','date_appoint'));
        }else{
            $sel2 = 2;
            $patient = $patient->getPatientByUser(session('id_user'));

            if($patient != null){
                $id_patient = $patient->cod_patient;
            }else{
                $id_patient = null;
            }
                

            $array = $appoint->getAppointsByPatient($id_patient);
            $last = $appoint->getLastAppointPat($id_patient);

            if($last != null){
                $date_appoint = $last->date_appoint;
            }else{
                $date_appoint = now();
            }

            return view('profile', compact('patient', 'array','sel','sel2','date_appoint'));
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
                $sel2 = 1;
                $employee = $employee->getEmployeeByUser(session('id_user'));

                $array = $appoint->getAppointsByPatient($employee->cod_emp);
                $last = $appoint->getLastAppointEmp($employee->cod_emp);

                if($last != null){
                    $date_appoint = $last->date_appoint;
                }else{
                    $date_appoint = now();
                }


                return view('profile', compact('employee','patient','sel','sel2','date_appoint'));
            }else{
                $sel2 = 2;
                $patient = $patient->getPatientByUser(session('id_user'));

                if($patient != null){
                    $id_patient = $patient->cod_patient;
                }else{
                    $id_patient = 0;
                }
    
                $array = $appoint->getAppointsByPatient($id_patient);
                $last = $appoint->getLastAppointPat($id_patient);
                if($last != null){
                    $date_appoint = $last->date_appoint;
                }else{
                    $date_appoint = "";
                }
    
                return view('profile', compact('employee','patient','sel','sel2','date_appoint'));
            }
        }
    }

    public function userTherapy(){
        $user = new User();        
        $pat = new Patient();
        $employee = new Employee();
        $ch = new Ch();
        $sel = 3;
        if(session('id_user') != null && session('id_user') != ""){

            if(session('role') != 6){
                $sel2 = 1;
                $employee = $employee->getEmployeeByUser(session('id_user'));

                return view('profile', compact('array','employee','patient','sel','sel2'));
            }else{
                $sel2 = 2;

                $patient = $pat->getPatientByUser(session('id_user'));

                if($patient != null){
                    $id_patient = $patient->cod_patient;
                }else{
                    $id_patient = 0;
                }

                $array = $ch->getChByPatient($id_patient);
                return view('profile', compact('array','employee','patient','sel','sel2'));
            }            
        }
    }

    public function delAppo(Request $request){
        $id_appo = $request->input('id_appo');

        $appoint = new Appointment();
        $sel = 1;
        $result = $appoint->deleteAppoint($id_appo);

        return redirect()->route('dashboard', ['sel' => $sel]);
    }

    public function modUser(Request $request){

    }

    public function uplImg(Request $request){

        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
    
        $image = $request->file('image');
    
        $uniqueId = uniqid();
    
        $storagePath = '/public/img/userimg';
    
        $imageName = $uniqueId . '.' . $image->getClientOriginalExtension();
    
        Storage::putFileAs($storagePath, $image, $imageName);
    
        return redirect()->back()->with('success', 'Image uploaded successfully.');
    }
}
