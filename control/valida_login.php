<?php
	/*valida login*/
	//error_reporting(0);
	session_start();

	require "config/ini_config.php";

	if(isset($_POST['user']) && isset($_POST["pass"]))
	{
		$user = mysql_escape_string($_POST['user']);
		$user = addslashes($user);
		$user = htmlspecialchars($user);
		
		//echo"<br> user : ".$user;
		
		$pass = mysql_escape_string($_POST['pass']);
		$pass =	addslashes($pass);
		$pass =	htmlspecialchars($pass);
		$passmd5 =	md5($pass);
		$passsha1 =	sha1($passmd5);

		//echo"<br> passsha1 : ".$passsha1;

		// solo pregunto por el usuario
		$SQL_QUERY_USER = "SELECT * FROM usuarios WHERE user_name = '$user' ORDER BY `usuario_id` ASC LIMIT 1";
		
		//echo"<br> SQL_QUERY_USER : ".$SQL_QUERY_USER;
		$result_query_user = mysql_query($SQL_QUERY_USER);
		$total_user = mysql_num_rows($result_query_user);

		if( $total_user == 1 ) {
			/*
			$row_user				= mysql_fetch_assoc($result_query_user);
			$user_id				= $row_user['user_id'];
			$user_name 				= $row_user['user_name'];
			$user_firstname			= $row_user['user_firstname'];
			$user_lastname			= $row_user['user_lastname'];
			$user_email				= $row_user['user_email'];
			*/
			//consulto por la password
			$SQL_QUERY_PASS = "SELECT * FROM usuarios WHERE user_password = '$passsha1' ORDER BY usuario_id ASC LIMIT 1";
			$result_query_pass = mysql_query($SQL_QUERY_PASS);
			$total_pass = mysql_num_rows($result_query_pass);

			if( $total_pass > 0 ) {
				
				$row_user				= mysql_fetch_assoc($result_query_pass);
				$user_id				= $row_user[usuario_id];
				$user_name 				= $row_user[user_name];
				$user_firstname			= $row_user[usuario_nombre];
				$user_lastname			= $row_user[usuario_apellido];
				$user_email				= $row_user[usuario_email];
				
				
				
				registrologin($user_id);

				$_SESSION['user_id']	= $user_id;
				$_SESSION['user_name']	= $user_firstname ." ".$user_lastname;

			
				//exit;
				header('Location: main.php');

			} else {
				unset ( $_SESSION['user_id'] );
				unset ( $_SESSION['user_name'] );
				// Borramos toda la sesión
				session_destroy();

				header('Location: register.php?message=error_pass');
			}

		} else {
			//usuario no existe
			/*
			echo" no existe";

			echo"<br>user : ".$user;
			echo"<br>pass : ".$pass;
			echo"<br>pass md5 : ".$passmd5;
			echo"<br>pass sha1 : ".$passsha1;
			echo"<br>pass resultante : bc79eef4a4ede878180faf2c847005e0aea74ee3";
			
			exit;
			*/
			unset ( $_SESSION['user_id'] );
			unset ( $_SESSION['user_name'] );
			// Borramos toda la sesión
			session_destroy();
			header('Location: register.php?message=error_user');
		}

		
		

		//exit;
	} else {
		header('Location: index.php?action=register');
		//header('Location: index.php');
	}

	function registrologin($user) {
		$real_ip = get_real_ip();
		$SQL_INSERT_REG ="INSERT INTO log_register (usuario_id, log_ip) VALUES ($user,'$real_ip')";
		mysql_query($SQL_INSERT_REG);
	}


?>