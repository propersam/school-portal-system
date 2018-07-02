<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Student;
use App\SubjectRegistration;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;


class TeacherController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Teacher Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the management of teachers as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */
    public function __construct()
    {
        $this->middleware('auth');
    }
    

    //use RegistersUsers;

    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function view_class()
    {

        $students = array();
        // get class teacher 
        $teacher = Teacher::where('user_id', '=', Auth::user()->id)->first();
        // get class information
        $class = Classes::where('teacher_id', '=', $teacher->id)->first();

        if($class){
        // get class teacher 
            $students = Student::where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();            
        }

        return view('forms.class.view_class', ['class' => $class, 'teacher' => $teacher, 'students' => $students]);
    }
    
    
    public function view_results()
    {   
        $subjects = array();

        // get class teacher 
        $teacher = Teacher::where('user_id', '=', Auth::user()->id)->first();


        // get class information
        $class = Classes::where('teacher_id', '=', $teacher->id)->first();

        if($class){
            $subjects = SubjectRegistration::where('level', '=', $class->level)->get();
        }



        return view('forms.result.view_subjects', ['subjects' => $subjects, 'class' => $class]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
