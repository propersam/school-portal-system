<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Parent extends Model
{
   
    protected $fillable = [
        'user_id','firstname','lastname','maritalstatus','occupation','companyname','workaddress','phone','email','attended_school','phonenumber','parent_type',
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

     public function getUsername()
    {
        return $this->user()->username;
    }

     public function getName()
    {
        return $this->user()->name;
    }

}
