<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Chamados_Model;

class Chamados extends BaseController
{
    public function __construct()
    {
        $this->chamados = new Chamados_Model();
    }

    public function index()
    {
        //
    }
}
