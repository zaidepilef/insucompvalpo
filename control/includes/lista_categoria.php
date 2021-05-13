<?php
	$SQL_LIST_CATEGORYPRODUCT = "SELECT * FROM categorias WHERE activo=1 ORDER BY categoria_nombre ASC";
	$result_categoryproduct = mysql_query($SQL_LIST_CATEGORYPRODUCT);
	$count_row_categoryproduct = mysql_num_rows($result_categoryproduct);
	if($count_row_categoryproduct > 0) {
		?><option value="">Escoja una Categoria.</option><?php
		while($row_categoryproduct = mysql_fetch_assoc($result_categoryproduct)) {
			$category_id			= $row_categoryproduct[categoria_id];
			$category_name			= $row_categoryproduct[categoria_nombre];
			?><option value="<?php echo $category_id;?>"><?php echo $category_name;?></option><?php
		}
	} else {
		?><option value="">no existen Categorias</option><?php
	}?>