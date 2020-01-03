<?php 

	require_once("config.php");

	/*
	$sql = new Sql();

	$estacionamento = $sql->select("SELECT * FROM tb_estacionamento");

	echo json_encode($estacionamento);
	*/

	$logan = new Usuario();

	$logan->loadById(9);

	echo $logan;

?>