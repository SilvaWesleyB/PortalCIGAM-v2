<?php

namespace App\Models;

use CodeIgniter\Model;

class Chamados_Model extends Model
{
    protected $DBGroup              = 'default';
    protected $table                = 'GMITEMOS I (nolock)';
    protected $useAutoIncrement     = true;
    protected $returnType           = 'array';
    protected $useSoftDeletes       = false;
    protected $protectFields        = true;
    protected $allowedFields        = [];

    public function listar($inicio, $total, $buscar, $campo, $ordern)
    {
        $condicao =/* $condicao_filtro = '';
        $condicao_filtro = !empty($buscar) ? " AND (UC.Cd_usuario LIKE '%" . $buscar . "%'
                                            OR UC.Usuario LIKE '%" . $buscar . "%'
                                            OR UC.Nome LIKE '%" . $buscar . "%'
                                            OR UN.Fantasia LIKE '%" . $buscar . "%')" : */"";

        // Select a ser realizado
        $select = "top 5 ISNULL(round(l.campo45,2),0) tempo_resposta,isnull(round(l.campo46,2),0) tempo_solucao,isnull(round(l.campo47,2),0) sla,isnull(tempo_resposta,0)+isnull(tempo_solucao,0) legenda_sla,i.dt_item_os dt_item_os2, ( i.dt_item_os ) dt_item_os, o.cd_numero_os,o.cd_cliente,cl.nome_completo nome_completo_cliente,substring (
            CASE rtrim(cl.fantasia)
            WHEN '' THEN
              cl.nome_completo
            ELSE
              cl.fantasia
            END,1,10) fantasia_cliente, cl.fantasia fantasia_cliente2,o.dt_os,(
            CASE o.situacao
            WHEN 'P' THEN
              'PENDENTE'
            WHEN 'A' THEN
              'ATIVA'
            WHEN 'E' THEN
              'ENCERRADO'
            WHEN 'F' THEN
              'FATURADO'
            ELSE
              ''
            END) situacao_os,o.requisicao,i.item,i.cd_produto,CONVERT (varchar (8),i.dt_prazo_progra,03) dt_prazo_progra,i.dt_prazo_progra dt_prazo_progra2,rtrim(i.tipo_os) tipo_os,substring (t.descricao,1,10) descricao_tipo_os,i.os_fabricada os_terceiro,rtrim(cast(i.cd_numero_os AS varchar (6)))+'.'+rtrim(cast(i.item AS varchar (6))) os_item,(
            CASE i.situacao
            WHEN 'P' THEN
              'PENDENTE'
            WHEN 'A' THEN
              'AGUARDANDO'
            WHEN 'E' THEN
              'ENCERRADO'
            WHEN 'F' THEN
              'FATURADO'
            WHEN 'C' THEN
              'CANCELADO'
            WHEN 'I' THEN
              'INICIADO'
            WHEN 'L' THEN
              'LIBERADO'
            WHEN 'N' THEN
              'NEGADO'
            WHEN 'R' THEN
              'RECUSADO'
            ELSE
              ''
            END) situacao_item,i.prioridade,i.dt_conclusao,i.requisicao requisicao_item,i.seq_contato,i.contato,substring (e.descricao,1,10) descricao_equipe,rtrim(i.campo54) assunto,i.cd_uni_de_neg cd_unidade_de_n,(
            CASE
            WHEN rtrim(ltrim(i.campo54))='' THEN
              substring(rtrim(i.descricao_recla),1,45)+'...'
            ELSE
              rtrim(ltrim(i.campo54))
            END) COLLATE greek_ci_as descricao_recla,substring (m.descricao,1,10) descricao_produto,
            (
                     SELECT   TOP 1 rtrim(a.situacao)
                     FROM     gmativid a WITH (nolock)
                     WHERE    a.cd_numero_os=i.cd_numero_os
                     AND      a.item=i.item
                     ORDER BY a.cd_etapa_ativid DESC) situacao_ativ,
            (
                     SELECT   TOP 1 (
                              CASE
                                       WHEN a.horario_inicio_ <> '' THEN substring(a.horario_inicio_, 1, 2) + ':' + substring(a.horario_inicio_, 3, 2)
                                       ELSE ''
                              END) horario_inicio_
                     FROM     gmativid a WITH (nolock)
                     WHERE    a.cd_numero_os=i.cd_numero_os
                     AND      a.item=i.item
                     ORDER BY a.cd_etapa_ativid DESC) horario_inicio_,
            (
                     SELECT   TOP 1 substring(tec.fantasia,1,10)
                     FROM     gmativid a WITH (nolock),
                              geempres tec WITH (nolock)
                     WHERE    a.cd_tecnico=tec.cd_empresa
                     AND      a.cd_numero_os=i.cd_numero_os
                     AND      a.item=i.item
                     ORDER BY a.cd_etapa_ativid DESC) fantasia_tecnico,
            (
                     SELECT   TOP 1 rtrim(a.cd_tecnico)
                     FROM     gmativid a WITH (nolock)
                     WHERE    a.cd_numero_os=i.cd_numero_os
                     AND      a.item=i.item
                     ORDER BY a.cd_etapa_ativid DESC) cd_tecnico,i.situacao,
            (
                     SELECT   TOP 1 CONVERT (varchar (8),a.dt_inicio_previ,03)
                     FROM     gmativid a WITH (nolock)
                     WHERE    a.cd_numero_os=i.cd_numero_os
                     AND      a.item=i.item
                     ORDER BY a.cd_etapa_ativid DESC) dt_inicio_previ,
            (
                     SELECT   TOP 1 a.dt_inicio_previ
                     FROM     gmativid a WITH (nolock)
                     WHERE    a.cd_numero_os=i.cd_numero_os
                     AND      a.item=i.item
                     ORDER BY a.cd_etapa_ativid DESC) dt_inicio_previ2,rtrim(tos.envia_email) libera_orcamento,
            (
                     SELECT   TOP 1 CONVERT (varchar (8),a.dt_termino,03) dt_termino
                     FROM     gmativid a WITH (nolock)
                     WHERE    a.cd_numero_os = i.cd_numero_os
                     ORDER BY a.item DESC,
                              a.cd_etapa_ativid DESC) dt_termino,
            (
                     SELECT   TOP 1 stuff(stuff(a.hora_termino,5,0,':'),3,0,':') hora_termino
                     FROM     gmativid a (nolock)
                     WHERE    a.cd_numero_os = i.cd_numero_os
                     ORDER BY a.item DESC,
                              a.cd_etapa_ativid DESC) hora_termino,
            (
                   SELECT nome_completo
                   FROM   geempres dd WITH (nolock)
                   WHERE  dd.cd_empresa =
                          (
                                   SELECT   TOP 1 depositario
                                   FROM     gmprxcon pc WITH (nolock)
                                   WHERE    pc.cd_produto = p.cd_produto
                                   ORDER BY id DESC)) desc_depositario, un.fantasia desc_unidade_de_n,
            CASE i.orcamento
            WHEN 'C' THEN
              'CONCLUÍDO'
            WHEN 'N' THEN
              'NÃO'
            WHEN 'A' THEN
              'ACEITO'
            WHEN 'P' THEN
              'PENDENTE'
            WHEN 'R' THEN
              'RECUSADO'
            ELSE
              ''
            END orcamento, l.ordem,
            (
                   SELECT count(*)
                   FROM   gmpecaos p
                   WHERE  p.cd_numero_os = i.cd_numero_os
                   AND    p.item = i.item) qtd_materiais";


        $sql = $this->select($select)
            ->join('GMOSERVI O (nolock)', 'N I.Cd_numero_os = O.Cd_numero_os', 'left')
            ->join('GMPRODUT P (nolock)', 'P.Cd_produto = I.Cd_produto', 'left')
            ->join('ESMATERI M (nolock)', 'M.Cd_material = P.Cd_estoque', 'left')
            ->join('GMTIPOOS T (nolock)', 'T.Tipo_os = I.Tipo_os', 'left')
            ->join('GEEMPRES CL (nolock)', 'CL.Cd_empresa = O.Cd_cliente', 'left')
            ->join('GMEQUIPE E (nolock)', 'E.Cd_etapa_projet = I.Cd_etapa_projet', 'left')
            ->join('GMCTLSLA L (nolock)', 'I.Cd_numero_os = L.Os AND I.Item = L.Item AND L.Id = (SELECT TOP 1 Id FROM GMCTLSLA C WITH (nolock) WHERE C.Os = I.Cd_numero_os AND C.Item = I.Item)', 'left')
            ->join('GMTIPOOS TOS (nolock)', 'I.Tipo_os = TOS.Tipo_os', 'left')
            ->join('GEUNIDNE UN (nolock)', 'UN.Cd_unidade_de_n = I.Cd_uni_de_neg', 'left')
            ->where('1=1 ' . $condicao)
            ->get();


        $data['recordsTotal'] = $sql->getNumRows();
        $data['recordsFiltered'] = $sql->getNumRows();
        $total = ($total == -1) ? $sql : $total;

        // Recebe dados do BD
        $query = $this->select($select)
            ->join('GMOSERVI O (nolock)', 'N I.Cd_numero_os = O.Cd_numero_os', 'left')
            ->join('GMPRODUT P (nolock)', 'P.Cd_produto = I.Cd_produto', 'left')
            ->join('ESMATERI M (nolock)', 'M.Cd_material = P.Cd_estoque', 'left')
            ->join('GMTIPOOS T (nolock)', 'T.Tipo_os = I.Tipo_os', 'left')
            ->join('GEEMPRES CL (nolock)', 'CL.Cd_empresa = O.Cd_cliente', 'left')
            ->join('GMEQUIPE E (nolock)', 'E.Cd_etapa_projet = I.Cd_etapa_projet', 'left')
            ->join('GMCTLSLA L (nolock)', 'I.Cd_numero_os = L.Os AND I.Item = L.Item AND L.Id = (SELECT TOP 1 Id FROM GMCTLSLA C WITH (nolock) WHERE C.Os = I.Cd_numero_os AND C.Item = I.Item)', 'left')
            ->join('GMTIPOOS TOS (nolock)', 'I.Tipo_os = TOS.Tipo_os', 'left')
            ->join('GEUNIDNE UN (nolock)', 'UN.Cd_unidade_de_n = I.Cd_uni_de_neg', 'left')
            ->where('1=1 ' . $condicao)
            /*->where('1=1' . $condicao_filtro)*/
            ->limit($total, $inicio)
            ->orderBy($campo, $ordern)
            ->get();

        $data['data'] = $query->getResultArray();


        if (!empty($buscar)) {
            // Recebe dados do BD
            $nquery = $this->select($select)
                ->join('GMOSERVI O (nolock)', 'N I.Cd_numero_os = O.Cd_numero_os', 'left')
                ->join('GMPRODUT P (nolock)', 'P.Cd_produto = I.Cd_produto', 'left')
                ->join('ESMATERI M (nolock)', 'M.Cd_material = P.Cd_estoque', 'left')
                ->join('GMTIPOOS T (nolock)', 'T.Tipo_os = I.Tipo_os', 'left')
                ->join('GEEMPRES CL (nolock)', 'CL.Cd_empresa = O.Cd_cliente', 'left')
                ->join('GMEQUIPE E (nolock)', 'E.Cd_etapa_projet = I.Cd_etapa_projet', 'left')
                ->join('GMCTLSLA L (nolock)', 'I.Cd_numero_os = L.Os AND I.Item = L.Item AND L.Id = (SELECT TOP 1 Id FROM GMCTLSLA C WITH (nolock) WHERE C.Os = I.Cd_numero_os AND C.Item = I.Item)', 'left')
                ->join('GMTIPOOS TOS (nolock)', 'I.Tipo_os = TOS.Tipo_os', 'left')
                ->join('GEUNIDNE UN (nolock)', 'UN.Cd_unidade_de_n = I.Cd_uni_de_neg', 'left')
                ->where('1=1 ' . $condicao)
               /* ->where('1=1' . $condicao_filtro)*/
                ->limit($data['recordsFiltered'], $inicio)
                ->orderBy($campo, $ordern)
                ->get();

            $data['recordsFiltered'] = $nquery->getNumRows();
        }

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
