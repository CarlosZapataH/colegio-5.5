<?php
/**
 * Created by PhpStorm.
 * User: JUANCARLOS
 * Date: 04/03/2018
 * Time: 02:25 PM
 */

namespace App\Http\Repositories;

use App\Http\Contracts\IGrado;

class GradoRepository implements IGrado
{
    protected $gradoModel;

    public function __construct($gradoModel)
    {
        $this->gradoModel = $gradoModel;
    }

    public function getGrados()
    {
        return $this->gradoModel->select('id','name','nivel_id')->get();
    }
}