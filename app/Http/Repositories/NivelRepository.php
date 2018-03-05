<?php

namespace App\Http\Repositories;

use App\Http\Contracts\INivel;

class NivelRepository implements INivel
{
    protected $nivelModel;

    public function __construct($NivelModel)
    {
        $this->nivelModel = $NivelModel;
    }

    public function getNiveles()
    {
        return $this->nivelModel->get();
    }
}