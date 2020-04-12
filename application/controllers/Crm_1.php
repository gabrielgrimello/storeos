<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Crm extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }

        $this->load->model('crm_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {

        $dadoslogin = $this->session->all_userdata();

        //conta total de propostas do usuário
        $this->data['dados_crm'] = $this->crm_model->crm();
        $this->data['crm_count'] = $this->crm_model->crm_count();

        $this->load->view('crm/crm', $this->data);
    }

    public function gerenciar() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mCrm')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->load->library('table');
        $this->load->library('pagination');


        $where_array = array();

        $config['base_url'] = base_url() . 'index.php/crm/gerenciar';
        $config['total_rows'] = $this->crm_model->count('crm');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);
         
        
//       ESTAS VARIAVEIS SERVEM PARA MANTER O CAMPO SELECIONADO DEPOIS DA PESQUISA 
        $this->data['statuspost'] = 0;
        $this->data['vendedorpost'] = 0;
        $this->data['seguimentopost'] = 0;
        
        
                
        $this->data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', '');
        $this->data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', '');
        $this->data['status'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
        $this->data['usuarios'] = $this->crm_model->getConfig('usuarios', 'idusuarios,nome', '');
        $this->data['results'] = $this->crm_model->get('crm', 'idcrm,empresa,nome,telefone,status,seguimento,data,usuario', $where_array, $config['per_page'], $this->uri->segment(3), '', 'idcrm', 'desc');
        $this->load->view('crm/gerenciarLead', $this->data);
    }

    public function filtro() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mCrm')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->load->library('table');
        $this->load->library('pagination');


        $empresa = $this->input->post('empresa');
        $numero = $this->input->post('idcrm');
        $status = $this->input->post('status');
        $vendedor = $this->input->post('vendedor');
        $seguimento = $this->input->post('seguimento');
        $datainicial = $this->input->post('datainicial');
        $datafinal = $this->input->post('datafinal');

//       ESTAS VARIAVEIS SERVEM PARA MANTER O CAMPO SELECIONADO DEPOIS DA PESQUISA 
        $this->data['statuspost'] = $this->input->post('status');
        $this->data['vendedorpost'] = $this->input->post('vendedor');
        $this->data['seguimentopost'] = $this->input->post('seguimento');
       


        if (isset($vendedor)and ! empty($vendedor) or isset($numero)and ! empty($numero) or isset($status)and ! empty($status) or isset($empresa)and ! empty($empresa) or isset($seguimento)and ! empty($seguimento) or isset($dataincial)and ! empty($datainicial) or isset($datafinal)and ! empty($datafinal)) {
            //$this->pagination->initialize($config);
            $this->data['results'] = $this->crm_model->filtro($vendedor, $status, $numero, $empresa, $seguimento, $datainicial, $datafinal);
            $this->data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', '');
            $this->data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', '');
            $this->data['status'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', '');
            $this->data['usuarios'] = $this->crm_model->getConfig('usuarios', 'idusuarios,nome', '');
            $this->load->view('crm/gerenciarLead', $this->data);
        } else {
            redirect(base_url() . 'index.php/crm/gerenciar');
        }
    }

    public function add() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }
        $data['dadoslogin'] = $this->session->all_userdata();

        $this->form_validation->set_rules('empresa', 'Empresa', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        //$this->form_validation->set_rules('whatsapp', 'whatsapp', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('telefone', 'telefone', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email');
        $this->form_validation->set_rules('cargo', 'Cargo', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('endereco', 'Endereco', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required|min_length[3]');



        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = $this->input->post('empresa');
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = $this->input->post('cnpj');
            $dados['whatsapp'] = $this->input->post('whatsapp');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = $this->input->post('cargo');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['bairro'] = $this->input->post('bairro');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = $this->input->post('status');
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = $this->input->post('concorrente');
            $dados['seguimento'] = $this->input->post('seguimento');
            $dados['data'] = date('Y/m/d');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = $this->input->post('possuisistema');
            $dados['usuario'] = $this->input->post('usuario');

            $idLead = $this->crm_model->add('crm', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/crm/edit/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }


        $data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        $data['status'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao', 'status=1');
        $this->load->view('crm/adicionarLead', $data);
    }

    public function edit() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('crm/gerenciar');
        }
        $this->session->set_userdata('last_url', current_url());

        $this->form_validation->set_rules('empresa', 'Empresa', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required|min_length[3]');
        //$this->form_validation->set_rules('whatsapp', 'whatsapp', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('telefone', 'telefone', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('email', 'E-mail', 'trim|valid_email');
        $this->form_validation->set_rules('cargo', 'Cargo', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('endereco', 'Endereco', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('bairro', 'Bairro', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('cidade', 'Cidade', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['empresa'] = $this->input->post('empresa');
            $dados['nome'] = $this->input->post('nome');
            $dados['cnpj'] = $this->input->post('cnpj');
            $dados['whatsapp'] = $this->input->post('whatsapp');
            $dados['telefone'] = $this->input->post('telefone');
            $dados['email'] = $this->input->post('email');
            $dados['cargo'] = $this->input->post('cargo');
            $dados['endereco'] = $this->input->post('endereco');
            $dados['bairro'] = $this->input->post('bairro');
            $dados['cidade'] = $this->input->post('cidade');
            $dados['status'] = $this->input->post('status');
            $dados['fonte'] = $this->input->post('fonte');
            $dados['concorrente'] = $this->input->post('concorrente');
            $dados['seguimento'] = $this->input->post('seguimento');
            $dados['data_alteracao'] = date('Y/m/d');
            $dados['possuisistema'] = $this->input->post('possuisistema');
            //$dados['usuario'] = $this->input->post('usuario'); comentado para nao substituir vendedor na edição


            $where_array3['encerra'] = 1;
            $estadoencerrado = $this->crm_model->getConfig('status_crm', 'idstatus,descricao', $where_array3);
            foreach ($estadoencerrado as $value2) {
                if ($dados['status'] == $value2->idstatus) {
                    $dados['data_encerra'] = date('Y/m/d');
                }
            }




            if ($this->crm_model->edit('crm', $dados, 'idcrm', $this->input->post('idcrm')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                $where_array3['encerra'] = 1;
                $estadoencerrado = $this->crm_model->getConfig('status_crm', 'idstatus,descricao', $where_array3);
                foreach ($estadoencerrado as $value2) {
                    if ($dados['status'] == $value2->idstatus) {
                        redirect(base_url() . 'index.php/crm/gerenciar');
                    }
                }
                redirect(base_url() . 'index.php/crm/edit/' . $this->input->post('idcrm'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $where_array = array();
        $where_array['encerra'] = 0;
        $where_array['status'] = 1;

        $where_array2 = array();
        $where_array2['encerra'] = 1;
        $where_array2['status'] = 1;

        $where_array3 = array();
        $where_array3['idLead_proposta'] = $this->uri->segment(3);

        $data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        $data['statusfunil'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', $where_array);
        $data['statusencerra'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao', $where_array2);
        $data['timeline'] = $this->crm_model->getTimeline($this->uri->segment(3));
        $data['dadoslogin'] = $this->session->all_userdata();
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getById($this->uri->segment(3));
        $data['proposta'] = $this->crm_model->getPropostas('propostas', 'numpropostas,fantasia,contato,data,status', $where_array3, '');
        $data['agenda'] = $this->crm_model->getConfig('calendario', 'id,title,color', $where_array3);

        $this->load->view('crm/alterarLead', $data);
    }

    public function view() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vLead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('crm/gerenciar');
        }

        $where_array = array();
        $where_array['encerra'] = 0;
        $where_array['status'] = 1;

        $where_array2 = array();
        $where_array2['encerra'] = 1;
        $where_array2['status'] = 1;

        $where_array3 = array();
        $where_array3['idLead_proposta'] = $this->uri->segment(3);

        $data['seguimento'] = $this->crm_model->getConfig('seguimento_crm', 'idseguimento,descricao', 'status=1');
        $data['indicacao'] = $this->crm_model->getConfig('indicacao_crm', 'idindicacao,descricao', 'status=1');
        $data['statusfunil'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao,encerra', $where_array);
        $data['statusencerra'] = $this->crm_model->getConfig('status_crm', 'idstatus,descricao', $where_array2);
        $data['timeline'] = $this->crm_model->getTimeline($this->uri->segment(3));
        $data['dadoslogin'] = $this->session->all_userdata();
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getById($this->uri->segment(3));
        $data['proposta'] = $this->crm_model->getPropostas('propostas', 'numpropostas,fantasia,contato,data,status', $where_array3, '');

        $this->load->view('crm/visualizarLead', $data);
    }

    public function gerenciarstatus() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'crm/gerenciarstatus';
        $config['total_rows'] = $this->crm_model->count('status_crm');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->data['results'] = $this->crm_model->get('status_crm', 'idstatus,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idstatus', '');

        $this->load->view('crm/config/status/gerenciarStatus', $this->data);
    }

    public function addstatus() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            $idLead = $this->crm_model->add('status_crm', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/crm/editstatus/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('crm/config/status/adicionarStatus', $data);
    }

    public function editstatus() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eStatuslead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');


            if ($this->crm_model->edit('status_crm', $dados, 'idstatus', $this->input->post('idstatus')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/crm/editstatus/' . $this->input->post('idstatus'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getByIdStatus($this->uri->segment(3));
        $this->load->view('crm/config/status/alterarStatus', $data);
    }

    public function gerenciarindicacao() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mIndicacaolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/crm/gerenciarindicacao';
        $config['total_rows'] = $this->crm_model->count('indicacao_crm');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->data['results'] = $this->crm_model->get('indicacao_crm', 'idindicacao,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idindicacao', '');

        $this->load->view('crm/config/indicacao/gerenciarIndicacao', $this->data);
    }

    public function addindicacao() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aIndicacaolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            $idLead = $this->crm_model->add('indicacao_crm', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/crm/editIndicacao/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('crm/config/indicacao/adicionarIndicacao', $data);
    }

    public function editindicacao() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eIndicacaolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');


            if ($this->crm_model->edit('indicacao_crm', $dados, 'idindicacao', $this->input->post('idindicacao')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/crm/editindicacao/' . $this->input->post('idindicacao'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getByIdConfig($this->uri->segment(3), 'idindicacao', 'indicacao_crm');
        $this->load->view('crm/config/indicacao/alterarIndicacao', $data);
    }

    public function gerenciarseguimento() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mSeguimentolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'index.php/crm/gerenciarseguimento';
        $config['total_rows'] = $this->crm_model->count('seguimento_crm');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination"><ul class="pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li><a style="color: #2D335B"><b>';
        $config['cur_tag_close'] = '</b></a></li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['first_link'] = 'Primeira';
        $config['last_link'] = 'Última';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';

        $this->pagination->initialize($config);

        $this->data['results'] = $this->crm_model->get('seguimento_crm', 'idseguimento,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idseguimento', '');

        $this->load->view('crm/config/seguimento/gerenciarSeguimento', $this->data);
    }

    public function addseguimento() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aSeguimentolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            $idLead = $this->crm_model->add('seguimento_crm', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/crm/editSeguimento/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('crm/config/seguimento/adicionarSeguimento', $data);
    }

    public function editseguimento() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eSeguimentolead')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/crm/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/usuario');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');


            if ($this->crm_model->edit('seguimento_crm', $dados, 'idseguimento', $this->input->post('idseguimento')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/crm/editseguimento/' . $this->input->post('idseguimento'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->crm_model->getPermissao('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->crm_model->getByIdConfig($this->uri->segment(3), 'idseguimento', 'seguimento_crm');
        $this->load->view('crm/config/seguimento/alterarSeguimento', $data);
    }

    public function adicionarTimeline() {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d-m-Y H:i');
        $idcrm = $this->input->post('idcrm');
        $descricao = $this->input->post('descricao');
        $nome = $this->session->nome;




        $data = array(
            'idcrm' => $idcrm,
            'descricao' => $descricao,
            'nome' => $nome,
            'data' => $data
        );

        if ($this->crm_model->add('timeline_crm', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirTimeline() {

        $ID = $this->input->post('idTimeline_crm');
        if ($this->crm_model->delete('timeline_crm', 'idTimeline_crm', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

}
