<?php $this->load->view('template/menu'); ?>
<div class="col-md-12">
    <a title="voltar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $idOS ?>" class="btn btn-danger btn-small"><i class="fa fa-arrow-left"></i>Voltar para a OS </a>
</div>
<section class="content">
    <form action="<?php echo base_url() ?>index.php/os/adicionarChecklistComputador" method="post">
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
                            <div class=" col-md-3">
                                <div class="form-group" >
                                    <label>
                                        <input type="radio" name="placaMaeRadios" value="ok" >
                                        Placa Mãe OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="form-group" >
                                    <label>
                                        <input type="radio" name="placaMaeRadios" value="substituir">
                                        Placa Mãe Substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="onOffPlacaMaeRadios" value="onboard">
                                        Onboard
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="onOffPlacaMaeRadios" value="offboard">
                                        Offboard
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marca placa mãe</label>
                                    <input type="text" class="form-control" name="marcaPlacaMae"  value="<?= set_value('marcaPlacaMae') ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Modelo placa mãe</label>
                                    <input type="text" class="form-control" name="modeloPlacaMae"  value="<?= set_value('modeloPlacaMae') ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação placa mãe</label>
                                    <input type="text" class="form-control" name="obsPlacaMae"  value="<?= set_value('obsPlacaMae') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="processadorRadios" value="ok">
                                        Processador OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="processadorRadios" value="substituir">
                                        Processador Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo processador</label>
                                    <input type="text" class="form-control" name="tipoProcessador"  value="<?= set_value('tipoProcessador') ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Frequência processador</label>
                                    <input type="text" class="form-control" name="frequenciaProcessador"  value="<?= set_value('frequenciaProcessador') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="775">
                                        775
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1150">
                                        1150
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1151">
                                        1151
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1155">
                                        1155
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1156">
                                        1156
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="AM2">
                                        AM2
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="AM3">
                                        AM3
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="AM3+">
                                        AM3+
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="outros">
                                        Outros
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Observação soquete</label>
                                    <input type="text" class="form-control" name="obsSoquete"  value="<?= set_value('obsSoquete') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="memoriaRadios" value="ok">
                                        Memória OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="memoriaRadios" value="substituir">
                                        Memória substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>DDR</label>
                                    <input type="text" class="form-control" name="tipoMemoria"  value="<?= set_value('tipoMemoria') ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Capacidade memória</label>
                                    <input type="text" class="form-control" name="capacidadeMemoria"  value="<?= set_value('capacidadeMemoria') ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Frequência memória</label>
                                    <input type="text" class="form-control" name="frequenciaMemoria"  value="<?= set_value('frequenciaMemoria') ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Marca memória</label>
                                    <input type="text" class="form-control" name="marcaMemoria"  value="<?= set_value('marcaMemoria') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdRadios" value="ok">
                                        HD OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdRadios" value="substituir">
                                        HD Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Capaciade HD</label>
                                    <input type="text" class="form-control" name="tamanhoHD"  value="<?= set_value('tamanhoHD') ?>">
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdCaboRadios" value="IDE">
                                        IDE
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdCaboRadios" value="SATA">
                                        SATA
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Marca HD</label>
                                    <input type="text" class="form-control" name="marcaHD"  value="<?= set_value('marcaHD') ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Observação HD</label>
                                    <input type="text" class="form-control" name="obsHD"  value="<?= set_value('obsHD') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveRadios" value="CD">
                                        Drive CD
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveRadios" value="DVD">
                                        Drive DVD
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveCaboRadios" value="IDE">
                                        IDE
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveCaboRadios" value="SATA">
                                        SATA
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marca do drive</label>
                                    <input type="text" class="form-control" name="marcaDrive"  value="<?= set_value('marcaDrive') ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Observação drive </label>
                                    <input type="text" class="form-control" name="obsDrive"  value="<?= set_value('obsDrive') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaVideoRadios" value="ok">
                                        Placa vídeo OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaVideoRadios" value="substituir">
                                        Placa vídeo substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaVideoRadios" value="nao">
                                        Não possui
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marca placa de vídeo</label>
                                    <input type="text" class="form-control" name="marcaVideo" value="<?= set_value('marcaVideo') ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Modelo placa de vídeo</label>
                                    <input type="text" class="form-control" name="modeloVideo" value="<?= set_value('modeloVideo') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialRadios" value="ok">
                                        Placa serial OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialRadios" value="substituir">
                                        Placa serial substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialRadios" value="nao">
                                        Não possui
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialPortaRadios" value="PCI">
                                        PCI
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialPortaRadios" value="PCIEXPRESS">
                                        PCI Express
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação placa serial</label>
                                    <input type="text" class="form-control" name="obsSerial" value="<?= set_value('obsSerial') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeRadios" value="ok">
                                        Placa rede OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeRadios" value="substituir">
                                        Placa rede substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeOnOffRadios" value="onboard">
                                        Rede Onboard
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeOnOffRadios" value="offboard">
                                        Rede Offboard
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação placa rede</label>
                                    <input type="text" class="form-control" name="obsRede" value="<?= set_value('obsRede') ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
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
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="fonteRadios" value="ok">
                                        Fonte OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="fonteRadios" value="substituir">
                                        Fonte substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="fonteInternaRadios" value="interna">
                                        Interna
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="fonteInternaRadios" value="externa">
                                        Externa
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Marca fonte</label>
                                    <input type="text" class="form-control" name="marcaFonte" >
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Potência fonte</label>
                                    <input type="text" class="form-control" name="potenciaFonte" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="1" >
                                        1 baia
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="2">
                                        2 baias
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="3" >
                                        3 baias
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="4" >
                                        4 baias
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="outros" >
                                        Outros
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="preto" >
                                        Preto
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="branco" >
                                        Branco
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="prata" >
                                        Prata
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="outros" >
                                        Outros
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="limpezaCheckbox" value="feito" >
                                        Feito
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Nome do computador</label>
                                    <input type="text" class="form-control" name="nomeComputador" value="<?= set_value('nomeComputador') ?>">
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