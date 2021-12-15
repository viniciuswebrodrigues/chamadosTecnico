<?php

function get_total_all_records()
{
	include('../conexao.php');
	$statement = $conexao->prepare("SELECT * FROM metroatm WHERE status IS NULL");
	$statement->execute();
	$result = $statement->fetchAll();
	return $statement->rowCount();
}

?>