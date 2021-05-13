$(document).ready( function () {

	var table1 = $('#table_platos').DataTable({
        "ordering": false,
        "info":     false,
		"bLengthChange" : false,
		"pageLength": 5,
		"pagingType": "simple"
	});
	
	if($("#enabled").val() == 'S'){
		$("#add_modal_btn").addClass('disabled');
	}
	else{
		$("#add_modal_btn").removeClass('disabled');
	}
	
	$('#table_platos tbody').on( 'click', 'tr', function () {
		$(this).toggleClass('selected');
	});
	
	 $('#add_modal_btn').click( function () {
		var menu_id = $("#menu_id").val();
		var arr = [];
		//Obtengo todas las filas seleccionadas dentro de mi dataTables
        $.each(table1.rows('.selected').data(), function() { 
            arr.push(this[0]);
		});
		
		//Ingreso Platos a la tabla de Menu_platos
		for(i = 0; i < arr.length; i++){
			$.ajax({
				url: "menus/set_platos_menu",
				type: "POST",
				data: {
						id_menu: menu_id,
						id_plato: arr[i]
					},
				success: function(result) {
					table1.row('.selected').remove().draw( false );
					$.ajax({
						url: "menus/get_menus_modal",
						type: "POST",
						data: {
								id: menu_id
							},
						success: function(result) {
							$("#modal_menu_plato").html(result);
						}
					});
				}
			});
		}
    });
}); 

	