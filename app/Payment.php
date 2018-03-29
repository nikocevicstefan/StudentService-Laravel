<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{

    protected $fillable = ['student_id', 'description', 'amount'];


    public function student()
    {
        return $this->belongsTo('App\Student');
    }
}
