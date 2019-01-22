<?php

class Dashboard_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

    function count($table, $where = '') {
        $this->db->select('*');
        $this->db->from($table);
        if ($where) {
            $this->db->where($where);
        }

        return $this->db->count_all_results();
    }

    function count_fechado($table, $where = '') {
        $this->db->select('*');
        $this->db->from('crm');
        
        if($where){
        $where1= "usuario=$where[usuario] AND (status='6' OR status='7' OR status='8')";
        $this->db->where($where1);
        }
        else{
        $where1= "status='6' OR status='7' OR status='8'";
        $this->db->where($where1);
        }

        return $this->db->count_all_results();
    }

    function count_impressao($table, $numproposta) {
        $this->db->select('*');
        $this->db->from($table);
        $this->db->where('numpropostas', $numproposta);
        return $this->db->count_all_results();
    }

}
