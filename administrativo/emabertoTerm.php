<?php 
include_once "../conexao.php";

if($_SESSION['logado'] != 1){
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = '../chamadostecnico/';</script>";	
    exit();
}

$sql = "SELECT id, ide, acaminho, nivel, terminal, modelo, ultima_venda, sonda, criado, atendimento
                FROM metroatm
                WHERE atendimento IS null
				AND terminal LIKE '%Term%'
                ORDER BY id DESC";
                
$stm = $conexao->query($sql);
$stm->execute();

$result = $stm->fetchAll();

//var_dump($result);

echo '<table class="table table-sm">';
    echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Id/Terminal</th>';
        echo '<th>Terminal</th>';
        echo '<th>Modelo</th>';
        echo '<th>Última venda</th>';
        echo '<th>Sonda</th>';
		echo '<th>Criado</th>';
    echo '</tr>';

foreach($result as $stm) {
    echo '<tr>';
        echo '<td>'.$stm['id'].'</td>';
        echo '<td>'.$stm['ide'].'</td>';
        echo '<td>'.$stm['terminal'].'</td>';
        echo '<td>'.$stm['modelo'].'</td>';
        echo '<td>'.$stm['ultima_venda'].'</td>';
        echo '<td>'.$stm['sonda'].'</td>';
		echo '<td>'.$stm['criado'].'</td>';		
        //echo "<a href=editar.php?id>Fit</a>";
        
    echo '</tr>';
}
echo '</table>';
?>
<!doctype html>

<head>
	<title>Chamados em aberto</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link href="../assets/css/pace.min.css" rel="stylesheet" />
	<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
	<link rel="icon" href="../assets/images/favicon.ico" type="image/x-icon">
    <!-- bootstrap Lib -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- datatable lib -->
    <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
	<script src="../assets/js/pace.min.js"></script>

</head>
<style>
 table {
    min-width: 100% !important;
    position: relative !important;
    background: url('../assets/images/bg-themes/1.png');
  }

  table tbody tr {
    background: url('../assets/images/bg-themes/17.jpg');
    color: white;
  }

  #background {
    background: url('../assets/images/bg-themes/1.png');
  }
.button {
    background-color: white; /* Green */
    border: none;
    color: white;
    padding: 16px 32px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 16px;
    margin: 4px 2px;
    -webkit-transition-duration: 0.4s; /* Safari */
    transition-duration: 0.4s;
    cursor: pointer;
}


</style>
<body>
<div class="table-responsive">
<table id="table" class="table table-sm">
</table>
</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>

</body>
</html>

