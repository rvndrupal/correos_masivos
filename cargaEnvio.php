<?php
	header("Content-Type: text/html;charset=UTF-8");

	//Variable de búsqueda
	$mensajeCorreo = isset($_POST['mensajeCorreo']) ? $_POST['mensajeCorreo'] : null;
	$cadCorreo = isset($_POST['var_correos']) ? $_POST['var_correos'] : null;
	$titCorreo = isset($_POST['tituloCorreo']) ? $_POST['tituloCorreo'] : null;
	
	//$mensajeCorreo = str_replace('\r','(saltodelinea)',$mensajeCorreo);
	//$mensajeCorreo = str_replace('\n','(saltodelinea)',$mensajeCorreo);
	
	$mensajeCorreo = nl2br($mensajeCorreo);
	$titCorreo = nl2br($titCorreo);
		
	$mensajeCorreo = str_replace('<br />','(saltodelinea)',$mensajeCorreo);

	$caracteres_malos = array('<', '>', '"', '\'', '/', '<', '>', '\'', '/');
	$caracteres_buenos = array('&lt;', '&gt;', '&quot;', '&#x27;', '&#x2F;', '&#060;', '&#062;', '&#039;', '&#047;');
	$mensajeCorreo = str_replace($caracteres_malos, $caracteres_buenos, $mensajeCorreo);
	$titCorreo = str_replace($caracteres_malos, $caracteres_buenos, $titCorreo);
	

	//Variable vacía (para evitar los E_NOTICE)
	$mensaje = '';
	$adjunto = '';

	//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
	foreach($_FILES['archivo']['tmp_name'] as $key => $tmp_name)
	{
		//Validamos que el archivo exista
		if($_FILES['archivo']['name'][$key]) 
		{			
			$filename = $_FILES['archivo']['name'][$key]; //Obtenemos el nombre original del archivo
			$source = $_FILES['archivo']['tmp_name'][$key]; //Obtenemos un nombre temporal del archivo
			
			$directorio = '\\\\10.24.17.53\\attachments\\'; //Declaramos un  variable con la ruta donde guardaremos los archivos
				
			$dir=opendir($directorio); //Abrimos el directorio de destino
			$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
				
			//Movemos y validamos que el archivo se haya cargado correctamente
			//El primer campo es el origen y el segundo el destino
			if(move_uploaded_file($source, $target_path)) 
			{	
				$adjunto = $adjunto.$filename.';';
			} 
			else 
			{	
				$mensaje = $mensaje. 'Ha ocurrido un error, por favor inténtelo de nuevo.<br>';
			}			
			closedir($dir); //Cerramos el directorio de destino
		}
	}

	$mensaje .= '
		<!doctype html>
		<html>
			<head>
				<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

				<title>Envío de Mensaje</title>
				
				<script src="jquery.min.js"></script>
				<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>				
				<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
				<script src="js/funciones.js"></script>
				
				<style>			
					h1 {
						position:relative;
						left: 0px;
						bottom: 5px;
					}
			
					#inicio{    
							background-color:#000000;
							height:60px;					
					}  

					#img1{
						position:relative;
						background-color:#000000;
						left: 800px;
						top: -70px;
						width: 126px;
						height: 41px;
					}

						.Estilo1 {color: #FFFFFF}

					a:link   
					{   
					 text-decoration:none;   
					} 
					#esc{
						position:absolute;
						left: 32px;
						top: 73px;
						width: 189px;
						height: 45px;
					} 
					#esc1{
						position:absolute;
						left: 1136px;
						top: 73px;
						width: 189px;
						height: 45px;
					}
					 select:required:invalid {
					  color: gray;
					}
					option[value=""][disabled] {
					  display: none;
					}
					option {
					  color: black;
					}
					body {
					padding-top: 20px;
					padding-bottom: 20px;
					}
				</style>
			</head>

			<body>
				<center>
					<div id="inicio"> <?php include("menu.php");?> </div>
					
					<div id="formTitulos">
						<table >
							<th><input type="image" name="imageField" src="img/sagarpa.png" height="126" width="326" /></h1></th>
							<th width="600" height="40" scope="col"><h1 align = "center"> Estatus de Envío </h1></th>
							<!-- <th width="600" height="40"><input type="image" name="imageField" src="img/logo.png" height="126" width="326" /></h1></th> -->
							<th><input type="image" name="imageField" src="img/SENASICA.jpg" height="126" width="326" /></h1></th>
						</table>
					</div>';

	//$objClienteSOAP = new nusoap_client('http://sinavef.senasica.gob.mx/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
	$objClienteSOAP = new soapclient('http://sinavef.senasica.gob.mx/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
	//$objClienteSOAP = new soapclient('http://localhost:49556/wsCorreo_Directorio/Service.asmx?WSDL', array('trace' => 1));
	$params = array('cadCorreo' => $cadCorreo, 'mensaje' => $mensajeCorreo, 'adjunto' => $adjunto, 'titulo' => $titCorreo);
	$resultado = $objClienteSOAP->correoUnico($params);
	
	if(is_soap_fault($resultado))
	{
		$mensaje .= '<br><br><br>Se ha presentado una falla en el envío de correo. Intente nuevamente o llame al administrador.<br><br><br>';
	}
	else
	{
		$mensaje .= '<br><br><p><h2>Mensaje Enviado.</h2></p>
		<br><br><input type="button" value="Regresar al Directorio" onclick = "location=\'/DirectorioUPV/busqueda.php\'"/>';
	}	
		$mensaje .= '<div id="principal"></div>					
				</center>
			</body>
		</html>';
		
	//Devolvemos el mensaje que tomará jQuery
	echo $mensaje;
?>