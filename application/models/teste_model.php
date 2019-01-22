<?php

class Teste_model extends CI_Model {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
    }

      function teste() {
      $DB2 = $this->load->database('wba_db', TRUE);
      $DB2->select('*');
      $DB2->from('sigcad');
      $query = $DB2->get()->row();

      return $query;
      }

      function crm_count() {
      $DB2 = $this->load->database('crm_db', TRUE);
      $DB2->select('*');
      $DB2->from('accounts');

      $query = $DB2->count_all_results();

      return $query;
      }
     

    
}
