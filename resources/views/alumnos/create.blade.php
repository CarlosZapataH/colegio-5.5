@extends('layout')

@section('title', "Crear Alumno")

@section('content')
    <h1>Matricula Web</h1>
    <hr>
    <form method="POST" action="{{ url('alumnos/') }}">
        {{ csrf_field() }}
        <div class="row">

            <div class="col-md-6">
                <h3>Datos del hijo a postular</h3>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('nombre_alumno')) is-invalid @endif"
                           name="nombre_alumno" id="nombre_alumno" value="{{ old('nombre_alumno') }}"
                           placeholder="Nombres">
                    @if ($errors->has('nombre_alumno'))
                        <div class="invalid-feedback">{{ $errors->first('nombre_alumno') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('apellido_alumno')) is-invalid @endif"
                           name="apellido_alumno" id="apellido_alumno" value="{{ old('apellido_alumno') }}"
                           placeholder="Apellidos">
                    @if ($errors->has('apellido_alumno'))
                        <div class="invalid-feedback">{{ $errors->first('apellido_alumno') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="number" class="form-control @if ($errors->has('dni_alumno')) is-invalid @endif"
                           name="dni_alumno" id="dni_alumno" placeholder="DNI" value="{{ old('dni_alumno') }}">
                    @if ($errors->has('dni_alumno'))
                        <div class="invalid-feedback">{{ $errors->first('dni_alumno') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="local" class="form-control @if ($errors->has('email_alumno')) is-invalid @endif"
                           name="email_alumno" id="email_alumno" value="{{ old('email_alumno') }}"
                           placeholder="Email">
                    {!! $errors->first('email_alumno','<div class="invalid-feedback">:message</div>') !!}
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <div class="input-group-text">Fecha de Nacimiento</div>
                    </div>
                    <input type="date" class="form-control @if ($errors->has('nacimiento_alumno')) is-invalid @endif"
                           name="nacimiento_alumno" id="nacimiento_alumno" value="{{ old('nacimiento_alumno') }}"
                           placeholder="Fecha Nacimiento">
                    @if ($errors->has('nacimiento_alumno'))
                        <div class="invalid-feedback">{{ $errors->first('nacimiento_alumno') }}</div>
                    @endif
                </div>
                <br>
                <label>Sexo: </label>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo_alumno" id="inlineRadio1" value="Masculino"
                           checked>
                    <label class="form-check-label" for="inlineRadio1">Masculino </label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="sexo_alumno" id="inlineRadio2" value="Femenino">
                    <label class="form-check-label" for="inlineRadio2">Femenino </label>
                </div>
            </div>

            <div class="col-md-6">
                <h3>Datos del padre de familia</h3>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('parent_name')) is-invalid @endif"
                           name="parent_name" id="parent_name" value="{{ old('parent_name') }}"
                           placeholder="Nombre completo">
                    @if ($errors->has('parent_name'))
                        <div class="invalid-feedback">{{ $errors->first('parent_name') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('parent_phone')) is-invalid @endif"
                           name="parent_phone" id="parent_phone" value="{{ old('parent_phone') }}"
                           placeholder="Telefono">
                    @if ($errors->has('parent_phone'))
                        <div class="invalid-feedback">{{ $errors->first('parent_phone') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('parent_dni')) is-invalid @endif"
                           name="parent_dni" id="parent_dni" value="{{ old('parent_dni') }}"
                           placeholder="DNI">
                    @if ($errors->has('parent_dni'))
                        <div class="invalid-feedback">{{ $errors->first('parent_dni') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('parent_email')) is-invalid @endif"
                           name="parent_email" id="parent_email" value="{{ old('parent_email') }}"
                           placeholder="Correo Electronico">
                    @if ($errors->has('parent_email'))
                        <div class="invalid-feedback">{{ $errors->first('parent_email') }}</div>
                    @endif
                </div>
                <div class="form-group">
                    <input type="text" class="form-control @if ($errors->has('parent_address')) is-invalid @endif"
                           name="parent_address" id="parent_address" value="{{ old('parent_address') }}"
                           placeholder="Direccion del hogar">
                    @if ($errors->has('parent_address'))
                        <div class="invalid-feedback">{{ $errors->first('parent_address') }}</div>
                    @endif
                </div>
                <h3>Seleccionar aula</h3>
                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="nivel">Nivel</label>
                        <select class="form-control" name="nivel" id="nivel">
                            @foreach ($nivel as $nv)
                                <option value="{{$nv->id}}">{{$nv->name}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="grado">Grado</label>
                        <select class="form-control" name="grado" id="grado">
                            {{--@foreach ($grado as $gr)--}}
                                {{--<option value="{{$gr->id}}">{{$gr->name}}</option>--}}
                            {{--@endforeach--}}
                        </select>
                    </div>

                    <div class="form-group col-md-6">
                        <label for="seccion">Seccion</label>
                        <select class="form-control" name="seccion" id="seccion">

                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success btn-lg btn-block">Guardar</button>
            </div>
        </div>
    </form>

@endsection
@section('script')
    <script src="{{asset('js/combos.js')}}"></script>
    <script>
        var secciones = @json($seccion);
        var grados = @json($grado);

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