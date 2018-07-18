<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
   
    protected $fillable = [
        'name','value',
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
