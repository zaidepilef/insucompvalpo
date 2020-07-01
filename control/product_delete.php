<?php
	//include"config/funciones.php";
	include"config/ini_config.php";
	
	$producto_id = $_GET['producto_id'];
	
	$SQL_DELETEPRODUCT = "UPDATE productos SET activo = 2 WHERE producto_id = ".$producto_id."";
	mysql_query($SQL_DELETEPRODUCT);

	header("Location:main.php?action=products&saved_changes=ok");
	
	
?>
