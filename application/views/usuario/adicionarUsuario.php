<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Usuários
        <small>Cadastrar usuário</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li > Usuários</li>
        <li class="active"> Cadastrar usuário</li>
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
    <form action="<?php echo base_url() ?>index.php/usuario/add" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">PREENCHA OS DADOS DO USUÁRIO ABAIXO</h3>
                    </div>
                    <div class="box-body">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Nome</label>
                                <input type="text" class="form-control" name="nome" placeholder="Ex.: João da Silva" value="<?= set_value('nome') ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>E-mail</label>
                                <input type="email" class="form-control" name="email" placeholder="Ex.: xxxxxxx@storeware.com.br" value="<?= set_value('email') ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-3">
                            <label>Senha</label>
                            <input type="password" class="form-control" name="senha" value="<?= set_value('senha') ?>">
                        </div>
                        <div class="form-group col-md-3">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="form-control" name="status">
                                    <option selected="" value="1">Ativado</option>
                                    <option value="0">Desativado</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label>Telefone</label>
                                <input type="text" class="form-control" maxlength="15" name="telefone" value="<?= set_value('telefone') ?>">
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label>Filial</label>
                                <select class="form-control" name="filial">
                                    <option value="SP">São Paulo</option>
                                    <option value="SAN">Santos</option>
                                    <option value="BP">Bragança Paulista</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group col-md-2">
                            <div class="form-group">
                                <label>Permissão</label>
                                <select class="form-control" name="permissao">
                                    <?php foreach ($permissao as $p) { ?>
                                        <option selected="" value="<?php echo $p->idPermissao; ?>"><?php echo $p->nome; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group text-left">
                                <button type="submit" class="btn btn-success"> SALVAR </button>
                                <a title="cancelar" href="<?php echo base_url() ?>index.php/usuario/gerenciar" class="btn btn-danger btn-small">CANCELAR </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>

</section>
<?php $this->load->view('template/footer'); ?>