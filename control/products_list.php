<?php

	$SQL_QUERY_PRODUCT = "SELECT 
						pr.product_id,
						pr.shop_id,
						pr.product_name,
						pr.product_description_short,
						pr.product_description_large,
						pr.product_price,
						pr.date_create,
						pr.active,
						cp.category_id,
						cp.category_name,
						sh.shop_name
					FROM
						category_product cp,
						shops_pyme sh,
						products_pyme pr
					WHERE
						cp.category_id = pr.category_id
					AND
						sh.shop_id = pr.shop_id";
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
	
	<table id="datatables" class="display">
		<thead><tr>
				<th></th>
				<th></th>
				<th>Nombre Producto</th>
				<th>Tienda</th>
				<th>Categoria Producto</th>
				<th>Activos</th>
		</tr></thead>
		
		<tbody>
			<? if($count_rows_products > 0) {
				while($row_products = mysql_fetch_assoc($result_products)) { 
					$product_id 		= $row_products[product_id];
					$product_name 		= $row_products[product_name];
					$shop_name 			= $row_products[shop_name];
					$category_name 		= $row_products[category_name];
					$product_active 	= $row_products[active];
				?>
				<tr>
					<td><a href="main.php?action=product_edit&product_id=<?=$product_id?>" class="button orange">Editar Producto</a></td>
					<td><a href="main.php?action=add_photo_product&product_id=<?=$product_id?>" class="button orange">Add Photo</a></td>
					<td><?=$product_name;?></td>
					<td><?=$shop_name;?></td>
					<td><?=$category_name;?></td>
					<td>
						<? if($product_active == '1'){ ?>activado<?}else{?> desactivado <?}?>
					</td>
				</tr>
				<?php } ?>
			<?php } else { ?>
				<span>No arrojo resultados</span>
			<?php }?>
		</tbody>

	</table>