<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Ordem de serviço
        <small>Selecionar equipamento</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Adicionar Os</li>
        <li class="active"> Selecionar equipamento</li>
    </ol>
</section>
<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success" >
                <div class="box-header with-border">
                    <div class="col-md-7">
                        <h3 class="box-title">CADASTRAR NOVO EQUIPAMENTO</h3>
                    </div>
                </div>
                <div class="box-body">
                    <form action="<?php echo base_url() ?>index.php/os/alterarEquipamentoOsNovo" method="post">
                        <input type="hidden" class="form-control" name="cliente" id="cliente" value="<?php echo $codigoCliente ?>">
                        <input type="hidden" class="form-control" name="idOS" id="idOS" value="<?php echo $idOS ?>">
                        <div class="form-group col-sm-6">
                            <label>Nº série</label>
                            <input type="text" class="form-control" id="serie" name="serie" required="" minlength="3" value="<?php echo "" ?>">
                        </div>
                        <div class="form-group col-sm-6">
                            <label>Tipo</label>
                            <select class="form-control" name="tipo">
                                <option selected=""></option>
                                <?php
                                foreach ($tipo as $value2) {
                                    ?>
                                    <option value = <?php echo $value2->idTipo; ?> <?php
//                                    if ($value2->idTipo == $seguimentopost) {
//                                        echo "selected";
//                                    }
                                    ?> ><?php echo $value2->descricao; ?></option>
                                            <?php
                                        }
                                        ?>
                            </select>
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Marca</label>
                            <input type="text" class="form-control" id="marca" name="marca" required="" minlength="3"  value="<?php echo "" ?>" >
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Modelo</label>
                            <input type="text" class="form-control" id="modelo" name="modelo" required="" minlength="3" value="<?php echo "" ?>">
                        </div>
                        <div class="form-group col-sm-3">
                            <label>Patrimônio</label>
                            <input type="text" class="form-control" id="patrimonio" name="patrimonio" value="<?php echo "" ?>">
                        </div>
                        <div  class="col-sm-3">
                            <label>.</label>
                            <button class="btn btn-block btn-success">SALVAR </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-12">
            <div class="box box-success" >
                <div class="box-header with-border">
                    <div class="box-header">
                        <h3 class="box-title">EQUIPAMENTOS CADASTRADOS</h3>
                       
                    </div>
                    <div  id="divProdutos" class="box-body table-responsive no-padding">
                        <table class="table table-bordered table-hover table-striped table-condensed">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nº Série</th>
                                    <th>Tipo</th>
                                    <th>Marca</th>
                                    <th>Modelo</th>
                                    <th>Patrimônio</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                foreach ($equipamentosCliente as $e) {

                                    echo '<tr>';
                                    echo '<td>' . $e->idEquipamento . '</td>';
                                    echo '<td>' . $e->serie . '</td>';
                                    echo '<td>' . $e->tipo . '</td>';
                                    echo '<td>' . $e->marca . '</td>';
                                    echo '<td>' . $e->modelo . '</td>';
                                    echo '<td>' . $e->patrimonio . '</td>';
                                    echo '<td>'
                                    . ' <form action="' . base_url() . 'index.php/os/alterarEquipamentoOsExistente" method="post">
                                            <input type="hidden" class="form-control" name="idOS" id="idOS" value="' . $idOS . '">
                                            <input type="hidden" class="form-control" name="codigoEquipamento" id="codigoEquipamento" value="' . $e->idEquipamento . '">
                                            <button class="btn btn-block btn-success"><i class="glyphicon glyphicon-ok"></i></button>
                                        </form>
                                    </td>';
                                    echo '</tr>';
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

</section>
<?php $this->load->view('template/footer'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $(function () {
            $("#btAtualizarValor").click(function () {
                $("#codigo").val($("#codprod").val());
                $("#produto").val($("#nomeprod").val());
                $("#quantidade").val('1');
                $("#vlunitario").val($("#vlunitariomodal").val());


            });
        });

        $("#formProdutos").validate({
            rules: {
                codigo: {required: true},
                vlunitario: {required: true},
                quantidade: {required: true}
            },
            messages: {
                codigo: {required: 'Insira o codigo'},
                vlunitario: {required: 'Verifique se o produto/preço estão digitados corretamente'},
                quantidade: {required: 'Digite a quantidade'}
            },
            submitHandler: function (form) {

                var dados = $(form).serialize();
                $("#divProdutos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarProduto",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");
                            $("#codigo").val('');
                            $("#produto").val('');
                            $("#quantidade").val('');
                            $("#vlunitario").val('');
                            $("#codigo").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;


            }

        });


        $(document).on('click', 'a', function (event) {
            var idProduto_proposta = $(this).attr('idAcao');

            if ((idProduto_proposta % 1) == 0) {
                $("#divProdutos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirProduto",
                    data: "idProduto_proposta=" + idProduto_proposta,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divProdutos").load("<?php echo current_url(); ?> #divProdutos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });

        $("#formServicos").validate({
            rules: {
                servico: {required: true},
                quantidadeserv: {required: true},
                vlunitarioserv: {required: true}
            },
            messages: {
                servico: {required: 'Insira o nome do serviço'},
                quantidadeserv: {required: 'Digite a quantidade'},
                vlunitarioserv: {required: 'Digite o valor unitário'}
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divServicos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarServico",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");
                            $("#servico").val('');
                            $("#quantidadeserv").val('');
                            $("#vlunitarioserv").val('');
                            $("#servico").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;
            }
        });

        $(document).on('click', 'span', function (event) {
            var idServico_proposta = $(this).attr('idAcao');

            if ((idServico_proposta % 1) == 0) {
                $("#divServicos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirServico",
                    data: "idServico_proposta=" + idServico_proposta,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divServicos").load("<?php echo current_url(); ?> #divServicos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });

        $("#formModulos").validate({
            rules: {
                modulo: {required: true},
                quantidademod: {required: true}
            },
            messages: {
                modulo: {required: 'Selecione o módulo'},
                quantidademod: {required: 'Digite a quantidade'}
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divModulos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarModulo",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divModulos").load("<?php echo current_url(); ?> #divModulos");
                            $("#modulo").val('');
                            $("#quantidademod").val('');
                            $("#modulo").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;
            }
        });

        $(document).on('click', 'button', function (event) {
            var idModulo_proposta = $(this).attr('idAcao');

            if ((idModulo_proposta % 1) == 0) {
                $("#divModulos").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/excluirModulo",
                    data: "idModulo_proposta=" + idModulo_proposta,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divModulos").load("<?php echo current_url(); ?> #divModulos");

                        } else {
                            alert('Ocorreu um erro ao tentar excluir produto.');
                        }
                    }
                });
                return false;
            }

        });


        $("#formMensalidade").validate({
            rules: {
                totalmensalidade: {required: true},
            },
            messages: {
                totalmensalidade: {required: 'Selecione o módulo'},
            },
            submitHandler: function (form) {
                var dados = $(form).serialize();
                $("#divMensalidade").html("<div class='progress'><div class='progress-bar progress-bar-primary progress-bar-striped' style='width: 100%'></div></div>");
                $.ajax({
                    type: "POST",
                    url: "<?php echo base_url(); ?>index.php/os/adicionarMensalidade",
                    data: dados,
                    dataType: 'json',
                    success: function (data)
                    {
                        if (data.result == true) {
                            $("#divMensalidade").load("<?php echo current_url(); ?> #divMensalidade");
                            $("#totalmensalidade").val('');
                            $("#totalmensalidade").val('').focus();
                        } else {
                            alert('Ocorreu um erro ao tentar adicionar produto.');
                        }
                    }
                });

                return false;
            }
        });


        $(".datepicker").datepicker({dateFormat: 'dd/mm/yy'});




    });

</script>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";

    $(document).ready(function () {

        $("#produto").autocomplete({
            source: function (request, response) {
                $.ajax({
                    url: BASE_URL + "index.php/teste/search",
                    data: {
                        term: request.term

                    },
                    dataType: "json",
                    success: function (data) {
                        var resp = $.map(data.value, function (obj) {
                            return obj.nome + " - " + "R$" + obj.precovenda;

                        });

                        response(resp);

                    }
                });
            },
            minLength: 3,
            delay: 1000

        });
    });

</script> 