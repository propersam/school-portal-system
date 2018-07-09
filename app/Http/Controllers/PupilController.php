<?php

namespace App\Http\Controllers;
use App\Http\Middleware\CheckIfActiveSession;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Classes;
use App\Student;
use App\VerifyUser;
use App\Parents;
use App\Emergency_contact;
use App\Session;
use App\Level;
use App\Events\NewStudentRegistered;
use App\Utils\SmsSender;

class PupilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
        // $this->middleware('CheckIfActiveSession');
    }
    
    public function index()
    {      
        $active_session = Session::where('is_active', '=', 1)->first();
        $classes = Classes::where('session_id', '=', $active_session->id)->pluck('name','id');
        $levels = Level::get();

        return view('forms.student.create', ['classes' => $classes, 'levels' => $levels]);
    }


    public function applications()
    {
        $active_session = Session::where('is_active', '=', 1)->first();

        $classes = Classes::where('session_id', '=', $active_session->id)->pluck('name', 'id');

        $pending_applications = Student::where('application_status', '=', 'pending')->get();
        $accepted_applications = Student::where('application_status', '=', 'accepted')->where('admission_status', 'pending')->get();
        $rejected_applications = Student::where('application_status', '=', 'rejected')->get();

        return view('forms.student.applications', ['pending_applications' => $pending_applications, 'accepted_applications' => $accepted_applications, 'rejected_applications' => $rejected_applications, 'classes' => $classes]);
    }


    public function all_pupils()
    {
        $active_session = Session::where('is_active', '=', 1)->first();

        $classes = Classes::where('session_id', '=', $active_session->id)->pluck('name', 'id');

        $students = Student::where('application_status', '=', 'accepted')->where('admission_status', 'admitted')->get();

        return view('forms.student.view_all', ['students' => $students,  'classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'level' => 'required|string|max:255',
            // 'phonenumber' => 'required|string|max:255',
             
            //'email' => 'required|string|email|max:255|unique:users',
            
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
        //var_dump($request); die();
        $request = $request->all();

        // $this->validator($request)->validate();
        // var_dump($request); die();
        $username = str_random(4);

        $password = str_random(8);
        $name = $request['first_name'] . ' ' . $request['lastname'];
        $firstname = $request['first_name'];
        $pref_name = $request['pref_name'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $phone = $request['phone'];

        $data = array("username"=>$username,"password"=>$password,"firstname"=>$firstname,"lastname"=>$lastname,"name"=>$name, "email"=>$email, 'phone'=>$phone, "role" => 'parent' );
        
        $user = $this->createuser($data);



        $data2 = array("user_id"=>$user->id,"firstname"=>$request['first_name'],"preferredname"=>$request['pref_name'],"lastname"=>$lastname,"phonenumber"=>$request['home_number'],"gender"=>$request['gender'],"address"=>$request['residential_address'],"gender"=>$request['gender'],"dob"=>$request['dob'], "origin"=>$request['origin'], "lga"=>$request['lga'],"state"=>$request['state'],"email"=>$request['email'], "level"=>$request['level'], "class_id"=>$request['class_id']);


        // var_dump($data2);   
        $student = $this->createstudent($data2);

        $data3 = array("user_id"=>$user->id,"student_id"=>$student->id,"firstname"=>$request['father_first_name'],"lastname"=>$request['father_surname'],"companyname"=>$request['father_company_name'],"workaddress"=>$request['father_work_address'],"phone"=>$request['father_work_phone'],"email"=>$request['father_email'],"phonenumber"=>$request['father_work_phone'],"parent_type"=>'father');



        $data4 = array("user_id"=>$user->id,"student_id"=>$student->id,"firstname"=>$request['mother_first_name'],"lastname"=>$request['mother_surname'],"companyname"=>$request['mother_company_name'],"workaddress"=>$request['mother_work_address'],"phone"=>$request['mother_work_phone'],"email"=>$request['mother_email'],"phonenumber"=>$request['mother_work_phone'],"parent_type"=>'mother');


        // $student = Student::create([
        //                 'firstname' => $request['first_name'],
        //                 'lastname' => $request['lastname'],
        //                 // 'user_id' => $user->id,
        //                 'user_id' => 1,
        //                 'phonenumber' => $request['home_number'],
        //                 'gender' => $request['gender'],
        //                ]);
              
         event(new NewStudentRegistered($student));

        $father = $this->createfather($data3);
        $mother = $this->createmother($data4);
        // $contact = $this->createcontact($data5);
        // $contact2 = $this->createcontact($data6);

        return redirect("/dashboard/register-student")->with('success', "You have successfully registered a student.");

        
    }

    
     protected function createuser(array $data)
    {
       $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
            'phone'=>$data['phone'],
            'password' => bcrypt($data['password']),
            'role' => $data['role'],
            'defaultpassword' => $data['password'],

        ]);

      

       $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token' => str_random(40)
        ]);

       return $user;
    }
    
    
     protected function createstudent(array $data)
    {
        // var_dump($data);
       $student = Student::create($data);
       return $student;
    }

     protected function createfather(array $data)
    {

       $parent = Parents::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'student_id' => $data['student_id'],
            'companyname' => $data['companyname'],
            'user_id' => $data['user_id'],
            'workaddress' => $data['workaddress'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'phonenumber' => $data['phonenumber'],
            'parent_type' => $data['parent_type'],

        ]);

    
       return $parent;
    }

     protected function createmother(array $data)
    {

       $parent = Parents::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'student_id' => $data['student_id'],
            'companyname' => $data['companyname'],
            'user_id' => $data['user_id'],
            'workaddress' => $data['workaddress'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'phonenumber' => $data['phonenumber'],
            'parent_type' => $data['parent_type'],

        ]);

    
       return $parent;
    }

     protected function createcontact(array $data)
    {

       $contact = Emergency_contact::create([
            'name' => $data['name'],
            'home_number' => $data['home_number'],
            'work_number' => $data['work_number'],
            'student_id' => $data['student_id'],
            'user_id' => $data['user_id'],
            'cell_number' => $data['cell_number']
        ]);

    
       return $contact;
    }

    public function verifyUser($token)
    {
        //var_dump($token); die();
        $status = "";
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            }else{
                $status = "Your e-mail is already verified. You can now login.";
            }
        }else{

            return redirect('/eportal')->with('warning', "Sorry your email cannot be identified.");
        }


 
        return redirect('/eportal')->with('status', $status);
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
    public function accept(Request $request, $id)
    {
        $student = Student::find($id);
      
        $student->application_status = 'accepted';

        $student->save();
        return redirect("/dashboard/applications")->with('success', "Successfully Updated.");
    }

    public function reject_application(Request $request, $id)
    {
        $student = Student::find($id);
      
        $student->application_status = 'rejected';

        $student->save();
        return redirect("/dashboard/applications")->with('success', "Successfully Updated.");
    }

    public function admit(Request $request, $id)
    {
        $request = $request->all();
        $this->validator2($request)->validate();



        $student = Student::find($id);

        $student->class_id = $request['class_id'];
        $student->admission_status = 'admitted';

        $student->save();
        return redirect("/dashboard/applications")->with('success', "Student Admitted to Class.");
    }

    public function reject_admission(Request $request, $id)
    {
        $student = Student::find($id);
      
        $student->admission_status = 'rejected';

        $student->save();
        return redirect("/dashboard/applications")->with('success', "Successfully Updated.");
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
