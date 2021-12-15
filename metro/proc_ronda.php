<?php
include_once '../conexao.php';

$SendCadas = filter_input(INPUT_POST, 'SendCadas', FILTER_SANITIZE_STRING);
if ($SendCadas) {
  $opcao = filter_input(INPUT_POST, 'opcao', FILTER_SANITIZE_STRING);
  $estacao = filter_input(INPUT_POST, 'estacao', FILTER_SANITIZE_STRING);
  $equipamento = filter_input(INPUT_POST, 'equipamento', FILTER_SANITIZE_STRING);
  $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
  $hora_inicio = filter_input(INPUT_POST, 'hora_inicio', FILTER_SANITIZE_STRING);
  $hora_termino = filter_input(INPUT_POST, 'hora_termino', FILTER_SANITIZE_STRING);
  $obs = filter_input(INPUT_POST, 'obs', FILTER_SANITIZE_STRING);

    //Inserir no BD
    $sql = "INSERT INTO ronda (opcao, tecnico, estacao, equipamento, data, hora_inicio, hora_termino, obs) 
            VALUES (:opcao, :nome, :estacao, :equipamento, :data, :hora_inicio, :hora_termino, :obs)";
    
    $nome = $_SESSION['nome'];
    $stm = $conexao->prepare($sql);
    $stm->bindParam(':opcao', $opcao);
    $stm->bindParam(':nome', $_SESSION['nome']);
	$stm->bindParam(':estacao', $estacao);
	$stm->bindParam(':equipamento', $equipamento);
    $stm->bindParam(':data', $data);
    $stm->bindParam(':hora_inicio', $hora_inicio);
    $stm->bindParam(':hora_termino', $hora_termino);
    $stm->bindParam(':obs', $obs);

    if ($stm->execute()) {
        $_SESSION['msg'] = "<button type'button' class='close' data-dismiss='alert'>×</button><strong>FIT enviada com sucesso!</strong>";
        header("location: ../metro/");
      } else {
        $_SESSION['msg'] = "<p style='color:red;'>Não foi possível enviar</p>";
        header("location: ../metro/");
      }
    }