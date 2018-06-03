<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Section;

class SectionController extends Controller
{
    //


     public function index()
    {        
    	$sections = Section::all();
        return view('section.list')->with('sections', $sections);
    }

    public function create()
    {
        return view('forms.section.create');
    }

     protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'startdate' => 'required|date',
            'enddate' => 'nullable|date',
             
           
            
        ]);
    }

     public function store(Request $request)
    {
    	//var_dump($request); die();
        $request = $request->all();
        $this->validator($request)->validate();

        $section = Section::create([
            'name' => $request['name'],
            'startdate' => $request['start-year'],
            'enddate' => $request['end-year'],
            

        ]);

        return $section; 

    }
}
