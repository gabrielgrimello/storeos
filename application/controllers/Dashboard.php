<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $this->load->model('dashboard_model');
        $this->load->library('javascript', 'jquery', 'ajax');
    }

    public function index() {
        $dadoslogin = $this->session->all_userdata();
        date_default_timezone_set('America/Sao_Paulo');

        //OS EM GARANTIA
        $whereGarantia = array();
        $whereGarantia['garantia'] = 1;
        $whereGarantia['encerrada'] = "nao";
        $this->data['totalGarantia'] = $this->dashboard_model->count('ordem_servico', $whereGarantia);

        //OS ABERTAS
        $whereAbertas = array();
        $whereAbertas['encerrada'] = "nao";
        $this->data['totalAbertas'] = $this->dashboard_model->count('ordem_servico', $whereAbertas);

        //OS ABERTAS ÚLTIMOS 7 DIAS
        $this->data['totalAbertas7dias'] = $this->dashboard_model->count_ultimos_7dias('ordem_servico', date("Y-m-d", strtotime("-7 days")));

        //OS FECHADAS ÚLTIMOS 7 DIAS
        $this->data['totalFechadas7dias'] = $this->dashboard_model->count_fechadas_ultimos_7dias('ordem_servico', date("Y-m-d", strtotime("-7 days")));

        //OS GARANTIA PRÓXIMA DO VENCIMENTO 25 DIAS+
        $this->data['totalAbertasGarantiaProxPrazo'] = $this->dashboard_model->count_garantia_prox_prazo('ordem_servico', date("Y-m-d", strtotime("-25 days")));

        //OS GARANTIA VENCIDAS 
        $this->data['totalAbertasGarantiaVencida'] = $this->dashboard_model->count_garantia_prox_prazo('ordem_servico', date("Y-m-d", strtotime("-30 days")));

        //OS Á 3 DIAS SEM INTERAÇÃO
        $this->data['totalAbertasMais3diasSemInteracao'] = $this->dashboard_model->count_os_mais3dias_seminteracao('ordem_servico', date("Y-m-d", strtotime("-3 days")));

        //TOTAL DE OSs POR STATUS
        $this->data['status'] = $this->dashboard_model->getStatusAberto();

        //TOTAL DE OSs POR STATUS
        $this->data['aguardandoEntrega'] = $this->dashboard_model->getStatusAguardandoEntrega();

        $this->data['entradas'] = $this->getEntradas();
        $this->data['saidas'] = $this->getSaidas();
        $this->data['meses'] = $this->ultimos12Meses();

        $this->load->view('dashboard/dashboard', $this->data);
    }

    public function ultimos12Meses() {
        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
        date_default_timezone_set('America/Sao_Paulo');
        // echo strftime('%A, %d de %B de %Y', strtotime('today'));
        // echo strftime('%B/%y', strtotime('today'));

        for ($i = 12; $i >= 0; $i--) {
            $meses[] = date("M/Y", strtotime(date('Y-m-01') . " -$i months"));
        }

        return json_encode($meses);
    }

    public function getEntradas() {
        for ($i = 12; $i >= 0; $i--) {
            $whereInicio['dataEntrada >='] = date("Y-m-01", strtotime(date('Y-m-01') . " -$i months"));
            $whereFinal['dataEntrada <='] = date("Y-m-31", strtotime(date('Y-m-01') . " -$i months"));
            $totalAbertas[] = $this->dashboard_model->countEntradasSaidas('ordem_servico', $whereInicio, $whereFinal,'');
        }
        return json_encode($totalAbertas);
    }

    public function getSaidas() {
        for ($i = 12; $i >= 0; $i--) {
            $where['status'] = 3;
            $where['encerrada'] = 'sim';
            $whereInicio['dataEncerra >='] = date("Y-m-01", strtotime(date('Y-m-01') . " -$i months"));
            $whereFinal['dataEncerra <='] = date("Y-m-31", strtotime(date('Y-m-01') . " -$i months"));
            $totalFechadas[] = $this->dashboard_model->countEntradasSaidas('ordem_servico', $whereInicio, $whereFinal,$where);
        }
        return json_encode($totalFechadas);
    }

}
