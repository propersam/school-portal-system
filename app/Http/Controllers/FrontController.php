<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Teacher;

use Illuminate\Http\Request;

class FrontController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    
    public function teachersdisplay()
    {   
        $teachers = Teacher::get();
        return view('staff-ecopillarsschool', ['teachers' => $teachers]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('eportal');

    }


}
