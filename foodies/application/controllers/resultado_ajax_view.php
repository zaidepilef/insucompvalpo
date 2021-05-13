

		<table class='table table-condensed table-hover table-bordered table-striped'>
			<thead>
				<tr>
					<th>N°</th>
					<th>ID</th>
					<th>CLASE</th>
					<th>ITEM</th>
					<th>NOMBRE</th>
					<th>DESCRIPCION</th>
					<th width='40px'>ACTIVO</th>
					<th width='170px'></th>
				</tr>
			</thead>
			<?php
			
			$rows = 0;
			foreach( $parameter_dependiente as $parameter_dependiente_line ) { 
				$rows = $rows + 1;
			?>
				<tr>
					<td><? echo $rows;?></td>
					<td><? echo $parameter_dependiente_line['parametro_id'];?></td>
					<td><? echo $parameter_dependiente_line['parametro_clase'];?></td>
					<td><? echo $parameter_dependiente_line['parametro_item'];?></td>
					<td>
						<div id="div_nombre_a_<?=$parameter_dependiente_line['parametro_id']?>" style="display:none">
							<input id="parametro_nombre_<?=$parameter_dependiente_line['parametro_id']?>" class="form-control input-xs" value="<?echo $data_parameter_dependiente['parametro_nombre'];?>">
						</div>
						<div id="div_nombre_b_<?=$parameter_dependiente_line['parametro_id']?>" style="display:block">
							<?echo $parameter_dependiente_line['parametro_nombre'];?>
						</div>
					</td>
						
					<td>
						<div id="div_descripcion_a_<?=$parameter_dependiente_line['parametro_id']?>" style="display:none">
							<input id="parametro_descripcion_<?=$parameter_dependiente_line['parametro_id']?>" class="form-control input-xs" value="<?echo $data_parameter_dependiente['parametro_descripcion'];?>">
						</div>
						<div id="div_descripcion_b_<?=$parameter_dependiente_line['parametro_id']?>" style="display:block">
							<?echo $parameter_dependiente_line['parametro_descripcion'];?>		
						</div>
					</td>
						
					<td>
						<?if( $parameter_dependiente_line['parametro_estado'] == 'S' ) { ?>
							<input id="activar_<?=$parameter_dependiente_line['parametro_id']?>" type="checkbox" checked> 
						<? } else if( $parameter_dependiente_line['parametro_estado'] == 'N' ) {?>
							<input id="activar_<?=$parameter_dependiente_line['parametro_id']?>" type="checkbox"> 
						<? } ?>
					</td>
						
					<td>
						<div id="div_a_<?=$parameter_dependiente_line['parametro_id']?>" style="display:block">
							<input id="editar_<?=$parameter_dependiente_line['parametro_id']?>" type='button' class='btn btn-info btn-xs' value='EDITAR'>
						<? if( $parameter_dependiente_line['parametro_item'] <> 0 ) { ?>
							<input id="eliminar_<?=$parameter_dependiente_line['parametro_id']?>" type='button' class='btn btn-danger btn-xs' value='ELIMINAR'>
						<? } ?>
						</div>
						<div id="div_b_<?=$parameter_dependiente_line['parametro_id']?>" style="display:none">
							<input id="aceptar_<?=$parameter_dependiente_line['parametro_id']?>" type='button' class='btn btn-success btn-xs' value='ACEPTAR'>
							<input id="cancelar_<?=$parameter_dependiente_line['parametro_id']?>" type='button' class='btn btn-default btn-xs' value='CANCELAR'>
						</div>
					</td>
				</tr>
				<script>
					$(document).ready(function() {
						$( "#editar_<?=$parameter_dependiente_line['parametro_id']?>" ).click(function() {
							$( "#div_nombre_a_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','block');
							$( "#div_nombre_b_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','none');
							
							$( "#div_descripcion_a_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','block');
							$( "#div_descripcion_b_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','none');
							
							$( "#div_a_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','none');
							$( "#div_b_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','block');
						});
						
						$( "#cancelar_<?=$parameter_dependiente_line['parametro_id']?>" ).click(function() {
							$( "#div_nombre_a_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','none');
							$( "#div_nombre_b_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','block');
							
							$( "#div_descripcion_a_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','none');
							$( "#div_descripcion_b_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','block');
							
							$( "#div_a_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','block');
							$( "#div_b_<?=$parameter_dependiente_line['parametro_id']?>" ).css('display','none');
						});
						
						
						$( "#aceptar_<?=$parameter_dependiente_line['parametro_id']?>" ).click(function() {
							var nombre = $( "#parametro_nombre_<?=$parameter_dependiente_line['parametro_id']?>" ).val();
							var descripcion = $( "#parametro_descripcion_<?=$parameter_dependiente_line['parametro_id']?>" ).val();
							
							$.ajax({
								url: "parameters/actualiza_parameter",
								type: "POST",
								data: {
									parametro_id: <?=$parameter_dependiente_line['parametro_id']?>,
									parametro_nombre: nombre,
									parametro_descripcion: descripcion
								},
								
								success: function(result) {
									//console.log(result);
									var select_parametro = $('#select_parametro').val();
									$.ajax({
										url: "parameters/resultado_ajax",
										type: "POST",
										data: {
											parametro_padre_id: select_parametro
										},
										success: function(result) {
											$('#parameter_name').val('');
											$("#resultado").html(result);
											//console.log(result);
										}
									});
								}
							});
						});
						
						$( "#eliminar_<?=$parameter_dependiente_line['parametro_id']?>" ).click(function() {
							
							$.ajax({
								url: "parameters/elimina_parameter",
								type: "POST",
								data: {
									parametro_id: <?=$parameter_dependiente_line['parametro_id']?>
								},
								
								success: function(result) {
									//console.log(result);
									var select_parametro = $('#select_parametro').val();
									$.ajax({
										url: "parameters/resultado_ajax",
										type: "POST",
										data: {
											parametro_padre_id: select_parametro
										},
										success: function(result) {
											$('#parameter_name').val('');
											$("#resultado").html(result);
											//console.log(result);
										}
									});
								}
							});
						});
						
						$( "#activar_<?=$parameter_dependiente_line['parametro_id']?>" ).change(function() {
							if( $( this ).is( ":checked" ) ) {
								//alert('activado');
								$.ajax({
									url: "parameters/active_parameter",
									type: "POST",
									data: {
										parametro_id: <?=$parameter_dependiente_line['parametro_id']?>
									},
									success: function(result) {
										//console.log(result);
										var select_parametro = $('#select_parametro').val();
										$.ajax({
											url: "parameters/resultado_ajax",
											type: "POST",
											data: {
												parametro_padre_id: select_parametro
											},
											success: function(result) {
												$('#parameter_name').val('');
												$("#resultado").html(result);
											}
										});
									}
								});
							} else {
								//alert('desactivado');
								$.ajax({
									url: "parameters/desactive_parameter",
									type: "POST",
									data: {
										parametro_id: <?=$parameter_dependiente_line['parametro_id']?>
									},
									success: function(result) {
										//console.log(result);
										var select_parametro = $('#select_parametro').val();
										$.ajax({
											url: "parameters/resultado_ajax",
											type: "POST",
											data: {
												parametro_padre_id: select_parametro
											},
											success: function(result) {
												$('#parameter_name').val('');
												$("#resultado").html(result);
											}
										});
									}
								});
							}
						});
					});
				</script>
			<?php } ?>
			
			
		</table>
			
			
			
			
			
			