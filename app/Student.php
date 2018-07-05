<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    

    protected $fillable = [
        'firstname', 'preferredname', 'user_id', 'phonenumber', 'gender', 'lastname', 'dob', 'address', 'origin', 'email', 'current_school', 'class_id', 'level', 'state', 'lga'
    ];


    public function getEmail()
    {
        
        return $this->user()->email;
    }

     public function getDefaultPassword()
    {
        return $this->user()->defaultpassword;
    }


    
    public function parent()
    {
        return $this->hasOne('App\Parents', 'student_id', 'id')->get();
    }

    
    public function result()
    {
        return $this->hasOne('App\Student');
    }

    public function returnFather() {
        return $this->parent()->where('parent_type','=', 'father')->first();
    }

    public function returnMother() {
        return $this->parent()->where('parent_type','=', 'mother')->first();
    }

     public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->first();
    }

     public function class_details()
    {
        return $this->belongsTo('App\Classes', 'class_id');
    }

     public function getUsername()
    {
        return $this->user()->username;
    }

     public function getName()
    {
        return $this->user()->name;
    }


     public function classlevel()
    {
        return $this->belongsTo('App\Level', 'level');
    }
}
