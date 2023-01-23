<?php
session_start();

header("Content-type: text/html; charset=utf-8");

include "conexao.php";

$postar = $_POST['Postar'];
$ArquivoTmp= $_FILES['arquivo']['tmp_name'];
$ArquivoAtual = $_FILES['arquivo']['name'];
$email = $_SESSION['email'];
$Destino = 'imagens_post/'.$ArquivoAtual;

if($postar == "Publicar"){
    move_uploaded_file($ArquivoTmp, $Destino);

    $imagem = file_get_contents("../spawn/imagens_post/" . $ArquivoAtual);


    $comando=$conexao->prepare("insert into postagens(imagem_post,descricao,nome_arquivo, email) values (?,?,?,?)");
    $comando->bindparam(1, $imagem);
    $comando->bindparam(2, $descricao);
    $comando->bindparam(3, $ArquivoAtual);
    $comando->bindparam(4, $email);

    $comando->execute();

    if($comando->rowCount()>0){
        echo"<script> alert('Foto cadastrada com sucesso')</script>";
        header('location: inicial.php');
    }
}


?>