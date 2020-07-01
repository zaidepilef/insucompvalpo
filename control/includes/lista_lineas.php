<?
	$SQL_LIST_LINECATEGORIES = "SELECT * FROM lineas WHERE activo=1 ORDER BY linea_nombre ASC";
	$result_linecategories = mysql_query($SQL_LIST_LINECATEGORIES);
	$count_row_linecategories = mysql_num_rows($result_linecategories);
	if($count_row_linecategories > 0) {
		?><option value="">escoja uno.</option><?
		while($row_linecategories = mysql_fetch_assoc($result_linecategories)) {
			$line_id			= $row_linecategories[linea_id];
			$line_name			= $row_linecategories[linea_nombre];
			?>
				<option value="<?=$line_id;?>"><?=$line_name;?></option>
			<?
		}
	} else {?>
		<option value="">no existen lineas para elegir</option>
	<?
	}
?>