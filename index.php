<?php 

	require_once("config.php");

	/*
	$sql = new Sql();

	$estacionamento = $sql->select("SELECT * FROM tb_estacionamento");

	echo json_encode($estacionamento);
	*/

	//CARREGA 1 USUARIO
	/*
	$logan = new Usuario();
	$logan->loadById(9);
	echo $logan;
	*/

	//CARREGA LISTA DE USUARIOS
	/*
	$lista = Usuario::getList();
	echo json_encode($lista);
	/*
	
	//carrega pelas inicias do usuario
	/*
	$search = Usuario::search("p");
	echo json_encode($search);
	*/

	//Carrega pelo login e usuario
	$carro = new Usuario();
	$carro->login("gol", "963");
	echo $carro;

?>