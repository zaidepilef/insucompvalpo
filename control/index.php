<?php
	//error_reporting(0);
	session_start();

	include"config/config.php";
	$user_id_main = $_SESSION['user_id'];
	echo"<br>user_id_main : ".$user_id_main;

	include "main.php";
	

?>


