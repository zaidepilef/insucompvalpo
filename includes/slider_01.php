
			<div class="row">
			
				<div id="transition-timer-carousel" class="carousel slide transition-timer-carousel" data-ride="carousel">
					<!-- Indicators -->
					<!--
					<ol class="carousel-indicators">
						<li data-target="#transition-timer-carousel" data-slide-to="0" class="active"></li>
						<li data-target="#transition-timer-carousel" data-slide-to="1"></li>
						<li data-target="#transition-timer-carousel" data-slide-to="2"></li>
						<li data-target="#transition-timer-carousel" data-slide-to="3"></li>
					</ol>
					-->
					<!-- Wrapper for slides -->
					<div class="carousel-inner">
						<?
						$SQL_SELECT_IMAGEMSLIDER = "SELECT * FROM control_images WHERE imagen_tipo = 'slider' ORDER BY image_id DESC";
						//echo"<br>SQL_SELECT_IMAGEMSLIDER : ".$SQL_SELECT_IMAGEMSLIDER;
						$result_imageslider = mysql_query($SQL_SELECT_IMAGEMSLIDER);
						$count_imageslider = mysql_num_rows($result_imageslider);
						if($count_imageslider > 0) { ?>
							<? while($row_imageslider = mysql_fetch_assoc($result_imageslider)){
								$image_id_slider		= $row_imageslider['image_id'];
								$image_name_slider		= $row_imageslider['imagen_nombre'];
								$image_tag_slider		= $row_imageslider['imagen_tag']; 
								if($image_tag_slider == 'on') {
									$image_status = 'active';
								} else {
									$image_status = '';
								}
								?>
								<?if( file_exists ( "/upload_images/slider/slider_".$image_name_slider."" ) ) {?>
									<div class="item <?=$image_status?>">
										<img src="/upload_images/slider/slider_<?=$image_name_slider?>"/>
									</div>
								<?} else {?>
									<div class="item <?=$image_status?>">
										<img src="/upload_images/slider/slider_<?=$image_name_slider?>"/>
									</div>
								<?}?>
							<?}?>
						<?} else {?>
							<div class="item active">
								<img src="http://www.insucomp.nexzaid.net/img/despacho_gratuito.jpg"/>
							</div>
						<?}?>

					</div>
					
					
					<!-- Controls -->
					<a class="left carousel-control" href="#transition-timer-carousel" data-slide="prev">
						<span class="glyphicon glyphicon-chevron-left"></span>
					</a>

					<a class="right carousel-control" href="#transition-timer-carousel" data-slide="next">
						<span class="glyphicon glyphicon-chevron-right"></span>
					</a>
					<!-- Timer "progress bar" -->
					<hr class="transition-timer-carousel-progress-bar animate" />
				</div>
			</div>
			
			
			
			
			
			