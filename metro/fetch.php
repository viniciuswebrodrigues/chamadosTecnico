<?php

//fetch.php

include('../conexao.php');

$column = array('id', 'ide', 'terminal', 'modelo', 'ultima_venda', 'sonda', 'criado', 'atendimento');

$query = "SELECT * 
		  FROM metroatm";

if(isset($_POST['search']['value']))
{
 $query .= '
 WHERE id LIKE "%'.$_POST['search']['value'].'%" 
 OR ide LIKE "%'.$_POST['search']['value'].'%" 
 OR terminal LIKE "%'.$_POST['search']['value'].'%" 
 OR modelo LIKE "%'.$_POST['search']['value'].'%" 
 OR ultima_venda LIKE "%'.$_POST['search']['value'].'%" 
 OR sonda LIKE "%'.$_POST['search']['value'].'%"  
 OR atendimento LIKE "%'.$_POST['search']['value'].'%" 
 OR criado LIKE "%'.$_POST['search']['value'].'%"
 ';
}

if(isset($_POST['order']))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY id DESC ';
}

$query1 = '';

if($_POST['length'] != -1)
{
 $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$statement = $conexao->prepare($query);

$statement->execute();

$number_filter_row = $statement->rowCount();

$statement = $conexao->prepare($query . $query1);

$statement->execute();

$result = $statement->fetchAll();

$data = array();

foreach($result as $row)
{
 $sub_array = array();
 $sub_array[] = $row["id"];
 $sub_array[] = $row["ide"];
 $sub_array[] = $row["terminal"];
 $sub_array[] = $row["modelo"];
 $sub_array[] = $row["ultima_venda"];
 $sub_array[] = $row["sonda"];
 $sub_array[] = $row["criado"];
 $sub_array[] = '<span class="label label-' .($row["atendimento"] == "concluido" ? 'success' : 'danger'). '">' .($row["atendimento"] == "pendente" ? '' : ''). htmlspecialchars($row["atendimento"]).'</span>';
 $sub_array[] = '<a href="card.php?id='.$row['id'].'"<button type="submit" class="btn btn-outline-white btn-sm">Detalhes</button></a>';
 $data[] = $sub_array;
}

function count_all_data($conexao)
{
 $query = "SELECT * FROM metroatm";
 $statement = $conexao->prepare($query);
 $statement->execute();
 return $statement->rowCount();
}

$output = array(
 'draw'    => intval($_POST['draw']),
 'recordsTotal'  => count_all_data($conexao),
 'recordsFiltered' => $number_filter_row,
 'data'    => $data
);

echo json_encode($output);

?>