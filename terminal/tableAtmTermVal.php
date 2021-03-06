<?php 
include_once "../conexao.php";

if($_SESSION['logado'] != 1){
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = '../chamadostecnico';</script>";	
    exit();
}

$sql = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(acaminho, ' ', 1), ' ', -1)  AS acaminho, id, ide, nivel, terminal, modelo, ultima_venda, sonda, criado, atendimento 
                FROM metroatm 
                WHERE DATE(criado) = CURDATE()
                AND atendimento IS null
                AND modelo LIKE '%V306%' 
				AND terminal LIKE '%Term%'
                ORDER BY id DESC";
                
$stm = $conexao->query($sql);
$stm->execute();

$result = $stm->fetchAll();

//var_dump($result);

echo '<table class="table table-sm">';
    echo '<tr>';
		echo '<th>A caminho</th>';
        echo '<th>Id-Term</th>';
        echo '<th>Nível</th>';
		echo '<th>Técnico</th>';
        echo '<th>Terminal</th>';
        echo '<th>Modelo</th>';
        echo '<th>Última venda</th>';
        echo '<th>Sonda</th>';
        echo '<th>Criado</th>';
		echo '<th>FIT</th>';
    echo '</tr>';

foreach($result as $stm) {
    echo '<tr>';
		echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='informe.php?id=".$stm['id']."'>Informe</a>".'</td>';
        echo '<td>'.$stm['ide'].'</td>';
		echo '<td>'.$stm['nivel'].'</td>';
		echo '<td>'.$stm['acaminho'].'</td>';
        echo '<td>'.$stm['terminal'].'</td>';
        echo '<td>'.$stm['modelo'].'</td>';
        echo '<td>'.$stm['ultima_venda'].'</td>';
        echo '<td>'.$stm['sonda'].'</td>';
        echo '<td>'.$stm['criado'].'</td>';
		echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='fit.php?id=".$stm['id']."'>Fit</a>".'</td>';
        //echo "<a href=editar.php?id>Fit</a>";
        
    echo '</tr>';
}
echo '</table>';