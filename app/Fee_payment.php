<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee_payment extends Model
{
    //   
    protected $fillable = [
        'type', 'user_id', 'session_id', 'term_id', 'amount', 'student_id'
    ];

    // protected $table = 'fee_type';

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
