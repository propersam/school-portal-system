<?php

namespace App\Http\Controllers;

use App\AssessmentResult;
use App\Classes;
use App\Level;
use App\Result;
use App\Fee;
use App\Fee_payment;
use Illuminate\Support\Facades\Validator;
use DB;
use PDF;
use App\Session;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class ParentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }
    
    public function register()
    {      
        $active_session = Session::where('is_active', '=', 1)->first();
        $classes = Classes::where('session_id', '=', $active_session->id)->pluck('name','id');
        $levels = Level::get();

        return view('forms.parent.register-child', ['classes' => $classes, 'levels' => $levels]);
    }


    public function view_results()
    {

        $children = Student::where('user_id', '=', Auth::user()->id)->get();

        return view('forms.parent.view_all_results', ['students' => $children]);

    }

    public function view_children()
    {
        $children = Student::where('user_id', '=', Auth::user()->id)->get();

        return view('forms.parent.view_children', ['students' => $children]);
    }

    public function pdfview(Request $request)
    {
        // var_dump($_GET);
        $students = DB::table("students")->get();
        view()->share('students',$students);
        if($request->has('fee_data')){
            view()->share('fee_data',$request['fee_data']);
        }

        if($request->has('download')){
            $pdf = PDF::loadView('pdfview');
            return $pdf->download('pdfview.pdf');
        }


        return view('pdfview');
    }


    public function resultpdfview(Request $request)
    {
        $student = Student::where('id', '=', $request['s'])->first();


        // get active session
        $active_session = Session::where('is_active', '=', 1)->first();
        $results = Result::where('student_id', '=', $request['s'])->where('session_id', '=', $active_session->id)->where('term', '=', $request['term'])->get();
        $assessments = AssessmentResult::where('student_id', '=', $request['s'])->where('session_id', '=', $active_session->id)->where('term', '=',  $request['term'])->get();

        foreach ($results as $key) {
            
            foreach ($assessments as $key2) {
                if($key->subject_id == $key2->subject_id){
                    $key->assessment = $key2; 
                }
            }
        }
        // var_dump($results);
        $data = array();
        $data['student'] = $student;
        $data['results'] = $results;
        $data['session'] = $active_session;

        // var_dump($data);
        // $students = DB::table("students")->get();
        // // view()->share('students',$students);
        if($request->has('term')){
            view()->share('data',$data);
        }

        $ff = 'result' . uniqid() . '.pdf';

        if($request->has('download')){
            $pdf = PDF::loadView('result_pdfview');
            return $pdf->download($ff);
        }


        return view('result_pdfview');
    }


    public function load_record()
    {
        $children = Student::where('user_id', '=', Auth::user()->id)->get();

        return view('forms.parent.view_record', ['students' => $children]);
    }


    public function view_child_results($id)
    {
        $student = Student::where('id', '=', $id)->first();


        // get active session
        $active_session = Session::where('is_active', '=', 1)->first();
        $results = Result::where('student_id', '=', $id)->where('session_id', '=', $active_session->id)->get();
        $assessments = AssessmentResult::where('student_id', '=', $id)->where('session_id', '=', $active_session->id)->get();

        foreach ($results as $key) {
            
            foreach ($assessments as $key2) {
                if($key->subject_id == $key2->subject_id){
                    $key->assessment = $key2; 
                }
            }
        }

        // var_dump($results);
        return view('forms.parent.view_child_results', ['results' => $results, 'student' => $student]);

    }

    public function student_fees($id)
    {
        $student = Student::where('id', '=', $id)->first();
       
        $level = Level::where('id', '=', $student->level)->first();
      
        $fees = Fee::where('level_id', '=', $student->level)->get();

        $total = 0;

        foreach ($fees as $key) {
            $total += $key->amount;
        }

        // get active session
        $active_session = Session::where('is_active', '=', 1)->first();

        $payment = Fee_payment::where('student_id', '=', $id)->where('session_id', '=', $active_session->id)->where('term_id', '=', $active_session->current_term)->first();


        return view('forms.parent.child_fees', ['payment' => $payment, 'student' => $student, 'fees' => $fees, 'total' => $total, 'level' => $level]);

    }

    public function view_child_record($id)
    {
        $student = Student::where('user_id', '=', Auth::user()->id)->first();

        // $sessions = Result::where('student_id', '=', $id)->groupBy('session_id')->get();
       
        $sessions = DB::table('exam_scores')->select('id','student_id', 'term', 'session_id')->where('student_id', $id)->get();


        $sessions = $sessions->toArray();
        $sessions = array_unique(array_column($sessions, 'session_id'));

        $i = 0;
        $ta  = array();

        foreach ($sessions as $key) {
            $session = Session::where('id', '=', $key)->first();
            $r = Result::where('student_id', '=', $id)->where('session_id', '=', $session->id)->get();
            $a = AssessmentResult::where('student_id', '=', $id)->where('session_id', '=', $session->id)->get();
            $ta[$i]['results'] = $r;
            $ta[$i]['session'] = $session;

            foreach ($ta[$i]['results'] as $key) {
                
                foreach ($a as $key2) {
                    if($key->subject_id == $key2->subject_id){
                        $key->assessment = $key2; 
                    }
                }
            }
            // var_dump($ta);
            $i++;
        }
        // get active session
        $results = Result::where('student_id', '=', $id)->get();
        $assessments = AssessmentResult::where('student_id', '=', $id)->get();

        foreach ($results as $key) {
            
            foreach ($assessments as $key2) {
                if($key->subject_id == $key2->subject_id){
                    $key->assessment = $key2; 
                }
            }
        }

        // var_dump($ta);
        return view('forms.parent.view_child_record', ['all_results' => $ta, 'student' => $student]);

    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => 'required|string|max:255',
            'pref_name' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'gender' => 'required|string|max:255',
            'dob' => 'required|string|max:255',
            'origin' => 'required|string|max:255',
            'residential_address' => 'required|string|max:255',
            'home_number' => 'required|string|max:255',            
        ]);
    }
    protected function validator2(array $data)
    {
        return Validator::make($data, [
            'class_id' => 'required|string|max:255',            
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
        $name = $request['first_name'] . ' ' . $request['lastname'];
        $firstname = $request['first_name'];
        $pref_name = $request['pref_name'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $active_session = Session::where('is_active', '=', 1)->first();

        $data2 = array("user_id"=>Auth::user()->id,"firstname"=>$request['first_name'],"prefferedname"=>$request['pref_name'],"lastname"=>$lastname,"phonenumber"=>$request['home_number'],"gender"=>$request['gender'],"address"=>$request['residential_address'],"gender"=>$request['gender'],"dob"=>$request['dob'], "origin"=>$request['origin'], "lga"=>$request['lga'],"state"=>$request['state'],"email"=>$request['email'], "level"=>$request['level'], "entry_session"=>$active_session->id, "entry_level"=>$request['level'] );

        $student = $this->createstudent($data2);

        return redirect("/dashboard/parent-new-child")->with('success', "You have successfully registered an account.");

        
    }

    
     protected function createstudent(array $data)
    {
       $student = Student::create($data);
       return $student;
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
