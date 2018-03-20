<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function semesters()
    {
        return $this->belongsToMany('App\Semester','payments');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject','student_subject');
    }
}
