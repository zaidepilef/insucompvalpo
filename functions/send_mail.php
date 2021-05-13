<?php
	error_reporting(0);
	$name_recipient  	= $_POST['name_recipient'];
	$email_recipient 	= $_POST['email_recipient'];
	$name_empresa		= $_POST['name_empresa'];
	$from				= 'noreply@insucomp.nexzaid.net';
	$subject_type		= $_POST['subject'];
	$message_txt		= $_POST['message_txt'];
	
	$subject = "Alguin desea contctarse con Insucomp";
	
	$message = "Alguien desea contactarse con ustedes con el motivo de ".$subject_type.". Su nombre es ".$name_recipient.", y su correo es ".$email_recipient.". Escribe en representacion de la empresa o institucion ".$name_empresa.". El mensaje es ".$message_txt."";

	require_once '../PHPMailer/PHPMailerAutoload.php';

	$mail = new PHPMailer;

	$mail->Mailer		= 'smtp';
	$mail->isSMTP();						// Set mailer to use SMTP
	$mail->Host			= 'argoz.fullxhosting.cl';		//Specify main and backup SMTP servers
	$mail->Helo			= 'http://insucomp.nexzaid.net';		//Muy importante para que llegue a hotmail y otros
	$mail->SMTPAuth		= false;						// Enable SMTP authentication
	$mail->Username		= 'noreply@insucomp.nexzaid.net';	// SMTP username
	$mail->Password		= 'noreply20152015';				// SMTP password
	$mail->SMTPSecure	= 'ssl';					// Enable encryption, 'ssl' also accepted
	$mail->Port			= 465;
	$mail->SMTPDebug	= 0;
	
	$mail->From = $from;
	$mail->FromName	= 'Notificacion de contacto Insucomp';
	$mail->headers	= 'MIME-Version: 1.0' . '\r\n';
	$mail->headers	.= 'Content-type: text/html; charset=iso-8859-1' . '\r\n'; 
	$mail->headers	.= 'X-Mailer: Insucomp sistema de envio de correo' . '\r\n';
	$mail->headers	.= 'Organization: \r\n';
	$mail->headers	.= 'X-Priority: 1 (Highest)\n';
	$mail->headers	.= 'X-MSMail-Priority: High\n';
	$mail->headers	.= 'Importance: High\n';
	$mail->Timeout	= 100;
	$mail->addAddress('ventas@insucomp-valpo.cl');							// Add a recipient
	$mail->addReplyTo('fel.di.rod@gmail.com', 'Information');

	//$mail->addBCC('anibal.zaidor@gmail.com');
	//$mail->addCC('cc@example.com');

	//$mail->WordWrap = 550;                                 // Set word wrap to 50 characters
	//$mail->AddAttachment('https://www.mallfix.com/images/logo.png', 'logo.png');      // Add attachments
	$mail->isHTML(false);                                  // Set email format to HTML

	$mail->Subject = $subject;
	$mail->Body    = $message;
	//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients'; 

	if(!$mail->send()) {
		$response_status = 'mensaje_no_fue_enviado: ' . $mail->ErrorInfo;
		header('Location: http://www.insucomp.nexzaid.net/contacto.php?response='.$response_status);
		$mail->ClearAddresses();
	} else {
		$response_status = 'Mensaje_fue_exitoso';
		header('Location: http://www.insucomp.nexzaid.net/contacto.php?response='.$response_status);
		$mail->ClearAddresses();
	}
?>
	