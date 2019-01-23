<?php

namespace App\Http\Controllers;

use App\Assistant;
use App\Bursar;
use App\Classes;
use App\Events\NewAssistantRegistered;
use App\Events\NewBursarRegistered;
use App\Events\NewHeadTeacherRegistered;
use App\Events\NewTeacherRegistered;
use App\HeadTeacher;
use App\Session;
use App\Teacher;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;


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
        $active_session = Session::where('is_active', '=', 1)->first();
        $classes = Classes::where('session_id', '=', $active_session->id)->pluck('classname', 'id');

        $teachers = Teacher::get();
        return view('staff.list', ['classes' => $classes, 'teachers' => $teachers]);
    }

    public function all_assistants()
    {
        $assistants = Assistant::get();
        return view('staff.assistant.list', ['assistants' => $assistants]);
    }


    public function all_staffs()
    {
        $staffs = array();

        $teachers = Teacher::get();
        $bursars = Bursar::get();
        $assistants = Assistant::get();
        $headteachers = HeadTeacher::get();
        // $teachers = Teacher::get();

        foreach ($bursars as $key) {
            $key['role'] = 'Bursar';
            array_push($staffs, $key);
        }

        foreach ($teachers as $key) {
            $key['role'] = 'Teacher';
            array_push($staffs, $key);
        }

        foreach ($assistants as $key) {
            $key['role'] = 'Assistant';
            array_push($staffs, $key);
        }

        foreach ($headteachers as $key) {
            $key['role'] = 'Head Teacher';
            array_push($staffs, $key);
        }

        // var_dump($staffs);
        return view('staff.all', ['staffs' => $staffs]);
    }


    public function delete_staff($id)
    {

        $user = User::find($id);


        switch ($user->role) {
            case "Bursar":
                $bursar = Bursar::where('user_id', '=', $id)->first();
                $bursar->delete();

                break;
            case "HeadTeacher":
                $headteacher = HeadTeacher::where('user_id', '=', $id)->first();
                $headteacher->delete();

                break;
            case "Teacher":
                $teacher = Teacher::where('user_id', '=', $id)->first();
                $teacher->delete();

                break;
            default:
                $assistant = Assistant::where('user_id', '=', $id)->first();
                $assistant->delete();
        }
        // var_dump($user->toArray());

        $user->delete();

        return redirect("/dashboard/all-staffs")->with('success', "Successfully Deleted.");
    }


    public function delete_teacher($id)
    {
        $teacher = Teacher::where('user_id', '=', $id)->first();
        $teacher->delete();

        $user = User::find($id);

        $user->delete();

        return redirect("/dashboard/teachers")->with('success', "Successfully Deleted.");
    }


    public function delete_headteacher($id)
    {
        $teacher = HeadTeacher::where('user_id', '=', $id)->first();
        $teacher->delete();

        $user = User::find($id);

        $user->delete();

        return redirect("/dashboard/headteachers")->with('success', "Successfully Deleted.");
    }


    public function delete_bursar($id)
    {
        $bursar = Bursar::where('user_id', '=', $id)->first();
        $bursar->delete();

        $user = User::find($id);

        $user->delete();

        return redirect("/dashboard/bursars")->with('success', "Successfully Deleted.");
    }


    public function delete_assistant($id)
    {
        $bursar = Assistant::where('user_id', '=', $id)->first();
        $bursar->delete();

        $user = User::find($id);

        $user->delete();

        return redirect("/dashboard/assistants")->with('success', "Successfully Deleted.");
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
            'firstname'   => 'required|string|max:255',
            'lastname'    => 'required|string|max:255',
            'phonenumber' => 'required|string|max:255',

            'email' => 'nullable|string|email|max:255',

        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request = $request->all();
        $this->validator($request)->validate();
        //var_dump($request); die();
        $account = "staff";
        $status=false;
        DB::transaction(function()use($request,&$status, &$account){

            $username = str_random(4);
            $password = str_random(8);
            $name = $request['firstname'].' '.$request['lastname'];
            $email = $request['email'];
            $data = array("username" => $username, "password" => $password, "name" => $name, "email" => $email, "role" => $request['role']);

            $user = $this->createuser($data);

            switch ($request['role']) {
                case "Bursar":
                    $bursar = Bursar::create([
                        'firstname'      => $request['firstname'],
                        'lastname'       => $request['lastname'],
                        'user_id'        => $user->id,
                        'phonenumber'    => $request['phonenumber'],
                        'employmentdate' => $request['employmentdate'],
                        'gender'         => $request['gender'],
                    ]);

                    event(new NewBursarRegistered($bursar));
                    $account = "Bursar";
                    break;
                case "HeadTeacher":
                    $headteacher = HeadTeacher::create([
                        'firstname'      => $request['firstname'],
                        'lastname'       => $request['lastname'],
                        'user_id'        => $user->id,
                        'phonenumber'    => $request['phonenumber'],
                        'employmentdate' => $request['employmentdate'],
                        'gender'         => $request['gender'],
                    ]);
                    event(new NewHeadTeacherRegistered($headteacher));
                    $account = "Head Teacher ";
                    break;
                case "Teacher":
                    $teacher = Teacher::create([
                        'firstname'      => $request['firstname'],
                        'lastname'       => $request['lastname'],
                        'user_id'        => $user->id,
                        'phonenumber'    => $request['phonenumber'],
                        'employmentdate' => $request['employmentdate'],
                        'gender'         => $request['gender'],
                    ]);
                    event(new NewTeacherRegistered($teacher));
                    $account = "Teacher";
                    break;
                default:
                    $assistant = Assistant::create([
                        'firstname'      => $request['firstname'],
                        'lastname'       => $request['lastname'],
                        'user_id'        => $user->id,
                        'phonenumber'    => $request['phonenumber'],
                        'employmentdate' => $request['employmentdate'],
                        'gender'         => $request['gender'],
                    ]);
                    event(new NewAssistantRegistered($assistant));
                    $account = "Teacher Assistant";
                
            }

                $status = true;

        });
            
        if (!$status)
            return redirect()->back()->with('failure', "We could not verify your entered email");

        
        return redirect()->back()->with('success', "You have successfully registered a School ".$account);          
    }


    protected function createuser(array $data)
    {
        $user = User::create([
            'name'            => $data['name'],
            'username'        => $data['username'],
            'email'           => $data['email'],
            'password'        => bcrypt($data['password']),
            'role'            => $data['role'],
            'defaultpassword' => $data['password'],

        ]);


        $verifyUser = VerifyUser::create([
            'user_id' => $user->id,
            'token'   => str_random(40)
        ]);

        return $user;
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update_staff(Request $request, $id)
    {
        $request = $request->all();
        $status = false;

        DB::transaction(function()use($request,&$status){
            switch ($request['staff_role']) {
                case "Bursar":
                    $bursar = Bursar::where('id', '=', $id)->first();
                    $user_id = $bursar->user_id;


                    $bursar->firstname = $request['firstname'];
                    $bursar->lastname = $request['lastname'];
                    $bursar->phonenumber = $request['phonenumber'];
                    $bursar->gender = $request['gender'];
                    $bursar->save();

                    $user = User::find($user_id);
                    $user->email = $request['email'];
                    //$user->role = $request['role'];
                    $user->save();
                    break;
                case "HeadTeacher":
                    $headteacher = HeadTeacher::where('id', '=', $id)->first();
                    $user_id = $headteacher->user_id;

                    $headteacher->firstname = $request['firstname'];
                    $headteacher->lastname = $request['lastname'];
                    $headteacher->phonenumber = $request['phonenumber'];
                    $headteacher->gender = $request['gender'];
                    $headteacher->save();

                    $user = User::find($user_id);
                    $user->email = $request['email'];
                    
                    $user->save();

                    break;
                case "Teacher":
                    $teacher = Teacher::where('id', '=', $id)->first();
                    $user_id = $teacher->user_id;

                    $teacher->firstname = $request['firstname'];
                    $teacher->lastname = $request['lastname'];
                    $teacher->phonenumber = $request['phonenumber'];
                    $teacher->gender = $request['gender'];
                    $teacher->save();

                    // echo $user_id;

                    $user = User::find($user_id);
                    $user->email = $request['email'];
                    // $user->role = $request['role'];
                    $user->save();

                    break;
                default:
                    $assistant = Assistant::where('id', '=', $id)->first();
                    $user_id = $assistant->user_id;

                    $assistant->firstname = $request['firstname'];
                    $assistant->lastname = $request['lastname'];
                    $assistant->phonenumber = $request['phonenumber'];
                    $assistant->gender = $request['gender'];
                    $assistant->save();

                    $user = User::find($user_id);
                    $user->email = $request['email'];
                    //$user->role = $request['role'];
                    $user->save();
            }
            $status = true;
        });
        //ToDo 
        // var_dump($request);
        if (!$status)
            return redirect("/dashboard/all-staffs")->with('failure', "There was an error and data not updated");


        return redirect("/dashboard/all-staffs")->with('success', "Successfully Updated.");

    }

    public function update_teacher(Request $request, $id)
    {
        $request = $request->all();

        $teacher = Teacher::where('id', '=', $id)->first();
        $user_id = $teacher->user_id;

        $teacher->firstname = $request['firstname'];
        $teacher->lastname = $request['lastname'];
        $teacher->phonenumber = $request['phonenumber'];
        $teacher->gender = $request['gender'];
        $teacher->save();

        // echo $user_id;

        $user = User::find($user_id);
        $user->email = $request['email'];
        // $user->role = $request['role'];
        $user->save();

        if ($request['class_id']) {
            $class_details = Classes::where('id', '=', $request['class_id'])->first();
            $class_details->teacher_id = $id;
            $class_details->save();
        }


        return redirect("/dashboard/teachers")->with('success', "Successfully Updated.");
    }


    public function update_headteacher(Request $request, $id)
    {
        $request = $request->all();

        $headteacher = HeadTeacher::where('id', '=', $id)->first();
        $user_id = $headteacher->user_id;

        $headteacher->firstname = $request['firstname'];
        $headteacher->lastname = $request['lastname'];
        $headteacher->phonenumber = $request['phonenumber'];
        $headteacher->gender = $request['gender'];
        $headteacher->save();

        $user = User::find($user_id);
        $user->email = $request['email'];
        $user->save();


        return redirect("/dashboard/headteachers")->with('success', "Successfully Updated.");
    }


    public function update_bursar(Request $request, $id)
    {
        $request = $request->all();

        $bursar = Bursar::where('id', '=', $id)->first();
        $user_id = $bursar->user_id;

        $bursar->firstname = $request['firstname'];
        $bursar->lastname = $request['lastname'];
        $bursar->phonenumber = $request['phonenumber'];
        $bursar->gender = $request['gender'];
        $bursar->save();

        $user = User::find($user_id);
        $user->email = $request['email'];
        $user->save();


        return redirect("/dashboard/bursars")->with('success', "Successfully Updated.");
    }


    public function update_assistant(Request $request, $id)
    {
        $request = $request->all();

        $assistant = Assistant::where('id', '=', $id)->first();
        $user_id = $assistant->user_id;

        $assistant->firstname = $request['firstname'];
        $assistant->lastname = $request['lastname'];
        $assistant->phonenumber = $request['phonenumber'];
        $assistant->gender = $request['gender'];
        $assistant->save();


        $user = User::find($user_id);
        $user->email = $request['email'];
        $user->save();


        return redirect("/dashboard/assistants")->with('success', "Successfully Updated.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
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
        if (isset($verifyUser)) {
            $user = $verifyUser->user;
            if (!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {

            return redirect('/')->with('warning', "Sorry your email cannot be identified.");
        }


        return redirect('/')->with('status', $status);
    }
}
