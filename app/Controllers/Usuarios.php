<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Usuarios_Model;

class Usuarios extends BaseController
{

    public function __construct()
    {
        // Carrega Model/Conexão com BD
        $this->users = new Usuarios_Model();
        $this->request = \Config\Services::request();
    }

    public function index()
    {
        return view('usuario/usuario_lista');
    }


    public function listaUser()
    {
        $inicio  = $this->request->getPost('start');
        $total  = $this->request->getPost('length');
        $colunas = $this->request->getPost('columns'); // pega as colunas da tabela
        $order   = $this->request->getPost('order'); // pega qual campo vai ser ordenado
        $campo   = $colunas[$order[0]['column']]['data']; // pega o nome do campo que sera ordenado
        $ordern   = $order[0]['dir']; // diz se é ASC ou DESC
       
        // Lista os usuários
        $dados = $this->users->listar($inicio, $total, $campo, $ordern);
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
