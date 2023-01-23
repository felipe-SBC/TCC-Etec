<?php
include "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos/estilofeed.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <!--Referencia do site dos icones-->
    <title>Feed</title>
</head>
<body>
    <?php include "menu.php"?>
    <div class="pagina_principal">
        <div class="texto" style="margin-left: 5px;">Feed</div>
    <?php include "post.php"?>
       <br><br>
        
        <?php
        //Aqui vai ser o começo do feed em si
        $Matriz = $conexao->prepare("select imagem_post, apelido from postagens inner join cadastroUsuario on cadastroUsuario.email = postagens.email order by cod_postagens DESC");
        $Matriz->execute();
        while($Linha = $Matriz->fetch(PDO::FETCH_OBJ)){ ?>
        <div class="posts">
            <?php
           echo '<img style="margin-left: 25%; margin-top: 50px; border-radius: 5px" src = "data:image/jpg;base64,' . base64_encode($Linha->imagem_post) . '"width = "250px" height = "250px"/ >'; ?>
               <div class="texto">
               <?php
                echo "<br>";

                echo $Linha->apelido;
                echo ' <hr> <br><br><br><br><br>';
                }       
                ?>
            </div>
            </div>
    </div>
</body>
</html>