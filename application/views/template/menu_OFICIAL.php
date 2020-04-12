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

        <link href="<?php echo base_url('assets/fullcalendar/packages/core/main.css') ?>" rel='stylesheet' />
        <link href="<?php echo base_url('assets/fullcalendar/packages/daygrid/main.css') ?>" rel='stylesheet' />
        <link href="<?php echo base_url('assets/fullcalendar/packages/timegrid/main.css') ?>" rel='stylesheet' />
        <link href="<?php echo base_url('assets/fullcalendar/packages/list/main.css') ?>" rel='stylesheet' />
        <script src="<?php echo base_url('assets/fullcalendar/packages/core/main.js') ?>"></script>
        <script src="<?php echo base_url('assets/fullcalendar/packages/interaction/main.js') ?>"></script>
        <script src="<?php echo base_url('assets/fullcalendar/packages/daygrid/main.js') ?>"></script>
        <script src="<?php echo base_url('assets/fullcalendar/packages/timegrid/main.js') ?>"></script>
        <script src="<?php echo base_url('assets/fullcalendar/packages/list/main.js') ?>"></script>
        <script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
        
        <script>
            function alterarOS() {
                var idOSAlterar = document.getElementById('idOSAlterar');
                window.location.href = '<?php echo base_url() ?>index.php/os/editarOS/' + idOSAlterar.value;
            }
        </script>
        <!--        
        USEI NO SELECT2 - desabilitei para ver se fazia diferença
        
                <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
                <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
                <link href="path/to/select2.min.css" rel="stylesheet" />
                <script src="path/to/select2.min.js"></script>-->


        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
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
            <div class="modal modal-default fade" id="modal-success">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span></button>
                            <h4 class="modal-title">Digite o número ordem de serviço</h4>
                        </div>
                        <div class="modal-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="col-md-12">
                                        <input type="text" name="idOSAlterar" id="idOSAlterar" class="form-control">
                                    </div>
                                    <br> <br>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                        <button onclick="alterarOS()" class="btn btn-success ">Abrir OS<i class="icon-remove icon-white"></i></button>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <!-- Main content -->
                <section class="content">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        <div class="12">