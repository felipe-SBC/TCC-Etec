<?php
session_start();

include "conexao.php";
$email = $_SESSION['email'];

// if(isset($_POST["email"])){$email=($_POST["email"]);}
if(isset($_POST["senha"])){$senha=($_POST["senha"]);}
if(isset($_POST["nome"])){$nome=($_POST["nome"]);}
if(isset($_POST["datanascimento"])){$datanascimento=($_POST["datanascimento"]);}
if(isset($_POST["genero"])){$genero=($_POST["genero"]);}
if(isset($_POST["telefone"])){$telefone=($_POST["telefone"]);}
if(isset($_POST["plataforma"])){$plataforma=($_POST["plataforma"]);}
if(isset($_POST["apelido"])){$apelido=($_POST["apelido"]);}

try{
    
    $Comando = $conexao->prepare("update cadastroUsuario set senha=?, nome=?, datanascimento=?, genero=?, telefone=?, plataforma=?, apelido=? where email=?");
    $Comando -> bindParam(1, $senha);
    $Comando -> bindParam(2, $nome);
    $Comando -> bindParam(3, $datanascimento);
    $Comando -> bindParam(4, $genero);
    $Comando -> bindParam(5, $telefone);
    $Comando -> bindParam(6, $plataforma);
    $Comando -> bindParam(7, $apelido);
    $Comando -> bindParam(8, $email);
    $Comando->execute();

    if($Comando->rowCount()>0){

        $RetornoJSON = "Alteração feita com sucesso! Para ter as alterações concluidas, faça o login novamente!";
    }else{
        $RetornoJSON = "Não foi possivel alterar";
    }

}
catch(PDOException $erro) {
    $RetornoJSON = "Erro:" . $erro->getMessage();
}
echo $RetornoJSON;
?>
