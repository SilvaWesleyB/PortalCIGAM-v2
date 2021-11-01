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
        return view('helpdesk/chamados');
        $this->request = \Config\Services::request();
    }

    public function listaChamados()
    {
        $inicio  = $this->request->getPost('start');
        $total  = $this->request->getPost('length');
        $buscar  = $this->request->getPost('search');
        $colunas = $this->request->getPost('columns'); // pega as colunas da tabela
        $order   = $this->request->getPost('order'); // pega qual campo vai ser ordenado
        $campo   = $colunas[$order[0]['column']]['data']; // pega o nome do campo que sera ordenado
        $ordern   = $order[0]['dir']; // diz se é ASC ou DESC

        // Lista os usuários
        $dados = $this->chamados->listar($inicio, $total, $buscar['value'], $campo, $ordern);
        dd($dados);
        // Envia em forma de json
        //echo json_encode($dados);
    }

    public function insertChamados()
    {
        return;
    }

    public function deleteChamados()
    {
        return;
    }

    public function updateChamados()
    {
        return;
    }
}
