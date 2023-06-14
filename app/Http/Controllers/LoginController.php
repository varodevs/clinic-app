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
            'email' => 'required|email|min:8|max:35',
            'password' => 'required|min:8|max:15',
            ]);

            $user = new User();

            $email = $request->email;
            $password = $request->password;
            $id_user = $user->getUserIdByEmail($email);

            if($id_user != null){
                $user_by_id=$user->getUserdById($id_user);

                $role = $user_by_id->role_cod_role;
    
                if($email == $user_by_id->email && Hash::check($password, $user_by_id->password)){
    
                    $request->session()->put('id_user', $id_user);
                    $request->session()->put('role', $role);
                    $request->session()->put('username', $user_by_id->username);
    
                    switch($role){
                        case 4:
                            return redirect('/admin')->with('status', 'Login successful');
                            break;
                        case 5:
                            return redirect('/')->with('status', 'Login successful');
                            break;                                                
                        case 6:
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
        session()->forget('id_user');
        session()->forget('role');
        session()->forget('username');

        return redirect('login')->with('status', 'Logged out');
    }
}