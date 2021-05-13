<?php

	$SQL_QUERY_LINES = " SELECT * FROM lineas ";
					
	//echo"<br>SQL_QUERY_LINES : ".$SQL_QUERY_LINES;
	$result_lines = mysql_query($SQL_QUERY_LINES);
	$count_rows_lines = mysql_num_rows($result_lines);
?>
	
	<link type="text/css" rel="stylesheet" href="libs/data_tables/css/jquery.dataTables.css">
	<script type="text/javascript" src="libs/data_tables/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#datatables").dataTable();
		});
	</script>
	
	<div class="row">
		<form class="well span5" action="line_save.php" method="post" id="form_product" accept-charset="utf-8">
			<h4>Ingresar Nueva Linea</h4>
			<div class="row">
				<div class="span3">
					<label>Nombre Linea</label> 
					<input class="span3" name="linea_nombre" type="text" id="linea_nombre">
					<label>Posicion Linea</label>
					<input class="span3" name="linea_posicion" type="number" min="1" value="1" id="linea_posicion">
					<div class="row">
						<label class="span1">Activar</label>
						<input class="span1" type="checkbox" id="linea_activo" name="linea_activo" value="yes">
					</div>
				</div>
			</div>
			<div class="row">
				<button class="btn btn-primary span3" type="submit">Guardar</button>
			</div>
		</form>
	</div>
		
	<div class="row">
		<h3>Listado de Lineas</h3>
		<table id="datatables" class="display">
			<thead>
				<tr>
					<th></th>
					<th>Nombre Linea</th>
					<th>Posicion</th>
					<th>Activos</th>
				</tr>
			</thead>
			
			<tbody>
				<? if($count_rows_lines > 0) {
					while($row_lines = mysql_fetch_assoc($result_lines)) { 
						$linea_id		= $row_lines[linea_id];
						$linea_nombre	= $row_lines[linea_nombre];
						$linea_posicion	= $row_lines[linea_posicion];
						$activo			= $row_lines[activo];
					?>
					<tr>
						<td><a href="main.php?action=line_edit&linea_id=<?=$linea_id?>" class="btn btn-warning">Editar Linea</a></td>
						<td><?=$linea_nombre;?></td>
						<td><?=$linea_posicion;?></td>
						<td>
							<? if($activo == 1){ ?>activado<?}else{?> desactivado <?}?>
						</td>
					</tr>
					<?php } ?>
				<?php } else { ?>
					<span>No arrojo resultados</span>
				<?php }?>
			</tbody>
		</table>
	</div>
	
	
	
	
	
	