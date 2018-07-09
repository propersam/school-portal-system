<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
   
    protected $fillable = [
        'name','is_active',
    ];



     public function getAll()
    {
    	$sessions = App\Session::all();

        return $sessions;
    }

    
    public function classes()
    {
        return $this->hasOne('App\Classes');
    }

}
