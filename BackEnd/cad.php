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

//cadastro usuario

try{
    $Comando=$conexao->prepare("insert into cadastroUsuario values (?, ?, ?, ?, ?, ?, ?, ?)");
    $Comando->bindParam(1, $email);
    $Comando->bindParam(2, $senha);
    $Comando->bindParam(3, $nome);
    $Comando->bindParam(4, $datanascimento);
    $Comando->bindParam(5, $genero);
    $Comando->bindParam(6, $telefone);
    $Comando->bindParam(7, $plataforma);
    $Comando->bindParam(8, $apelido);
    
    $Comando->execute();
    
    if($Comando->rowCount() > 0){
        
        $email = null;
        $senha = null;
        $nome = null;
        $datanascimento = null;
        $genero = null;
        $telefone = null;
        $plataforma = null;
        $apelido = null;
        
        $RetornoJSON = "Cadastro feito com sucesso!";
    }else{
        $RetornoJSON = "Erro ao cadastrar usuário";
    }
}
catch (PDOException $erro){
    $RetornoJSON = "Erro:" . $erro->getMessage();
}

echo $RetornoJSON;


?>
