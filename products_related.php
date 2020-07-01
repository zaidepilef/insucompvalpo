<?php
	
	
	$SQL_CATEGORIA_REL = "SELECT * FROM categorias WHERE categoria_id = $categoria_id";
	//echo"<br> SQL_CATEGORIA_REL : ".$SQL_CATEGORIA_REL;
	$result_categoria_rel = mysql_query($SQL_CATEGORIA_REL);
	$count_rows_categoria_rel = mysql_num_rows($result_categoria_rel);
	
	if($count_rows_categoria_rel > 0) {
		while($row_categoria_rel = mysql_fetch_assoc($result_categoria_rel)) { 
			$linea_id			= $row_categoria_rel[linea_id];
			$categoria_nombre	= $row_categoria_rel[categoria_nombre];
		}
	} else {
		//echo "no hay producto..";
	}
	
	$SQL_PRODUCTDETAIL_REL = "SELECT * FROM productos WHERE categoria_id = $categoria_id AND activo = 1 ORDER BY rand() LIMIT 6";
	//echo"<br> SQL_PRODUCTDETAIL_REL : ".$SQL_PRODUCTDETAIL_REL;
	$result_product_rel = mysql_query($SQL_PRODUCTDETAIL_REL);
	$count_rows_product_rel = mysql_num_rows($result_product_rel);

?>


<div class="row">
	<h3>Productos Relacionados con <?=$categoria_nombre;?></h3>
</div>
<div class="row">
	<?
	if($count_rows_product_rel > 0) {
		while($row_product_rel = mysql_fetch_assoc($result_product_rel)) { 
		
			$producto_id_rel			= $row_product_rel[producto_id];
			$producto_marca_rel			= $row_product_rel[producto_marca];
			$producto_nombre_rel		= $row_product_rel[producto_nombre];
			$producto_descripcion_rel	= $row_product_rel[producto_descripcion];
			$producto_precio_rel		= $row_product_rel[producto_precio];
			$categoria_id_rel			= $row_product_rel[categoria_id];
			$activo_rel					= $row_product_rel[activo];
			$producto_clase_rel			= $row_product_rel[producto_clase];
			?>
			<div class="col-sm-4">
				<div class="col-item">
					<div class="photo">
						<?php
							$SQL_SELECT_IMAGEPRODUCT_REL = "SELECT * FROM control_images WHERE producto_id = ".$producto_id_rel." AND imagen_tipo = 'product' AND imagen_tag = 'on' ORDER BY image_id DESC LIMIT 1";
							//echo"<br>SQL_SELECT_IMAGEPRODUCT_REL : ".$SQL_SELECT_IMAGEPRODUCT_REL;
							$result_imageproduct_rel = mysql_query($SQL_SELECT_IMAGEPRODUCT_REL);
							$count_imageproduct_rel = mysql_num_rows($result_imageproduct_rel);
							if($count_imageproduct_rel > 0) {
								while( $row_imageproduct_rel = mysql_fetch_assoc( $result_imageproduct_rel ) ) {
									$image_id_product_rel		= $row_imageproduct_rel[image_id];
									$image_name_product_rel		= $row_imageproduct_rel[imagen_nombre];
									$image_tag_product_rel		= $row_imageproduct_rel[imagen_tag];
								?>
								<a href="product.php?producto_id=<?php echo $producto_id_rel;?>">
									<?php
									if( file_exists ( "upload_images/productos/product_".$image_name_product_rel."" ) ) {?>
										<img src="upload_images/productos/product_<?php echo $image_name_product_rel?>" class="img-responsive" alt="<?php echo $producto_nombre_rel?>" />
									<?} else {?>
										<img src="upload_images/productos/product_<?php echo $image_name_product_rel?>" class="img-responsive" alt="<?php echo $producto_nombre_rel?>" />
									<?}?>
								</a>
								<?php
								}
							} else {
								
							}
						?>
					</div>
					<div class="info">
						<div class="row">
							<div class="price col-md-12">
								<h5><?=$producto_nombre_rel?></h5>
								<h5 class="price-text-color">
									<?
									if($producto_precio <> '' OR $producto_precio == '0'){
										echo number_format($producto_precio);
									}else{
										echo"Consulte Precio";
									}
									?>
								</h5>
							</div>
						</div>
						<div class="separator clear-left">
							
							<p class="btn-details">
								<i class="fa fa-list"></i>
								<a href="product.php?producto_id=<?=$producto_id_rel;?>" class="hidden-sm">Más detalles</a>
							</p>
						</div>
						<div class="clearfix">
						</div>
					</div>
				</div>
			</div>
			
			<?
		}
	} else {
		//echo "no hay producto..";
	}
	?>
	
	
</div>