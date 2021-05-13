//ingresa_imagen(archivo)
	function ingresa_image( imagenes_tipo , imagen_item_id){
		$.ajax({
			url: 'php/upload.php', 
			data: {
				imagenes_tipo: imagenes_tipo,
				imagen_item_id: imagen_item_id
			},
			cache: false,
			contentType: false,
			processData: false,
			type: 'POST',
			success: function(result){
				carga_listado_image( imagenes_tipo , imagen_item_id);
			}
		});
	}
	
	//carga el likstado de las imagnes
	function carga_listado_image( imagen_tipo , imagen_item_id ){
		$.ajax({
			url: "imagenes/modal_imagen",
			type: "POST",
			data: {
				imagen_tipo: imagen_tipo,
				imagen_item_id: imagen_item_id
			},
			success: function(result) {
				$("#modal_contenido").html(result);
			}
		});
	}
	
	//abre el modal de la imagenes
	function modal_image( imagen_tipo , imagen_item_id){
		$.ajax({
			url: "imagenes/modal_imagen",
			type: "POST",
			data: {
				imagen_tipo: imagen_tipo,
				imagen_item_id: imagen_item_id
			},
			success: function(result) {
				$("#modal_contenido").html(result);
			}
		});
		$('#myModal').modal('show');
	}
	
// $(document).ready( function () {
	// $('#tabla_platos').DataTable();
// });
function editar(num_id){
	$( "#div_nombre_a_"+num_id+"" ).css('display','block');
	$( "#div_nombre_b_"+num_id+"" ).css('display','none');
	
	$( "#div_nombre_sec_a_"+num_id  ).css('display','block');
	$( "#div_nombre_sec_b_"+num_id  ).css('display','none');
	
	$( "#div_tipo_a_"+num_id  ).css('display','block');
	$( "#div_tipo_b_"+num_id  ).css('display','none');
	
	$( "#div_desc_a_"+num_id  ).css('display','block');
	$( "#div_desc_b_"+num_id  ).css('display','none');
	
	$( "#div_a_"+num_id+""  ).css('display','none');
	$( "#div_b_"+num_id+""  ).css('display','block');
}

function cancelar(num_id){
	$( "#div_nombre_a_"+num_id+"" ).css('display','none');
	$( "#div_nombre_b_"+num_id+"" ).css('display','block');
	
	$( "#div_nombre_sec_a_"+num_id+"" ).css('display','none');
	$( "#div_nombre_sec_b_"+num_id+"" ).css('display','block');
	
	$( "#div_tipo_a_"+num_id+"" ).css('display','none');
	$( "#div_tipo_b_"+num_id+"" ).css('display','block');
	
	$( "#div_desc_a_"+num_id+"" ).css('display','none');
	$( "#div_desc_b_"+num_id+"" ).css('display','block');
	
	$( "#div_a_"+num_id+"" ).css('display','block');
	$( "#div_b_"+num_id+"" ).css('display','none');
}

function acivar_desactivar(num_id) {
	if( $( "#activar_"+num_id ).is( ":checked" ) ) {
		$.ajax({
			url: "platos/activar",
			type: "POST",
			data: {
				parametro_id: num_id
			},
			success: function(result) {
				$.ajax({
					url: "platos/resultado_ajax",
					type: "POST",
					data: {
						parametro_id: 0
					},
					success: function(result) {
						$("#resultado").html(result);
					}
				});
			}
		});
	} 
	else {
		$.ajax({
			url: "platos/desactivar",
			type: "POST",
			data: {
				parametro_id: num_id
			},
			success: function(result) {
				$.ajax({
					url: "platos/resultado_ajax",
					type: "POST",
					data: {
						parametro_id: 0
					},
					success: function(result) {
						$("#resultado").html(result);
					}
				});
			}
		});
	}
}

