<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Task_Model;

class Kanban extends BaseController
{
    public function __construct()
    {
        $this->task = new Task_Model();
    }

    public function listarTask()
    {
       // Lista as Task
       $dados['task'] = $this->task->listar();

       return view('kanban/kanban',$dados);
    }
}
