<?php
	$saved_changes = $_GET['saved_changes'];
	
	$SQL_QUERY_CATEGORY = "
				SELECT 
					ct.categoria_id,
					ct.categoria_nombre,
					ct.categoria_posicion,
					ct.activo,
					ln.linea_id,
					ln.linea_nombre
				FROM
					categorias ct,lineas ln
				WHERE
					ct.linea_id = ln.linea_id
				AND
					ct.activo != 2
					";
					
				//echo"<br>SQL_QUERY_PRODUCT : ".$SQL_QUERY_CATEGORY;
	$result_categories = mysql_query($SQL_QUERY_CATEGORY);
	$count_rows_categories = mysql_num_rows($result_categories);
?>
	
	
	
	
	<link type="text/css" rel="stylesheet" href="libs/data_tables/css/jquery.dataTables.css">
	<script type="text/javascript" src="libs/data_tables/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#datatables").dataTable();
		});
	</script>
	
	<div class="row">
		<form class="well span5" action="category_save.php" method="post" id="form_product" accept-charset="utf-8">
			<h4>Ingresar Nueva Categoria</h4>
			
			<?php if($saved_changes =='ok'){ ?>
			<div class="success alert-success">
				<button class="close" data-dismiss="alert" type="button">×</button> 
				<strong>Cambios Guardados</strong>
			</div>
			<?}?>
			
			<div class="row">
				<div class="span3">
					<label>Nombre Categoria</label> 
					<input class="span3" name="categoria_nombre" type="text" id="categoria_nombre">
					<label>Posicion Categoria</label>
					<input class="span3" name="categoria_posicion" type="number" min="1" value="1" id="categoria_posicion">
					<label>Linea</label>
					<select class="span3" id="linea_id" name="linea_id">
					   <?php include "includes/lista_lineas.php";?>
					</select>
					<div class="row">
						<label class="span1">Activar</label>
						<input class="span1" type="checkbox" id="categoria_activo" name="categoria_activo" value="yes">
					</div>
				</div>
			</div>
			<div class="row">
				<button class="btn btn-primary span3" type="submit">Guardar</button>
			</div>
		</form>
	
	
	</div>
	
	
	<div class="row">
		<h3>Listado de Categorias</h3>
		<table id="datatables" class="display">
			<thead>
				<tr>
					<td></td>
					<th>Nombre Categoria</th>
					<th>Nombre Linea</th>
					<th>Posicion</th>
					<th>Activos</th>
					<td></td>
				</tr>
			</thead>
			
			<tbody>
				<? if($count_rows_categories > 0) {
					while($row_categories = mysql_fetch_assoc($result_categories)) { 
						$categoria_id			= $row_categories[categoria_id];
						$categoria_nombre 		= $row_categories[categoria_nombre];
						$categoria_posicion		= $row_categories[categoria_posicion];
						$linea_id				= $row_categories[linea_id];
						$linea_nombre			= $row_categories[linea_nombre];
						$activo					= $row_categories[activo];
					?>
					<tr>
						<td><a href="main.php?action=category_edit&categoria_id=<?=$categoria_id?>" class="btn btn-warning btn-small">Editar Categoria</a></td>
						<td><?=$categoria_nombre;?></td>
						<td><?=$linea_nombre;?></td>
						<td><?=$categoria_posicion;?></td>
						<td>
							<? if($activo == 1){ ?>activado<?}else{?> desactivado <?}?>
						</td>
						<td><a href="category_delete.php?categoria_id=<?=$categoria_id?>" class="btn btn-danger btn-small">Borrar</a></td>
					</tr>
					
					
					
					
					
					
					
					<?php } ?>
				<?php } else { ?>
					<span>No arrojo resultados</span>
				<?php }?>
			</tbody>
		</table>
	</div>
	
	
	
	
	
	
	
	