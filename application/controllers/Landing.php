<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Landing extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Landing_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function storepet() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {
                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);
                    echo $spam;

                    redirect("http://www.wbagestao.com.br/");
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

    public function storefood() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {

                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);
                    redirect("http://www.wbagestao.com.br/");
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

    public function storeware() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {
                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);
                    redirect("http://www.wbagestao.com.br/");
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

    public function ebook10dicas() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {

                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);

                    $this->load->view('landing/teste');
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }
    
    public function websummit() {
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[1]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = "Não informado";
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = "Não informado";
            $dados['whatsapp'] = "Não informado";
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = "Não informado";
            $dados['endereco'] = "Não informado";
            $dados['bairro'] = "Não informado";
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = 1;
            $dados['probabilidade'] = 20;
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = "Não informado";
            $dados['seguimento'] = 15;
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = 2;
            $dados['usuario'] = 0;
            $dados['atribuido'] = 0;
            $spam = $this->input->post('spam');

            if ($spam != '') {
                redirect("http://www.wbagestao.com.br/");
            } else {

                $idLead = $this->Landing_model->add('crm', $dados);
                if ($idLead != 0) {
                    $data = $this->telegram_lib->sendmsg("Você recebeu uma nova mensagem pelo site.\n\n Cliente: " . $dados['nome'] . "\n Telefone: " . $dados['telefone'] . "\n E-mail: " . $dados['email'] . "\n Cidade: " . $dados['cidade']);

                    date_default_timezone_set('America/Sao_Paulo');
                    $descricao = "Recebido pelo site: " . $this->input->post('mensagem');
                    $nome = "Site";
                    $timeline = array(
                        'idcrm' => $idLead,
                        'descricao' => $descricao,
                        'nome' => $nome,
                        'data' => date('d-m-Y H:i')
                    );
                    $this->load->model('crm_model');
                    $this->crm_model->add('timeline_crm', $timeline);
                    redirect("http://wbagestao.com/download-storepet/");
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }
        $this->load->view('landing/adicionarLanding', $data);
    }

}
