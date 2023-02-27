<?php

class Mensageria_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 13/04/2020
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

    function getOsEnviarEmail($fields,$table, $where) {
        $this->db->select($fields);
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get()->result();
    }

    function get($table, $where) {
        $this->db->from($table);
        $this->db->where($where);

        return $this->db->get()->row();
    }

    function delete($table, $fieldID, $ID) {
        $this->db->where($fieldID, $ID);
        $this->db->delete($table);
        if ($this->db->affected_rows() == '1') {
            return TRUE;
        }

        return FALSE;
    }

}
