<?php

namespace App\Http\Controllers;
use App\Teacher;
use Illuminate\Support\Facades\Auth;

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
