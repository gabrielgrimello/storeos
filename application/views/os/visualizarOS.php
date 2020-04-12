<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Ordem de serviço
        <small>Visualizar ordem de serviço</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="<?php echo base_url() . 'index.php/os/gerenciar' ?>"> Gerenciar ordem de serviço</a></li>
        <li class="active"> Visualizar ordem de serviço</li>

    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <!-- Custom Tabs (Pulled to the right) -->
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#tab_1-1" data-toggle="tab">OS</a></li>
                    <li><a href="#tab_2-2" data-toggle="tab">Peças</a></li>
                    <li><a href="#tab_3-2" data-toggle="tab">Serviços</a></li>
                   <li class="pull-right header"><i class="fa fa-th"></i> Selecione as abas desejadas</li>
                </ul>
                <div class="tab-content">
                    <div class="tab-pane active" id="tab_1-1">
                        <div class="box box-success" >
                            <div class="box-header with-border">
                                <div class="col-md-4">
                                    <h3 class="box-title">DADOS DO CLIENTE </h3>
                                </div>
                                <div class="col-md-4 text-center">
                                    <h3 class="box-title">ORDEM DE SERVIÇO 
                                        <span class="label label-danger"><?php echo $os->idOS; ?></span>
                                    </h3>
                                </div>
                            </div>
                            <div class="box-body">
                                <input type="hidden" name="idOS" id="idOS" value="<?php echo $os->idOS; ?>">
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
                                    <input type="text" class="form-control" id="razao" name="razao" readonly="" value="<?php echo $os->nomeCliente; ?>" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Fantasia</label>
                                    <input type="text" class="form-control" id="fantasia" name="fantasia" readonly="" value="<?php echo $os->fantasiaCliente; ?>" >
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Endereço</label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" readonly="" value="<?php echo $os->enderecoCliente; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Cidade</label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" readonly=""  value="<?php echo $os->cidadeCliente; ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>E-mail</label>
                                    <input type="text" class="form-control" id="email" name="email" readonly="" value="<?php echo $os->emailCliente; ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Contato</label>
                                    <input type="text" class="form-control" id="contato" name="contato" readonly="" value="<?php echo $os->contatoCliente; ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" readonly="" value="<?php echo $os->celularCliente; ?>">
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" readonly="" value="<?php echo $os->telefoneCliente; ?>">
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
                                    <select class="form-control" name="garantia" id="garantia" disabled="">
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
                            </div>
                        </div>
                        <div class="box box-success" >
                            <div class="box-header with-border">
                                <div class="col-md-7">
                                    <h3 class="box-title">DADOS DA OS</h3>
                                </div>
                            </div>
                            <div class="box-body">
                                <div class="col-md-3">
                                    <label>Status</label>
                                    <select name="status" id="status" class="form-control" disabled="" value="<?= set_value('status') ?>">
                                        <option value="">Selecione status</option>
                                        <?php
                                        foreach ($status as $value) {
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
                                <div class="form-group col-md-3">
                                    <label>Prateleira entrada</label>
                                    <input type="text" class="form-control" id="prateleiraEntrada" name="prateleiraEntrada" readonly="" value="<?php echo $os->prateleiraEntrada ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Prateleira saída</label>
                                    <input type="text" class="form-control" id="prateleiraSaida" name="prateleiraSaida" readonly="" value="<?php echo $os->prateleiraSaida ?>">
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Tensão entrada</label>
                                    <div class="radio">
                                        <label>
                                            <input disabled="" type="radio" name="tensaoEntrada" value="Automatico" <?php
                                            if ($os->tensaoEntrada == "Automatico") {
                                                echo "checked";
                                            }
                                            ?>>
                                            Autom.
                                        </label>
                                        &nbsp;&nbsp;&nbsp;
                                        <label>
                                            <input disabled="" type="radio" name="tensaoEntrada" value="220v" <?php
                                            if ($os->tensaoEntrada == "220v") {
                                                echo "checked";
                                            }
                                            ?>>
                                            220v
                                        </label>
                                        &nbsp;&nbsp;&nbsp;
                                        <label>
                                            <input disabled="" type="radio" name="tensaoEntrada" value="110v" <?php
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
                                    <input type="text" class="form-control" id="acessorios" name="acessorios" readonly="" value="<?php echo $os->acessorios ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label>Observações</label>
                                    <input type="text" class="form-control" id="observacoes" name="observacoes" readonly="" value="<?php echo $os->observacoes ?>">
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Defeito reclamado</label>
                                    <textarea id="defeito" name="defeito" class="form-control" readonly="" rows="4" ><?php echo $os->defeito ?></textarea>
                                </div>
                                <div class="form-group col-md-12">
                                    <label>Laudo técnico</label>
                                    <textarea id="laudo" name="laudo" class="form-control" readonly="" rows="10" ><?php echo $os->laudo ?></textarea>
                                </div>
                                <div class="form-group col-md-12 text-right">
                                    <a title="cancelar" href="<?php echo base_url() ?>index.php/os/gerenciar" class="btn btn-danger btn-small"><i class="glyphicon glyphicon-remove"></i></a>
                                </div>
                            </div> <!-- /.box-body -->
                        </div> <!-- /.box box-info-->
                    </div>

                    <!-- ABA PEÇAS  -->
                    <div class="tab-pane" id="tab_2-2">
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
                                        $total = 0;
                                        foreach ($pecas as $p) {

                                            $total = $total + $p->total;
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
                                            <td><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!--  ABA DE SERVIÇOS -->
                    <div class="tab-pane" id="tab_3-2">
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
                                        $total = 0;
                                        foreach ($servicos as $s) {

                                            $total = $total + $s->total;
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
                                            <td><strong>R$ <?php echo number_format($total, 2, ',', '.'); ?><input type="hidden" id="total-venda" value="<?php echo number_format($total, 2); ?>"></strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('os/script'); ?>
<?php $this->load->view('template/footer'); ?>
