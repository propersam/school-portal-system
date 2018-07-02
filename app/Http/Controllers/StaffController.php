<?php

namespace App\Http\Controllers;

use App\Assistant;
use App\Bursar;
use App\Events\NewAssistantRegistered;
use App\Events\NewBursarRegistered;
use App\Events\NewHeadTeacherRegistered;
use App\Events\NewTeacherRegistered;
use App\HeadTeacher;
use App\Teacher;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StaffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response

     */
    
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['verifyUser']]);

       
    }

    public function index()
    {
        $teachers = Teacher::get();
        return view('staff.list', ['teachers' => $teachers]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.staff.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'firstname' => 'required|string|max:255',
            'lastname' => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',
             
            'email' => 'required|string|email|max:255|unique:users',
            
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
        //var_dump($request); die();
        $username = str_random(4);
        $password = str_random(8);
        $name = $request['firstname'] . ' ' . $request['lastname'];
        $email = $request['email'];
        $data = array("username"=>$username,"password"=>$password,"name"=>$name, "email"=>$email, "role" => $request['role'] );
        
        $user = $this->createuser($data);

       
        switch ($request['role']) {
            case "Bursar":
                $bursar = Bursar::create([
                                'firstname' => $request['firstname'],
                                'lastname' => $request['lastname'],
                                'user_id' => $user->id,
                                'phonenumber' => $request['phonenumber'],
                                'employmentdate' => $request['employmentdate'],
                                'gender' => $request['gender'],
                               ]);
               
                  event(new NewBursarRegistered($bursar));
                  return redirect("/bursar")->with('success', "You have successfully registered the school bursar.");
                   break;
            case "HeadTeacher":
                $headteacher = HeadTeacher::create([
                                'firstname' => $request['firstname'],
                                'lastname' =>$request['lastname'],
                                'user_id' => $user->id,
                                'phonenumber' => $request['phonenumber'],
                                'employmentdate' => $request['employmentdate'],
                                'gender' => $request['gender'],
                               ]);
                 event(new NewHeadTeacherRegistered($headteacher));
                 return redirect("/staff")->with('success', "You have successfully registered the school HeadTeacher.");
                break;
            case "Teacher":
                $teacher = Teacher::create([
                            'firstname' => $request['firstname'],
                            'lastname' => $request['lastname'],
                            'user_id' => $user->id,
                            'phonenumber' => $request['phonenumber'],
                            'employmentdate' => $request['employmentdate'],
                            'gender' => $request['gender'],
                           ]);
                event(new NewTeacherRegistered( $teacher));
                return redirect("/staff")->with('success', "You have successfully registered a school Teacher.");
                break;
            default:
                $assistant = Assistant::create([
                            'firstname' => $request['firstname'],
                            'lastname' => $request['lastname'],
                            'user_id' => $user->id,
                            'phonenumber' => $request['phonenumber'],
                            'employmentdate' => $request['employmentdate'],
                            'gender' => $request['gender'],
                           ]);
                    event(new NewAssistantRegistered( $assistant));
        }

      

        
        
            return redirect("/staff")->with('success', "You have successfully registered a school assistant.");

        


        
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
}
