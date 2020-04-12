<?php $this->load->view('template/menu'); ?>
<?php $permissoes = unserialize($result->permissoes); ?>

<section class="content-header">
    <h1>
        Permissões
        <small>Adicionar permissões</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class=""> Gerenciar permissões</li>
        <li class="active"> Adicionar permissões</li>
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
    <form action="<?php echo base_url(); ?>index.php/permissoes/editar" id="formPermissao" method="post">
        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">GERENCIAR PERMISSÕES DO SISTEMA</h3>
                    </div>
                    <div class="box-body">

                        <div class="col-md-6">
                            <label>Nome da Permissão</label>
                            <input name="nome" type="text" id="nome" class="form-control" value="<?php echo $result->nome; ?>" />
                            <input type="hidden" name="idPermissao" value="<?php echo $result->idPermissao; ?>">

                        </div>
                        <div class="col-md-3">
                            <label>Situação</label>
                            <select name="situacao" id="situacao" class="form-control">
                                <?php
                                if ($result->situacao == 1) {
                                    $sim = 'selected';
                                    $nao = '';
                                } else {
                                    $sim = '';
                                    $nao = 'selected';
                                }
                                ?>
                                <option value="1" <?php echo $sim; ?>>Ativo</option>
                                <option value="0" <?php echo $nao; ?>>Inativo</option>
                            </select>
                        </div>
                        <br><br><br>
                        <div class="control-group">
                            <label for="documento" class="control-label"></label>
                            <div class="controls">

                                <table class="table table-bordered table-hover table-striped table-condensed table-responsive">
                                    <tbody>
                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vOS'])) {
                                                        if ($permissoes['vOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar OS</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aOS'])) {
                                                        if ($permissoes['aOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar OS</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eOS'])) {
                                                        if ($permissoes['eOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dOS'])) {
                                                        if ($permissoes['dOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir OS</span>
                                                </label>
                                            </td>
                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['iOS'])) {
                                                        if ($permissoes['iOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="iOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Imprimir OS</span>
                                                </label>
                                            </td>

                                        </tr>

                                        <tr><td colspan="5"></td></tr>
                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vUsuario'])) {
                                                        if ($permissoes['vUsuario'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar Usuário</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aUsuario'])) {
                                                        if ($permissoes['aUsuario'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Usuário</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eUsuario'])) {
                                                        if ($permissoes['eUsuario'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Usuário</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dUsuario'])) {
                                                        if ($permissoes['dUsuario'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Usuário</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="5"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vLead'])) {
                                                        if ($permissoes['vLead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aLead'])) {
                                                        if ($permissoes['aLead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eLead'])) {
                                                        if ($permissoes['eLead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dLead'])) {
                                                        if ($permissoes['dLead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Lead</span>
                                                </label>
                                            </td>
                                            
                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['oLead'])) {
                                                        if ($permissoes['oLead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="oLead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Ocultar Lead</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="5"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vStatusOS'])) {
                                                        if ($permissoes['vStatusOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vStatusOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar Status OS</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aStatusOS'])) {
                                                        if ($permissoes['aStatusOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aStatusOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Status OS</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eStatusOS'])) {
                                                        if ($permissoes['eStatusOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eStatusOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Status OS</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dStatusOS'])) {
                                                        if ($permissoes['dStatusOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dStatusOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Status OS</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="5"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vTiposEquipamentos'])) {
                                                        if ($permissoes['vTiposEquipamentos'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vTiposEquipamentos" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar Tipos Equipamentos</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aTiposEquipamentos'])) {
                                                        if ($permissoes['aTiposEquipamentos'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aTiposEquipamentos" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Tipos Equipamentos</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eTiposEquipamentos'])) {
                                                        if ($permissoes['eTiposEquipamentos'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eTiposEquipamentos" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Tipos Equipamentos</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dTiposEquipamentos'])) {
                                                        if ($permissoes['dTiposEquipamentos'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dTiposEquipamentos" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Tipos Equipamentos</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="5"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vSeguimentolead'])) {
                                                        if ($permissoes['vSeguimentolead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aSeguimentolead'])) {
                                                        if ($permissoes['aSeguimentolead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eSeguimentolead'])) {
                                                        if ($permissoes['eSeguimentolead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dSeguimentolead'])) {
                                                        if ($permissoes['dSeguimentolead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Seguimento Lead</span>
                                                </label>
                                            </td>

                                        </tr>
                                        <tr><td colspan="4"></td></tr>

                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vAgenda'])) {
                                                        if ($permissoes['vAgenda'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aAgenda'])) {
                                                        if ($permissoes['aAgenda'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eAgenda'])) {
                                                        if ($permissoes['eAgenda'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dAgenda'])) {
                                                        if ($permissoes['dAgenda'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Agenda</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['tAgenda'])) {
                                                        if ($permissoes['tAgenda'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="tAgenda" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Todas Agendas</span>
                                                </label>
                                            </td>
                                        </tr>

                                        <tr><td colspan="5"></td></tr>

                                        <tr>
                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['vBiblioteca'])) {
                                                        if ($permissoes['vBiblioteca'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="vBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Visualizar Biblioteca</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['aBiblioteca'])) {
                                                        if ($permissoes['aBiblioteca'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="aBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Adicionar Biblioteca</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['eBiblioteca'])) {
                                                        if ($permissoes['eBiblioteca'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="eBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Editar Biblioteca</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['dBiblioteca'])) {
                                                        if ($permissoes['dBiblioteca'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="dBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Excluir Biblioteca</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="5"></td></tr>


                                        <tr>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mOS'])) {
                                                        if ($permissoes['mOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu OS</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mUsuario'])) {
                                                        if ($permissoes['mUsuario'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mUsuario" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Usuário</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mPermissao'])) {
                                                        if ($permissoes['mPermissao'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mPermissao" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Permissão</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mCrm'])) {
                                                        if ($permissoes['mCrm'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mCrm" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu CRM</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mTiposEquipamentos'])) {
                                                        if ($permissoes['mTiposEquipamentos'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mTiposEquipamentos" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Tipos Equipamentos</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <tr><td colspan="5"></td></tr>
                                        <tr>
                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mStatusOS'])) {
                                                        if ($permissoes['mStatusOS'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mStatusOS" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Status OS</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mSeguimentolead'])) {
                                                        if ($permissoes['mSeguimentolead'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mSeguimentolead" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Seguimento Lead</span>
                                                </label>
                                            </td>

                                            <td>
                                                <label>
                                                    <input <?php
                                                    if (isset($permissoes['mBiblioteca'])) {
                                                        if ($permissoes['mBiblioteca'] == '1') {
                                                            echo 'checked';
                                                        }
                                                    }
                                                    ?> name="mBiblioteca" class="marcar" type="checkbox" value="1" />
                                                    <span class="lbl"> Menu Biblioteca</span>
                                                </label>
                                            </td>
                                        </tr>
                                        <!-- <?php /*
                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['vServico'])){ if($permissoes['vServico'] == '1'){echo 'checked';}}?> name="vServico" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Visualizar Serviço</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['aServico'])){ if($permissoes['aServico'] == '1'){echo 'checked';}}?> name="aServico" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Adicionar Serviço</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['eServico'])){ if($permissoes['eServico'] == '1'){echo 'checked';}}?> name="eServico" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Editar Serviço</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['dServico'])){ if($permissoes['dServico'] == '1'){echo 'checked';}}?> name="dServico" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Excluir Serviço</span>
                                                          </label>
                                                          </td>

                                                          </tr>

                                                          <tr><td colspan="4"></td></tr>
                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['vOs'])){ if($permissoes['vOs'] == '1'){echo 'checked';}}?> name="vOs" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Visualizar OS</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['aOs'])){ if($permissoes['aOs'] == '1'){echo 'checked';}}?> name="aOs" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Adicionar OS</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['eOs'])){ if($permissoes['eOs'] == '1'){echo 'checked';}}?> name="eOs" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Editar OS</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['dOs'])){ if($permissoes['dOs'] == '1'){echo 'checked';}}?> name="dOs" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Excluir OS</span>
                                                          </label>
                                                          </td>

                                                          </tr>
                                                          <tr><td colspan="4"></td></tr>

                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['vVenda'])){ if($permissoes['vVenda'] == '1'){echo 'checked';}}?> name="vVenda" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Visualizar Venda</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['aVenda'])){ if($permissoes['aVenda'] == '1'){echo 'checked';}}?> name="aVenda" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Adicionar Venda</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['eVenda'])){ if($permissoes['eVenda'] == '1'){echo 'checked';}}?> name="eVenda" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Editar Venda</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['dVenda'])){ if($permissoes['dVenda'] == '1'){echo 'checked';}}?> name="dVenda" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Excluir Venda</span>
                                                          </label>
                                                          </td>

                                                          </tr>

                                                          <tr><td colspan="4"></td></tr>

                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['vArquivo'])){ if($permissoes['vArquivo'] == '1'){echo 'checked';}}?> name="vArquivo" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Visualizar Arquivo</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['aArquivo'])){ if($permissoes['aArquivo'] == '1'){echo 'checked';}}?> name="aArquivo" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Adicionar Arquivo</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['eArquivo'])){ if($permissoes['eArquivo'] == '1'){echo 'checked';}}?> name="eArquivo" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Editar Arquivo</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['dArquivo'])){ if($permissoes['dArquivo'] == '1'){echo 'checked';}}?> name="dArquivo" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Excluir Arquivo</span>
                                                          </label>
                                                          </td>

                                                          </tr>

                                                          <tr><td colspan="4"></td></tr>

                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['vLancamento'])){ if($permissoes['vLancamento'] == '1'){echo 'checked';}}?> name="vLancamento" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Visualizar Lançamento</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['aLancamento'])){ if($permissoes['aLancamento'] == '1'){echo 'checked';}}?> name="aLancamento" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Adicionar Lançamento</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['eLancamento'])){ if($permissoes['eLancamento'] == '1'){echo 'checked';}}?> name="eLancamento" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Editar Lançamento</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['dLancamento'])){ if($permissoes['dLancamento'] == '1'){echo 'checked';}}?> name="dLancamento" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Excluir Lançamento</span>
                                                          </label>
                                                          </td>

                                                          </tr>

                                                          <tr><td colspan="4"></td></tr>

                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['rCliente'])){ if($permissoes['rCliente'] == '1'){echo 'checked';}}?> name="rCliente" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Relatório Cliente</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['rServico'])){ if($permissoes['rServico'] == '1'){echo 'checked';}}?> name="rServico" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Relatório Serviço</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['rOs'])){ if($permissoes['rOs'] == '1'){echo 'checked';}}?> name="rOs" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Relatório OS</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['rProduto'])){ if($permissoes['rProduto'] == '1'){echo 'checked';}}?> name="rProduto" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Relatório Produto</span>
                                                          </label>
                                                          </td>

                                                          </tr>

                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['rVenda'])){ if($permissoes['rVenda'] == '1'){echo 'checked';}}?> name="rVenda" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Relatório Venda</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['rFinanceiro'])){ if($permissoes['rFinanceiro'] == '1'){echo 'checked';}}?> name="rFinanceiro" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Relatório Financeiro</span>
                                                          </label>
                                                          </td>
                                                          <td colspan="2"></td>

                                                          </tr>
                                                          <tr><td colspan="4"></td></tr>

                                                          <tr>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['cUsuario'])){ if($permissoes['cUsuario'] == '1'){echo 'checked';}}?> name="cUsuario" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Configurar Usuário</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['cEmitente'])){ if($permissoes['cEmitente'] == '1'){echo 'checked';}}?> name="cEmitente" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Configurar Emitente</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['cPermissao'])){ if($permissoes['cPermissao'] == '1'){echo 'checked';}}?> name="cPermissao" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Configurar Permissão</span>
                                                          </label>
                                                          </td>

                                                          <td>
                                                          <label>
                                                          <input <?php if(isset($permissoes['cBackup'])){ if($permissoes['cBackup'] == '1'){echo 'checked';}}?> name="cBackup" class="marcar" type="checkbox" value="1" />
                                                          <span class="lbl"> Backup</span>
                                                          </label>
                                                          </td>

                                                          </tr>
                                                         */ ?>-->
                                    </tbody>
                                </table>
                            </div>
                        </div>



                        <div class="form-actions">
                            <div class="span12">
                                <div class="span6 offset3">
                                    <button type="submit" class="btn btn-primary"><i class="icon-ok icon-white"></i> Alterar</button>
                                    <a href="<?php echo base_url() ?>index.php/permissoes" id="" class="btn btn-danger"><i class="icon-arrow-left"></i> Voltar</a>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>


            </div>

    </form>

</div>


<script type="text/javascript" src="<?php echo base_url() ?>assets/js/validate.js"></script>
<script type="text/javascript">
    $(document).ready(function () {

        $("#marcarTodos").change(function () {
            $("input:checkbox").prop('checked', $(this).prop("checked"));
        });


        $("#formPermissao").validate({
            rules: {
                nome: {required: true}
            },
            messages: {
                nome: {required: 'Campo obrigatório'}
            }
        });



    });
</script>
