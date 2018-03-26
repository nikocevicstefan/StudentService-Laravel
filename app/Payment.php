<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = ['student_id', 'semester_id', 'amount'];

    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
