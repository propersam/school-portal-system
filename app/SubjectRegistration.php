<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubjectRegistration extends Model
{
   
    protected $fillable = [
        'session_id','subject_id','level'
    ];



     public function getAll()
    {
    	$sessions = App\Session::all();

        return $sessions;
    }

    
    public function subject()
    {
        return $this->belongsTo('App\Subject', 'subject_id');
    }

}
