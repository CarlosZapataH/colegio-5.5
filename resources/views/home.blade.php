@extends('layout')

@section('title', "Crear Alumno")

@section('content')
    <div class="text-center">
        <h1 class="display-2">Welcome {{auth()->user()->name}}!</h1>
    </div>

@endsection