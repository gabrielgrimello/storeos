
<script type="text/javascript">

    function teste2() {
        var x = document.getElementById("cnpj").value;
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function () {
            if (this.readyState === 4 && this.status === 200) {
                var myObj = JSON.parse(this.responseText);
                //alert ("teste");
                fantasia.value = Object(myObj.result[0].nome);
                endereco.value = Object(myObj.result[0].ender) + ", " + Object(myObj.result[0].numero) + " - " + Object(myObj.result[0].bairro);
                cidade.value = Object(myObj.result[0].cidade);

            }
        };
        xmlhttp.open("GET", "http://intranet1.wbagestao.com.br:7070/Pessoas.Get?login=C82A5185-89FD-498B-9B8C-005E76A282C6&cnpj=" + x, true);
        xmlhttp.send();
    }
</script>

