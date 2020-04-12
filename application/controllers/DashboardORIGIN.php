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
        $where_array_estatistica_novo = array();
        $where_array_estatistica_convertido = array();

        //-----------------------------------------------------------------------------------------------
        //CALCULO DE ESTATISTICAS DO MÊS

        $mes_atual = date('Y-m', strtotime("+1 month"));
        $ultimos_6_meses = date("Y-m", strtotime("-5 month")); //se alterar para 11 pega mes atual e ultimos 11 meses

        $this->data['stat_mensal_convertido'] = $this->dashboard_model->get($mes_atual, $ultimos_6_meses, '');
        $this->data['stat_mensal_novo'] = $this->dashboard_model->get($mes_atual, $ultimos_6_meses, '');

        //entra aqui se nao for o primeiro dia do mes, assim mantem os dados atualizados na página
        if (date('d') == '01' or date('d') == '02' or date('d') == '03') {// se for dia 01, 02 ou 03 do mês, ele vai pegar os dados do dia atual menos 1 mes, assim pega dados do mes anterior
            $mes = date('m', strtotime("-1 month"));
            $ano = date('Y', strtotime("-1 month"));
            $dados['novos'] = $this->dashboard_model->coutestatisticanovo($mes, $ano);
            $dados['convertidos'] = $this->dashboard_model->coutestatisticaganho($mes, $ano);
            $dados['data'] = date('Y-m-01', strtotime("-1 month"));
            

            $existe = $this->dashboard_model->exist($mes, $ano); // VERIFICA SE JÁ EXISTE UMA ESTATISTICA GRAVADA NO BANCO COM O MES E ANO VERIFICADO

            if ($existe) {
                $this->dashboard_model->edit($mes, $ano, $dados);
            } else {
                $this->dashboard_model->addestatistica($dados);
            }
        }
        $mes2 = date('m');
        $ano2 = date('Y');
        $dados['novos'] = $this->dashboard_model->coutestatisticanovo($mes2, $ano2);
        $dados['convertidos'] = $this->dashboard_model->coutestatisticaganho($mes2, $ano2);
        $dados['data'] = date('Y-m-01');

        $existe = $this->dashboard_model->exist($mes2, $ano2); // VERIFICA SE JÁ EXISTE UMA ESTATISTICA GRAVADA NO BANCO COM O MES E ANO VERIFICADO

        if ($existe) {
            $this->dashboard_model->edit($mes2, $ano2, $dados);
        } else {
            $this->dashboard_model->addestatistica($dados);
        }


        //-----------------------------------------------------------------------------------------------
        //conta total CRM GERAL
        $where_array_crm = array();
        $where_array_crm['atribuido'] = 1;

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


        $this->data['count_crm_perdido'] = $this->dashboard_model->count_fechado('crm', '');


        //-----------------------------------------------------------------------------------------------
        //SOMA DE META
        $this->data['meta_vendas'] = 175;
        $data_meta = date('Y-m-01');
        $this->data['mes_atual'] = date('m');
        $this->data['meta_atingida'] = $this->dashboard_model->count_meta_atingida($data_meta);

        $where_array_teste = array();
        $where_array_teste['situacao'] = "perdido";



        //-----------------------------------------------------------------------------------------------
        //SOMA DE META
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
        $this->data['count_crm_perdido_individual'] = $this->dashboard_model->count_fechado('crm', $where_array);

        $this->load->view('dashboard/dashboard', $this->data);
    }

    public function cliente() {

        $this->load->view('teste');
    }

}
