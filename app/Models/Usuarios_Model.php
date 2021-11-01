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


    public function listar($inicio, $total, $buscar, $campo, $ordern)
    {
        $condicao = $condicao_filtro = '';
        $condicao_filtro = !empty($buscar) ? " AND (UC.Cd_usuario LIKE '%" . $buscar . "%'
                                            OR UC.Usuario LIKE '%" . $buscar . "%'
                                            OR UC.Nome LIKE '%" . $buscar . "%'
                                            OR UN.Fantasia LIKE '%" . $buscar . "%')" : "";

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



        $sql = $this->select($select)
            ->join('GEUSUARI UC', 'U.Cd_usuario = UC.Cd_usuario', 'left')
            ->join('GEEMPRES E', 'UC.Campo20 = E.Cd_empresa', 'left')
            ->join('GEUNIDNE UN', 'UN.Cd_unidade_de_n = U.Cd_unidade_n', 'left')
            ->join('VECEMPRE CO', 'CO.Cd_empresa = UC.Campo20 AND CO.Sequencia_conta = U.Contato', 'left')
            ->where("UC.Usuario <> '' AND UC.Cd_usuario <> '#CG' " . $condicao)
            ->get();

        $data['recordsTotal'] = $sql->getNumRows();
        $data['recordsFiltered'] = $sql->getNumRows();
        $total = ($total == -1) ? $sql : $total;

        // Recebe dados do BD
        $query = $this->select($select)
            ->join('GEUSUARI UC', 'U.Cd_usuario = UC.Cd_usuario', 'left')
            ->join('GEEMPRES E', 'UC.Campo20 = E.Cd_empresa', 'left')
            ->join('GEUNIDNE UN', 'UN.Cd_unidade_de_n = U.Cd_unidade_n', 'left')
            ->join('VECEMPRE CO', 'CO.Cd_empresa = UC.Campo20 AND CO.Sequencia_conta = U.Contato', 'left')
            ->where("UC.Usuario <> '' AND UC.Cd_usuario <> '#CG' " . $condicao)
            ->where('1=1' . $condicao_filtro)
            ->limit($total, $inicio)
            ->orderBy($campo, $ordern)
            ->get();

        $data['data'] = $query->getResultArray();


        if (!empty($buscar)) {
            // Recebe dados do BD
            $nquery = $this->select($select)
                ->join('GEUSUARI UC', 'U.Cd_usuario = UC.Cd_usuario', 'left')
                ->join('GEEMPRES E', 'UC.Campo20 = E.Cd_empresa', 'left')
                ->join('GEUNIDNE UN', 'UN.Cd_unidade_de_n = U.Cd_unidade_n', 'left')
                ->join('VECEMPRE CO', 'CO.Cd_empresa = UC.Campo20 AND CO.Sequencia_conta = U.Contato', 'left')
                ->where("UC.Usuario <> '' AND UC.Cd_usuario <> '#CG' " . $condicao)
                ->where('1=1' . $condicao_filtro)
                ->limit($data['recordsFiltered'], $inicio)
                ->orderBy($campo, $ordern)
                ->get();

            $data['recordsFiltered'] = $nquery->getNumRows();
        }

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
