<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>StoreAssist</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/font-awesome/css/font-awesome.min.css') ?>">
        <!-- Ionicons -->
        <link rel="stylesheet" href="<?php echo base_url('assets/bower_components/Ionicons/css/ionicons.min.css') ?>">
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

            <header class="main-header">
                <!-- Logo -->
                <a href="index2.html" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>ST</b>CRM</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>Store</b>CRM</span>
                </a>
                <!-- Header Navbar: style can be found in header.less -->
                <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <span class="sr-only">Toggle navigation</span>
                    </a>

                </nav>
            </header>
            <!-- Left side column. contains the logo and sidebar -->
            <aside class="main-sidebar">
                <!-- sidebar: style can be found in sidebar.less -->
                <section class="sidebar">
                    <!-- search form -->
                    <form action="#" method="get" class="sidebar-form">
                        <div class="input-group">
                            <input type="text" name="q" class="form-control" placeholder="Search...">
                            <span class="input-group-btn">
                                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                    <!-- /.search form -->
                    <!-- sidebar menu: : style can be found in sidebar.less -->
                    <ul class="sidebar-menu" data-widget="tree">
                        <li>
                            <a href="<?php echo base_url() ?>index.php/dashboard">
                                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                            </a>
                        </li>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mProposta')) { ?>
                            <li>
                                <a href="<?php echo base_url() ?>index.php/crm/gerenciar">
                                    <i class="fa fa-group"></i> <span>CRM</span>
                                </a>
                            </li>
                        <?php } ?>
                        <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mProposta')) { ?>
                            <li>
                                <a href="<?php echo base_url() ?>index.php/proposta/gerenciar">
                                    <i class="fa fa-list-ol"></i> <span>Gerenciar propostas</span>
                                </a>
                            </li>
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
                        <li class="active treeview menu-open">
                            <a href="#">
                                <i class="fa fa-gears"></i>
                                <span>Configurações e cadastros</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-left pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mUsuario')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'Usuario' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/usuario/gerenciar"><i class="fa fa-user-plus"></i> Gerenciar Usuários</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mPermissao')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'permissoes' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/permissoes/gerenciar"><i class="fa fa-tags"></i> Permissões</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mStatuslead')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'Usuario' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/crm/gerenciarstatus"><i class="fa fa-tags"></i> Gerenciar Status CRM</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mIndicacaolead')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'Usuario' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/crm/gerenciarindicacao"><i class="fa fa-tags"></i> Gerenciar Indicacação CRM</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'mSeguimentolead')) { ?>
                                    <li class="<?= ($this->router->fetch_class() == 'Usuario' && $this->router->fetch_method() == 'gerenciar') ? 'active' : null; ?>">
                                        <a href="<?php echo base_url() ?>index.php/crm/gerenciarseguimento"><i class="fa fa-tags"></i> Gerenciar Seguimento CRM</a>
                                    </li>
                                <?php } ?>

                                <!--
                                <li><a href="<?php echo base_url() ?>index.php/estado/gerenciarestado"><i class="fa fa-circle-o"></i> Gerenciar estados de O.S.</a></li>
                                <li><a href="<?php echo base_url() ?>index.php/equipamento/gerenciarequipamento"><i class="fa fa-circle-o"></i> Gereciar técnicos</a></li>
                                -->
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