<?php

header("Content-Type: text/html;charset=UTF-8");

//Archivo de conexión a la base de datos
require('conexion.php');

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

	
//for($i=0;$i<=count($arreglo_destinatarios)-1;$i++)
//{
//	$arreglo_destinatarios[$i] = strtr($arreglo_destinatarios[$i], ",", ";");
//	$cadCorreo = $cadCorreo.$arreglo_destinatarios[$i];
//}

	
	
//for($i=0;$i<=count($arreglo_destinatarios)-1;$i++){
//	$destinatarios[$i]=$arreglo_destinatarios[$i];
//}


$objClienteSOAP = new soapclient('http://sinavef.senasica.gob.mx/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
//$objClienteSOAP = new soapclient('http://localhost:49556/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
$params = array('cadCorreo' => $cadCorreo, 'mensaje' => $mensajeCorreo);
$objClienteSOAP->correoUnico($params);

//enviando correo


//$GoTo = '/listado.php?mod='.$area;
	
$mensaje = "<p>Mensaje Enviado.</p>";

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>


