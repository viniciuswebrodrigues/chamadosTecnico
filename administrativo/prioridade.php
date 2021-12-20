<?php
include_once '../conexao.php';

$Send = filter_input(INPUT_POST, 'Send', FILTER_SANITIZE_STRING);
if ($Send) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_STRING);
  $periferico = filter_input(INPUT_POST, 'periferico', FILTER_SANITIZE_STRING);
  $sql = "UPDATE metroatm SET nivel = '$prioridade', periferico = '$periferico' WHERE id = $id";
  $stmt = $conexao->prepare($sql);
  

  if ($stmt->execute()) {
    $_SESSION['msg'] = "<div class'alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'>&times</button><div class='alert-icon'><i class='icon-info'></i></div><div class='alert-message'><span>Solicitação enviada com sucesso!</span></div>";
    header("location: ../administrativo");
  } else {
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível enviar</p>";
    header("location: ../administrativo");
  }
}
