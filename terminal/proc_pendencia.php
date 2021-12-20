<?php
include_once '../conexao.php';

$SendCadContPend = filter_input(INPUT_POST, 'SendCadContPend', FILTER_SANITIZE_STRING);
if ($SendCadContPend) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $acao_pendencia = filter_input(INPUT_POST, 'acao_pendencia', FILTER_SANITIZE_STRING);
  var_dump($id);

  $sql = "UPDATE metroatm SET acao_pendencia = '$acao_pendencia', atendimento = 'concluido' WHERE id = $id";
  $stm = $conexao->prepare($sql);

    //update na tabela ficha_intervencao
  try {
    $sql = "UPDATE ficha_intervencao SET atendimento = 'concluido' WHERE id_sol = $id";

    $stmt = $conexao->prepare($sql);

    // execute the query
    $stmt->execute();
    echo $stmt->rowCount();
  } catch (PDOException $e) {
  }

  if ($stm->execute()) {
    $_SESSION['msg'] = "<div class'alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'>&times</button><div class='alert-icon'><i class='icon-info'></i></div><div class='alert-message'><span>Dado baixa em pendência com sucesso!</span></div>";
    header("location: ../terminal/");
  } else {
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível enviar</p>";
    header("location: ../terminal/");
  }
}
