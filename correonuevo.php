    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

<title>Formulario</title> <!-- Aquí va el título de la página -->
<script type="text/javascript">
      function submitForm() {
   // Get the first form with the name
   // Hopefully there is only one, but there are more, select the correct index
   var frm = document.getElementById('form1');
   frm.submit(); // Submit
   frm.reset();  // Reset
   return false; // Prevent page refresh
}
    </script>

</head>

<body>
<?php

$Nombre = $_POST['Nombre'];
$Email = $_POST['Email'];
$Mensaje = $_POST['Mensaje'];
$Telefono = $_POST['Telefono'];    

if ($Nombre=='' || $Email=='' || $Mensaje=='' || $Telefono==''){

    echo "<script>alert('Los campos marcados con * son obligatorios');location.href ='javascript:history.back()';</script>";

}else{


    require("archivosformulario/class.phpmailer.php");
    $mail = new PHPMailer();    
    $mail->From     = $Email;
    $mail->FromName = $Nombre; 
    $mail->AddAddress("luis.vera.c@senasica.gob.mx"); // Dirección a la que llegaran los mensajes.

    // Aquí van los datos que apareceran en el correo que reciba
    //adjuntamos un archivo 

    $mail->WordWrap = 50; 
    $mail->IsHTML(true);     
    $mail->Subject  =  "Comentarios Tiendas El Golazo";
    $mail->Body     =  "Nombre: $Nombre \n<br />".    
    "Email: $Email \n<br />".    
    "Mensaje: $Mensaje \n<br />".
    "Telefono: $Telefono \n<br />";       

    // Datos del servidor SMTP

    $mail->IsSMTP(); 
    $mail->Host = "ssl://smtp.gmail.com:465";  // Servidor de Salida.
	$mail->Port = 465;
	$mail->SMTPSecure = 'ssl';
    $mail->SMTPAuth = true; 
    $mail->Username = "vecl27@gmail.com";  // Correo Electrónico
    $mail->Password = "Siegfried8"; // Contraseña

    if ($mail->Send())
    echo "<script>alert('Formulario enviado exitosamente, le responderemos lo más pronto posible.');
            location.href ='contactanos.html';
            </script>";    

    else
    echo "<script>alert('Error al enviar el formulario');location.href ='javascript:history.back()';</script>";

}

?>
</body>
</html>