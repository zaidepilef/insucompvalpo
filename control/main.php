<?php
	//error_reporting(0);
	session_start();
	
	include"config/ini_config.php";
	include"config/config.php";

	$action = $_GET['action'];
	

?>

<!DOCTYPE html>
<html>
<head>
	<title>Admin Insucomp-Valpo</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script type="text/javascript" src="js/jquery.min.js"></script>
	<script type="text/javascript" src="js/bootstrap.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	
	<link type="text/css" rel="stylesheet" href="css/bootstrap.css">
	<link type="text/css" rel="stylesheet" href="css/bootstrap.min.css">
	
</head>
<body>
	<?php include "includes/header.php"; ?>
	<div class="container">
		
	
		
		<div class="row">
			<ul class="nav nav-pills">
				<li class="active"><a href="main.php"></i>Inicio</a></li>
				<li class="active"><a href="main.php?action=products">Productos</a></li>
				<li class="active"><a href="main.php?action=category">categorias</a></li>
				<li class="active"><a href="main.php?action=line">lineas</a></li>
			</ul>
		</div>

		<div class="row">
				<?php
				//echo "<br>action : ".$action;
				switch ($action) {
					case '':
						include "home.php";
					break;

					case 'products':
						include "products.php";
					break;
					
					case 'product_edit':
						include "product_edit.php";
					break;
					
					case 'category':	
						include "category.php";
					break;
					
					case 'category_edit':	
						include "category_edit.php";
					break;
					
					case 'line':	
						include "line.php";
					break;
					
					case 'line_edit':	
						include "line_edit.php";
					break;
					
					

				}?>
		</div>
	</div>
	<?php include "../footer.php";?>
	
</body>
</html>