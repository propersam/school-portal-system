<?php

namespace App;

use Carbon\Carbon;

class Teacher extends User
{

	 protected $fillable = [
        'firstname', 'lastname', 'user_id', 'phonenumber', 'gender', 'employmentdate',
    ];

     protected $dates = ['employmentdate'];

     public function setEmploymentdateAttribute($value)
    {
          $this->attributes['employmentdate'] = Carbon::createFromFormat('m/d/Y', $value);
    }

    // public function getEmail()
    // {
    //     return $this->user()->email;
        
    // }

     public function getDefaultPassword()
    {
        return $this->user->defaultpassword;
    }

    
    public function classes()
    {
        return $this->hasOne('App\Classes');
    }

     public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }

     public function getUsername()
    {
        return $this->user->username;
    }

     public function getName()
    {
        return $this->user->name;
    }

}
