<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    //
    protected $fillable = [
        'student_id',
        'parent_id',
        'nivel_id',
        'grado_id',
        'seccion_id',
    ];
}
