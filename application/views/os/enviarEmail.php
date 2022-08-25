<?php $this->load->view('template/menu'); ?>
<a title="editar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $os->idOS; ?>" class="btn btn-primary">Voltar </a>
<?php // echo json_encode($os);  ?>
<div class="col-md-12" style="background-color: white">
    <p>Prezado cliente,</p>
    <p>Segue abaixo o orçamento do conserto do seu <?php echo "<b>" . $os->descricao . " " . $os->marca . " " . $os->modelo . " </b>" ?> da sua <b>OS <?php echo $os->idOS . "</b>" ?> . </p><br>


    <table class="table table-hover" style="border: 1px solid black">
        <thead style="border: 1px solid black; background-color: #00e765">
            <tr>
                <th style="border: 1px solid black;">DESCRIÇÃO</th>
                <th style="text-align: center; border: 1px solid black">QUANTIDADE</th>
                <th style="text-align: center; border: 1px solid black">SUB-TOTAL</th>
            </tr>
        </thead>
        <tbody style="border: 1px solid black">
            <?php
            $totalServicos = 0;
            foreach ($servicos as $s) {

                $totalServicos = $totalServicos + $s->total;
                echo '<tr style="border: 1px solid black">';
                echo '<td style="border: 1px solid black">' . $s->descricao . '</td>';
                echo '<td style="text-align: center; border: 1px solid black">' . $s->quantidade . '</td>';
                echo '<td style="text-align: center; border: 1px solid black">R$ ' . number_format($s->total, 2, ',', '.') . '</td>';
                echo '</tr>';
            }
            ?>
            <?php
            $totalPecas = 0;
            foreach ($pecas as $p) {

                $totalPecas = $totalPecas + $p->total;
                echo '<tr style="border: 1px solid black">';
                echo '<td style="border: 1px solid black">' . $p->descricao . '</td>';
                echo '<td style="text-align: center; border: 1px solid black">' . $p->quantidade . '</td>';
                echo '<td style="text-align: center; border: 1px solid black">R$ ' . number_format($p->total, 2, ',', '.') . '</td>';
                echo '</tr>';
            }
            $totalGeral = $totalPecas + $totalServicos;
            ?>
            <tr>
                <td></td>
                <td style="text-align: center; border: 1px solid black "><strong>TOTAL</strong></td>
                <td style="text-align: center; border: 1px solid black"><strong>R$ <?php echo number_format($totalGeral, 2, ',', '.'); ?></strong></td>
            </tr>

        </tbody>
    </table>
    <br>
    <p>Pedimos a aprovação do orçamento acima, para prosseguir com o conserto.</p> 

    <p><b>Validade do orçamento:</b> 3 dias<br>
        <b>Prazo para conserto após aprovação:</b> 3 dias úteis<br>
        <b>Pagamento:</b> dinheiro 5% de desconto ou em até 2x no cartão de crédito.</p> 

    <p><b>Garantia do Serviço:</b> 3 meses<br>
        <b>Garantia da Bateria:</b> 12 meses</p>

    <p>Qualquer dúvida estamos à disposição para ajudá-lo.</p>

    <p>Att.</p> 
</div>
<?php $this->load->view('template/footer'); ?>