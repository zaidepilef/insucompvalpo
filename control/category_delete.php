<?php

	//include"config/funciones.php";
	include"config/ini_config.php";
	
	$categoria_id = $_GET['categoria_id'];
	
	$SQL_DELETECATEGORIA = "UPDATE categorias SET activo = 2 WHERE categoria_id = ".$categoria_id."";
	mysql_query($SQL_DELETECATEGORIA);

	header("Location:main.php?action=category&saved_changes=ok");



?>