<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Relatórios

    </h1>
    <ol class="breadcrumb">
        <li><i class="active fa fa-dashboard"></i> relatórios</a></li>
    </ol>
</section>
<!-- Main content -->
<section class="content">
    <!-- Small boxes (Stat box) -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-yellow">
                <div class="inner">
                    <h3><?php echo  $data->nome ?></h3>

                    <p>dados</p>
                </div>
                <div class="icon">
                    <i class="ion ion-bag"></i>
                </div>
                <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
            </div>
        </div>

    </div>
    <!-- /.row -->
    <!-- Main row -->
    <div class="row">
        <section class="col-lg-5 connectedSortable">

        </section>
        <!-- right col -->
    </div>
    <!-- /.row (main row) -->

</section>



<?php $this->load->view('template/footer'); ?>