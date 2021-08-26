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
        <!-- Select2 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.js') ?>">
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
        
        <!-- ARRASTA E SOLTA FOTOS OS -->
        <script type="text/javascript" src="<?php echo base_url('assets/js/dropzone/dist/dropzone.js') ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/js/dropzone/dist/dropzone.css') ?>">

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
    <body class="hold-transition skin-green layout-top-nav">
        <div class="wrapper">

            <header class="main-header">
                <nav class="navbar navbar-static-top">
                    <div class="container">
                        <?php $dadoslogin = $this->session->all_userdata(); ?>            
                        <div class="navbar-header">
                            <a href="<?php echo base_url() ?>index.php/dashboard" class="navbar-brand"><b>Store</b>OS</a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button>
                        </div>

                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                            <ul class="nav navbar-nav">

                                <li class="<?= ($this->router->fetch_class() == 'dashboard') ? 'active' : null; ?>">
                                    <a href="<?php echo base_url() ?>index.php/dashboard"><span>Dashboard</span>
                                    </a>
                                </li>

                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mOS')) { ?>
                                                    <!--                                    <li class="<?= ($this->router->fetch_class() == 'calendario') ? 'active' : null; ?>">
                                                                                            <a href="<?php echo base_url() ?>index.php/calendario">
                                                                                                <i class="fa fa-calendar"></i> <span>Calendario</span>
                                                                                            </a>
                                                                                        </li>-->
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mBiblioteca')) { ?>
                                    <!--                                    <li>
                                                                            <a href="<?php echo base_url() ?>index.php/biblioteca/gerenciar">
                                                                                <i class="fa fa-book"></i> <span>Biblioteca</span>
                                                                            </a>
                                                                        </li>-->
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mOS')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'os' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/os/gerenciar"><span>Gerenciar OS</span></a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mOS')) { ?>
                                    <li>
                                        <a data-toggle="modal" data-target="#modal-success" id="alterarOS"><span>Alterar OS</span></a>
                                    </li>
                                <?php } ?>
                                <li class="<?php
                                if ($this->uri->segment(1) == 'usuario' and $this->uri->segment(2) == 'gerenciar' or $this->uri->segment(1) == 'permissoes' and $this->uri->segment(2) == 'gerenciar' or $this->uri->segment(1) == 'os' and $this->uri->segment(2) == 'gerenciarstatus' or $this->uri->segment(1) == 'os' and $this->uri->segment(2) == 'gerenciarTiposEquipamentos') {
                                    echo "active";
                                }
                                ?> dropdown" id='1'>
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">Configurações e cadastros <span class="caret"></span></a>
                                    <ul class="dropdown-menu" role="menu">
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

                        </div>

                        <!-- /.navbar-collapse -->
                        <!-- Navbar Right Menu -->
                        <div class="navbar-custom-menu">
                            <ul class="nav navbar-nav">
                                <!-- Messages: style can be found in dropdown.less-->
                                <li class="dropdown messages-menu">
                                    <!-- Menu toggle button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="label label-success">4</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 4 messages</li>
                                        <li>
                                            <!-- inner menu: contains the messages -->
                                            <ul class="menu">
                                                <li><!-- start message -->
                                                    <a href="#">
                                                        <div class="pull-left">
                                                            <!-- User Image -->
                                                            <img src="" class="img-circle" alt="User Image">
                                                        </div>
                                                        <!-- Message title and timestamp -->
                                                        <h4>
                                                            Support Team
                                                            <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                        </h4>
                                                        <!-- The message -->
                                                        <p>Why not buy a new awesome theme?</p>
                                                    </a>
                                                </li>
                                                <!-- end message -->
                                            </ul>
                                            <!-- /.menu -->
                                        </li>
                                        <li class="footer"><a href="#">See All Messages</a></li>
                                    </ul>
                                </li>
                                <!-- /.messages-menu -->

                                <!-- Notifications Menu -->
                                <li class="dropdown notifications-menu">
                                    <!-- Menu toggle button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-bell-o"></i>
                                        <span class="label label-warning">10</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 10 notifications</li>
                                        <li>
                                            <!-- Inner Menu: contains the notifications -->
                                            <ul class="menu">
                                                <li><!-- start notification -->
                                                    <a href="#">
                                                        <i class="fa fa-users text-aqua"></i> 5 new members joined today
                                                    </a>
                                                </li>
                                                <!-- end notification -->
                                            </ul>
                                        </li>
                                        <li class="footer"><a href="#">View all</a></li>
                                    </ul>
                                </li>
                                <!-- Tasks Menu -->
                                <li class="dropdown tasks-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-flag-o"></i>
                                        <span class="label label-danger">9</span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <li class="header">You have 9 tasks</li>
                                        <li>
                                            <!-- Inner menu: contains the tasks -->
                                            <ul class="menu">
                                                <li><!-- Task item -->
                                                    <a href="#">
                                                        <!-- Task title and progress text -->
                                                        <h3>
                                                            Design some buttons
                                                            <small class="pull-right">20%</small>
                                                        </h3>
                                                        <!-- The progress bar -->
                                                        <div class="progress xs">
                                                            <!-- Change the css width attribute to simulate progress -->
                                                            <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                                <span class="sr-only">20% Complete</span>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <!-- end task item -->
                                            </ul>
                                        </li>
                                        <li class="footer">
                                            <a href="#">View all tasks</a>
                                        </li>
                                    </ul>
                                </li>
                                <!-- User Account Menu -->
                                <li class="dropdown user user-menu">
                                    <!-- Menu Toggle Button -->
                                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <span class="hidden-xs"><?php echo $dadoslogin['nome']; ?></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        <!-- The user image in the menu -->
                                        <li class="user-header">
                                            <p>
                                                <?php echo $this->session->nome; ?>

                                            </p>
                                        </li>
                                        <!-- Menu Body -->
                                        <li class="user-body">
                                            <div class="row">
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Followers</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Sales</a>
                                                </div>
                                                <div class="col-xs-4 text-center">
                                                    <a href="#">Friends</a>
                                                </div>
                                            </div>
                                            <!-- /.row -->
                                        </li>
                                        <!-- Menu Footer-->
                                        <li class="user-footer">
                                            <div class="pull-left">
                                                <a href="#" class="btn btn-default btn-flat">Profile</a>
                                            </div>
                                            <div class="pull-right">
                                                <a href="#" class="btn btn-default btn-flat">Sign out</a>
                                            </div>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                        <!-- /.navbar-custom-menu -->
                    </div>
                    <!-- /.container-fluid -->
                </nav>
            </header>
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
                                <form action="<?php echo base_url() ?>index.php/os/botaoAlterarOS" method="post">
                                    <div class="col-md-12">
                                        <div class="col-md-12">
                                            <input type="text" name="idOSAlterar" id="idOSAlterar" class="form-control">
                                        </div>
                                        <br> <br>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                            <button type="submit" class="btn btn-success ">Abrir OS</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
            </div>
            <div class="content-wrapper">

                <section class="content">
                    <div class="row">
                        <div class="12">
