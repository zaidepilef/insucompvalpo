<?php
// Disables server-side caching, otherwise saved changes might take some time to be visible.

	//$shop_id      = $_POST['shop_id'];
	$product_id   = $_POST['product_id'];
	//$sImageNumber = $_POST['image_number'];
	//$img_prefix   = $_POST['img_prefix'];
	$img_type     = $_POST['img_type'];

	echo $_FILES["uploaded_file"]["name"];
	//exit;
	//echo "bye";
	//exit;
	if ($img_type == 'cover'){

		if (file_exists("../images/cover/cover_".$product_id.".jpg")){
			unlink("../images/cover/cover_".$product_id.".jpg");
		}

		$newFileName = "cover_".$product_id;
		$maxHeight   = 315;        
		$maxWidth    = 900;        
		$folder      = "../images/cover";
		$use_letterbox = 'no';

	} else {

		$newFileName = $img_prefix."_".$sImageNumber;
		$maxHeight   = 400;        
		$maxWidth    = 400;        
		$folder      = "../images/product";
		$use_letterbox = 'yes';
	}                   

	include "image_resizer_engine.php";

	main_resizer($newFileName, $maxHeight, $maxWidth, $folder, $use_letterbox);

	if ($img_type == 'cover'){

		header("Location: main.php?action=product_edit&product_id".$product_id);
  
	} else {

		//header("Location: https://www.mallfix.com/account/upload_file?product_id=".$product_id."&img_prefix=".$img_prefix."&shop_id=".$shop_id);

	}         
?>