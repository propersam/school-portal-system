<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
   
    protected $fillable = [
        'name','description',
    ];



     public function getAll()
    {
    	$sessions = App\Session::all();

        return $sessions;
    }

    
    public function subjectRegistration()
    {
        return $this->hasOne('App\SubjectRegistration');
    }

}
