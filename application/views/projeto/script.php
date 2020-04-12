<script>
    function trello() {
        var data = null;
var key = "30e5096fc94bbc4d0ce26377ec1572a2";
var name = "testinho";


        var xhr = new XMLHttpRequest();

        xhr.addEventListener("readystatechange", function () {
            if (this.readyState === this.DONE) {
                console.log(this.responseText);
            }
        });

        xhr.open("PUT", "https://api.trello.com/1/boards/lNT7SX84?name=" +name+ "&key=" +key+ "&token=85d782cb32f74023b388b50e032c0e4644da6cdb7a3d26d8ed746c25091a1c45");

        xhr.send(data);
    }
</script>