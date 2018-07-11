<?php

namespace App;

use Carbon\Carbon;

class Assistant extends User
{
    //

    protected $fillable = [
        'firstname', 'lastname', 'user_id', 'phonenumber', 'gender', 'employmentdate',
    ];

     protected $dates = ['employmentdate'];

     public function setEmploymentdateAttribute($value)
	{
	      $this->attributes['employmentdate'] = Carbon::createFromFormat('m/d/Y', $value);
	}

	public function getEmail()
	{
		
		return $this->user->email;
	}

    public function getName()
    {
        
        return $this->user->name;
    }

     public function getDefaultPassword()
    {
        return $this->user->defaultpassword;
    }

    public function getUsername()
    {
        return $this->user->username;
    }


     public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
