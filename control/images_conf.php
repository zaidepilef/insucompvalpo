<?php 
	session_start();
	
	include"config/ini_config.php";
	include"config/config.php";

	$action = $_GET['action'];
	//echo"<br>action : ".$action;
	
	$product_id = $_GET['product_id'];
	//echo"<br>product_id : ".$product_id;
	
	$image_id = $_GET['image_id'];
	//echo"<br>image_id : ".$image_id;
	
	if($action == 'delete') {
		$DELETE_IMG = "DELETE FROM control_images WHERE image_id = $image_id AND producto_id = $product_id";
		//echo"<br>DELETE_IMG : ".$DELETE_IMG;
		mysql_query($DELETE_IMG);
		
		header("Location:main.php?action=product_edit&product_id=$product_id");
		exit;
	} elseif($action == 'master') {
		$UPDATE_IMAGE_MASTER = "UPDATE control_images SET imagen_tag = 'off' WHERE producto_id = $product_id";
		//echo"<br>UPDATE_IMAGE_MASTER : ".$UPDATE_IMAGE_MASTER;
		mysql_query($UPDATE_IMAGE_MASTER);
		
		$UPDATE_IMAGE_MASTER_ON = "UPDATE control_images SET imagen_tag = 'on' WHERE producto_id = $product_id AND image_id = $image_id";
		//echo"<br>UPDATE_IMAGE_MASTER_ON : ".$UPDATE_IMAGE_MASTER_ON;
		mysql_query($UPDATE_IMAGE_MASTER_ON);
		
		header("Location:main.php?action=product_edit&product_id=$product_id");
		exit;
	
	}else{
		header("Location:main.php?action=product_edit&product_id=$product_id");
		exit;

	}
	
	
	
	
	
?>