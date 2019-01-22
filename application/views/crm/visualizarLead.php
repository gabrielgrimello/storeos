<?php $this->load->view('template/menu'); ?>


<section class="content-header">
    <h1>
        CRM
        <small>Visualizar Lead</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > CRM</li>
        <li class="active"> Visualizar Lead</li>
    </ol>
</section>
<section class="content">
    <div class="col-md-12">
        <div class="form-group text-left">

            <a title="Voltar" href="<?php echo base_url() ?>index.php/crm/gerenciar" class="btn btn-danger btn-small">VOLTAR </a>

        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <div class="col-md-6">
                        <?php echo form_hidden('idcrm', $result->idcrm) ?>
                        <div class="form-group">
                            <label>Empresa </label>
                            <input type="text" class="form-control" disabled name="empresa" value="<?php echo $result->empresa; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Nome do contato</label>
                            <input type="text" class="form-control" disabled name="nome" placeholder="Ex.: João da Silva" value="<?php echo $result->nome; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control" disabled maxlength="15" name="telefone" value="<?php echo $result->telefone; ?>">
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label>E-mail</label>
                            <input type="email" class="form-control" disabled name="email"  value="<?php echo $result->email; ?>">
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label>Cargo </label>
                            <input type="text" class="form-control" disabled name="cargo"  value="<?php echo $result->cargo; ?>">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>Endereço </label>
                            <input type="text" class="form-control" disabled name="endereco"  value="<?php echo $result->endereco; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Bairro </label>
                            <input type="text" class="form-control" disabled name="bairro"  value="<?php echo $result->bairro; ?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Cidade </label>
                            <input type="text" class="form-control" disabled name="cidade"  value="<?php echo $result->cidade; ?>">
                        </div>
                    </div>
                    <div class=" col-md-3">
                        <div class="form-group">
                            <label>Status</label>
                            <select class="form-control" disabled name="status">
                                <?php
                                foreach ($statusfunil as &$value) {
                                    ?>
                                    <option <?php
                                    if ($result->status == $value->idstatus) {
                                        echo "selected";
                                    }
                                    ?> value = <?php echo $value->idstatus; ?> >
                                        <?php echo $value->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Fonte da indicação</label>
                            <select class="form-control" disabled name="fonte">
                                <?php
                                foreach ($indicacao as $value2) {
                                    ?>
                                    <option <?php
                                    if ($result->fonte == $value2->idindicacao) {
                                        echo "selected";
                                    }
                                    ?> value = <?php echo $value2->idindicacao; ?> >
                                        <?php echo $value2->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label>Seguimento</label>
                            <select class="form-control" disabled name="seguimento">
                                <?php
                                foreach ($seguimento as $value2) {
                                    ?>
                                    <option <?php
                                    if ($result->seguimento == $value2->idseguimento) {
                                        echo "selected";
                                    }
                                    ?> value = <?php echo $value2->idseguimento; ?> >
                                        <?php echo $value2->descricao; ?></option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



    <!-- TIME LINE - INICIO DO CODIGO -->

    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-header with-border">
                    <h3 class="box-title">TIMELINE DE HISTÓRICO</h3>
                </div>
                <div class="box-body">
                    <ul class="timeline" id="divTimeline">
                        <?php
                        foreach ($timeline as $t) {
                            ?>
                            <!-- timeline time label -->
                            <li class="time-label">
                                <span class="bg-red">
                                    <?php
                                    echo $t->data;
                                    ?>
                                </span>
                            </li>
                            <!-- /.timeline-label -->

                            <!-- timeline item -->
                            <li>
                                <!-- timeline icon -->
                                <i class="fa fa-envelope bg-blue"></i>
                                <div class="timeline-item" >
                                    <h3 class="timeline-header"><?php echo $t->nome; ?></h3>
                                    <div class="timeline-body">
                                        <?php echo $t->descricao ?>
                                    </div>  

                                </div>
                            </li>
                            <!-- TIME LINE - FIM DO CODIGO -->

                            <?php
                        }
                        ?>
                    </ul>

                </div>
            </div>
        </div>
    </div>
</section>
<?php $this->load->view('template/footer'); ?>
