<?php $this->load->view('template/menu'); ?>

<div class="row">
    <div class="col-md-12">
        <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao">
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
<!--        <a href="<?php echo base_url() ?>index.php/os/gerenciar?garantia=1&encerrada=nao">
            <div class="col-md-3 text-center">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="ion ion-android-desktop"></i></span>
                    <div class="info-box-content">
                        <span class="info-box-text">OS garantia próx. prazo </span>
                        <span class="info-box-number"><h2><?php echo $totalGarantia ?></h2></span>
                    </div>
                </div>
            </div>
        </a>-->
        <a href="<?php echo base_url() ?>index.php/os/gerenciar?encerrada=nao">
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
        <a href="#">
            <div class="col-md-3 text-center">
                <div class="info-box">
                    <span class="info-box-icon bg-green-active"><i class="ion ion-android-desktop"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">OS abertas últimos 7 dias</span>
                        <span class="info-box-number"><h2><strong><?php echo $totalAbertas7dias ?></strong></h2></span>
                    </div>
                </div>
            </div>
        </a>
    </div>
</div>

<?php $this->load->view('template/footer'); ?>
