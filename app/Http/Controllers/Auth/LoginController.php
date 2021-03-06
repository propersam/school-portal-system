<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    // protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }



    public function authenticate(Request $request)
    {
        $username = $request->username;
        $password = $request->password;

        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            Auth::attempt(['email' => $username, 'password' => $password]);
        }
        elseif(is_numeric($username)){
            Auth::attempt(['phone' => $username, 'password' => $password]);
        }
        else{
            Auth::attempt(['username' => $username, 'password' => $password]);
        }

        if (Auth::check()) {
            // Authentication passed...
            $user = Auth::user();
            $id = Auth::id();

            // dd($user->default_password_changed);
            // check if user has changed default password
            if($user->default_password_changed == 'yes'){
                // check if user is a user and has set passport photo
                if(!$user->photo && $user->role == 'Teacher'){
                    return redirect('/change-photo');
                }else{
                    return redirect()->intended('/dashboard');
                }
            }else{
                return redirect('/change-default-password');
            }
        }else{
            return redirect()->route('login')->with('danger', "Username or password wrong");
             

        }
    }

    public function username()
    {
        return 'username';
    }


}
