<?php
require("class.phpmailer.php"); //Importamos la función PHP class.phpmailer

$mail = new PHPMailer();

$mail->SMTPOptions = array( 'ssl' => array( 'verify_peer' => false, 'verify_peer_name' => false, 'allow_self_signed' => true ) );



$mail->IsSMTP();
$mail->SMTPAuth = true; // True para que verifique autentificación de la cuenta o de lo contrario False
$mail->Username = "vecl27@gmail.com";

// Tu cuenta de e-mail
$mail->Password = "Siegfried8"; // El Password de tu casilla de correos
$mail->Host = "smtp.gmail.com";
$mail->Port = 465;
$mail->SMTPSecure = 'ssl';
$mail->From = "vecl27@gmail.com";
$mail->FromName = "luis vera";
$mail->Subject = "Asunto";
$mail->AddAddress("vecl27@gmail.com","yo mismo gmail");

$mail->Protocol = "mail";


  

$mail->WordWrap = 50;

$body = "Hola, este es un…";
$body .= "mensaje de prueba";

$mail->Body = $body;

$mail->Send();

// Notificamos al usuario del estado del mensaje

if(!$mail->Send()){
echo "No se pudo enviar el Mensaje.";
}else{
echo "Mensaje enviado";
}

?>