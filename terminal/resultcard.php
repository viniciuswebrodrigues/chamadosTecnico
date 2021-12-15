<?php 
include_once '../conexao.php';


$consulta = $conexao->query("SELECT * FROM ficha_intervencao ORDER BY id DESC LIMIT 1");
  
$carBootstrap = '';

while ($row_cont = $consulta->fetch(PDO::FETCH_ASSOC)) { 
$carBootstrap .= '<center>';
$carBootstrap .= '<div class="card-deck" style="display: inline-grid;"><br>';
$carBootstrap .= '<div class="card border-primary mb-3" style="width-max: 50rem;">';
$carBootstrap .= '<div class="card-body text-primary">';
$carBootstrap .= '<h4 class="card-header">Estação:  <strong>'.$row_cont['terminal'].'</strong></h4>';
$carBootstrap .= '<div class="card-header">ID-Solicitação:  <strong>'.$row_cont['id_sol'].'</strong></div>';
$carBootstrap .= '<div class="card-header">ID-Fit:  <strong>'.$row_cont['id'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Técnico:  <strong>'.$row_cont['tecnico'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Ide-Terminal: <strong>'.$row_cont['ide'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Modelo:  <strong>'.$row_cont['modelo'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Opção:  <strong>'.$row_cont['opcao'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Data:  <strong>'.$row_cont['data'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Hora-início:  <strong>'.$row_cont['hora_inicio'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Hora-término:  <strong>'.$row_cont['hora_termino'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Falha Alegada:  <strong>'.$row_cont['falha_alegada'].'</strong><strong>'.$row_cont['alegada_outro'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Falha Constatada:  <strong>'.$row_cont['falha_constatada'].'</strong><strong>'.$row_cont['constatada_outro'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Ação Corretiva:  <strong>'.$row_cont['acao_corretiva'].'</strong><strong>'.$row_cont['corretiva_outro'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Conjunta:  <strong>'.$row_cont['conjunta'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Pendência:  <strong>'.$row_cont['pendencia'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Ação pendência:  <strong>'.$row_cont['acao_pendencia'].'</strong></div>';
$carBootstrap .= '<div class="card-header">Atendimento:  <strong>'.$row_cont['atendimento'].'</strong></div>';
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
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>Ficha de Intervenção Técnica</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/app-style.css" rel="stylesheet" />
</head>
<body class="bg-theme bg-theme1">


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

<a href="https://chat.whatsapp.com/H34kb5gcpnp7HTZipb2J5u"><img width="30" height="30" src="https://i.ibb.co/VpjYmFf/whatsapp-icon-logo-BDC0-A8063-B-seeklogo-com.png" alt=""> whatsapp</a><br>
<a href="../terminal/"> Voltar ao sistema</a>

</body>
</html>

