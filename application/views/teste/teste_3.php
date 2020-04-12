<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>StoreOS</title>
        <link rel="shortcut icon" href="<?php echo base_url('assets/favicon.png') ?>" type="image/x-png"
              <!-- Tell the browser to be responsive to screen width -->
              <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
        <!-- daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
        <!-- bootstrap datepicker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
        <!-- iCheck for checkboxes and radio inputs -->
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/iCheck/all.css') ?>">
        <!-- Bootstrap Color Picker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css') ?>">
        <!-- Bootstrap time Picker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/timepicker/bootstrap-timepicker.min.css') ?>">
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/css/select2.min.css') ?>">
        <!-- Theme style -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/AdminLTE.min.css') ?>">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="<?php echo base_url('assets/dist/css/skins/_all-skins.min.css') ?>">
        <!-- Morris chart -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/morris.js/morris.css') ?>">
        <!-- jvectormap -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/jvectormap/jquery-jvectormap.css') ?>">
        <!-- Date Picker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css') ?>">
        <!-- Daterange picker -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.css') ?>">
        <!-- bootstrap wysihtml5 - text editor -->
        <link rel="stylesheet" href="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css') ?>">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
        <style>
            .card.draggable {
                margin-bottom: 1rem;
                cursor: grab;
            }

            .droppable {
                background-color: var(--success);
                min-height: 120px;
                margin-bottom: 1rem;
            }
        </style>

    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <?php $dadoslogin = $this->session->all_userdata(); ?>
            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>ST</b>OS</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Store</b>OS</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>
                    <div class="navbar-custom-menu">
                        <ul class="nav navbar-nav">
                            <li class="dropdown user user-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                    <i class="glyphicon glyphicon-user"></i>
                                    <span class="hidden-xs"><?php echo $dadoslogin['nome']; ?></span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="user-footer">
                                        <div class="pull-left">
                                            <a href="<?php echo base_url(); ?>index.php/usuario/alterarsenha/<?php echo $dadoslogin['idusuarios']; ?>" class="btn btn-default btn-flat">Alterar senha</a>
                                        </div>
                                        <div class="pull-right">
                                            <a href="<?php echo base_url() ?>index.php/login/sair" class="btn btn-default btn-flat">Sair</a>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <ul class="sidebar-menu" data-widget="tree">
                        <li class="<?= ($this->router->fetch_class() == 'dashboard') ? 'active' : null; ?>">
                            <a href="<?php echo base_url() ?>index.php/dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mOS')) { ?>
                            <li class="<?= ($this->router->fetch_class() == 'calendario') ? 'active' : null; ?>">
                                <a href="<?php echo base_url() ?>index.php/calendario">
                                    <i class="fa fa-calendar"></i> <span>Calendario</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mBiblioteca')) { ?>
                            <li>
                                <a href="<?php echo base_url() ?>index.php/biblioteca/gerenciar">
                                    <i class="fa fa-book"></i> <span>Biblioteca</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mOS')) { ?>
                            <li class="active treeview menu-open">
                                <a href="#">
                                    <i class="glyphicon glyphicon-list-alt"></i>
                                    <span>Ordem Serviço</span>
                                    <span class="pull-right-container">
                                        <i class="fa fa-angle-left pull-right"></i>
                                    </span>
                                </a>
                                <ul class="treeview-menu">
                                    <li class="<?= ($this->router->fetch_class() == 'os' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/os/gerenciar">
                                            <i class="fa fa-list-ol"></i> <span>Gerenciar OS</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a data-toggle="modal" data-target="#modal-success" id="alterarOS">
                                            <i class="fa fa-list-ol" ></i> <span>Alterar OS</span>
                                        </a>
                                    </li>
                                </ul>
                            </li>


                        <?php } ?>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mOS')) { ?>
                            <!--                            <li>
                                                            <a href="<?php echo base_url() ?>index.php/relatorio">
                                                                <i class="fa fa-list-ol"></i> <span>Relatórios</span>
                                                            </a>
                                                        </li>-->
                        <?php } ?>

                        <!--<li class="treeview">
                            <a href="#">
                                <i class="fa fa-pie-chart"></i>
                                <span>Relatórios</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="pages/charts/chartjs.html"><i class="fa fa-circle-o"></i> ChartJS</a></li>
                                <li><a href="pages/charts/morris.html"><i class="fa fa-circle-o"></i> Morris</a></li>
                                <li><a href="pages/charts/flot.html"><i class="fa fa-circle-o"></i> Flot</a></li>
                                <li><a href="pages/charts/inline.html"><i class="fa fa-circle-o"></i> Inline charts</a></li>
                            </ul>
                        </li>-->
                        <li class="<?php
                        if ($this->uri->segment(1) == 'usuario' and $this->uri->segment(2) == 'gerenciar' or $this->uri->segment(1) == 'permissoes' and $this->uri->segment(2) == 'gerenciar' or $this->uri->segment(1) == 'os' and $this->uri->segment(2) == 'gerenciarstatus' or $this->uri->segment(1) == 'os' and $this->uri->segment(2) == 'gerenciarTiposEquipamentos') {
                            echo "active";
                        }
                        ?> treeview" id='1'>
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>Configurações e cadastros</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mUsuario')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'usuario' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/usuario/gerenciar"><i class="fa fa-user-plus"></i> Gerenciar Usuários</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mPermissao')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'permissoes' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/permissoes/gerenciar"><i class="fa fa-tags"></i> Permissões</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mStatusOS')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'os' && $this->router->fetch_method() == 'gerenciarstatus') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/os/gerenciarstatus"><i class="glyphicon glyphicon-stats"></i> Gerenciar Status OS</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mTiposEquipamentos')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'os' && $this->router->fetch_method() == 'gerenciarTiposEquipamentos') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/os/gerenciarTiposEquipamentos"><i class="glyphicon glyphicon-hdd"></i> Gerenciar Tipos Equipamentos</a>
                                    </li>
                                <?php } ?>


                                <li><a href="<?php echo base_url() ?>index.php/login/sair"><i class="fa  fa-power-off"></i> Sair</a></li>
                            </ul>
                        </li>

                    </ul>

                </section>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="12">

                            <div class="container-fluid pt-3">
                                <h3 class="font-weight-light text-white">Kanban Board</h3>
                                <div class="small  text-light">Drag and drop between swim lanes</div>
                                <div class="row flex-row flex-sm-nowrap py-3">
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="card-title text-uppercase text-truncate py-2">Oportunidade</h6>
                                                <div class="items border border-light">
                                                    <div class="card draggable shadow-sm" id="cd1" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-154</a>
                                                            </div>
                                                            <p>
                                                                This is a description of a item on the board.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                    <div class="card draggable shadow-sm" id="cd2" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-156</a>
                                                            </div>
                                                            <p>
                                                                This is a description of a item on the board.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                    <div class="card draggable shadow-sm" id="cd3" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-157</a>
                                                            </div>
                                                            <p>
                                                                This is an item on the board. There is some descriptive text that explains the item here.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="card-title text-uppercase text-truncate py-2">Demonstração</h6>
                                                <div class="items border border-light">
                                                    <div class="card draggable shadow-sm" id="cd1" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-152</a>
                                                            </div>
                                                            <p>
                                                                This is a task that is being worked on.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                    <div class="card draggable shadow-sm" id="cd2" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-153</a>
                                                            </div>
                                                            <p>
                                                                Another task here that is in progress.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <div class="card bg-light">
                                            <div class="card-body">
                                                <h6 class="card-title text-uppercase text-truncate py-2">Proposta entregue</h6>
                                                <div class="items border border-light">
                                                    <div class="card draggable shadow-sm" id="cd9" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-158</a>
                                                            </div>
                                                            <p>
                                                                This is a description of a item on the board.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-md-4 col-xl-3">
                                        <div class="card">
                                            <div class="card-body">
                                                <h6 class="card-title text-uppercase text-truncate py-2">Negócio fechado</h6>
                                                <div class="items border border-light">
                                                    <div class="card draggable shadow-sm" id="cd11" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-144</a>
                                                            </div>
                                                            <p>
                                                                This is a description of an item.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                    <div class="card draggable shadow-sm" id="cd12" draggable="true" ondragstart="drag(event)">
                                                        <div class="card-body p-2">
                                                            <div class="card-title">
                                                                <img src="//placehold.it/30" class="rounded-circle float-right">
                                                                <a href="" class="lead font-weight-light">TSK-146</a>
                                                            </div>
                                                            <p>
                                                                This is a description of a task item.
                                                            </p>
                                                            <button class="btn btn-primary btn-sm">View</button>
                                                        </div>
                                                    </div>
                                                    <div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <!-- /.row -->
                    <!-- Main row -->
                </section>
                <!-- /.content -->
            </div>
            <script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
            <!-- jQuery UI 1.11.4 -->
            <script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
            <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
            <script>
                                                        $.widget.bridge('uibutton', $.ui.button);
            </script>
            <!-- Bootstrap 3.3.7 -->
            <script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
            <!-- Morris.js charts -->
            <script src="<?php echo base_url('assets/bower_components/chart.js/Chart.js') ?>"></script>
            <script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.categories.js') ?>"></script>
            <script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.js') ?>"></script>
            <script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.resize.js') ?>"></script>
            <!-- Sparkline -->
            <script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
            <!-- jvectormap -->
            <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
            <script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
            <!-- jQuery Knob Chart -->
            <script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
            <!-- daterangepicker -->
            <script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>'"></script>
            <script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
            <!-- datepicker -->
            <script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
            <!-- Bootstrap WYSIHTML5 -->
            <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
            <!-- Slimscroll -->
            <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
            <!-- FastClick -->
            <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
            <!-- AdminLTE App -->
            <script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
            <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
            <script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
            <!-- AdminLTE for demo purposes -->
            <script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
            <script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>


            <!-- Select2 -->
            <script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
            <!-- InputMask -->
            <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js') ?>../../plugins"></script>
            <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
            <script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>


            <!-- SlimScroll -->
            <script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
            <!-- iCheck 1.0.1 -->
            <script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
            <!-- FastClick -->
            <script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
<script>
alert("teste");
 const drag = (event) => {
  event.dataTransfer.setData("text/plain", event.target.id);
}

const allowDrop = (ev) => {
  ev.preventDefault();
  if (hasClass(ev.target,"dropzone")) {
    addClass(ev.target,"droppable");
  }
}

const clearDrop = (ev) => {
    removeClass(ev.target,"droppable");
}

const drop = (event) => {
  event.preventDefault();
  const data = event.dataTransfer.getData("text/plain");
  const element = document.querySelector(`#${data}`);
  try {
    // remove the spacer content from dropzone
    event.target.removeChild(event.target.firstChild);
    // add the draggable content
    event.target.appendChild(element);
    // remove the dropzone parent
    unwrap(event.target);
  } catch (error) {
    console.warn("can't move the item to the same place")
  }
  updateDropzones();
}

const updateDropzones = () => {
    /* after dropping, refresh the drop target areas
      so there is a dropzone after each item
      using jQuery here for simplicity */
    
    var dz = $('<div class="dropzone rounded" ondrop="drop(event)" ondragover="allowDrop(event)" ondragleave="clearDrop(event)"> &nbsp; </div>');
    
    // delete old dropzones
    $('.dropzone').remove();

    // insert new dropdzone after each item   
    dz.insertAfter('.card.draggable');
    
    // insert new dropzone in any empty swimlanes
    $(".items:not(:has(.card.draggable))").append(dz);
};

// helpers
function hasClass(target, className) {
    return new RegExp('(\\s|^)' + className + '(\\s|$)').test(target.className);
}

function addClass(ele,cls) {
  if (!hasClass(ele,cls)) ele.className += " "+cls;
}

function removeClass(ele,cls) {
  if (hasClass(ele,cls)) {
    var reg = new RegExp('(\\s|^)'+cls+'(\\s|$)');
    ele.className=ele.className.replace(reg,' ');
  }
}

function unwrap(node) {
    node.replaceWith(...node.childNodes);
}

        </script>

    </body>

</html>