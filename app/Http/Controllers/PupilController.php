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
            'siblings_attended' => 'required|string|max:255',
            'child_position' => 'required|string|max:255',
            'residential_address' => 'required|string|max:255',
            'home_number' => 'required|string|max:255',
            // 'phonenumber' => 'required|string|max:255',
             
            'email' => 'required|string|email|max:255|unique:users',
            
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
        $this->validator($request)->validate();
        //var_dump($request); die();
        $username = str_random(4);
        $password = str_random(8);
        $name = $request['first_name'] . ' ' . $request['lastname'];
        $firstname = $request['first_name'];
        $pref_name = $request['pref_name'];
        $lastname = $request['lastname'];
        $email = $request['email'];

        $data = array("username"=>$username,"password"=>$password,"firstname"=>$firstname,"lastname"=>$lastname,"name"=>$name, "email"=>$email, "role" => 'parent' );
        
        $user = $this->createuser($data);


        $data2 = array("user_id"=>$user->id,"first_name"=>$request['first_name'],"pref_name"=>$request['pref_name'],"lastname"=>$lastname,"home_number"=>$request['home_number'],"gender"=>$request['gender'],"residential_address"=>$request['residential_address'],"gender"=>$request['gender'],"dob"=>$request['dob'], "origin"=>$request['origin'], "siblings_attended"=>$request['siblings_attended'], "child_position"=>$request['child_position'], "siblings_attended_years"=>$request['siblings_attended_years'], "sibling1_name"=>$request['child1_name'], "sibling1_age"=>$request['child1_age'], "sibling1_school"=>$request['child1_school'], "sibling2_name"=>$request['child2_name'], "sibling2_age"=>$request['child2_age'], "sibling2_school"=>$request['child2_school'], "sibling3_name"=>$request['child3_name'], "sibling3_age"=>$request['child3_age'], "sibling3_school"=>$request['child3_school'], "email"=>$request['email'], "current_school"=>$request['current_school'], "position_in_family"=>$request['child_position'], "class_id"=>$request['class_id']);

        $student = $this->createstudent($data2);

        $data3 = array("user_id"=>$user->id,"student_id"=>$student->id,"firstname"=>$request['father_first_name'],"lastname"=>$request['father_surname'],"maritalstatus"=>$request['father_marital_status'],"occupation"=>$request['father_occupation'],"companyname"=>$request['father_company_name'],"workaddress"=>$request['father_work_address'],"phone"=>$request['father_work_phone'],"email"=>$request['father_email'],"attended_school"=>$request['father_attend'],"phonenumber"=>$request['father_work_phone'],"parent_type"=>'father');



        $data4 = array("user_id"=>$user->id,"student_id"=>$student->id,"firstname"=>$request['mother_first_name'],"lastname"=>$request['mother_surname'],"maritalstatus"=>$request['mother_marital_status'],"occupation"=>$request['mother_occupation'],"companyname"=>$request['mother_company_name'],"workaddress"=>$request['mother_work_address'],"phone"=>$request['mother_work_phone'],"email"=>$request['mother_email'],"attended_school"=>$request['mother_attend'],"phonenumber"=>$request['mother_work_phone'],"parent_type"=>'mother');


        $data5 = array("user_id"=>$user->id,"student_id"=>$student->id,"name"=>$request['emergency_contact_name_1'],"home_number"=>$request['emergency_contact1_number_home'],"work_number"=>$request['emergency_contact1_number_work'],"cell_number"=>$request['emergency_contact1_number_cell']);
       

        $data6 = array("user_id"=>$user->id,"student_id"=>$student->id,"name"=>$request['emergency_contact_name_2'],"home_number"=>$request['emergency_contact2_number_home'],"work_number"=>$request['emergency_contact2_number_work'],"cell_number"=>$request['emergency_contact2_number_cell']);


        $father = $this->createfather($data3);
        $mother = $this->createmother($data4);
        $contact = $this->createcontact($data5);
        $contact2 = $this->createcontact($data6);

        return redirect("/dashboard/register-student")->with('success', "You have successfully registered a student.");

        
    }

    
     protected function createuser(array $data)
    {
       $user = User::create([
            'name' => $data['name'],
            'username' => $data['username'],
            'email' => $data['email'],
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
       $student = Student::create([
            'firstname' => $data['first_name'],
            'preferredname' => $data['pref_name'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'home_number' => $data['home_number'],
            'gender' => $data['gender'],
            'address' => $data['residential_address'],
            'user_id' => $data['user_id'],
            'dob' => $data['dob'],
            'origin' => $data['origin'],
            'siblings_attended' => $data['siblings_attended'],
            'position_in_family' => $data['child_position'],
            'siblings_attended_years' => $data['siblings_attended_years'],
            'sibling1_name' => $data['sibling1_name'],
            'sibling1_age' => $data['sibling1_age'],
            'sibling1_school' => $data['sibling1_school'],
            'sibling2_name' => $data['sibling2_name'],
            'sibling2_age' => $data['sibling2_age'],
            'sibling2_school' => $data['sibling2_school'],
            'sibling3_name' => $data['sibling3_name'],
            'sibling3_age' => $data['sibling3_age'],
            'sibling3_school' => $data['sibling3_school'],
            'current_school' => $data['current_school'],
            'position_in_family' => $data['position_in_family'],
            'class_id' => $data['class_id'],

        ]);
       return $student;
    }
     protected function createfather(array $data)
    {

       $parent = Parents::create([
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'email' => $data['email'],
            'student_id' => $data['student_id'],
            'maritalstatus' => $data['maritalstatus'],
            'occupation' => $data['occupation'],
            'companyname' => $data['companyname'],
            'user_id' => $data['user_id'],
            'workaddress' => $data['workaddress'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'attended_school' => $data['attended_school'],
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
            'maritalstatus' => $data['maritalstatus'],
            'occupation' => $data['occupation'],
            'companyname' => $data['companyname'],
            'user_id' => $data['user_id'],
            'workaddress' => $data['workaddress'],
            'phone' => $data['phone'],
            'email' => $data['email'],
            'attended_school' => $data['attended_school'],
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
