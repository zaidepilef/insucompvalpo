$(document).ready( function () {
$('#tabla_afiliados').DataTable();
});

function editar(num_id){
	$( "#div_nombre_a_"+num_id+"" ).css('display','block');
	$( "#div_nombre_b_"+num_id+"" ).css('display','none');
	
	$( "#div_apellido_a_"+num_id  ).css('display','block');
	$( "#div_apellido_b_"+num_id  ).css('display','none');
	
	$( "#div_fecha_nac_a_"+num_id  ).css('display','block');
	$( "#div_fecha_nac_b_"+num_id  ).css('display','none');
	
	$( "#div_genero_a_"+num_id  ).css('display','block');
	$( "#div_genero_b_"+num_id  ).css('display','none');
	
	$( "#div_nick_a_"+num_id  ).css('display','block');
	$( "#div_nick_b_"+num_id  ).css('display','none');
	
	$( "#div_email_a_"+num_id  ).css('display','block');
	$( "#div_email_b_"+num_id  ).css('display','none');
	
	$( "#div_a_"+num_id+""  ).css('display','none');
	$( "#div_b_"+num_id+""  ).css('display','block');
}

function cancelar(num_id){
	$( "#div_nombre_a_"+num_id+"" ).css('display','none');
	$( "#div_nombre_b_"+num_id+"" ).css('display','block');
	
	$( "#div_apellido_a_"+num_id+"" ).css('display','none');
	$( "#div_apellido_b_"+num_id+"" ).css('display','block');
	
	$( "#div_fecha_nac_a_"+num_id+"" ).css('display','none');
	$( "#div_fecha_nac_b_"+num_id+"" ).css('display','block');
	
	$( "#div_genero_a_"+num_id+"" ).css('display','none');
	$( "#div_genero_b_"+num_id+"" ).css('display','block');
	
	$( "#div_nick_a_"+num_id+"" ).css('display','none');
	$( "#div_nick_b_"+num_id+"" ).css('display','block');
	
	$( "#div_email_a_"+num_id+"" ).css('display','none');
	$( "#div_email_b_"+num_id+"" ).css('display','block');
	
	$( "#div_a_"+num_id+"" ).css('display','block');
	$( "#div_b_"+num_id+"" ).css('display','none');
}