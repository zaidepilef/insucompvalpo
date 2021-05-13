<?php
	session_start();
	$_SESSION['sesion_usuario_id'] = "";   
	$_SESSION['token_sesion'] = "";   
	session_destroy();
?>
<!doctype html>
<!--[if lt IE 7]>		<html class="no-js lt-ie9 lt-ie8 lt-ie7">	<![endif]-->
<!--[if IE 7]>			<html class="no-js lt-ie9 lt-ie8">			<![endif]-->
<!--[if IE 8]>			<html class="no-js lt-ie9">					<![endif]-->
<!--[if gt IE 8]>		<!--><html class="no-js">					<!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Admin INSUCOMP</title>
	<!-- Modernizr -->
	<script src="http://admin.insucompvalpo.cl/js/libs/modernizr-2.6.2.min.js"></script>
	<!-- jQuery-->
	<script type="text/javascript" src="http://admin.insucompvalpo.cl/js/libs/jquery-1.10.2.min.js"></script>
	<!-- framework css -->
	<!--[if gt IE 9]><!-->
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork.css">
	<!--<![endif]-->
	<!--[if lte IE 9]>
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/groundwork-core.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-type.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-ui.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-anim.css">
	<link type="text/css" rel="stylesheet" href="http://admin.insucompvalpo.cl/groundwork/css/groundwork-ie.css">
	<![endif]-->
</head>

<body>
<div class="row">
	<img src="http://www.insucompvalpo.cl/img/banner.jpg">
</div>
	
	<div class='row'>
		<?
		$notice = $_SESSION['notice'];
		//echo"<br>notice: ".$notice;
		if($notice <> ''){?>
			<div class="ten twelfths centered">
				<p class="alert dismissible message"><?=$notice?></p>
			</div>
		<?}
		$_SESSION['notice'] = "";
		
		?>
	</div>
		
	<div class='row'>
		<div class='centered one third'>
			<form id="form_login_empresa" name="form_login" method='post' action='login_save.php'>
				<fieldset>
					<legend>Accesso a ADMIN-INSUCOMP</legend>
					
					<div class="row">
						<div class="two half padded">
							<label for="name">Nombre de usuario</label>
							<input type='text' name='user_nick' id='user_nick' placeholder='Nombre de Usuario'>
						</div>
					</div>
					
					<div class="row">
						<div class="two half padded">
							<label for="name">Password de ingreso</label>
							<input type='password' name='user_pass' id='user_pass' placeholder='Password'>
						</div>
					</div>
					
					<div class="row">
						<div class="two half padded">
							<input type="submit" class="green two half" value="Ingresar"/>
						</div>
					</div>
					<!--
					<div class="row small half-pad-top">
						<div class="one half">
							<a class=" button two half padded blue" href="http://educom.nexzaid.net/register">Registrarse</a>
						</div>
						<div class="one half half-pad-left">
							<a class="button two half padded" href="http://educom.nexzaid.net/forgot">Recuperar password</a>
						</div>
					</div>
					-->
				</fieldset>
			</form>
		</div>
	</div>
	<footer class="gap-top">
		
	</footer>
</body>
<script>
	
</script>
</html>











