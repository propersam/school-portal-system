<?php

namespace App\Http\Controllers;

use App\Classes;
use App\Emergency_contact;
use App\Events\NewStudentRegistered;
use App\Level;
use App\Parents;
use App\Session;
use App\Student;
use App\User;
use App\VerifyUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class PupilController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['verifyUserByPhone']);
    }

    public function index()
    {
        //event(new NewStudentRegistered(Student::find(18)));
        $active_session = Session::where('is_active', '=', 1)->first();
        $classes = Classes::where('session_id', '=', $active_session->id)->get();
        $levels = Level::get();

        return view('forms.student.create', ['classes' => $classes, 'levels' => $levels]);
    }


    public function applications()
    {
        $active_session = Session::where('is_active', '=', 1)->first();

        $classes = Classes::where('session_id', '=', $active_session->id)->get();

        $pending_applications = Student::where('application_status', '=', 'pending')->get();
        $accepted_applications = Student::where('application_status', '=', 'accepted')->where('admission_status', 'pending')->get();
        $rejected_applications = Student::where('application_status', '=', 'rejected')->get();

        return view('forms.student.applications', ['pending_applications' => $pending_applications, 'accepted_applications' => $accepted_applications, 'rejected_applications' => $rejected_applications, 'classes' => $classes]);
    }


    public function imageUploadPost()

    {
        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
            // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500',

        ]);

        $imageName = time().'.'.request()->image->getClientOriginalExtension();

        request()->image->move(public_path('uploads/passport_photos'), $imageName);

        // $user_id = Auth::User()->id;
        $obj_user = Student::find($_POST['student_id']);
        $obj_user->passport_photo = $imageName;
        $obj_user->save();

        return back()->with('success', "Successfully Updated.");
    }


    public function all_pupils()
    {
        $active_session = Session::where('is_active', '=', 1)->first();

        $classes = Classes::where('session_id', '=', $active_session->id)->pluck('name', 'id');

        $students = Student::where('application_status', '=', 'accepted')->where('admission_status', 'admitted')->get();

        return view('forms.student.view_all', ['students' => $students, 'classes' => $classes]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('forms.student.create', ['classes' => $classes, 'levels' => $levels]);
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name'          => 'required|string|max:255',
            // 'pref_name'           => 'required|string|max:255',
            'lastname'            => 'required|string|max:255',
            'gender'              => 'required|string|max:255',
            'dob'                 => 'required|string|max:255',
            'origin'              => 'required|string|max:255',
            'residential_address' => 'required|string|max:255',
            'state'               => 'required|string|max:255',
            //  'lga'                 => 'required|string|max:255',
            'home_number'         => 'required|string|max:255',
            // 'level'               => 'required|string|max:255',
            // 'phonenumber' => 'required|string|max:255',

            'email' => 'string|email|max:255|unique:users',

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
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //var_dump($request); die();
        $request = $request->all();

        $this->validator($request)->validate();
        // var_dump($request); die();
        $username = str_random(4);

        $password = str_random(8);
        $name = $request['first_name'].' '.$request['lastname'];
        $firstname = $request['first_name'];
        $middle_name = $request['middle_name'];
        $lastname = $request['lastname'];
        $email = $request['email'];
        $phone = $request['phone'];
        $active_session = Session::where('is_active', '=', 1)->first();

        $data = [
            "username"    => $username,
            "password"    => $password,
            "firstname"   => $firstname,
            "lastname"    => $lastname,
            "middle_name" => $middle_name,
            "name"        => $name,
            "email"       => $email,
            'phone'       => $phone,
            "role"        => 'parent'
        ];

        $user = $this->createuser($data);

        $class_id = $request['class_id'];
        $data2 = [
            "user_id"           => $user->id,
            "firstname"         => $request['first_name'],
            "middle_name"       => $request['middle_name'],
            "lastname"          => $lastname,
            "phonenumber"       => $request['home_number'],
            "gender"            => $request['gender'],
            //"address"         => $request['residential_address'],
            "dob"               => $request['dob'],
            "origin"            => $request['origin'],
            //"lga"             => $request['lga'],
            "nationality"       => $request['nationality'],
            "genotype"          => $request['genotype'],
            "blood_group"       => $request['blood_group'],
            "state"             => $request['state'],
            "mother_tongue"     => $request['mother_tongue'],
            "other_languages"   => $request['other_languages'],
            "health_challenges" => $request['health_challenges'],
            //"email"           => $request['email'],

            "class_id"      => $class_id,
            "level"         => Classes::where('id', $class_id)->first()->classlevel['levelname'],
            "entry_session" => $active_session->id,
            //"entry_level"       => $request['level']
        ];
        $student = $this->createstudent($data2);

        $data3 = [
            "user_id"     => $user->id,
            "student_id"  => $student->id,
            "firstname"   => $request['parent_firstname'],
            "lastname"    => $request['parent_lastname'],
            //"companyname" => $request['father_company_name'],
            "workaddress" => $request['residential_address'],
            "phone"       => $phone,
            "email"       => $request['email'],
            "phonenumber" => $request['phone'],

            "origin"      => $request['origin'],
            "occupation"  => $request['occupation'],
            "parent_type" => 'parent'
        ];

//        $data4 = [
//            "user_id"     => $user->id,
//            "student_id"  => $student->id,
//            "firstname"   => $request['mother_first_name'],
//            "lastname"    => $request['mother_surname'],
//            "companyname" => $request['mother_company_name'],
//            "workaddress" => $request['mother_work_address'],
//            "phone"       => $request['mother_work_phone'],
//            "email"       => $request['mother_email'],
//            "phonenumber" => $request['mother_work_phone'],
//            "parent_type" => 'mother'
//        ];

        $parent = $this->createparent($data3);
        $emergency = [
            "user_id"      => $parent->id,
            "student_id"   => $student->id,
            "home_number"  => $request['emergency_home_number'],
            "name"         => $request['emergency_name'],
            "relationship" => $request['relationship'],
        ];

        event(new NewStudentRegistered($student));

        $emergency = $this->create_emergency_contact($emergency);

        //$father = $this->createfather($data3);
        //$mother = $this->createmother($data4);

        return redirect("/dashboard/register-student")
            ->with('success', "You have successfully registered a student.");
    }


    protected function createuser(array $data)
    {
        $user = User::create([
            'name'            => $data['name'],
            'username'        => $data['username'],
            'email'           => $data['email'],
            'phone'           => $data['phone'],
            'password'        => bcrypt($data['password']),
            'role'            => $data['role'],
            'defaultpassword' => $data['password'],

        ]);

        $verifyUser = VerifyUser::create([
            'user_id'     => $user->id,
            'token'       => str_random(40),
            'phone_token' => random_int(1000000, 9999999),
        ]);

        return $user;
    }


    protected function createstudent(array $data)
    {
        // var_dump($data);
        $student = Student::create($data);

        return $student;
    }

    protected function createparent(array $data)
    {
        // var_dump($data);
        $parent = Parents::create($data);

        return $parent;
    }

    protected function create_emergency_contact(array $data)
    {
        // var_dump($data);
        $emergency_contact = Emergency_contact::create($data);

        return $emergency_contact;
    }

    protected function createfather(array $data)
    {
        $parent = Parents::create([
            'firstname'   => $data['firstname'],
            'lastname'    => $data['lastname'],
            'email'       => $data['email'],
            'student_id'  => $data['student_id'],
            'companyname' => $data['companyname'],
            'user_id'     => $data['user_id'],
            'workaddress' => $data['workaddress'],
            'phone'       => $data['phone'],
            'phonenumber' => $data['phonenumber'],
            'parent_type' => $data['parent_type'],

        ]);

        return $parent;
    }

    protected function createmother(array $data)
    {
        $parent = Parents::create([
            'firstname'   => $data['firstname'],
            'lastname'    => $data['lastname'],
            'email'       => $data['email'],
            'student_id'  => $data['student_id'],
            'companyname' => $data['companyname'],
            'user_id'     => $data['user_id'],
            'workaddress' => $data['workaddress'],
            'phone'       => $data['phone'],
            'phonenumber' => $data['phonenumber'],
            'parent_type' => $data['parent_type'],

        ]);

        return $parent;
    }

    protected function createcontact(array $data)
    {
        $contact = Emergency_contact::create([
            'name'        => $data['name'],
            'home_number' => $data['home_number'],
            'work_number' => $data['work_number'],
            'student_id'  => $data['student_id'],
            'user_id'     => $data['user_id'],
            'cell_number' => $data['cell_number']
        ]);

        return $contact;
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

    public function verifyUserByPhone(Request $request)
    {
        if ($request->isMethod('post')) {
            $status = "";
            $this->validate($request, [
                'phone' => 'required|exists:users,phone',
                'token' => 'required|exists:verify_users,phone_token',
            ]);
            $user = User::where('phone', $request->input('phone'))->first();
            $verifyUser = VerifyUser::where('phone_token', $request->input('token'))->first();

            if (is_object($verifyUser) and $user->is($verifyUser->user)) {
                if (!$user->verified) {
                    $user->verified = 1;
                    $user->save();
                    $status = "Your phone number has been verified.";
                } else {
                    $status = "Your phone number is already verified.";
                }
                Auth::login($user);

                return redirect('/change-default-password')->with(['status' => $status]);
            } else {
                return redirect()->back()->with('warning', "Sorry your phone cannot be identified.");
            }
        }

        return view('auth.verify_phone');
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
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

