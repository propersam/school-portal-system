<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fee extends Model
{
    //   
    protected $fillable = [
        'type_id','level_id','amount',
    ];

    protected $table = 'fees';

    
    public function level()
    {
        return $this->belongsTo('App\Level', 'level_id');
    }
    
    public function type()
    {
        return $this->belongsTo('App\Fee_type', 'type_id');
    }


    public function student()
    {
        return $this->hasOne('App\Student');
    }

}
