<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h1>
        Propostas
        <small>Gerenciar propostas</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active"> Gerenciar propostas</li>
    </ol>
</section>
<section class="content-header">
    <div class="col-xs-12">
        <div class="col-xs-9">
            <h1>GERADOR DE PROPOSTAS WBA TESTE </h1>
        </div>
        <div class="col-xs-3 text-right">
            <a title="editar" href="<?php echo base_url() ?>index.php/proposta/edit/<?php echo $result->numpropostas; ?>" class="btn btn-primary btn-lg">Editar <i class="fa-fw glyphicon glyphicon-edit"></i> </a>
            <a class="btn btn-warning btn-lg" name="imprimir" href='javascript:window.print()' >IMPRIMIR</a>
        </div>
    </div>
</section>

<!-- Main content -->
<section class="content">

    <figure >
        <img src="<?php echo base_url() ?>assets/imagens/cabecalho.png" title="Logo" width="100%" height="100%" />
    </figure>

    <div class="col-xs-12 text-center">
        <br><br><br><br><br><br><br>
        <h1><strong> <?php echo strtoupper($result->fantasia); ?></strong></h1>
    </div>

    <div class="col-xs-12 text-center">
        <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
        <h3>www.wbagestao.com.br</h3>
    </div>

    <figure >
        <img src="<?php echo base_url() ?>assets/imagens/startup.png" title="Logo" width="100%" height="100%" />
    </figure>

    <style>
        table {
            font-family: arial, sans-serif;
            border-collapse: collapse;
            width: 100%;
        }

        th{
            background-color: #32CD32;
        }

        td, th {
            border: 1px solid #000000;
            text-align: left;
            padding: 8px;
        }
    </style>
    <?php if ($count_prod > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Produtos</th>
                    <th>Quantidade</th>
                    <th>Valor unitário</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <?php
            $totalequip = 0;
            foreach ($produtos as $p) {
                ?>
                <tr>

                    <td>
                        <?php echo strtoupper($p->produto); ?>
                    </td>
                    <td>
                        <?php echo strtoupper($p->quantidade); ?>
                    </td>
                    <td>
                        <?php echo number_format($p->vlunitario, 2, ',', '.'); ?>
                    </td>
                    <td>
                        <?php
                        $totalequip = $totalequip + $p->vltotal;
                        echo number_format($p->vltotal, 2, ',', '.');
                        ?>
                    </td>

                </tr>

            <?php }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>Total geral</td>
                <td><?php echo number_format($totalequip, 2, ',', '.'); ?></td>
            </tr>
        </table>
    <?php } ?>
    <br>
    <br>
    <br>


    <?php if ($count_serv > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Serviços</th>
                    <th>Quantidade</th>
                    <th>Valor unitário</th>
                    <th>Valor Total</th>
                </tr>
            </thead>
            <?php
            $totalserv = 0;
            foreach ($servicos as $s) {
                ?>
                <tr>

                    <td>
                        <?php echo strtoupper($s->servico); ?>
                    </td>
                    <td>
                        <?php echo strtoupper($s->quantidade); ?>
                    </td>
                    <td>
                        <?php echo number_format($s->vlunitario, 2, ',', '.'); ?>
                    </td>
                    <td>
                        <?php
                        $totalserv = $totalserv + $s->vltotal;
                        echo number_format($s->vltotal, 2, ',', '.');
                        ?>
                    </td>

                </tr>

            <?php }
            ?>
            <tr>
                <td></td>
                <td></td>
                <td>Total geral</td>
                <td><?php echo number_format($totalserv, 2, ',', '.'); ?></td>
            </tr>
        </table>
    <?php } ?>
    <br>
    <br>
    <br>

    <?php if ($count_mod > 0) { ?>
        <table>
            <thead>
                <tr>
                    <th>Módulos</th>
                    <th>Quantidade</th>

                </tr>
            </thead>
            <?php
            $total´mod = 0;
            foreach ($modulos as $m) {
                ?>
                <tr>
                    <td>
                        <?php echo strtoupper($m->modulo); ?>
                    </td>
                    <td>
                        <?php echo strtoupper($m->quantidade); ?>
                    </td>

                </tr>
            <?php }
            ?>
            <tr>
                <td>Mensalidade</td>
                <td><?php echo number_format($result->totalmensalidade, 2, ',', '.'); ?></td>
            </tr>
        </table>
    <?php } ?>



    <!-- /.row -->

</section>
<!-- /.content -->
<?php $this->load->view('template/footer'); ?>