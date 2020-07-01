<?php
		session_start();
	
	include"config/ini_config.php";
	include"config/config.php";


	$producto_id			= trim($_POST['producto_id']);
	//echo"<br>producto_id : ".$producto_id;
	$producto_codigo			= trim($_POST['producto_codigo']);
	//echo"<br>producto_codigo : ".$producto_codigo;
	$producto_nombre		= trim($_POST['producto_nombre']);
	//echo"<br>producto_nombre : ".$producto_nombre;
	
	$producto_marca			= trim($_POST['producto_marca']);
	//echo"<br>producto_marca : ".$producto_marca;
	
	$producto_precio		= trim($_POST['producto_precio']);
	//echo"<br>producto_precio : ".$producto_precio;
	
	$producto_descripcion	= trim($_POST['producto_descripcion']);
	//echo"<br>producto_descripcion : ".$producto_descripcion;
	
	$categoria_id			= $_POST['categoria_id'];
	//echo"<br>categoria_id : ".$categoria_id;
	
	$producto_clase			= trim($_POST['producto_clase']);
	//echo"<br>producto_clase : ".$producto_clase;
	
	
	
	$producto_activo	= $_POST['producto_activo'];
	//echo"<br>producto_activo : ".$producto_activo;
	
	if( $producto_activo == 'yes' ) {
		$activo = 1;
		//echo"<br> active: ".$active;
	} else {
		$activo = 0;
		//echo"<br> active: ".$active;
	}
	
	
	if($producto_id <> ''){
		
		//update
		$UPDATE_PRODUCT = "
			UPDATE 
				productos
			SET 
				producto_codigo = '$producto_codigo',
				producto_nombre = '$producto_nombre',
				producto_marca = '$producto_marca',
				producto_precio = '$producto_precio',
				producto_descripcion = '$producto_descripcion',
				categoria_id = $categoria_id,
				activo = $activo,
				producto_clase = '$producto_clase'
			WHERE
				producto_id = $producto_id";
				
		//echo"<br>UPDATE_PRODUCT : ".$UPDATE_PRODUCT;
		mysql_query($UPDATE_PRODUCT);
		
		header("Location:main.php?action=products&saved_changes=ok");
		exit;
	
	}else{
	
		//insert
		$INSERT_PRODUCT = "
			INSERT INTO 
				productos 
			(producto_codigo, producto_nombre, producto_marca, producto_precio, producto_descripcion, categoria_id, activo, producto_clase) 
			VALUES
			('$producto_codigo','$producto_nombre','$producto_marca','$producto_precio','$producto_descripcion', $categoria_id, $activo, '$producto_clase')";
		
		//echo"<br>INSERT_PRODUCT : ".$INSERT_PRODUCT;
		mysql_query($INSERT_PRODUCT);
		
		$SELECT_PRODUCT = "SELECT * FROM productos ORDER BY fecha_creacion DESC LIMIT 1";
		//echo"<br> SELECT_PRODUCT : ".$SELECT_PRODUCT;
		$result_products = mysql_query($SELECT_PRODUCT);
		$row_products = mysql_fetch_assoc($result_products);
		$producto_id_s	= $row_products[producto_id];
		
		header("Location:main.php?action=product_edit&product_id=$producto_id_s&saved_changes=ok");
		exit;
	}
	
	
	
?>