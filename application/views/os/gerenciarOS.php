<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h4>
        Ordem de serviço   
        <small>Gerenciar ordem de serviço</small>
    </h4>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar ordem de serviço</li>
    </ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">FILTROS DE BUSCA</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div><!-- /.box-tools -->
                </div> <!-- /.box-header -->
                <div class="box-body">
                    <form method="get" action="<?php echo base_url(); ?>index.php/os/gerenciar"> <!-- INICIO DE FORM DE FILTRO DE BUSCA -->
                        <div class="row">
                            <div class="col-md-2">
                                <input class="form-control" type="number" name="idOS"  id="idOS"  placeholder="OS" value="<?php
                                if ($osget) {
                                    echo $osget;
                                }
                                ?>" > 
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="number" name="cnpj"  id="cnpj"  placeholder="CNPJ" value="<?php
                                if ($cnpjget) {
                                    echo $cnpjget;
                                }
                                ?>" > 
                            </div>
                            <div class="col-md-3">
                                <input class="form-control" type="text" name="nomeCliente"  id="cnpj"  placeholder="Razão social" value="<?php
                                if ($razaoget) {
                                    echo $razaoget;
                                }
                                ?>" > 
                            </div>
                            <div class="col-md-4">
                                <input class="form-control" type="text" name="fantasiaCliente"  id="cnpj"  placeholder="Fantasia" value="<?php
                                if ($fantasiaget) {
                                    echo $fantasiaget;
                                }
                                ?>" > 
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="form-group col-md-6">
                                <label>Status</label>
                                <select name="status[]" id="status" class="form-control select2 select2-hidden-accessible" multiple="" data-placeholder="Selecione um ou mais status" style="width: 100%;" tabindex="-1" aria-hidden="true">
                                    <?php
                                    foreach ($status as $value) {
                                        ?>
                                        <option value = "<?php echo $value->idStatus; ?>" <?php
                                        if ($statusget) {
                                            for ($i = 0; $i < sizeof($statusget); $i++) {
                                                if ($value->idStatus == $statusget[$i]) {
                                                    echo "selected";
                                                }
                                            }
                                        }
                                        ?> ><?php echo $value->descricao; ?></option>
                                                <?php
                                            }
                                            ?>
                                </select>
                            </div>
                            <div class="form-group col-md-3 col-lg-1">
                                <div>
                                    <input type="radio" name="abertoFechado"  id="abertoFechado" <?php
                                    if ($abertoFechadoget == "") {
                                        echo "checked";
                                    }
                                    ?> value="">
                                    <label>Todos</label>
                                </div>
                                <div>
                                    <input type="radio" name="abertoFechado"  id="abertoFechado" <?php
                                    if ($abertoFechadoget == "nao") {
                                        echo "checked";
                                    }
                                    ?> value="nao">
                                    <label>Abertos</label>
                                </div>
                                <div>
                                    <input type="radio" name="abertoFechado"  id="abertoFechado" <?php
                                    if ($abertoFechadoget == "sim") {
                                        echo "checked";
                                    }
                                    ?> value="sim">
                                    <label>Fechados</label>
                                </div>
                            </div>
                            <div class="form-group col-md-4  col-lg-2">
                                <label>Data encerrada inicial</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="date" class="form-control" name="filtroDataEncerraMaior" id="filtroDataEncerraMaior" value="<?php echo $filtroDataEncerraMaior ?>">
                                </div> <!-- /.input group -->
                            </div>
                            <div class="form-group col-md-4  col-lg-2">
                                <label>Data encerrada final</label>
                                <div class="input-group">
                                    <div class="input-group-addon">
                                        <i class="fa fa-clock-o"></i>
                                    </div>
                                    <input type="date" class="form-control" name="filtroDataEncerraMenor" id="filtroDataEncerraMenor" value="<?php echo $filtroDataEncerraMenor ?>">
                                </div>
                            </div>
                            <label>.</label>
                            <div class="col-md-1 text-right">
                                <a href="<?php echo base_url(); ?>index.php/os/gerenciar" class="btn btn-primary"><i class="glyphicon glyphicon-erase"></i></a>
                                <button class="btn btn-danger"> <i class="glyphicon glyphicon-search"></i></button>
                            </div>
                        </div>

                    </form> <!-- FIM DE FORM DE FILTRO DE BUSCA -->
                </div> <!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <div class="col-md-10">
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aOS')) { ?>
                            <a href="<?php echo base_url(); ?>index.php/os/adicionarOS" class="btn btn-success btn-sm"><i class="glyphicon glyphicon-plus-sign"></i> Adicionar OS</a>
                        <?php } ?>
                    </div>

                    <div class="col-md-2 text-right">
                       <!-- <a title="Exportar" href="<?php// echo base_url(); ?>index.php/os/exportarExcelListaOS?<?php// echo "status=" . $statusget . "&abertoFechado=" . $abertoFechadoget . "&filtroDataEncerraMaior=" . $filtroDataEncerraMaior . "&filtroDataEncerraMenor=" . $filtroDataEncerraMenor ?>" class="bnt bntmpresa-xs" style="color: green"><i class="fa fa-file-excel-o"></i></a>-->
                        <a class="btn btn-success btn-xs"><?php echo "Total: " . $totalEquipamentos ?></a>
                    </div>
                    <br><br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Ordem Serviço</h5>
                            </div>
                            <div class="widget-content nopadding table-responsive">
                                <table class="table table-bordered table-hover table-striped table-condensed">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>OS</th>
                                            <th>Equipamento</th>
                                            <th>Cliente</th>
                                            <th>Contato</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Total</th>
                                            <th>Data entrada</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td colspan="5">Nenhuma os cadastrada</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    <?php } else { ?>
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
                                            <th>OS</th>
                                            <th>Equipamento</th>
                                            <th>Cliente</th>
                                            <th>Contato</th>
                                            <th>Telefone</th>
                                            <th>E-mail</th>
                                            <th>Total</th>
                                            <th>Entrada</th>
                                            <th>Saída</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td class="text-middle ng-binding"><?php echo $r->idOS; ?></td>
                                                <td class="text-middle ng-binding">
                                                    <?php
                                                    foreach ($equipamento as $valueEquipamento) {
                                                        if ($r->idEquipamento == $valueEquipamento->idEquipamento) {
                                                            foreach ($tipoEquipamento as $valueTipo) {
                                                                if ($valueTipo->idTipo == $valueEquipamento->tipo) {
                                                                    echo $valueTipo->descricao;
                                                                }
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td width="32%" class="text-middle ng-binding"><?php echo $r->nomeCliente . " / " . $r->fantasiaCliente; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->contatoCliente; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->telefoneCliente . " / " . $r->celularCliente ?></td> 
                                                <td class="text-middle ng-binding"><?php echo $r->emailCliente; ?></td> 
                                                <td class="text-middle ng-binding"><?php echo "R$" . $r->valorTotal; ?></td> 
                                                <td class="text-middle ng-binding"><?php
                                                    $dateEntrada = date_create_from_format('Y-m-d', $r->dataEntrada);
                                                    echo date_format($dateEntrada, 'd-m-Y');
                                                    ?></td> 
                                                <td class="text-middle ng-binding"><?php
                                                    if ($r->dataEncerra != NULL) {
                                                        $dateSaida = date_create_from_format('Y-m-d', $r->dataEncerra);
                                                        echo date_format($dateSaida, 'd-m-Y');
                                                    }
                                                    ?></td> 
                                                <td class="text-middle ng-binding">
                                                    <?php
                                                    foreach ($status as $value) {
                                                        if ($r->status == $value->idStatus) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td class="text-center text-middle ng-binding" width="6%">
                                                    <?php
                                                    if ($this->permission->checkPermission($this->session->userdata('permissao'), 'iOS')) {
                                                        if ($r->encerrada == "sim") {
                                                            ?>
                                                            <a title="imprimir" href="<?php echo base_url() . 'index.php/os/imprimirEncerramentoOS/' . $r->idOS ?>" class="btn btn-warning btn-xs"><i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                                        <?php } else { ?>
                                                            <a title="imprimir" href="<?php echo base_url() . 'index.php/os/imprimir/' . $r->idOS ?>" class="btn btn-warning btn-xs"><i class="fa-fw glyphicon glyphicon-print"></i> </a>
                                                        <?php } ?>
                                                    <?php } ?>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'iOS')) { ?>
                                                        <a title="visualizar" href="<?php echo base_url() . 'index.php/os/visualizarOS/' . $r->idOS ?>" class="btn btn-success btn-xs"><i class="fa-fw glyphicon glyphicon-eye-open"></i> </a>
                                                    <?php } ?>
                                                    <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'eOS')) { ?>
                                                        <a title="editar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $r->idOS; ?>" class="btn btn-primary btn-xs
                                                        <?php
                                                        foreach ($status as $value) {
                                                            if ($r->status == $value->idStatus) {
                                                                if ($value->encerra == 1) {
                                                                    echo "disabled";
                                                                }
                                                            }
                                                        }
                                                        ?>
                                                           "><i class="fa-fw glyphicon glyphicon-edit"></i> </a>
                                                       <?php } ?>
                                                       <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'dOS')) { ?>
                                                        <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $r->idOS; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                                                    <?php } ?>
                                                    <!--MODAL BOTÃO EXCLUIR-->
                                                    <div class="modal modal-default fade" id="modal-danger<?php echo $r->idOS; ?>">
                                                        <div class="modal-dialog">
                                                            <div class="modal-content">
                                                                <div class="modal-header">
                                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                        <span aria-hidden="true">×</span></button>
                                                                    <h4 class="modal-title">Deseja excluir a ordem de serviço <?php echo $r->idOS; ?>?</h4>
                                                                </div>
                                                                <form action="<?php echo base_url() ?>index.php/os/excluirOS" method="post">
                                                                    <input type="hidden" id="idOSExcluir" name="idOSExcluir" value="<?php echo $r->idOS; ?>">
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

                        <?php
                        echo $this->pagination->create_links();
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</section>
<?php $this->load->view('template/footer'); ?>
<script>
    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2();
    }
    )
</script>