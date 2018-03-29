<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{

    protected $fillable = ['name', 'credits', 'description', 'semester'];

    public function professors()
    {
        return $this->belongsToMany('App\Professor', 'subject_professor');
    }

    public function students()
    {
        return $this->belongsToMany('App\Student', 'student_subject', 'subject_id', 'student_id');
    }

    public function student_subject(){
        return $this->hasMany('App\Student_Subject');
    }

    public function subject_professor()
    {
        return $this->hasMany('App\Subject_Professor', 'subject_id');
    }

    public function info()
    {
        return
            [
                'id' => $this->id,
                'name' => $this->name,
            ];
    }

}
