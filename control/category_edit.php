<?php
	$cat_id = $_GET['categoria_id'];
	$saved_changes = $_GET['saved_changes'];
	//echo"<br> categoria_id : ".$categoria_id;

	$SQL_QUERY_CATEGORY = "
				SELECT *
				FROM
					categorias
				WHERE
					categoria_id = $cat_id";
					
	//echo"<br>SQL_QUERY_CATEGORY : ".$SQL_QUERY_CATEGORY;
	$result_categories = mysql_query($SQL_QUERY_CATEGORY);
	$count_rows_categories = mysql_num_rows($result_categories);
	if($count_rows_categories > 0 ){
	
		$row_categories = mysql_fetch_assoc($result_categories);
		$categoria_id			= $row_categories[categoria_id];
		$categoria_nombre		= $row_categories[categoria_nombre];
		$categoria_posicion		= $row_categories[categoria_posicion];
		$linea_id				= $row_categories[linea_id];
		$activo					= $row_categories[activo];
	}else{
		
	}
?>
	<div class="container well">
		<div class="span6">
			<h3>Detalles de la categoria</h3>
			<?php if($saved_changes =='ok'){ ?>
			<div class="success alert-success">
				<button class="close" data-dismiss="alert" type="button">×</button> 
				<strong>Cambios Guardados</strong>
			</div>
			<?}?>
			<form action="category_save.php" method="post" class="form-horizontal" id="billingform" accept-charset="utf-8">
				<input type="hidden" id="categoria_id" name="categoria_id" value="<?php echo $categoria_id?>">
				
				<div class="row">
					<label for="categoria_nombre" class="control-label">Nombre Categoria</label>
					<input name="categoria_nombre" type="text" value="<?php echo $categoria_nombre?>" id="categoria_nombre">
				</div> 
				<div class="row">
					<label for="categoria_posicion" class="control-label">Posicion</label>
					<input name="categoria_posicion" type="number" min="1" value="<?php echo $categoria_posicion?>" id="categoria_posicion">
				</div>
				
				<div class="row">
				
					<script>
						$( document ).ready(function() {
							$("#linea_id").val("<?php echo $linea_id?>");
							$("#linea_id[value='<?php echo $linea_id;?>']").attr('selected', 'selected');
						});
					</script>
					<label for="linea_id" class="control-label">Linea</label>
					<select name="linea_id" id="linea_id"><?php include "includes/lista_lineas.php";?></select>
				</div>
				<? if( $activo == 1 ) { ?>
					<script>
						$( document ).ready(function() {
							$("#categoria_activo").prop('checked', true);
						});
					</script>
				<?}?>
				
				<div class="row">
					<label class="span1">Activar</label>
					<input class="span1" type="checkbox" id="categoria_activo" name="categoria_activo" value="yes">
				</div>
				
				<div class="form-actions">
					<button type="submit" class="btn btn-large btn-primary">Guardar Categoria</button>
				</div>
				
			</form>
		</div>
		<div class="span5">
			<h3>Imagen Categoria</h3>Recomendamos que sea de 100 x 100 en formato jpg:
			<div class="row">
				<form enctype="multipart/form-data" method="post" action="image_category.php">
					<input type="hidden" id="categoria_id" name="categoria_id" value="<?=$categoria_id?>"/>
					<input name="uploaded_file_product" type="file"/><br /><br />
					<input class="btn btn-success"type="submit" value="Upload It"/>
				</form>
			</div>
			<hr>
			<div class="row">
				<?
				$SQL_SELECT_IMAGECATEGORY = "SELECT * FROM control_images WHERE categoria_id = ".$categoria_id." AND imagen_tipo = 'category' ORDER BY image_id DESC LIMIT 5";
				//echo"<br>SQL_SELECT_IMAGECATEGORY : ".$SQL_SELECT_IMAGECATEGORY;
				$result_imagecategory = mysql_query($SQL_SELECT_IMAGECATEGORY);
				$count_imagecategory = mysql_num_rows($result_imagecategory);
				if($count_imagecategory > 0) {?>
					<?while($row_imagecategory	= mysql_fetch_assoc($result_imagecategory)){
						$image_id_category		= $row_imagecategory[image_id];
						$image_name_category	= $row_imagecategory[imagen_nombre];
						$image_tag_category		= $row_imagecategory[imagen_tag];
						
						if($image_tag_category == 'on') {
							$image_status = 'btn-warning';
						} else {
							$image_status = '';
						}
					?>
						<?if( file_exists ( "../upload_images/categorias/category_".$image_name_category."" ) ) {?>
						
							<div class="span4">
								<img class="thumbnail" src="../upload_images/categorias/category_<?php echo $image_name_category;?>" alt="" title="" >
								<a href="images_conf_cat.php?image_id=<?php echo $image_id_category;?>&category_id=<?php echo $categoria_id?>&action=master" class="btn <?php echo $image_status?> small">Master</a>
								<a href="images_conf_cat.php?image_id=<?php echo $image_id_category;?>&category_id=<?php echo $categoria_id?>&action=delete" class="btn btn-danger small">Borrar</a>
							</div>
							
						<?} else {?>
						
							<div class="span4">
								<img class="thumbnail" src="../upload_images/categorias/category_<?php echo $image_name_category;?>" alt="" title="">
							</div>
							
						<?}?>
					<?}?>
				<?} else {?>
					<span>No hay Imagenes para esta categoria</span>
				<?}?>
			</div>
	
		</div>
	</div>
	
	
	
	
	