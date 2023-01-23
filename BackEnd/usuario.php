<?php
include "conexao.php";
include "menu.php";
?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos/estilousuario.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="./select_img.js"></script>
    <title>Usuário</title>
    
</head>

<body>
    <div class="pagina_principal">
        <div class="texto">Perfil</div>
        <div class="card">
            <div class="card_cabecalho">

                <?php
                $Matriz = $conexao->prepare("select cod_perfil, foto_perfil, nome_arquivo, email from perfil where email = ? order by cod_perfil DESC");
                $Matriz->bindParam(1, $_SESSION['email']);

                $Matriz->execute();
                if ($Linha = $Matriz->fetch(PDO::FETCH_OBJ)) {
                    echo '<img class="imagem_perfil" id="cad-foto" onclick="select_img()" src = "data:image/jpg;base64,' . base64_encode($Linha->foto_perfil) . '"> .,';
                }else {
                    echo '<img class="imagem_perfil" id="cad-foto" onclick="select_img()" src = "./imagens/camera.png"> .,';
                } ?>
                <form action="" method="POST" enctype="multipart/form-data" id="up_perfil_img">
                    <input type="file" name="foto_perfil" id="input-foto" hidden><br><br>
                    <button type="button" onclick="up_foto()">cadastrar</button>
                </form>
            </div>
            <hr>
            <div class="card_corpo">
                <p class="nome"><?php echo $_SESSION["nome"] ?></p>
                <a class="mail"><?php echo $_SESSION["email"] ?></a>
                <p class="outras_inf"> <?php echo $_SESSION["apelido"] ?><br><br>
                <p class="outras_inf"> <?php echo $_SESSION["plataforma"] ?><br><br>
                <p class="outras_inf"> <?php echo $_SESSION["genero"] ?><br><br>
                <p class="outras_inf"> <?php echo $_SESSION["telefone"] ?><br><br>
                <p class="outras_inf"> <?php echo $_SESSION["datanascimento"] ?>
            </div>


            <!--<div class="card_rodape">
            <p class="contador"><span>120k</span> Followers | <span>10k</span> Following</p>
            </div>-->
        </div>

    </div>
</body>
</html>