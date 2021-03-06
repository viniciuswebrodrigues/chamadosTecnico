<?php 
include_once "../conexao.php";

if($_SESSION['logado'] != 1){
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = '../metro/';</script>";	
    exit();
}

$result_cont = "SELECT SUBSTRING_INDEX(SUBSTRING_INDEX(acaminho, ' ', 1), ' ', -1)  AS acaminho, id, ide, nivel, terminal, modelo, ultima_venda, sonda, criado, atendimento 
                FROM metroatm 
                WHERE DATE_SUB(criado, INTERVAL 3 HOUR) >= DATE(NOW())
                AND atendimento IS null
                AND modelo LIKE '%ATM%' 
				AND terminal LIKE '%Metr%'
                ORDER BY id DESC";
                
$resultado_msg_cont = $conexao->query($result_cont);
$resultado_msg_cont->execute();

$result = $resultado_msg_cont->fetchAll();

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
		echo '<th>Fit</th>';
    echo '</tr>';

foreach($result as $resultado_msg_cont) {
    echo '<tr>';
		echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='informe.php?id=".$resultado_msg_cont['id']."'>Informe</a>".'</td>';
        echo '<td>'.$resultado_msg_cont['ide'].'</td>';
		echo '<td>'.$resultado_msg_cont['nivel'].'</td>';
		echo '<td>'.$resultado_msg_cont['acaminho'].'</td>';
        echo '<td>'.$resultado_msg_cont['terminal'].'</td>';
        echo '<td>'.$resultado_msg_cont['modelo'].'</td>';
        echo '<td>'.$resultado_msg_cont['ultima_venda'].'</td>';
        echo '<td>'.$resultado_msg_cont['sonda'].'</td>';
		echo '<td>'.$resultado_msg_cont['criado'].'</td>';
        echo '<td <button type="button" class="btn btn-outline-warning btn-sm"></button>'."<a href='fit.php?id=".$resultado_msg_cont['id']."'>Fit</a>".'</td>';
        
    echo '</tr>';
}
echo '</table>';