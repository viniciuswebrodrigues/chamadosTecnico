<?php
include_once '../conexao.php';

$SendCadCont = filter_input(INPUT_POST, 'SendCadCont', FILTER_SANITIZE_STRING);
if ($SendCadCont) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $ide = filter_input(INPUT_POST, 'ide', FILTER_SANITIZE_STRING);
  $terminal = filter_input(INPUT_POST, 'terminal', FILTER_SANITIZE_STRING);
  $modelo = filter_input(INPUT_POST, 'modelo', FILTER_SANITIZE_STRING);
  $opcao = filter_input(INPUT_POST, 'opcao', FILTER_SANITIZE_STRING);
  $data = filter_input(INPUT_POST, 'data', FILTER_SANITIZE_STRING);
  $hora_inicio = filter_input(INPUT_POST, 'hora_inicio', FILTER_SANITIZE_STRING);
  $hora_termino = filter_input(INPUT_POST, 'hora_termino', FILTER_SANITIZE_STRING);
  $falha_alegada = filter_input(INPUT_POST, 'falha_alegada', FILTER_SANITIZE_STRING);
  $alegada_outro = filter_input(INPUT_POST, 'alegada_outro', FILTER_SANITIZE_STRING);
  $falha_constatada = filter_input(INPUT_POST, 'falha_constatada', FILTER_SANITIZE_STRING);
  $constatada_outro = filter_input(INPUT_POST, 'constatada_outro', FILTER_SANITIZE_STRING);
  $acao_corretiva = filter_input(INPUT_POST, 'acao_corretiva', FILTER_SANITIZE_STRING);
  $corretiva_outro = filter_input(INPUT_POST, 'corretiva_outro', FILTER_SANITIZE_STRING);
  $conjunta = filter_input(INPUT_POST, 'conjunta', FILTER_SANITIZE_STRING);
  $atendimento = filter_input(INPUT_POST, 'atendimento', FILTER_SANITIZE_STRING);
  $pendencia = filter_input(INPUT_POST, 'pendencia', FILTER_SANITIZE_STRING);



  //Converter a data e hora para o formato do BD.
  implode('-', array_reverse(explode('/', $data)));
  implode('-', array_reverse(explode('/', $hora_inicio)));
  implode('-', array_reverse(explode('/', $hora_termino)));

  $nome = $_SESSION['nome'];
  $result = "INSERT INTO ficha_intervencao (id_sol, tecnico, ide, terminal, modelo, opcao, data, hora_inicio, hora_termino, falha_alegada, alegada_outro, falha_constatada, constatada_outro, acao_corretiva, corretiva_outro, conjunta, atendimento, pendencia, criado) 
  VALUES(:id, :nome, :ide, :terminal, :modelo, :opcao, :data, :hora_inicio, :hora_termino, :falha_alegada, :alegada_outro, :falha_constatada, :constatada_outro, :acao_corretiva, :corretiva_outro, :conjunta, :atendimento, :pendencia, Now())";

  $result = $conexao->prepare($result);
  $result->bindParam(':id', $id);
  $result->bindParam(':ide', $ide);
  $result->bindParam(':nome', $_SESSION['nome']);
  $result->bindParam(':terminal', $terminal);
  $result->bindParam(':modelo', $modelo);
  $result->bindParam(':opcao', $opcao);
  $result->bindParam(':data', $data);
  $result->bindParam(':hora_inicio', $hora_inicio);
  $result->bindParam(':hora_termino', $hora_termino);
  $result->bindParam(':falha_alegada', $falha_alegada);
  $result->bindParam(':alegada_outro', $alegada_outro);
  $result->bindParam(':falha_constatada', $falha_constatada);
  $result->bindParam(':constatada_outro', $constatada_outro);
  $result->bindParam(':acao_corretiva', $acao_corretiva);
  $result->bindParam(':corretiva_outro', $corretiva_outro);
  $result->bindParam(':conjunta', $conjunta);
  $result->bindParam(':atendimento', $atendimento);
  $result->bindParam(':pendencia', $pendencia);
  
  
  //update na tabela de solictações 
  try {
    $sql = "UPDATE metroatm SET atendimento = '$atendimento' WHERE id = $id";

    $stmt = $conexao->prepare($sql);

    // execute the query
    $stmt->execute();
    echo $stmt->rowCount();
  } catch (PDOException $e) {
  }

  if ($result->execute()) {
    $_SESSION['msg'] = "<button type'button' class='close' data-dismiss='alert'>×</button><strong>FIT enviada com sucesso!</strong>";
    header("location: ../terminal/resultcard.php");
  } else {
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível enviar</p>";
    header("location: ../terminal/");
  }
}
