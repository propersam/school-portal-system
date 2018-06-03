<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Emergency_contact extends Model
{
    


    protected $fillable = [
        'student_id','user_id','name','home_number','work_number','cell_number'
    ];

     public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->first();
    }
}
