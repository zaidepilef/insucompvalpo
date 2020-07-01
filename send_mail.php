<?php
	
	$name_recipient  	= $_POST['name_recipient'];
	$email_recipient 	= $_POST['email_recipient'];
	$name_empresa		= $_POST['name_empresa'];
	$from				= 'noreply@insucomp.nexzaid.net';
	$subject_type		= $_POST['subject'];
	$message_txt		= $_POST['message_txt'];
	
	$subject = "Alguien desea contactarse con Insucomp-Valpo";
	
	$message = "Alguien desea contactarse con ustedes con el motivo de ".$subject_type.". Su nombre es ".$name_recipient.", y su correo es ".$email_recipient.". Escribe en representacion de la empresa o institucion ".$name_empresa.". El mensaje es ".$message_txt."";
	
	
	$mail = "Prueba de mensaje";
	//Titulo
	$titulo = "PRUEBA DE TITULO";
	//cabecera
	$headers = "MIME-Version: 1.0\r\n"; 
	$headers .= "Content-type: text/html; charset=iso-8859-1\r\n"; 
	//dirección del remitente 
	$headers .= "From: Contacto de Insucomp-Valpo <ventas@insucomp-valpo.cl>\r\n";
	//$headers .= "Cco: fel.di.rod@gmail.com";
	//Enviamos el mensaje a info@geekytheory.com
	
	
	
	
	
	
	$bool = mail("ventas@insucomp-valpo.cl",$subject,$message,$headers);
	if($bool){
		mail("fel.di.rod@gmail.com",$subject,$message,$headers);
		header('Location: http://www.insucomp.nexzaid.net/contacto.php');
	}else{
		header('Location: http://www.insucomp.nexzaid.net/contacto.php?error');
	}
?>