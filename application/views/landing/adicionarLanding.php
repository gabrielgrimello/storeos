<form action="<?php echo base_url() ?>index.php/landing/storepet" method="post">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-success">
                <div class="box-body">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Nome*</label>
                            <input type="text" class="form-control" name="nome" required="">
                            <input type="hidden" class="form-control" name="fonte" value="22">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Telefone</label>
                            <input type="text" class="form-control" maxlength="15" name="telefone" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>E-mail*</label>
                            <input type="email" class="form-control" name="email" required="">
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            <label>Cidade </label>
                            <input type="text" class="form-control" name="cidade" >
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group text-left">
                            <button type="submit" class="btn btn-success"> SOLICITAR LIGAÇÃO </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
