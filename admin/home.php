
		<div class="span5">
			<h3>Imagen para Slider</h3>
			Recomendamos que sea de 900 x 300 en formato jpg:
			<div class="row">
				<form enctype="multipart/form-data" method="post" action="image_slider.php">
					<input name="uploaded_file_slider" type="file"/>
					<br/>
					<br/>
					<input class="btn btn-success"type="submit" value="Upload It"/>
				</form>
			</div>
			<hr>
			<div class="row">
				<?
				$SQL_SELECT_IMAGEMSLIDER = "SELECT * FROM control_images WHERE imagen_tipo = 'slider' ORDER BY image_id DESC LIMIT 15";
				//echo"<br>SQL_SELECT_IMAGEMSLIDER : ".$SQL_SELECT_IMAGEMSLIDER;
				$result_imageslider = mysql_query($SQL_SELECT_IMAGEMSLIDER);
				$count_imageslider = mysql_num_rows($result_imageslider);
				if($count_imageslider > 0) {?>
					<?while($row_imageslider = mysql_fetch_assoc($result_imageslider)){
						$image_id_slider		= $row_imageslider['image_id'];
						$image_name_slider		= $row_imageslider['imagen_nombre'];
						$image_tag_slider		= $row_imageslider['imagen_tag'];
						
						if($image_tag_slider == 'on'){
							$image_status = 'btn-warning';
						}else{
							$image_status = '';
						}
					?>
						<?if( file_exists ( "../upload_images/slider/slider_".$image_name_slider."" ) ) {?>
						
							<div class="span4">
								<img class="thumbnail" src="../upload_images/slider/slider_<?php echo $image_name_slider;?>" alt="" title="" >
								<a href="images_conf_slider.php?image_id=<?php echo $image_id_slider;?>&action=master" class="btn <?php echo $image_status?> small">Activar</a>
								<a href="images_conf_slider.php?image_id=<?php echo $image_id_slider;?>&action=delete" class="btn btn-danger small">Borrar</a>
							</div>
							
						<?} else {?>
							<div class="span4">
								<img class="thumbnail" src="../upload_images/slider/slider_<?php echo $image_name_slider;?>" alt="" title="">
							</div>
						<?}?>
					<?}?>
				<?} else {?>
					<span>No hay Imagenes para este producto</span>
				<?}?>
			</div>
	
		</div>