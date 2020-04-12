<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Gerenciar ordem de serviço
        <small>Imprimir ordem de serviço</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Gerenciar ordem de serviço</li>
        <li class="active"> Imprimir ordem de serviço</li>
    </ol>
</section>
<section class="content-header">
    <div class="col-xs-12">
        <div class="col-xs-9">
            <h1>STOREOS </h1>
        </div>
        <div class="col-xs-3 text-right">
            <a title="editar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $os->idOS; ?>" class="btn btn-primary btn-lg">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> </a>
            <a class="btn btn-warning btn-lg" name="imprimir" href='javascript:window.print()' >IMPRIMIR</a>
        </div>
    </div>
</section>
<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">
            <div class="col-xs-2">
                <figure class="figure">
                    <img src="<?php echo base_url() ?>assets/imagens/logo.png" title="Logo" width="100%" height="100%" />
                </figure>
            </div>
            <div class="col-xs-10 text-center">
                <div class="col-xs-12">
                    <label>WBA Santos Tecnologia e Software LTDA</label>
                </div>
                <div class="col-xs-12">
                    <label>Rua Euclides da Cunha, 198, bairro Pompéia - Santos</label>
                </div>
                <div class="col-xs-12">
                    <label>Fone: (13)3257-8080 / whatsapp: (13)99774-8943 / E-mail assistencia@wbagestao.com</label>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 text-center">
        _______________________________________________________________________________________________________
    </div>
    <div class="row">
        <div class="col-xs-6">
            <label>ORDEM DE SERVIÇO: <strong> <?php echo strtoupper($os->idOS); ?></strong></label>
        </div>
        <div class="col-xs-3">
            <label>Data: <?php echo strtoupper($os->dataEntrada); ?></label>
        </div>
        <div class="col-xs-3">
            <label>Garantia: <?php
                if ($os->garantia == 1) {
                    echo "SIM";
                } else {
                    echo "NÃO";
                }
                ?></label>
        </div>
    </div>
    <div class="col-md-12 text-center">
        _______________________________________________________________________________________________________
    </div>
    <div class="row">
        <div class="col-xs-9">
            <label>Cliente: <strong> <?php echo ($os->codigoCliente . " / " . $os->nomeCliente . " / " . $os->fantasiaCliente); ?></strong></label>
        </div>
        <div class="col-xs-3">
            <label>CNPJ: <?php echo ($os->cnpjCliente); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Endereço: <?php echo ($os->enderecoCliente); ?></label>
        </div>
        <div class="col-xs-3">
            <label>Cidade: <?php echo ($os->cidadeCliente); ?></label>
        </div>
        <div class="col-xs-3">
            <label>Celular: <?php echo ($os->celularCliente); ?></label>
        </div>
        <div class="col-xs-6">
            <label>E-mail: <?php echo ($os->emailCliente); ?></label>
        </div>
        <div class="col-xs-3">
            <label>Contato: <?php echo ($os->contatoCliente); ?></label>
        </div>
        <div class="col-xs-3">
            <label>Telefone: <?php echo ($os->telefoneCliente); ?></label>
        </div>
    </div>
    <div class="col-md-12 text-center">
        _______________________________________________________________________________________________________
    </div>
    <div class="row">
        <div class="col-xs-8">
            <label>Equipamento: 
                <strong> 
                    <?php
                    foreach ($tipo as $value2) {
                        if ($value2->idTipo == $equipamento->tipo) {
                            echo ( $value2->descricao . " / " .
                            $equipamento->marca . " / " .
                            $equipamento->modelo);
                        }
                    }
                    ?>
                </strong>
            </label>
        </div>
        <div class="col-xs-4">
            <label>Nº Série: <?php echo ($equipamento->serie); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Acessórios: <?php echo ($os->acessorios); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Observações: <?php echo ($os->observacoes); ?></label>
        </div>
        <div class="col-xs-12">
            <label>Defeito reclamado: <?php echo ($os->defeito); ?></label>
        </div>
        <div class="col-xs-12">
            <label>Contrato: <?php echo ($os->defeito); ?></label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul> 
                <li class="text-sm">Declaro estar ciente da taxa de R$30,00 em caso de recusa de orçamento para estabilizadores e nobreaks com capacidade de 1000VA ou superior</li> 
                <li class="text-sm">Declaro estar ciente da taxa de R$15,00 em caso de recusa de orçamento para estabilizadores e nobreaks com capacidade abaixo de 1000VA e monitores</li> 
                <li class="text-sm">Declaro ser de minha responsabilidade a origem e procedência do equipamento constante nesta ordem de serviço</li> 
                <li class="text-sm">Declaro ter ciência e autorizo a venda ou desmanche do meu equipamento caso o mesmo não seja retirado em 90 dias</li> 
                <li class="text-sm">Quando se tratar de computadores ou notebooks, corre única e exclusicamente por responsabilidade docliente a integridade dos dados existentes no mesmo, inclusive cópias de segurança.</li>
                <li class="text-sm">Não nos responsabilizamos no caso de perda de dados, programas e/ou arquivos</li>
            </ul>
        </div>
    </div>
</section>
<div class="col-md-12 text-center">
    ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
</div>
<section class="content">

    <div class="row">
        <div class="col-xs-6">
            <label>ORDEM DE SERVIÇO: <strong> <?php echo strtoupper($os->idOS); ?></strong></label>
        </div>
        <div class="col-xs-3">
            <label>Data: <?php echo strtoupper($os->dataEntrada); ?></label>
        </div>
        <div class="col-xs-3">
            <label>Garantia: <?php
                if ($os->garantia == 1) {
                    echo "SIM";
                } else {
                    echo "NÃO";
                }
                ?>
            </label>
        </div>
    </div>
    <div class="col-md-12 text-center">
        _______________________________________________________________________________________________________
    </div>
    <div class="row">
        <div class="col-xs-9">
            <label>Cliente: <strong> <?php echo ($os->codigoCliente . " / " . $os->nomeCliente . " / " . $os->fantasiaCliente); ?></strong></label>
        </div>
        <div class="col-xs-3">
            <label>CNPJ: <?php echo ($os->cnpjCliente); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Contato: <?php echo ($os->contatoCliente); ?></label>
        </div>
        <div class="col-xs-6">
            <label>E-mail: <?php echo ($os->emailCliente); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Celular: <?php echo ($os->celularCliente); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Telefone: <?php echo ($os->telefoneCliente); ?></label>
        </div>
    </div>
    <div class="col-md-12 text-center">
        _______________________________________________________________________________________________________
    </div>
    <div class="row">
        <div class="col-xs-8">
            <label>Equipamento: <strong> <?php echo ($equipamento->tipo . " / " . $equipamento->marca . " / " . $equipamento->modelo); ?></strong></label>
        </div>
        <div class="col-xs-4">
            <label>Nº Série: <?php echo ($equipamento->serie); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Acessórios: <?php echo ($os->acessorios); ?></label>
        </div>
        <div class="col-xs-6">
            <label>Observações: <?php echo ($os->observacoes); ?></label>
        </div>
        <div class="col-xs-12">
            <label>Defeito reclamado: <?php echo ($os->defeito); ?></label>
        </div>
        <div class="col-xs-12">
            <label>Contrato: <?php echo ($os->defeito); ?></label>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-xs-3">
            <label>Prat. entrada: ___________</label>
        </div>
        <div class="col-xs-3">
            <label>Prat. saída: ___________</label>
        </div>
        <div class="col-xs-6">
            <label>Tensão chegou: Aut. <i class="glyphicon glyphicon-unchecked"></i></label>&nbsp;&nbsp;&nbsp;    110<i class="glyphicon glyphicon-unchecked"></i></label>&nbsp; &nbsp;&nbsp;    220<i class="glyphicon glyphicon-unchecked"></i></label>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12">
            <ul> 
                <li class="text-sm">Declaro estar ciente da taxa de R$30,00 em caso de recusa de orçamento para estabilizadores e nobreaks com capacidade de 1000VA ou superior</li> 
                <li class="text-sm">Declaro estar ciente da taxa de R$15,00 em caso de recusa de orçamento para estabilizadores e nobreaks com capacidade abaixo de 1000VA e monitores</li> 
                <li class="text-sm">Declaro ser de minha responsabilidade a origem e procedência do equipamento constante nesta ordem de serviço</li> 
                <li class="text-sm">Declaro ter ciência e autorizo a venda ou desmanche do meu equipamento caso o mesmo não seja retirado em 90 dias</li> 
                <li class="text-sm">Quando se tratar de computadores ou notebooks, corre única e exclusicamente por responsabilidade docliente a integridade dos dados existentes no mesmo, inclusive cópias de segurança.</li>
                <li class="text-sm">Não nos responsabilizamos no caso de perda de dados, programas e/ou arquivos</li>
            </ul>
        </div>
        <div class="col-xs-6">
            <strong>
                ________________________________________
                <br>
                Cliente
            </strong>
        </div>
    </div>
    <!-- /.row -->

</section>
<!-- /.content -->
<?php $this->load->view('template/footer'); ?>