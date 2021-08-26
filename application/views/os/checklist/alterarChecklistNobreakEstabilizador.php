<?php $this->load->view('template/menu'); ?>
<section class="content">
    <form action="<?php echo current_url(); ?>" method="post">
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
                                    <input type="hidden" name="idOS" value="<?php echo $checklistNobreakEstabilizador->idOS ?>">
                                    <input type="hidden" name="idCheckNobEst" value="<?php echo $checklistNobreakEstabilizador->idCheckNobEst ?>">
                                    <input type="text" class="form-control" name="tecnicoAvaliacao"  value="<?php echo $checklistNobreakEstabilizador->tecnicoAvaliacao; ?>" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data Avaliação</label>
                                    <input type="date" class="form-control" name="dataAvaliacao"  value="<?php echo $checklistNobreakEstabilizador->dataAvaliacao ?>" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Técnico Reparo</label>
                                    <input type="text" class="form-control" name="tecnicoReparo"  value="<?php echo $checklistNobreakEstabilizador->tecnicoReparo ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data Reparo</label>
                                    <input type="date" class="form-control" name="dataReparo" value="<?php echo $checklistNobreakEstabilizador->dataReparo ?>"  >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="carregadorRadios" value="ok" <?php if ($checklistNobreakEstabilizador->avaliaCarregador == "ok") {
    echo "checked";
} ?>>
                                        Carregador OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="carregadorRadios" value="reparado" <?php if ($checklistNobreakEstabilizador->avaliaCarregador == "reparado") {
    echo "checked";
} ?>>
                                        Carregador Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="carregadorRadios" value="reparar" <?php if ($checklistNobreakEstabilizador->avaliaCarregador == "reparar") {
    echo "checked";
} ?>>
                                        Carregador Reparar
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação carregador</label>
                                    <input type="text" class="form-control" name="obsCarregador"  value="<?php echo $checklistNobreakEstabilizador->obsCarregador ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="estabilizaRadios" value="ok" <?php if ($checklistNobreakEstabilizador->avaliaEstabilizaRede == "ok") {
    echo "checked";
} ?>>
                                        Estabiliza rede OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="estabilizaRadios" value="reparado" <?php if ($checklistNobreakEstabilizador->avaliaEstabilizaRede == "reparado") {
    echo "checked";
} ?>>
                                        Estabiliza rede Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="estabilizaRadios" value="reparar" <?php if ($checklistNobreakEstabilizador->avaliaEstabilizaRede == "reparar") {
    echo "checked";
} ?>>
                                        Estabiliza rede Reparar
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação estabiliza rede</label>
                                    <input type="text" class="form-control" name="obsEstabilizaRede"  value="<?php echo $checklistNobreakEstabilizador->obsEstabilizaRede ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="inverterRadios" value="ok" <?php if ($checklistNobreakEstabilizador->avaliaInverter == "ok") {
    echo "checked";
} ?>>
                                        Inverter OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="inverterRadios" value="reparado" <?php if ($checklistNobreakEstabilizador->avaliaInverter == "reparado") {
    echo "checked";
} ?>>
                                        Inverter Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="inverterRadios" value="reparar" <?php if ($checklistNobreakEstabilizador->avaliaInverter == "reparar") {
    echo "checked";
} ?>>
                                        Inverter Reparar
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação inverter</label>
                                    <input type="text" class="form-control" name="obsInverter"  value="<?php echo $checklistNobreakEstabilizador->obsInverter ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="selTensaoRadios" value="ok" <?php if ($checklistNobreakEstabilizador->avaliaSeletorTensao == "ok") {
    echo "checked";
} ?> >
                                        Sel. tensão OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="selTensaoRadios" value="reparado" <?php if ($checklistNobreakEstabilizador->avaliaSeletorTensao == "reparado") {
    echo "checked";
} ?>>
                                        Sel. tensão Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="selTensaoRadios" value="reparar" <?php if ($checklistNobreakEstabilizador->avaliaSeletorTensao == "reparar") {
    echo "checked";
} ?>>
                                        Sel. tensão Reparar
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação Sel. tensão</label>
                                    <input type="text" class="form-control" name="obsSeletorTensao"  value="<?php echo $checklistNobreakEstabilizador->obsSeletorTensao ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="barraSaidaRadios" value="ok" <?php if ($checklistNobreakEstabilizador->avaliaBarraSaida == "ok") {
    echo "checked";
} ?> >
                                        Barra de saída OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="barraSaidaRadios" value="reparado" <?php if ($checklistNobreakEstabilizador->avaliaBarraSaida == "reparado") {
    echo "checked";
} ?>>
                                        Barra de saída Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="barraSaidaRadios" value="trocar" <?php if ($checklistNobreakEstabilizador->avaliaBarraSaida == "trocar") {
    echo "checked";
} ?>>
                                        Barra de saída Trocar
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação Barra de saída</label>
                                    <input type="text" class="form-control" name="obsBarraSaida"  value="<?php echo $checklistNobreakEstabilizador->obsBarraSaida ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="trafoRadios" value="ok" <?php if ($checklistNobreakEstabilizador->avaliaTrafo == "ok") {
    echo "checked";
} ?>>
                                        Trafo OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="trafoRadios" value="reparado" <?php if ($checklistNobreakEstabilizador->avaliaTrafo == "reparado") {
    echo "checked";
} ?>>
                                        Trafo Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="trafoRadios" value="reparar" <?php if ($checklistNobreakEstabilizador->avaliaTrafo == "reparar") {
    echo "checked";
} ?>>
                                        Trafo Reparar
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="trafoRadios" value="substituir" <?php if ($checklistNobreakEstabilizador->avaliaTrafo == "substituir") {
    echo "checked";
} ?>>
                                        Trafo Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação trafo</label>
                                    <input type="text" class="form-control" name="obsTrafo"  value="<?php echo $checklistNobreakEstabilizador->obsTrafo ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" value="ok" <?php if ($checklistNobreakEstabilizador->avaliaPlaca == "ok") {
    echo "checked";
} ?>>
                                        Placa OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" value="reparado" <?php if ($checklistNobreakEstabilizador->avaliaPlaca == "reparado") {
    echo "checked";
} ?>>
                                        Placa Reparado
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" value="reparar" <?php if ($checklistNobreakEstabilizador->avaliaPlaca == "reparar") {
    echo "checked";
} ?>>
                                        Placa Reparar
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaRadios" value="substituir" <?php if ($checklistNobreakEstabilizador->avaliaPlaca == "substituir") {
    echo "checked";
} ?>>
                                        Placa Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação Placa</label>
                                    <input type="text" class="form-control" name="obsPlaca" value="<?php echo $checklistNobreakEstabilizador->obsPlaca ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="nao" <?php if ($checklistNobreakEstabilizador->avaliaBateria == "nao") {
    echo "checked";
} ?>>
                                        Não possui bateria
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="ok"  <?php if ($checklistNobreakEstabilizador->avaliaBateria == "ok") {
    echo "checked";
} ?>>
                                        Bateria OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="substituir" <?php if ($checklistNobreakEstabilizador->avaliaBateria == "substituir") {
    echo "checked";
} ?>>
                                        Bateria Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Observação bateria</label>
                                    <input type="text" class="form-control" name="obsBateria"  value="<?php echo $checklistNobreakEstabilizador->obsBateria ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="modeloBateriaRadios" value="5" <?php if ($checklistNobreakEstabilizador->modeloBateria == "5") {
    echo "checked";
} ?> >
                                        12v/5ah
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="modeloBateriaRadios" value="7" <?php if ($checklistNobreakEstabilizador->modeloBateria == "7") {
    echo "checked";
} ?>>
                                        12v/7ah
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="modeloBateriaRadios" value="9"  <?php if ($checklistNobreakEstabilizador->modeloBateria == "9") {
    echo "checked";
} ?>>
                                        12v/9ah
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="modeloBateriaRadios" value="18" <?php if ($checklistNobreakEstabilizador->modeloBateria == "18") {
    echo "checked";
} ?>>
                                        12v/18ah
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Outros modelos de bateria</label>
                                    <input type="text" class="form-control" name="outrosModelosBateria"  value="<?php echo $checklistNobreakEstabilizador->outrosModelosBateria ?>">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="1" <?php if ($checklistNobreakEstabilizador->quantidadeBateria == "1") {
    echo "checked";
} ?>>
                                        1
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="2" <?php if ($checklistNobreakEstabilizador->quantidadeBateria == "2") {
    echo "checked";
} ?>>
                                        2
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="4" <?php if ($checklistNobreakEstabilizador->quantidadeBateria == "4") {
    echo "checked";
} ?>>
                                        4
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="quantidadeBateriaRadios" value="16" <?php if ($checklistNobreakEstabilizador->quantidadeBateria == "16") {
    echo "checked";
} ?>>
                                        16
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Outras Quantidades de bateria</label>
                                    <input type="number" class="form-control" name="outrasQuantidadesBateria"  value="<?php echo $checklistNobreakEstabilizador->outrasQuantidadesBateria ?>">
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
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $checklistNobreakEstabilizador->idOS ?>" class="btn btn-danger btn-small">CANCELAR </a>
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