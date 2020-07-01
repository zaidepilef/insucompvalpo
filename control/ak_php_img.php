<?php
// Read & Save 24bit BMP files

// Author: de77
// Licence: MIT
// Webpage: de77.com
// Version: 07.02.2010

class BMP
{
	public static function imagebmp(&$img, $filename = false)
	{
		return imagebmp($img, $filename);
	}
	
	public static function imagecreatefrombmp($filename)
	{
		return imagecreatefrombmp($filename);
	}
}

function imagebmp(&$img, $filename = false)
{
	$wid = imagesx($img);
	$hei = imagesy($img);
	$wid_pad = str_pad('', $wid % 4, "\0");
	
	$size = 54 + ($wid + $wid_pad) * $hei;
	
	//prepare & save header
	$header['identifier']		= 'BM';
	$header['file_size']		= dword($size);
	$header['reserved']			= dword(0);
	$header['bitmap_data']		= dword(54);
	$header['header_size']		= dword(40);
	$header['width']			= dword($wid);
	$header['height']			= dword($hei);
	$header['planes']			= word(1);
	$header['bits_per_pixel']	= word(24);
	$header['compression']		= dword(0);
	$header['data_size']		= dword(0);
	$header['h_resolution']		= dword(0);
	$header['v_resolution']		= dword(0);
	$header['colors']			= dword(0);
	$header['important_colors']	= dword(0);

	if ($filename)
	{
	    $f = fopen($filename, "wb");
	    foreach ($header AS $h)
	    {
	    	fwrite($f, $h);
	    }
	    
		//save pixels
		for ($y=$hei-1; $y>=0; $y--)
		{
			for ($x=0; $x<$wid; $x++)
			{
				$rgb = imagecolorat($img, $x, $y);
				fwrite($f, byte3($rgb));
			}
			fwrite($f, $wid_pad);
		}
		fclose($f);
	}
	else
	{
	    foreach ($header AS $h)
	    {
	    	echo $h;
	    }
	    
		//save pixels
		for ($y=$hei-1; $y>=0; $y--)
		{
			for ($x=0; $x<$wid; $x++)
			{
				$rgb = imagecolorat($img, $x, $y);
				echo byte3($rgb);
			}
			echo $wid_pad;
		}
	}
}

function imagecreatefrombmp($filename)
{
    $f = fopen($filename, "rb");

	//read header    
    $header = fread($f, 54);
    $header = unpack(	'c2identifier/Vfile_size/Vreserved/Vbitmap_data/Vheader_size/' .
						'Vwidth/Vheight/vplanes/vbits_per_pixel/Vcompression/Vdata_size/'.
						'Vh_resolution/Vv_resolution/Vcolors/Vimportant_colors', $header);

    if ($header['identifier1'] != 66 or $header['identifier2'] != 77)
    {
    	die('Not a valid bmp file');
    }
    
    if ($header['bits_per_pixel'] != 24)
    {
    	die('Only 24bit BMP images are supported');
    }
    
    $wid2 = ceil((3*$header['width']) / 4) * 4;
	
    $wid = $header['width'];
    $hei = $header['height'];

    $img = imagecreatetruecolor($header['width'], $header['height']);

	//read pixels    
    for ($y=$hei-1; $y>=0; $y--)
    {
		$row = fread($f, $wid2);
		$pixels = str_split($row, 3);
    	for ($x=0; $x<$wid; $x++)
    	{
    		imagesetpixel($img, $x, $y, dwordize($pixels[$x]));
    	}
    }
	fclose($f);    	    
	
	return $img;
}	

function dwordize($str)
{
	$a = ord($str[0]);
	$b = ord($str[1]);
	$c = ord($str[2]);
	return $c*256*256 + $b*256 + $a;
}

function byte3($n)
{
	return chr($n & 255) . chr(($n >> 8) & 255) . chr(($n >> 16) & 255);	
}
function dword($n)
{
	return pack("V", $n);
}
function word($n)
{
	return pack("v", $n);
}





// Adam Khoury PHP Image Function Library 1.0, bmp support added by Walky
// ----------------------- RESIZE FUNCTION -----------------------
// Function for resizing any jpg, gif, png or bmp image files
function ak_img_resize($target, $newcopy, $w, $h, $ext, $use_letterbox) {
    $img = "";
    $ext = strtolower($ext);

    if ($ext == "gif"){ 
      $img = imagecreatefromgif($target);
    }else if($ext == "png"){ 
      $img = imagecreatefrompng($target);
    }else if($ext == "bmp"){ 
      $img = imagecreatefrombmp($target);
    }else{ 
      $img = imagecreatefromjpeg($target);
    }

    $source_width   = imagesx($img); 
    $source_height  = imagesy($img); 
    $source_ratio   = $source_width / $source_height; 
    $destination_ratio = $w / $h; 
    
    if ($use_letterbox == 'no'){
        
      $destination_x = 0;
      $destination_y = 0;
      $source_x = 0; 
      $source_y = 0; 
      $new_destination_width = $source_width;
      $new_destination_height = $source_height;
      
      //$destination_image = imagecreatetruecolor($destination_width, $destination_height); 
      $tci = imagecreatetruecolor($source_width , $source_height);
      
    } else {
    
      // letterbox 
		if ($source_ratio < $destination_ratio) { 
          // source has a taller ratio 
          $temp_width = (int)($h * $source_ratio); 
          $temp_height = $h; 
          $destination_x = (int)(($w - $temp_width) / 2); 
          $destination_y = 0; 
		} else { 
          // source has a wider ratio 
          $temp_width = $w; 
          $temp_height = (int)($w / $source_ratio); 
          $destination_x = 0; 
          $destination_y = (int)(($h - $temp_height) / 2); 
		} 
     
		$source_x = 0; 
		$source_y = 0; 
		$new_destination_width = $temp_width; 
		$new_destination_height = $temp_height; 
		
		
		//$destination_image = imagecreatetruecolor($destination_width, $destination_height); 
		$tci = imagecreatetruecolor($w, $h);
    
    }
    // sets background to white
    $white = imagecolorallocate($tci, 255, 255, 255);
    imagefill($tci, 0, 0, $white);    
    
    // imagecopyresampled(dst_img, src_img, dst_x, dst_y, src_x, src_y, dst_w, dst_h, src_w, src_h)
    //imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    imagecopyresampled($tci, $img, $destination_x, $destination_y, $source_x, $source_y, $new_destination_width, $new_destination_height, $source_width, $source_height); 
    //imagecopyresampled($tci, $img, 0, 0, 0, 0, $w, $h, $w_orig, $h_orig);
    
    if ($ext == "gif"){ 
        imagegif($tci, $newcopy);
    } else if($ext =="png"){ 
        imagepng($tci, $newcopy);
    } else if($ext =="bmp"){ 
        imagebmp($tci, $newcopy);
    } else { 
        imagejpeg($tci, $newcopy, 84);
    }
}
// ------------------ IMAGE CONVERT FUNCTION -------------------
// Function for converting GIFs and PNGs to JPG upon upload
function ak_img_convert_to_jpg($target, $newcopy, $ext) {
    list($w_orig, $h_orig) = getimagesize($target);
    $ext = strtolower($ext);
    $img = "";
    if ($ext == "gif"){ 
        $img = imagecreatefromgif($target);
    } else if($ext == "png"){ 
        $img = imagecreatefrompng($target);
    } else if($ext == "bmp"){ 
        $img = imagecreatefrombmp($target);
    }
    $tci = imagecreatetruecolor($w_orig, $h_orig);
    //$tci = imagecreatetruecolor(400, 400);

    // sets background to red
    $red = imagecolorallocate($tci, 255, 255, 255);
    imagefill($tci, 0, 0, $red);
    
    //echo $img;
    //exit;    

    imagecopyresampled($tci, $img, 0, 0, 0, 0, $w_orig, $h_orig, $w_orig, $h_orig);
    imagejpeg($tci, $newcopy, 92);
}





function main_resizer($newFileName, $maxHeight, $maxWidth, $folder, $use_letterbox){
  // Access the $_FILES global variable for this specific file being uploaded
  // and create local PHP variables from the $_FILES array of information
  $fileName = $_FILES["uploaded_file"]["name"]; // The file name
  $fileTmpLoc = $_FILES["uploaded_file"]["tmp_name"]; // File in the PHP tmp folder
  $fileType = $_FILES["uploaded_file"]["type"]; // The type of file it is
  $fileSize = $_FILES["uploaded_file"]["size"]; // File size in bytes
  $fileErrorMsg = $_FILES["uploaded_file"]["error"]; // 0 for false... and 1 for true
  $fileName = preg_replace('#[^a-z.0-9]#i', '', $fileName); // filter the $filename
  $kaboom = explode(".", $fileName); // Split file name into an array using the dot
  $fileExt = end($kaboom); // Now target the last array element to get the file extension
  
  // START PHP Image Upload Error Handling --------------------------------
  if (!$fileTmpLoc) { // if file not chosen
      echo "ERROR: Please browse for a file before clicking the upload button.";
      exit();
  } else if($fileSize > 5242880) { // if file size is larger than 5 Megabytes
      echo "ERROR: Your file was larger than 5 Megabytes in size.";
      unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
      exit();
  } else if (!preg_match("/.(gif|jpg|jpeg|png|bmp)$/i", $fileName) ) {
       // This condition is only if you wish to allow uploading of specific file types    
       echo "ERROR: Your image was not .gif, .jpg, .png or .bmp.";
       unlink($fileTmpLoc); // Remove the uploaded file from the PHP temp folder
       exit();
  } else if ($fileErrorMsg == 1) { // if file upload error key is equal to 1
      echo "ERROR: An error occured while processing the file. Try again.";
      exit();
  }
  // END PHP Image Upload Error Handling ----------------------------------
  // Place it into your "uploads" folder now using the move_uploaded_file() function
  $folder_upload = $folder . "/" . $fileName;
  $moveResult = move_uploaded_file($fileTmpLoc, $folder_upload);
  // Check to make sure the move result is true before continuing
  if ($moveResult != true) {
      echo "ERROR: File not uploaded. Try again.";
      exit();
  }
  
  // ---------- Start Adams Universal Image Resizing Function --------
  $target_file = "$folder/$fileName";
  $resized_file = "$folder/$newFileName";
  $wmax = $maxWidth;
  $hmax = $maxHeight;
  ak_img_resize($target_file, $resized_file, $wmax, $hmax, $fileExt, $use_letterbox);
  // ----------- End Adams Universal Image Resizing Function ----------
  
  // ---------- Start Adams Convert to JPG Function --------
  //if (strtolower($fileExt) != "jpg") {
  $fileExt = strtolower($fileExt);
  $fileExt = ($fileExt=='jpeg') ? 'jpg' : $fileExt;//AF:Specially trick for jpeg images
  if ($fileExt != "jpg") {
    $target_file = "$folder/$newFileName";
    $new_jpg = "$folder/$newFileName.jpg";
    ak_img_convert_to_jpg($target_file, $new_jpg, $fileExt);
  }
  // ----------- End Adams Convert to JPG Function -----------
  
  $ori_file   = $folder."/".$fileName;
  $ori_name   = $folder."/".$newFileName;
  $new_name   = $folder."/".$newFileName.".".$fileExt;

  rename($ori_name, $new_name);
  //unlink("$folder/".$newFileName);
  

  //Delete original files
  unlink($ori_file);   
  if($fileExt<>'jpg'){
    //unlink($new_name);   
  }  

/*
  // Display things to the page so you can see what is happening for testing purposes
  echo "The file named <strong>$fileName</strong> uploaded successfuly.<br>";
  echo "It is <strong>$fileSize</strong> bytes in size.<br>";
  echo "It is an <strong>$fileType</strong> type of file.<br>";
  echo "The file extension is <strong>$fileExt</strong><br>";
  echo "The Error Message output for this upload is: $fileErrorMsg";
*/
}





?>