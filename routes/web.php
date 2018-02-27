<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*
Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', 'LogController@index')->middleware('guest');
Route::get('/home', 'HomeController@index')->name('home');
Route::view('/login', 'auth.login')->middleware('guest');
Route::post('/login', 'LogController@login')->name('login');
Route::post('/logout', 'LogController@logout')->name('logout');

Route::get('/alumnos/nuevo', 'AlumnoController@create')->name('alumnos.create');
Route::get('/alumnos/search', 'AlumnoController@AlumnoSearch')->name('alumnos.search');
Route::get('/alumnos', 'AlumnoController@index')->name('alumnos.index');
Route::post('/alumnos', 'AlumnoController@store');

Route::get('/asistencia/reporte', 'AsistenciaController@reporte')->name('asistencias.reporte');
Route::get('/asistencia/search', 'AsistenciaController@search')->name('asistencias.search');
Route::get('/asistencia', 'AsistenciaController@index')->name('asistencias.index');
Route::post('/asistencia', 'AsistenciaController@store');



