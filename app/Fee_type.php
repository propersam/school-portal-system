<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_type extends Model
{
    //   
    protected $fillable = [
        'name','description',
    ];

    protected $table = 'fee_type';

    public function classes()
    {
        return $this->hasOne('App\Classes');
    }
    
    public function student()
    {
        return $this->hasOne('App\Student');
    }

    public function fee()
    {
        return $this->hasOne('App\Fee');
    }

}
