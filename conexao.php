<?php 
session_start();
error_reporting(0);
setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
date_default_timezone_set('America/Sao_Paulo');


/*
 * Método de conexão sem padrões
 */

$banco = "chamados";
$usuario_banco = "root";
$senha_banco = "";
 
$conexao = new PDO('mysql:host=localhost;dbname='.$banco, $usuario_banco, $senha_banco);
$conexao->exec("SET CHARACTER SET utf8");

