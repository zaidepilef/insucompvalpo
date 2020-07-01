<?php
//
	//require_once "config/ini_conig.php";
	//error_reporting(0);
	session_start();

	unset ( $_SESSION['user_id'] );
	unset ( $_SESSION['user_name'] );
	unset ( $_SESSION['usuario_logueado'] );
	// Borramos toda la sesión
	session_destroy();
	
	$error = $_GET['message'];
	
?>
<!DOCTYPE html>
<html>
<head>
	
	<title>Admin Insucomp-Valpo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	
</head>
<body>

	<div class="row">
		<img src="http://www.insucomp-valpo.cl/img/banner.jpg" width="100%">
	</div>
	
	<div class="container">
    
        <div class="span6 offset3">
          
			<div class="area">
				<form class="form-horizontal" action="valida_login.php" method="post">
					<div class="heading">
						<h4 class="form-heading">INGRESAR</h4>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputUsername">Usuario</label>

						<div class="controls">
							<input id="user" name="user" type="text">
						</div>
					</div>

					<div class="control-group">
						<label class="control-label" for="inputPassword">Password</label>

						<div class="controls">
							<input id="pass" name="pass" type="password">
						</div>
					</div>

					<div class="control-group">
						<div class="controls">
							<button class="btn btn-success" type="submit">Entrar</button>
						</div>
					</div>
					
					<?php if($error =='error_pass'){ ?>
					<div class="alert alert-error">
						<button class="close" data-dismiss="alert" type="button">×</button> 
						<strong>Error la ingresar</strong>
					</div>
					<?}?>
					
				</form>
			</div>
        </div>
    </div>
</body>
