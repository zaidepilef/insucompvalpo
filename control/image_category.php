<?php
	
	session_start();
	
	include"config/ini_config.php";
	include"config/config.php";
	error_reporting(0);
	//Access the $_FILES global variable for this specific file being uploaded.
	//and create local PHP variables from the $_FILES array of information.
	$categoria_id = $_POST['categoria_id'];
	
	$fileName_product = $_FILES["uploaded_file_product"]["name"];
	//The file name
	$fileTmpLoc = $_FILES["uploaded_file_product"]["tmp_name"];
	//File in the PHP tmp folder
	$fileType = $_FILES["uploaded_file_product"]["type"];
	//The type of file it is
	$fileSize = $_FILES["uploaded_file_product"]["size"];
	//File size in bytes
	$fileErrorMsg = $_FILES["uploaded_file_product"]["error"];
	//0 for false... and 1 for true
	$kaboom = explode(".", $fileName_product);
	//Split file name into an array using the dot
	$fileExt = end($kaboom);
	//Now target the last array element to get the file extension
	//START PHP Image Upload Error Handling --------------------------------------------------

	if (!$fileTmpLoc) { // if file not chosen

		//echo "ERROR: Please browse for a file before clicking the upload button.";
		header("Location:main.php?action=category_edit&categoria_id=$categoria_id&error=1");
		exit();

	} else if($fileSize > 15602880) { // if file size is larger than 5 Megabytes

		//echo "ERROR: Your file was larger than 5 Megabytes in size.";
		header("Location:main.php?action=category_edit&categoria_id=$categoria_id&error=2");
		unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
		exit();

	} else if (!preg_match("/.(gif|jpg|png)$/i", $fileName_product) ) {

		// This condition is only if you wish to allow uploading of specific file types    
		//echo "ERROR: Your image was not .gif, .jpg, or .png.";
		unlink($fileTmpLoc);
		// Remove the uploaded file from the PHP temp folder
		header("Location:main.php?action=category_edit&categoria_id=$categoria_id&error=3");
		exit();

	} else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1

		//echo "ERROR: An error occured while processing the file. Try again.";
		header("Location:main.php?action=category_edit&categoria_id=$categoria_id&error=4");
		exit();

	}
	

	// END PHP Image Upload Error Handling ---------------------------------
	// Place it into your "upload_images" folder mow using the move_uploaded_file_product() function
	
	$moveResult = move_uploaded_file($fileTmpLoc, "../upload_images/categorias/$fileName_product");
	// Check to make sure the move result is true before continuing
	if ($moveResult != true) {
		//echo "ERROR: File not uploaded. Try again.";
		unlink($fileTmpLoc); 
		header("Location:main.php?action=category_edit&categoria_id=$categoria_id&error=5");
		// Remove the uploaded file from the PHP temp folder
		exit();
	}
	
	unlink($fileTmpLoc); 
	// Remove the uploaded file from the PHP temp folder
	// ---------- Include Adams Universal Image Resizing Function --------
	include_once("ak_php_img.php");
	
	$target_file	= "../upload_images/categorias/$fileName_product";
	$resized_file	= "../upload_images/categorias/category_$fileName_product";
	$wmax = 100;
	$hmax = 100;
	ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt,"yes");
	

	$SQL_LOAD_IMAGES = "INSERT INTO control_images (categoria_id, imagen_nombre, imagen_tipo)VALUES (".$categoria_id.", '".$fileName_product."', 'category')";
	//echo"<br> SQL_LOAD_IMAGES : ".$SQL_LOAD_IMAGES;
	mysql_query($SQL_LOAD_IMAGES);
	
	header("Location:main.php?action=category_edit&categoria_id=$categoria_id");
	
?>
