<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    protected $fillable = ['name'];


    public function students()
    {
        return $this->hasMany('App\Student');
    }

    public function subjects()
    {
        return $this->hasMany('App\Subject');
    }
}
