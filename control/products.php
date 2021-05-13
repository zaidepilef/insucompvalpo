<?php

	$SQL_QUERY_PRODUCT = "
				SELECT 
					pr.producto_id,
					pr.producto_codigo,
					pr.producto_marca,
					pr.producto_nombre,
					pr.producto_descripcion,
					pr.producto_precio,
					pr.fecha_creacion,
					pr.activo,
					cp.categoria_id,
					cp.categoria_nombre
				FROM
					categorias cp,
					productos pr
				WHERE
					cp.categoria_id = pr.categoria_id
				AND
					pr.activo != 2
					";
					
				//echo"<br>SQL_QUERY_PRODUCT : ".$SQL_QUERY_PRODUCT;
	$result_products = mysql_query($SQL_QUERY_PRODUCT);
	$count_rows_products = mysql_num_rows($result_products);
?>
	<link type="text/css" rel="stylesheet" href="libs/data_tables/css/jquery.dataTables.css">
	<script type="text/javascript" src="libs/data_tables/js/jquery.dataTables.js"></script>
	<script type="text/javascript">
		$(document).ready(function(){
			$("#datatables").dataTable();
		});
	</script>
	
	<h3>Ingresar nuevo producto</h3>
	<form class="well span12" action="product_save.php" method="post" id="form_product" accept-charset="utf-8">
        <div class="row">
            <div class="span3">
				<label>Codigo Producto</label> 
				<input class="span3" name="producto_codigo" type="text" id="producto_codigo">
                <label>Marca Producto</label> 
				<input class="span3" name="producto_marca" type="text" id="producto_marca">
				<label>Nombre Producto</label>
				<input class="span3" name="producto_nombre" type="text" id="producto_nombre">
				<label>Precio Producto</label>
				<input class="span3" name="producto_precio" type="text" id="producto_precio">
				<label>Categoria</label>
                <select class="span3" id="categoria_id" name="categoria_id">
                   <?php include "includes/lista_categoria.php";?>
                </select>
				<label>Producto Clase</label>
                <select class="span3" id="producto_clase" name="producto_clase">
                   <option value="normal">normal</option>
                   <option value="destacado">Destacado</option>
                   <option value="nuevo">Nuevo</option>
                </select>
				<div class="row">
					<label class="span1">Activar</label>
					<input class="span1" type="checkbox" id="producto_activo" name="producto_activo" value="yes">
				</div>
			</div>
            <div class="span5">
                <label>Descripcion Producto</label> 
                <textarea class="input-xlarge span9" id="producto_descripcion" name="producto_descripcion"rows="10"></textarea>
            </div>
        </div>
		<div class="row">
			<button class="btn btn-primary span2" type="submit">Guardar</button>
        </div>
    </form>
	
	<div class="row">
		<h3>Listado de productos</h3>
		<table id="datatables" class="display">
			<thead><tr>
					<th></th>
					<th>Codigo Producto</th>
					<th>Marca Producto</th>
					<th>Nombre Producto</th>
					<th>Categoria Producto</th>
					<th>Activos</th>
					<th></th>
			</tr></thead>
			
			<tbody>
				<? if($count_rows_products > 0) {
					while($row_products = mysql_fetch_assoc($result_products)) { 
						$product_id 		= $row_products['producto_id'];
						$product_code 		= $row_products['producto_codigo'];
						$product_mark 		= $row_products['producto_marca'];
						$product_name 		= $row_products['producto_nombre'];
						$category_name 		= $row_products['categoria_nombre'];
						$product_active 	= $row_products['activo'];
					?>
					<tr>
						<td><a href="main.php?action=product_edit&product_id=<?=$product_id?>" class="btn btn-warning btn-small">Editar</a></td>
						<td><?=$product_code;?></td>
						<td><?=$product_mark;?></td>
						<td><?=$product_name;?></td>
						<td><?=$category_name;?></td>
						<td>
							<? if($product_active == 1){ ?>activado<?}else{?> desactivado <?}?>
						</td>
						<td><a href="product_delete.php?producto_id=<?=$product_id?>" class="btn btn-danger btn-small">Borrar</a></td>
					</tr>
					<?php } ?>
				<?php } else { ?>
					<span>No arrojo resultados</span>
				<?php }?>
			</tbody>
		</table>
	</div>
	
	