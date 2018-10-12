<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{


    protected $fillable = [
        'firstname',
       //'preferredname',
        'middle_name',
        'user_id',
        'phonenumber',
        'gender',
        'lastname',
        'dob',
        'blood_group',
        'genotype',
        //'address',
        'origin',
        'nationality',
        'mother_tongue',
        'email',
        'current_school',
        'other_languages',
        'health_challenges',
        'class_id',
        'level',
        'state',
        'entry_session',
        'entry_level',
      //'lga',
    ];


    public function getEmail()
    {

        return $this->user()->email;
    }

    public function getDefaultPassword()
    {
        return $this->user()->defaultpassword;
    }


    public function parent()
    {
        return $this->hasOne('App\Parents', 'student_id', 'id')->get();
    }


    public function result()
    {
        return $this->hasOne('App\Student');
    }

    public function returnFather()
    {
        return is_object($p = $this->parent()->where('parent_type', '=', 'father')->first()) ? $p : (new Parents);
    }

    public function returnMother()
    {
        return is_object($p = $this->parent()->where('parent_type', '=', 'mother')->first()) ? $p : (new Parents);
    }

    public function returnParent()
    {
        return is_object($p = $this->parent()->where('parent_type', '=', 'parent')->first()) ? $p : (new Parents);
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id', 'id')->first();
    }

    public function class_details()
    {
        return $this->belongsTo('App\Classes', 'class_id');
    }

    public function getUsername()
    {
        return $this->user()->username;
    }

    public function getName()
    {
        return $this->user()->name;
    }


    public function classlevel()
    {
        return $this->belongsTo('App\Level', 'level');
    }
}
