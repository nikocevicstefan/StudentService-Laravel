<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_Subject extends Model
{

    protected $table = 'student_subject';

    protected $fillable = ['student_id', 'subject_id', 'points', 'grade'];

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }

    public function grade(){
        return $this->points.'('.$this->grade.')';

    }
}
