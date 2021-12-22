<?php 
include_once "../conexao.php";

if($_SESSION['logado'] != 1){
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = '../metro/';</script>";	
    exit();
}

$sql = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(acaminho, ' ', 1), ' ', -1)  AS acaminho, id, ide, nivel, periferico, SUBSTRING(terminal, 6) as terminal, SUBSTRING(modelo, 5) as modelo, ultima_venda, SUBSTRING(sonda, 6) as sonda, SUBSTRING_INDEX(SUBSTRING_INDEX(criado, ' ', -1), ' ', 1) as criado, atendimento 
                FROM metroatm 
                WHERE criado >= DATE_SUB(NOW(), INTERVAL 12 HOUR)
                AND atendimento IS null
				AND periferico IS null
                AND modelo LIKE '%ATM%' 
				AND terminal LIKE '%Term%'
                ORDER BY id DESC";
                
$stm = $conexao->query($sql);
$stm->execute();

$result = $stm->fetchAll();

//var_dump($result);

echo '<table class="table table-sm">';
    echo '<tr>';
		echo '<th>Intervenções</th>';
        echo '<th>Id</th>';
		echo '<th>Técnico</th>';
        echo '<th>Terminal</th>';
        echo '<th>Modelo</th>';
        echo '<th>Sonda</th>';
		echo '<th>Criado</th>';
		echo '<th>Nível</th>';
    echo '</tr>';

foreach($result as $stm) {
    echo '<tr>';
		echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='informe.php?id=".$stm['id']."'>Info</a>".'</td>';
		echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='fit.php?id=".$stm['id']."'>FIT</a>".'</td>';
        echo '<td>'.$stm['ide'].'</td>';
		echo '<td>'.$stm['acaminho'].'</td>';
        echo '<td>'.$stm['terminal'].'</td>';
        echo '<td>'.$stm['modelo'].'</td>';
        echo '<td>'.$stm['sonda'].'</td>';
		echo '<td>'.$stm['criado'].'</td>';
		echo '<td>'.$stm['nivel'].'</td>';
        
    echo '</tr>';
}
echo '</table>';