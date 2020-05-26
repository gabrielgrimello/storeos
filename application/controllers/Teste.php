<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Teste extends CI_Controller {

    function __construct() {
        parent::__construct();
//        if ((!session_id()) || (!$this->session->userdata('logado'))) {
//            redirect(base_url() . 'index.php/login');
//        }

        $this->load->model('teste_model');
        $this->load->model('OS_model');

        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function teste() {
        $this->load->view('teste/teste2');
    }

    public function select2() {
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

    public function select2result() {
        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para editar OS.');
            redirect(base_url() . 'index.php/dashboard');
        }
        $this->form_validation->set_rules('select', 'Select', 'required'); // recebe informação carregada do form da view adicionarOS

        if ($this->form_validation->run() == FALSE) {//valida se o campo veio preenchido corretamente
            $data['formErrors'] = validation_errors();
        } else {

            $data['codigoCliente'] = $this->input->post('select');
            $data['equipamentosCliente'] = $this->OS_model->getEquipamentosCliente($this->input->post('select')); // pega todos os equipamentos cadastrados no codigo do cliente
            $data['tipo'] = $this->OS_model->getConfig('tipo_equipamento', 'idTipo,descricao');
            $this->load->view('os/selecionarEquipamentoOS', $data); //carrega a view selecionarEquipamentoOS e passa os equipamentos e o codigo do cliente como parâmetro
        }
    }

    public function index() {
        $this->load->view('teste/teste');
    }

    function search() {
        $json = [];


        $this->load->database();


        if (!empty($this->input->get("q"))) {
            $this->db->like('nomeCliente', $this->input->get("q"));
            $query = $this->db->select('idOS,nomeCliente')
                    ->limit(10)
                    ->get("tags");
            $json = $query->result();
        }


        echo json_encode($json);
    }

    public function sms() {
        $cnpj = $this->input->get('cnpj');
        $mensagem = "WBAGESTAO" . $cnpj;
        shell_exec('curl -X "PUT" "http://10.1.4.212:8080/v1/sms/?phone=13996768999&message="' . utf8_encode($mensagem) . '"&sim_slot=0"');
    }

    public function smsBoleto() {
        $cnpj = $this->input->get('cnpj');
        $mensalidade = $this->input->get('mensalidade');

        $mensagem = "WBAGESTAO%20informa%2C%20boleto%20de%20mensalidade%20para%20o%20cnpj%3A%20" . $cnpj . "%20no%20valor%20de%20R%24" . $mensalidade . "%20foi%20gerado%20e%20vence%20em%207%20dias.%0A%0ADúvidas%20ligue:%20(11)%202579-5279%20ou%20(13)%203257-8080%20opção%207.%0A%0ATenha%20uma%20excelente%20semana.";

        //      echo $mensagem;

        shell_exec('curl -X "PUT" "http://10.1.4.212:8080/v1/sms/?phone=13996768999&message="' . utf8_encode($mensagem) . '');
    }

    public function smsBoletoCodBarras() {
//       $cnpj = $this->input->post('cnpj');
//        $mensalidade = $this->input->get('mensalidade');
//        $boleto = $this->input->get('boleto');

        $cnpj = "20.254.743/0001-13";
        $mensalidade = "120,00";
        $boleto = "12390.00005 00000.00006 00000.00007 8 56760000015075";

        $boleto = str_replace(' ', '%20', $boleto);
        $mensagem = "WBAGESTAO%20informa%2C%20boleto%20de%20mensalidade%20para%20o%20cnpj%3A%20" . $cnpj . "%20no%20valor%20de%20R%24" . $mensalidade . "%20foi%20gerado%20e%20vence%20em%207%20dias.%0A%0AO%20c%C3%B3digo%20para%20pagamento%20%C3%A9%3A%20%20" . $boleto . "%0A%0ADúvidas%20ligue:%20(11)%202579-5279%20ou%20(13)%203257-8080%20opção%207.%0A%0ATenha%20uma%20excelente%20semana.";

        echo $cnpj;

        shell_exec('curl -X "PUT" "http://10.1.4.212:8080/v1/sms/?phone=13996768999&message="' . utf8_encode($mensagem) . '');
    }

    public function pesquisaProduto() {
        $produtopesq = $this->input->post('produtopesq');

        if ($produtopesq) {
            $response = file_get_contents('http://localhost:8886/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25' . $produtopesq . '%%25%27)');
            $response = json_decode($response);

            $this->data['totalresultados'] = count($response->value);
            $this->data['produtopesq'] = $response;
        } else {
            $this->data['totalresultados'] = 0;
        }

        $this->load->view('teste/teste', $this->data);
    }

    public function login() {

        $response = file_get_contents('http://localhost:8886/Login.Get?usuario=1&senha=123');
        $response = json_decode($response);
        //echo $response->idLogin;

        var_dump($response);
        if ($response) {
            echo $response->idLogin;
            echo "tudo certo";
        } else {
            echo "erro";
        }
    }

    public function email() {
        $dadoslogin = $this->session->all_userdata();
        $this->load->config('email');
        $this->load->library('email');


        $destino = $this->input->post('destino');
        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');
        $from = $this->config->item('smtp_user');


        if ($destino) {
            $this->email->from($from, $dadoslogin['nome']);
            $this->email->to($destino);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
            $this->email->attach("C:\Users\gabri\Desktop\locapas.txt");

            if ($this->email->send())
                $this->session->set_flashdata('success_msg', 'E-mail enviado com sucesso!');
            else
                show_error($this->email->print_debugger());
        }
        $this->load->view('teste/email');
    }

    public function arquivos() {
        $cpf = $this->input->post('cpf');
        $curriculo = $_FILES['curriculo'];
        $configuracao = array(
            'upload_path' => './curriculos/',
            'allowed_types' => 'pdf',
            'file_name' => $cpf . '.pdf',
            'max_size' => '500'
        );
        $this->load->library('upload');
        $this->upload->initialize($configuracao);
        if ($this->upload->do_upload('curriculo'))
            echo 'Arquivo salvo com sucesso.';
        else
            echo $this->upload->display_errors();
    }

    public function produto() {

        $this->load->view('teste/produto');
    }

    public function autocomplete() {
        $this->load->view('teste/jquery-ui-autocomplete');
    }

    public function search2() {
//
//        $term = $this->input->get('term');
// 
//        $this->db->like('nome', $term);
// 
//        $data = $this->db->get("usuarios")->result();
// 
//        echo json_encode( $data);

        $term = $this->input->get('term');

        $this->db->like('nome', $term);

        $data = file_get_contents('http://localhost:8886/OData/OData.svc/produtos?select=nome&$filter=nome%20like%20(%27%%25' . $term . '%%25%27)');

        echo $data;
    }

    public function crm_agradecimento_compra() {
        $this->load->view('teste/teste2');
    }

    public function compra() {
        date_default_timezone_set('America/Sao_Paulo');
        $data_atual = date('Y-m-d', strtotime("-6 days"));
        echo $data_atual;
        $dataVenda = file_get_contents('http://localhost:8886/OData/OData.svc/vendas?select=nome&$filter=data=%22' . $data_atual . '%22 and clifor!=0');
        $dataVenda = json_decode($dataVenda);

        $array = array(); // novo array para colocar somente os codigos de clientes
        for ($i = 0; $i < sizeof($dataVenda->value); $i++) {
            array_push($array, $dataVenda->value[$i]->clifor); // insere os codigos de clientes no array
        }

        $arraySemRepetidos = array_unique($array); // retira elementos repetidos do array

        $clientesPosVendas = (array_values($arraySemRepetidos)); //array com os codigos de clientes que precisam fazer pos vendas
        //  var_dump($clientesPosVendas);

        $arrayEmail = array(); // novo array para colocar somente os codigos de clientes
        for ($i = 0; $i < sizeof($clientesPosVendas); $i++) {
            $dataCliente = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $clientesPosVendas[$i] . '');
            $dataCliente = json_decode($dataCliente);
            array_push($arrayEmail, $dataCliente->value[0]->email); // insere os codigos de clientes no array
        }

        var_dump($arrayEmail) . "<br><br>";

        $arrayEmail2 = array(); // novo array para colocar o json de consulta de dados do cliente
        for ($i = 0; $i < sizeof($clientesPosVendas); $i++) {
            $dataCliente2 = file_get_contents('http://localhost:8886/OData/OData.svc/clientes?$filter=codigo eq ' . $clientesPosVendas[$i] . ''); // link para pegar dados do cliente no odata passando codigo como parametro
            array_push($arrayEmail2, $dataCliente2); // insere dados do cliente no array
        }
        echo sizeof($arrayEmail2);

        if (sizeof($arrayEmail2) > 0) {
            for ($i = 0; $i < sizeof($arrayEmail2); $i++) {
                $dataCliente3 = json_decode($arrayEmail2[$i]);
                $this->emailPos($dataCliente3->value[0]->email, $dataCliente3->value[0]->nome); // chama a função de enviar email passando o cliente
            }
        } else
            echo "Nada";


        // echo "Nome: ".$dataCliente3->value[0]->nome ." e-mail: ".$dataCliente3->value[0]->email;
        // $this->emailPos($dataCliente3->value[0]->email,$dataCliente3->value[0]->nome); // chama a função de enviar email passando o cliente
    }

    public function emailPos($destino, $nome) {

        $dadoslogin = $this->session->all_userdata();
        $this->load->config('email');
        $this->load->library('email');


        //$destino = $dataCliente3->value[0]->email;
        $assunto = "Pós vendas WBAGESTÃO";
        $mensagem = "Olá " . $nome . ", obrigado por comprar conosco. <br>Nos ajude a melhorar nossa qualidade de atendimento respondendo a pesquisa no link. <br><br> São poucas perguntas acessa la http://www.wbagestao.com ";
        $from = $this->config->item('smtp_user');


        if ($destino) {
            $this->email->from($from, $dadoslogin['nome']);
            $this->email->to($destino);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
            //$this->email->attach("C:\Users\gabri\Desktop\locapas.txt");

            if ($this->email->send())
                return 1;
            else
                show_error($this->email->print_debugger());
        }
    }

}
