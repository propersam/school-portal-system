<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classes extends Model
{
   
    protected $fillable = [
        'classname','session_id','teacher_id', 'level',
    ];


    protected $table = 'classes';


     public function session()
    {
        return $this->belongsTo('App\Session', 'session_id');
    }

    public function result()
    {
        return $this->hasOne('App\Result');
    }

    public function student()
    {
        return $this->hasOne('App\Student');
    }

     public function teacher()
    {
        return $this->belongsTo('App\Teacher', 'teacher_id');
    }

     public function classlevel()
    {
        return $this->belongsTo('App\Level', 'level');
    }

}
