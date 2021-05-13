<?php
	session_start();
	include"config/ini_config.php";
	include"config/config.php";


	$linea_id			= trim($_POST['linea_id']);
	//echo"<br>linea_id : ".$linea_id;
	
	$linea_nombre		= trim($_POST['linea_nombre']);
	//echo"<br>linea_nombre : ".$linea_nombre;
	
	$linea_posicion		= trim($_POST['linea_posicion']);
	//echo"<br>linea_posicion : ".$linea_posicion;
	
	$linea_activo	= $_POST['linea_activo'];
	//echo"<br>linea_activo : ".$linea_activo;
	
	if( $linea_activo == 'yes' ) {
		$activo = 1;
		//echo"<br> activo: ".$activo;
	} else {
		$activo = 0;
		//echo"<br> activo: ".$activo;
	}
	
	
	if($linea_id <> '') {
		//update
		$UPDATE_LINE = "
			UPDATE 
				lineas
			SET 
				linea_nombre = '$linea_nombre',
				linea_posicion = $linea_posicion,
				activo = $activo
			WHERE
				linea_id = $linea_id";
				
		//echo"<br>UPDATE_LINE : ".$UPDATE_LINE;
		mysql_query($UPDATE_LINE);
		
		header("Location:main.php?action=line_edit&linea_id=$linea_id&saved_changes=ok");
		exit;
	} else {
		//insert
		$INSERT_LINE = "
			INSERT INTO 
				lineas 
			(linea_nombre, linea_posicion, activo) 
			VALUES
			('$linea_nombre','$linea_posicion', $activo)";
		
		//echo"<br>INSERT_LINE : ".$INSERT_LINE;
		mysql_query($INSERT_LINE);
		header("Location:main.php?action=line&saved_changes=ok");
		exit;
	}
	
	
	
?>