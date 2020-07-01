<?php

	$producto_id = $_GET['producto_id'];
	//echo "<br> producto_id : ".$producto_id;
	
	$SQL_PRODUCTDETAIL = "SELECT * FROM productos WHERE producto_id = $producto_id";
	//echo"<br> SQL_PRODUCTDETAIL : ".$SQL_PRODUCTDETAIL;
	$result_product = mysql_query($SQL_PRODUCTDETAIL);
	$count_rows_product = mysql_num_rows($result_product);
	
	if($count_rows_product > 0) {
		while($row_product = mysql_fetch_assoc($result_product)) { 
		
			$producto_codigo		= $row_product[producto_codigo];
			$producto_marca			= $row_product[producto_marca];
			$producto_nombre		= $row_product[producto_nombre];
			$producto_descripcion	= $row_product[producto_descripcion];
			$producto_precio		= $row_product[producto_precio];
			$categoria_id			= $row_product[categoria_id];
			$activo					= $row_product[activo];
			$producto_clase			= $row_product[producto_clase];
		}
	} else {
		//echo "no hay producto..";
	}
	
	

?>
		<!-- Go to www.addthis.com/dashboard to customize your tools -->
		<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-527800c46625b03e" async="async"></script>
		
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
			var js, fjs = d.getElementsByTagName(s)[0];
			if (d.getElementById(id)) return;
			js = d.createElement(s); js.id = id;
			js.src = "//connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v2.0";
			fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script>
		
		<div class="row" style="color:#057398; font-size:25px; font-weight: bold;">
			<?=$producto_nombre;?>
		</div>
		<div class="row">
		
			<div class="col-sm-5">
				
				<div class="row">
					<div class="col-md-12">
					
						<?php
							$SQL_SELECT_IMAGEPRODUCT = "SELECT * FROM control_images WHERE producto_id = ".$producto_id." AND imagen_tipo = 'product' AND imagen_tag = 'on' ORDER BY image_id DESC LIMIT 1";
							//echo"<br>SQL_SELECT_IMAGEPRODUCT : ".$SQL_SELECT_IMAGEPRODUCT;
							$result_imageproduct = mysql_query($SQL_SELECT_IMAGEPRODUCT);
							$count_imageproduct = mysql_num_rows($result_imageproduct);
							if($count_imageproduct > 0) {
								while( $row_imageproduct = mysql_fetch_assoc( $result_imageproduct ) ) {
									$image_id_product	= $row_imageproduct[image_id];
									$image_name_product	= $row_imageproduct[imagen_nombre];
									$image_tag_product	= $row_imageproduct[imagen_tag];
								?>
								<a class="thumbnail">
									<?php
									if( file_exists ( "upload_images/productos/product_".$image_name_product."" ) ) {?>
										<img src="upload_images/productos/product_<?php echo $image_name_product?>" class="img-responsive" alt="<?php echo $producto_nombre?>"  width="400" height="400" />
									<?} else {?>
										<img  src="img/default_insucomp.jpg" class="img-responsive" alt="<?php echo $producto_nombre?>" width="400" height="400" />
									<?}?>
								</a>
								<?php
								}
							} else {
								
							}
						?>
						
					</div>
				</div>
				
				<div class="row">
					<?php
							$SQL_SELECT_IMAGEPRODUCT_tumb = "SELECT * FROM control_images WHERE producto_id = ".$producto_id." AND imagen_tipo = 'product' ORDER BY image_id DESC";
							//echo"<br>SQL_SELECT_IMAGEPRODUCT_tumb : ".$SQL_SELECT_IMAGEPRODUCT_tumb;
							$result_imageproduct_tumb = mysql_query($SQL_SELECT_IMAGEPRODUCT_tumb);
							$count_imageproduct_tumb = mysql_num_rows($result_imageproduct_tumb);
							if($count_imageproduct_tumb > 0) {
								while( $row_imageproduct_tumb = mysql_fetch_assoc( $result_imageproduct_tumb ) ) {
									$image_id_product_tumb		= $row_imageproduct_tumb[image_id];
									$image_name_product_tumb	= $row_imageproduct_tumb[imagen_nombre];
									$image_tag_product_tumb		= $row_imageproduct_tumb[imagen_tag];
						
									if( file_exists ( "upload_images/productos/product_".$image_name_product_tumb."" ) ) {?>
										<div class="col-md-3">
											<img  class="thumbnail" src="upload_images/productos/product_<?php echo $image_name_product_tumb?>" alt="<?php echo $producto_nombre?>" title="<?php echo $image_name_product?>" width="120" height="120">
										</div>
									<?} else {?>
										<div class="col-md-3">
											<img class="thumbnail" src="img/default_insucomp.jpg" alt="<?php echo $producto_nombre?>" title="<?php echo $image_name_product_tumb?>" width="120" height="120">
										</div>
									<?}?>
								<?php
								}
							} else {
								
							}
						?>
				</div>
				
			</div>
			
			<div class="col-sm-7" style="color:#057398;">
			
				<div class="product-title" style="font-size:17px;">
					Marca: <?=$producto_marca;?>
				</div>
				<div class="product-title" style="font-size:17px;">
					Codigo: <?=$producto_codigo;?>
				</div>
				<div class="product-desc" style="font-size:14px;">
					<?php
						if($producto_descripcion <> ''){
							echo $producto_descripcion;
						}else{
							echo "Sin descripción por razones de proteción de derechos de autor.";
						}
					?>
				</div>
				
				<div class="product-price" style="font-size:14px; font-weight:bold;">
					<?
						if($producto_precio <> '' OR $producto_precio == '0'){
							echo "$: ".number_format($producto_precio);
						}else{
							echo"Consulte Precio";
						}
					?>
				</div>
				
				<br>
				<br>
				<br>
				<div class="row">
					<!-- Go to www.addthis.com/dashboard to customize your tools -->
					<div class="addthis_native_toolbox"></div>
					<hr>
					<span style="font-size:17px;">Comentarios</span>
					<hr>
					<div class="fb-comments" data-href="http://insucomp.nexzaid.net/product.php?producto_id=<?=$producto_id;?>" data-numposts="5" data-colorscheme="light"></div>
					<hr>
				</div>
			</div>
		</div>