<?php
// Exam result
namespace App;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{

    protected $fillable = [
        'student_id','session_id','class_id','subject_id','score','term',
    ];

    protected $table = 'exam_scores';
 
    public function class_details()
    {
        return $this->belongsTo('App\Classes', 'class_id');
    }

    public function session()
    {
        return $this->belongsTo('App\Session', 'session_id');
    }
    
    public function subject()
    {
        return $this->belongsTo('App\SubjectRegistration', 'subject_id');
    }
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

}
