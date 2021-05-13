$( document ).ajaxStart(function() {
	  $( "#myPleaseWait" ).modal('show');
	}).ajaxStop(function() {
	  $( "#myPleaseWait" ).modal('hide');
});
	
$(document).ready( function () {
	$('#tabla_menus').DataTable();
}); 

function addPlatos(num_id, nombre_menu){
	$.ajax({
		url: "menus/get_platos_modal",
		type: "POST",
		data: {
				id: num_id
			},
		success: function(result) {
			$("#modal_platos").html(result);
		}
	});
	
	$.ajax({
		url: "menus/get_menus_modal",
		type: "POST",
		data: {
				id: num_id
			},
		success: function(result) {
			$("#modal_menu_plato").html(result);
		}
	});
	$("#menu_id").val(num_id);
	$("#enabled").val('N');
	$("#titleModal").text("Platos Menu " + nombre_menu);
	$('#myModal').modal('show');
}

function verPlatos(num_id, nombre_menu){
	$.ajax({
		url: "menus/get_platos_modal",
		type: "POST",
		data: {
				id: num_id
			},
		success: function(result) {
			$("#modal_platos").html(result);
		}
	});
	
	$.ajax({
		url: "menus/get_menus_modal",
		type: "POST",
		data: {
				id: num_id
			},
		success: function(result) {
			$("#modal_menu_plato").html(result);
		}
	});
	$("#menu_id").val(num_id);
	$("#enabled").val('S');
	$("#titleModal").text("Platos Menu " + nombre_menu);
	$('#myModal').modal('show');
}

function editar(num_id){
	$( "#div_servicio_a_"+num_id+"" ).css('display','block');
	$( "#div_servicio_b_"+num_id+"" ).css('display','none');
	
	$( "#div_nombre_a_"+num_id+"" ).css('display','block');
	$( "#div_nombre_b_"+num_id+"" ).css('display','none');
	
	$( "#div_descripcion_a_"+num_id+"" ).css('display','block');
	$( "#div_descripcion_b_"+num_id+"" ).css('display','none');
	
	$( "#div_a_"+num_id+""  ).css('display','none');
	$( "#div_b_"+num_id+""  ).css('display','block');
}

function cancelar(num_id){
	
	$( "#div_servicio_a_"+num_id+"" ).css('display','none');
	$( "#div_servicio_b_"+num_id+"" ).css('display','block');

	$( "#div_nombre_a_"+num_id+"" ).css('display','none');
	$( "#div_nombre_b_"+num_id+"" ).css('display','block');
	
	$( "#div_descripcion_a_"+num_id+"" ).css('display','none');
	$( "#div_descripcion_b_"+num_id+"" ).css('display','block');
	
	$( "#div_a_"+num_id+"" ).css('display','block');
	$( "#div_b_"+num_id+"" ).css('display','none');
}

function acivar_desactivar(num_id) {
	if( $( "#activar_"+num_id ).is( ":checked" ) ) {
		$.ajax({
			url: "menus/activar",
			type: "POST",
			data: {
				parametro_id: num_id
			},
			success: function(result) {
				$.ajax({
					url: "menus/resultado_ajax",
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
			url: "menus/desactivar",
			type: "POST",
			data: {
				parametro_id: num_id
			},
			success: function(result) {
				$.ajax({
					url: "menus/resultado_ajax",
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