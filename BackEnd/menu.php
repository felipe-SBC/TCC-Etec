<?php
session_start();
if($_SESSION['email'] == null){
    header('location:con_expirado.php');
}
?>

<!DOCTYPE html>
<html lang="pt-br" dir="ltr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="estilos/estilomenu.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'> <!--Referencia do site dos icones-->
    <title>Feed</title>
</head>
<body>
    <div class="sidebar">
        <div class="logo_content">
            <div class="logo">
                <!--Aqui vai ser a nossa logo-->
                <div class="nome_logo">SPAWN</div>
            </div>
            <i class='bx bx-menu' id="bto"></i> <!--Acionando o clique do botão do menu-->
        </div>
        <ul class="nav_lista">
            <li>
                <i class='bx bx-search-alt'></i>
                <input type="text" placeholder="Pesquisar...">
                <span class="tooltip">Pesquisar</span>
            </li>
            <li>
                <a href="inicial.php">
                <i class='bx bx-home-alt'></i>
                <span class="nome_link">Feed</span>
                </a>
                <span class="tooltip">Feed</span>
            </li>
            <li>
                <a href="usuario.php">
                <i class='bx bx-user'></i>
                <span class="nome_link">Usuário</span>
                </a>
                <span class="tooltip">Usuário</span>
            </li><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
            <li>
                <a href="config.php">
                <i class='bx bx-cog' ></i>
                <span class="nome_link">Configurações</span>
                </a>
                <span class="tooltip">Configurações</span>
            </li>
        </ul>
        <div class="profile_content">
            <div class="perfil">
                <div class="detalhe_perfil">
                    <!--Temos que usar o comando de pegar a foto de perfil pelo banco de dados-->
                    <img class = "imagem_perfil"
                    <?php
                    $Matriz = $conexao->prepare("select cod_perfil, foto_perfil, nome_arquivo, email from perfil where email = ? order by cod_perfil DESC");
                    $Matriz->bindParam(1, $_SESSION['email']);
                    
                    $Matriz->execute();

                    while ($Linha = $Matriz->fetch(PDO::FETCH_OBJ)){
                        echo '<img src = "data:image/jpg;base64,' . base64_encode($Linha->foto_perfil) . '"';
                    }

                    ?>>
                    <div class="nome_plataforma">
                        <div class="nome"><!--Aqui dentro vai ser usado o session contendo o nome--><?php echo $_SESSION["nome"]; ?></div>
                        <div class="plataforma">Joga no: <?php echo $_SESSION["plataforma"]?><!--Aqui dentro vai ser usado o session contendo a plataforma--></div>
                    </div>
                </div>
                <!--Aqui vai ser feito o unset do session, seguido do redirecionamento para o index-->
                <a href="logout.php"><i class='bx bx-log-out' id="log_out"></i></a>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    let bto = document.querySelector("#bto");
    let sidebar = document.querySelector(".sidebar");
    let pesquisarbto = document.querySelector(".bx-search-alt")

    bto.onclick = function(){
        sidebar.classList.toggle("active");
        menuBtnChange();
    }
    pesquisarbto.addEventListener("click", ()=>{
    sidebar.classList.toggle("active");
    menuBtnChange();
    })

    function menuBtnChange() {
        if(sidebar.classList.contains("active")){
            bto.classList.replace("bx-menu", "bx-menu-alt-right");//replacing the iocns class
        }else {
            bto.classList.replace("bx-menu-alt-right","bx-menu");//replacing the iocns class
        }
    }
</script>
