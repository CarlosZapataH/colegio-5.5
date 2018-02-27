<?php

namespace App\Http\Controllers;

use App\Asistencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AsistenciaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $niveles = DB::table('nivel')->get();
        $grados = DB::table('grado')->get();
        $secciones = DB::table('seccion')->get();

        return view('asistencias.index', compact('niveles', 'grados', 'secciones'));
    }

    public function store(Request $request)
    {
        config(['app.timezone' => 'America/Chicago']);
        for ($i = 0; $i < count($request['asistencia']); $i++) {
            Asistencia::create([
                'estado' => 1,
                'alumno_id' => $request['asistencia'][$i],
            ]);
        }

        return redirect()->route('asistencias.index');
    }

    public function reporte()
    {
        $niveles = DB::table('nivel')->get();
        $grados = DB::table('grado')->get();
        $secciones = DB::table('seccion')->get();

        return view('asistencias.reporte', compact('niveles', 'grados', 'secciones'));
    }

    public function search(Request $request)
    {
        $alumnos = DB::table('alumno')
            ->select('fullname', 'dni', 'asistencia.created_at')
            ->leftJoin('matricula', 'alumno.id', '=', 'matricula.alumno_id')
            ->leftJoin('asistencia', 'alumno.id', '=', 'asistencia.alumno_id')
            ->where([
                ['nivel_id', '=', $request['nivel_id']],
                ['grado_id', '=', $request['grado_id']],
                ['seccion_id', '=', $request['seccion_id']],
                ['asistencia.created_at', 'like', "%{$request['assistance_date']}%"],
            ])->get();

        return response()->json($alumnos);
    }
}
