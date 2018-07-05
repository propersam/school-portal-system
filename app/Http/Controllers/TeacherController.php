<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Auth;
use App\Classes;
use App\Teacher;
use App\Session;
use App\Student;
use App\Level;
use App\SubjectRegistration;
use App\Result;
use App\AssessmentResult;


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
    public function edit()
    {
        $profile = Teacher::where('user_id', '=', Auth::user()->id)->first();
        return view('forms.profile.edit', ['profile' => $profile]);
    }



    public function imageUploadPost()

    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
    // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500',

        ]);



            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('uploads/profile_photos'), $imageName);

            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->photo = $imageName;
            $obj_user->save(); 

        return redirect('dashboard/profile')->with('success', "Photo successfully updated.");

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
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'qualifications' => 'required|string|max:255',
        ]);
    }


    public function updateProfile(Request $request)
        {
            $request = $request->all();
            $this->validator($request)->validate();
        
            $user_id = Auth::User()->id;                       
            // $obj_user = Teacher::find($user_id);
            $obj_user = Teacher::where('user_id', $user_id)->first();
            $obj_user->firstname = $_POST['firstname'];
            $obj_user->lastname = $_POST['lastname'];
            $obj_user->gender = $_POST['gender'];
            $obj_user->phonenumber = $_POST['phonenumber'];
            $obj_user->description = $_POST['description'];
            $obj_user->qualifications = $_POST['qualifications'];
            $obj_user->save(); 

        return redirect('dashboard/profile')->with('success', "Profile successfully updated.");
    }
}
