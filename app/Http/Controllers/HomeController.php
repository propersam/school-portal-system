<?php

namespace App\Http\Controllers;
use App\Level;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    } 

    public function allLevels()
    {
        $levels = Level::get();

        return view('forms.level.view_all', ['levels' => $levels]);
    }
    public function create_level()
    {
        return view('forms.level.create');
    }


    protected function validator(array $data)
    {
        return Validator::make($data, [
            'levelname' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storelevel(Request $request)
    {
        $request = $request->all();
        $this->validator($request)->validate();

        $levelname = $request['levelname'];
        $description = $request['description'];

        $data = array("levelname"=>$levelname,"description"=>$description);
        
        $subject = $this->createlevel($data);


        return redirect("/dashboard/levels")->with('success', "You have successfully created a level.");

        
    }

    public function updatelevel(Request $request,$id)
    {
        $level = Level::find($id);
      
        $level->levelname = $request['levelname'];
        $level->description = $request['description'];


        $level->save();
        

        return redirect("/dashboard/levels")->with('success', "Successfully Updated.");
    }


    public function delete_level($id)
    {
        $level = Level::find($id);
        $level->delete();

        return redirect("/dashboard/levels")->with('success', "Successfully Deleted.");
    }

    
     protected function createlevel(array $data)
    {
       $level = Level::create($data);

       return $level;
    }

    public function imageUpload()
    {
        return view('change_photo');
    }

    public function imageUploadPost()

    {

        request()->validate([

            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1000',
    // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048|dimensions:width=500,height=500',

        ]);



            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('uploads/profile_photos'), $imageName);

            $user_id = Auth::User()->id;                       
            $obj_user = User::find($user_id);
            $obj_user->photo = $imageName;
            $obj_user->save(); 

        return redirect('eportal');

        // return back()

        //     ->with('success','You have successfully upload image.')

        //     ->with('image',$imageName);

    }

    public function logout()
    {
        Auth::logout();
        return redirect('eportal');

    }


}
