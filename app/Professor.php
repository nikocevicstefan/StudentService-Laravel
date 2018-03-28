<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Professor extends Model
{

    protected $fillable = [
        'first_name', 'last_name', 'birth_date', 'office', 'user_id'
    ];

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

    public function info(){
        return [
            'id' => $this->id,
            'name' => $this->first_name.' '.$this->last_name,
            'office' => $this->office
        ];
    }
}
