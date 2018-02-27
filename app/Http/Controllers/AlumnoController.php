<?php

namespace App\Http\Controllers;

use App\Alumno;
use App\Apoderado;
use App\Matricula;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlumnoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $alumnos = Alumno::paginate(9);
        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $nivel = DB::table('nivel')->get();
        $grado = DB::table('grado')->get();
        $seccion = DB::table('seccion')->get();

        return view('alumnos.create', compact('nivel', 'grado', 'seccion'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_alumno'     => 'required | string',
            'apellido_alumno'   => 'required | string',
            'dni_alumno'        => 'required | min:8',
            'telefono_alumno'   => 'required',
            'direccion_alumno'  => 'required',
            'nacimiento_alumno' => 'required | date',
            'sexo_alumno'       => 'required|in:Masculino,Femenino',

            //parent
            'parent_name'       => 'required | string',
            'parent_phone'      => 'required | numeric',
            'parent_email'      => 'required | string',
            'parent_address'    => 'required | string',

            //class
            'nivel' => 'required | numeric',
            'grado' => 'required | numeric',
            'seccion' => 'required | numeric',
        ]);

        $alumnoId = Alumno::create([
            'name'      => $data['nombre_alumno'],
            'apellidos' => $data['apellido_alumno'],
            'fullname'  => $data['nombre_alumno'].' '.$data['apellido_alumno'],
            'sexo'      => $data['sexo_alumno'],
            'dni'       => $data['dni_alumno'],
            'telefono'  => $data['telefono_alumno'],
            'direccion' => $data['direccion_alumno'],
            'codigo'    => 0,
            'email'     => '',
            'fechaNacimiento' => $data['nacimiento_alumno'],
        ]);

        $apoderadoId = Apoderado::create([
            'name'      => $data['parent_name'],
            'telefono'  => $data['parent_phone'],
            'email'     => $data['parent_email'],
            'direccion' => $data['parent_address'],
        ]);

        Matricula::create([
            'alumno_id'     => $alumnoId['id'],
            'apoderado_id'  => $apoderadoId['id'],
            'nivel_id'      => $data['nivel'],
            'grado_id'      => $data['grado'],
            'seccion_id'    => $data['seccion'],
        ]);
        return redirect()->route('alumnos.index');
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function AlumnoSearch(Request $request)
    {
        //$data = Alumno::where('dni', $request['alumno_dni'])->get();

        $alumnos = DB::table('alumno')
            ->select('alumno_id','fullname','dni')
            ->leftJoin('matricula', 'alumno.id', '=', 'matricula.alumno_id')
            ->where([
                ['nivel_id', '=',$request['nivel_id'] ],
                ['grado_id', '=', $request['grado_id']],
                ['seccion_id', '=', $request['seccion_id']]
            ])->get();
        return response()->json($alumnos);
    }
}
