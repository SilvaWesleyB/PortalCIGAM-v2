<?php

namespace App\Models;

use CodeIgniter\Model;

class Usuarios_Model extends Model
{
    protected $table                = 'TEUSER U';
    protected $useAutoIncrement     = true;
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [];


    public function listar()
    {
        // Select a ser realizado
        $select = "RTRIM( UC.Cd_usuario ) Cd_usuario,
                RTRIM( UC.Usuario ) Usuario,
                RTRIM( UC.Nome ) Nome,
                RTRIM( UC.Campo20 ) Empresa,
                RTRIM( E.Fantasia ) Fantasia,
                RTRIM( CO.Pessoa_contato ) Contato,
                RTRIM( UC.Campo23 ) Email,
                RTRIM( UN.Fantasia ) Unid_neg,
                CONVERT ( VARCHAR ( 8 ), UC.Campo15, 03 ) VencSenha,
                ( CASE UC.Campo9 WHEN '' THEN 'DESKTOP' WHEN 'N' THEN 'NENHUM' WHEN 'W' THEN 'WEB' WHEN 'A' THEN 'AMBOS' ELSE '' END ) Acesso";

                
        // Recebe dados do BD
        $query = $this->select($select)
            ->join('GEUSUARI UC', 'U.Cd_usuario = UC.Cd_usuario', 'left')
            ->join('GEEMPRES E', 'UC.Campo20 = E.Cd_empresa', 'left')
            ->join('GEUNIDNE UN', 'UN.Cd_unidade_de_n = U.Cd_unidade_n', 'left')
            ->join('VECEMPRE CO', 'CO.Cd_empresa = UC.Campo20 AND CO.Sequencia_conta = U.Contato', 'left')
            ->orderBy('UC.Cd_usuario', 'ASC');

        $data = $query->findAll();

        // Envia dados
        return $data;
    }

    public function inserir()
    {
        return;
    }

    public function deletar()
    {
        return;
    }

    public function atualizar()
    {
        return;
    }
}
