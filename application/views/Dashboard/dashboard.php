<?php $this->load->view('template/menu'); ?>

<section>
    <div class="row">
        <div class="col-md-12">
            <div class="col-md-12">
                <div class="col-md-6">
                    <div class="col-md-11" style="background-color: white">
                        <canvas id="myChart" ></canvas>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-green-active"><i class="fa fa-arrow-down"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Média de entrada</span>
                                <span class="info-box-number"><h2><?php echo $mediaEntrada ?></h2></span>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-blue"><i class="fa fa-arrow-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Média de saída</span>
                                <span class="info-box-number"><h2><?php echo $mediaSaida ?></h2></span>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-black"><i class="fa fa-arrow-circle-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Média sem reparo</span>
                                <span class="info-box-number"><h2><?php echo $mediaSemReparo?></h2></span>
                            </div>
                        </div>
                    </div>
                     <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-red"><i class="fa fa-arrow-circle-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Média descarte</span>
                                <span class="info-box-number"><h2><?php echo $mediaDescarte ?></h2></span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box">
                            <span class="info-box-icon bg-orange"><i class="fa fa-arrow-circle-up"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text">Média garantia</span>
                                <span class="info-box-number"><h2><?php echo $mediaGarantia ?></h2></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<div class="row">
    <div class="col-md-12">
        <div class="text-center">
            <h2>ALERTAS</h2>
        </div>
        <div class="row">
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao&dataEntradaMenor=<?php echo date("Y-m-d", strtotime("-31 days")) ?>" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-android-warning" target="_blank"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS garantia vencida </span>
                            <span class="info-box-number"><h2><?php echo $totalAbertasGarantiaVencida ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao&dataEntradaMenor=<?php echo date("Y-m-d", strtotime("-25 days")) ?>" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-android-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS garantia 25d+ </span>
                            <span class="info-box-number"><h2><?php echo $totalAbertasGarantiaProxPrazo ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=nao&dataAlteracaoMenor=<?php echo date("Y-m-d", strtotime("-3 days")) ?>" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-android-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS 3d+ sem interação </span>
                            <span class="info-box-number"><h2><?php echo $totalAbertasMais3diasSemInteracao ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="#">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-red"><i class="ion ion-android-warning"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS Aguardando Entrega </span>
                            <span class="info-box-number"><h2><?php echo $aguardandoEntrega ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="row">
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="ion ion-android-desktop"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">OS abertas em garantia</span>
                            <span class="info-box-number"><h2><?php echo $totalGarantia ?></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=nao" target="_blank">
                <div class="col-md-3 text-center">
                    <div class="info-box">
                        <span class="info-box-icon bg-yellow-active"><i class="ion ion-android-desktop"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">OS abertas</span>
                            <span class="info-box-number"><h2><strong><?php echo $totalAbertas ?></strong></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=nao&dataEntradaMaior=<?php echo date("Y-m-d", strtotime("-7 days")) ?>">
                <div class="col-md-3 text-center" target="_blank">
                    <div class="info-box">
                        <span class="info-box-icon bg-green-active"><i class="ion ion-android-desktop" ></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">OS abertas últimos 7 dias</span>
                            <span class="info-box-number"><h2><strong><?php echo $totalAbertas7dias ?></strong></h2></span>
                        </div>
                    </div>
                </div>
            </a>
            <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=sim&dataEncerraMaior=<?php echo date("Y-m-d", strtotime("-7 days")) ?>">
                <div class="col-md-3 text-center" target="_blank">
                    <div class="info-box">
                        <span class="info-box-icon bg-purple-active"><i class="ion ion-android-desktop" ></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">OS fechadas últimos 7 dias</span>
                            <span class="info-box-number"><h2><strong><?php echo $totalFechadas7dias ?></strong></h2></span>
                        </div>
                    </div>
                </div>
            </a>
        </div>
        <div class="text-center">
            <h2>QUANTIDADE DE OS's SEPARADAS POR STATUS</h2>
        </div>
        <div class="row">
            <?php foreach ($status as $s) { ?>
                <a href="<?php echo base_url() ?>index.php/os/gerenciar?status%5B%5D=<?php echo $s->idStatus ?>" target="_blank">
                    <div class="col-md-3 text-center">
                        <div class="info-box">
                            <span class="info-box-icon" style="background: <?php echo $s->cor; ?>"><i class="ion ion-android-clipboard" style="color: white" target="_blank"></i></span>
                            <div class="info-box-content">
                                <span class="info-box-text"><?php echo $s->descricao ?> </span>
                                <span class="info-box-number"><h2><?php echo $this->dashboard_model->countOsStatus($s->idStatus); ?></h2></span>
                            </div>
                        </div>
                    </div>
                </a>
            <?php } ?>

        </div>
    </div>
</div>

<script src=" https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/chart.esm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/chart.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js@3.4.0/dist/helpers.esm.min.js"></script>
<script>
    const valorEntrada = <?php echo $entradas ?>;
    const valorSaidaReparado = <?php echo $saidasReparado ?>;
    const valorSaidaSemReparo = <?php echo $saidasSemReparo ?>;
    const valorSaidaDescarte = <?php echo $saidasDescarte ?>;
    const valorSaidaGarantia = <?php echo $saidasGarantia ?>;
    const meses = <?php echo $meses ?>;

    var ctx = document.getElementById('myChart').getContext('2d');
    var myChart = new Chart(ctx, {
        data: {
            labels: meses,
            datasets: [{
                    type: 'bar',
                    label: 'Entrada',
                    data: valorEntrada,
                    backgroundColor: [
                        'rgba(0, 128, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(0, 128, 0, 1)'
                    ],
                    borderWidth: 4
                },
                {
                    type: 'line',
                    label: 'Saídas com reparo',
                    data: valorSaidaReparado,
                    backgroundColor: [
                        'rgba(0, 0, 255, 0.2)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 255, 1)'
                    ],
                    borderWidth: 4
                },
                {
                    type: 'line',
                    label: 'Saídas sem reparo',
                    data: valorSaidaSemReparo,
                    backgroundColor: [
                        'rgba(0, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(0, 0, 0, 1)'
                    ],
                    borderWidth: 4
                },
                {
                    type: 'line',
                    label: 'Descarte',
                    data: valorSaidaDescarte,
                    backgroundColor: [
                        'rgba(200, 0, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(200, 0, 0, 1)'
                    ],
                    borderWidth: 4
                },
                {
                    type: 'line',
                    label: 'Descarte',
                    data: valorSaidaGarantia,
                    backgroundColor: [
                        'rgba(236, 88, 0, 0.2)'
                    ],
                    borderColor: [
                        'rgba(236, 88, 0, 1)'
                    ],
                    borderWidth: 4
                }
            ]
        },
        options: {
            scales: {
                y: {
                    // reverse: true,
                    beginAtZero: true
                }
            }
        }
    });
</script>

<?php $this->load->view('template/footer'); ?>
