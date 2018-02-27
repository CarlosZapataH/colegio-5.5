@extends('layout')

@section('title', "Lista Alumno")

@section('content')
    <h1>Lista de Alumnos</h1>
    @empty($alumnos)
        <p>No hay alumnos.</p>
    @else
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Nombres</th>
                <th scope="col">Dni</th>
                <th scope="col">Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($alumnos as $alumno)
                <tr>
                    <td>{{$alumno->fullname}}</td>
                    <td>{{$alumno->dni}}</td>
                    <td>
                        <span>Null</span>
                        {{--<a class="btn btn-outline-primary" href="{{route('users.show',['id'=>$user->id])}}"--}}
                        {{--role="button"><span class="oi oi-eye"></span></a>--}}
                        {{--<a class="btn btn-outline-warning" href="{{route('users.edit',['id'=>$user->id])}}"--}}
                        {{--role="button"><span class="oi oi-pencil"></span></a>--}}
                        {{--<form action="{{ route('users.destroy', $user) }}" method="POST">--}}
                        {{--{{ csrf_field() }}--}}
                        {{--{{ method_field('DELETE') }}--}}
                        {{--<button type="submit" class="btn btn-outline-danger"><span class="oi oi-trash"></span></button>--}}
                        {{--</form>--}}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>

        {{$alumnos->render("pagination::bootstrap-4")}}
    @endempty

@endsection



