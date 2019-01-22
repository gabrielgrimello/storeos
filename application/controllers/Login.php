<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('login_model');
        date_default_timezone_set('America/Sao_Paulo');
    }

    public function index() {
        $data['formErrors'] = null;
        $this->load->view('login/login', $data);
    }

    public function login() {
        $this->form_validation->set_rules('email', 'E-mail', 'required|trim|valid_email');
        $this->form_validation->set_rules('senha', 'Senha', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['email'] = $this->input->post('email');
            $dados['senha'] = $this->input->post('senha');
            $dados['senha'] = md5($dados['senha']);
            $existe = $this->login_model->exist($dados['email'], $dados['senha']); // acessa a função buscaPorEmailSenha do modelo

            if ($existe) {
                $this->session->set_userdata("logado", "logado");
                $this->session->set_userdata($existe);
                redirect(base_url() . 'index.php/dashboard');
            } else {
                $data['formErrors'] = "E-mail ou senha inválido(s)";
            }
        }

        $this->load->view('login/login', $data);
    }
    
    public function sair(){
        $this->session->sess_destroy();
        redirect(base_url() . 'index.php/login');
    }

}
