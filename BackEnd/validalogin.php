<?php
session_start();

include "conexao.php";

$email = $_POST["email"];
$senha = $_POST["senha"];

$Matriz = $conexao->prepare("select * from cadastroUsuario where email = ? and senha = ?");
$Matriz->bindParam(1, $email);
$Matriz->bindParam(2, $senha);

$Matriz->execute();
$Linha = $Matriz->fetch(PDO::FETCH_OBJ);

if($Linha > 0){
    $_SESSION['email'] = $Linha->email;
    $_SESSION['senha'] = $Linha->senha;
    $_SESSION['nome'] = $Linha->nome;
    $_SESSION['datanascimento'] = $Linha->datanascimento;
    $_SESSION['genero'] = $Linha->genero;
    $_SESSION['telefone'] = $Linha->telefone;
    $_SESSION['plataforma'] = $Linha->plataforma;
    $_SESSION['apelido'] = $Linha->apelido;

    header('location:inicial.php');
}else{
    unset($_SESSION['email']);
    unset($_SESSION['senha']);

    header('location:index.html');
}