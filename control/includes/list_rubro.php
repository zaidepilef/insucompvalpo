<?
	$SQL_LIST_RUBRO = "SELECT * FROM rubro_pyme WHERE active=1 ORDER BY rubro_name ASC";
	$result_rubro = mysql_query($SQL_LIST_RUBRO);
	$count_row_rubro = mysql_num_rows($result_rubro);
	if($count_row_rubro > 0) {
		?><option value="">Escoja un Rubro.</option><?
		while($row_rubro = mysql_fetch_assoc($result_rubro)) {
			$rubro_id			= $row_rubro[rubro_id];
			$rubro_name			= $row_rubro[rubro_name];
			?>
				<option value="<?=$rubro_id;?>"><?=$rubro_name;?></option>
			<?
		}
	} else {?>
		<option value="">No Existen Rubros para Elegir</option>
	<?
	}
?>