<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Os extends CI_Controller {

    /**
     * author: Gabriel Grimello 
     * Data 10/03/2018
     * E-mail gabrielgrimello@gmail.com
     * 
     */
    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        date_default_timezone_set('America/Sao_Paulo');
        $this->load->model('OS_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {
        $this->load->view('os/gerenciarOS');
    }

    public function gerenciar() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->load->library('table');
        $this->load->library('pagination');
        $dadoslogin = $this->session->all_userdata();

        $where_array = array();
        $idOS = $this->input->get('idOS');
        $cnpjCliente = $this->input->get('cnpj');
        $nomeCliente = $this->input->get('nomeCliente');
        $fantasiaCliente = $this->input->get('fantasiaCliente');
        $status = $this->input->get('status');
        $garantia= $this->input->get('garantia');
        $encerrada= $this->input->get('encerrada');
        $dataEntrada = $this->input->get('dataEntrada');
        
        
        if ($idOS) {
            $where_array['idOS'] = $idOS;
        }
        if ($nomeCliente) {
            $where_array['nomeCliente'] = $nomeCliente;
        }
        
        if ($fantasiaCliente) {
            $where_array['fantasiaCliente'] = $fantasiaCliente;
        }
        
        if ($cnpjCliente) {
            $where_array['cnpjCliente'] = $cnpjCliente;
        }
        
        if ($status) {
            $where_array['status'] = $status;
        }
        
         if ($garantia) {
            $where_array['garantia'] = $garantia;
        }
        
         if ($encerrada) {
            $where_array['encerrada'] = $encerrada;
        }
        
        if ($dataEntrada) {
            $where_array['dataEntrada'] = $dataEntrada;
        }

        $config['base_url'] = base_url() . 'index.php/os/gerenciar';
        $config['total_rows'] = $this->OS_model->countGerenciar('ordem_servico', $where_array);
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

        $this->data['status'] = $this->OS_model->getConfig('status_os', 'idStatus,descricao,encerra');
        $this->data['results'] = $this->OS_model->get('ordem_servico', 'idOS,nomeCliente,fantasiaCliente,contatoCliente,telefoneCliente,celularCliente,emailCliente,dataEntrada,status', $where_array, $config['per_page'], $this->uri->segment(3), '', 'idos', 'DESC');
        $this->load->view('os/gerenciarOS', $this->data);
    }

    public function editarOS() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        $this->form_validation->set_rules('cnpj', 'CNPJ', 'trim|required');
        $this->form_validation->set_rules('defeito', 'Defeito reclamado', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $this->data['formErrors'] = validation_errors();
        } else {
            $dadosOs['idOS'] = $this->input->post('idOS');
            $dadosOs['nomeCliente'] = $this->input->post('razao');
            $dadosOs['fantasiaCliente'] = $this->input->post('fantasia');
            $dadosOs['enderecoCliente'] = $this->input->post('endereco');
            $dadosOs['cidadeCliente'] = $this->input->post('cidade');
            $dadosOs['estadoCliente'] = $this->input->post('estado');
            $dadosOs['emailCliente'] = $this->input->post('email');
            $dadosOs['celularCliente'] = $this->input->post('celular');
            $dadosOs['telefoneCliente'] = $this->input->post('telefone');
            $dadosOs['contatoCliente'] = $this->input->post('contato');
            $dadosOs['acessorios'] = $this->input->post('acessorios');
            $dadosOs['observacoes'] = $this->input->post('observacoes');
            $dadosOs['defeito'] = $this->input->post('defeito');
            $dadosOs['laudo'] = $this->input->post('laudo');
            $dadosOs['dataalteracao'] = date('Y/m/d');
            $dadosOs['garantia'] = $this->input->post('garantia');
            $dadosOs['prateleiraEntrada'] = $this->input->post('prateleiraEntrada');
            $dadosOs['prateleiraSaida'] = $this->input->post('prateleiraSaida');
            $dadosOs['apontGarantia'] = $this->input->post('apontGarantia');
            $dadosOs['notaGarantia'] = $this->input->post('notaGarantia');
            $dadosOs['tensaoEntrada'] = $this->input->post('tensaoEntrada');
            $dadosOs['status'] = $this->input->post('status');

            if ($this->OS_model->edit('ordem_servico', $dadosOs, 'idOS', $this->input->post('idOS')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Ordem de serviço atualizada com sucesso!');
                $this->data['formErrors'] = null;
                redirect(base_url() . 'index.php/os/editarOS/' . $this->input->post('idOS'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $this->data['statusEncerrado'] = $this->OS_model->getStatusEncerrado();
        $this->data['statusAberto'] = $this->OS_model->getStatusAberto();
        $this->data['pecas'] = $this->OS_model->getPecas($this->uri->segment(3));
        $this->data['servicos'] = $this->OS_model->getServicos($this->uri->segment(3));
        $this->data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
        $this->data['os'] = $this->OS_model->getOS($this->uri->segment(3));
        $this->data['timeline'] = $this->OS_model->getTimeline($this->uri->segment(3));

        $whereChecklist['idOS'] = $this->uri->segment(3);
        $this->data['countChecklistComputador'] = $this->OS_model->countChecklist('checklist_computador', $whereChecklist);
        $this->data['countChecklistNobreakEstabilizador'] = $this->OS_model->countChecklist('checklist_nobreakestabilizador', $whereChecklist);
        $this->data['equipamento'] = $this->OS_model->getEquipamentoById($this->data['os']->idEquipamento);

//        var_dump($this->data['equipamento']);
//        $data['servicos'] = $this->proposta_model->getServicos($this->uri->segment(3));
//        $data['modulos'] = $this->proposta_model->getModulos($this->uri->segment(3));
//        $data['result'] = $this->proposta_model->getById($this->uri->segment(3));
        $this->load->view('os/alterarOS', $this->data);
    }

    public function visualizarOS() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'vOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }


        $this->data['status'] = $this->OS_model->getConfig('status_os', '*');
        $this->data['pecas'] = $this->OS_model->getPecas($this->uri->segment(3));
        $this->data['servicos'] = $this->OS_model->getServicos($this->uri->segment(3));
        $this->data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
        $this->data['os'] = $this->OS_model->getOS($this->uri->segment(3));
        $this->data['equipamento'] = $this->OS_model->getEquipamentoById($this->data['os']->idEquipamento);

        $this->load->view('os/visualizarOS', $this->data);
    }

    public function encerrarOS() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $dadosOs['idOS'] = $this->input->post('idOS');
        $dadosOs['status'] = $this->input->post('status');
        $dadosOs['encerrada'] = "sim";

        if ($this->OS_model->edit('ordem_servico', $dadosOs, 'idOS', $this->input->post('idOS')) == TRUE) {
            $this->session->set_flashdata('success_msg', 'Ordem de serviço atualizada com sucesso!');
            $this->data['formErrors'] = null;
            redirect(base_url() . 'index.php/os/gerenciar/');
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
        }
    }

    public function adicionarOS() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar ordem de serviço.');
            redirect(base_url() . 'index.php/os/gerenciar');
        } // verifica se tem permissão para acessar a tela

        $data['dadoslogin'] = $this->session->all_userdata(); //pega dados da sessão de login
        $this->load->view('os/adicionarOS', $data); // carrega a view adicionarOS
    }

    public function selecionarEquipamento() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->form_validation->set_rules('cliente', 'Cliente', 'trim|required'); // recebe informação carregada do form da view adicionarOS

        if ($this->form_validation->run() == FALSE) {//valida se o campo veio preenchido corretamente
            $data['formErrors'] = validation_errors();
        } else {
            $cliente = ($this->input->post('cliente'));
            $dadosCliente = explode(" - ", $cliente); //recebe os dados separados por - divide em cada posicao do array
            $data['codigoCliente'] = $dadosCliente[0]; // pega a primeira posição do array que é o codigo do cliente
            $data['equipamentosCliente'] = $this->OS_model->getEquipamentosCliente($dadosCliente[0]); // pega todos os equipamentos cadastrados no codigo do cliente
            $data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
            $this->load->view('os/selecionarEquipamentoOS', $data); //carrega a view selecionarEquipamentoOS e passa os equipamentos e o codigo do cliente como parâmetro
        }
    }

    public function abrirOSMesmoCliente() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }
        $data['codigoCliente'] = $this->uri->segment(3); // pega a primeira posição do array que é o codigo do cliente
        $data['equipamentosCliente'] = $this->OS_model->getEquipamentosCliente($this->uri->segment(3)); // pega todos os equipamentos cadastrados no codigo do cliente
        $data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
        $this->load->view('os/selecionarEquipamentoOS', $data); //carrega a view selecionarEquipamentoOS e passa os equipamentos e o codigo do cliente como parâmetro
    }

    public function salvarOSNovoEquipamento() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }
// recebe dados do form da view selecionarEquipamentoOS quando cadastrou um novo equipamento
        $this->form_validation->set_rules('serie', 'Nº serie', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('tipo', 'Tipo', 'trim|required');
        $this->form_validation->set_rules('marca', 'Marca', 'trim|required');
        $this->form_validation->set_rules('modelo', 'Modelo', 'trim|required');


        if ($this->form_validation->run() == FALSE) {//valida se campos estão OK
            $data['formErrors'] = validation_errors();
        } else {
            $cliente = $this->input->post('cliente');
            $dadosCliente = explode(" - ", $cliente);
            $dados['codigoCliente'] = $dadosCliente[0]; //recebe os dados separados por - divide em cada posicao do array, posicao 0 é cod cliente
            $dados['serie'] = $this->input->post('serie');
            $dados['tipo'] = $this->input->post('tipo');
            $dados['marca'] = $this->input->post('marca');
            $dados['modelo'] = $this->input->post('modelo');
            $dados['patrimonio'] = $this->input->post('patrimonio');

            $codigoEquipamentoSalvo = $this->OS_model->add('equipamentos_cliente', $dados); // cadastra o equipamento na tabela de equipamentos_cliente
            if ($codigoEquipamentoSalvo != 0) {//se retornou diferente de 0(OK) pega todos os dados de cliente e equipamento e salva na tabela de ordem_servico
                $dadosOs['codigoCliente'] = $dadosCliente[0];
                $dadosClienteGet = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $dadosCliente[0] . '');
                $dadosClienteGet = json_decode($dadosClienteGet);
                var_dump($dadosClienteGet->value[0]);
                echo $dadosClienteGet->value[0]->codigo;
                $dadosOs['idEquipamento'] = $codigoEquipamentoSalvo;
                $dadosOs['codigoCliente'] = $dadosClienteGet->value[0]->codigo;
                $dadosOs['cnpjCliente'] = $dadosClienteGet->value[0]->cnpj;
                $dadosOs['nomeCliente'] = $dadosClienteGet->value[0]->nome;
                $dadosOs['fantasiaCliente'] = $dadosClienteGet->value[0]->fantasia;
                $dadosOs['enderecoCliente'] = $dadosClienteGet->value[0]->ender;
                $dadosOs['cidadeCliente'] = $dadosClienteGet->value[0]->cidade;
                $dadosOs['estadoCliente'] = $dadosClienteGet->value[0]->estado;
                $dadosOs['emailCliente'] = $dadosClienteGet->value[0]->email;
                $dadosOs['celularCliente'] = $dadosClienteGet->value[0]->celular;
                $dadosOs['telefoneCliente'] = $dadosClienteGet->value[0]->fone;
                $dadosOs['contatoCliente'] = $dadosClienteGet->value[0]->contato;
                $dadosOs['dataEntrada'] = date('Y/m/d');
                $dadosOs['dataalteracao'] = date('Y/m/d');
                $dadosOs['garantia'] = 0;
                $dadosOs['status'] = 1;
                $dadosOs['encerrada'] = "nao";
                $novaOS = $this->OS_model->add('ordem_servico', $dadosOs);
                if ($novaOS != 0) {// se ao salvar ficou tudo certo, direciona para a tela de edição de OS
                    redirect(base_url() . 'index.php/os/editarOS/' . $novaOS);
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
            $data = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
            $this->load->view('os/selecionarEquipamentoOS', $data);
        }
    }

    public function salvarOSEquipamentoSelecionado() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $codigoCliente = $this->input->post('codigoCliente'); //recebe os dados post HIDDEN
        //pega dados do cliente no odata
        $dadosClienteGet = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $codigoCliente . '');
        $dadosClienteGet = json_decode($dadosClienteGet);

        //organiza dados do cliente e do equipamento para salvar no banco de dados
        $dadosOs['idEquipamento'] = $this->input->post('codigoEquipamento'); //recebe os dados post HIDDEN
        $dadosOs['codigoCliente'] = $dadosClienteGet->value[0]->codigo;
        $dadosOs['cnpjCliente'] = $dadosClienteGet->value[0]->cnpj;
        $dadosOs['nomeCliente'] = $dadosClienteGet->value[0]->nome;
        $dadosOs['fantasiaCliente'] = $dadosClienteGet->value[0]->fantasia;
        $dadosOs['enderecoCliente'] = $dadosClienteGet->value[0]->ender;
        $dadosOs['cidadeCliente'] = $dadosClienteGet->value[0]->cidade;
        $dadosOs['estadoCliente'] = $dadosClienteGet->value[0]->estado;
        $dadosOs['emailCliente'] = $dadosClienteGet->value[0]->email;
        $dadosOs['celularCliente'] = $dadosClienteGet->value[0]->celular;
        $dadosOs['telefoneCliente'] = $dadosClienteGet->value[0]->fone;
        $dadosOs['contatoCliente'] = $dadosClienteGet->value[0]->contato;
        $dadosOs['dataEntrada'] = date('Y/m/d');
        $dadosOs['dataalteracao'] = date('Y/m/d');
        $dadosOs['garantia'] = 0;
        $dadosOs['status'] = 1;
        $dadosOs['encerrada'] = "nao";
        $novaOS = $this->OS_model->add('ordem_servico', $dadosOs); //salva no banco de dados
        if ($novaOS != 0) {// se ao salvar ficou tudo certo, direciona para a tela de edição de OS
            redirect(base_url() . 'index.php/os/editarOS/' . $novaOS);
        } else {
            $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
        }

        $this->load->view('os/selecionarEquipamentoOS');
    }

    public function alterarEquipamentoOsExistente() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->form_validation->set_rules('idOS', 'idOS', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $this->data['formErrors'] = validation_errors();
        } else {
            $dadosOs['idEquipamento'] = $this->input->post('codigoEquipamento'); //recebe os dados post HIDDEN
            $dadosOs['dataalteracao'] = date('Y/m/d');
            if ($this->OS_model->edit('ordem_servico', $dadosOs, 'idOS', $this->input->post('idOS')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Ordem de serviço atualizada com sucesso!');
                $this->data['formErrors'] = null;
                redirect(base_url() . 'index.php/os/editarOS/' . $this->input->post('idOS'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['idOS'] = $this->uri->segment(3);
        $data['codigoCliente'] = $this->uri->segment(4); // pega a primeira posição do array que é o codigo do cliente
        $data['equipamentosCliente'] = $this->OS_model->getEquipamentosCliente($this->uri->segment(4)); // pega todos os equipamentos cadastrados no codigo do cliente
        $data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
        $this->load->view('os/alterarEquipamentoOS', $data);
    }

    public function alterarEquipamentoOsNovo() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }

        $this->form_validation->set_rules('serie', 'Nº serie', 'trim|required|min_length[3]');
        $this->form_validation->set_rules('tipo', 'Tipo', 'trim|required');
        $this->form_validation->set_rules('marca', 'Marca', 'trim|required');
        $this->form_validation->set_rules('modelo', 'Modelo', 'trim|required');


        if ($this->form_validation->run() == FALSE) {//valida se campos estão OK
            $data['formErrors'] = validation_errors();
        } else {
            $dados['codigoCliente'] = $this->input->post('cliente');
            $dados['serie'] = $this->input->post('serie');
            $dados['tipo'] = $this->input->post('tipo');
            $dados['marca'] = $this->input->post('marca');
            $dados['modelo'] = $this->input->post('modelo');
            $dados['patrimonio'] = $this->input->post('patrimonio');

            $codigoEquipamentoSalvo = $this->OS_model->add('equipamentos_cliente', $dados); // cadastra o equipamento na tabela de equipamentos_cliente
            if ($codigoEquipamentoSalvo != 0) {//se retornou diferente de 0(OK) pega todos os dados de equipamento e altera na tabela de ordem_servico
                $dadosOs['idEquipamento'] = $codigoEquipamentoSalvo; //recebe os dados post HIDDEN
                $dadosOs['dataalteracao'] = date('Y/m/d');

                if ($this->OS_model->edit('ordem_servico', $dadosOs, 'idOS', $this->input->post('idOS')) == TRUE) {
                    $this->session->set_flashdata('success_msg', 'Ordem de serviço atualizada com sucesso!');
                    $this->data['formErrors'] = null;
                    redirect(base_url() . 'index.php/os/editarOS/' . $this->input->post('idOS'));
                } else {
                    $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
                }
            }
        }

        $data['idOS'] = $this->uri->segment(3);
        $data['codigoCliente'] = $this->uri->segment(4); // pega a primeira posição do array que é o codigo do cliente
        $data['equipamentosCliente'] = $this->OS_model->getEquipamentosCliente($this->uri->segment(4)); // pega todos os equipamentos cadastrados no codigo do cliente
        $data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
        $this->load->view('os/selecionarEquipamentoOS', $data);
    }

    public function autocompleteCliente() {
        $term = $this->input->get('term');
        $tipo = $this->input->get('tipo');

        if ($tipo == "cpf") {
            $this->db->like('nome', $term);
            $data = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=cnpj%20like%20(%27%%25' . $term . '%%25%27)');
            echo $data;
        }
        if ($tipo == "razao") {
            $this->db->like('nome', $term);
            $data = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=nome%20like%20(%27%%25' . $term . '%%25%27)');
            echo $data;
        }

        if ($tipo == "fantasia") {
            $this->db->like('nome', $term);
            $data = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=fantasia%20like%20(%27%%25' . $term . '%%25%27)');
            echo $data;
        }
    }

    public function adicionarChecklistNobreakEstabilizador() {
        $this->load->view('os/checklist/adicionarChecklistNobreakEstabilizador');
    }

    public function pesquisaProduto() {
        $term = $this->input->get('term');
        $this->db->like('nome', $term);

        $data = file_get_contents('http://localhost:8886/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25' . $term . '%%25%27)%20and%20filial%20eq%20%271%27%20and%20inservico%20ne%20%27S%27');

        echo $data;
    }

    public function pesquisaServico() {
        $term = $this->input->get('term');
        $this->db->like('nome', $term);

        $data = file_get_contents('http://localhost:8886/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25' . $term . '%%25%27)%20and%20filial%20eq%20%271%27%20and%20inservico%20eq%20%27S%27');

        echo $data;
    }

    public function imprimir() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'iOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar OS.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/os/gerenciar');
        }

        $this->data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
        $this->data['os'] = $this->OS_model->getOS($this->uri->segment(3));
        $this->data['equipamento'] = $this->OS_model->getEquipamentoById($this->data['os']->idEquipamento);
        $this->load->view('os/imprimirOS', $this->data);
    }

    public function adicionarProduto() {
        $idOS = $this->input->post('idOS');
        $produto = ($this->input->post('produto'));
        $dadosProduto = explode(" - ", $produto); //recebe os dados separados por - divide em cada posicao do array
        $codigoProduto = $dadosProduto[0]; // pega a primeira posição do array que é o codigo do cliente
        $descricao = $dadosProduto[1];
        $quantidade = $this->input->post('quantidade');
        $vlunitario = $dadosProduto[2];
        $vltotal = $vlunitario * $quantidade;

        $data = array(
            'idOS' => $idOS,
            'codigoProduto' => $codigoProduto,
            'descricao' => $descricao,
            'quantidade' => $quantidade,
            'unitario' => $vlunitario,
            'total' => $vltotal,
        );

        if ($this->OS_model->add('produtos_os', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function adicionarServico() {
        $idOS = $this->input->post('idOS');
        $servico = $this->input->post('servico');
        $dadosServico = explode(" - ", $servico); //recebe os dados separados por - divide em cada posicao do array
        $codigoServico = $dadosServico[0]; // pega a primeira posição do array que é o codigo do cliente
        $descricao = $dadosServico[1];
        $quantidade = $this->input->post('quantidadeserv');
        $vlunitario = $dadosServico[2];
        $vltotal = $vlunitario * $quantidade;

        $data = array(
            'idOS' => $idOS,
            'codigoServico' => $codigoServico,
            'descricao' => $descricao,
            'quantidade' => $quantidade,
            'unitario' => $vlunitario,
            'total' => $vltotal,
        );

        if ($this->OS_model->add('servicos_os', $data) == true) {
            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirOS() {
        $idOS = $this->input->post('idOSExcluir');

        if ($this->OS_model->delete('ordem_servico', 'idOS', $idOS) == true) {
            $this->OS_model->delete('produtos_os', 'idOS', $idOS);
//            $this->proposta_model->delete('modulos_proposta', 'numpropostas', $numpropostas);
//            $this->proposta_model->delete('servicos_proposta', 'numpropostas', $numpropostas);

            redirect(base_url() . 'index.php/os/gerenciar');
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirProduto() {
        $ID = $this->input->post('idProduto_OS');
        if ($this->OS_model->delete('produtos_os', 'idProduto_OS', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirServico() {
        $ID = $this->input->post('idServico_OS');
        if ($this->OS_model->delete('servicos_os', 'idServico_OS', $ID) == true) {

            echo json_encode(array('result' => true));
        } else {
            echo json_encode(array('result' => false));
        }
    }

    public function gerenciarstatus() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mStatusOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar Status de OS.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'os/gerenciarstatus';
        $config['total_rows'] = $this->OS_model->count('status_os');
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

        $this->data['results'] = $this->OS_model->get('status_os', 'idStatus,descricao,status,encerra', '', $config['per_page'], $this->uri->segment(3), '', 'idStatus', '');

        $this->load->view('os/config/status/gerenciarStatus', $this->data);
    }

    public function addstatus() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aStatusOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para adicionar Status de  OS.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');
            $dados['encerra'] = $this->input->post('encerra');

            $idLead = $this->OS_model->add('status_os', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/os/gerenciarstatus');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('os/config/status/adicionarStatus', $data);
    }

    public function editstatus() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eStatusOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/os/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');
            $dados['encerra'] = $this->input->post('encerra');


            if ($this->OS_model->edit('status_os', $dados, 'idStatus', $this->input->post('idStatus')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/os/editstatus/' . $this->input->post('idStatus'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->OS_model->getConfig('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->OS_model->getByIdStatus($this->uri->segment(3));
        $this->load->view('os/config/status/alterarStatus', $data);
    }

    public function gerenciarTiposEquipamentos() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mTiposEquipamentos')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        $this->load->library('table');
        $this->load->library('pagination');

        $config['base_url'] = base_url() . 'os/gerenciarTiposEquipamentos';
        $config['total_rows'] = $this->OS_model->count('tipo_equipamento');
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

        $this->data['results'] = $this->OS_model->get('tipo_equipamento', 'idTipo,descricao,status', '', $config['per_page'], $this->uri->segment(3), '', 'idTipo', '');

        $this->load->view('os/config/tipo/gerenciarTiposEquipamentos', $this->data);
    }

    public function adicionarTiposEquipamentos() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'aTiposEquipamentos')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar propostas.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            $idLead = $this->OS_model->add('tipo_equipamento', $dados);
            if ($idLead != 0) {
                redirect(base_url() . 'index.php/os/editarTiposEquipamentos/' . $idLead);
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['dadoslogin'] = $this->session->all_userdata();
        $this->load->view('os/config/tipo/adicionarTiposEquipamentos', $data);
    }

    public function editarTiposEquipamentos() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eTiposEquipamentos')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/os/gerenciar');
        }

        $this->form_validation->set_rules('descricao', 'Descricao', 'trim|required|min_length[3]');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['descricao'] = $this->input->post('descricao');
            $dados['status'] = $this->input->post('status');

            if ($this->OS_model->edit('tipo_equipamento', $dados, 'idTipo', $this->input->post('idTipo')) == TRUE) {
                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/os/editarTiposEquipamentos/' . $this->input->post('idTipo'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['permissao'] = $this->OS_model->getConfig('permissoes', 'idPermissao,nome,data,situacao');
        $data['result'] = $this->OS_model->getByIdTipo($this->uri->segment(3));
        $this->load->view('os/config/tipo/alterarTiposEquipamentos', $data);
    }

    public function editarEquipamentos() {

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eTiposEquipamentos')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para visualizar produtos.');
            redirect(base_url() . 'index.php/os/gerenciar');
        }

        if (!$this->uri->segment(3) || !is_numeric($this->uri->segment(3))) {
            $this->session->set_flashdata('error', 'Item não pode ser encontrado, parâmetro não foi passado corretamente.');
            redirect('index.php/os/teste');
        }

        $this->form_validation->set_rules('codigo', 'Código', 'trim|required');
        $this->form_validation->set_rules('tipo', 'Tipo', 'trim|required');

        if ($this->form_validation->run() == FALSE) {
            $data['formErrors'] = validation_errors();
        } else {
            $dados['idEquipamento'] = $this->input->post('codigo');
            $dados['codigoCliente'] = $this->input->post('cliente');
            $dados['serie'] = $this->input->post('serie');
            $dados['tipo'] = $this->input->post('tipo');
            $dados['marca'] = $this->input->post('marca');
            $dados['modelo'] = $this->input->post('modelo');
            $dados['patrimonio'] = $this->input->post('patrimonio');
            if ($this->OS_model->edit('equipamentos_cliente', $dados, 'idEquipamento', $this->input->post('codigo')) == TRUE) {

                $this->session->set_flashdata('success_msg', 'Cadastro realizado com sucesso!');
                $data['formErrors'] = null;
                redirect(base_url() . 'index.php/os/editarOS/' . $this->input->post('os'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }
        $data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
        $data['permissao'] = $this->OS_model->getConfig('permissoes', 'idPermissao,nome,data,situacao');
        $data['os'] = $this->uri->segment(3);
        $data['result'] = $this->OS_model->getEquipamentoById($this->uri->segment(4));
        $this->load->view('equipamento/alterarEquipamentos', $data);
    }

    public function adicionarTimeline() {
        date_default_timezone_set('America/Sao_Paulo');
        $data = date('d-m-Y H:i');
        $idos = $this->input->post('idos');
        $descricao = $this->input->post('descricao');
        $nome = $this->session->nome;

        $data = array(
            'idos' => $idos,
            'descricao' => $descricao,
            'nome' => $nome,
            'data' => $data
        );

        if ($this->OS_model->add('timeline_os', $data) == true) {
             redirect(base_url() . 'index.php/os/editarOS/'.$idos);
        } else {
            echo json_encode(array('result' => false));
        }
    }

    function excluirTimeline() {

        $ID = $this->input->post('idTimeline_os');
        $idos = $this->input->post('idos');
        
        if ($this->OS_model->delete('timeline_os', 'idTimeline_os', $ID) == true) {

           redirect(base_url() . 'index.php/os/editarOS/'.$idos);
        } else {
            echo json_encode(array('result' => false));
        }
    }

}
