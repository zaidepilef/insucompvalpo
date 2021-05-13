$( document ).ajaxStart(function() {
		  $( "#myPleaseWait" ).modal('show');
		}).ajaxStop(function() {
		  $( "#myPleaseWait" ).modal('hide');
	});

function validar_campos(){

	var error = true;
	
	if(!$("#planes_nombre").valid())				{ error = false; }
	if(!$("#planes_descripcion").valid())			{ error = false; }
	if(!$("#planes_servicio").valid())				{ error = false; }
	if(!$("#planes_cantidad_platos").valid())		{ error = false; }
	if(!$("#planes_servicio_base").valid())			{ error = false; }
	if(!$("#planes_precio_base").valid())			{ error = false; }
	
	if(!$("#planes_rango1_min").valid())			{ error = false; }
	if(!$("#planes_rango1_max").valid())			{ error = false; }
	if(!$("#planes_precio_1").valid())				{ error = false; }
	if(!$("#planes_rango1_precio_chef").valid())	{ error = false; }
	
	if(!$("#planes_rango2_min").valid())			{ error = false; }
	if(!$("#planes_rango2_max").valid())			{ error = false; }
	if(!$("#planes_precio_2").valid())				{ error = false; }
	if(!$("#planes_rango2_precio_chef").valid())	{ error = false; }
	
	if(!$("#planes_estado").valid())				{ error = false; }
	
	if(!error){ 
		return false;
	}else{ 
		return true; 
	}
}

function modal_crear(){

	if(!validar_campos()){ return false; }
	
	 $.ajax({
		 url: "planes/ingresa",
		 type: "POST",
		 data: {
			plan_nombre: $( "#planes_nombre" ).val(),
			plan_servicio_id: $( "#planes_servicio" ).val(),
			plan_descripcion: $( "#planes_descripcion" ).val(),
			plan_cantidad_platos: $( "#planes_cantidad_platos" ).val(),
			
			plan_rango1_cantidad_min: $( "#planes_rango1_min" ).val(),
			plan_rango1_cantidad_max: $( "#planes_rango1_max" ).val(),
			plan_rango1_precio_porcion: $( "#planes_precio_1" ).val(),
			plan_rango1_precio_chef: $( "#planes_rango1_precio_chef" ).val(),
			
			plan_rango2_cantidad_min: $( "#planes_rango2_min" ).val(),
			plan_rango2_cantidad_max: $( "#planes_rango2_max" ).val(),
			plan_rango2_precio_porcion: $( "#planes_precio_2" ).val(),
			plan_rango2_precio_chef: $( "#planes_rango2_precio_chef" ).val(),
			
			plan_servicio_base: $( "#planes_servicio_base" ).val(),
			plan_precio_base: $( "#planes_precio_base" ).val(),
			
			plan_estado: $( "#planes_estado" ).val()
		},
		 success: function(result) {
			$('#modal_formulario').modal('hide');
			$.ajax({
				url: "planes/resultado_ajax",
				type: "POST",
				data: {
					parametro: 0
				},
				success: function(result) {
					$("#resultado").html(result);
					//alert(result); 
				}
			});
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Status: " + textStatus); alert("Error: " + errorThrown); 
		} 
	 });
}
function modal_editar(num_id){
	
	if(!validar_campos()){ return false; }
	
	$.ajax({
		url: "planes/actualiza",
		type: "POST",
		data: {
				plan_id: num_id,
				plan_nombre: $( "#planes_nombre" ).val(),
				plan_servicio_id: $( "#planes_servicio" ).val(),
				plan_descripcion: $( "#planes_descripcion" ).val(),
				plan_cantidad_platos: $( "#planes_cantidad_platos" ).val(),
				
				plan_rango1_cantidad_min: $( "#planes_rango1_min" ).val(),
				plan_rango1_cantidad_max: $( "#planes_rango1_max" ).val(),
				plan_rango1_precio_porcion: $( "#planes_precio_1" ).val(),
				plan_rango1_precio_chef: $( "#planes_rango1_precio_chef" ).val(),
				
				plan_rango2_cantidad_min: $( "#planes_rango2_min" ).val(),
				plan_rango2_cantidad_max: $( "#planes_rango2_max" ).val(),
				plan_rango2_precio_porcion: $( "#planes_precio_2" ).val(),
				plan_rango2_precio_chef: $( "#planes_rango2_precio_chef" ).val(),
				
				plan_servicio_base: $( "#planes_servicio_base" ).val(),
				plan_precio_base: $( "#planes_precio_base" ).val(),
				plan_estado: $( "#planes_estado" ).val()
		},
		success: function(result) {
			console.log(result);
			$('#modal_formulario').modal('hide');
			$.ajax({
				url: "planes/resultado_ajax",
				type: "POST",
				data: {
					parametro: 0
				},
				success: function(result) {
					$("#resultado").html(result);
					//alert(result); 
				}
			});
		},
		error: function(XMLHttpRequest, textStatus, errorThrown) { 
			alert("Status: " + textStatus); 
			alert("Error: " + errorThrown); 
		} 
	});
}