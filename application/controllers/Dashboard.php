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
        
        $this->load->view('dashboard/dashboard', $this->data);
    }

    
}
