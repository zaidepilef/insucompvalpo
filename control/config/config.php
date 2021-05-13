<?php
	//error_reporting(0);
	session_start();

	//include "ini_config.php";
	
	$user_id_ses = $_SESSION['user_id'];

	//echo"<br>user_id_ses : ".$_SESSION['user_id'];

	if ($user_id_ses == '') {
		header('Location: register.php');
		die;
		exit;
		break;

	} else {

		$sql_user ="SELECT * FROM usuarios WHERE usuario_id = $user_id_ses";
		//echo"<br> sql_user : ".$sql_user;
		$result_query_user = mysql_query($sql_user);
		$total_user = mysql_num_rows($result_query_user);

		if( $total_user > 0 ) {
			$row_user 				= mysql_fetch_assoc($result_query_user);
			$user_id 				= $row_user[usuario_id];
			$user_name 				= $row_user[user_name];
			$user_firstname 		= $row_user[usuario_nombre];
			$user_lastname 			= $row_user[usuario_apellido];
			$user_email				= $row_user[usuario_email];
			$_SESSION['user_id']	= $user_id;
			$_SESSION['user_name']	= $user_name;
			$_SESSION['usuario_logueado']	= $user_firstname." ".$user_lastname;
		}

	}

?>