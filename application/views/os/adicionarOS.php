<?php $this->load->view('template/menu'); ?>
<section class="content-header">
    <h4>
        Ordem de serviço
        <small>Adicionar OS</small>
    </h4>
    <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li> Gerenciar OS</li>
        <li class="active"> Adicionar OS</li>
    </ol>
</section>
<section class="content">

    <form action="<?php echo base_url() ?>index.php/os/selecionarEquipamento" method="post">

        <div class="row">
            <div class="col-md-12">
                <div class="box box-success">
                    <div class="box-header with-border">
                        <h3 class="box-title">Informações do cliente</h3>
                    </div>
                    <div class="box-body">
                        <div class="form-group">
                            <div class="radio col-md-3">
                                <label>
                                    <input type="radio" class="integrar_ajax" name="optionsRadios" id="cpf" value="cpf" checked="">
                                    CNPJ/CPF
                                </label>
                            </div>
                            <div class="radio col-md-3">
                                <label>
                                    <input type="radio" class="integrar_ajax" name="optionsRadios" id="razao" value="razao">
                                    RAZÃO SOCIAL / NOME
                                </label>
                            </div>
                            <div class="radio col-md-3">
                                <label>
                                    <input type="radio" class="integrar_ajax" name="optionsRadios" id="fantasia" value="fantasia">
                                    FANTASIA
                                </label>
                            </div>
                            <div  class="col-md-3">
                                <button class="btn btn-block btn-success">AVANÇAR </button>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <select class="js-data-example-ajax col-md-12" id="select" name="select"></select>
                        </div>

                    </div> <!-- /.box-body -->
                </div> <!-- /.box box-info-->
            </div> <!--/.col md-12) -->
            <!-- right column -->
        </div>
    </form>
</section>
<?php $this->load->view('template/footer'); ?>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".js-data-example-ajax").select2({
        //    tags: true, //PODE ESCOLHER O QUE DIGITOU MESMO QUE NAO TENHA NA BUSCA
        //multiple: true, //PODE ESCOLHER MAIS DE UMA OPÇÃO

        tokenSeparators: [',', ' '],
        minimumInputLength: 3,
        minimumResultsForSearch: 10,
        ajax: {
            url: BASE_URL + 'index.php/os/autocompleteCliente',
            dataType: "json",
            type: "GET",
            data: function (params) {
                var checkbox = $(".integrar_ajax:checked").val();
                var queryParameters = {
                    term: params.term,
                    tipo: checkbox

                };
                return queryParameters;
            },
            processResults: function (data) {
                return {
                    results: $.map(data.value, function (item) {
                        return {
                            text: item.codigo + " - " + item.nome + " - " + item.ender + " - " + item.cidade,
                            id: item.codigo
                        };
                    })
                };
            }
        }

    });

</script>   

<!--<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(document).ready(function () {

        $("#cliente").autocomplete({
            source: function (request, response) {
                var ele = document.getElementsByName('optionsRadios');

                for (i = 0; i < ele.length; i++) {
                    if (ele[i].checked) {

                        $.ajax({
                            url: BASE_URL + "index.php/os/autocompleteCliente",
                            data: {
                                term: request.term,
                                tipo: ele[i].value
                            },
                            dataType: "json",
                            success: function (data) {
//                                console.log(data);
//                                return;
                                
                                var resp = $.map(data.value, function (obj) {
                                    return obj.codigo + " - " + obj.nome + " - " + obj.ender + " - " + obj.cidade;
                                });
                                response(resp);
                            }
                        });
                    }
                }
            },
            minLength: 3,
            delay: 1000
        });
    });
</script>   -->

