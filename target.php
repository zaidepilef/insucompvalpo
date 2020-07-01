<?php

	
	
	
	
	
?>
<!--
<div class="container">
-->
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3>Productos Destacados</h3>
            </div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right">
                    <a class="left fa fa-chevron-left btn btn-success" href="#carousel-example" data-slide="prev"></a><a class="right fa fa-chevron-right btn btn-success" href="#carousel-example"data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
						<?php
							$SELECT_PRODUCT_TOP = "SELECT * FROM productos WHERE activo = 1 AND producto_clase = 'destacado' ORDER BY fecha_creacion DESC LIMIT 0,4";
							//echo"<br>SELECT_PRODUCT_TOP : ".$SELECT_PRODUCT_TOP;
							$result_products = mysql_query($SELECT_PRODUCT_TOP);
							$count_rows_products = mysql_num_rows($result_products);
							if($count_rows_products > 0) {
								while($row_products = mysql_fetch_assoc($result_products)) { 
									$producto_id 		= $row_products[producto_id];
									$producto_marca		= $row_products[producto_marca];
									$producto_nombre	= $row_products[producto_nombre];
									$producto_precio	= $row_products[producto_precio];
									$activo				= $row_products[activo];
									?>
									<div class="col-md-3">
										<div class="col-item">
											<div class="photo">
											
												<?php
												
												$SQL_SELECT_IMAGEPRODUCT = "SELECT * FROM control_images WHERE producto_id = ".$producto_id." AND imagen_tipo = 'product' AND imagen_tag = 'on' ORDER BY image_id DESC LIMIT 1";
												//echo"<br>SQL_SELECT_IMAGEPRODUCT : ".$SQL_SELECT_IMAGEPRODUCT;
												$result_imageproduct = mysql_query($SQL_SELECT_IMAGEPRODUCT);
												$count_imageproduct = mysql_num_rows($result_imageproduct);
												if($count_imageproduct > 0) {
													while( $row_imageproduct = mysql_fetch_assoc( $result_imageproduct ) ) {
														$image_id_product		= $row_imageproduct[image_id];
														$image_name_product		= $row_imageproduct[imagen_nombre];
														$image_tag_product		= $row_imageproduct[imagen_tag]; 
														
													?>
													<a href="product.php?producto_id=<?php echo $producto_id;?>">
														
														<?php
														if( file_exists ( "upload_images/productos/product_".$image_name_product."" ) ) {?>
															<img src="upload_images/productos/product_<?php echo $image_name_product?>" class="img-responsive" alt="<?php echo $producto_nombre?>" />
														<?} else { ?>
															<img src="img/default_insucomp.jpg" class="img-responsive" alt="<?php echo $producto_nombre?>" />
														<? }
													?>
													</a>
													<?php
													
													}
												} else {
										
												}?>
											
											</div>
											<div class="info">
												<div class="row">
													<div class="price col-md-12">
														<h5><?php echo $producto_nombre;?></h5>
														<?php if($producto_precio == '' or $producto_precio == '0'){?>
														<h5 class="price-text-color">Consulte cotización</h5>
														<?php } else {?>
														
														<h5 class="price-text-color">$<?php echo number_format($producto_precio);?></h5>
														<?php } ?>
														
													</div>
												</div>
												<div class="separator clear-left">
													
													<p class="btn-details">
														<i class="fa fa-list"></i>
														<a href="product.php?producto_id=<?php echo $producto_id;?>" class="hidden-sm">Más detalles</a>
													</p>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
										
									<?
								} 
							} else {
								
							}?>
							
					</div>
                </div>
                <div class="item">
                    <div class="row">
					<?php
							$SELECT_PRODUCT_TOP_2 = "SELECT * FROM productos WHERE activo = 1 AND producto_clase = 'destacado' ORDER BY fecha_creacion DESC LIMIT 4,4";
							//echo"<br>SELECT_PRODUCT_TOP_2 : ".$SELECT_PRODUCT_TOP_2;
							$result_products_2 = mysql_query($SELECT_PRODUCT_TOP_2);
							$count_rows_products_2 = mysql_num_rows($result_products_2);
							if($count_rows_products_2 > 0) {
								while($row_products_2 = mysql_fetch_assoc($result_products_2)) { 
									$producto_id_2 		= $row_products_2[producto_id];
									$producto_marca_2		= $row_products_2[producto_marca];
									$producto_nombre_2	= $row_products_2[producto_nombre];
									$producto_precio_2	= $row_products_2[producto_precio];
									$activo_2				= $row_products_2[activo];
									?>
									<div class="col-md-3">
										<div class="col-item">
											<div class="photo">
											
												<?php
												
												$SQL_SELECT_IMAGEPRODUCT_2 = "SELECT * FROM control_images WHERE producto_id = ".$producto_id_2." AND imagen_tipo = 'product' AND imagen_tag = 'on' ORDER BY image_id DESC LIMIT 1";
												//echo"<br>SQL_SELECT_IMAGEPRODUCT : ".$SQL_SELECT_IMAGEPRODUCT;
												$result_imageproduct_2 = mysql_query($SQL_SELECT_IMAGEPRODUCT_2);
												$count_imageproduct_2 = mysql_num_rows($result_imageproduct_2);
												if($count_imageproduct_2 > 0) {
													while( $row_imageproduct_2 = mysql_fetch_assoc( $result_imageproduct_2 ) ) {
														$image_id_product_2		= $row_imageproduct_2[image_id];
														$image_name_product_2		= $row_imageproduct_2[imagen_nombre];
														$image_tag_product_2		= $row_imageproduct_2[imagen_tag];
						
														?>
													<a href="product.php?producto_id=<?php echo $producto_id_2;?>">
														
														<?php
														if( file_exists ( "upload_images/productos/product_".$image_name_product_2."" ) ) {?>
															<img src="upload_images/productos/product_<?php echo $image_name_product_2?>" class="img-responsive" alt="<?php echo $producto_nombre?>" />
														<?} else { ?>
														
														<img src="img/default_insucomp.jpg" class="img-responsive" alt="<?php echo $producto_nombre_2?>" />
														<? }
													?>
													</a>
													<?php
													
													}
												} else {
										
												}?>
											
											</div>
											<div class="info">
												<div class="row">
													<div class="price col-md-12">
														<h5><?php echo $producto_nombre_2;?></h5>
														
														<?php if($producto_precio_2 == '' or $producto_precio_2 == '0'){?>
														<h5 class="price-text-color">Consulte cotización</h5>
														<?php } else { ?>
														
														<h5 class="price-text-color">$<?php echo number_format($producto_precio_2);?></h5>
														<?php }?>
													
													</div>
												</div>
												<div class="separator clear-left">
													
													<p class="btn-details">
														<i class="fa fa-list"></i>
														<a href="product.php?producto_id=<?php echo $producto_id_2;?>" class="hidden-sm">Más detalles</a>
													</p>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
										
									<?
								} 
							} else {
								
							}?>
						
					</div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="row">
            <div class="col-md-9">
                <h3>Productos Nuevos</h3>
			</div>
            <div class="col-md-3">
                <!-- Controls -->
                <div class="controls pull-right">
                    <a class="left fa fa-chevron-left btn btn-primary" href="#carousel-example-generic" data-slide="prev"></a>
					<a class="right fa fa-chevron-right btn btn-primary" href="#carousel-example-generic" data-slide="next"></a>
                </div>
            </div>
        </div>
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                    <div class="row">
						
						<?php
							$SELECT_PRODUCT_TOP_3 = "SELECT * FROM productos WHERE activo = 1 AND producto_clase = 'nuevo' ORDER BY fecha_creacion DESC LIMIT 0,3";
							//echo"<br>SELECT_PRODUCT_TOP_3 : ".$SELECT_PRODUCT_TOP_3;
							$result_products_3 = mysql_query($SELECT_PRODUCT_TOP_3);
							$count_rows_products_3 = mysql_num_rows($result_products_3);
							if($count_rows_products_3 > 0) {
								while($row_products_3 	= mysql_fetch_assoc($result_products_3)) { 
									$producto_id_3 		= $row_products_3[producto_id];
									$producto_marca_3	= $row_products_3[producto_marca];
									$producto_nombre_3	= $row_products_3[producto_nombre];
									$producto_precio_3	= $row_products_3[producto_precio];
									$activo_3			= $row_products_3[activo];
									?>
									<div class="col-sm-4">
										<div class="col-item">
											<div class="photo">
											
												<?php
												
												$SQL_SELECT_IMAGEPRODUCT_3 = "SELECT * FROM control_images WHERE producto_id = ".$producto_id_3." AND imagen_tipo = 'product' AND imagen_tag = 'on' ORDER BY image_id DESC LIMIT 1";
												//echo"<br>SQL_SELECT_IMAGEPRODUCT_3 : ".$SQL_SELECT_IMAGEPRODUCT_3;
												$result_imageproduct_3 = mysql_query($SQL_SELECT_IMAGEPRODUCT_3);
												$count_imageproduct_3 = mysql_num_rows($result_imageproduct_3);
												if($count_imageproduct_3 > 0) {
													while( $row_imageproduct_3 = mysql_fetch_assoc( $result_imageproduct_3 ) ) {
														$image_id_product_3		= $row_imageproduct_3[image_id];
														$image_name_product_3	= $row_imageproduct_3[imagen_nombre];
														$image_tag_product_3	= $row_imageproduct_3[imagen_tag];
							?>
													<a href="product.php?producto_id=<?php echo $producto_id_3;?>">
														
														<?php
														if( file_exists ( "upload_images/productos/product_".$image_name_product_3."" ) ) {?>
															<img src="upload_images/productos/product_<?php echo $image_name_product_3?>" class="img-responsive" alt="<?php echo $producto_nombre?>" />
														<?} else { ?>
															<img src="img/default_insucomp.jpg" class="img-responsive" alt="<?php echo $producto_nombre_3?>" />
														<? }
													?>
													</a>
													<?php
													}
												} else {
										
												}?>
											
											</div>
											<div class="info">
												<div class="row">
													<div class="price col-md-12">
														<h5><?php echo $producto_nombre_3;?></h5>
														<?php if($producto_precio_3 == '' or $producto_precio_3 == '0') { ?>
														<h5 class="price-text-color">Consulte cotización</h5>
														<?php } else { ?>
														
														<h5 class="price-text-color">$<?php echo number_format($producto_precio_3);?></h5>
														<?php } ?>
													
													</div>
												</div>
												<div class="separator clear-left">
													
													<p class="btn-details">
														<i class="fa fa-list"></i>
														<a href="product.php?producto_id=<?php echo $producto_id_3;?>" class="hidden-sm">Más detalles</a>
													</p>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
										
									<?
								} 
							} else {
						
							}?>
						

                       
					</div>
                </div>
                <div class="item">
                    <div class="row">
                        
						<?php
							$SELECT_PRODUCT_TOP_4 = "SELECT * FROM productos WHERE activo = 1 AND producto_clase = 'nuevo' ORDER BY fecha_creacion DESC LIMIT 3,3";
							//echo"<br>SELECT_PRODUCT_TOP_4 : ".$SELECT_PRODUCT_TOP_4;
							$result_products_4 = mysql_query($SELECT_PRODUCT_TOP_4);
							$count_rows_products_4 = mysql_num_rows($result_products_4);
							if($count_rows_products_4 > 0) {
								while($row_products_4	= mysql_fetch_assoc($result_products_4)) { 
									$producto_id_4		= $row_products_4[producto_id];
									$producto_marca_4	= $row_products_4[producto_marca];
									$producto_nombre_4	= $row_products_4[producto_nombre];
									$producto_precio_4	= $row_products_4[producto_precio];
									$activo_4				= $row_products_4[activo];
									?>
									<div class="col-sm-4">
										<div class="col-item">
											<div class="photo">
											
												<?php
												
												$SQL_SELECT_IMAGEPRODUCT_4 = "SELECT * FROM control_images WHERE producto_id = ".$producto_id_4." AND imagen_tipo = 'product' AND imagen_tag = 'on' ORDER BY image_id DESC LIMIT 1";
												//echo"<br>SQL_SELECT_IMAGEPRODUCT_4 : ".$SQL_SELECT_IMAGEPRODUCT_4;
												$result_imageproduct_4		= mysql_query($SQL_SELECT_IMAGEPRODUCT_4);
												$count_imageproduct_4		= mysql_num_rows($result_imageproduct_4);
												if($count_imageproduct_4 > 0) {
													while( $row_imageproduct_4 = mysql_fetch_assoc( $result_imageproduct_4 ) ) {
														$image_id_product_4		= $row_imageproduct_4[image_id];
														$image_name_product_4	= $row_imageproduct_4[imagen_nombre];
														$image_tag_product_4	= $row_imageproduct_4[imagen_tag];
						
															?>
													<a href="product.php?producto_id=<?php echo $producto_id_4;?>">
														
														<?php
														if( file_exists ( "upload_images/productos/product_".$image_name_product_4."" ) ) {?>
															<img src="upload_images/productos/product_<?php echo $image_name_product_4?>" class="img-responsive" alt="<?php echo $producto_nombre?>" />
														<?} else { ?>
															<img src="upload_images/productos/product_<?php echo $image_name_product_4?>" class="img-responsive" alt="<?php echo $producto_nombre?>" />
														<? }
													?>
													</a>
													<?php
													}
												} else {
										
												}?>
											
											</div>
											<div class="info">
												<div class="row">
													<div class="price col-md-12">
														<h5><?php echo $producto_nombre_4;?></h5>
														<?php if($producto_precio_4 == '' or $producto_precio_4 == '0') { ?>
														<h5 class="price-text-color">Consulte cotización</h5>
														<?php } else { ?>
														
														<h5 class="price-text-color">$<?php echo number_format($producto_precio_4);?></h5>
														<?php } ?>
													
													</div>
												</div>
												<div class="separator clear-left">
													
													<p class="btn-details">
														<i class="fa fa-list"></i>
														<a href="product.php?producto_id=<?php echo $producto_id_4;?>" class="hidden-sm">Más detalles</a>
													</p>
												</div>
												<div class="clearfix"></div>
											</div>
										</div>
									</div>
										
									<?
								} 
							} else {
						
							}?>
						
					</div>
                </div>
            </div>
        </div>
    </div>
<!--	
</div>
-->
