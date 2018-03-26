<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name'];

    public function semesters()
    {
        return $this->hasMany('App\Semester');
    }

    public function students()
    {
        return $this->hasMany('App\Student');
    }
}
