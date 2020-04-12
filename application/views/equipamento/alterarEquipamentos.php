<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Equipamento
        <small>Alterar equipamentos</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > Configurações</li>
        <li class="active"> Alterar equipamentos</li>
    </ol>
</section>
<section class="content">
    <div class="col-md-8 col-md-offset-2">
        <?php if ($formErrors) { ?>
            <div class="alert alert-danger">
                <?= $formErrors ?>
            </div>
            <?php
        } else {
            if ($this->session->flashdata('success_msg')) {
                ?>
                <div class="alert alert-success">
                    <?= $this->session->flashdata('success_msg') ?>
                </div>
                <?php
            }
        }
        ?>

    </div>
    <form action="<?php echo current_url(); ?>" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <div class="col-md-6">
                            <h3 class="box-title">PREENCHA OS DADOS ABAIXO</h3>
                        </div>
                    </div>
                    <div class="box-body">
                        <div class="col-md-2">
                            <?php echo form_hidden('idEquipamento', $result->idEquipamento) ?>
                            <div class="form-group">
                                <label>Código </label>
                                <input type="hidden" name="os" id="os" value="<?php echo $os; ?>">
                                <input type="text" class="form-control" name="codigo" id="codigo" readonly="" value="<?php echo $result->idEquipamento; ?>">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Cliente </label>
                                <input type="text" class="form-control" name="cliente" id="cliente" readonly="" value="<?php echo $result->codigoCliente; ?>">
                            </div>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Nº série</label>
                            <input type="text" class="form-control" id="serie" name="serie" required="" minlength="3" value="<?php echo $result->serie; ?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Tipo</label>
                            <select class="form-control" name="tipo">
                                <?php
                                foreach ($tipo as $value2) {
                                    ?>
                                    <option value = <?php echo $value2->idTipo; ?> <?php
                                    if ($value2->idTipo == $result->tipo) {
                                        echo "selected";
                                    }
                                    ?> ><?php echo $value2->descricao; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required="" minlength="3"  value="<?php echo $result->marca ?>" >
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required="" minlength="3" value="<?php echo $result->modelo ?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Patrimônio</label>
                            <input type="text" class="form-control" id="patrimonio" name="patrimonio" value="<?php echo $result->patrimonio ?>">
                        </div>
                        <div class="col-md-3 text-right">
                            <div class="form-group">
                                <br>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $os; ?>" class="btn btn-danger btn-small"><i class="glyphicon glyphicon-remove"></i></a>
                                <button type="submit" class="btn btn-success"><i class="glyphicon glyphicon-floppy-disk"></i> </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>



