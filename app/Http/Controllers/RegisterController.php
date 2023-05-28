<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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
                $response = Mail::to('alvarobarbafer@gmail.com')->send(new Email($request->uname,$cod_verify));
                $user = new User();
                $result=$user->createUser($request->uname,$request->email,$request->password,$request->password_conf,now());
                return redirect('verify');
            }      
  
    }
    public function Verify(Request $request)
    {
        $this->validate(request(),[
            $request->email,$request->password,$request->code
            ]);
            $user = new User();
            $use_id=$user->getUserIdByEmail($request->email)[0];
            $user_by_id = $user->getUserdById($use_id);

            if($request->password.equalTo($user_by_id->password) && $request->code.equalTo($user_by_id->cod_verify)){
                
                return redirect('home');
            }
            
            

            
            
  
    }
}