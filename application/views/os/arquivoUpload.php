<?php $this->load->view('template/menu'); ?>
<div>
    <a class="btn btn-primary" href="<?php echo base_url() . 'index.php/os/editarOS/' . $idOS ?>">Voltar para a edição da OS</a>
</div>
<br />
<div id="content">
    <div id="my-dropzone" class="dropzone">
        <div class="dz-message">
            <h3>Solte os arquivos aqui</h3> ou <strong>Clique</strong> para selecionar
        </div>
    </div>
</div>
<div>
    <a class="btn btn-success" href="<?php current_url() ?>">Enviar fotos</a>
</div>

<br>
<div class="row">
    <div class="col-md-12">
        <?php
        if (!empty($files)) {
            foreach ($files as $row) {
                $filePath = 'upload/' . $row["file_name"];
                $fileMime = mime_content_type($filePath);
                ?> 
                <div class="col-md-3" align="center">
                    <img src="<?php echo base_url('upload/' . $row["file_name"]); ?>" width="100%" height="100%" /> 
                    <label>Enviado em: <?php
                        $date1 = new DateTime($row['uploaded_on']);
                        echo $date1->format('d/m/Y H:m');
                        ?>
                    </label>
                    <br>
                    <a download title="download" href="<?php echo base_url('upload/' . $row["file_name"]); ?>"  class="btn btn-primary btn-xs"><i class="fa-fw glyphicon glyphicon-download"></i> </a>
                    <a title="excluir"  class="btn btn-danger btn-xs" data-toggle="modal" data-target="#modal-danger<?php echo $row['idArquivos']; ?>"><i class="fa-fw glyphicon glyphicon-trash"></i> </a>
                </div>
                <!--MODAL BOTÃO EXCLUIR ARQUIVO-->
                <div class="modal modal-default fade" id="modal-danger<?php echo $row['idArquivos']; ?>">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span></button>
                                <h4 class="modal-title">Deseja excluir o arquivo <?php echo $row['idArquivos']; ?>?</h4>
                            </div>
                            <form action="<?php echo base_url() ?>index.php/os/excluirArquivo" method="post">
                                <input type="hidden" id="idArquivo" name="idArquivo" value="<?php echo $row['idArquivos']; ?>">
                                <input type="hidden" id="idOS" name="idOS" value="<?php echo $this->uri->segment(3) ?>">
                                <input type="hidden" id="file" name="file" value="<?php echo $row['file_name'] ?>">
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-primary pull-left" data-dismiss="modal">Desistir</button>
                                    <button type="submit" class="btn btn-danger ">Excluir<i class="icon-remove icon-white"></i></button>
                                </div>
                            </form>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div>
                <!--MODAL BOTÃO EXCLUIR-->
                <?php
            }
        } else {
            ?> 
            <p>Nenhum arquivo encontrado...</p> 
        <?php } ?>
    </div>
</div>
<script>
    Dropzone.autoDiscover = false;
    var myDropzone = new Dropzone("#my-dropzone", {
        url: "<?php echo site_url("os/dragDropUpload") ?>",
        acceptedFiles: "image/*",
        //addRemoveLinks: true,
        params: {'idOS': <?php echo $this->uri->segment(3) ?>},
        removedfile: function (file) {
            var name = file.name;

            $.ajax({
                type: "post",
                url: "<?php echo site_url("images/remove") ?>",
                data: {file: name},
                dataType: 'html'
            });

            // remove the thumbnail
            var previewElement;
            return (previewElement = file.previewElement) != null ? (previewElement.parentNode.removeChild(file.previewElement)) : (void 0);
        },
        init: function () {
            var me = this;
            $.get("<?php echo site_url("images/list_files") ?>", function (data) {
                // if any files already in server show all here
                if (data.length > 0) {
                    $.each(data, function (key, value) {
                        var mockFile = value;
                        me.emit("addedfile", mockFile);
                        me.emit("thumbnail", mockFile, "<?php echo base_url(); ?>upload/" + value.nome);
                        me.emit("complete", mockFile);
                    });
                }
            });
        }
    });
</script>
<?php $this->load->view('template/footer'); ?>