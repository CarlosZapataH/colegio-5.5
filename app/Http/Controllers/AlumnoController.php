<?php

namespace App\Http\Controllers;

use App\Apoderado;
use App\Grado;
use App\Matricula;
use App\Nivel;
use App\Seccion;
use App\Student;
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
        $alumnos = Student::paginate(9);

        return view('alumnos.index', compact('alumnos'));
    }

    public function create()
    {
        $nivel = Nivel::all();
        $grado = Grado::all();
        $seccion = Seccion::all();

        return view('alumnos.create', compact('nivel', 'grado', 'seccion'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nombre_alumno' => 'required | string',
            'apellido_alumno' => 'required | string',
            'dni_alumno' => 'required | min:8',
            'email_alumno' => 'required',
            'nacimiento_alumno' => 'required | date',
            'sexo_alumno' => 'required|in:Masculino,Femenino',

            //parent
            'parent_name' => 'required | string',
            'parent_phone' => 'required | numeric',
            'parent_email' => 'required | string',
            'parent_address' => 'required | string',
            'parent_dni' => 'required | numeric',

            //class
            'nivel' => 'required | numeric',
            'grado' => 'required | numeric',
            'seccion' => 'required | numeric',
        ]);

        $parentId = Apoderado::create([
            'name' => $data['parent_name'],
            'dni' => $data['parent_dni'],
            'phone' => $data['parent_phone'],
            'email' => $data['parent_email'],
            'address' => $data['parent_address'],
        ]);

        $studentId = Student::create([
            'name' => $data['nombre_alumno'],
            'last_name' => $data['apellido_alumno'],
            'full_name' => $data['nombre_alumno'].' '.$data['apellido_alumno'],
            'sex' => $data['sexo_alumno'],
            'dni' => $data['dni_alumno'],
            'email' => $data['email_alumno'],
            'birth_date' => $data['nacimiento_alumno'],
        ]);

        Matricula::create([
            'student_id' => $studentId['id'],
            'parent_id' => $parentId['id'],
            'nivel_id' => $data['nivel'],
            'grado_id' => $data['grado'],
            'seccion_id' => $data['seccion'],
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
        $alumnos = DB::table('students')
            ->select('students.id', 'full_name', 'dni', 'status')
            ->leftJoin('asistencias', 'students.id', '=', 'asistencias.student_id')
            ->join('matriculas', 'students.id', '=', 'matriculas.student_id')
            ->where([
                ['nivel_id', '=', $request['nivel_id']],
                ['grado_id', '=', $request['grado_id']],
                ['seccion_id', '=', $request['seccion_id']],
            ])
            ->get();
        return response()->json($alumnos);
    }
}
