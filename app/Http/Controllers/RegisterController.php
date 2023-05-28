<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Mail\Email;

class RegisterController extends Controller
{
    /**
     * Returns to Register page.
     */
    public function Register_view()
    {
        return view('register');
    }
    /**
     * Handles Register form submit
     */
    public function Register_done(Request $request)
    {
        $this->validate(request(),[
            $request->uname,$request->email,$request->password,$request->password_conf,$request->check_terms
            ]);
            if($request->password.equalTo($request->password_conf)){
                $cod_verify = 'ABCD';
                $role = 6;
                $hash_pssw = Hash::make($request->password);
                $user = new User();
                $response = Mail::to('alvarobarbafer@gmail.com')->send(new Email($request->uname,$cod_verify));
                $result=$user->createUser($request->uname, $request->email, $request->hash_pssw, $cod_verify, $role, now());
                return redirect('verify');
            }      
  
    }
    public function Verify(Request $request)
    {
        $this->validate(request(),[
            $request->email,$request->password,$request->code
            ]);
            $hash_pssw = Hash::make($request->password);
            $user = new User();
            $user_id=$user->getUserIdByEmail($request->email)[0];
            $user_by_id = $user->getUserdById($user_id);

            if($hash_pssw.equalTo($user_by_id->password) && $request->code.equalTo($user_by_id->cod_verify)){
                $active = 0;
                $result=$user->updateUser($user_id, $user_by_id->username, $user_by_id->email, $user_by_id->password, $user_by_id->cod_verify, $active, $user_by_id->img_path);
                return redirect('home');
            }else{
                return redirect('verify');
            }
            
            

            
            
  
    }
}