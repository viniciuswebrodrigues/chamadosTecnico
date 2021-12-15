<?php
include('../conexao.php');
include('function.php');
if(isset($_POST["chamados"]))
{
	$output = array();
	$statement = $conexao->prepare(
		"SELECT * FROM metroatm WHERE id = '".$_POST["chamados"]."' LIMIT 1"
	);
	$statement->execute();
	$result = $statement->fetchAll();
	foreach($result as $row)
	{
		$output["id"] = $row["id"];
		$output["ide"] = $row["ide"];
		$output["terminal"] = $row["terminal"];
		$output["modelo"] = $row["modelo"];
		$output["ultima_venda"] = $row["ultima_venda"];
		$output["sonda"] = $row["sonda"];
		$output["status"] = $row["status"];
	}
	echo json_encode($output);
}
?>