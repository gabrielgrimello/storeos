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
</section>

<script src="<?php echo base_url('assets/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url('assets/bower_components/jquery-ui/jquery-ui.min.js') ?>"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="<?php echo base_url('assets/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<!-- Morris.js charts -->
<script src="<?php echo base_url('assets/bower_components/chart.js/Chart.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/raphael/raphael.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/morris.js/morris.min.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.categories.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.js') ?>"></script>
<script src="<?php echo base_url('assets/bower_components/Flot/jquery.flot.resize.js') ?>"></script>
<!-- Sparkline -->
<script src="<?php echo base_url('assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') ?>"></script>
<!-- jvectormap -->
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') ?>"></script>
<!-- jQuery Knob Chart -->
<script src="<?php echo base_url('assets/bower_components/jquery-knob/dist/jquery.knob.min.js') ?>"></script>
<!-- daterangepicker -->
<script src="<?php echo base_url('assets/bower_components/moment/min/moment.min.js') ?>'"></script>
<script src="<?php echo base_url('assets/bower_components/bootstrap-daterangepicker/daterangepicker.js') ?>"></script>
<!-- datepicker -->
<script src="<?php echo base_url('assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') ?>"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="<?php echo base_url('assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js') ?>"></script>
<!-- Slimscroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url('assets/dist/js/adminlte.min.js') ?>"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url('assets/dist/js/pages/dashboard.js') ?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url('assets/dist/js/demo.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url() ?>assets/js/jquery.validate.js"></script>


<!-- Select2 -->
<script src="<?php echo base_url('assets/bower_components/select2/dist/js/select2.full.min.js') ?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.js') ?>../../plugins"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.date.extensions.js') ?>"></script>
<script src="<?php echo base_url('assets/plugins/input-mask/jquery.inputmask.extensions.js') ?>"></script>


<!-- SlimScroll -->
<script src="<?php echo base_url('assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url('assets/plugins/iCheck/icheck.min.js') ?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url('assets/bower_components/fastclick/lib/fastclick.js') ?>"></script>
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
</script>   
</div>
</div>
</section> 
</div>
</div>
</body>
</html>
