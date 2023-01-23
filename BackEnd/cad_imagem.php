<?php
include "conexao.php";
session_start();

$ArquivoAtual = $_FILES['foto_perfil']['name'];
$ArquivoTmp= $_FILES['foto_perfil']['tmp_name'];
$Destino = 'foto_perfil/'.$ArquivoAtual;
$email = $_SESSION['email'];

if($botao = "Cadastrar"){
    
    move_uploaded_file($ArquivoTmp, $Destino);

    $imagem = file_get_contents("../spawn/foto_perfil/" . $ArquivoAtual);

    $comando=$conexao->prepare("insert into perfil (foto_perfil, nome_arquivo, descricao_perfil, email) values (?, ?, ?, ?)");       
    $comando->bindParam(1, $imagem);
    $comando->bindParam(2, $ArquivoAtual);
    $comando->bindParam(3, $descricao_perfil);
    $comando->bindParam(4, $email);
    $comando->execute();

    if($comando->rowCount() > 0){
        echo "Imagem cadastrada";
    }else{
        echo "imagem não cadastrada";
    }
}

?>