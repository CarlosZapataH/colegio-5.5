<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $table = 'parents';

    protected $fillable = [
        'name',
        'dni',
        'phone',
        'email',
        'address',

    ];
}
