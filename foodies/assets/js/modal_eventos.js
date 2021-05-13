$( document ).ajaxStart(function() {
		  $( "#myPleaseWait" ).modal('show');
		}).ajaxStop(function() {
		  $( "#myPleaseWait" ).modal('hide');
	});

$(document).ready( function () {
	$(function() {
		$( "#eventos_fecha" ).datepicker({ dateFormat: 'dd/mm/yy' });
	});
	$(function() {
		$( "#eventos_fecha_cierre_ventas" ).datepicker({ dateFormat: 'dd/mm/yy' });
	});
	$(function() {
		$( "#eventos_fecha_max_dscto" ).datepicker({ dateFormat: 'dd/mm/yy' });
	});
});

function validar_campos(edit){

	var error = true;
	
	if(!$("#eventos_nombre").valid())				{ error = false; }
	if(!$("#eventos_descripcion").valid())			{ error = false; }
	if(!$("#eventos_fecha").valid())				{ error = false; }
	if(!$("#eventos_region").valid())				{ error = false; }
	if(!$("#eventos_comuna").valid())				{ error = false; }
	if(!$("#eventos_direccion").valid())			{ error = false; }
	if(!$("#eventos_menus").valid())				{ error = false; }
	if(!$("#eventos_menu_tipo").valid())			{ error = false; }
	if(!$("#eventos_tiempo_menu").valid())			{ error = false; }
	if(!$("#eventos_cant_chef").valid())			{ error = false; }
	if(!$("#eventos_chef").valid())					{ error = false; }
	if(!$("#eventos_fecha_cierre_ventas").valid())	{ error = false; }
	if(!$("#eventos_cant_asistentes_min").valid())	{ error = false; }
	if(!$("#eventos_cant_asistentes_max").valid())	{ error = false; }
	if(!$("#eventos_precio").valid())				{ error = false; }
	
	if($("#eventos_descuento").val() != ''){		
		if(!$("#eventos_descuento").valid())		{ error = false; }
		if(!$("#eventos_fecha_max_dscto").valid())	{ error = false; }
	}
	
	if(edit == 'S'){
		if(!$("#eventos_estado").valid())		{ error = false; }
	}
	
	if(!error){ return false; }
	else{ return true; }
}

function modal_crear(){

	var mar = 'N'; // maridaje
	var pub = 'N'; // publicacion

	if(!validar_campos('N')){ return false; }
	
	if ( $('#eventos_maridaje').is(":checked") ){mar = "S";}
	if ( $('#eventos_publicacion').is(":checked") ){pub = "S";}
	
	 $.ajax({
		 url: "eventos/ingresa",
		 type: "POST",
		 data: {
			 nombre: $("#eventos_nombre").val(),
			 descripcion: $("#eventos_descripcion").val(),
			 fecha: $("#eventos_fecha").val(),
			 region: $("#eventos_region").val(),
			 comuna: $("#eventos_comuna").val(),
			 direccion: $("#eventos_direccion").val(),
			 menu: $("#eventos_menus").val(),
			 menu_tipo: $("#eventos_menu_tipo").val(),
			 menu_tiempo: $("#eventos_tiempo_menu").val(),
			 cant_chef: $("#eventos_cant_chef").val(),
			 chef: $("#eventos_chef").val(),
			 maridaje: mar,
			 fecha_cierre: $("#eventos_fecha_cierre_ventas").val(),
			 min: $("#eventos_cant_asistentes_min").val(),
			 max: $("#eventos_cant_asistentes_max").val(),
			 precio: $("#eventos_precio").val(),
			 descuento: $("#eventos_descuento").val(),
			 fecha_descuento: pub,
			 publicacion: $('#eventos_publicacion').is(":checked"),
			 comentario: $("#eventos_comentario").val()
		},
		 success: function(result) {
			$('#modal_formulario').modal('hide');
			$.ajax({
				url: "eventos/resultado_ajax",
				type: "POST",
				data: {
					parametro: 0
				},
				success: function(result) {
					$("#resultado").html(result);
				}
			});
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Status: " + textStatus); alert("Error: " + errorThrown); 
		} 
	 });
}
function modal_editar(num_id){
	
	var mar = 'N'; // maridaje
	var pub = 'N'; // publicacion
	
	if(!validar_campos('S')){ return false; }
	
	if ( $('#eventos_maridaje').is(":checked") ){ mar = "S"; }
	if ( $('#eventos_publicacion').is(":checked") ){ pub = "S"; }
	
	$.ajax({
		url: "eventos/actualiza",
		type: "POST",
		data: {
				id: num_id,
				nombre: $("#eventos_nombre").val(),
				descripcion: $("#eventos_descripcion").val(),
				fecha: $("#eventos_fecha").val(),
				region: $("#eventos_region").val(),
				comuna: $("#eventos_comuna").val(),
				direccion: $("#eventos_direccion").val(),
				menu: $("#eventos_menus").val(),
				menu_tipo: $("#eventos_menu_tipo").val(),
				menu_tiempo: $("#eventos_tiempo_menu").val(),
				cant_chef: $("#eventos_cant_chef").val(),
				chef: $("#eventos_chef").val(),
				maridaje: mar,
				fecha_cierre: $("#eventos_fecha_cierre_ventas").val(),
				min: $("#eventos_cant_asistentes_min").val(),
				max: $("#eventos_cant_asistentes_max").val(),
				precio: $("#eventos_precio").val(),
				descuento: $("#eventos_descuento").val(),
				estad: $("#eventos_estado").val(),
				fecha_descuento: $("#eventos_fecha_max_dscto").val(),
				publicacion: pub,
				comentario: $("#eventos_comentario").val(),
				estado: $("#eventos_estado").val()
			},
		success: function(result) {
			console.log(result);
			$('#modal_formulario').modal('hide');
			$.ajax({
				url: "eventos/resultado_ajax",
				type: "POST",
				data: {
					parametro: 0
				},
				success: function(result) {
					$("#resultado").html(result);
				}
			});
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Status: " + textStatus); alert("Error: " + errorThrown); 
		} 
	});
}