<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Apoderado extends Model
{
    protected $table = 'apoderado';

    protected $fillable = [
        'name',
        'telefono',
        'email',
        'direccion',

    ];
}
