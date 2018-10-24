<?php

header("Content-Type: text/html;charset=UTF-8");

//Archivo de conexión a la base de datos
//require('conexion.php');

//Variable de búsqueda
$mensajeCorreo = isset($_POST['mensajeC']) ? $_POST['mensajeC'] : null;
$arreglo_destinatarios = isset($_POST['listaEmail']) ? $_POST['listaEmail'] : null;


$cadCorreo = $arreglo_destinatarios;

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
$mensajeCorreo = str_replace($caracteres_malos, $caracteres_buenos, $mensajeCorreo);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";

/*
$objClienteSOAP = new soapclient('http://sinavef.senasica.gob.mx/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
//$objClienteSOAP = new soapclient('http://localhost:49556/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
$params = array('cadCorreo' => $cadCorreo, 'mensaje' => $mensajeCorreo);
$objClienteSOAP->correoUnico($params);
*/

//Prueba.

// Varios destinatarios
$para  = 'luis.vera.c@senasica.gob.mx' . ', '; // atención a la coma
$para .= 'luis.vera@tecnoaplicada.com';

// título
$título = 'Mensaje de Prueba PHP';

// mensaje
$mensaje = '
<html>
<head>
  <title>Recordatorio de cumpleaños para Agosto</title>
</head>
<body>
  <p>¡Estos son los cumpleaños para Agosto!</p>
  <table>
    <tr>
      <th>Quien</th><th>Día</th><th>Mes</th><th>Año</th>
    </tr>
    <tr>
      <td>Joe</td><td>3</td><td>Agosto</td><td>1970</td>
    </tr>
    <tr>
      <td>Sally</td><td>17</td><td>Agosto</td><td>1973</td>
    </tr>
  </table>
</body>
</html>
';

// Para enviar un correo HTML, debe establecerse la cabecera Content-type
$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

// Cabeceras adicionales
$cabeceras .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
$cabeceras .= 'From: Recordatorio <cumples@example.com>' . "\r\n";
$cabeceras .= 'Cc: birthdayarchive@example.com' . "\r\n";
$cabeceras .= 'Bcc: birthdaycheck@example.com' . "\r\n";

$from= "vecl27@gmail.com"; //make sure that this is a real email 


//ini_set('SMTP','localhost');
//ini_set('smtp_port',25);


// Enviarlo
mail($para, $título, $mensaje, $cabeceras, "-f{$from}");

/*
   $subject    = 'Subject';
   $headers   = $cabeceras;


   $content          = "Prueba";
   $from_name      = 'Yo';
   $from               = 'luis.vera.c@senasica.gob.mx';
   $mail                = new PHPMailer();
   $mail->IsSMTP(); // telling the class to use SMTP
   //$mail->Host                    = "smtp.gmail.com";
   $mail->Host                    = "correo.senasica.gob.mx";
   $mail->Port                    = 25;
   $mail->SMTPAuth                = true;
   $mail->SMTPSecure              = "tls";
   $mail->Username                = "luis.vera.c@senasica.gob.mx";
   $mail->Password                = "senasica3";
   $mail->FromName                = $from_name;
   $mail->From                    = $from;
   $mail->AddAddress('luis.vera@tecnoaplicada.com','vecl27@gmail.com');
   $mail->Subject                = $subject;
   $mail->MsgHTML($content);
   $result                        = $mail->Send(); 
*/

// El mensaje
//$mensaje = $mensajeCorreo;//"Línea 1\r\nLínea 2\r\nLínea 3";

// Si cualquier línea es más larga de 70 caracteres, se debería usar wordwrap()
//$mensaje = wordwrap($mensaje, 70, "\r\n");

// Enviarlo
//mail('luis.vera.c@senasica.gob.mx', 'Mensaje de prueba', $mensaje);



//enviando correo


//$GoTo = '/listado.php?mod='.$area;
	
$mensaje = "<p>Mensaje Enviado.</p>";

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>


