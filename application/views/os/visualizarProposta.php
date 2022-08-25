<!doctype html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Imprimir Proposta</title>

        <style type="text/css">
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
        <!--DESCOMENTAR PARA USAR PLANO DE FUNDO -->
<!--        <div id="container-imagem"></div>
        <img class="page-break" src="<?php// echo base_url() ?>/assets/imagens/teste.png">-->


        <table width="100%">
            <tr>
                <td align="top"><img src="<?php echo base_url() ?>/assets/imagens/logoEmpresa.png"  width="200"/></td>
                <td align="right" >

                    <strong>Nº da proposta:</strong> <?php echo $proposta->idPropostas; ?><br />
                    <strong>Data da proposta:</strong> <?php
                    $date1 = new DateTime($proposta->dataAlteracao);
                    echo $date1->format('d-m-Y');
                    ?><br />
                    <strong>Prazo de validade:</strong> <?php echo $proposta->validade . " dias" ?>

                </td>
            </tr>
        </table>
        <table width="100%">
            <tr>
                <td><strong><?php echo "WBAGESTAO TECNOLOGIA E SOFTWARE LTDA"; ?></strong></td>
                <td><strong><?php echo $proposta->nomeEmpresa; ?></strong></td>
            </tr>
            <tr>
                <td><?php echo "Rua Marquês de São Vicente, 134 - Campo Grande, Santos - SP" ?></td>
                <td><?php echo $proposta->enderecoEmpresa; ?></td>
            </tr>
            <tr>
                <td><?php echo "Rua Cel. João Leme, 460 Ed. New York, Sala 07, Bragança Paulista - SP" ?></td>
                <td><?php echo $proposta->bairroEmpresa . ", " . $proposta->cidadeEmpresa; ?></td>
            </tr>
            <tr>
                <td><?php echo $dadoslogin['email'] ?></td>
                <td><?php echo $proposta->emailContato; ?></td>
            </tr>
            <tr>
                <td><?php echo "(11)2579-5279 | (13)3257-8080 | " . $dadoslogin['telefone'] ?></td>
                <td><?php echo $proposta->telefone . " | " . $proposta->whatsappContato ?></td>
            </tr>
        </table>

        <br/>
        <!--SE NÃO TIVER PRODUTOS ELE OCULTA ESSA TABELA -->
        <?php if ($produtos) { ?>
            <table width="100%">
                <thead style="background-color: lightgray;">
                    <tr>
                        <th colspan="4">PRODUTOS</th>
                    </tr>
                    <tr>
                        <th>Descrição</th>
                        <th>Qtde</th>
                        <th>Unit.(R$)</th>
                        <th>Total(R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $subTotalProdutos = 0;
                    $descontoProdutos = 0;
                    foreach ($produtos as $p) {

                        echo '<tr>';
                        echo '<td>' . $p->produto . '</td>';
                        echo '<td align="right">' . $p->quantidade . '</td>';
                        echo '<td align="right">' . number_format($p->vlunitario, 2, ',', '.') . '</td>';
                        echo '<td align="right">' . number_format($p->vltotal, 2, ',', '.') . '</td>';
                        echo '</tr>';
                        $subTotalProdutos = $subTotalProdutos + $p->vltotal;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right">Subtotal R$</td>
                        <td align="right"><?php echo number_format($subTotalProdutos, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right">Desconto R$</td>
                        <td align="right"><?php echo number_format($descontoProdutos, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" style="background-color: lightgreen">Total Produtos R$</td>
                        <td align="right" style="background-color: lightgreen"> <?php
                            $totalProdutos = $subTotalProdutos - $descontoProdutos;
                            echo number_format($totalProdutos, 2, ',', '.');
                            ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
        <!--SE NÃO TIVER SERVIÇOS ELE OCULTA ESSA TABELA -->
        <?php if ($servicos) { ?>
            <table width="100%">
                <thead style="background-color: lightgray;">
                    <tr>
                        <th colspan="4">SERVIÇOS</th>
                    </tr>
                    <tr>
                        <th>Descrição</th>
                        <th>Qtde</th>
                        <th>Unit.(R$)</th>
                        <th>Total(R$)</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $subTotalServicos = 0;
                    $descontoServicos = 0;
                    foreach ($servicos as $s) {

                        echo '<tr>';
                        echo '<td>' . $s->servico . '</td>';
                        echo '<td align="right">' . $s->quantidade . '</td>';
                        echo '<td align="right">' . number_format($s->vlunitario, 2, ',', '.') . '</td>';
                        echo '<td align="right">' . number_format($s->vltotal, 2, ',', '.') . '</td>';
                        echo '</tr>';
                        $subTotalServicos = $subTotalServicos + $s->vltotal;
                    }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right">Subtotal R$</td>
                        <td align="right"><?php echo number_format($subTotalServicos, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right">Desconto R$</td>
                        <td align="right"><?php echo number_format($descontoServicos, 2, ',', '.'); ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" style="background-color: lightgreen">Total Serviços R$</td>
                        <td align="right" style="background-color: lightgreen"><?php
                            $totalServicos = $subTotalServicos - $descontoServicos;
                            echo number_format($totalServicos, 2, ',', '.');
                            ?></td>
                    </tr>
                    <tr>
                        <td colspan="2"></td>
                        <td align="right" style="background-color: lightgreen">Total Geral R$</td>
                        <td align="right" style="background-color: lightgreen"> 
                            <?php
                            if ($produtos and $servicos) {
                                echo number_format($totalProdutos + $totalServicos, 2, ',', '.');
                            } elseif ($produtos) {
                                echo number_format($totalProdutos, 2, ',', '.');
                            } elseif ($servicos) {
                                echo number_format($totalServicos, 2, ',', '.');
                            }
                            ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
        <br/>
        <?php if ($modulos) { ?>
            <table  width="100%">
                <thead style="background-color: lightgray;">
                    <tr>
                        <th>Módulo</th>
                        <th>Qtde</th>
                        <th>Descrição</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($modulos as $m) {

                        echo '<tr>';
                        echo '<td>' . $m->modulo . '</td>';
                        echo '<td align="center">' . $m->quantidade . '</td>';
                        echo '<td align="justify">' . $m->descricao . '</td>';
                        echo '</tr>';
                    }
                    ?>
                </tbody>

                <tfoot>
                    <tr>
                        <td align="right" style="background-color: lightgreen">Mensalidade R$</td>
                        <td align="right" style="background-color: lightgreen"><?php echo number_format($proposta->mensalidade, 2, ',', '.'); ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php } ?>
        <br />
        <table  width="100%">
            <tbody>
                <tr>
                    <td><strong>Forma de pagamento:</strong> <?php echo $proposta->prazoPagamento; ?></td>
                </tr>
            </tbody>
        </table>

        <p align="justify"><strong>Observações:</strong>  <p style="text-justify: none" ><?php echo nl2br($proposta->observacao); ?>   </p>

        <table  width="100%">
            <tbody>
                <tr align="center">
                    <td>
                        <strong>
                            ________________________________________
                            <br>
                            Cliente
                        </strong>
                    </td>
                    <td>
                        <strong>
                            _______________________________________
                            <br>
                            <?php
                            echo $dadoslogin['nome'];
                            echo " - ";
                            echo $dadoslogin['telefone'];
                            ?> 
                        </strong>
                    </td>
                </tr>
            </tbody>
        </table>

    </body>
</html>