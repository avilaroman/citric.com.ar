<?php
require 'vendor/autoload.php';
use Mailgun\Mailgun;

if (isset($_POST['name']) && isset($_POST['email']) && isset($_POST['phone']) && isset($_POST['message'])) {
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['phone'];
	$message=$_POST['message'];
	$time=$_POST['time'];
	
	$text="Formulario de Contacto Rodina\n\r--------------------------\n\r\n\rNombre: $name\n\rEmail: $email\n\rTeléfono: $phone\n\rHorario de contacto: $time\n\rMensaje: $message";
	
	$mg = new Mailgun("key-0da84e2002fa1cfa2831ad1074129238");
	$domain = "mg.rodina.com.ar";
	
	$mg->sendMessage($domain, array('from'    => 'info@rodina.com.ar',
									'to'      => 'info@rodina.com.ar',
									'subject' => 'Contacto Rodina',
									'text'    => $text));
	echo 'sent';
	exit();
}else{
	die('error');
}
