<?php
// Exam result
namespace App;

use Illuminate\Database\Eloquent\Model;

class AssessmentResult extends Model
{

    protected $fillable = [
        'student_id','session_id','class_id','subject_id','score','term',
    ];

    protected $table = 'assessment_scores';
 
    public function classes()
    {
        return $this->hasOne('App\Classes');
    }
    
    public function student()
    {
        return $this->belongsTo('App\Student', 'student_id', 'id');
    }

}
