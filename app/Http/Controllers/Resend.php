<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\Appointment;
use App\Models\Patient;
use App\Models\Therapy;
use App\Models\Employee;
use App\Models\User;
use App\Models\Ch;
use App\Models\Trauma;
use App\Models\Address;
use App\Mail\Email;
use App\Mail\EmailPassw;
use App\Mail\EmailReset;

class Resend extends Controller
{

    public function ResendPasswView(){
     return view('resend-form')->with('scrollToSelection', 'section');  
    }
    public function ResendPassw(Request $request){

        $request->validate([
            'email' => 'required|email|min:8|max:35',
            ]);

            $user = new User();
            $message = "";
            $id_user = $user->getUserIdByEmail($request->email);

            if($id_user != null){
                $user = $user->getUserdById($id_user);
                $message = "Su email es válido. Puedes crear un nuevo password en https://www.vitalcore.es/update-passw-form";

                $response = Mail::to($request->email)->send(new EmailReset($user->username,$message));
            }else{
                $message = "The email provided does not match any user";
                return view('resend-form')->with('scrollToSelection', 'section'); 
            }         
       }

       public function ResetSubmit(Request $request){

        $request->validate([
            'email' => 'required|email|min:8|max:35',
            'password' => 'required|min:8|max:12',
            'pass_conf' => 'required|same:password',
            ]);

            $user = new User();
            $message = "";
            $id_user = $user->getUserIdByEmail($request->email);

            if($id_user != null){
                $user = $user->getUserdById($id_user);
                $hash_pssw = Hash::make($request->password);
                $result = $user->updateUser($user->id_user, $user->username,  $user->email, $hash_pssw,  $user->cod_verify,  $user->active);                
                $response = Mail::to($request->email)->send(new EmailReset($user->username,$message));

                return view('login')->with('scrollToSelection', 'section'); 
            }else{
                $message = "The email provided does not match any user";
                return view('resend-form')->with('scrollToSelection', 'section'); 
            } 
       }
}
?>