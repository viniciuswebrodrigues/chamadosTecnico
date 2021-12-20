<?php
include_once '../conexao.php';

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);
if ($SendCad) {
  $nome = $_SESSION['nome'];
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $sql = "UPDATE metroatm SET acaminho = '$nome' WHERE id = $id";
  $stmt = $conexao->prepare($sql);
  

  if ($stmt->execute()) {
    $_SESSION['msg'] = "<div class'alert alert-info alert-dismissible' role='alert'><button type='button' class='close' data-dismiss='alert'>&times</button><div class='alert-icon'><i class='icon-info'></i></div><div class='alert-message'><span>Informe enviado com sucesso!</span></div>";
    header("location: ../terminal/");
  } else {
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível enviar</p>";
    header("location: ../terminal/");
  }
}
