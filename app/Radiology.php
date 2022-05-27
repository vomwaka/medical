<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Radiology extends Model
{
    protected $fillable = [
        'unique_id', 
        'patient_name', 
        'patient_email',
        'symptoms',
        'result'
    ];
}
