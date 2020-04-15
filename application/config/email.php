<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//configurações para envio de email
$whereEmail = array();
$whereEmail['idEmailConfig'] = 1;
$configuracoes = $this->mensageria_model->get('email_config', $whereEmail);
var_dump($configuracoes);
$config = array(
    'protocol' => $configuracoes->protocolo, // 'mail', 'sendmail', or 'smtp'
    'smtp_host' => $configuracoes->endereco,
    'smtp_port' => $configuracoes->porta,
    'smtp_user' => $configuracoes->email,
    'smtp_pass' => $configuracoes->senha,
    'smtp_crypto' => $configuracoes->criptografia, //can be 'ssl' or 'tls' for example
    'mailtype' => $configuracoes->tipo, //plaintext 'text' mails or 'html'
    'smtp_timeout' => '4', //in seconds
    'charset' => 'UTF-8',
    'wordwrap' => TRUE
);

//
//<?php
//defined('BASEPATH') OR exit('No direct script access allowed');
//
//$config = array(
//    'protocol' => 'smtp', // 'mail', 'sendmail', or 'smtp'
//    'smtp_host' => 'smtp.hostinger.com.br', 
//    'smtp_port' => 587,
//    'smtp_user' => '',
//    'smtp_pass' => '',
//    'smtp_crypto' => 'tls', //can be 'ssl' or 'tls' for example
//    'mailtype' => 'html', //plaintext 'text' mails or 'html'
//    'smtp_timeout' => '4', //in seconds
//    'charset' => 'UTF-8',
//    'wordwrap' => TRUE
//);