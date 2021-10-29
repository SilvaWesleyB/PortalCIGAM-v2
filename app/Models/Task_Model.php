<?php

namespace App\Models;

use CodeIgniter\Model;

class Task_Model extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'kanbantask';
    protected $primaryKey           = 'id';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [];

    public function listar()
    {
       $query = $this->select();

       $data = $query->findAll();

       return $data;
    }

    public function editar($id)
    {
        # code...
    }

    public function atualizar($id)
    {
        # code...
    }

    public function deletar($id)
    {
        # code...
    }
}
