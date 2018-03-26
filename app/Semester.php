<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = [
        'name', 'course_id'
    ];

    public function course()
    {
        return $this->belongsTo('App\Course');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student', 'payments');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
