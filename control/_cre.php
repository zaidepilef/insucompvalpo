<?php
	require "config/ini_config.php";
	//create user admin system

	$nombre_user = "admin_insucomp";
	$f_name = "Felipe";
	$l_name = "Diaz";
	$correo = "fel.di.rod@gmail.com";
	$pass	= "insucomp_2014";

	$sql_user ="SELECT * FROM usuarios WHERE user_name = '$nombre_user'";
	$result_query_user = mysql_query($sql_user);
	$total_user = mysql_num_rows($result_query_user);

	if( $total_user > 0 ) {
		echo"imposible";
		exit;
	} else {

		$passmd5 = md5($pass);
		$passsha1 = sha1($passmd5);

		$sql_insert_user = " INSERT INTO usuarios (user_name,usuario_nombre,usuario_apellido,usuario_email,user_password) 
									VALUES 	('$nombre_user','$f_name','$l_name','$correo','$passsha1')";
									
		echo"<br> sql_insert_user : ".$sql_insert_user;
		
		mysql_query($sql_insert_user);
		echo"Se creo user : ".$nombre_user;
		exit;

	}

?>


