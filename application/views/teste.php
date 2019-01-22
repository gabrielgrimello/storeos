<?php $this->load->view('template/menu'); ?>

<div class="box box-success">
    <div class="box-header with-border">
        <h3 class="box-title">Insira os produtos na sua proposta</h3>
    </div>
    <div class="box-body">

        <form id="formProdutos" action="<?php echo base_url() ?>proposta/adicionarProduto" method="post">
            <div class="col-md-2">
                <label for="">Codigo</label>
                <input type="text" class="form-control" maxlength="48" name="codigo" id="codigo"  onblur="query()" placeholder="Ex.: 125">
            </div>
            <div class="col-md-5">
                <label for="">Produto</label>
                <input type="text" name="produto" id="produto" class="form-control" placeholder="Digite o produto">
            </div>
            <div class="col-md-2">
                <label for="">Quantidade</label>
                <input type="number" placeholder="Quantidade" id="quantidade" name="quantidade" class="form-control" />
            </div>
            <div class="col-md-2">
                <label>Unitario</label>
                <input type="number" min="0" step=0.01 class="form-control" name="vlunitario" id="vlunitario" placeholder="Ex.: 1300,00">
            </div>
            <div class="col-md-1">
                <label for="">.</label>
                <button class="btn btn-success span12" id="btnAdicionarProduto"><i class="icon-white icon-plus"></i> Adicionar</button>
            </div>
        </form>
    </div>

</div>


<script type="text/javascript">
    function query() {

        var x = document.getElementById("codigo");
        var produto = document.getElementById("produto");
        var vlunitario = document.getElementById("vlunitario");

        // var login = 0;
        ;
        //alert(x.value);

        $(document).ready(function () {
            //$.ajax({
            //  url: "http://intranet1.wbagestao.com.br:7070/Login.Get?usuario=798&senha=wba123"
            //url: "http://rest-service.guides.spring.io/greeting"
            //  }).then(function (data1) {
            //  login.value = data1.idLogin;
            //   alert(login.value);
            // });

            // login.value = "8BB05F79-CF80-4983-B946-0936BA3C354B";
            // alert(login.value);
            $.ajax({
                url: "http://intranet1.wbagestao.com.br:7070/Pessoas.get?login=C82A5185-89FD-498B-9B8C-005E76A282C6&codigo=" + x.value
                        //url: "http://rest-service.guides.spring.io/greeting"

            }).then(function (data) {
                x.value = data.codigo;
                produto.value = data.result;
                vlunitario.value = data.cnpj;
                
                alert(produto.value);

            });
        });

    }
</script>
<?php
$this->load->view('template/footer');
?>