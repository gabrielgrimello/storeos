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

        $where_array = array();
        $where_array_geral = array();

        //conta total de propostas do usuário
        $where_array['usuario'] = $dadoslogin['idusuarios'];
        $this->data['count_proposta'] = $this->dashboard_model->count('propostas', $where_array);

        //conta total de propostas do usuário aguardando aprovação
        $where_array['status'] = 1;
        $this->data['count_proposta_aguardando'] = $this->dashboard_model->count('propostas', $where_array);

        //conta total de propostas do usuário fechado ganho
        $where_array['status'] = 2;
        $this->data['count_proposta_ganho'] = $this->dashboard_model->count('propostas', $where_array);

        //conta total de propostas do usuário fechado perdido
        $where_array['status'] = 3;
        $this->data['count_proposta_perdido'] = $this->dashboard_model->count('propostas', $where_array);

        //conta total de LEADS prospect
        $where_array['status'] = 0;
        $this->data['count_crm_prospect'] = $this->dashboard_model->count('crm', $where_array);

        //-----------------------------------------------------------------------------------------------
        //conta total de propostas geral
        $this->data['count_proposta_geral'] = $this->dashboard_model->count('propostas', '');

        //conta total de propostas geral aguardando aprovação
        $where_array_geral['status'] = 1;
        $this->data['count_proposta_aguardando_geral'] = $this->dashboard_model->count('propostas', $where_array_geral);

        //conta total de propostas geral fechado ganho
        $where_array_geral['status'] = 2;
        $this->data['count_proposta_ganho_geral'] = $this->dashboard_model->count('propostas', $where_array_geral);

        //conta total de propostas geral fechado perdido
        $where_array_geral['status'] = 3;
        $this->data['count_proposta_perdido_geral'] = $this->dashboard_model->count('propostas', $where_array_geral);

        //conta total de LEADS prospect
        $where_array_geral['status'] = 0;
        $this->data['count_crm_prospect_geral'] = $this->dashboard_model->count('crm', $where_array_geral);

        
        
        
        
        //-----------------------------------------------------------------------------------------------
        //conta total CRM GERAL
        $where_array_crm = array();
        $this->data['count_crm_total'] = $this->dashboard_model->count('crm', $where_array_crm);
        
        
        $where_array_crm['status'] = 1;
        $this->data['count_crm_prospect'] = $this->dashboard_model->count('crm', $where_array_crm);
        
        $where_array_crm['status'] = 2;
        $this->data['count_crm_oportunidade'] = $this->dashboard_model->count('crm', $where_array_crm);

        $where_array_crm['status'] = 3;
        $this->data['count_crm_entregue'] = $this->dashboard_model->count('crm', $where_array_crm);

        $where_array_crm['status'] = 4;
        $this->data['count_crm_provavel'] = $this->dashboard_model->count('crm', $where_array_crm);

        $where_array_crm['status'] = 5;
        $this->data['count_crm_ganho'] = $this->dashboard_model->count('crm', $where_array_crm);

       
        $this->data['count_crm_perdido'] = $this->dashboard_model->count_fechado('crm','');
        
        
        
        
        
        //conta total de propostas do usuário
        $where_array = array();
        $where_array['usuario'] = $dadoslogin['idusuarios'];
        $this->data['count_crm_total_individual'] = $this->dashboard_model->count('crm', $where_array);
        
        
        $where_array['status'] = 1;
        $this->data['count_crm_prospect_individual'] = $this->dashboard_model->count('crm', $where_array);
        
        $where_array['status'] = 2;
        $this->data['count_crm_oportunidade_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['status'] = 3;
        $this->data['count_crm_entregue_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['status'] = 4;
        $this->data['count_crm_provavel_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['status'] = 5;
        $this->data['count_crm_ganho_individual'] = $this->dashboard_model->count('crm', $where_array);

        $where_array['usuario'] = $dadoslogin['idusuarios'];
        $this->data['count_crm_perdido_individual'] = $this->dashboard_model->count_fechado('crm',$where_array);

        $this->load->view('dashboard/dashboard', $this->data);
    }
    
    public function cliente(){
        
        $this->load->view('teste');
        
    }

}
