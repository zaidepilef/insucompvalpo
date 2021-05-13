<?php





	$prod_id = $_GET['product_id'];

	$saved_changes = $_GET['saved_changes'];

	//echo"<br> prod_id : ".$prod_id;



	$SQL_QUERY_PRODUCT = "

				SELECT *

				FROM

					productos

				WHERE

					producto_id = $prod_id";

					

	//echo"<br>SQL_QUERY_PRODUCT : ".$SQL_QUERY_PRODUCT;

	$result_products = mysql_query($SQL_QUERY_PRODUCT);

	$count_rows_products = mysql_num_rows($result_products);

	if($count_rows_products > 0 ){

		$row_product = mysql_fetch_assoc($result_products);

		$producto_id			= $row_product[producto_id];

		$producto_codigo		= $row_product[producto_codigo];

		$categoria_id			= $row_product[categoria_id];

		$producto_nombre		= $row_product[producto_nombre];

		$producto_marca			= $row_product[producto_marca];

		$producto_precio		= $row_product[producto_precio];

		$producto_descripcion 	= $row_product[producto_descripcion];

		$activo					= $row_product[activo];

		$producto_clase			= $row_product[producto_clase];

		

	}else{

		

	}

?>

	<div class="container well">

		<div class="span6">

			<h3>Detalles del Producto</h3>

			<?php if($saved_changes =='ok'){ ?>

			<div class="success alert-success">

				<button class="close" data-dismiss="alert" type="button">×</button> 

				<strong>Cambios Guardados</strong>

			</div>

			<?}?>

			<form action="product_save.php" method="post" class="form-horizontal" id="billingform" accept-charset="utf-8">

				<input type="hidden" id="producto_id" name="producto_id" value="<?php echo $producto_id?>">

				

				<div class="row">

					<label for="producto_codigo" class="control-label">Codigo Producto</label>

					<input name="producto_codigo" type="text" value="<?php echo $producto_codigo?>" id="producto_codigo">

				</div>

				<div class="row">

					<label for="producto_marca" class="control-label">Marca Producto</label>

					<input name="producto_marca" type="text" value="<?php echo $producto_marca?>" id="producto_marca">

				</div> 				

				<div class="row">

					<label for="producto_nombre" class="control-label">Nombre Producto</label>

					<input name="producto_nombre" type="text" value="<?php echo $producto_nombre?>" id="producto_nombre">

				</div>

				<div class="row">

					<label for="producto_precio" class="control-label">Precio Producto</label>

					<input name="producto_precio" type="text" value="<?php echo $producto_precio?>" id="producto_precio">

				</div>

				

				

				<div class="row">

				

					<script>

						$( document ).ready(function() {

							$("#categoria_id").val("<?php echo $categoria_id?>");

							$("#categoria_id[value='<?php echo $categoria_id;?>']").attr('selected', 'selected');

						});

					</script>

				

					<label for="categoria_id" class="control-label">Categoria</label>

					<select name="categoria_id" id="categoria_id"><?php include "includes/lista_categoria.php";?></select>

				</div>

				

				

				

				<div class="row">

				

					<script>

						$( document ).ready(function() {

							$("#producto_clase").val("<?php echo $producto_clase?>");

							$("#producto_clase[value='<?php echo $producto_clase;?>']").attr('selected', 'selected');

						});

					</script>

				

					<label for="producto_clase" class="control-label">Producto clase</label>

					<select name="producto_clase" id="producto_clase">

						<option value="normal">normal</option>

						<option value="destacado">Destacado</option>

						<option value="nuevo">Nuevo</option>

					</select>

				</div>

				

				

				

				<? if( $activo == 1 ) { ?>

					<script>

						$( document ).ready(function() {

							$("#producto_activo").prop('checked', true);

						});

					</script>

				<?}?>	

				<div class="row">

					<label class="span1">Activar</label>

					<input class="span1" type="checkbox" id="producto_activo" name="producto_activo" value="yes">

				</div>

				<div class="row">

					<label for="producto_descripcion" class="control-label">Descripcion</label>

					<textarea class="span5"id="producto_descripcion" name="producto_descripcion"><?php echo $producto_descripcion?></textarea>

				</div>

				<div class="form-actions">

					<button type="submit" class="btn btn-large btn-primary">Guardar Producto</button>

				</div>

			</form>

		</div>

		<div class="span5">

			<h3>Imagen Producto</h3>Recomendamos que sea de 400 x 400 en formato jpg:

			<div class="row">

				<form enctype="multipart/form-data" method="post" action="image_product.php">

					<input type="hidden" id="producto_id" name="producto_id" value="<?=$producto_id?>"/>

					<input name="uploaded_file_product" type="file"/><br /><br />

					<input class="btn btn-success"type="submit" value="Upload It"/>

				</form>

			</div>

			<hr>

			<div class="row">

				<?

				$SQL_SELECT_IMAGEPRODUCT = "SELECT * FROM control_images WHERE producto_id = ".$producto_id." AND imagen_tipo = 'product' ORDER BY image_id DESC LIMIT 5";

				//echo"<br>SQL_SELECT_IMAGEPRODUCT : ".$SQL_SELECT_IMAGEPRODUCT;

				$result_imageproduct = mysql_query($SQL_SELECT_IMAGEPRODUCT);

				$count_imageproduct = mysql_num_rows($result_imageproduct);

				if($count_imageproduct > 0) {?>

					<?while($row_imageproduct = mysql_fetch_assoc($result_imageproduct)){

						$image_id_product = $row_imageproduct[image_id];

						$image_name_product = $row_imageproduct[imagen_nombre];

						$image_tag_product = $row_imageproduct[imagen_tag];

						

						if($image_tag_product == 'on'){

							$image_status = 'btn-warning';

						}else{

							$image_status = '';

						}

					?>

						<?if( file_exists ( "../upload_images/productos/product_".$image_name_product."" ) ) {?>

						

							<div class="span4">

								<img class="thumbnail" src="http://www.insucompvalpo.cl/upload_images/productos/product_<?php echo $image_name_product;?>" alt="" title="" >

								<a href="images_conf.php?image_id=<?php echo $image_id_product;?>&product_id=<?php echo $producto_id?>&action=master" class="btn <?php echo $image_status?> small">Master</a>

								<a href="images_conf.php?image_id=<?php echo $image_id_product;?>&product_id=<?php echo $producto_id?>&action=delete" class="btn btn-danger small">Borrar</a>

							</div>

							

						<?} else {?>

							<div class="span4">

								<img class="thumbnail" src="http://www.insucompvalpo.cl/upload_images/productos/product_<?php echo $image_name_product;?>" alt="" title="">

							</div>

						<?}?>

					<?}?>

				<?} else {?>

					<span>No hay Imagenes para este producto</span>

				<?}?>

			</div>

	

		</div>

	</div>

	

	

	

	

	