<?
	include"config/funciones.php";
	include"config/ini_config.php";
	
	$img_id = $_GET['img_id'];
	$product_id = $_GET['product_id'];
	
	$SQL_DELETEIMG = "DELETE FROM image_product WHERE image_id = ".$img_id." AND product_id = ".$product_id."";
	mysql_query($SQL_DELETEIMG);
	
	
	header("Location:main.php?action=add_photo_product&product_id=$product_id");


?>