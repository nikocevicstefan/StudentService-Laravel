<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student_Subject extends Model
{
    public function subjects()
    {
        return $this->belongsToMany('App\Subject');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student');
    }
}
