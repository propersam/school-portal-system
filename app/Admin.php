<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
   protected $fillable = [
        'user_id', 'phonenumber', 'gender', 
    ];

     
    

	public function getEmail()
	{
		
		return $this->user->email;
	}

    public function getName()
    {
        
        return $this->user->name;
    }

    


     public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id');
    }
}
