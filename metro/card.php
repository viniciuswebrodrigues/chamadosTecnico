<?php 
include_once '../conexao.php';

$id = $_GET['id']; //Pega a informação passada na variavel id pela urlecho $id; // Exibe o conteudo que foi pego

$consulta = $conexao->query("SELECT * FROM ficha_intervencao WHERE id_sol = $id");
  
$carBootstrap = '';

while ($row_cont = $consulta->fetch(PDO::FETCH_ASSOC)) { 
$carBootstrap .= '<center>';
$carBootstrap .= '<div class="card-deck" style="display: inline-grid;"><br>';
$carBootstrap .= '<div class="card border-primary mb-3" style="width: 25rem;">';
$carBootstrap .= '<div class="card-body text-primary">';
$carBootstrap .= '<h4 class="card-header">Estação: <br> <strong>'.$row_cont['terminal'].'</strong></h4>';
$carBootstrap .= '<div class="card-header">Técnico: <br> <strong>'.$row_cont['tecnico'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Falha Alegada: <br> <strong>'.$row_cont['falha_alegada'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Falha Constatada: <br> <strong>'.$row_cont['falha_constatada'].'</strong></div>';
$carBootstrap .= '</div>';
$carBootstrap .= '</div>';
$carBootstrap .= '</div>';
$carBootstrap .= '</div>';
$carBootstrap .= '</center>';
echo $carBootstrap;
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/app-style.css" rel="stylesheet" />
</head>
<body class="bg-theme bg-theme1">
    
</body>
</html>
