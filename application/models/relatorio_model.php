<?php

class Relatorio_model extends CI_Model {

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
       if($where){
            $this->db->where($where);
        }
        return $this->db->get($table)->row();
    }

    
}
