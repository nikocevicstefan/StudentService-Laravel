<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'index', 'course_id', 'user_id'
    ];

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
