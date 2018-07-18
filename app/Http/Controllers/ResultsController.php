<?php

namespace App\Http\Controllers;

use App\AssessmentResult;
use App\Classes;
use App\Result;
use App\Session;
use App\Student;
use App\SubjectRegistration;
use App\Teacher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ResultsController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    
    public function index($id)
    {	
        $class = Classes::where('id', '=', $id)->first();

        $subjects = SubjectRegistration::where('level', '=', $class->level)->get();


        return view('forms.result.view_results', ['subjects' => $subjects, 'class' => $class]);
    }


    public function view_subject_results(Request $request)
    {

        $request = $request->all();

        $active_session = Session::where('is_active', '=', 1)->first();

        // get class information
        $class = Classes::where('id', '=', $request['c'])->first();

        // get subject information
        $subject = SubjectRegistration::where('id', '=', $request['s'])->first();

        // get class teacher 
        $teacher = Teacher::where('id', '=', $class->teacher_id)->first();

        // get ids of students with results
        $ids = Result::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->pluck('student_id');

        // get results
        $results = Result::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->orderBy('score', 'DESC')->get();

        // get students without exam results
        $students = Student::whereNotIn('id', $ids)->where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();


        // get ids of students with assessment results
        $ids = AssessmentResult::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->pluck('student_id');


        // get assessment results
        $assessments_results = AssessmentResult::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->orderBy('score', 'DESC')->get();

        // get students without assessment results
        $students2 = Student::whereNotIn('id', $ids)->where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();
       
        // var_dump($students2);


        return view('forms.result.view_results', ['class' => $class, 'subject' => $subject, 'teacher' => $teacher, 'students' => $students, 'results' => $results, 'students2' => $students2, 'assessments_results' => $assessments_results]);
        
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'student_id' => 'required',
            'score' => 'required',            
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

        $active_session = Session::where('is_active', '=', 1)->first();


        $this->validator($request)->validate();

        $data = array("student_id"=>$request['student_id'],"session_id"=>$active_session['id'],"class_id"=>$request['class_id'], "subject_id"=>$request['subject_id'], "score"=>$request['score'], "term"=>$active_session['current_term']);
        	

        $result = $this->createresult($data);

		$url = '/dashboard/view-subject-results?s=' . $request['subject_id'] . '&c=' . $request['class_id'];
        return redirect($url)->with('success', "You have successfully added a result.");

        
    }
    
     protected function createresult(array $data)
    {
       $result = Result::create($data);
  
       return $result;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_assessment(Request $request)
    {

        $request = $request->all();

        $active_session = Session::where('is_active', '=', 1)->first();


        $this->validator($request)->validate();

        $data = array("student_id"=>$request['student_id'],"session_id"=>$active_session['id'],"class_id"=>$request['class_id'], "subject_id"=>$request['subject_id'], "score"=>$request['score'], "term"=>$active_session['current_term']);
        	

        $result = $this->createassessmentresult($data);

		$url = '/dashboard/view-subject-results?s=' . $request['subject_id'] . '&c=' . $request['class_id'];
        return redirect($url)->with('success', "You have successfully added an assessment result.");

        
    }
    
     protected function createassessmentresult(array $data)
    {
       $result = AssessmentResult::create($data);
  
       return $result;
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
}
