	$( document ).ajaxStart(function() {
		  $( "#myPleaseWait" ).modal('show');
		}).ajaxStop(function() {
		  $( "#myPleaseWait" ).modal('hide');
	});
	
	$(document).ready( function () {
		$('#tabla_eventos').DataTable({
			"ordering": false,
			"info":     false,
			"bLengthChange" : false
		});
	});
	
	function abrir_ingreso(){
		$.ajax({
			url: "eventos/modal_ingresar",
			type: "POST",
			data: {
				flag: "crea"
			},
			success: function(result) {
				$("#body_modal").html(result);
			}
		});
		$('#modal_formulario').modal('show');
	}
	
	function abrir_editar(num_id){
		$.ajax({
			url: "eventos/modal_editar",
			type: "POST",
			data: {
				id: num_id
			},
			success: function(result) {
				$("#body_modal").html(result);
			}
		});
		$('#modal_formulario').modal('show');
	}
	
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
		$('#modal_imagen').modal('show');
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

function editar(num_id){
	//cargar datos al modal//
	$('#modal_formulario').modal('show');
}