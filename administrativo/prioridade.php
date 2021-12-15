<?php
include_once '../conexao.php';

$Send = filter_input(INPUT_POST, 'Send', FILTER_SANITIZE_STRING);
if ($Send) {
  $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
  $prioridade = filter_input(INPUT_POST, 'prioridade', FILTER_SANITIZE_STRING);
  $sql = "UPDATE metroatm SET nivel = '$prioridade' WHERE id = $id";
  $stmt = $conexao->prepare($sql);
  

  if ($stmt->execute()) {
    $_SESSION['msg'] = "<button type'button' class='close' data-dismiss='alert'>×</button><strong>Informe enviado com sucesso!</strong>";
    header("location: ../administrativo/ ");
  } else {
    $_SESSION['msg'] = "<p style='color:red;'>Não foi possível enviar</p>";
    header("location: ../administrativo/ ");
  }
}
