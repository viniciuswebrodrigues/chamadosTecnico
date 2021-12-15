<?php
include_once '../conexao.php';

$SendCad = filter_input(INPUT_POST, 'SendCad', FILTER_SANITIZE_STRING);
if ($SendCad) {
  $nome = $_SESSION['nome'];
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $sql = "UPDATE metroatm SET acaminho = '$nome' WHERE id = $id";
  $stmt = $conexao->prepare($sql);
  

  if ($stmt->execute()) {
    $_SESSION['msg'] = "<button type'button' class='close' data-dismiss='alert'>×</button><strong>Informe enviado com sucesso!</strong>";
    header("location: ../terminal/");
  } else {
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível enviar</p>";
    header("location: ../terminal/");
  }
}
