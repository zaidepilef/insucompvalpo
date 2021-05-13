<?
	
	$count_productos = " SELECT COUNT(producto_id) AS cant FROM productos";
	//echo"<br> count_productos : ".$count_productos;
	$retval_productos 		= mysqli_query( $link, $count_productos );
	$countrow_productos = mysqli_fetch_assoc($retval_productos);
	$cant_productos = $countrow_productos['cant'];
	//echo"<br> cant_productos : ".$cant_productos;
	
	$rowsperpage = 50;
	// find out total pages
	$totalpages = ceil($cant_productos / $rowsperpage);

	//echo"<br>currentpage : ".$_GET['currentpage'];
	// get the current page or set a default
	if (isset($_GET['currentpage']) && is_numeric($_GET['currentpage'])) {
	// cast var as int
		$currentpage = (int) $_GET['currentpage'];
	} else {
		// default page num
		$currentpage = 1;
	}
	// end if
	// if current page is greater than total pages...
	if ($currentpage > $totalpages) {
		// set current page to last page
		$currentpage = $totalpages;
	} // end if
	// if current page is less than first page...
	
	if ($currentpage < 1) {
		// set current page to first page
		$currentpage = 1;
	} // end if

	// the offset of the list, based on current page 
	$offset = ($currentpage - 1) * $rowsperpage;
	
		
	//consulta
	$sql_productos = "SELECT * FROM productos ORDER BY producto_id LIMIT ".$offset.", ".$rowsperpage."";
	//echo"<br> sql_productos : ".$sql_productos;
	$query_productos 		= mysqli_query( $link, $sql_productos );
	$count_productos 		= mysqli_num_rows($query_productos);
	
	

?>
<div class="row">
	<a class="button">Nuevo Producto</a>
</div>

	<div class="row">
		<div class="one third small half-padded">
		<?
			/******  build the pagination links ******/
			// range of num links to show
			$range = 3;
			// if not on page 1, don't show back links
			if ($currentpage > 1) {
				// show << link to go back to page 1
				echo " <a class='button' href='http://admin.capellipropiedades.cl/propiedades/1'><<</a> ";
				// get previous page num
				$prevpage = $currentpage - 1;
				// show < link to go back to 1 page
				echo " <a class='button' href='http://admin.capellipropiedades.cl/propiedades/$prevpage'><</a> ";
			}
			// end if 
			// loop to show links to range of pages around current page
			for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
				// if it's a valid page number...
				if (($x > 0) && ($x <= $totalpages)) {
					// if we're on current page...
					if ($x == $currentpage) {
						// 'highlight' it but don't make a link
						echo "<button class='info'>$x</button> ";
						// if not current page...
					} else {
						// make it a link
						echo " <a class='button' href='http://admin.capellipropiedades.cl/propiedades/$x'>$x</a> ";
					} // end else
				}
				// end if 
			} 
			// end for
			// if not on last page, show forward and last page links        
			if ($currentpage != $totalpages) {
				// get next page
				$nextpage = $currentpage + 1;
				// echo forward link for next page 
				echo " <a class='button' href='http://admin.capellipropiedades.cl/propiedades/$nextpage'>></a> ";
				// echo forward link for lastpage
				echo " <a class='button' href='http://admin.capellipropiedades.cl/propiedades/$totalpages'>>></a> ";
			} // end if
			/****** end build pagination links ******/
		?>
		</div>
	</div>


<div class="row half-padded">
	<table style="font-size:15px;" class="responsive blue bordered small" data-max="15">
		<thead>
			<tr>
				<th style="padding:3px;" class="bordered" width="50px"></th>
				<th style="padding:3px;" class="bordered" width="50px">N°</th>
				<th style="padding:3px;" class="bordered" width="100px">Codigo</th>
				<th style="padding:3px;" class="bordered" width="150px">Marca</th>
				<th style="padding:3px;" class="bordered" width="">Nombre</th>
				<th style="padding:3px;" class="bordered" width="190px">Categoria</th>
			</tr>
		</thead>
	<?
	$numrows_p = $offset;
	
	if( $count_productos > 0 ) {
		while($row_productos = mysqli_fetch_assoc($query_productos) ){
			$numrows_p = $numrows_p + 1;
			$producto_id 				= $row_productos['producto_id'];
			$producto_codigo 			= $row_productos['producto_codigo'];
			$producto_marca 			= $row_productos['producto_marca'];
			$producto_nombre 			= utf8_encode( $row_productos['producto_nombre'] );
			$producto_descripcion 		= utf8_encode( $row_productos['producto_descripcion'] );
			$producto_categoria_id 		= $row_productos['categoria_id'];
			
			
			if($producto_categoria_id <> '' ){
				$sql_categoria = "SELECT * FROM categorias WHERE categoria_id = ".$producto_categoria_id;
				$query_categoria 		= mysqli_query( $link, $sql_categoria );
				$count_categoria 		= mysqli_num_rows($query_categoria);
				if( $count_categoria > 0 ) {
					$row_categoria = mysqli_fetch_assoc( $query_categoria );
					$categoria_nombre = utf8_encode($row_categoria['categoria_nombre']);
				}
			}
			?>
			<tr>
				<td class="bordered" style="padding:2px;">
					<button></button>
				</td>
				<td class="bordered" style="padding:2px;"><?=$numrows_p?></td>
				<td class="bordered" style="padding:2px;">
					<?
					if($producto_codigo <> '' ){ 
						echo $producto_codigo;
					}else{ 
						echo"Sin Codigo";
					}
					
					?>
				</td>
				<td class="bordered" style="padding:2px;"><?=$producto_marca?></td>
				<td class="bordered" style="padding:2px;"><?=$producto_nombre?></td>
				<td class="bordered" style="padding:2px;">
						<?=$categoria_nombre?>
				</td>
			</tr>
			<?
		}
	} else {
		
		
		
	}
	?>
	</table>
</div>

<div class="one half half-padded centered">
<?
/******  build the pagination links ******/
	// range of num links to show
	$range = 3;

	// if not on page 1, don't show back links
	if ($currentpage > 1) {
		// show << link to go back to page 1
		echo " <a class='button' href='http://admin.insucompvalpo.cl/productos/page/1'><<</a> ";
		// get previous page num
		$prevpage = $currentpage - 1;
		// show < link to go back to 1 page
		echo " <a class='button' href='http://admin.insucompvalpo.cl/productos/page/$prevpage'><</a> ";
	}
	// end if 

	// loop to show links to range of pages around current page
	for ($x = ($currentpage - $range); $x < (($currentpage + $range) + 1); $x++) {
		// if it's a valid page number...
		if (($x > 0) && ($x <= $totalpages)) {
			// if we're on current page...
			if ($x == $currentpage) {
				// 'highlight' it but don't make a link
				echo "<button class='info'>$x</button> ";
				// if not current page...
			} else {
				// make it a link
				echo " <a class='button' href='http://admin.insucompvalpo.cl/productos/page/$x'>$x</a> ";
			} // end else
		}
		// end if 
	} 
	// end for
	
	// if not on last page, show forward and last page links        
	if ($currentpage != $totalpages) {
		// get next page
		$nextpage = $currentpage + 1;
		// echo forward link for next page 
		echo " <a class='button' href='http://admin.insucompvalpo.cl/productos/page/$nextpage'>></a> ";
		// echo forward link for lastpage
		echo " <a class='button' href='http://admin.insucompvalpo.cl/productos/page/$totalpages'>>></a> ";
	} // end if
	/****** end build pagination links ******/
	
?>
</div>





