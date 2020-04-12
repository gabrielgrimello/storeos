<html>
    <body>



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
                                        <input type="radio" name="optionsRadios" id="cpf" value="cpf" checked="">
                                        CNPJ/CPF
                                    </label>
                                </div>
                                <div class="radio col-md-3">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="razao" value="razao">
                                        RAZÃO SOCIAL / NOME
                                    </label>
                                </div>
                                <div class="radio col-md-3">
                                    <label>
                                        <input type="radio" name="optionsRadios" id="fantasia" value="fantasia">
                                        FANTASIA
                                    </label>
                                </div>
                                <div  class="col-md-3">
                                    <button class="btn btn-block btn-success">AVANÇAR </button>
                                </div>
                            </div>
                            <div class="form-group col-md-12">
                                <input type="text" class="form-control" id="cliente" name="cliente" required="" minlength="11" placeholder="Pesquise aqui...">
                            </div>

                        </div> <!-- /.box-body -->
                    </div> <!-- /.box box-info-->
                </div> <!--/.col md-12) -->
                <!-- right column -->
            </div>
        </form>



    </body>
    <script>
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
    </script>   

</html>
