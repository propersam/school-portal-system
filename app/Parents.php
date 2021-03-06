<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parents extends Model
{
    
   
    protected $fillable = [
        'student_id',
        'user_id',
        'firstname',
        'lastname',
       // 'companyname',
        'workaddress',
        'occupation',
        'phone',
        'email',
        'phonenumber',
        'parent_type',
        'origin',
    ];


    public function getEmail()
    {
        
        return $this->user()->email;
    }

     public function getDefaultPassword()
    {
        return $this->user()->defaultpassword;
    }


     public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->first();
    }



     public function student()
    {
        return $this->hasMany('App\User', 'student_id');
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
