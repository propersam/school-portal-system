<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    //   
    protected $fillable = [
        'levelname','description',
    ];

    
    public function classes()
    {
        return $this->hasOne('App\Classes');
    }
    
    public function student()
    {
        return $this->hasOne('App\Student');
    }

}
