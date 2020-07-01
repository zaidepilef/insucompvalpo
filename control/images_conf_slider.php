<?php 
	session_start();
	
	include"config/ini_config.php";
	include"config/config.php";

	$action = $_GET['action'];
	//echo"<br>action : ".$action;
	
	$image_id = $_GET['image_id'];
	//echo"<br>image_id : ".$image_id;
	
	if($action == 'delete') {
	
		$DELETE_IMG = "DELETE FROM control_images WHERE image_id = $image_id AND imagen_tipo = 'slider'";
		//echo"<br>DELETE_IMG : ".$DELETE_IMG;
		mysql_query($DELETE_IMG);
		header("Location:main.php?action=category_edit&categoria_id=$category_id");
		exit;
		
	} else if($action == 'master') {
		
		$UPDATE_IMAGE_MASTER = "UPDATE control_images SET imagen_tag = 'off' WHERE imagen_tipo = 'slider'";
		//echo"<br>UPDATE_IMAGE_MASTER : ".$UPDATE_IMAGE_MASTER;
		mysql_query($UPDATE_IMAGE_MASTER);
		
		$UPDATE_IMAGE_MASTER_ON = "UPDATE control_images SET imagen_tag = 'on' WHERE image_id = $image_id AND imagen_tipo = 'slider'";
		//echo"<br>UPDATE_IMAGE_MASTER_ON : ".$UPDATE_IMAGE_MASTER_ON;
		mysql_query($UPDATE_IMAGE_MASTER_ON);
		header("Location:main.php");
		exit;
		
	} else {
	
		header("Location:main.php");
		exit;

	}
	
	
	
	
	
?>