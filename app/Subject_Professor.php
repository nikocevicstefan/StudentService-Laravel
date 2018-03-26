<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_Professor extends Model
{

    protected $fillable = ['professor_id', 'subject_id', 'position'];

    protected $table = 'subject_professor';

    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }
}
