<?php

namespace App\Http\Repositories;

use App\Http\Contracts\IAsistencia;
use Illuminate\Support\Facades\DB;

class AsistenciaRepository implements IAsistencia
{
    protected $asistenciaModel;

    public function __construct($asistencia)
    {
        $this->asistenciaModel = $asistencia;
    }

    public function storeAsintencia($alumnos)
    {
        $this->asistenciaModel->insert($alumnos);
    }

    public function searchAsistencia($data)
    {
        $alumnos = DB::table('students')
            ->select('full_name', 'dni', 'asistencias.created_at')
            ->leftJoin('matriculas', 'students.id', '=', 'matriculas.student_id')
            ->leftJoin('asistencias', 'students.id', '=', 'asistencias.student_id')
            ->where([
                ['nivel_id', '=', $data['nivel_id']],
                ['grado_id', '=', $data['grado_id']],
                ['seccion_id', '=', $data['seccion_id']],
                ['asistencias.created_at', 'like', "%{$data['assistance_date']}%"],
            ])->get();

        return $alumnos;
    }
}