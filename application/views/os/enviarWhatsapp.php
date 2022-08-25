
<?php // echo json_encode($os);     ?>
<a title="editar" href="<?php echo base_url() ?>index.php/os/editarOS/<?php echo $os->idOS; ?>">Voltar </a>

<p>Prezado cliente,</p>
<p>Segue abaixo o orçamento do conserto do seu *<?php echo $os->descricao . " " . $os->marca . " " . $os->modelo . " " ?> da sua OS <?php echo $os->idOS ?>* . </p><br>


<table class="table table-hover">
    <thead>
        <tr>
            <th>*DESCRIÇÃO*</th>
            <th>*QUANTIDADE*</th>
            <th>*SUB-TOTAL*</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $totalServicos = 0;
        foreach ($servicos as $s) {

            $totalServicos = $totalServicos + $s->total;
            echo '<tr>';
            echo '<td>' . $s->descricao . '</td>';
            echo '<td style="text-align: center;">' . $s->quantidade . '</td>';
            echo '<td style="text-align: center;">R$ ' . number_format($s->total, 2, ',', '.') . '</td>';
            echo '</tr>';
        }
        ?>
        <?php
        $totalPecas = 0;
        foreach ($pecas as $p) {

            $totalPecas = $totalPecas + $p->total;
            echo '<tr>';
            echo '<td>' . $p->descricao . '</td>';
            echo '<td style="text-align: center;">' . $p->quantidade . '</td>';
            echo '<td style="text-align: center;">R$ ' . number_format($p->total, 2, ',', '.') . '</td>';
            echo '</tr>';
        }
        $totalGeral = $totalPecas + $totalServicos;
        ?>
        <tr>
            <td></td>
            <td style="text-align: center"><strong>*TOTAL*</strong></td>
            <td style="text-align: center"><strong>*R$ <?php echo number_format($totalGeral, 2, ',', '.'); ?>*</strong></td>
        </tr>

    </tbody>
</table>
<br>
<p>Pedimos a aprovação do orçamento acima, para prosseguir com o conserto.</p> 

<p>*Validade do orçamento:* 3 dias<br>
    *Prazo para conserto após aprovação:* 3 dias úteis<br>
    *Pagamento:* dinheiro 5% de desconto ou em até 2x no cartão de crédito.</p> 

<p>*Garantia do Serviço:* 3 meses<br>
    *Garantia da Bateria:* 12 meses</p>

<p>Qualquer dúvida estamos à disposição para ajudá-lo.</p>

<p>Att.</p> 

