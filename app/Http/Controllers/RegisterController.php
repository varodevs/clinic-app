<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
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
            'uname' => 'required|string',
            'email' => 'required|email|min:8|max:35',
            'password' => 'required|min:8|max:15',
            'pass_conf' => 'required|same:password',
            'check_terms' => 'accepted',
            ]);
            if($request->password == $request->pass_conf && $request->check_terms != null){
                $cod_verify = Str::upper(Str::random(4));
                $name = $request->uname;
                $role = 6;
                $hash_pssw = Hash::make($request->password);
                $user = new User();
                $response = Mail::to($request->email)->send(new Email($name,$cod_verify));
                $result=$user->createUser($request->uname, $request->email, $hash_pssw, $cod_verify, $role, now());
                return redirect('verify');
            }else{
                return redirect('register');
            }      
  
    }
    public function Verify(Request $request)
    {
        $this->validate(request(),[            
            'email' => 'required|email',
            'password' => 'required|min:8|max:12',
            'code' => 'required|string',
            ]);
            
            $hash_pssw = Hash::make($request->password);
            $user = new User();
            $user_id=$user->getUserIdByEmail($request->email)[0];
            $user_by_id = $user->getUserdById($user_id);

            if(Hash::check($user_by_id->password, $hash_pssw) && $request->code.equalTo($user_by_id->cod_verify)){
                $active = 0;
                $result=$user->updateUser($user_id, $user_by_id->username, $user_by_id->email, $user_by_id->password, $user_by_id->cod_verify, $active,$user_by_id->reg_date,$user_by_id->img_path);
                return redirect('home');
            }else{
                return redirect('verify');
            }
            
            

            
            
  
    }
}