<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Os
        <small>Adicionar Checklist</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > Ordem de serviço</li>
        <li class="active"> Adicionar checklist</li>
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
    <form action="<?php echo base_url() ?>index.php/os/checklist/adicionarChecklistNobreakEstabilizador" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA OS DADOS ABAIXO</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Técnico Avaliação</label>
                                <input type="text" class="form-control" name="tecnicoAvaliacao"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Avaliação</label>
                                <input type="date" class="form-control" name="dataAvaliacao"  value="<?php echo date('Y-m-d'); ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Técnico Reparo</label>
                                <input type="text" class="form-control" name="tecnicoReparo"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label>Data Reparo</label>
                                <input type="date" class="form-control" name="dataReparo"  >
                            </div>
                        </div>

                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="carregadorRadios" id="ok" value="ok" >
                                   Carregador OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="carregadorRadios" id="reparar" value="reparar">
                                   Carregador Reparar
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="carregadorRadios" id="trocar" value="trocar">
                                   Carregador Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação carregador</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="estabilizaRadios" id="ok" value="ok" >
                                   Estabiliza rede OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="estabilizaRadios" id="reparar" value="reparar">
                                   Estabiliza rede Reparar
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="estabilizaRadios" id="trocar" value="trocar">
                                   Estabiliza rede Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação estabiliza rede</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="inverterRadios" id="ok" value="ok" >
                                   Inverter OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="inverterRadios" id="reparar" value="reparar">
                                   Inverter Reparar
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="inverterRadios" id="trocar" value="trocar">
                                   Inverter Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação inverter</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="selTensaoRadios" id="ok" value="ok" >
                                   Sel. tensão OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="selTensaoRadios" id="reparar" value="reparar">
                                   Sel. tensão Reparar
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="selTensaoRadios" id="trocar" value="trocar">
                                   Sel. tensão Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação Sel. tensão</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="barraRadios" id="ok" value="ok" >
                                   Barra de saída OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="barraRadios" id="reparar" value="reparar">
                                   Barra de saída Reparar
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="barraRadios" id="trocar" value="trocar">
                                   Barra de saída Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação Barra de saída</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="trafoRadios" id="ok" value="ok" >
                                   Trafo OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="trafoRadios" id="reparar" value="reparar">
                                   Trafo Reparar
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="trafoRadios" id="trocar" value="trocar">
                                   Trafo Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação trafo</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="placaRadios" id="ok" value="ok" >
                                   Barra de saída OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="placaRadios" id="reparar" value="reparar">
                                   Placa Reparar
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="placaRadios" id="trocar" value="trocar">
                                   Placa Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação placa</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="bateriaRadios" id="ok" value="ok" >
                                   Bateria OK
                                </label>
                            </div>
                        </div>
                        <div class=" col-md-2">
                            <div class="form-group">
                                <label>
                                    <input type="radio" name="bateriaRadios" id="trocar" value="trocar">
                                   Bateria Trocar
                                </label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Observação bateria</label>
                                <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                    </div>
                    <!--                        <div class="col-md-6">
                                                <div class="form-group">
                                                    <label>E-mail</label>
                                                    <input type="email" class="form-control" name="email" placeholder="Ex.: xxxxxxx@storeware.com.br" value="<?= set_value('email') ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-3">
                                                <label>Senha</label>
                                                <input type="password" class="form-control" name="senha" value="<?= set_value('senha') ?>">
                                            </div>
                                            <div class="form-group col-md-3">
                                                <div class="form-group">
                                                    <label>Status</label>
                                                    <select class="form-control" name="status">
                                                        <option selected="" value="1">Ativado</option>
                                                        <option value="0">Desativado</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="form-group">
                                                    <label>Telefone</label>
                                                    <input type="text" class="form-control" maxlength="15" name="telefone" value="<?= set_value('telefone') ?>">
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="form-group">
                                                    <label>Filial</label>
                                                    <select class="form-control" name="filial">
                                                        <option value="SP">São Paulo</option>
                                                        <option value="SAN">Santos</option>
                                                        <option value="BP">Bragança Paulista</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group col-md-2">
                                                <div class="form-group">
                                                    <label>Permissão</label>
                                                    <select class="form-control" name="permissao">
                    <?php foreach ($permissao as $p) { ?>
                                                                            <option selected="" value="<?php echo $p->idPermissao; ?>"><?php echo $p->nome; ?></option>
                    <?php } ?>
                                                    </select>
                                                </div>
                                            </div>-->
                    <div class="col-md-12">
                        <div class="form-group text-left">
                            <button type="submit" class="btn btn-success"> SALVAR </button>
                            <a title="cancelar" href="<?php echo base_url() ?>index.php/usuario/gerenciar" class="btn btn-danger btn-small">CANCELAR </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </form>

</section>
<?php $this->load->view('template/footer'); ?>