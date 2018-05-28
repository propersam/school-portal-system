<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;
use App\Classes;
use App\Teacher;
use App\Session;
use App\Student;
use App\User;

class ClassController extends Controller
{
    //
    public function index()
    {   
      
        $sessions = Session::pluck('name', 'id');
        $teachers = Teacher::pluck('firstname', 'id');


        // get active session
        $active_session = Session::where('is_active', '=', 1)->first();


        $classes = Classes::where('session_id', '=', $active_session->id)->get();


        return view('forms.class.view_all', ['classes' => $classes,'sessions' => $sessions,'teachers' => $teachers]);
    }
    
    public function view_class($id)
    {   
        // get class information
        $class = Classes::where('id', '=', $id)->first();

        // get class teacher 
        $teacher = Teacher::where('id', '=', $class->teacher_id)->first();

        // get class teacher 
        $students = Student::where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();

        return view('forms.class.view_class', ['class' => $class, 'teacher' => $teacher, 'students' => $students]);
    }
    
    public function create()
    {	
    	$teachers = Teacher::get();
    	$sessions = Session::get();

        return view('forms.class.create', ['teachers' => $teachers, 'sessions' => $sessions]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required',
            'session_id' => 'required',
            'teacher_id' => 'required',
            'level' => 'required',
            
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request = $request->all();
        $this->validator($request)->validate();

        $data = array("name"=>$request['name'],"session_id"=>$request['session_id'],"teacher_id"=>$request['teacher_id'], "level"=>$request['level']);
        
        $class = $this->createclass($data);


        return redirect("/dashboard/class")->with('success', "You have successfully created a class.");

        
    }

    public function update(Request $request,$id)
    {
        $class = Classes::find($id);
      
        $class->name = $request['name'];
        $class->level = $request['level'];
        $class->session_id = $request['session_id'];
        $class->teacher_id = $request['teacher_id'];


        $class->save();
        

        return redirect("/dashboard/classes")->with('success', "Successfully Updated.");
    }
    
     protected function createclass(array $data)
    {
       $class = Classes::create($data);
  
       return $class;
    }



}
