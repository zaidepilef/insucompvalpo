<?php
	$server = "localhost";
	$user = "insucomp_root";
	$password = "jessicainsucomp2013";
	$basedatos = "insucomp_insucomp";
	//actual
	$link = mysqli_connect($server, $user,$password, $basedatos);
	
	$_GLOBAL['link'] = $link;
	
?>