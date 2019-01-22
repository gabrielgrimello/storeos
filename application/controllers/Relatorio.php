<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Relatorio extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $this->load->model('relatorio_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {

        $where_array = array();
        $where_array['data_alteracao'] = '2018-10-20';
        $this->data['data'] = $this->relatorio_model->count('crm', $where_array);

        
        $this->load->view('relatorio/relatorio', $this->data);
    }

   

}
