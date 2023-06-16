<?php

namespace App\Http\Controllers;

use App\Models\Address;
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
            $img_path = $employee->img_path;

            if($last != null){
                $date_appoint = $last->date_appoint;
            }else{
                $date_appoint = now();
            }
                

            return view('profile', compact('employee', 'array','sel','sel2','date_appoint','img_path'))->with('scrollToSection', 'section');
        }else{
            $sel2 = 2;
            $emp = new Employee();
            $patient = $patient->getPatientByUser(session('id_user'));
            $name = "";
            if($patient != null){
                $id_patient = $patient->cod_patient;
                $img_path = $patient->img_path;
            }else{
                $id_patient = null;
                $img_path = 'img/userimg/default.png';
            }
                
            $array = $appoint->getAppointsByPatient($id_patient);
            $last = $appoint->getLastAppointPat($id_patient);
            

            if($last != null){
                $date_appoint = $last->date_appoint;
                $employee = $emp->getEmployee($last->employee_cod_emp);
                $name = $employee->name_emp;
            }else{
                $date_appoint = now();
            }

            return view('profile', compact('patient', 'array','sel','sel2','date_appoint','img_path','name'))->with('scrollToSection', 'section');
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
        $addr = new Address();

        if(session('id_user') != null && session('id_user') != ""){
            $user = $user->getUserdById(session('id_user'));
            $sel = 1;
            if($user->role_cod_role != 6){
                $sel2 = 1;
                $employee = $employee->getEmployeeByUser(session('id_user'));

                $array = $appoint->getAppointsByPatient($employee->cod_emp);
                $last = $appoint->getLastAppointEmp($employee->cod_emp);
                $img_path = $employee->img_path;

                if($last != null){
                    $date_appoint = $last->date_appoint;
                }else{
                    $date_appoint = now();
                }


                return view('profile', compact('employee','patient','sel','sel2','date_appoint','img_path'))->with('scrollToSection', 'section');
            }else{
                $sel2 = 2;
                $patient = $patient->getPatientByUser(session('id_user'));

                if($patient != null){
                    $id_patient = $patient->cod_patient;
                    $img_path = $patient->img_path;
                }else{
                    $id_patient = 0;
                    $img_path = 'img/userimg/default.png';
                }
                
                $address = $addr->getAddressByCod($id_patient);
                $array = $appoint->getAppointsByPatient($id_patient);
                $last = $appoint->getLastAppointPat($id_patient);
                

                if($last != null){
                    $date_appoint = $last->date_appoint;
                }else{
                    $date_appoint = "";
                }
    
                return view('profile', compact('employee','patient','sel','sel2','date_appoint','img_path','address'))->with('scrollToSection', 'section');
            }
        }
    }

    public function userCh(){
        $user = new User();        
        $pat = new Patient();
        $employee = new Employee();
        $ch = new Ch();
        $sel = 3;
        if(session('id_user') != null && session('id_user') != ""){

                $sel2 = 2;

                $patient = $pat->getPatientByUser(session('id_user'));                

                if($patient != null){
                    $id_patient = $patient->cod_patient;
                    $img_path = $patient->img_path;
                }else{
                    $id_patient = 0;
                    $img_path = 'img/userimg/default.png';
                }

                $array = $ch->getChByPatient($id_patient);
                return view('profile', compact('array','employee','patient','sel','sel2','img_path'))->with('scrollToSection', 'section');          
        }else{
            return view('home');
        }
    }

    public function delAppo(Request $request){
        $id_appo = $request->input('id_appo');

        $appoint = new Appointment();
        $sel = 1;
        $result = $appoint->deleteAppoint($id_appo);

        return redirect()->route('dashboard', ['sel' => $sel]);
    }

    public function confAppo(Request $request){
        $id_appo = $request->input('id_appo');
        $conf = $request->input('conf');

        $appoint = new Appointment();
        $sel = 1;
        $result = $appoint->confirmAppoint($id_appo,$conf);

        return redirect()->route('dashboard', ['sel' => $sel]);
    }

    public function modUser(Request $request){

    }

    public function uplImg(Request $request){

        $request->validate([
            'image' => 'required|image|max:2048',
        ]);
    
        $image = $request->file('image');
        $prefix = 'ui';
        $uniqueId = uniqid($prefix);
    
        $storagePath = 'public/img/userimg/';
    
        $imageName = $uniqueId . '.' . $image->getClientOriginalExtension();
    
        Storage::putFileAs($storagePath, $image, $imageName);

        $img_path = 'img/userimg/' . $imageName;

        if(session('role') != 6){
            $emp = new Employee();

            $employee = $emp->getEmployeeByUser(session('id_user'));
            $previousImage = $employee->img_path;
            Storage::delete($previousImage);

            $result = $emp->updateEmployee($employee->cod_emp, $employee->name_emp, $employee->title, $employee->title_court, $employee->date_birth, $employee->date_hire, $img_path);

        }else{
            $pat = new Patient();

            $patient = $pat->getPatientByUser(session('id_user'));
            if($patient != null){
                $previousImage = 'public/' . $patient->img_path;
                Storage::delete($previousImage);
                $result = $pat->updatePatient($patient->cod_patient,$patient->first_name,$patient->last_name,$patient->phone,$patient->date_birth,$patient->age,$patient->sex,$img_path);                
            }else{
                $img_path = 'public/' . $img_path;
                Storage::delete($img_path);
            }            
        }
    
        return redirect()->route('profile')->with('scrollToSection', 'section');
    }

    public function addAddr(Request $request){
        $request->validate([
                'street' => 'max:50',
                'pc' => 'max:10',
                'city' => 'max:45',
                'country' => 'max:25',
                'number' => 'max:3',
                'flat' => 'max:3',
                 ]);

            $addr = new Address();

            $result = $addr->createAddress($request->street,$request->pc,$request->city,$request->country,$request->number,$request->flat,$request->cod_pat);

            $address = $addr->getAddressByCod($request->cod_pat);

            return redirect()->route('profile')->with(['scrollToSection' => 'section','address'=> $address]);
    }
}
