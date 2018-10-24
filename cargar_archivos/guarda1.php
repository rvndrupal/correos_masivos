<?php

	header("Content-Type: text/html;charset=UTF-8");

	//Variable de búsqueda
	$mensajeCorreo = isset($_POST['mensajeCorreo']) ? $_POST['mensajeCorreo'] : null;
	$arreglo_destinatarios = isset($_POST['var_correos']) ? $_POST['var_correos'] : null;
	
	
	//$adjunto = 'alerta_gif.gif';
	$adjunto = '';


	$cadCorreo = $arreglo_destinatarios;

	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
	$mensajeCorreo = str_replace($caracteres_malos, $caracteres_buenos, $mensajeCorreo);

	//Variable vacía (para evitar los E_NOTICE)
	$mensaje = "";
	
/*	$mensaje = $mensaje.' Mensaje de correo : '.$mensajeCorreo.'<br>';
	$mensaje = $mensaje.' Direcciones de correo : '.$arreglo_destinatarios.'<br>';
	$mensaje = $mensaje.' Archivo adjunto : '.$adjunto.'<br>';
	
*/

	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES["archivo"]["name"][$key]) 
		{			
			$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '\\\\10.24.17.53\\attachments\\'; //Declaramos un  variable con la ruta donde guardaremos los archivos
				
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
				
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) 
			{	
				$mensaje = $mensaje."El archivo $filename se ha almacenado en forma exitosa.<br>";
				$adjunto = $adjunto.$filename.';';
			} 
			else 
			{	
				$mensaje = $mensaje. "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
			}
			
			closedir($dir); //Cerramos el directorio de destino
		}
	}

	
	//Filtro anti-XSS

	$objClienteSOAP = new soapclient('http://sinavef.senasica.gob.mx/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
	//$objClienteSOAP = new soapclient('http://localhost:49556/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
	$params = array('cadCorreo' => $cadCorreo, 'mensaje' => $mensajeCorreo, 'adjunto' => $adjunto);
	$objClienteSOAP->correoUnico($params);

	

		
	$mensaje = $mensaje."<br><br><p>Mensaje Enviado.</p>";

	//Devolvemos el mensaje que tomará jQuery
	echo $mensaje;
?>


