<?php $this->load->view('template/menu'); ?>
<div class="col-md-12">
    <select class="js-example-data-ajax" style="width: 1027px;"></select>
</div>

<?php $this->load->view('template/footer'); ?>
<script>
    var BASE_URL = "<?php echo base_url(); ?>";
    $(".js-example-data-ajax").select2({
        ajax: {
            url: BASE_URL + "index.php/teste/search",
            dataType: 'json',
            delay: 250,
            data: function (params) {
                return {
                    term: params.term, // search term
                    page: params.page
                };
            },
            processResults: function (data, params) {
                // console.log(data.value);
                //                              return;
                // parse the results into the format expected by Select2
                // since we are using custom formatting functions we do not need to
                // alter the remote JSON data, except to indicate that infinite
                // scrolling can be used
                params.page = params.page || 1;

                return {
                    results: data.value,
                    pagination: {
                        more: (params.page * 30) < 10
                    }
                };
            },
            cache: true
        },
        placeholder: 'Pesquise um produto',
        minimumInputLength: 1,
        templateResult: formatRepo,
        templateSelection: formatRepoSelection

    });

    function formatRepo(repo) {
        
        if (repo.loading) {
            return "Procurando produtos";
        }

        var $container = $(
                "<div class='select2-result-repository clearfix'>" +
                "<div class='select2-result-repository__description'></div>" +
                "<div class='select2-result-repository__forks'></div>" +
                "</div>"
                );

        $container.find(".select2-result-repository__description").text(repo.nome);
        $container.find(".select2-result-repository__forks").text(repo.codigo);

        
        return $container;
    }

    function formatRepoSelection(repo) {
        
        return repo.nome || repo.text;
    }
</script>