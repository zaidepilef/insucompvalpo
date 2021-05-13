<?php
	include"config/funciones.php";
	include"config/ini_config.php";
	
	$shop_id			= $_POST['shop_id'];
	
	$client_id			= $_POST['client_id'];
	
	$shop_name			= $_POST['shop_name'];
	if($shop_name == ''){ header("Location:main.php?action=create_shop&client_id=$client_id&error=4"); exit;}
	
	$rubro_id			= $_POST['rubro_id'];
	if($rubro_id == ''){ header("Location:main.php?action=create_shop&client_id=$client_id&error=3"); exit;}
	
	$shop_address		= $_POST['shop_address'];
	if($shop_address == ''){ header("Location:main.php?action=create_shop&client_id=$client_id&error=5"); exit;}
	
	$shop_city			= $_POST['shop_city'];
	if($shop_city == ''){ header("Location:main.php?action=create_shop&client_id=$client_id&error=6"); exit;}
	//echo"<br>shop_city : ".$shop_city;
	
	$shop_phone			= $_POST['shop_phone'];
	//echo"<br>shop_phone : ".$shop_phone;
	
	$shop_email			= $_POST['shop_email'];
	//echo"<br>shop_email : ".$shop_email;
	
	$shop_web			= $_POST['shop_web'];
	//echo"<br>shop_web : ".$shop_web;
	
	$shop_map			= html_entity_decode($_POST['shop_map']);
	//echo"<br>shop_map : ".$shop_map;
	
	$shop_description	= $_POST['shop_description'];
	//if($shop_description == ''){ header("Location:main.php?action=create_shop&client_id=$client_id&error=7"); exit;}
	
	$form_action 		= $_POST['form_action'];
	//echo"<br>form_action : ".$form_action;
	
	$shop_mode			= $_POST['shop_mode'];
	//echo"<br>shop_mode : ".$shop_mode;
	
	if($form_action == 'create_shop') {
		//Select Client
		$SQL_QUERY_SHOP = "SELECT * FROM shops_pyme WHERE shop_name = '$shop_name' AND client_id = $client_id";
		//echo"<br>SQL_QUERY_SHOP : ".$SQL_QUERY_SHOP;

		$result_query_shop = mysql_query($SQL_QUERY_SHOP);
		$total_shop = mysql_num_rows($result_query_shop);
		
		if( $total_shop > 0 ) {

			//echo"mal :(";
			header("Location:main.php?action=create_shop&client_id=$client_id&error=1");
			exit;

		} else {

			//INSERT
			$SQL_INSERT_SHOP = "INSERT INTO shops_pyme 
  			(client_id, 
			shop_name, 
			rubro_id, 
			shop_address, 
			shop_city, 
			shop_phone,
			shop_email,
			shop_web,
			shop_mode,
			shop_map,
			shop_description) 
  			VALUES
			(
			$client_id,
			'$shop_name',
			$rubro_id,
			'$shop_address',
			'$shop_city',
			'$shop_phone',
			'$shop_email',
			'$shop_web',
			'$shop_mode',
			'$shop_map',
			'$shop_description'
			)";
			//echo "<br>SQL_INSERT_SHOP : ".$SQL_INSERT_SHOP;
			mysql_query($SQL_INSERT_SHOP);
			
			header("Location:main.php?action=shop");
			exit;
		}
		
	} elseif($form_action == 'edit_shop') {	
		//Select Client
		$SQL_QUERY_SHOP = "SELECT * FROM shops_pyme WHERE shop_id = $shop_id";
		//echo"<br>SQL_QUERY_SHOP : ".$SQL_QUERY_SHOP;
		//exit;
		$result_query_shop = mysql_query($SQL_QUERY_SHOP);
		$total_shop = mysql_num_rows($result_query_shop);
		
		if( $total_shop == 1 ) {

			//UPDATE
			$SQL_UPDATE_SHOP = "UPDATE shops_pyme SET 
				shop_name 		= '$shop_name',
				rubro_id		= $rubro_id,
				shop_address 	= '$shop_address',
				shop_city 		= '$shop_city',
				shop_phone 		= '$shop_phone',
				shop_email 		= '$shop_email',
				shop_web 		= '$shop_web',
				shop_mode 		= '$shop_mode',
				shop_map 		= '$shop_map',
				shop_description = '$shop_description'
			WHERE shop_id 	= $shop_id";
			//echo "<br> SQL_UPDATE_SHOP : ".$SQL_UPDATE_SHOP;
			
			mysql_query($SQL_UPDATE_SHOP);
			//exit;
			header("Location:main.php?action=shop");
			exit;
			
		} else {
	
			header("Location:main.php?action=shop_edit&shop_id=$shop_id&error=2");
			exit;

		}

	}else{
		header("Location:main.php");
		exit;
	}

?>