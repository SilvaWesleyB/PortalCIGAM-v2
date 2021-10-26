<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios_Model;

class Usuarios extends BaseController
{
    public function listaUser()
    {
        // Carrega Model/Conexão com BD
        $users = new Usuarios_Model();

        // Lista os usuários
        $dados = $users->listar();

        // Envia em forma de json
        echo json_encode($dados);
    }

    public function insertUser()
    {
        return;
    }

    public function deleteUser()
    {
        return;
    }

    public function updateUser()
    {
        return;
    }
}