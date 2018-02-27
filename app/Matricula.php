<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matricula';

    protected $fillable = [
        'grado_id',
        'seccion_id',
        'alumno_id',
        'nivel_id',
        'apoderado_id',
    ];
}
