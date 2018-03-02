<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];
	$time=$_POST['time'];
	
	$text="Formulario de Contacto de BianchiLatina.com\n\r--------------------------\n\r\n\rNombre: $name\n\rEmail: $email\n\rTeléfono: $phone\n\rHorario de contacto: $time\n\rMensaje: $message";
	
	$mg = new Mailgun("key-9a71aa6d38dce2fe0fcd84d7b89b9cbe");
	$domain = "edet.com.ar";
	
	$mg->sendMessage($domain, array('from'    => 'info@BianchiLatina.com',
									'to'      => 'bianchilatina@hotmail.com',
									'subject' => 'Nuevo Cliente para Llamar',
									'text'    => $text));
	echo 'sent';
	exit();
}else{
	die('error');
}
