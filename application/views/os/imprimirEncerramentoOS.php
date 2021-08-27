<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Imprimir</title>

        <style type="text/css">
            /*CSS para impressão*/
            @media print
            {    
                .no-print, .no-print *
                {
                    display: none !important;
                }
            }
            * {
                font-family: Verdana, Arial, sans-serif;
            }
            table{
                font-size: x-small;
            }
            p{
                text-align: justify;
                text-justify: inter-word;
                font-size: x-small;
            }
            tfoot tr td{
                font-weight: bold;
                font-size: x-small;
            }
            .gray {
                background-color: lightgray
            }
            @page {
                margin: 0.6cm  ;
            }
            .page_break { 
                page-break-before: always; 
            }
            #container-imagem {
                position: relative;
                height: 100vh;
                width: 100vw;
                /* adicionando imagem de fundo */
                background: url('<?php echo base_url() ?>/assets/imagens/teste.png');
                background-size: cover;
            }
        </style>
        <!--DESCOMENTAR PARA USAR PLANO DE FUNDO -->
<!--        <style>
            @page { margin: .5in; }
            .bg { top: -.5in; right: -.5in; bottom: -.5in; left: -.5in; position: absolute; z-index: -1000; min-width: 8.5in; min-height: 11in; }
        </style>-->
    </head>
    <body>
        <!--        DESCOMENTAR PARA USAR PLANO DE FUNDO 
                        <div id="container-imagem"></div>
                        <img class="page-break" src="<?php // echo base_url()                                                           ?>/assets/imagens/teste.png">-->

        <a class="no-print" style="font-size: 20px;" name="imprimir" href='javascript:window.print()' >IMPRIMIR</a>

        <table width="100%">
            <tr>
                <td align="top"><img src="<?php echo base_url() ?>assets/imagens/logo.png" title="Logo" width="200" /></td>
                <td align="right" >

                    <strong style="font-size: 13px;background-color: lightgreen" >ORDEM DE SERVIÇO: <?php echo strtoupper($os->idOS); ?></strong><br />
                    <strong>Data de entrada: </strong> <?php
                    $date1 = new DateTime($os->dataEntrada);
                    echo $date1->format('d/m/Y');
                    ?><br />
                    <strong>Reparo em garantia:</strong> <?php
                    if ($os->garantia == 1) {
                        echo "SIM";
                    } else {
                        echo "NÃO";
                    }
                    ?>

                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td><strong><?php echo "WBA SANTOS TECNOLOGIA E SOFTWARE LTDA"; ?></strong></td>
                <td><strong><?php echo $os->nomeCliente . " / " . $os->fantasiaCliente; ?></strong></td>
            </tr>
            <tr>
                <td><?php echo "Rua Marquês de São Vicente, 134 - Campo Grande, Santos - SP" ?></td>
                <td><?php echo $os->enderecoCliente; ?></td>
            </tr>
            <tr>
                <td><?php echo "Rua Cel. João Leme, 460 Ed. New York, Sala 07, Bragança Paulista - SP" ?></td>
                <td><?php echo $os->cidadeCliente; ?></td>
            </tr>
            <tr>
                <td><?php echo "assistencia@wbagestao.com" ?></td>
                <td><?php echo $os->emailCliente; ?></td>
            </tr>
            <tr>
                <td><?php echo "(11)2579-5279 | (13)3257-8080 | (13) 99774-8943" ?></td>
                <td><?php echo $os->telefoneCliente . " | " . $os->celularCliente ?></td>
            </tr>
        </table>
        <br />
        <!--DADOS DO EQUIPAMENTO -->
        <table width="100%">
            <tr>
                <td>                    <?php echo "<strong> Equipamento: </strong>" ?> 
                    <?php
                    foreach ($tipo as $value2) {
                        if ($value2->idTipo == $equipamento->tipo) {
                            echo ( $value2->descricao . " / " .
                            $equipamento->marca . " / " .
                            $equipamento->modelo);
                        }
                    };
                    ?>
                </td>
                <td><?php echo "<strong>Nº de série: </strong>" . $equipamento->serie; ?></td>
            </tr>
            <tr>
                <td><?php echo "<strong>Acessórios: </strong>" . $os->acessorios; ?></td>
                <td><?php echo "<strong>Observações: </strong>" . $os->observacoes; ?></td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td rowspan="0"><?php echo "<strong>Defeito reclamado: </strong>" . $os->defeito; ?></td>
            </tr>
        </table>

        <br />
        <table width="100%">
            <thead style="background-color: lightgray;">
                <tr>
                    <th colspan="5" style="font-size: 15px">LAUDO TÉCNICO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo nl2br($os->laudo); ?></td>
                </tr>
            </tbody>
        </table>

        <br/>
        <!--SE NÃO TIVER PRODUTOS ELE OCULTA ESSA TABELA -->
        <?php if ($pecas) { ?>
            <table width="100%">

                <thead style="background-color: lightgray;">
                    <tr>
                        <th colspan="5" style="font-size: 15px">PEÇAS</th>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Unitário</th>
                        <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $totalPecas = 0;
                    foreach ($pecas as $p) {

                        $totalPecas = $totalPecas + $p->total;
                        echo '<tr>';
                        echo '<td>' . $p->codigoProduto . '</td>';
                        echo '<td>' . $p->descricao . '</td>';
                        echo '<td>' . $p->quantidade . '</td>';
                        echo '<td align="right">R$ ' . number_format($p->unitario, 2, ',', '.') . '</td>';
                        echo '<td align="right">R$ ' . number_format($p->total, 2, ',', '.') . '</td>';
                        echo '</tr>';
                    }
                    ?>

                    <tr>
                        <td colspan="3"></td>
                        <td align="right" style="background-color: lightgreen"  style="text-align: right"><strong>Total peças</strong></td>
                        <td align="right" style="background-color: lightgreen"><strong>R$ <?php echo number_format($totalPecas, 2, ',', '.'); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
        <br />
        <!--SE NÃO TIVER SERVIÇOS ELE OCULTA ESSA TABELA -->
        <?php if ($servicos) { ?>
            <table width="100%">
                <thead style="background-color: lightgray;">
                    <tr>
                        <th colspan="5" style="font-size: 15px">SERVIÇOS</th>
                    </tr>
                    <tr >
                        <th>Código</th>
                        <th>Serviço</th>
                        <th>Quantidade</th>
                        <th>Unitário</th>
                        <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalServicos = 0;
                    foreach ($servicos as $s) {

                        $totalServicos = $totalServicos + $s->total;
                        echo '<tr>';
                        echo '<td>' . $s->codigoServico . '</td>';
                        echo '<td>' . $s->descricao . '</td>';
                        echo '<td>' . $s->quantidade . '</td>';
                        echo '<td align="right">R$ ' . number_format($s->unitario, 2, ',', '.') . '</td>';
                        echo '<td align="right">R$ ' . number_format($s->total, 2, ',', '.') . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="3"></td>
                        <td  align="right" style="background-color: lightgreen"  style="text-align: right"><strong>Total serviços</strong></td>
                        <td  align="right" style="background-color: lightgreen"><strong>R$ <?php echo number_format($totalServicos, 2, ',', '.'); ?></strong></td>
                    </tr>
                    <tr style="font-size: 12px">
                        <td colspan="3"></td>
                        <td align="right" style="background-color: lightgreen"><strong>Total Geral</strong></td>
                        <td align="right" style="background-color: lightgreen">
                            <strong> R$ 
                                <?php
                                if ($pecas and $servicos) {
                                    echo number_format($totalPecas + $totalServicos, 2, ',', '.');
                                } elseif ($pecas) {
                                    echo number_format($totalPecas, 2, ',', '.');
                                } elseif ($servicos) {
                                    echo number_format($totalServicos, 2, ',', '.');
                                }
                                ?>
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
        <table  width="100%">
            <tbody >
                <tr align="center">
                    <?php if ($os->status == 3) { ?>
                        <td>
                            <?php if ($os->garantia == 0) { ?>
                                <strong style="background-color: lightgreen">Garantia do serviço é de 90 dias, até: <?php
                                    echo date('d/m/Y', strtotime($os->dataEncerra . ' + 90 days'));
                                    ?> 
                                </strong>
                            <?php } ?>
                            <br><br> 
                            <strong>Recebi o equipamento descrito nesta O.S. reparado  conforme minha autorização <br> e devidamente testado, nas mesmas condições em que foi entregue.</strong>
                        </td>
                    <?php } elseif ($os->status == 4) { ?>
                        <td><strong>Recebi o equipamento descrito nesta O.S. conforme minha autorização nas mesmas condições em que foi entregue. <br> (&nbsp&nbsp&nbsp&nbsp)Sem reparo   (&nbsp&nbsp&nbsp&nbsp) Sem conserto </strong></td>    
                    <?php } ?>

                </tr>
                <tr align="center">
                    <td>
                        <strong>
                            <br>
                            ________________________________________
                            <br>
                        </strong>
                    </td>

                </tr>
                <tr align="center">
                    <td><strong><?php echo $os->nomeCliente . " / " . $os->fantasiaCliente; ?></strong></td>
                </tr>
            </tbody>
        </table>

        ----------------------------------------------------------------------------------------------------
        <br>
        <table width="100%">
            <tr>
                <td>
                    <strong style="font-size: 13px;background-color: lightgreen" >ORDEM DE SERVIÇO: <?php echo strtoupper($os->idOS); ?></strong><br />
                </td>
                <td style="font-size: 13px;">
                    <strong>Data de entrada: </strong> <?php
                    $date1 = new DateTime($os->dataEntrada);
                    echo $date1->format('d/m/Y');
                    ?><br />
                </td>
                <td style="font-size: 13px">
                    <strong>Reparo em garantia:</strong> <?php
                    if ($os->garantia == 1) {
                        echo "<strong style='background-color: lightgreen'>SIM</strong>";
                    } else {
                        echo "<strong style='background-color: lightgreen'>NÃO</strong>";
                    }
                    ?>
                </td>
            </tr>
        </table>
        <br />
        <table width="100%">
            <tr>
                <td><strong><?php echo $os->codigoCliente . " - " . $os->nomeCliente . " / " . $os->fantasiaCliente; ?></strong></td>
                <td><?php echo $os->enderecoCliente; ?></td>
                <td><?php echo $os->cidadeCliente; ?></td>
            </tr>
            <tr>
                <td><?php echo $os->emailCliente; ?></td>
                <td><?php echo $os->telefoneCliente . " | " . $os->celularCliente ?></td>
            </tr>
        </table>
        <br />
        <!--DADOS DO EQUIPAMENTO -->
        <table width="100%">
            <tr>
                <td>                    <?php echo "<strong> Equipamento: </strong>" ?> 
                    <?php
                    foreach ($tipo as $value2) {
                        if ($value2->idTipo == $equipamento->tipo) {
                            echo ( $value2->descricao . " / " .
                            $equipamento->marca . " / " .
                            $equipamento->modelo);
                        }
                    };
                    ?>
                </td>
                <td><?php echo "<strong>Nº de série: </strong>" . $equipamento->serie; ?></td>
            </tr>
            <tr>
                <td><?php echo "<strong>Acessórios: </strong>" . $os->acessorios; ?></td>
                <td><?php echo "<strong>Observações: </strong>" . $os->observacoes; ?></td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td rowspan="0"><?php echo "<strong>Defeito reclamado: </strong>" . $os->defeito; ?></td>
            </tr>
        </table>

        <br />
        <table width="100%">
            <thead style="background-color: lightgray;">
                <tr>
                    <th colspan="5" style="font-size: 15px">LAUDO TÉCNICO</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><?php echo nl2br($os->laudo); ?></td>
                </tr>
            </tbody>
        </table>

        <br/>
        <!--SE NÃO TIVER PRODUTOS ELE OCULTA ESSA TABELA -->
        <?php if ($pecas) { ?>
            <table width="100%">

                <thead style="background-color: lightgray;">
                    <tr>
                        <th colspan="5" style="font-size: 15px">PEÇAS</th>
                    </tr>
                    <tr>
                        <th>Código</th>
                        <th>Produto</th>
                        <th>Quantidade</th>
                        <th>Unitário</th>
                        <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>

                    <?php
                    $totalPecas = 0;
                    foreach ($pecas as $p) {

                        $totalPecas = $totalPecas + $p->total;
                        echo '<tr>';
                        echo '<td>' . $p->codigoProduto . '</td>';
                        echo '<td>' . $p->descricao . '</td>';
                        echo '<td>' . $p->quantidade . '</td>';
                        echo '<td align="right">R$ ' . number_format($p->unitario, 2, ',', '.') . '</td>';
                        echo '<td align="right">R$ ' . number_format($p->total, 2, ',', '.') . '</td>';
                        echo '</tr>';
                    }
                    ?>

                    <tr>
                        <td colspan="3"></td>
                        <td align="right" style="background-color: lightgreen"  style="text-align: right"><strong>Total peças</strong></td>
                        <td align="right" style="background-color: lightgreen"><strong>R$ <?php echo number_format($totalPecas, 2, ',', '.'); ?></strong></td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>
        <br />
        <!--SE NÃO TIVER SERVIÇOS ELE OCULTA ESSA TABELA -->
        <?php if ($servicos) { ?>
            <table width="100%">
                <thead style="background-color: lightgray;">
                    <tr>
                        <th colspan="5" style="font-size: 15px">SERVIÇOS</th>
                    </tr>
                    <tr >
                        <th>Código</th>
                        <th>Serviço</th>
                        <th>Quantidade</th>
                        <th>Unitário</th>
                        <th>Sub-total</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalServicos = 0;
                    foreach ($servicos as $s) {

                        $totalServicos = $totalServicos + $s->total;
                        echo '<tr>';
                        echo '<td>' . $s->codigoServico . '</td>';
                        echo '<td>' . $s->descricao . '</td>';
                        echo '<td>' . $s->quantidade . '</td>';
                        echo '<td align="right">R$ ' . number_format($s->unitario, 2, ',', '.') . '</td>';
                        echo '<td align="right">R$ ' . number_format($s->total, 2, ',', '.') . '</td>';
                        echo '</tr>';
                    }
                    ?>
                    <tr>
                        <td colspan="3"></td>
                        <td  align="right" style="background-color: lightgreen"  style="text-align: right"><strong>Total serviços</strong></td>
                        <td  align="right" style="background-color: lightgreen"><strong>R$ <?php echo number_format($totalServicos, 2, ',', '.'); ?></strong></td>
                    </tr>
                    <tr style="font-size: 12px">
                        <td colspan="3"></td>
                        <td align="right" style="background-color: lightgreen"><strong>Total Geral</strong></td>
                        <td align="right" style="background-color: lightgreen">
                            <strong> R$ 
                                <?php
                                if ($pecas and $servicos) {
                                    echo number_format($totalPecas + $totalServicos, 2, ',', '.');
                                } elseif ($pecas) {
                                    echo number_format($totalPecas, 2, ',', '.');
                                } elseif ($servicos) {
                                    echo number_format($totalServicos, 2, ',', '.');
                                }
                                ?>
                            </strong>
                        </td>
                    </tr>
                </tbody>
            </table>
        <?php } ?>

        <br />
        <table  width="100%" height="100px">
            <tbody >
                <tr align="left">
                    <?php if ($os->status == 3) { ?>
                        <td rowspan="0" width="70%">
                            <?php if ($os->garantia == 0) { ?>
                                <strong style="background-color: lightgreen">Garantia do serviço é de 90 dias, até: <?php
                                    echo date('d/m/Y', strtotime($os->dataEncerra . ' + 90 days'));
                                    ?> 
                                </strong>
                            <?php } ?>
                            <br><br> 
                            <strong>Recebi o equipamento descrito nesta O.S. reparado  conforme minha autorização e devidamente testado, nas mesmas condições em que foi entregue.</strong>
                        </td>
                        <td  width="30%"> <strong>Nome: ____________________</strong></td>
                    <?php } elseif ($os->status == 4) { ?>
                        <td rowspan="0" width="70%"><strong>Recebi o equipamento descrito nesta O.S. conforme minha autorização nas mesmas condições em que foi entregue. (&nbsp&nbsp&nbsp&nbsp)Sem reparo   (&nbsp&nbsp&nbsp&nbsp) Sem conserto </strong></td>    
                        <td  width="30%"> <strong>Nome: ____________________</strong></td>
                    <?php } ?>
                </tr>
                <tr align="left">
                    <td width="30%"> <strong>RG: _______________________</strong></td>
                </tr>
                <tr align="left" width="30%">
                    <td><strong>Data:___ / ___ / ______</strong></td>
                </tr>
            </tbody>
        </table>

    </body>
</html>