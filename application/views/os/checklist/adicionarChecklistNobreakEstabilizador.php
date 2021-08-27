<?php $this->load->view('template/menu'); ?>
<div class="col-md-12">
    <a title="voltar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $checklistComputador->idOS ?>" class="btn btn-danger btn-small"><i class="fa fa-arrow-left"></i>Voltar para a OS </a>
</div>
<section class="content">
    <form action="<?php echo base_url() ?>index.php/os/adicionarChecklistNobreakEstabilizador" method="post">
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
                                    <input type="hidden" name="idOS" value="<?php echo $idOS ?>">
                                    <input type="text" class="form-control" name="tecnicoAvaliacao"  value="<?= set_value('tecnicoAvaliacao') ?>" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data Avaliação</label>
                                    <input type="date" class="form-control" name="dataAvaliacao"  value="<?php echo date('Y-m-d'); ?>" required="">
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
                                        <input type="radio" name="carregadorRadios" value="ok" >
                                        Carregador OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="carregadorRadios" value="reparado">
                                        Carregador Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="carregadorRadios" value="reparar">
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
                                        <input type="radio" name="estabilizaRadios" value="ok">
                                        Estabiliza rede OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="estabilizaRadios" value="reparado">
                                        Estabiliza rede Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="estabilizaRadios" value="reparar">
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
                                        <input type="radio" name="inverterRadios" value="ok">
                                        Inverter OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="inverterRadios" value="reparado">
                                        Inverter Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="inverterRadios" value="reparar">
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
                                        <input type="radio" name="selTensaoRadios" value="ok">
                                        Sel. tensão OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="selTensaoRadios" value="reparado">
                                        Sel. tensão Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="selTensaoRadios" value="reparar">
                                        Sel. tensão Reparar
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação Sel. tensão</label>
                                    <input type="text" class="form-control" name="obsSeletorTensao"  value="<?= set_value('obsSeletorTensao') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="barraSaidaRadios" value="ok">
                                        Barra de saída OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="barraSaidaRadios" value="reparado">
                                        Barra de saída Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="barraSaidaRadios" value="trocar">
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
                                        <input type="radio" name="trafoRadios" value="ok">
                                        Trafo OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="trafoRadios" value="reparado">
                                        Trafo Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="trafoRadios" value="reparar">
                                        Trafo Reparar
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="trafoRadios" value="substituir">
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
                                        <input type="radio" name="placaRadios" value="ok">
                                        Placa OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" value="reparado">
                                        Placa Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" value="reparar">
                                        Placa Reparar
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" value="substituir">
                                        Placa Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação Placa</label>
                                    <input type="text" class="form-control" name="obsPlaca" value="<?= set_value('obsPlaca') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="nao" >
                                        Não possui bateria
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="ok" >
                                        Bateria OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="substituir">
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
                                        <input type="radio" name="modeloBateriaRadios" value="5" >
                                        12v/5ah
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="modeloBateriaRadios" value="7">
                                        12v/7ah
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="modeloBateriaRadios" value="9" >
                                        12v/9ah
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="modeloBateriaRadios" value="18" >
                                        12v/18ah
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Outros modelos de bateria</label>
                                    <input type="text" class="form-control" name="outrosModelosBateria"  value="<?= set_value('outrosModelosBateria') ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="1" >
                                        1
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="2">
                                        2
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="4" >
                                        4
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="16" >
                                        16
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Outras Quantidades de bateria</label>
                                    <input type="number" class="form-control" name="outrasQuantidadesBateria"  value="<?= set_value('outrasQuantidadesBateria') ?>">
                                </div>
                            </div>

                        </div>
                        <div class="form-group col-md-12">
                            <label>Laudo técnico - VISÍVEL PARA O CLIENTE </label> <a id="bt-copiar" class="btn btn-primary btn-xs">Copiar da observação interna</a>
                            <textarea id="laudo" name="laudo" class="form-control bg-red" rows="5" ><?php echo $os->laudo ?></textarea>
                        </div>
                        <div class="form-group col-md-12">
                            <label>Observação interna - NÃO VÍSIVEL</label>
                            <textarea id="observacaoInterna" name="observacaoInterna" class="form-control bg-green" rows="5" ><?php echo $os->observacaoInterna ?></textarea>
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
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>
<script>
$('#bt-copiar').on('click', function(){
  $('#laudo').val($('#observacaoInterna').val());    
});
</script>