<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = ['name', 'credits', 'description', 'semester_id'];

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function professors()
    {
        return $this->belongsToMany('App\Professors', 'subject_professor');
    }

    public function students()
    {
        return $this->belongsToMany('App\Students', 'student_subject');
    }
}
