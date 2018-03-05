<?php

namespace App\Http\Controllers;

use App\Http\Contracts\IAsistencia;
use App\Http\Contracts\IGrado;
use App\Http\Contracts\INivel;
use App\Http\Contracts\Iseccion;
use Illuminate\Http\Request;

class AsistenciaController extends Controller
{
    protected $IAsistencia;

    protected $INivel;

    protected $IGrado;

    protected $ISeccion;

    public function __construct(IAsistencia $IAsistencia, INivel $INivel, IGrado $IGrado, Iseccion $ISeccion)
    {
        $this->IAsistencia = $IAsistencia;
        $this->INivel = $INivel;
        $this->IGrado = $IGrado;
        $this->ISeccion = $ISeccion;

        $this->middleware('auth');
    }

    public function index()
    {
        $niveles = $this->INivel->getNiveles();
        $grados = $this->IGrado->getGrados();
        $secciones = $this->ISeccion->getSecciones();

        return view('asistencias.index', compact('niveles', 'grados', 'secciones'));
    }

    public function store(Request $request)
    {
        $data = [];
        if ($request['asistencia']) {
            for ($i = 0; $i < count($request['asistencia']); $i++) {
                $data[] = [
                    'status' => 1,
                    'student_id' => $request['asistencia'][$i],
                    'created_at' => date('Y-m-d H:i:s'),
                ];
            }
            $this->IAsistencia->storeAsintencia($data);

            return redirect()->route('asistencias.index');
        }

        return redirect()->route('asistencias.index')->with('alert', '¡Se necesita seleccionar a un alumno!');
    }

    public function reporte()
    {
        $niveles = $this->INivel->getNiveles();
        $grados = $this->IGrado->getGrados();
        $secciones = $this->ISeccion->getSecciones();

        return view('asistencias.reporte', compact('niveles', 'grados', 'secciones'));
    }

    public function search(Request $request)
    {
        $alumnos = $this->IAsistencia->searchAsistencia($request);

        return response()->json($alumnos);
    }
}
