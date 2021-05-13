/////////////////////////////////////////////////////////////////////////
/*///////////////////////////////////////////////////////////////////////
06/06/2016
*////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////

	$( document ).ajaxStart(function() {
	  $( "#pleaseWaitDialog" ).show();
	}).ajaxStop(function() {
	  $( "#pleaseWaitDialog" ).hide();
	});
	
	function load(controller_name, id) {
		$.ajax({
			url: controller_name + "/resultado_ajax",
			type: "POST",
			data: {
				parametro: id
			},
			success: function(result) {
				$("#resultado").html(result);
			}
		});
	}

	//insertar
	function guardar(controller_name, view_name){
		
		var params1 = {
			url: controller_name + "/ingresa",
			type: "POST",
			success: function(result) {
				console.log(result);
				load(controller_name, 0);
			}
		}
		var params = '';
		
		if(view_name == 'afiliados') {
			params1.data = {
				parameter_nombres: $( "#afiliado_nombres" ).val(),
				parameter_apellidos: $( "#afiliado_apellidos" ).val(),
				parameter_password: $( "#afiliado_password" ).val(),
				parameter_email: $( "#afiliado_email" ).val()
			}
			
			$( "#afiliado_nombres" ).val('');
			$( "#afiliado_apellidos" ).val('');
			$( "#afiliado_password" ).val('');
			$( "#afiliado_email" ).val('');
			
		} 
		else if(view_name == 'planes'){
			params1.data = {
				plan_nombre: $( "#plan_nombre" ).val(),
				plan_servicio_id: $( "#plan_servicio_id" ).val(),
				plan_descripcion: $( "#plan_descripcion" ).val(),
				plan_cantidad_platos: $( "#plan_cantidad_platos" ).val(),
				plan_rango1_cantidad_min: $( "#plan_rango1_cantidad_min" ).val(),
				plan_rango1_cantidad_max: $( "#plan_rango1_cantidad_max" ).val(),
				plan_rango1_precio_porcion: $( "#plan_rango1_precio_porcion" ).val(),
				plan_rango2_cantidad_min: $( "#plan_rango2_cantidad_min" ).val(),
				plan_rango2_cantidad_max: $( "#plan_rango2_cantidad_max" ).val(),
				plan_rango2_precio_porcion: $( "#plan_rango2_precio_porcion" ).val(),
				plan_servicio_base: $( "#plan_servicio_base" ).val(),
				plan_precio_base: $( "#plan_precio_base" ).val()
			}
			
			$( "#plan_nombre" ).val('');
			$( "#plan_descripcion" ).val('');
			$( "#plan_cantidad_platos" ).val('');
			$( "#plan_rango1_cantidad_min" ).val('');
			$( "#plan_rango1_cantidad_max" ).val('');
			$( "#plan_rango1_precio_porcion" ).val('');
			$( "#plan_rango2_cantidad_min" ).val('');
			$( "#plan_rango2_cantidad_max" ).val('');
			$( "#plan_rango2_precio_porcion" ).val('');
			$( "#plan_servicio_base" ).val('');
			$( "#plan_precio_base" ).val('');
		}
		else if(view_name == 'platos'){
			params1.data = {
				parameter_nombre: $( "#platos_nombre" ).val() ,
				parameter_tipo: $( "#select_tipos" ).val()
			}
			
			$( "#platos_nombre" ).val('');
		}
		else if(view_name == 'admin'){
			params1.data = {
				parameter_nick: $( "#admin_nick" ).val(),
				parameter_nombre: $( "#admin_nombre" ).val(),
				parameter_password: $( "#admin_password" ).val(),
				parameter_email: $( "#admin_email" ).val(),
				parameter_tipo: $( "#select_tipos" ).val()
			}
			
			$( "#admin_nombre" ).val('');
			$( "#admin_nick" ).val('');
			$( "#admin_password" ).val('');
			$( "#admin_email" ).val('');
		}
		else if(view_name == 'menus'){
			params1.data = {
				parameter_servicio: $("#select_servicios").val(),
				parameter_nombre: $("#menus_nombre").val(),
				parameter_descripcion: $("#menus_descripcion").val()				
			}
			$( "#menus_nombre" ).val('');
			$( "#menus_descripcion" ).val('');
		}
		$.ajax(params1);
	}

	function actualizar(controller_name, view_name, num_id){
		var params1 ={
			url: controller_name + "/actualiza",
			type: "POST",
			success: function(result) {			
				console.log( result );
				load(controller_name, 0);
			}
		}
		var params = '';
		if(view_name == 'afiliados'){
			params1.data = {
				parametro_id: num_id,
				parametro_nombres: $( "#parametro_nombre_" + num_id + "" ).val(),
				parametro_apellidos: $( "#parametro_apellido_" + num_id + "" ).val(),
				parametro_fecha_nac: $( "#parametro_fecha_nac_" + num_id + "" ).val(),
				parametro_genero: $( "#parametro_genero_" + num_id + "" ).val(),
				parametro_nick: $( "#parametro_nick_" + num_id + "" ).val(),
				parametro_email: $( "#parametro_email_" + num_id + "" ).val()
			}
		} 
		else if(view_name == 'planes') {
			params1.data = {
				plan_id: num_id,
				plan_nombre: $( "#plan_nombre_" + num_id + "" ).val(),
				plan_descripcion: $( "#plan_descripcion_" + num_id + "" ).val(),
				plan_cantidad_platos: $( "#plan_cantidad_platos_" + num_id + "" ).val(),
				plan_rango1_cantidad_min: $( "#plan_rango1_cantidad_min_" + num_id + "" ).val(),
				plan_rango1_cantidad_max: $( "#plan_rango1_cantidad_max_" + num_id + "" ).val(),
				plan_rango1_precio_porcion: $( "#plan_rango1_precio_porcion_" + num_id + "" ).val(),
				plan_rango2_cantidad_min: $( "#plan_rango2_cantidad_min_" + num_id + "" ).val(),
				plan_rango2_cantidad_max: $( "#plan_rango2_cantidad_max_" + num_id + "" ).val(),
				plan_rango2_precio_porcion: $( "#plan_rango2_precio_porcion_" + num_id + "" ).val(),
				plan_servicio_base: $( "#plan_servicio_base_" + num_id + "" ).val(),
				plan_precio_base: $( "#plan_precio_base_" + num_id + "" ).val()
			}
			console.log(params1);
		}
		else if(view_name == "platos"){
			
			params1.data = {
				parametro_id: num_id,
				parametro_nombre: $( "#parametro_nombre_" + num_id + "" ).val(),
				parametro_nombre_sec: $( "#parametro_nombre_sec_" + num_id + "" ).val(),
				parametro_tipo: $( "#parametro_tipo_" + num_id + "" ).val(),
				parametro_desc: $( "#parametro_desc_" + num_id + "" ).val()
			}
		}
		else if(view_name == 'admin'){
			
			params1.data = {
				parameter_id: num_id,
				parameter_nick: $( "#parametro_nick_" + num_id + "" ).val(),
				parameter_nombre: $( "#parametro_nombre_" + num_id + "" ).val(),
				parameter_apellido: $( "#parametro_apellido_" + num_id + "" ).val(),
				parameter_email: $( "#parametro_email_" + num_id + "" ).val(),
				parameter_rol: $( "#parametro_rol_" + num_id + "" ).val()
			}
		}
		else if(view_name == 'menus'){
			params1.data = {
				parametro_id: num_id,
				parametro_servicio: $("#parametro_servicio_" + num_id + "").val(),
				parametro_nombre: $("#parametro_nombre_" + num_id + "").val(),
				parametro_descripcion: $("#parametro_descripcion_" + num_id + "").val()				
			}
		}
		$.ajax(params1);
	}

	function eliminar( controller_name, num_id ) {
		$.ajax({
			url: controller_name + "/elimina",
			type: "POST",
			data: {
				parametro_id: num_id
			},
			
			success: function(result) {
				$.ajax({
					url: controller_name + "/resultado_ajax",
					type: "POST",
					data: {
						parametro_id: "0"
					},
					success: function(result) {
						$("#resultado").html(result);
					}
				});
			}
		});
	}
	
	function activar( controller_name, num_id ) {
		$.ajax({
			url: controller_name + "/activar",
			type: "POST",
			data: {
				id: num_id
			},
			
			success: function(result) {
				$.ajax({
					url: controller_name + "/resultado_ajax",
					type: "POST",
					data: {
						parametro_id: "0"
					},
					success: function(result) {
						$("#resultado").html(result);
					}
				});
			}
		});
	}
	
	function desactivar( controller_name, num_id ) {
		$.ajax({
			url: controller_name + "/desactivar",
			type: "POST",
			data: {
				id: num_id
			},
			
			success: function(result) {
				$.ajax({
					url: controller_name + "/resultado_ajax",
					type: "POST",
					data: {
						parametro_id: "0"
					},
					success: function(result) {
						$("#resultado").html(result);
					}
				});
			}
		});
	}
	