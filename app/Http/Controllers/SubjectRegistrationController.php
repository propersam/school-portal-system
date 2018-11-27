<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Session;
use App\Subject;
use App\SubjectRegistration;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SubjectRegistrationController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {   

        // get active session
        $active_session = Session::where('is_active', '=', 1)->first();
        $subjects = Subject::get();


        $classes = Classes::where('session_id', '=', $active_session->id)->get();


        return view('forms.subject_registration.view_all', [ 'classes' => $classes, 'subjects' => $subjects]);
    }

    public function view_class($id)
    {   

        // get active session
        $all_subjects = Subject::get(); // This selects all registered subjects in the database

        $class = Classes::where('id', '=', $id)->first();

        $subjects = SubjectRegistration::where('level', '=', $class->level)->get(); //this is for subjects for a given class.

        return view('forms.subject_registration.view_class', [ 'class' => $class, 'subjects' => $subjects, 'all_subjects' => $all_subjects]);
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'subject_id' => 'required',
        ]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $id)
    {
        $request = $request->all();
        $this->validator($request)->validate();


        $data = array("session_id"=>$request['session_id'],"subject_id"=>$request['subject_id'], "level"=>$request['level']);

        // var_dump($data);
        
        $subject = $this->registersubject($data);
        
        $url = "/dashboard/view-class-subjects/" . $id;


        return redirect($url)->with('success', "You have successfully registered a subject.");

        
    }

    public function remove_class(Request $request, $id)
    {
        $request = $request->all();

        $subject = SubjectRegistration::find($id);

        $subject->delete();

        $url = "/dashboard/view-class-subjects/" . $request['class_id'];

        return redirect($url)->with('success', "You have successfully registered a subject.");

        
    }

    
     protected function registersubject(array $data)
    {
       $reg = SubjectRegistration::create($data);

       return $reg;
    }
    
}
