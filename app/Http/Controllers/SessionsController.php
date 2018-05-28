<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Session;

class SessionsController extends Controller
{
    //
    public function index()
    {	
    	$sessions = Session::get();
    	// echo "string";
    	// var_dump($sessions)
    	    	// return view('service', ['services' => $service]);

        return view('forms.session.view_all', ['sessions' => $sessions]);
    }

    public function create()
    {
        return view('forms.session.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'is_active' => 'required|string|max:255',
            
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

        $name = $request['name'];
        $is_active = $request['is_active'];

        $data = array("name"=>$name,"is_active"=>$is_active);
        
        $session = $this->createsession($data);


        return redirect("/dashboard/sessions")->with('success', "You have successfully created a session.");

        
    }

    
     protected function createsession(array $data)
    {
       $session = Session::create([
            'name' => $data['name'],
            'is_active' => $data['is_active']
        ]);

       return $session;
    }

    public function update(Request $request,$id)
    {
    	// var_dump($request);
    	// var_dump($_POST);
    	$session = Session::find($id);
      
        $session->name = $request['name'];
        $session->current_term = $request['current_term'];

        if($request['is_active']){
            $session->is_active = $request['is_active'];
        }


		$session->save();
        Session::where('id', '!=', $id)
        ->update([
            'is_active' => 0,
        ]);
        return redirect("/dashboard/sessions")->with('success', "Successfully Updated.");
    }
}
