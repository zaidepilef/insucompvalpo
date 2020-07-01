<?
session_start();

include "../mysql.php";
include "includes/engine.php";

$product_id = mysqli_real_escape_string($link, $_GET['product_id']);
$img_prefix = mysqli_real_escape_string($link, $_GET['img_prefix']);

include "../includes/languages/".$user_language.".php";

$img_1 = ($_GET['img_1'] == '') ? $img_prefix."_1" : $_GET['img_1'];
$img_2 = ($_GET['img_2'] == '') ? $img_prefix."_2" : $_GET['img_2'];
$img_3 = ($_GET['img_3'] == '') ? $img_prefix."_3" : $_GET['img_3'];
$img_4 = ($_GET['img_4'] == '') ? $img_prefix."_4" : $_GET['img_4'];

$img_1 = mysqli_real_escape_string($link, $img_1);
$img_2 = mysqli_real_escape_string($link, $img_2);
$img_3 = mysqli_real_escape_string($link, $img_3);
$img_4 = mysqli_real_escape_string($link, $img_4);

$isImgToUpload_1 = "yes";
$isImgToUpload_2 = "yes";
$isImgToUpload_3 = "yes";
$isImgToUpload_4 = "yes";

$image_1 = "https://www.mallfix.com/facebook/images/upload_image.png";
$image_2 = "https://www.mallfix.com/facebook/images/upload_image.png";
$image_3 = "https://www.mallfix.com/facebook/images/upload_image.png";
$image_4 = "https://www.mallfix.com/facebook/images/upload_image.png";

if ($img_prefix == ''){
  $path_img_1 = "../uploads_images/".$img_1.".jpg";
  $path_img_2 = "../uploads_images/".$img_2.".jpg";
  $path_img_3 = "../uploads_images/".$img_3.".jpg";
  $path_img_4 = "../uploads_images/".$img_4.".jpg";
} else {
  $path_img_1 = "../uploads_images/".$img_prefix."_1.jpg";
  $path_img_2 = "../uploads_images/".$img_prefix."_2.jpg";
  $path_img_3 = "../uploads_images/".$img_prefix."_3.jpg";
  $path_img_4 = "../uploads_images/".$img_prefix."_4.jpg";
}



if (file_exists($path_img_1)){
  $image_1 = $path_img_1;
  $isImgToUpload_1 = "no";
}

if (file_exists($path_img_2)){
  $image_2 = $path_img_2;
  $isImgToUpload_2 = "no";
}

if (file_exists($path_img_3)){
  $image_3 = $path_img_3;
  $isImgToUpload_3 = "no";
}

if (file_exists($path_img_4)){
  $image_4 = $path_img_4;
  $isImgToUpload_4 = "no";
}

?>

<style>
.footer_detail_hover{
	font-family: "Lucida Grande",Helvetica,Verdana,Arial,sans-serif;
	font-size: 12px;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	font-variant: normal;
	color: #555555;
	text-decoration: none;
}

.footer_detail_hover a:hover{
	font-family: "Lucida Grande",Helvetica,Verdana,Arial,sans-serif;
	font-size: 12px;
	font-style: normal;
	line-height: normal;
	font-weight: normal;
	font-variant: normal;
	color: #4fa1e6;
	text-decoration: none;
}
</style>
<link rel="stylesheet" href="https://www.mallfix.com/css/main.css" type="text/css" media="screen" />

	<script>
		function autocall(){
			document.upload_image.submit();
		}

		function handleUpload(sImageNumber){
			//alert(sImageNumber);
			document.upload_image.uploaded_file.click();
			document.upload_image.image_number.value = sImageNumber;
			//document.getElementById("image_number").value = sImageNumber;
		}
	</script>

	<body style="margin:0px;">
		<form name='upload_image' enctype="multipart/form-data" method="post" action="image_resizer">
			<input name='shop_id' type='hidden' value='<?=$shop_id;?>'>
			<input name='product_id' type='hidden' value='<?=$product_id;?>'>
			<input name='img_prefix' type='hidden' value='<?=$img_prefix;?>'>
			<input name='image_number' type='hidden' value='1'>
			<input name="uploaded_file" type="file" style="display:none;" onchange="javascript:autocall();"/>

			<table border='0' cellpadding="2" cellspacing="2">
				<tr>
					<td width='75px'>
					<?if($isImgToUpload_1 == "yes"){?>
						<div onclick="handleUpload('1');" style="cursor:pointer; width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}else{?>
						<div style="width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}?>
							<img src="<?echo $image_1;?>" width='74px'>
						</div>
					</td>
					<?if(is_numeric($shop_plan_id) AND $shop_plan_id > 0){?>
					<td width='75px'>
					<?if($isImgToUpload_2 == "yes"){?>
						<div onclick="handleUpload('2');" style="cursor:pointer; width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}else{?>
						<div style="width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}?>
							<img src="<?echo $image_2;?>" width='74px'>
						</div>
					</td>
					<td width='75px'>
					<?if($isImgToUpload_3 == "yes"){?>
						<div onclick="handleUpload('3');" style="cursor:pointer; width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}else{?>
						<div style="width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}?>
							<img src="<?echo $image_3;?>" width='74px'>
						</div>
					</td>
					<td width='75px'>
					<?if($isImgToUpload_4 == "yes"){?>
						<div onclick="handleUpload('4');" style="cursor:pointer; width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}else{?>
						<div style="width:74px; height:74px; display:table-cell; vertical-align:middle;">
					<?}?>
							<img src="<?echo $image_4;?>" width='74px'>
						</div>
					</td>
				<?} else {?>
					<td width='10px'>
					</td>
					<td align='center'>
				 
					</td>
				<?}?>
				</tr>

				<tr>
					<td width='75px' align='center' class='footer_detail_hover'><a href='delete_uploaded_image?shop_id=<?=$shop_id;?>&product_id=<?=$product_id;?>&img_prefix=<?=$img_prefix;?>&img=<?=$img_1;?>' class='footer_detail_hover'><?=ADMIN_DELETE;?></a></td>
					<?if(is_numeric($shop_plan_id) AND $shop_plan_id > 0){?>
					<td align='center' class='footer_detail_hover'><a href='delete_uploaded_image?shop_id=<?=$shop_id;?>&product_id=<?=$product_id;?>&img_prefix=<?=$img_prefix;?>&img=<?=$img_2;?>' class='footer_detail_hover'><?=ADMIN_DELETE;?></a>&nbsp;</td>
					<td align='center' class='footer_detail_hover'><a href='delete_uploaded_image?shop_id=<?=$shop_id;?>&product_id=<?=$product_id;?>&img_prefix=<?=$img_prefix;?>&img=<?=$img_3;?>' class='footer_detail_hover'><?=ADMIN_DELETE;?></a>&nbsp;</td>
					<td align='center' class='footer_detail_hover'><a href='delete_uploaded_image?shop_id=<?=$shop_id;?>&product_id=<?=$product_id;?>&img_prefix=<?=$img_prefix;?>&img=<?=$img_4;?>' class='footer_detail_hover'><?=ADMIN_DELETE;?></a>&nbsp;</td>
				<?} else {?>
					<td class='text_dark' width='225px'>
						<div style='top:22px; left:85px; position:absolute; width:210px; text-align:center;'><?=ADMIN_MAX_PHOTOS_1;?> <a class='top_menu' style="text-decoration: none;" target="_top" href='plan?shop_id=<?=$shop_id;?>'><?=ADMIN_MAX_PHOTOS_2;?></a>.
					</td>
				<?}?>
				</tr>
			</table>
    
			<br><br>
		</form>
	</body>