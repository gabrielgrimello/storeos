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
                                    <input type="hidden" name="idOS" value="<?php echo $checklistComputador->idOS ?>">
                                    <input type="hidden" name="idCheckComputador" value="<?php echo $checklistComputador->idCheckComputador ?>">
                                    <input type="text" class="form-control" name="tecnicoAvaliacao"  value="<?php echo $checklistComputador->tecnicoAvaliacao ?>" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data Avaliação</label>
                                    <input type="date" class="form-control" name="dataAvaliacao"  value="<?php echo $checklistComputador->dataAvaliacao ?>" required="">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Técnico Reparo</label>
                                    <input type="text" class="form-control" name="tecnicoReparo"  value="<?php echo $checklistComputador->tecnicoReparo ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Data Reparo</label>
                                    <input type="date" class="form-control" name="dataReparo" value="<?php echo $checklistComputador->dataReparo ?>" >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaMaeRadios" value="ok" <?php if($checklistComputador->avaliaPm=="ok") {echo "checked";}  ?>>
                                        Placa Mãe OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaMaeRadios" value="substituir" <?php if($checklistComputador->avaliaPm=="substituir") {echo "checked";}  ?>>
                                        Placa Mãe Substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="onOffPlacaMaeRadios" value="onboard" <?php if($checklistComputador->onOffPm=="onboard") {echo "checked";}  ?>>
                                        Onboard
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-3">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="onOffPlacaMaeRadios" value="offboard" <?php if($checklistComputador->onOffPm=="onffboard") {echo "checked";}  ?>>
                                        Offboard
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Marca placa mãe</label>
                                    <input type="text" class="form-control" name="marcaPlacaMae"  value="<?php echo $checklistComputador->marcaPm ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Modelo placa mãe</label>
                                    <input type="text" class="form-control" name="modeloPlacaMae"  value="<?php echo $checklistComputador->modeloPm ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação placa mãe</label>
                                    <input type="text" class="form-control" name="obsPlacaMae"  value="<?php echo $checklistComputador->obsPm ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="processadorRadios" value="ok" <?php if($checklistComputador->avaliaProcessador=="ok") {echo "checked";}  ?>>
                                        Processador OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="processadorRadios" value="substituir" <?php if($checklistComputador->avaliaProcessador=="substituir") {echo "checked";}  ?>>
                                        Processador Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Tipo processador</label>
                                    <input type="text" class="form-control" name="tipoProcessador"  value="<?php echo $checklistComputador->tipoProcessador ?>">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Frequência processador</label>
                                    <input type="text" class="form-control" name="frequenciaProcessador"  value="<?php echo $checklistComputador->frequenciaProcessador ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="775" <?php if($checklistComputador->soqueteProcessador=="775") {echo "checked";}  ?>>
                                        775
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1150" <?php if($checklistComputador->soqueteProcessador=="1150") {echo "checked";}  ?>>
                                        1150
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1151" <?php if($checklistComputador->soqueteProcessador=="1151") {echo "checked";}  ?>>
                                        1151
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1155" <?php if($checklistComputador->soqueteProcessador=="1155") {echo "checked";}  ?>>
                                        1155
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="1156" <?php if($checklistComputador->soqueteProcessador=="1156") {echo "checked";}  ?>>
                                        1156
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="AM2" <?php if($checklistComputador->soqueteProcessador=="AM2") {echo "checked";}  ?>>
                                        AM2
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="AM3" <?php if($checklistComputador->soqueteProcessador=="AM3") {echo "checked";}  ?>>
                                        AM3
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="AM3+" <?php if($checklistComputador->soqueteProcessador=="AM3+") {echo "checked";}  ?>>
                                        AM3+
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="soqueteRadios" value="outros" <?php if($checklistComputador->soqueteProcessador=="outros") {echo "checked";}  ?>>
                                        Outros
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Observação soquete</label>
                                    <input type="text" class="form-control" name="obsSoquete"  value="<?php echo $checklistComputador->obsSoquete ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="memoriaRadios" value="ok" <?php if($checklistComputador->avaliaMemoria=="ok") {echo "checked";}  ?>>
                                        Memória OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="memoriaRadios" value="substituir" <?php if($checklistComputador->avaliaMemoria=="substituir") {echo "checked";}  ?>>
                                        Memória substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>DDR</label>
                                    <input type="text" class="form-control" name="tipoMemoria"  value="<?php echo $checklistComputador->tipoMemoria ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Capacidade memória</label>
                                    <input type="text" class="form-control" name="capacidadeMemoria"  value="<?php echo $checklistComputador->capacidadeMemoria ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Frequência memória</label>
                                    <input type="text" class="form-control" name="frequenciaMemoria" value="<?php echo $checklistComputador->frequenciaMemoria ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Marca memória</label>
                                    <input type="text" class="form-control" name="marcaMemoria"  value="<?php echo $checklistComputador->marcaMemoria ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdRadios" value="ok" <?php if($checklistComputador->avaliaHD=="ok") {echo "checked";}  ?>>
                                        HD OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdRadios" value="substituir" <?php if($checklistComputador->avaliaHD=="substituir") {echo "checked";}  ?>>
                                        HD Substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Capaciade HD</label>
                                    <input type="text" class="form-control" name="tamanhoHD"  value="<?php echo $checklistComputador->tamanhoHD ?>">
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdCaboRadios" value="IDE" <?php if($checklistComputador->caboHD=="IDE") {echo "checked";}  ?>>
                                        IDE
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="hdCaboRadios" value="SATA" <?php if($checklistComputador->caboHD=="SATA") {echo "checked";}  ?>>
                                        SATA
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Marca HD</label>
                                    <input type="text" class="form-control" name="marcaHD"  value="<?php echo $checklistComputador->marcaHD ?>">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>Observação HD</label>
                                    <input type="text" class="form-control" name="obsHD"  value="<?php echo $checklistComputador->obsHD ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveRadios" value="CD" <?php if($checklistComputador->tipoDrive=="CD") {echo "checked";}  ?>>
                                        Drive CD
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveRadios" value="DVD" <?php if($checklistComputador->tipoDrive=="DVD") {echo "checked";}  ?> >
                                        Drive DVD
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveCaboRadios" value="IDE" <?php if($checklistComputador->caboDrive=="IDE") {echo "checked";}  ?>>
                                        IDE
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="driveCaboRadios" value="SATA" <?php if($checklistComputador->caboDrive=="SATA") {echo "checked";}  ?>>
                                        SATA
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marca do drive</label>
                                    <input type="text" class="form-control" name="marcaDrive"  value="<?php echo $checklistComputador->marcaDrive ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Observação drive </label>
                                    <input type="text" class="form-control" name="obsDrive"  value="<?php echo $checklistComputador->obsDrive ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaVideoRadios" value="ok" <?php if($checklistComputador->avaliaVideo=="ok") {echo "checked";}  ?>> 
                                        Placa vídeo OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaVideoRadios" value="substituir" <?php if($checklistComputador->avaliaVideo=="substituir") {echo "checked";}  ?>>
                                        Placa vídeo substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaVideoRadios" value="nao" <?php if($checklistComputador->avaliaVideo=="nao") {echo "checked";}  ?>>
                                        Não possui
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marca placa de vídeo</label>
                                    <input type="text" class="form-control" name="marcaVideo" value="<?php echo $checklistComputador->marcaVideo ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Modelo placa de vídeo</label>
                                    <input type="text" class="form-control" name="modeloVideo" value="<?php echo $checklistComputador->modeloVideo ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialRadios" value="ok" <?php if($checklistComputador->avaliaSerial=="ok") {echo "checked";}  ?>>
                                        Placa serial OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialRadios" value="substituir" <?php if($checklistComputador->avaliaSerial=="substituir") {echo "checked";}  ?>>
                                        Placa serial substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialRadios" value="nao" <?php if($checklistComputador->avaliaSerial=="nao") {echo "checked";}  ?>>
                                        Não possui
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialPortaRadios" value="PCI" <?php if($checklistComputador->portaSerial=="PCI") {echo "checked";}  ?>>
                                        PCI
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="placaSerialPortaRadios" value="PCIEXPRESS" <?php if($checklistComputador->portaSerial=="PCIEXPRESS") {echo "checked";}  ?>>
                                        PCI Express
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação placa serial</label>
                                    <input type="text" class="form-control" name="obsSerial" value="<?php echo $checklistComputador->obsSerial ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeRadios" value="ok" <?php if($checklistComputador->avaliaRede=="ok") {echo "checked";}  ?>>
                                        Placa rede OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeRadios" value="substituir" <?php if($checklistComputador->avaliaRede=="substituir") {echo "checked";}  ?>>
                                        Placa rede substituir
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeOnOffRadios" value="onboard" <?php if($checklistComputador->onOffRede=="onboard") {echo "checked";}  ?>>
                                        Rede Onboard
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-1">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="redeOnOffRadios" value="offboard" <?php if($checklistComputador->onOffRede=="offboard") {echo "checked";}  ?>>
                                        Rede Offboard
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label>Observação placa rede</label>
                                    <input type="text" class="form-control" name="obsRede" value="<?php echo $checklistComputador->obsRede ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="ok" <?php if($checklistComputador->avaliaBateria=="ok") {echo "checked";}  ?>>
                                        Bateria OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="bateriaRadios" value="substituir" <?php if($checklistComputador->avaliaBateria=="substituir") {echo "checked";}  ?>>
                                        Bateria Substituir
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="fonteRadios" value="ok" <?php if($checklistComputador->avaliaFonte=="ok") {echo "checked";}  ?>>
                                        Fonte OK
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="fonteRadios" value="substituir" <?php if($checklistComputador->avaliaFonte=="substituir") {echo "checked";}  ?>>
                                        Fonte substituir
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Marca fonte</label>
                                    <input type="text" class="form-control" name="marcaFonte" value="<?php echo $checklistComputador->marcaFonte ?>">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label>Potência fonte</label>
                                    <input type="text" class="form-control" name="potenciaFonte" value="<?php echo $checklistComputador->potenciaFonte ?>">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="1" <?php if($checklistComputador->avaliaGabinete=="1") {echo "checked";}  ?>>
                                        1 baia
                                    </label>
                                </div>
                            </div>
                            <div class=" col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="2" <?php if($checklistComputador->avaliaGabinete=="2") {echo "checked";}  ?>>
                                        2 baias
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="3" <?php if($checklistComputador->avaliaGabinete=="3") {echo "checked";}  ?>>
                                        3 baias
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="4" <?php if($checklistComputador->avaliaGabinete=="4") {echo "checked";}  ?>>
                                        4 baias
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="gabineteRadios" value="outros" <?php if($checklistComputador->avaliaGabinete=="outros") {echo "checked";}  ?>>
                                        Outros
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="preto" <?php if($checklistComputador->corGabinete=="preto") {echo "checked";}  ?>>
                                        Preto
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="branco" <?php if($checklistComputador->corGabinete=="branco") {echo "checked";}  ?>>
                                        Branco
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="prata" <?php if($checklistComputador->corGabinete=="prata") {echo "checked";}  ?>>
                                        Prata
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="radio" name="corGabineteRadios" value="outros" <?php if($checklistComputador->corGabinete=="outros") {echo "checked";}  ?>>
                                        Outros
                                    </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label>
                                        <input type="checkbox" name="limpezaCheckbox" value="feito" <?php if($checklistComputador->avaliaLimpeza=="feito") {echo "checked";}  ?>>
                                        Feito
                                    </label>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label>Nome do computador</label>
                                    <input type="text" class="form-control" name="nomeComputador" value="<?php echo $checklistComputador->nomeComputador ?>">
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
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>