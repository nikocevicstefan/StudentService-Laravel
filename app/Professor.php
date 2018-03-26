<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function subjects()
    {
        return $this->belongsToMany('App\Subject', 'subject_professor');
    }

    public function subject_professor()
    {
        return $this->hasMany('App\Subject_Professor', 'professor_id');
    }
}
