<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Subject_Professor extends Model
{
    public function subject()
    {
        return $this->belongsTo('App\Subject');
    }

    public function professor()
    {
        return $this->belongsTo('App\Professor');
    }
}
