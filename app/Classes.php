<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Teacher;
use App\Session;
use App\Level;

class Classes extends Model
{
   
    protected $fillable = [
        'name','session_id','teacher_id', 'level'
    ];


    protected $table = 'classes';


     public function session()
    {
        return $this->belongsTo('App\Session', 'session_id');
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
