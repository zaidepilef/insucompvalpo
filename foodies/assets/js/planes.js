	
	
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
	
	///data table
	$(document).ready( function () {
		$('#tabla_planes').DataTable();
	});
	
	function abrir_ingreso(){
		$.ajax({
			url: "planes/modal_ingresar",
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
			url: "planes/modal_editar",
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