<?php
	include "control/config/ini_config.php";
	
	$buscar = $_POST['buscar'];
	
	$SELECT_SEARCH_PRODUCTS = "
		SELECT * FROM productos 
		WHERE ( 
			producto_marca LIKE '%$buscar%'
		OR 
			producto_nombre LIKE '%$buscar%'
		OR 
			producto_descripcion LIKE '%$buscar%')
		AND 
			activo = 1
		";
	//echo"<br>SELECT_SEARCH_PRODUCTS : ".$SELECT_SEARCH_PRODUCTS;
	$result_products = mysql_query($SELECT_SEARCH_PRODUCTS);
	$count_rows_products = mysql_num_rows($result_products);
	
	
	/*
	$SELECT_SEARCH_CATEGORIES = "
		SELECT * FROM 
			categorias 
		WHERE 
			categoria_nombre LIKE '%$buscar%'";
	echo"<br>SELECT_SEARCH_CATEGORIES : ".$SELECT_SEARCH_CATEGORIES;
	$result_categories = mysql_query($SELECT_SEARCH_CATEGORIES);
	$count_rows_categories = mysql_num_rows($result_categories);
	if($count_rows_categories > 0){
		while($row_category = mysql_fetch_assoc($result_products)) { 
			$categoria_id		= $row_category['categoria_id'];
			$categoria_nombre	= $row_category['categoria_nombre'];
		}
	}
	*/
	
?>
<!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?=$categoria_nombre;?> Insucomp-Valpo</title>

		<!-- Bootstrap -->
		<link href="css/bootstrap.css" rel="stylesheet">
		<link href="css/alter.css" rel="stylesheet">
		<link href="css/left_menu.css" rel="stylesheet">
		
		<link href="css/font-awesome.min.css" rel="stylesheet">
		<script src="js/jquery.min.js"></script>
		<script src="js/bootstrap.min.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
		<script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
	
		<link type="text/css" rel="stylesheet" href="control/libs/data_tables/css/jquery.dataTables.css">
		<script type="text/javascript" src="control/libs/data_tables/js/jquery.dataTables.js"></script>
		<script type="text/javascript">
			$(document).ready(function(){
				
				$("#datatables").dataTable(
				{
					 "aoColumns" : [
						{ sWidth: '10%' },
						{ sWidth: '10%' },
						{ sWidth: '30%' },
						{ sWidth: '20%' },
						{ sWidth: '30%' }
					]  
				}
				);
				
				
			});
		</script>
	</head>
	<body>
		<img width="100%" src="img/banner.jpg">

		<?php include "navigation.php"; ?>
	
		<div class="container-fluid">
			<div class="col-md-3">
				<?php include "left_menu.php";?>
			</div>
			<div class="col-md-9">
				
				<h3>Resultado de la Busqueda <?php echo $buscar?></h3>
				<table id="datatables" class="display">
					<thead>
						<tr>
							<th></th>
							<th>Codigo</th>
							<th>Nombre Producto</th>
							<th>Marca Producto</th>
							<th>Descripcion</th>
						</tr>
					</thead>
			
					<tbody>
						<? if($count_rows_products > 0) {
							while($row_product = mysql_fetch_assoc($result_products)) { 
								$producto_id		= $row_product['producto_id'];
								$producto_codigo	= $row_product['producto_codigo'];
								$producto_nombre	= $row_product['producto_nombre'];
								$producto_marca		= $row_product['producto_marca'];
								$producto_descripcion		= $row_product['producto_descripcion'];
							?>
							<tr>
								<td>
									<?php
										$SQL_SELECT_IMAGEPRODUCT = "SELECT * FROM control_images WHERE producto_id = ".$producto_id." AND imagen_tipo = 'product' AND imagen_tag = 'on' ORDER BY image_id DESC LIMIT 1";
										//echo"<br>SQL_SELECT_IMAGEPRODUCT : ".$SQL_SELECT_IMAGEPRODUCT;
										$result_imageproduct = mysql_query($SQL_SELECT_IMAGEPRODUCT);
										$count_imageproduct = mysql_num_rows($result_imageproduct);
										if($count_imageproduct > 0) {
											while( $row_imageproduct = mysql_fetch_assoc( $result_imageproduct ) ) {
												$image_id_product		= $row_imageproduct['image_id'];
												$image_name_product		= $row_imageproduct['imagen_nombre'];
												$image_tag_product		= $row_imageproduct['imagen_tag'];
										?>
										<a href="product.php?producto_id=<?=$producto_id?>">
											<?php
												if( file_exists ( "upload_images/productos/product_".$image_name_product."" ) ) {?>
													<img class="img-responsive" src="upload_images/productos/product_<?php echo $image_name_product?>" alt="<?php echo $producto_nombre?>" />
											<?} else { ?>
													<img class="img-responsive" src="img/default_insucomp.jpg" class="img-responsive" alt="<?php echo $producto_nombre?>" />
											<? }?>
										</a>
										<?}?>
									<?}else{?>
										<a href="product.php?producto_id=<?=$producto_id?>">
											
											<img class="img-responsive" src="img/default_insucomp.jpg" alt="<?php echo $producto_nombre?>" />
											
										</a>
									
									
									<?}?>
								</td>
								<td><?=$producto_codigo;?></td>
								<td><?=$producto_nombre;?></td>
								<td><?=$producto_marca;?></td>
								<td><?=$producto_descripcion?></td>
								
							</tr>
							<?php } ?>
						<?php } else { ?>
							<span>No arrojo resultados</span>
						<?php }?>
					</tbody>
				</table>
				
			</div>
			
		</div>
		
		
		<div class="container">
			<?php include "footer.php"; ?>
		</div>
	</body>
</html>