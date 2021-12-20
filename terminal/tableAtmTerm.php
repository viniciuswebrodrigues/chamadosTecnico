<?php 
include_once "../conexao.php";

if($_SESSION['logado'] != 1){
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = '/';</script>";	
    exit();
}

$sql = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(acaminho, ' ', 1), ' ', -1)  AS acaminho, id, ide, nivel, terminal, modelo, ultima_venda, sonda, criado, atendimento 
               FROM metroatm 
               WHERE criado >= DATE_SUB(NOW(), INTERVAL 5 HOUR)
               AND atendimento IS null
               AND modelo LIKE '%ATM%' 
			   AND terminal LIKE '%Term%'
               ORDER BY id DESC";
                
$stm = $conexao->query($sql);
$stm->execute();

$result = $stm->fetchAll();

//var_dump($result);

echo '<table class="table table-hover">';
    echo '<tr>';
		echo '<th>A caminho</th>';
        echo '<th>Id-Term</th>';
        echo '<th>Nível</th>';
		echo '<th>Periférico</th>';
		echo '<th>Técnico</th>';
		echo '<th>Fit</th>';
        echo '<th>Terminal</th>';
        echo '<th>Modelo</th>';
        echo '<th>Última venda</th>';
        echo '<th>Sonda</th>';
		echo '<th>Criado</th>';
    echo '</tr>';

foreach($result as $resultado_msg_cont) {
    echo '<tr>';
		echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='informe.php?id=".$resultado_msg_cont['id']."'>Informe</a>".'</td>';
        echo '<td>'.$resultado_msg_cont['ide'].'</td>';
		echo '<td>'.$resultado_msg_cont['nivel'].'</td>';
		echo '<td>'.$resultado_msg_cont['periferico'].'</td>';
		echo '<td>'.$resultado_msg_cont['acaminho'].'</td>';
		echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='fit.php?id=".$resultado_msg_cont['id']."'>FIT</a>".'</td>';
        echo '<td>'.$resultado_msg_cont['terminal'].'</td>';
        echo '<td>'.$resultado_msg_cont['modelo'].'</td>';
        echo '<td>'.$resultado_msg_cont['ultima_venda'].'</td>';
        echo '<td>'.$resultado_msg_cont['sonda'].'</td>';
		echo '<td>'.$resultado_msg_cont['criado'].'</td>';
    echo '</tr>';
}
echo '</table>';