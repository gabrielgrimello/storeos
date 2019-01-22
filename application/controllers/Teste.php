<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        
        $this->load->model('teste_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {

       $this->data['formErrors'] = validation_errors();
        
        $this->data['dadoslogin'] = $this->session->all_userdata();

        $this->load->view('teste/teste2', $this->data);
    }

    

}
