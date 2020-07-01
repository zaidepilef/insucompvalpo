<?php
	
	$SQL_LISTLINES = "SELECT * FROM lineas WHERE activo = 1 ORDER BY linea_posicion ASC";
	$result_listlines = mysql_query($SQL_LISTLINES);
	//echo"<br> SQL_LISTLINES : ".$SQL_LISTLINES;
	$count_row_listlines = mysql_num_rows($result_listlines);

?>


<div class="accordion" id="leftMenu">
	<?php
	if($count_row_listlines > 0) {
		while($row_line_active = mysql_fetch_assoc($result_listlines)){
			$line_id_active			= $row_line_active['linea_id'];
			$line_name_active		= $row_line_active['linea_nombre'];
			$line_position_active	= $row_line_active['linea_posicion'];?>



			<div class="accordion-group navbar-inverse">
				<div class="accordion-heading">
					<a class="accordion-toggle" data-toggle="collapse" data-parent="#leftMenu" href="#collapse_<?=$line_id_active?>">
						<i class="glyphicon glyphicon-chevron-right">
						</i> 
						<?php echo $line_name_active;?>
					</a>
				</div>
				<div id="collapse_<?=$line_id_active?>" class="accordion-body collapse" style="height: 0px; ">
					<div class="accordion-inner">
						<ul><?
							$SQL_CATEGORIES = "SELECT * FROM categorias WHERE activo = 1 AND linea_id = $line_id_active ORDER BY categoria_posicion ASC";
							$result_categories = mysql_query($SQL_CATEGORIES);
							//echo"<br> SQL_CATEGORIES : ".$SQL_CATEGORIES;
							$count_row_categories = mysql_num_rows($result_categories);
							
							if($count_row_categories > 0) {
								while($row_category_active = mysql_fetch_assoc($result_categories)){
									$categoria_id_active		= $row_category_active['categoria_id'];
									$categoria_nombre_active	= $row_category_active['categoria_nombre'];
									$categoria_posicion_active	= $row_category_active['categoria_posicion'];?>
									<li><a href="category.php?id=<?=$categoria_id_active?>"><?=$categoria_nombre_active;?></a></li><?
								}
							}
							?>
						</ul>
					</div>
				</div>
			</div>
	<?php
		}
	}
	?>
	
	
	
	
</div>