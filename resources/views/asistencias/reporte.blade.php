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
                    @foreach ($grados as $grado)
                        <option value="{{$grado->id}}">{{$grado->name}}</option>
                    @endforeach
                </select>
            </div>

            <div class="form-group">
                <label for="seccion">Seccion</label>
                <select class="form-control" name="seccion" id="seccion">
                </select>
            </div>

            <div class="form-group">
                <label for="assistance_date">Fecha</label>
                <input type="date" class="form-control" id="assistance_date" name="assistance_date">
            </div>
            <button type="button" id="assistance_search" onclick="assistanceSearch();"
                    class="btn btn-success btn-lg btn-block">Buscar
            </button>
            <hr>
        </div>
        <div class="col-md-8">
            <h4>Alumnos: </h4>
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">DNI</th>
                    <th scope="col">Fecha</th>
                </tr>
                </thead>
                <tbody id="alumnos_table">
                </tbody>
            </table>
        </div>
    </div>
@endsection

@section('script')
    <script src="{{asset('js/combos.js')}}"></script>
    <script src="{{asset('js/ajax-alumno.js')}}"></script>
    <script>
        var secciones = @json($secciones);
        var grados = @json($grados);
        gradoChange();
        seccionChange();
        assistanceSearch();

        window.onload = function () {
            gradoChange();
            seccionChange();
        };

        $("#nivel").change(function () {
            gradoChange();
            seccionChange();
        });

        $("#grado").change(function () {
            seccionChange();
        });
    </script>
@endsection

