<?php

class OS_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function add($table, $dados) {

        $this->db->insert($table, $dados);
        if ($this->db->affected_rows() == '1') {
            return $this->db->insert_id();
        }

        return FALSE;
    }

    function edit($table, $data, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->update($table, $data);

        if ($this->db->affected_rows() >= 0) {
            return TRUE;
        }

        return FALSE;
    }

    function get($table, $fields, $where = '', $perpage = 0, $start = 0, $one = false, $campoOrdem, $tipoOrdem, $whereRazaoOuFantasia) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->order_by($campoOrdem, $tipoOrdem);
        $this->db->limit($perpage, $start);
        if ($where) {
            $this->db->where($where);
        }
        if ($whereRazaoOuFantasia) {
            $this->db->like($whereRazaoOuFantasia);
        }

        $query = $this->db->get();

        $result = !$one ? $query->result() : $query->row();
        return $result;
    }

    function getEquipamentoByNs($ns) {
        $this->db->select('*');
        $this->db->from('equipamentos_cliente');
        $this->db->where('serie', $ns);
        $this->db->limit(1);
        if ($ns == "nao"){
            return FALSE;
        }
        return $this->db->get()->row();
    }

    function getEquipamentoById($id) {
        $this->db->select('*');
        $this->db->from('equipamentos_cliente');
        $this->db->where('idEquipamento', $id);
        $this->db->limit(1);
        return $this->db->get()->row();
    }

    function count($table) {
        $this->db->select('*');
        $this->db->from($table);
        return $this->db->count_all_results();
    }

    function countChecklist($table, $whereOS) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where($whereOS);
        return $this->db->count_all_results();
    }

    function countGerenciar($table, $where, $whereRazaoOuFantasia) {
        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }
        if ($whereRazaoOuFantasia) {
            $this->db->where($whereRazaoOuFantasia);
        }
        return $this->db->count_all_results();
    }

    function count_impressao($table, $numproposta) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('numpropostas', $numproposta);
        return $this->db->count_all_results();
    }

    public function getEquipamentosCliente($id = null) {
        $this->db->select('*');
        $this->db->from('equipamentos_cliente');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('codigoCliente', $id);
        return $this->db->get()->result();
    }

    public function getOS($id = null) {
        $this->db->select('*');
        $this->db->from('ordem_servico');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('idOS', $id);
        return $this->db->get()->row();
    }

    function getConfig($table, $fields) {

        $this->db->select($fields);
        $this->db->from($table);
        return $this->db->get()->result();
    }

    function getChecklistEquipamento($table, $fields, $where) {

        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where('idOS', $where);
        return $this->db->get()->result();
    }

    function getByIdChecklistNobreakEstabilizador($id) {
        $this->db->where('idCheckNobEst', $id);
        $this->db->limit(1);
        return $this->db->get('checklist_nobreakestabilizador')->row();
    }
    
    function getByIdChecklistComputador($id) {
        $this->db->where('idCheckComputador', $id);
        $this->db->limit(1);
        return $this->db->get('checklist_computador')->row();
    }

    function getStatusEncerrado() {

        $this->db->select('*');
        $this->db->from('status_os');
        $this->db->where('encerra', 1);
        return $this->db->get()->result();
    }

    function getStatusAberto() {

        $this->db->select('*');
        $this->db->from('status_os');
        $this->db->order_by('posicaoMenu', 'ASC');
        $this->db->where('encerra', 0);
        return $this->db->get()->result();
    }

    function getByIdStatus($id) {
        $this->db->where('idStatus', $id);
        $this->db->limit(1);
        return $this->db->get('status_os')->row();
    }

    function getByIdTipo($id) {
        $this->db->where('idTipo', $id);
        $this->db->limit(1);
        return $this->db->get('tipo_equipamento')->row();
    }

    public function getPecas($id = null) {

        $this->db->select('*');
        $this->db->from('produtos_os');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('idOS', $id);
        return $this->db->get()->result();
    }

    public function getServicos($id = null) {

        $this->db->select('*');
        $this->db->from('servicos_os');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('idOS', $id);
        return $this->db->get()->result();
    }

    public function getModulos($id = null) {

        $this->db->select('*');
        $this->db->from('modulos_proposta');
        //$this->db->join('produtos','produtos.idProdutos = produtos_os.produtos_id');
        $this->db->where('numpropostas', $id);
        return $this->db->get()->result();
    }

    function delete($table, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

    public function getTimeline($id = null) {

        $this->db->select('*');
        $this->db->from('timeline_os');
        $this->db->where('idos', $id);
        $this->db->order_by('idTimeline_os', 'desc');
        return $this->db->get()->result();
    }

}
