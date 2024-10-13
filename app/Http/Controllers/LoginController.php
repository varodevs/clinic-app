<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Session;
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
        Session::put('test', 'sesion de los cojones');
    }
    /**
     * Handles Login form submit
     */
    public function Login_done(Request $request)
    {
        dd(Session::all());
        $this->validate(request(),[
            'email' => 'required|email|min:8|max:35',
            'password' => 'required|min:8|max:15',
            ]);

            $user = new User();

            $email = $request->email;
            $password = $request->password;
            $id_user = $user->getUserIdByEmail($email);

            if($id_user != 0 && $id_user != null){
                $user_by_id=$user->getUserdById($id_user);

                $role = $user_by_id->role_cod_role;
    
                if($email == $user_by_id->email && Hash::check($password, $user_by_id->password)){
                    
                    //Redis session storage

                    Session::put('id_user', $id_user);
                    Session::put('role', $role);
                    Session::put('username', $user_by_id->username);

                    
                    // $request->session()->put('id_user', $id_user);
                    // $request->session()->put('role', $role);
                    // $request->session()->put('username', $user_by_id->username);
    
                    switch($role){
                        case 1:
                            return redirect('/admin')->with('status', 'Login successful');
                            break;
                        case 2:
                            return redirect('/')->with('status', 'Login successful');
                            break;                                                
                        case 3:
                            if($user_by_id->active != 0){
                                return redirect('/verify')->with('status', 'Login successful, but needs verification');
                            }else{
                                return redirect('user/dashboard')->with('status', 'Login successful');
                            }
                            break;
                        default:
                        return redirect('login')->with('status', 'Login failed. The user has no role.');
                            break;
                    }
               }else{
                    return redirect('login')->with('status', 'Login failed');
                }  
            }else{
                return redirect('login')->with('status', 'Login failed');
            }
    }

    public function Logout(Request $request){
        
        Session::flush();

        return redirect('login')->with('status', 'Logged out');
    }
}