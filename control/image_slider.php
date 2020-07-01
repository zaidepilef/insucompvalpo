<?php
	session_start();
	
	include"config/ini_config.php";
	include"config/config.php";
	error_reporting(0);

	
	$fileName_slider = $_FILES["uploaded_file_slider"]["name"];
	
	$fileTmpLoc = $_FILES["uploaded_file_slider"]["tmp_name"];
	
	$fileType = $_FILES["uploaded_file_slider"]["type"];
	
	$fileSize = $_FILES["uploaded_file_slider"]["size"];
	$fileErrorMsg = $_FILES["uploaded_file_slider"]["error"];
	$kaboom = explode(".", $fileName_slider);
	$fileExt = end($kaboom);
	
	if (!$fileTmpLoc) { 
		echo "ERROR: Please browse for a file before clicking the upload button.";
		exit();
	} else if($fileSize > 15602880) { 
		echo "ERROR: Your file was larger than 5 Megabytes in size.";
		unlink($fileTmpLoc); 
		exit();
	} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName_slider) ) {
		echo "ERROR: Your image was not .gif, .jpg, or .png.";
		unlink($fileTmpLoc); 
		exit();
	} else if ($fileErrorMsg == 1) {
		echo "ERROR: An error occured while processing the file. Try again.";
		exit();
	}
	
	
	$moveResult = move_uploaded_file($fileTmpLoc, "../upload_images/slider/$fileName_slider");
	
	if ($moveResult != true) {
		echo "ERROR: File not uploaded. Try again.";
		unlink($fileTmpLoc);
		exit();
	}
	
	unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
	// ---------- Include Adams Universal Image Resizing Function --------
	include_once("ak_php_img.php");
	
	$target_file	= "../upload_images/slider/$fileName_slider";
	$resized_file	= "../upload_images/slider/slider_$fileName_slider";
	$wmax = 950;
	$hmax = 320;
	ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt,"yes");
	
	/*
	$target_file 	= "../upload_images/slider/resized_$fileName_slider";
	$thumbnail 		= "../upload_images/slider/slider_$fileName_slider";
	$wthumb = 900;
	$hthumb = 300;
	ak_img_resize($target_file, $thumbnail, $wthumb, $hthumb, $fileExt, "yes");
	*/
	
	
	$SQL_LOAD_IMAGES = "INSERT INTO control_images (producto_id, imagen_nombre, imagen_tipo)VALUES (0, '".$fileName_slider."', 'slider')";
	//echo"<br> SQL_LOAD_IMAGES : ".$SQL_LOAD_IMAGES;
	mysql_query($SQL_LOAD_IMAGES);
	
	header("Location:main.php");


?>
