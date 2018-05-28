<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\User;

use Illuminate\Http\Request;

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
