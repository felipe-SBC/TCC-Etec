<?php
session_start();
include "conexao.php";

$email = $_SESSION['email'];

try{
    $Comando=$conexao->prepare("delete from cadastroUsuario where email = ?");
    $Comando->bindParam(1, $email);
    
    $Comando1=$conexao->prepare("delete from postagens where email = ?");
    $Comando1->bindParam(1, $email);

    $Comando2=$conexao->prepare("delete from perfil where email = ?");
    $Comando2->bindParam(1, $email);

    $Comando1->execute();
    $Comando2->execute();
    $Comando->execute();
    
    if($Comando->rowCount() > 0){
        header('location:index.html');

    }else{
        $RetornoJSON = "Erro ao excluir usuário";
    }
}
catch (PDOException $erro){
    $RetornoJSON = "Erro:" . $erro->getMessage();
}

echo $RetornoJSON;


?>
