<?php

namespace App\Http\Controllers;

use App\AssessmentResult;
use App\Classes;
use App\Result;
use App\Session;
use App\Student;
use App\SubjectRegistration;
use App\Level;
use App\Result;
use App\AssessmentResult;
use App\Fee_payment;
use App\Teacher;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    //


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

        foreach ($results as $key) {
            $key->firstname = $key->student->firstname;
        }


        $students = Student::where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();


        // get ids of students with assessment results
        $ids = AssessmentResult::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->pluck('student_id');


        // get assessment results
        $assessments_results = AssessmentResult::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->orderBy('score', 'DESC')->get();

        foreach ($assessments_results as $key) {
            $key->firstname = $key->student->firstname;
        }

        // get students without assessment results
        $students2 = Student::whereNotIn('id', $ids)->where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();


        $resp = ['class' => $class, 'subject' => $subject, 'teacher' => $teacher, 'students' => $students, 'results' => $results, 'students2' => $students2, 'assessments_results' => $assessments_results];
        return response()->json($resp);

    }


    public function get_class_students(Request $request)
    {

        $request = $request->all();

        $active_session = Session::where('is_active', '=', 1)->first();

        // get class information
        $class = Classes::where('id', '=', $request['c'])->first();

        // get subject information
        $subject = SubjectRegistration::where('id', '=', $request['s'])->first();
        $subject->name = $subject->subject->name;

        // get class teacher 
        $teacher = Teacher::where('id', '=', $class->teacher_id)->first();

        // get ids of students with results
        $ids = Result::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->pluck('student_id');

        // get results
        $results = Result::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->orderBy('score', 'DESC')->get();

        // get students without exam results
        // $students = Student::whereNotIn('id', $ids)->where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();

        $students = Student::where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();

        // get ids of students with assessment results
        $ids = AssessmentResult::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->pluck('student_id');


        // get assessment results
        $assessments_results = AssessmentResult::where('class_id', '=', $class->id)->where('session_id', '=', $active_session->id)->where('term', '=', $active_session->current_term)->where('subject_id', '=', $request['s'])->orderBy('score', 'DESC')->get();

        // get students without assessment results
        $students2 = Student::whereNotIn('id', $ids)->where('class_id', '=', $class->id)->where('admission_status', 'admitted')->get();

        // var_dump($students2);
        $resp = ['class' => $class, 'subject' => $subject, 'teacher' => $teacher, 'students' => $students, 'results' => $results, 'students2' => $students2, 'assessments_results' => $assessments_results];


        return response()->json($resp);


    }

    public function submit_results(Request $request)
    {
        $request = $request->all();
        $postdata = file_get_contents("php://input");

        $_POST = json_decode($postdata, true);

        // var_dump($request);
        $submitted_results = $_POST['results'];

        $active_session = Session::where('is_active', '=', 1)->first();

        $result = null;
        foreach ($submitted_results as $key) {
            if ($key['student_id']) {
                // check if this particular exam record has been submitted before
                $res = Result::where('student_id', '=', $key['student_id'])
                    ->where('session_id', '=', $active_session['id'])
                    ->where('class_id', '=', $request['c'])
                    ->where('subject_id', '=', $request['s'])
                    ->where('term', '=', $active_session['current_term'])->first();


                $data = [
                    "student_id" => $key['student_id'],
                    "session_id" => $active_session['id'],
                    "class_id" => $request['c'],
                    "subject_id" => $request['s'],
                    "score" => $key['score'],
                    "term" => $active_session['current_term']
                ];

                // create record if it does not already exist
                if (!$res) {
                    $result = $this->createresult($data);
                } else {
                    $result = $this->updateResult($data, $res->id);
                }

            }
        }

        if ($result) {
            $response = array('status' => 'successful');

            echo json_encode($response);
        }


    }
    public function payment_response(Request $request)
    {
        $request = $request->all();

        $data = array("amount"=>$request['amount'],"session_id"=>$request['session_id'],"term_id"=>$request['term_id'],"student_id"=>$request['student_id'],"user_id"=>$request['user_id']);

        $p = Fee_payment::create($data);
    }

    public function submit_assessment(Request $request)
    {

        $request = $request->all();

        $postdata = file_get_contents("php://input");

        $_POST = json_decode($postdata, true);

        // var_dump($request);
        $submitted_results = $_POST['results'];

        $active_session = Session::where('is_active', '=', 1)->first();

        $result = null;
        foreach ($submitted_results as $key) {
            if ($key['student_id']) {
                // check if this particular exam record has been submitted before
                $res = AssessmentResult::where('student_id', '=', $key['student_id'])->where('session_id', '=', $active_session['id'])->where('class_id', '=', $request['c'])->where('subject_id', '=', $request['s'])->where('term', '=', $active_session['current_term'])->first();


                $data = array("student_id" => $key['student_id'], "session_id" => $active_session['id'], "class_id" => $request['c'], "subject_id" => $request['s'], "score" => $key['score'], "term" => $active_session['current_term']);

                // create record if it does not already exist
                if (!$res) {
                    $result = $this->createassessment($data);
                } else {
                    $result = $this->updateAssessment($data, $res->id);

                }

            }
        }

        if ($result) {
            $response = array('status' => 'successful');

            echo json_encode($response);
        }
    }

    protected function createresult(array $data)
    {
        $result = Result::create($data);

        return $result;
    }

    protected function createassessment(array $data)
    {
        $result = AssessmentResult::create($data);

        return $result;
    }

    public function updateResult($data, $id)
    {
        $result = Result::find($id);

        $result->score = $data['score'];


        $result->save();


        return $result;
    }

    public function updateAssessment($data, $id)
    {
        $result = AssessmentResult::find($id);

        $result->score = $data['score'];


        $result->save();


        return $result;
    }

}
