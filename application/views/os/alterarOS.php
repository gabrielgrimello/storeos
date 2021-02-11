<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Ordem de serviço
        <small>Editar ordem de serviço</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() . 'index.php/os/gerenciar' ?>"> Gerenciar ordem de serviço</a></li>
        <li class="active"> Editar ordem de serviço</li>

    </ol>
</section>
<section class="content">
    <div class="col-md-8 col-md-offset-2">
        <?php if ($formErrors) { ?>
            <div class="alert alert-danger">
                <?= $formErrors ?>
            </div>
            <?php
        } else {
            if ($this->session->flashdata('success_msg')) {
                ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success_msg') ?>
                </div>
                <?php
            }
        }
        ?>

    </div>
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1-1" data-toggle="tab">OS</a></li>
                    <li><a href="#tab_2-2" data-toggle="tab">Timeline</a></li>
                    <li><a href="#tab_3-3" data-toggle="tab">Ckecklist</a></li>
                    <li><a href="#tab_4-4" data-toggle="tab">Peças</a></li>
                    <li><a href="#tab_5-5" data-toggle="tab">Serviços</a></li>
                    <li class="btn-small btn-success btn-small"><a title="imprimir" href="<?php echo base_url() . 'index.php/os/imprimir/' . $os->idOS ?>" >Imprimir <i class="fa-fw glyphicon glyphicon-print"></i> </a></li>

                    <li class="pull-right header"><i class="fa fa-th"></i> Selecione as abas desejadas</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        <form action="<?php echo current_url(); ?>" method="post">
                            <div class="box box-success" >
                                <div class="box-header with-border">
                                    <div class="col-md-3">
                                        <h3 class="box-title">DADOS DO CLIENTE </h3>
                                    </div>

                                    <div class="col-md-2 text-center">
                                        <h3 class="box-title">ORDEM DE SERVIÇO 
                                            <span class="label label-danger"><?php echo $os->idOS; ?></span>
                                        </h3>
                                    </div>
                                    <div class="col-md-3 text-center">
                                        <h3 class="box-title" data-toggle="tooltip" data-placement="top" title="Botão serve para recarregar a página e atualizar o valor total">TOTAL <a href="<?php echo base_url(); ?>index.php/os/editarOS/<?php echo $os->idOS; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-refresh"></i></a>
                                            <span class="label label-danger" ><?php echo "R$ " . number_format($totalGeral, 2); ?></span>
                                        </h3>
                                    </div>
                                    <div class="col-md-4 text-right">
                                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                                            <a href="<?php echo base_url(); ?>index.php/os/gerenciar" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-credit-card"></i> Alterar cliente</a>
                                        <?php } ?>
                                        <a href="<?php echo base_url(); ?>index.php/os/abrirOSMesmoCliente/<?php echo $os->codigoCliente; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-plus-sign"></i> Abrir nova OS para o mesmo cliente</a>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <input type="hidden" name="idOS" id="idOS" value="<?php echo $os->idOS; ?>">
                                    <input type="hidden" name="valorTotal" id="valorTotal" value="<?php echo $totalGeral; ?>">

                                    <div class="form-group col-md-2">
                                        <label>Código</label>
                                        <input type="text" class="form-control" id="codigo" name="codigo" readonly="" value="<?php echo $os->codigoCliente; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>CNPJ/CPF</label>
                                        <input type="text" class="form-control" id="cnpj" name="cnpj" readonly="" value="<?php echo $os->cnpjCliente; ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Razão/Nome</label>
                                        <input type="text" class="form-control" id="razao" name="razao" value="<?php echo $os->nomeCliente; ?>" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Fantasia</label>
                                        <input type="text" class="form-control" id="fantasia" name="fantasia" value="<?php echo $os->fantasiaCliente; ?>" >
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Endereço</label>
                                        <input type="text" class="form-control" id="endereco" name="endereco" value="<?php echo $os->enderecoCliente; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Cidade</label>
                                        <input type="text" class="form-control" id="cidade" name="cidade"  value="<?php echo $os->cidadeCliente; ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>E-mail</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $os->emailCliente; ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Contato</label>
                                        <input type="text" class="form-control" id="contato" name="contato" value="<?php echo $os->contatoCliente; ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Celular</label>
                                        <input type="text" class="form-control" id="celular" name="celular" value="<?php echo $os->celularCliente; ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Telefone</label>
                                        <input type="text" class="form-control" id="telefone" name="telefone" value="<?php echo $os->telefoneCliente; ?>">
                                    </div>
                                </div> <!-- /.box-body -->
                            </div> <!-- /.box box-info-->
                            <div class="box box-success" >
                                <div class="box-header with-border">
                                    <div class="col-md-7">
                                        <h3 class="box-title">DADOS DO EQUIPAMENTO</h3>
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="form-group col-md-4">
                                        <label>Nº série</label>
                                        <input type="text" class="form-control" id="serie" name="serie" readonly=""  value="<?php echo $equipamento->serie; ?>">
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Tipo</label>
                                        <select class="form-control"  disabled="" name="tipo">
                                            <option selected=""></option>
                                            <?php
                                            foreach ($tipo as $value2) {
                                                ?>
                                                <option value = <?php echo $value2->idTipo; ?> <?php
                                                if ($value2->idTipo == $equipamento->tipo) {
                                                    echo "selected";
                                                }
                                                ?> ><?php echo $value2->descricao; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label>Marca</label>
                                        <input type="text" class="form-control" id="marca" name="marca" readonly=""  value="<?php echo $equipamento->marca ?>" >
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Modelo</label>
                                        <input type="text" class="form-control" id="modelo" name="modelo" readonly=""  value="<?php echo $equipamento->modelo ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Patrimônio</label>
                                        <input type="text" class="form-control" id="patrimonio" name="patrimonio" readonly=""  value="<?php echo $equipamento->patrimonio ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Garantia?</label>
                                        <select class="form-control" name="garantia" id="garantia">
                                            <option <?php
                                            if ($os->garantia == 0) {
                                                echo 'selected';
                                            }
                                            ?> value="0">Não</option>
                                            <option <?php
                                            if ($os->garantia == 1) {
                                                echo 'selected';
                                            }
                                            ?> value="1">Sim</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 text-right">

                                        <br>
                                        <a data-toggle="tooltip" data-placement="top" title="Aqui você altera o equipamento atual por outro equipamento." href="<?php echo base_url(); ?>index.php/os/alterarEquipamentoOsExistente/<?php echo $os->idOS; ?>/<?php echo $os->codigoCliente; ?>" class="btn btn-success btn-xs"><i class="glyphicon glyphicon-credit-card"></i> Alterar equipamento</a>
                                        <a data-toggle="tooltip" data-placement="top" title="Aqui você edita informações do equipamento como marca, modelo, serie, etc" href="<?php echo base_url(); ?>index.php/os/editarEquipamentos/<?php echo $os->idOS; ?>/<?php echo $equipamento->idEquipamento; ?>" class="btn btn-primary btn-xs"><i class="glyphicon glyphicon-credit-card"></i> Editar dados do equipamento</a>
                                    </div>
                                </div>
                            </div>
                            <div class="box box-success" >
                                <div class="box-header with-border">
                                    <div class="col-md-3">
                                        <h3 class="box-title">DADOS DA OS</h3>
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="box-title">Data Entrada: <?php
                                            $dateEntrada = date_create_from_format('Y-m-d', $os->dataEntrada);
                                            echo date_format($dateEntrada, 'd-m-Y');
                                            ?> </h4> 
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="box-title">Data Alteração: <?php
                                            $dateAlteracao = date_create_from_format('Y-m-d', $os->dataAlteracao);
                                            echo date_format($dateAlteracao, 'd-m-Y');
                                            ?>  </h4> 
                                    </div>
                                    <div class="col-md-3">
                                        <h4 class="box-title">Data Saída: <?php
                                            if ($os->dataEncerra != NULL) {
                                                $dateSaida = date_create_from_format('Y-m-d', $os->dataEncerra);
                                                echo date_format($dateSaida, 'd-m-Y');
                                            }
                                            ?> </h4> 
                                    </div>
                                </div>
                                <div class="box-body">
                                    <div class="col-md-3">
                                        <label>Status</label>
                                        <select name="status" id="status" class="form-control" value="<?= set_value('status') ?>">
                                            <option value="">Selecione status</option>
                                            <?php
                                            foreach ($statusAberto as $value) {
                                                ?>
                                                <option value = "<?php echo $value->idStatus; ?>" <?php
                                                if ($value->idStatus == $os->status) {
                                                    echo "selected";
                                                }
                                                ?> ><?php echo $value->descricao; ?></option>
                                                        <?php
                                                    }
                                                    ?>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Prat. entr.</label>
                                        <input type="text" class="form-control" id="prateleiraEntrada" name="prateleiraEntrada" value="<?php echo $os->prateleiraEntrada ?>">
                                    </div>
                                    <div class="form-group col-md-1">
                                        <label>Prat. saída</label>
                                        <input type="text" class="form-control" id="prateleiraSaida" name="prateleiraSaida" value="<?php echo $os->prateleiraSaida ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Apont. garantia</label>
                                        <input type="text" class="form-control" id="apontGarantia" name="apontGarantia" value="<?php echo $os->apontGarantia ?>">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label>Nº nota garantia</label>
                                        <input type="text" class="form-control" id="nota" name="notaGarantia" value="<?php echo $os->notaGarantia ?>">
                                    </div>
                                    <div class="form-group col-md-3">
                                        <label>Tensão entrada</label>
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="tensaoEntrada" value="Automatico" <?php
                                                if ($os->tensaoEntrada == "Automatico") {
                                                    echo "checked";
                                                }
                                                ?>>
                                                Autom.
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="tensaoEntrada" value="220v" <?php
                                                if ($os->tensaoEntrada == "220v") {
                                                    echo "checked";
                                                }
                                                ?>>
                                                220v
                                            </label>
                                            &nbsp;&nbsp;&nbsp;
                                            <label>
                                                <input type="radio" name="tensaoEntrada" value="110v" <?php
                                                if ($os->tensaoEntrada == "110v") {
                                                    echo "checked";
                                                }
                                                ?>>
                                                110v
                                            </label>
                                        </div>

                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Acessórios</label>
                                        <input type="text" class="form-control" id="acessorios" name="acessorios" value="<?php echo $os->acessorios ?>">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label>Observações</label>
                                        <input type="text" class="form-control" id="observacoes" name="observacoes" value="<?php echo $os->observacoes ?>">
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>*Defeito reclamado</label>
                                        <textarea id="defeito" name="defeito" class="form-control" rows="4" required="" ><?php echo $os->defeito ?></textarea>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label>Laudo técnico(preenchido pelo técnico)</label>
                                        <textarea id="laudo" name="laudo" class="form-control" rows="10" ><?php echo $os->laudo ?></textarea>
                                    </div>
                                    <div class="form-group col-md-6 text-left">
                                        <button <?php
                                        if ($os->dataEncerra == TRUE) {
                                            echo "disabled";
                                        }
                                        ?> type="button" class="btn btn-success" data-toggle="modal" data-target="#modalEncerrarOS">
                                            Encerrar OS
                                        </button>
                                    </div>
                                    <div class="form-group col-md-6 text-right">
                                        <a title="cancelar" href="<?php echo base_url() ?>index.php/os/gerenciar" class="btn btn-danger btn-small"><i class="glyphicon glyphicon-remove"></i></a>
                                        <button <?php
                                        if ($os->dataEncerra == TRUE) {
                                            echo "disabled";
                                        }
                                        ?> type="submit"  class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                                    </div>
                                </div> <!-- /.box-body -->
                            </div> <!-- /.box box-info-->
                        </form><!-- /.tab-pane -->
                    </div>
                    <!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog -->
                    <div class="modal modal-default fade" id="modalEncerrarOS" style="display: none;">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">×</span></button>
                                    <h4 class="modal-title">ENCERRAR ORDEM DE SERVIÇO</h4>
                                </div>
                                <div class="modal-body">
                                    <form action="<?php echo base_url() ?>index.php/os/encerrarOS" method="post">
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div >
                                                    <div>
                                                        <div class="col-md-12">
<?php echo form_hidden('idOS', $os->idOS) ?>
                                                            <div class="form-group">
                                                                <label>Status</label>
                                                                <select class="form-control" name="status">
                                                                    <?php
                                                                    foreach ($statusEncerrado as &$value) {
                                                                        ?>
                                                                        <option value = <?php echo $value->idStatus; ?> >
                                                                        <?php echo $value->descricao; ?></option>
                                                                        <?php
                                                                    }
                                                                    ?>
                                                                </select>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="glyphicon glyphicon-remove"></i></button>
                                            <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i></button>
                                        </div>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div> <!-- /.modal-dialog -->
                    </div> <!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog --><!-- /.modal-dialog -->
                    <div class="tab-pane" id="tab_2-2">
                        <!-- TIME LINE - INICIO DO CODIGO -->
                        <div class="row">
                            <div class="col-md-12">
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                                    Adicionar Timeline
                                </button>
                                <br><br>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">×</span></button>
                                                <h4 class="modal-title">Adicionar timeline</h4>
                                            </div>
                                            <div class="modal-body">
                                                <form id="formTimeline" action="<?php echo base_url() ?>os/adicionarTimeline" method="post">
                                                    <div class="col-md-10">

                                                        <input type="hidden" name="idos" id="idos" value="<?php echo $os->idOS ?>" />
                                                        <label for="">Descrição</label>
                                                        <textarea class="form-control" name="descricao" id="descricao" rows="3" placeholder="Descreva o que foi conversado com o cliente"></textarea>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <button class="btn btn-success span12" id="btnAdicionarTimeline"><i class="icon-white icon-plus"></i> Adicionar</button>  
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="modal-footer">

                                            </div>
                                        </div>
                                        <!-- /.modal-content -->
                                    </div>
                                    <!-- /.modal-dialog -->
                                </div>


                            </div>
                        </div>
                        <div class="bg-gray-light">
                            <ul class="timeline" id="divTimeline">
                                <?php
                                foreach ($timeline as $t) {
                                    ?>
                                    <!-- timeline time label -->
                                    <li class="time-label">

                                        <span class="bg-green">
                                            <?php
                                            echo $t->data;
                                            ?>
                                        </span>
                                    </li><!-- /.timeline-label -->
                                    <li> <!-- timeline item -->
                                        <i class="fa fa-comments bg-yellow"></i> <!-- timeline icon -->
                                        <div class="timeline-item" >
                                            <h3 class="timeline-header"><a class="text blue"><?php echo $t->nome; ?> </a> 
    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dAgenda')) { ?>
                                                    <form  action="<?php echo base_url() ?>os/excluirTimeline" method="post">
                                                        <input type="hidden" name="idTimeline_os" id="idTimeline_os" value="<?php echo $t->idTimeline_os ?> ">
                                                        <input type="hidden" name="idos" id="id_os" value="<?php echo $os->idOS ?> ">
                                                        <button class="btn btn-xs btn-danger"> <i class="glyphicon glyphicon-trash"></i></button>
                                                    </form>
                                                <?php } ?>                                    
                                            </h3>
                                            <div class="timeline-body">
    <?php echo nl2br($t->descricao) ?>
                                            </div>  
                                        </div>
                                    </li><!-- TIME LINE - FIM DO CODIGO -->
                                    <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </div>
                    <!-- ABA CHECKLIST-->
                    <div class="tab-pane" id="tab_3-3">
                        <?php if (($equipamento->tipo == 3 or $equipamento->tipo == 10) and $countChecklistComputador == 0) { ?>
                            <a href="<?php echo base_url(); ?>index.php/os/adicionarChecklistComputador/<?php echo $os->idOS; ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Checklist</a>
                        <?php } ?>
                        <?php if (($equipamento->tipo == 1 or $equipamento->tipo == 2) and $countChecklistNobreakEstabilizador == 0) { ?>
                            <a href="<?php echo base_url(); ?>index.php/os/adicionarChecklistNobreakEstabilizador/<?php echo $os->idOS; ?>" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar Checklist</a>
<?php } ?>
<?php if (($equipamento->tipo == 3 or $equipamento->tipo == 10) and $countChecklistComputador > 0) { ?>
                            <div class="box box-success">
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <span class="icon">
                                            <i class="icon-barcode"></i>
                                        </span>
                                    </div>
                                    <div class="widget-content nopadding table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-condensed ">
                                            <thead>
                                                <tr style="backgroud-color: #2D335B">
                                                    <th>ID checklist</th>
                                                    <th>Técnico avaliação</th>
                                                    <th>Data Avaliação</th>
                                                    <th>Técnico reparo</th>
                                                    <th>Data Reparo</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <?php foreach ($checklistComputador as $r) { ?>
                                                    <tr> 
                                                        <td class="text-middle ng-binding"><?php echo $r->idCheckComputador; ?></td>
                                                        <td class="text-middle ng-binding"><?php echo $r->tecnicoAvaliacao; ?></td> 
                                                        <td class="text-middle ng-binding"><?php echo $r->dataAvaliacao; ?></td> 
                                                        <td class="text-middle ng-binding"><?php echo $r->tecnicoReparo; ?></td> 
                                                        <td class="text-middle ng-binding"><?php echo $r->dataReparo; ?></td> 
                                                        <td class="text-center text-middle ng-binding">
                                                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) { ?>
                                                                <a title="editar" href="<?php echo base_url() ?>index.php/os/editarChecklistComputador/<?php echo $r->idCheckComputador; ?>" class="btn btn-primary btn-xs "><i class="fa-fw glyphicon glyphicon-edit"></i> </a>
                                                            <?php } ?>
                                                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOS')) { ?>
                                                                <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idCheckComputador; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
        <?php } ?>
                                                            <!--MODAL BOTÃO EXCLUIR-->
                                                            <div class="modal modal-default fade" id="modal-danger<?php echo $r->idCheckComputador; ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span></button>
                                                                            <h4 class="modal-title">Deseja excluir o checklist da OS <?php echo $r->idOS; ?>?</h4>
                                                                        </div>
                                                                        <form action="<?php echo base_url() ?>index.php/os/excluirChecklistComputador" method="post">
                                                                            <input type="hidden" id="idChecklistNobreakEstabilizadorExcluir" name="idChecklistComputadorExcluir" value="<?php echo $r->idCheckComputador; ?>">
                                                                            <input type="hidden" id="idOS" name="idOS" value="<?php echo $r->idOS; ?>">
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                                                                <button type="submit" class="btn btn-danger ">Excluir<i class="icon-remove icon-white"></i></button>
                                                                            </div>
                                                                        </form>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                            <!--MODAL BOTÃO EXCLUIR-->
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
<?php } ?>
<?php if (($equipamento->tipo == 1 or $equipamento->tipo == 2) and $countChecklistNobreakEstabilizador > 0) { ?>
                            <div class="box box-success">
                                <div class="widget-box">
                                    <div class="widget-title">
                                        <span class="icon">
                                            <i class="icon-barcode"></i>
                                        </span>
                                    </div>
                                    <div class="widget-content nopadding table-responsive">
                                        <table class="table table-bordered table-hover table-striped table-condensed ">
                                            <thead>
                                                <tr style="backgroud-color: #2D335B">
                                                    <th>ID checklist</th>
                                                    <th>Técnico avaliação</th>
                                                    <th>Data Avaliação</th>
                                                    <th>Técnico reparo</th>
                                                    <th>Data Reparo</th>
                                                    <th>Ações</th>
                                                </tr>
                                            </thead>
                                            <tbody>
    <?php foreach ($checklistNobreakEstabilizador as $r) { ?>
                                                    <tr> 
                                                        <td class="text-middle ng-binding"><?php echo $r->idCheckNobEst; ?></td>
                                                        <td class="text-middle ng-binding"><?php echo $r->tecnicoAvaliacao; ?></td> 
                                                        <td class="text-middle ng-binding"><?php echo $r->dataAvaliacao; ?></td> 
                                                        <td class="text-middle ng-binding"><?php echo $r->tecnicoReparo; ?></td> 
                                                        <td class="text-middle ng-binding"><?php echo $r->dataReparo; ?></td> 
                                                        <td class="text-center text-middle ng-binding">
                                                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) { ?>
                                                                <a title="editar" href="<?php echo base_url() ?>index.php/os/editarChecklistNobreakEstabilizador/<?php echo $r->idCheckNobEst; ?>/<?php echo $r->idOS; ?>" class="btn btn-primary btn-xs "><i class="fa-fw glyphicon glyphicon-edit"></i> </a>
                                                            <?php } ?>
                                                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOS')) { ?>
                                                                <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idCheckNobEst; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
        <?php } ?>
                                                            <!--MODAL BOTÃO EXCLUIR-->
                                                            <div class="modal modal-default fade" id="modal-danger<?php echo $r->idCheckNobEst; ?>">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <div class="modal-header">
                                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                                <span aria-hidden="true">×</span></button>
                                                                            <h4 class="modal-title">Deseja excluir o checklist da OS <?php echo $r->idOS; ?>?</h4>
                                                                        </div>
                                                                        <form action="<?php echo base_url() ?>index.php/os/excluirChecklistNobreakEstabilizador" method="post">
                                                                            <input type="hidden" id="idChecklistNobreakEstabilizadorExcluir" name="idChecklistNobreakEstabilizadorExcluir" value="<?php echo $r->idCheckNobEst; ?>">
                                                                            <input type="hidden" id="idOS" name="idOS" value="<?php echo $r->idOS; ?>">
                                                                            <div class="modal-footer">
                                                                                <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                                                                <button type="submit" class="btn btn-danger ">Excluir<i class="icon-remove icon-white"></i></button>
                                                                            </div>
                                                                        </form>
                                                                    </div><!-- /.modal-content -->
                                                                </div><!-- /.modal-dialog -->
                                                            </div>
                                                            <!--MODAL BOTÃO EXCLUIR-->
                                                        </td>
                                                    </tr>

                                                    <?php
                                                }
                                                ?>
                                                <tr>

                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
<?php } ?>
                    </div>
                    <!-- ABA PEÇAS  -->
                    <div class="tab-pane" id="tab_4-4">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Insira as peças na ordem de serviço</h3>
                            </div>
                            <div class="box-body">

                                <form id="formProdutos" action="<?php echo base_url() ?>index.php/os/adicionarProduto" method="post">
                                    <div class="col-md-9">
                                        <input type="hidden" name="idOS" id="idOS" value="<?php echo $os->idOS; ?>" />
                                        <label for="">Produto</label>
                                        <select class="produtos-js-ajax col-md-12" id="produto" name="produto" placeholder="Digite o produto" style="width: 100%"></select>
                                    </div>
                                    <div class="col-md-2">
                                        <label for="">Quantidade</label>
                                        <input type="number" id="quantidade" name="quantidade" class="form-control" value="1" />
                                    </div>
                                    <div class="col-md-1">
                                        <br>
                                        <button class="btn btn-success span6" id="btnAdicionarProduto"><i class="fa fa-plus"></i></button>
                                    </div>
                                </form>
                            </div>

                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Produtos adicionados à ordem de serviço</h3>
                            </div>
                            <div  id="divProdutos" class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Produto</th>
                                            <th>Quantidade</th>
                                            <th>Unitário</th>
                                            <th>Sub-total</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php
                                        $totalPecas = 0;
                                        foreach ($pecas as $p) {

                                            $totalPecas = $totalPecas + $p->total;
                                            echo '<tr>';
                                            echo '<td>' . $p->codigoProduto . '</td>';
                                            echo '<td>' . $p->descricao . '</td>';
                                            echo '<td>' . $p->quantidade . '</td>';
                                            echo '<td>R$ ' . number_format($p->unitario, 2, ',', '.') . '</td>';
                                            echo '<td>R$ ' . number_format($p->total, 2, ',', '.') . '</td>';
                                            echo '<td><a href="" idAcao="' . $p->idProduto_OS . '"  class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></a></td>';
                                            echo '</tr>';
                                        }
                                        ?>

                                        <tr>
                                            <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$ <?php echo number_format($totalPecas, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalPecas, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--  ABA DE SERVIÇOS -->
                    <div class="tab-pane" id="tab_5-5">
                        <div class="box box-success">
                            <div class="box-header with-border">
                                <h3 class="box-title">Insira os serviços na ordem de serviço</h3>
                            </div>
                            <div class="box-body">
                                <form id="formServicos" action="<?php echo base_url() ?>index.php/os/adicionarServico" method="post">
                                    <div class="col-md-9">
                                        <input type="hidden" name="idOS" id="idOS" value="<?php echo $os->idOS ?>" />
                                        <label for="">Serviço</label>
                                        <select class="servicos-js-ajax col-md-12" id="servico" name="servico" placeholder="Digite o serviço" style="width: 100%"></select>
<!--                                    <input type="text" name="servico" id="servico" class="form-control" placeholder="Digite o serviço">-->
                                    </div>
                                    <div class="col-md-2">
                                        <label >Quantidade</label>
                                        <input type="number" id="quantidadeserv" name="quantidadeserv" value="1" class="form-control" />
                                    </div>
                                    <div class="col-md-1">
                                        <br>
                                        <button class="btn btn-success span12" id="btnAdicionarServico"><i class="fa fa-plus"></i></button>
                                    </div>
                                </form>
                            </div>
                        </div>

                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Serviços adicionados à ordem de serviço</h3>
                            </div>
                            <div  id="divServicos" class="box-body table-responsive no-padding">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Código</th>
                                            <th>Serviço</th>
                                            <th>Quantidade</th>
                                            <th>Unitário</th>
                                            <th>Sub-total</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $totalServicos = 0;
                                        foreach ($servicos as $s) {

                                            $totalServicos = $totalServicos + $s->total;
                                            echo '<tr>';
                                            echo '<td>' . $s->codigoServico . '</td>';
                                            echo '<td>' . $s->descricao . '</td>';
                                            echo '<td>' . $s->quantidade . '</td>';
                                            echo '<td>R$ ' . number_format($s->unitario, 2, ',', '.') . '</td>';
                                            echo '<td>R$ ' . number_format($s->total, 2, ',', '.') . '</td>';
                                            echo '<td><span href="" idAcao="' . $s->idServico_OS . '"  class="btn btn-danger">Excluir<i class="icon-remove icon-white"></i></span></td>';
                                            echo '</tr>';
                                        }
                                        ?>
                                        <tr>
                                            <td colspan="4" style="text-align: right"><strong>Total:</strong></td>
                                            <td><strong>R$ <?php echo number_format($totalServicos, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($totalServicos, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
<?php $this->load->view('template/footer'); ?>

<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $("#btAtualizarValor").click(function () {
                $("#codigo").val($("#codprod").val());
                $("#produto").val($("#nomeprod").val());
                $("#quantidade").val('1');
                $("#vlunitario").val($("#vlunitariomodal").val());


            });
        });

        $("#formProdutos").validate({
            rules: {
                produto: {required: true},
                quantidade: {required: true}
            },
            messages: {
                produto: {required: 'Verifique se o produto está digitado corretamente'},
                quantidade: {required: 'Digite a quantidade'}
            },
            submitHandler: function (form) {

                var dados = $(form).serialize();
                $("#divProdutos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarProduto",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#produto").val('');
                            $("#quantidade").val('1');
                            $("produto").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;


            }

        });


        $(document).on('click', 'a', function (event) {
            var idProduto_OS = $(this).attr('idAcao');

            if ((idProduto_OS % 1) == 0) {
                $("#divProdutos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirProduto",
                    data: "idProduto_OS=" + idProduto_OS,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });

        $("#formServicos").validate({
            rules: {
                servico: {required: true},
                quantidadeserv: {required: true}
            },
            messages: {
                servico: {required: 'Insira o nome do serviço'},
                quantidadeserv: {required: 'Digite a quantidade'}
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divServicos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarServico",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#servico").val('');
                            $("#quantidadeserv").val('1');
                            $("#servico").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;
            }
        });

        $(document).on('click', 'span', function (event) {
            var idServico_OS = $(this).attr('idAcao');

            if ((idServico_OS % 1) == 0) {
                $("#divServicos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirServico",
                    data: "idServico_OS=" + idServico_OS,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });

        $(".datepicker").datepicker({dateFormat: 'dd/mm/yy'});

    });

</script>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".produtos-js-ajax").select2({
        //    tags: true, //PODE ESCOLHER O QUE DIGITOU MESMO QUE NAO TENHA NA BUSCA
        //multiple: true, //PODE ESCOLHER MAIS DE UMA OPÇÃO

        tokenSeparators: [',', ' '],
        minimumInputLength: 3,
        minimumResultsForSearch: 10,
        ajax: {
            url: BASE_URL + 'index.php/os/pesquisaProduto',
            dataType: "json",
            quietMillis: 500,
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                };
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data.value, function (item) {
                        return {
                            text: item.codigo + " - " + item.nome + " - " + item.precovenda,
                            id: item.codigo + " - " + item.nome + " - " + item.precovenda
                        };
                    })
                };
            }
        }

    });

</script>   
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".servicos-js-ajax").select2({
        //    tags: true, //PODE ESCOLHER O QUE DIGITOU MESMO QUE NAO TENHA NA BUSCA
        //multiple: true, //PODE ESCOLHER MAIS DE UMA OPÇÃO

        tokenSeparators: [',', ' '],
        minimumInputLength: 3,
        minimumResultsForSearch: 10,
        ajax: {
            url: BASE_URL + 'index.php/os/pesquisaServico',
            dataType: "json",
            quietMillis: 500,
            type: "GET",
            data: function (params) {
                var queryParameters = {
                    term: params.term
                };
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data.value, function (item) {
                        return {
                            text: item.codigo + " - " + item.nome + " - " + item.precovenda,
                            id: item.codigo + " - " + item.nome + " - " + item.precovenda
                        };
                    })
                };
            }
        }

    });

</script>   
<script>
    var BASE_URL = "<?php echo base_url(); ?>";

    $(document).ready(function () {

        $("#servico").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: BASE_URL + "index.php/os/pesquisaServico",
                    data: {
                        term: request.term

                    },
                    dataType: "json",
                    success: function (data) {
                        var resp = $.map(data.value, function (obj) {
                            return obj.codigo + " - " + obj.nome + " - " + obj.precovenda;

                        });

                        response(resp);

                    }
                });
            },
            minLength: 3,
            delay: 1000

        });
    });

</script> 
