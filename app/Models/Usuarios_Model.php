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


    public function listar($inicio, $total, $campo,$ordern)
    {
        // Select a ser realizado
        $select = "RTRIM(UC.Cd_usuario) Cd_usuario,
                RTRIM(UC.Usuario) Usuario,
                RTRIM(UC.Nome) Nome,
                RTRIM(UC.Campo20) Empresa,
                RTRIM(E.Fantasia) Fantasia,
                RTRIM(CO.Pessoa_contato) Contato,
                RTRIM(UC.Campo23) Email,
                RTRIM(UN.Fantasia) Unid_neg,
                (CASE UC.Campo9 WHEN '' THEN 'DESKTOP' WHEN 'N' THEN 'NENHUM' WHEN 'W' THEN 'WEB' WHEN 'A' THEN 'AMBOS' ELSE '' END ) Acesso";

        $condicao = '';

        $sql = $this->select($select)
            ->join('GEUSUARI UC', 'U.Cd_usuario = UC.Cd_usuario', 'left')
            ->join('GEEMPRES E', 'UC.Campo20 = E.Cd_empresa', 'left')
            ->join('GEUNIDNE UN', 'UN.Cd_unidade_de_n = U.Cd_unidade_n', 'left')
            ->join('VECEMPRE CO', 'CO.Cd_empresa = UC.Campo20 AND CO.Sequencia_conta = U.Contato', 'left')
            ->where("UC.Usuario <> '' AND UC.Cd_usuario <> '#CG' " . $condicao)
            ->countAllResults();

        $data['recordsTotal'] = $sql;
        $data['recordsFiltered'] = $sql;
        $total = ($total == -1) ? $sql : $total;

        // Recebe dados do BD
        $query = $this->select($select)
            ->join('GEUSUARI UC', 'U.Cd_usuario = UC.Cd_usuario', 'left')
            ->join('GEEMPRES E', 'UC.Campo20 = E.Cd_empresa', 'left')
            ->join('GEUNIDNE UN', 'UN.Cd_unidade_de_n = U.Cd_unidade_n', 'left')
            ->join('VECEMPRE CO', 'CO.Cd_empresa = UC.Campo20 AND CO.Sequencia_conta = U.Contato', 'left')
            ->where("UC.Usuario <> '' AND UC.Cd_usuario <> '#CG' " . $condicao)
            ->limit($total, $inicio)
            ->orderBy($campo,$ordern);

        $data['data'] = $query->find();

        // Envia dados
        return $data;
    }

    public function inserir($total)
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
