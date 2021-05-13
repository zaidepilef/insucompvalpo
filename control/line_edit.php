<?php


	$line_id = $_GET['linea_id'];
	$saved_changes = $_GET['saved_changes'];
	//echo"<br> prod_id : ".$prod_id;

	$SQL_QUERY_LINE = "
				SELECT *
				FROM
					lineas
				WHERE
					linea_id = $line_id";
					
	//echo"<br>SQL_QUERY_LINE : ".$SQL_QUERY_LINE;
	$result_lines = mysql_query($SQL_QUERY_LINE);
	$count_rows_lines = mysql_num_rows($result_lines);
	if($count_rows_lines > 0 ){
	
		$row_lines = mysql_fetch_assoc($result_lines);
		$linea_id		= $row_lines[linea_id];
		$linea_nombre	= $row_lines[linea_nombre];
		$linea_posicion	= $row_lines[linea_posicion];
		$activo			= $row_lines[activo];
	}else{
		
	}
	
?>
	<div class="container well">
		<div class="span6">
			<h4>Detalles de la Linea</h4>
			
			<?php if($saved_changes =='ok'){ ?>
			<div class="success alert-success">
				<button class="close" data-dismiss="alert" type="button">×</button> 
				<strong>Cambios Guardados</strong>
			</div>
			<?}?>
			<form action="line_save.php" method="post" class="form-horizontal" id="billingform" accept-charset="utf-8">
				<input type="hidden" id="linea_id" name="linea_id" value="<?php echo $linea_id?>">
				
				<div class="row">
					<label for="linea_nombre" class="control-label">Nombre Linea</label>
					<input name="linea_nombre" type="text" value="<?php echo $linea_nombre?>" id="producto_marca">
				</div>
				

				<div class="row">
					<label for="linea_posicion" class="control-label">Posicion Linea</label>
					<input name="linea_posicion" type="number" min="1" value="<?php echo $linea_posicion?>" id="linea_posicion">
				</div>
			
				<? if( $activo == 1 ) { ?>
						<script>
							$( document ).ready(function() {
								$("#linea_activo").prop('checked', true);
							});
						</script>
						<?}?>
				
				<div class="row">
					<label class="span1">Activar</label>
					<input class="span1" type="checkbox" id="linea_activo" name="linea_activo" value="yes">
				</div>
			
				<div class="form-actions">
					<button type="submit" class="btn btn-large btn-primary">Guardar Producto</button>
				</div>
			</form>
		</div>
	</div>
	
	
	
	
	