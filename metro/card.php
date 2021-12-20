<?php 
include_once '../conexao.php';

$id = $_GET['id']; //Pega a informação passada na variavel id pela urlecho $id; // Exibe o conteudo que foi pego

$consulta = $conexao->query("SELECT metroatm.id, metroatm.ide, metroatm.terminal, metroatm.modelo, metroatm.acao_pendencia, ficha_intervencao.id_sol, ficha_intervencao.id,                                     ficha_intervencao.tecnico, ficha_intervencao.data, ficha_intervencao.opcao, ficha_intervencao.hora_inicio, ficha_intervencao.hora_termino,                                         ficha_intervencao.falha_alegada, ficha_intervencao.alegada_outro, ficha_intervencao.falha_constatada, ficha_intervencao.constatada_outro,                                          ficha_intervencao.acao_corretiva, ficha_intervencao.corretiva_outro, ficha_intervencao.conjunta, ficha_intervencao.atendimento, ficha_intervencao.pendencia
                             FROM metroatm
                             INNER JOIN ficha_intervencao ON ficha_intervencao.id_sol = metroatm.id
                             WHERE id_sol = $id");
  
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
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/app-style.css" rel="stylesheet" />
</head>
<body class="bg-theme bg-theme1">
<center>
<a href="../metro/"> Voltar ao sistema</a>
</center>
</body>
</html>
