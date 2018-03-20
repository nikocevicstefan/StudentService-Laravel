<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function semester()
    {
        return $this->belongsTo('App\Semester');
    }

    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
