<?php
/**
 * Created by PhpStorm.
 * User: JUANCARLOS
 * Date: 04/03/2018
 * Time: 03:18 PM
 */

namespace App\Http\Repositories;


use App\Http\Contracts\Iseccion;

class SeccionRepository implements Iseccion
{
    protected $seccionModel;

    public function __construct($seccionModel)
    {
        $this->seccionModel = $seccionModel;
    }

    public function getSecciones()
    {
        return $this->seccionModel->select('id','name','grado_id')->get();

    }
}