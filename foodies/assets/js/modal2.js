$(document).ready( function () {

	var table = $('#table_menu_plato').DataTable({
        "ordering": false,
        "info":     false,
		"bLengthChange" : false,
		"pageLength": 5,
		"pagingType": "simple",
	});
	
	if($("#enabled").val() == 'S'){
		$("#del_modal_btn").addClass('disabled');
	}
	else{
		$("#del_modal_btn").removeClass('disabled');
	}
	
	$('#table_menu_plato tbody').on( 'click', 'tr', function () {
		$(this).toggleClass('selected');
	});
	
	 $('#del_modal_btn').click( function () {
		var menu_id = $("#menu_id").val();
		var arr = [];
		//Obtengo todas las filas seleccionadas dentro de mi dataTables
        $.each(table.rows('.selected').data(), function() { 
            arr.push(this[0]);
        });

		//Elimina Platos a la tabla de Menu_platos
		for(i = 0; i < arr.length; i++){
			$.ajax({
				url: "menus/delete_platos_menu",
				type: "POST",
				data: {
						id_menu_plato: arr[i]
					},
				success: function(result) {
					table.row('.selected').remove().draw( false );
					$.ajax({
						url: "menus/get_platos_modal",
						type: "POST",
						data: {
								id: menu_id
							},
						success: function(result) {
							$("#modal_platos").html(result);
						}
					});
				}
			});
		}
    });
}); 
