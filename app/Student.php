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


    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'student_subject');
    }

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function student_subject(){
        return $this->hasMany('App\Student_Subject');
    }

    public function info(){
        return [
            'id' => $this->id,
            'full name' => $this->first_name.' '.$this->last_name,
            'index' => $this->index
            ];
    }

}
