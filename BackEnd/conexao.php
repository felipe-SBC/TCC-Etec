<?php

$Bco = 'usuario';
$User = 'root';
$Senha = '';

try{
$conexao = new PDO("mysql:host=localhost; dbname=$Bco", "$User", "$Senha");
$conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$conexao->exec("set names utf8");
}
catch(PDOException $erro){
    echo "Erro na conexão:" . $erro->getMessage();
}
