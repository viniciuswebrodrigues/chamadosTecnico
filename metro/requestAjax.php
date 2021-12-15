<?php 
include_once "../conexao.php";

if($_SESSION['logado'] != 1){
    echo "<script>alert('Você deve entrar no sistema para acessar esta área.')</script>";
    echo "<script>window.location.href = 'login.php';</script>";	
    exit();
}

$result_cont = "SELECT * FROM `metroatm` WHERE STATUS IS null";
$resultado_msg_cont = $conexao->query($result_cont);
$resultado_msg_cont->execute();

$result = $resultado_msg_cont->fetchAll();

//var_dump($result);

echo '<table class="table">';
    echo '<tr>';
        echo '<th>Id</th>';
        echo '<th>Id/Terminal</th>';
        echo '<th>Informe</th>';
        echo '<th>Técnico</th>';
        echo '<th>Terminal</th>';
        echo '<th>Modelo</th>';
        echo '<th>Última venda</th>';
        echo '<th>Sonda</th>';
        echo '<th>Ação</th>';
    echo '</tr>';

foreach($result as $resultado_msg_cont) {
    echo '<tr>';
        echo '<td>'.$resultado_msg_cont['id'].'</td>';
        echo '<td>'.$resultado_msg_cont['ide'].'</td>';
        echo '<td>'."<a href='informe.php?id=".$resultado_msg_cont['id']."'>À caminho</a>".'</td>';
        echo '<td>'.$resultado_msg_cont['acaminho'].'</td>';
        echo '<td>'.$resultado_msg_cont['terminal'].'</td>';
        echo '<td>'.$resultado_msg_cont['modelo'].'</td>';
        echo '<td>'.$resultado_msg_cont['ultima_venda'].'</td>';
        echo '<td>'.$resultado_msg_cont['sonda'].'</td>';
        echo '<td>'."<a href='fit.php?id=".$resultado_msg_cont['id']."'>Fit</a>".'</td>';
        //echo "<a href=editar.php?id>Fit</a>";
        
    echo '</tr>';
}
echo '</table>';