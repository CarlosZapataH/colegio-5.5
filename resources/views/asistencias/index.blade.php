@extends('layout')

@section('title', "Asistencia Alumno")

@section('content')
    <h1>Asistencia</h1>
    <hr>
    <div class="row">
        <div class="col-md-4">
            <h4>Busqueda:</h4>
            <div class="form-group">
                <label for="nivel">Nivel</label>
                <select class="form-control" name="nivel" id="nivel">
                    @foreach ($niveles as $nivel)
                        <option value="{{$nivel->id}}">{{$nivel->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="grado">Grado</label>
                <select class="form-control" name="grado" id="grado">
                </select>
            </div>

            <div class="form-group">
                <label for="seccion">Seccion</label>
                <select class="form-control" name="seccion" id="seccion">
                </select>
            </div>
            <hr>
        </div>
        <div class="col-md-8">
            <h4>Alumnos:
                <small class="text-muted">Seleccionar los alumnos asistidos.</small>
            </h4>
            @if (session('alert'))
                <div class="alert alert-warning">
                    {{ session('alert') }}
                </div>
            @endif
            <form method="POST" action="{{ url('asistencia/') }}">
                {{ csrf_field() }}
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th scope="col">Casilla</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">DNI</th>
                    </tr>
                    </thead>
                    <tbody id="alumnos_table">
                    </tbody>
                </table>
                <button type="submit" class="btn btn-outline-success btn-lg btn-block">Guardar Registro</button>
            </form>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/combos.js')}}"></script>
    <script src="{{asset('js/ajax-alumno.js')}}"></script>
    <script>
        var secciones = @json($secciones);
        var grados = @json($grados);

        window.onload = function () {
            gradoChange();
            seccionChange();
            alumnoSearch();
        };

        $("#nivel").change(function () {
            gradoChange();
            seccionChange();
            alumnoSearch();
        });

        $("#grado").change(function () {
            seccionChange();
            alumnoSearch();
        });

        $("#seccion").change(function () {
            alumnoSearch();
        });
    </script>
@endsection

