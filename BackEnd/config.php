<?php include "conexao.php";
include "menu.php"; ?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos/estiloconfig.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <title>Configurações</title>
    
</head>

<body>

    <form action="exc.php" method="post" id="excluir">

        <div class="botao">

            <input type="submit" id="apagar" value="excluir">
        </div>
        

    </form>
    <form action="alterar.html" method="post" id="alterar">
    <div class="botao">
        <input type="submit" id="alt1" value="alterar">

        </div>
    </form>
    <h2></h2>
</body>

</html>
<script>
    $(document).ready(function() {

        $('#apagar').click(function() {

            var formData = new FormData(document.getElementById("excluir"));
            //var dados = $('#excluir').serialize();

            $.ajax({
                    method: "POST",
                    url: "exc.php",
                    data: dados,

                    beforeSend: function() {
                        $("h2").html("Processo em andamento..");
                    }
                })

                .done(function(msg) {

                    $("h2").html("Retorno da Inclusão..");
                    $("#resposta").html(msg);

                    //alert("Dados cadastrados com sucesso!");

                })

                .fail(function() {

                    alert("Falha na Inclusão..");
                })
            return false;
        });
    });
</script>