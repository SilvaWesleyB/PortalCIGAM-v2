<?php

namespace App\Models;

use CodeIgniter\Model;

class Chamados_Model extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'tickets';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [];
}
