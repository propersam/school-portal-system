<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;
use App\Session;
use App\Subject;

class SubjectController extends Controller
{
    //
    public function index()
    {	
    	$subjects = Subject::get();

        return view('forms.subject.view_all', ['subjects' => $subjects]);
    }

    public function create()
    {
        return view('forms.subject.create');
    }

    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            
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
        $description = $request['description'];

        $data = array("name"=>$name,"description"=>$description);
        
        $subject = $this->createsubject($data);


        return redirect("/dashboard/subjects")->with('success', "You have successfully created a subject.");

        
    }

    
     protected function createsubject(array $data)
    {
       $subject = Subject::create($data);

       return $subject;
    }

    public function update(Request $request,$id)
    {
    	$subject = Subject::find($id);
      
        $subject->name = $request['name'];
        $subject->description = $request['description'];


		$subject->save();
        

        return redirect("/dashboard/subjects")->with('success', "Successfully Updated.");
    }

}
