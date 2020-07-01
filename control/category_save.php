<?php
	session_start();
	include"config/ini_config.php";
	include"config/config.php";


	$categoria_id			= trim($_POST['categoria_id']);
	//echo"<br>categoria_id : ".$categoria_id;
	
	$categoria_nombre		= trim($_POST['categoria_nombre']);
	//echo"<br>categoria_nombre : ".$categoria_nombre;
	
	$categoria_posicion		= trim($_POST['categoria_posicion']);
	//echo"<br>categoria_posicion : ".$categoria_posicion;
	
	$linea_id			= $_POST['linea_id'];
	//echo"<br>linea_id : ".$linea_id;
	
	$categoria_activo	= $_POST['categoria_activo'];
	//echo"<br>categoria_activo : ".$categoria_activo;
	
	if( $categoria_activo == 'yes' ) {
		$activo = 1;
		//echo"<br> activo: ".$activo;
	} else {
		$activo = 0;
		//echo"<br> activo: ".$activo;
	}
	
	
	if($categoria_id <> ''){
		
		//update
		$UPDATE_CATEGORY = "
			UPDATE 
				categorias
			SET 
				categoria_nombre = '$categoria_nombre',
				categoria_posicion = '$categoria_posicion',
				linea_id = $linea_id,
				activo = $activo
			WHERE
				categoria_id = $categoria_id";
				
		//echo"<br>UPDATE_CATEGORY : ".$UPDATE_CATEGORY;
		mysql_query($UPDATE_CATEGORY);
		
		header("Location:main.php?action=category_edit&categoria_id=$categoria_id&saved_changes=ok");
		exit;
	
	}else{
	
		//insert
		$INSERT_CATEGORY = "
			INSERT INTO 
				categorias 
			(categoria_nombre, categoria_posicion, linea_id, activo) 
			VALUES
			('$categoria_nombre','$categoria_posicion', $linea_id, $activo)";
		
		//echo"<br>INSERT_CATEGORY : ".$INSERT_CATEGORY;
		mysql_query($INSERT_CATEGORY);
		
		
		$SELECT_CATEGORY = "SELECT * FROM categorias ORDER BY fecha_creacion DESC LIMIT 1";
		//echo"<br> SELECT_CATEGORY : ".$SELECT_CATEGORY;
		$result_categories = mysql_query($SELECT_CATEGORY);
		$row_categories = mysql_fetch_assoc($result_categories);
		$categoria_id_s	= $row_categories[categoria_id];
		
		
		header("Location:main.php?action=category_edit&categoria_id=$categoria_id_s&saved_changes=ok");
		exit;
	}
	
	
	
?>