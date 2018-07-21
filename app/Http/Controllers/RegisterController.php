<?php

namespace App\Http\Controllers;

use App\Emergency_contact;
use App\Events\NewStudentRegistered;
use App\Level;
use App\Parents;
use App\Student;
use App\Session;
use App\User;
use App\VerifyUser;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    
    public function index()
    {
        $levels = Level::get();

        return view('register', ['levels' => $levels]);
    }
    
    public function create()
    {
        $levels = Level::get();

        return view('register', ['levels' => $levels]);
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
            'state' => 'required|string|max:255',
            'lga' => 'required|string|max:255',
            'home_number' => 'required|string|max:255',
            'level' => 'required|string|max:255',
            // 'phonenumber' => 'required|string|max:255',
             
            'email' => 'required|string|email|max:255|unique:users',
            
        ]);
    }
    public function password_change_rules(array $data)
    {
      $messages = [
        'current-password.required' => 'Please enter current password',
        'password.required' => 'Please enter password',
      ];

      $validator = Validator::make($data, [
        'password' => 'required|same:password',
        'password2' => 'required|same:password',     
      ], $messages);

      return $validator;
    } 

    public function changePassword(Request $request)
    {
      if(Auth::Check())
      {
        $request_data = $request->All();
        $validator = $this->password_change_rules($request_data);
        if($validator->fails())
        {
          return response()->json(array('error' => $validator->getMessageBag()->toArray()), 400);
        }
        else
        {  
          $current_password = Auth::User()->password;           
            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->password = Hash::make($request_data['password']);
            $obj_user->default_password_changed = 'yes';
            $obj_user->save(); 
            // Auth::logout();
            if($obj_user->role == 'Teacher'){
                return redirect("/change-photo")->with('success', "You have successfully set your password, now upload your passport photo.");
            }else{
                return redirect("/dashboard");
            }


            // return redirect()->to('/eportal');
          
        }        
      }
      else
      {
        return redirect()->to('/eportal');
      }    
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
        //var_dump($request); die();
        $username = str_random(4);
        $password = str_random(8);
        $name = $request['first_name'] . ' ' . $request['lastname'];
        $firstname = $request['first_name'];
        $pref_name = $request['pref_name'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $active_session = Session::where('is_active', '=', 1)->first();

        $data = array("username"=>$username,"password"=>$password,"firstname"=>$firstname,"lastname"=>$lastname,"name"=>$name, "email"=>$email, "role" => 'parent' );
        
        $user = $this->createuser($data);


        // $data2 = array("user_id"=>$user->id,"first_name"=>$request['first_name'],"pref_name"=>$request['pref_name'],"lastname"=>$lastname,"phonenumber"=>$request['home_number'],"gender"=>$request['gender'],"residential_address"=>$request['residential_address'],"gender"=>$request['gender'],"dob"=>$request['dob'], "origin"=>$request['origin'], "siblings_attended"=>$request['siblings_attended'], "child_position"=>$request['child_position'], "siblings_attended_years"=>$request['siblings_attended_years'], "sibling1_name"=>$request['child1_name'], "sibling1_age"=>$request['child1_age'], "sibling1_school"=>$request['child1_school'], "sibling2_name"=>$request['child2_name'], "sibling2_age"=>$request['child2_age'], "sibling2_school"=>$request['child2_school'], "sibling3_name"=>$request['child3_name'], "sibling3_age"=>$request['child3_age'], "sibling3_school"=>$request['child3_school'], "email"=>$request['email'], "current_school"=>$request['current_school'], "position_in_family"=>$request['child_position'], "level"=>$request['level']);
        $data2 = array("user_id"=>$user->id,"firstname"=>$request['first_name'],"preffered_name"=>$request['pref_name'],"lastname"=>$lastname,"phonenumber"=>$request['home_number'],"gender"=>$request['gender'],"address"=>$request['residential_address'],"gender"=>$request['gender'],"dob"=>$request['dob'], "origin"=>$request['origin'], "lga"=>$request['lga'],"state"=>$request['state'],"email"=>$request['email'], "level"=>$request['level'], "entry_session"=>$active_session->id, "entry_level"=>$request['level']);

        $student = $this->createstudent($data2);

              
         event(new NewStudentRegistered($student));


        $data3 = array("user_id"=>$user->id,"student_id"=>$student->id,"firstname"=>$request['father_first_name'],"lastname"=>$request['father_surname'],"companyname"=>$request['father_company_name'],"workaddress"=>$request['father_work_address'],"phone"=>$request['father_work_phone'],"email"=>$request['father_email'],"phonenumber"=>$request['father_work_phone'],"parent_type"=>'father');



        $data4 = array("user_id"=>$user->id,"student_id"=>$student->id,"firstname"=>$request['mother_first_name'],"lastname"=>$request['mother_surname'],"companyname"=>$request['mother_company_name'],"workaddress"=>$request['mother_work_address'],"phone"=>$request['mother_work_phone'],"email"=>$request['mother_email'],"phonenumber"=>$request['mother_work_phone'],"parent_type"=>'mother');


        // $data5 = array("user_id"=>$user->id,"student_id"=>$student->id,"name"=>$request['emergency_contact_name_1'],"home_number"=>$request['emergency_contact1_number_home'],"work_number"=>$request['emergency_contact1_number_work'],"cell_number"=>$request['emergency_contact1_number_cell']);
       

        // $data6 = array("user_id"=>$user->id,"student_id"=>$student->id,"name"=>$request['emergency_contact_name_2'],"home_number"=>$request['emergency_contact2_number_home'],"work_number"=>$request['emergency_contact2_number_work'],"cell_number"=>$request['emergency_contact2_number_cell']);


        $father = $this->createfather($data3);
        $mother = $this->createmother($data4);
        // $contact = $this->createcontact($data5);
        // $contact2 = $this->createcontact($data6);

        return redirect("/eportal")->with('success', "You have successfully registered an account.");

        
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


    public function change_password(){
        return view('change_default_password');
    }


}
