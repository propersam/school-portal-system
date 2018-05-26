<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    

    protected $fillable = [
        'firstname', 'preferredname', 'user_id', 'home_number', 'gender', 'lastname', 'dob', 'address', 'origin', 'siblings_attended' , 'child_position', 'siblings_attended_years', 'sibling1_name', 'sibling1_age', 'sibling1_school', 'sibling2_name', 'sibling2_age ', 'sibling2_school', 'sibling3_name', 'sibling3_age', 'sibling3_school', 'email', 'current_school', 'position_in_family', 'level',
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

     public function getUsername()
    {
        return $this->user()->username;
    }

     public function getName()
    {
        return $this->user()->name;
    }

}
