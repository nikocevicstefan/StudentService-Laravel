<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function professors()
    {
        return $this->belongsToMany('App\Professor', 'subject_professor');
    }

    public function students()
    {
        return $this->belongsToMany('App\Students', 'student_subject');
    }

    public function subject_professor()
    {
        return $this->hasMany('App\Subject_Professor', 'subject_id');
    }
}
