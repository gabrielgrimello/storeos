<?php $this->load->view('template/menu'); ?>
<section class="content">
    <form action="<?php echo base_url() ?>index.php/os/checklist/adicionarChecklistNobreakEstabilizador" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA OS DADOS ABAIXO</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Técnico Avaliação</label>
                                    <input type="text" class="form-control" name="tecnicoAvaliacao"  value="<?= set_value('tecnicoAvaliacao') ?>">
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
                                    <input type="text" class="form-control" name="tecnicoReparo"  value="<?= set_value('tecnicoReparo') ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data Reparo</label>
                                    <input type="date" class="form-control" name="dataReparo"  >
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                        <input type="radio" name="carregadorRadios" id="reparar" value="reparado">
                                        Carregador Reparado
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação carregador</label>
                                    <input type="text" class="form-control" name="obsCarregador"  value="<?= set_value('obsCarregador') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                        <input type="radio" name="estabilizaRadios" id="reparado" value="reparado">
                                        Estabiliza rede Reparado
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação estabiliza rede</label>
                                    <input type="text" class="form-control" name="obsEstabilizaRede"  value="<?= set_value('obsEstabilizaRede') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                        <input type="radio" name="inverterRadios" id="reparado" value="reparado">
                                        Inverter Reparado
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação inverter</label>
                                    <input type="text" class="form-control" name="obsInverter"  value="<?= set_value('obsInverter') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                        <input type="radio" name="selTensaoRadios" id="reparado" value="reparado">
                                        Sel. tensão Reparado
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação Sel. tensão</label>
                                    <input type="text" class="form-control" name="obsSelTensao"  value="<?= set_value('obsSelTensao') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                        <input type="radio" name="barraRadios" id="reparado" value="reparado">
                                        Barra de saída Reparado
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
                                    <input type="text" class="form-control" name="obsBarraSaida"  value="<?= set_value('obsBarraSaida') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                                        <input type="radio" name="trafoRadios" id="reparado" value="reparado">
                                        Trafo Reparado
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
                                        <input type="radio" name="trafoRadios" id="substituir" value="substituir">
                                        Trafo Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação trafo</label>
                                    <input type="text" class="form-control" name="obsTrafo"  value="<?= set_value('obsTrafo') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" id="ok" value="ok" >
                                        Placa OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" id="reparado" value="reparado">
                                        Placa Reparado
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
                                        <input type="radio" name="placaRadios" id="substituir" value="substituir">
                                        Placa Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação Placa</label>
                                    <input type="text" class="form-control" name="obsPlaca"  value="<?= set_value('obsPlaca') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
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
                                        <input type="radio" name="bateriaRadios" id="substituir" value="substituir">
                                        Bateria Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação bateria</label>
                                    <input type="text" class="form-control" name="obsBateria"  value="<?= set_value('obsBateria') ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
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
                                        <input type="radio" name="bateriaRadios" id="substituir" value="substituir">
                                        Bateria Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação bateria</label>
                                    <input type="text" class="form-control" name="obsBateria"  value="<?= set_value('obsBateria') ?>">
                                </div>
                            </div>

                        </div>
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