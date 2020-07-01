<?php
	
	header('location:http://www.tienda.insucompvalpo.cl');
	//include "control/config/ini_config.php";
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Insucomp-Valpo</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/left_menu.css" rel="stylesheet">
		<link href="css/alter.css" rel="stylesheet">
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>
		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		
		<script type="text/javascript">var switchTo5x=true;</script>
		<script type="text/javascript" src="http://w.sharethis.com/button/buttons.js"></script>
		<script type="text/javascript">stLight.options({publisher: "03f16df7-57d0-400b-b9e5-b62da8552c37", doNotHash: false, doNotCopy: false, hashAddressBar: false});</script>
	
	</head>
	
	<body>
		<img width="100%" src="img/banner.jpg">

		<?php include "navigation.php"; ?>
		<div class="container-fluid">
			<div class="col-md-3">
				<?php include "left_menu.php";?>
			</div>
			<div class="col-md-9">
				<?php include "includes/slider_01.php"; ?>
				<div class="row">
					<span class='st_fblike_large' displayText='Facebook Like'></span>
					<span class='st_facebook_large' displayText='Facebook'></span>
					<span class='st_twitter_large' displayText='Tweet'></span>
					<span class='st_email_large' displayText='Email'></span>
				</div>
				<?php include "target.php"; ?>
			</div>
			
		
		
		</div>
		<div class="container">
			<?php include "footer.php"; ?>
		</div>
	</body>
</html>