<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $fillable = [
        'name',
        'last_name',
        'full_name',
        'sex',
        'dni',
        'email',
        'birth_date',
    ];
}
