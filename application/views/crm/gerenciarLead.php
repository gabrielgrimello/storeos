<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        CRM
        <small>Gerenciar Leads</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar Leads</li>
    </ol>
</section>
<section class="content">


    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">GERENCIAR LEADS CADASTRADOS NO SISTEMA</h3>
                </div>
                <div class="box-body">
                    <form method="get" action="<?php echo base_url(); ?>index.php/crm/gerenciar">
                        <div class="col-md-1">
                            <?php if ($this->permission->checkPermission($this->session->userdata('permissao'), 'aLead')) { ?>
                                <a href="<?php echo base_url(); ?>index.php/crm/add" class="btn btn-success"><i class="icon-plus icon-white"></i> Add Lead</a>
                            <?php } ?>
                        </div>
                        <div class="col-md-3">
                            <input class="form-control" type="text" name="empresa"  id="empresa"  placeholder="Empresa" value="" >
                        </div>
                        <div class="col-md-1">
                            <input class="form-control" type="text" name="idcrm"  id="idcrm"  placeholder="ID CRM" value="" >
                        </div>
                        <div class="col-md-3">
                            <select name="status" id="status" class="form-control">
                                <option value="">Selecione status</option>
                                <?php
                                foreach ($status as $value) {
                                    ?>
                                    <option value = <?php echo $value->idstatus; ?> ><?php echo $value->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <select name="vendedor" id="vendedor" class="form-control">
                                <option value="">Selecione o vendedor</option>
                                <?php
                                foreach ($usuarios as $value) {
                                    ?>
                                    <option value = <?php echo $value->idusuarios; ?> ><?php echo $value->nome; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>

                        <div class="col-md-1">
                            <button class="btn btn-danger"> <i class="icon-search"></i> Pesquisar</button>
                        </div>
                        <br><br>
                    </form>
                    <br>
                    <br>
                    <?php if (!$results) { ?>
                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                                <h5>Gerenciar Leads</h5>

                            </div>

                            <div class="widget-content nopadding table-responsive">


                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Descrição</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <tr>
                                            <td colspan="5">Nenhum Lead Cadastrado</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                    <?php } else { ?>

                        <div class="widget-box">
                            <div class="widget-title">
                                <span class="icon">
                                    <i class="icon-barcode"></i>
                                </span>
                            </div>

                            <div class="widget-content nopadding table-responsive">


                                <table class="table table-bordered">
                                    <thead>
                                        <tr style="backgroud-color: #2D335B">
                                            <th>ID</th>
                                            <th>Empresa</th>
                                            <th>Contato</th>
                                            <th>Telefone</th>
                                            <th>Seguimento</th>
                                            <th>Data</th>
                                            <th>Comercial</th>
                                            <th>Status</th>
                                            <th>Ações</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($results as $r) { ?>
                                            <tr> 
                                                <td><?php echo $r->idcrm; ?></td>
                                                <td><?php echo $r->empresa; ?></td> 
                                                <td><?php echo $r->nome; ?></td> 
                                                <td><?php echo $r->telefone; ?></td> 
                                                <td><?php
                                                    foreach ($seguimento as $value) {
                                                        if ($r->seguimento == $value->idseguimento) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td><?php echo $r->data; ?></td> 
                                                <td>
                                                    <?php
                                                    foreach ($usuarios as $value) {
                                                        if ($r->usuario == $value->idusuarios) {
                                                            echo $value->nome;
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    foreach ($status as $value) {
                                                        if ($r->status == $value->idstatus) {
                                                            echo $value->descricao;
                                                        }
                                                    }
                                                    ?>
                                                </td>

                                                <td class="text-center">
                                                    <a title="visualizar" href="<?php echo base_url() ?>index.php/crm/view/<?php echo $r->idcrm; ?>" class="btn btn-success btn-small">Visualizar <i class="fa-fw glyphicon glyphicon-eye-open"></i> </a>

                                                    <a title="editar" href="<?php echo base_url() ?>index.php/crm/edit/<?php echo $r->idcrm; ?>" 
                                                       class="btn btn-primary btn-small
                                                       <?php
                                                       foreach ($status as $value) {
                                                           if ($r->status == $value->idstatus) {
                                                               if ($value->encerra == 1) {
                                                                   echo "disabled";
                                                               }
                                                           }
                                                       }
                                                       ?>
                                                       ">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> 
                                                    </a>

                                                </td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>

                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <?php
                        echo $this->pagination->create_links();
                    }
                    ?>

                </div>
            </div>
        </div>
    </div>


</section>


<?php $this->load->view('template/footer'); ?>