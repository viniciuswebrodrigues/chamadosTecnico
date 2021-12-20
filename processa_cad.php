<?php
include_once 'conexao.php';

$SendCadas = filter_input(INPUT_POST, 'SendCadas', FILTER_SANITIZE_STRING);
if ($SendCadas) {
  $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
  $usuario = filter_input(INPUT_POST, 'usuario', FILTER_SANITIZE_STRING);
  $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);
  $nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);

    //Inserir no BD
    $sql = "INSERT INTO funcionario (nome, usuario, senha, nivel) VALUES (:nome, :usuario, :senha, :nivel)";
    
    $stm = $conexao->prepare($sql);
    $stm->bindParam(':nome', $nome);
	$stm->bindParam(':usuario', $usuario);
	$stm->bindParam(':senha', $senha);
    $stm->bindParam(':nivel', $nivel);

if($stm->execute()){        
        header("Location: ../chamadostecnico/");
    }else{        
        header("Location: ../chamadostecnico/");
    }    
}else{   
    header("Location: ../chamadostecnico/");
}