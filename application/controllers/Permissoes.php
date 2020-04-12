<?php

class Permissoes extends CI_Controller {

    /**
     * author: Ramon Silva 
     * email: silva018-mg@yahoo.com.br
     * 
     */
    function __construct() {
        parent::__construct();
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }

        if (!$this->permission->checkPermission($this->session->userdata('permissao'), 'mPermissao')) {
            $this->session->set_flashdata('error', 'Você não tem permissão para configurar as permissões no sistema.');
            redirect(base_url()) . 'index.php/dashboard';
        }


        $this->load->model('permissoes_model', '', TRUE);
        $this->data['menuConfiguracoes'] = 'Permissões';
    }

    function index() {
        $this->gerenciar();
    }

    function gerenciar() {


        $this->load->library('pagination');


        $config['base_url'] = base_url() . 'index.php/permissoes/gerenciar';
        $config['total_rows'] = $this->permissoes_model->count('permissoes');
        $config['per_page'] = 10;
        $config['next_link'] = 'Próxima';
        $config['prev_link'] = 'Anterior';
        $config['full_tag_open'] = '<div class="pagination alternate"><ul>';
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

        $this->data['results'] = $this->permissoes_model->get('permissoes', 'idPermissao,nome,data,situacao', '', $config['per_page'], $this->uri->segment(3));
        $this->load->view('permissoes/gerenciarPermissoes', $this->data);
    }

    function add() {

        $this->data['custom_error'] = '';
        $this->data['formErrors'] = null;
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $nomePermissao = $this->input->post('nome');
            $cadastro = date('Y-m-d');
            $situacao = 1;

            $permissoes = array(
                'aOS' => $this->input->post('aOS'),
                'eOS' => $this->input->post('eOS'),
                'dOS' => $this->input->post('dOS'),
                'vOS' => $this->input->post('vOS'),
                'iOS' => $this->input->post('iOS'),
                'aUsuario' => $this->input->post('aUsuario'),
                'eUsuario' => $this->input->post('eUsuario'),
                'dUsuario' => $this->input->post('dUsuario'),
                'vUsuario' => $this->input->post('vUsuario'),
                'aTiposEquipamentos' => $this->input->post('aTiposEquipamentos'),
                'eTiposEquipamentos' => $this->input->post('eTiposEquipamentos'),
                'dTiposEquipamentos' => $this->input->post('dTiposEquipamentos'),
                'vTiposEquipamentos' => $this->input->post('vTiposEquipamentos'),
                'aLead' => $this->input->post('aLead'),
                'eLead' => $this->input->post('eLead'),
                'dLead' => $this->input->post('dLead'),
                'vLead' => $this->input->post('vLead'),
                'oLead' => $this->input->post('oLead'),
                'aStatusOS' => $this->input->post('aStatusOS'),
                'eStatusOS' => $this->input->post('eStatusOS'),
                'dStatusOS' => $this->input->post('dStatusOS'),
                'vStatusOS' => $this->input->post('vStatusOS'),
                'aSeguimentolead' => $this->input->post('aSeguimentolead'),
                'eSeguimentolead' => $this->input->post('eSeguimentolead'),
                'dSeguimentolead' => $this->input->post('dSeguimentolead'),
                'vSeguimentolead' => $this->input->post('vSeguimentolead'),
                'aAgenda' => $this->input->post('aAgenda'),
                'eAgenda' => $this->input->post('eAgenda'),
                'dAgenda' => $this->input->post('dAgenda'),
                'vAgenda' => $this->input->post('vAgenda'),
                'tAgenda' => $this->input->post('tAgenda'),
                'aBiblioteca' => $this->input->post('aBiblioteca'),
                'eBiblioteca' => $this->input->post('eBiblioteca'),
                'dBiblioteca' => $this->input->post('dBiblioteca'),
                'vBiblioteca' => $this->input->post('vBiblioteca'),
                'mOS' => $this->input->post('mOS'),
                'mUsuario' => $this->input->post('mUsuario'),
                'mPermissao' => $this->input->post('mPermissao'),
                'mIndicacao' => $this->input->post('mIndicacao'),
                'mCrm' => $this->input->post('mCrm'),
                'mStatusOS' => $this->input->post('mStatusOS'),
                'mSeguimentolead' => $this->input->post('mSeguimentolead'),
                'mBiblioteca' => $this->input->post('mBiblioteca'),
            );
            $permissoes = serialize($permissoes);

            $data = array(
                'nome' => $nomePermissao,
                'data' => $cadastro,
                'permissoes' => $permissoes,
                'situacao' => $situacao
            );

            if ($this->permissoes_model->add('permissoes', $data) == TRUE) {

                $this->session->set_flashdata('success', 'Permissão adicionada com sucesso!');
                $this->data['formErrors'] = null;
                redirect(base_url() . 'index.php/permissoes/add');
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um erro.</p></div>';
            }
        }

        $this->load->view('permissoes/adicionarPermissao', $this->data);
    }

    function editar() {

        $this->data['custom_error'] = '';
        $this->data['formErrors'] = null;
        $this->form_validation->set_rules('nome', 'Nome', 'trim|required');
        if ($this->form_validation->run() == false) {
            $this->data['custom_error'] = (validation_errors() ? '<div class="form_error">' . validation_errors() . '</div>' : false);
        } else {

            $nomePermissao = $this->input->post('nome');
            $situacao = $this->input->post('situacao');
            $permissoes = array(
                'aOS' => $this->input->post('aOS'),
                'eOS' => $this->input->post('eOS'),
                'dOS' => $this->input->post('dOS'),
                'vOS' => $this->input->post('vOS'),
                'iOS' => $this->input->post('iOS'),
                'aUsuario' => $this->input->post('aUsuario'),
                'eUsuario' => $this->input->post('eUsuario'),
                'dUsuario' => $this->input->post('dUsuario'),
                'vUsuario' => $this->input->post('vUsuario'),
                'aTiposEquipamentos' => $this->input->post('aTiposEquipamentos'),
                'eTiposEquipamentos' => $this->input->post('eTiposEquipamentos'),
                'dTiposEquipamentos' => $this->input->post('dTiposEquipamentos'),
                'vTiposEquipamentos' => $this->input->post('vTiposEquipamentos'),
                'aLead' => $this->input->post('aLead'),
                'eLead' => $this->input->post('eLead'),
                'dLead' => $this->input->post('dLead'),
                'vLead' => $this->input->post('vLead'),
                'oLead' => $this->input->post('oLead'),
                'aStatusOS' => $this->input->post('aStatusOS'),
                'eStatusOS' => $this->input->post('eStatusOS'),
                'dStatusOS' => $this->input->post('dStatusOS'),
                'vStatusOS' => $this->input->post('vStatusOS'),
                'aSeguimentolead' => $this->input->post('aSeguimentolead'),
                'eSeguimentolead' => $this->input->post('eSeguimentolead'),
                'dSeguimentolead' => $this->input->post('dSeguimentolead'),
                'vSeguimentolead' => $this->input->post('vSeguimentolead'),
                'aAgenda' => $this->input->post('aAgenda'),
                'eAgenda' => $this->input->post('eAgenda'),
                'dAgenda' => $this->input->post('dAgenda'),
                'vAgenda' => $this->input->post('vAgenda'),
                'tAgenda' => $this->input->post('tAgenda'),
                'aBiblioteca' => $this->input->post('aBiblioteca'),
                'eBiblioteca' => $this->input->post('eBiblioteca'),
                'dBiblioteca' => $this->input->post('dBiblioteca'),
                'vBiblioteca' => $this->input->post('vBiblioteca'),
                'mOS' => $this->input->post('mOS'),
                'mUsuario' => $this->input->post('mUsuario'),
                'mPermissao' => $this->input->post('mPermissao'),
                'mCrm' => $this->input->post('mCrm'),
                'mTiposEquipamentos' => $this->input->post('mTiposEquipamentos'),
                'mStatusOS' => $this->input->post('mStatusOS'),
                'mSeguimentolead' => $this->input->post('mSeguimentolead'),
                'mBiblioteca' => $this->input->post('mBiblioteca'),
            );
            $permissoes = serialize($permissoes);

            $data = array(
                'nome' => $nomePermissao,
                'permissoes' => $permissoes,
                'situacao' => $situacao
            );

            if ($this->permissoes_model->edit('permissoes', $data, 'idPermissao', $this->input->post('idPermissao')) == TRUE) {
                $this->session->set_flashdata('success', 'Permissão editada com sucesso!');
                redirect(base_url() . 'index.php/permissoes/editar/' . $this->input->post('idPermissao'));
            } else {
                $this->data['custom_error'] = '<div class="form_error"><p>Ocorreu um errro.</p></div>';
            }
        }

        $this->data['result'] = $this->permissoes_model->getById($this->uri->segment(3));

        $this->load->view('permissoes/editarPermissao', $this->data);
    }

    function desativar() {

        $id = $this->input->post('id');
        if ($id == null) {
            $this->session->set_flashdata('error', 'Erro ao tentar desativar permissão.');
            redirect(base_url() . 'index.php/permissoes/gerenciar/');
        }
        $data = array(
            'situacao' => false
        );
        if ($this->permissoes_model->edit('permissoes', $data, 'idPermissao', $id)) {
            $this->session->set_flashdata('success', 'Permissão desativada com sucesso!');
        } else {
            $this->session->set_flashdata('error', 'Erro ao desativar permissão!');
        }


        redirect(base_url() . 'index.php/permissoes/gerenciar/');
    }

}

/* End of file permissoes.php */
/* Location: ./application/controllers/permissoes.php */
