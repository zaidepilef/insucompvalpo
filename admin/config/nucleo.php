<?php
	session_start();
	include'funciones.php';
	include'mysql.php';
	
	$sesion_usuario_id = $_SESSION['sesion_usuario_id'];
	$token_sesion = $_SESSION['token_sesion'];
	$ip_sesion = $_SESSION['ip_sesion'];
	$ip_visitante = get_real_ip();
	
	if($ip_visitante <> $ip_sesion){
		
		//echo"<br> ip_visitante ";
		header('Location:http://admin.insucompvalpo.cl/logout');
		die;
		break;
		exit;
		
	} else if ($sesion_usuario_id == '' ) {
		
		//echo"<br> sesion_usuario_id ";
		header('Location:http://admin.insucompvalpo.cl/logout');
		die;
		break;
		exit;
		
	} else if ($token_sesion == '' ) {
		
		//echo"<br> token_sesion";
		header('Location:http://admin.insucompvalpo.cl/logout');
		die;
		break;
		exit;
		
	} else {
		
		$sql_usuarios ="SELECT * FROM usuarios WHERE usuario_id = ".$sesion_usuario_id."";
		//echo"<br>sql_usuarios : ".$sql_usuarios;
		$result_query_usuarios= mysqli_query($link,$sql_usuarios);
		$total_usuarios = mysqli_num_rows($result_query_usuarios);
		if ( $total_usuarios > 0 ) {
			$row_user						= mysqli_fetch_assoc($result_query_usuarios);
			$usuario_nombres				= $row_user['nombre'];
			$usuario_email					= $row_user['email'];
			
		} else {
			//echo"<br> total_user = 0";
			//header('Location:http://admin.capellipropiedades.cl/logout');
			header('Location:http://admin.insucompvalpo.cl/logout');
			die;
			break;
			exit;
		}
		
	}
	
?>