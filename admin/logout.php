<?
	session_start(); 
	$_SESSION['sesion_usuario_id'] = "";   
	$_SESSION['token_sesion'] = "";   
	session_destroy();
	header('Location:http://admin.insucompvalpo.cl/login');
?>