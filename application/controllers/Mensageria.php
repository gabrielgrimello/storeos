<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Mensageria extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->model('Mensageria_model');
        $this->load->model('OS_model');
    }

    public function index() {
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $data = $this->telegram_lib->sendmsg("Testando...");
        $data2 = $this->telegram_lib->updates();

        echo "<pre>";
        print_r($data);
        echo "<BR><BR><BR>";
        print_r($data2);

        $teste = $data2['result'];
        foreach ($teste as $value) {
            $mensagem = $value['message'];
            $chat = $mensagem['chat'];
            echo "UPDATE ID: " . $value['update_id'];
            echo "<BR>";

            echo "MENSAGEM ID: " . $mensagem['message_id'];
            echo "<BR>";

            echo "MENSAGEM DE TEXTO " . $mensagem['text'];
            echo "<BR>";

            if ($mensagem['text'] == "Ola") {
                $data = $this->telegram_lib->sendmsg("Olá, tudo bem?");
            }

            echo "ID DA CONVERSA " . $chat['id'];
            echo "<BR>";

            echo "NOME " . $chat['first_name'] . " SOBRENOME: " . $chat['last_name'];
            echo "<BR><br><br>";
        }


        die;
        $this->load->view('telegram');
    }

    public function pegaOsEnviarEmail() {
        $where['status'] = 6;
        $os = $this->Mensageria_model->getOsEnviarEmail('idOS, nomeCliente, emailCliente', 'ordem_servico', $where);

        if ($os) {
            foreach ($os as $s) {
                $this->email($s->idOS, $s->nomeCliente, $s->emailCliente);
            }
        } else {
            echo "Não encontrei nenhum cliente";
        }
    }

    private function atualizarStatusOs($os) {
        $dados = [
            'status' => 16,
            'dataAlteracao' => date("Y/m/d"),
        ];
        $editado = $this->Mensageria_model->edit('ordem_servico', $dados, 'idOS', $os);
        $this->addTimeline($os, "E-mail automático enviado com sucesso", "Storeos serviço de e-mail");
        if ($editado) {
            return true;
        } else {
            return false;
        }
    }

    private function email($os, $contato, $email) {

        $para = $email;
        $assunto = "Informação WBA | A OS $os ficou pronta";
        $mensagem = "Olá  $contato,<br>
    Seu equipamento da <strong> ordem de serviço $os </strong> já está pronto e pode ser retirado.<br><br>
    
    Estamos localizados na Rua Marquês de São Vicente, 134, Campo Grande, Santos.<br>
    https://goo.gl/maps/strHEbHcvnpgpNYZ6  <br>
    Abertos de Segunda à sexta das 08:00 até 17:30hrs<br><br>

    Caso tenha alguma dúvida você também pode nos chamar por whatsapp através do número <a href='https://api.whatsapp.com/send?phone=5513997748943'><strong>(13)99774-8943</strong></a><br>

    <strong>ATENÇÃO. Essa mensagem é automática, caso tenha mais Ordens de Serviço abertas, aguarde até que nossa equipe entre em contato.</strong><br><br>

    Tenha uma excelente semana.<br>
    Atenciosamente<br>
    Carol, assistência técnica WBA SANTOS.";

        $retorno = $this->dispararEmail($os, $para, $assunto, $mensagem);
        echo $retorno;
    }

    private function dispararEmail($os, $para, $assunto, $mensagem) {

        $this->load->model('mensageria_model');
        $whereEmail = array();
        $whereEmail['idEmailConfig'] = 1;
        $configuracoes = $this->mensageria_model->get('email_config', $whereEmail);

        $this->load->library('email');

        $this->email->from($configuracoes->email, $configuracoes->nome);
        $this->email->to($para);
        $this->email->cc('assistencia@wbagestao.com');

        $this->email->subject($assunto);
        $this->email->message($mensagem);

        if ($this->email->send()) {
            if ($this->atualizarStatusOs($os)) {
                return "OS $os Enviada com sucesso e atualizads com sucesso<br>";
            }
            return "OS $os Enviada com sucesso e mas não atualizou com sucesso<br>";
        } else {
            return $this->email->print_debugger(array('headers'));
        }
    }

    public function novocadastro() {
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $data = $this->telegram_lib->sendmsg("Testando...");
        $data2 = $this->telegram_lib->updates();
    }

    public function automatico() {
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        ?>
        }
        <script>
            alert("teste");
            window.onload = function () {
                $.post('<?php echo base_url(); ?>index.php/mensageria/email', {destino: "gabrielgrimello@gmail.com", assunto: "post botao", mensagem: "mensagem"},
                        function () {
                        });
                alert("teasd");
            };

        </script>
        <?php
    }

    public function emailTeste() {
        if ((!session_id()) || (!$this->session->userdata('logado'))) {
            redirect(base_url() . 'index.php/login');
        }
        $dadoslogin = $this->session->all_userdata();
        $this->load->config('email');
        $this->load->library('email');

        $destino = $this->input->post('destino');
        $assunto = $this->input->post('assunto');
        $mensagem = $this->input->post('mensagem');
        $from = $this->config->item('smtp_user');

        if ($destino) {
            $this->email->from($from, $dadoslogin['nome']);
            $this->email->set_newline("\r\n");
            $this->email->to($destino);
            $this->email->subject($assunto);
            $this->email->message($mensagem);
//$this->email->attach("C:\Users\gabri\Desktop\locapas.txt");

            if ($this->email->send())
                $this->session->set_flashdata('success_msg', 'E-mail enviado com sucesso!');
            else
                show_error($this->email->print_debugger());
        }
        $this->load->view('mensageria/email');
    }

    public function addTimeline($os, $mensagem, $responsavel) {
        date_default_timezone_set('America/Sao_Paulo');
        $date = date('d-m-Y H:i');
        $idos = $os;
        $descricao = $mensagem;
        $nome = $responsavel;

        $data = array(
            'idos' => $idos,
            'descricao' => $descricao,
            'nome' => $nome,
            'data' => $date
        );

        if ($this->OS_model->add('timeline_os', $data) == true) {
            return true;
        } else {
            return false;
        }
    }

}
