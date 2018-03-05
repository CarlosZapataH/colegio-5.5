<?php

namespace App\Http\Contracts;

/**
 * Created by PhpStorm.
 * User: JUANCARLOS
 * Date: 04/03/2018
 * Time: 12:06 PM
 */
interface IAsistencia
{
    public function storeAsintencia($alumnos);

    public function searchAsistencia($data);
}