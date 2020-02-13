<?php


	require 'http://www.christianmeza.com/prueba/cor/PHPMailerAutoload.php';
	
	$mail = new PHPMailer();
	
	$mail->isSMTP();
	$mail->SMTPAuth = true;
	$mail->SMTPSecure = 'tls';
	$mail->Host = 'smtp.gmail.com';
	$mail->Port = 587;
	
	$mail->Username = 'fjmiranda009@gmail.com'; //Correo de donde enviaremos los correos
	$mail->Password = 'fjayala009'; // Password de la cuenta de env�o
	
	$mail->setFrom('fjmiranda009@gmail.com', 'Emisor');
	$mail->addAddress('brmiranda009@gmail.com', 'Receptor'); //Correo receptor
	
	
	$mail->Subject = 'Titulo de correo';
	$mail->Body    = 'Contenido del correo';
	
	if($mail->send()) {
		echo 'Correo Enviado';
		} else {
		echo 'Error al enviar correo';
	}
?>