<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Section extends Model
{
     /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'start-year', 'end-year', 
    ];

    protected $dates = ['start-year', 'end-year'];

     public function setStartYearAttribute($value)
	{
	      $this->attributes['start-year'] = Carbon::createFromFormat('m/d/Y', $value);
	}

	public function setEndYearAttribute($value)
	{
	      $this->attributes['end-year'] = Carbon::createFromFormat('m/d/Y', $value);
	}

}
