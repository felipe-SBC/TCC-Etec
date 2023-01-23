<?php

include "conexao.php";

if(isset($_POST["email"])){$email=($_POST["email"]);}
if(isset($_POST["senha"])){$senha=($_POST["senha"]);}
if(isset($_POST["nome"])){$nome=($_POST["nome"]);}
if(isset($_POST["datanascimento"])){$datanascimento=($_POST["datanascimento"]);}
if(isset($_POST["genero"])){$genero=($_POST["genero"]);}
if(isset($_POST["telefone"])){$telefone=($_POST["telefone"]);}
if(isset($_POST["plataforma"])){$plataforma=($_POST["plataforma"]);}
if(isset($_POST["apelido"])){$apelido=($_POST["apelido"]);}
try{
    $matriz = $conexao->prepare("select * from cadastroUsuario where email = ?");
    $matriz->bindParam(1, $email);

    $matriz->execute();
    $Usuario = $matriz->fetchAll();

    $RetornoJSON = json_encode($Usuario);

    echo $RetornoJSON;
}catch (Exception $erro) {
    $RetornoJSON = "Erro: " . $erro->getMessage();
}
