<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    /**
     * Returns Login page.
     */
    public function Login_view()
    {
        return view('login');
    }
    /**
     * Handles Login form submit
     */
    public function Login_done(Request $request)
    {
        $this->validate(request(),[
            $request->email,$request->password
            ]);

            $user = new User();

            $email = $request->email;
            $password = $request->password;

            $id_user = $user->getUserIdByEmail($email)[0];

            $user_by_id=$user->getUserdById($id_user);

            $role = $user_by_id->role_cod_role;

            if($email == $user_by_id->email && $password == $user_by_id->password){

                $request->session()->put('id_user', $id_user);
                $request->session()->put('role', $role);

                switch($role){
                    case 4:
                        return redirect('/')->with('status', 'Login successful');
                        break;
                    case 5:
                        return redirect('/')->with('status', 'Login successful');
                        break;
                    case 6:
                        return redirect('/')->with('status', 'Login successful');
                        break;
                    default:
                    return redirect('login')->with('status', 'Login failed. The user has no role.');
                        break;
                }
           }else{
                return redirect('login')->with('status', 'Login failed');
            }   
    }
}