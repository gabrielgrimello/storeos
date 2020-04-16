<?php $this->load->view('template/menu'); ?>

<div class="row">
    <div class="col-md-12">
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
        </div>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>
