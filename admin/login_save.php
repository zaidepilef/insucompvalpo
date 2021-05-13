<?
	session_start();
	include 'config/mysql.php';
	include 'config/funciones.php';

	$_SESSION['notice'] = '';
	
	$user_nick	= trim( strtolower( mysqli_real_escape_string( $link, $_POST['user_nick'] ) ) );
	$user_pass	= trim( mysqli_real_escape_string( $link, $_POST['user_pass'] ) );
	
	//echo"<br>user_nick : ".$user_nick;
	//echo"<br>user_pass : ".$user_pass;
	
	
	if ( !$user_nick OR strlen( $user_nick ) < 2) {
		$_SESSION['notice'] = 'Error en usuario';
		header('Location:http://admin.insucompvalpo.cl/login');
		die;
		exit;
	}
	
	//encriptar password
	$user_pass_md5 = md5( $user_pass );
	$user_pass_sha1 = sha1( $user_pass_md5 );
	///echo"<br>user_pass_sha1: ".$user_pass_sha1;
	
	$ip_visitante = get_real_ip();
	$token = mt_rand( 100000,999999 );
	
	$sql_user = "
		SELECT *
		FROM 
			usuarios 
		WHERE 
			user_name = '".$user_nick."'
		LIMIT 1
		";
	//echo"<br> sql_user : ".$sql_user;
	$query_user	= mysqli_query($link,$sql_user);
	$count_user	= mysqli_num_rows($query_user);
	
	if( $count_user > 0 ) {
		$row_user 				= mysqli_fetch_assoc($query_user);
		$usuario_id 			= $row_user['usuario_id'];
		$usuario_nombre 		= $row_user['user_name'];
		$usuario_password 		= $row_user['user_password'];
		$usuario_email 	 		= $row_user['usario_email'];
		$usuario_tipo 			= $row_user['usuario_tipo'];
		$usuario_activo 		= $row_user['usuario_estado'];
		
		$_SESSION['sesion_usuario_id'] = $usuario_id;
		$_SESSION['token_sesion'] 	= $token;
		$_SESSION['ip_sesion'] 		= $ip_visitante;
		
		if( $usuario_activo == 'bloqueado' ){
			//variable de session para notice, se podra usar en todo el sistema
			$_SESSION['notice'] = 'usuario bloqueado';
			header('Location:http://admin.insucompvalpo.cl/login');
			die;
			exit;
			
		} else if( $usuario_activo == '' ) {
			
			$_SESSION['notice']			= 'Usuario no activo';
			$_SESSION['usuario_sesion'] = '';
			$_SESSION['token_sesion'] 	= '';
			$_SESSION['ip_sesion'] 		= '';
			header('Location:http://admin.insucompvalpo.cl/login');
			die;
			exit;
		} else {
			if( $usuario_password <> $user_pass_sha1 ) {
				$_SESSION['notice']			= 'Error en Password';
				$_SESSION['usuario_sesion'] = '';
				$_SESSION['token_sesion'] 	= '';
				$_SESSION['ip_sesion'] 		= '';
				header('Location:http://admin.insucompvalpo.cl/login');
				die;
				exit;
			} else {
				registrologin($usuario_id);
				$_SESSION['notice'] = '';
				header('Location:http://admin.insucompvalpo.cl/');
				die;
				exit;
			}
		}
	} else {
		$_SESSION['notice'] = 'Usuario no exite';
		header('Location:http://admin.insucompvalpo.cl/login');
		die;
		exit;
	}
	
?>