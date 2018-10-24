<?php

header("Content-Type: text/html;charset=utf-8");

//Archivo de conexión a la base de datos
require('conexion.php');

//Variable de búsqueda
$consultaBusqueda = $_POST['valorB'];

//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";


//Comprueba si $consultaBusqueda está seteado
if (isset($consultaBusqueda)) {

	$consulta = mysqli_query($conexion, "SELECT * FROM personas_fisicas
	WHERE nombre LIKE '%$consultaBusqueda%' 
	OR estado LIKE '%$consultaBusqueda%'
	OR correoe LIKE '%$consultaBusqueda%' 
	OR area LIKE '%$consultaBusqueda%'
	OR giro LIKE '%$consultaBusqueda%'	");
	
	//Obtiene la cantidad de filas que hay en la consulta
	$filas = mysqli_num_rows($consulta);

	//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
	if ($filas === 0) {
		$mensaje = "<p>No se encontró información con los criterios de búsqueda.</p>";
	} else 
	{
		//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
		echo 'Resultados para <strong>'.$consultaBusqueda.'</strong>';
		
		echo '<div id="seleccionarChecks" visibility = "true">
		<p>MENSAJE A ENVIAR
		<BR><textarea name="mensajeCorreo" id="mensajeCorreo" rows="10" cols="50"></textarea>
		<BR><button type="button" onClick="enviaCorreo();">ENVIAR</button>
		</p>
		
		<br>
		<table style="width:100%">
			<tr>
				SELECCIONAR TODO <input type="checkbox" id= "persona" name="persona" value="0" onChange="seleccionarTodo();" ></div> 
			</tr>
			<tr>
				<th></th><th>Nombre</th><th>Estado</th><th>e-mail</th><th>Giro</th><th>Relacion</th><th>Area</th>
			</tr>';

		//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
		while($resultados = mysqli_fetch_array($consulta)) 
		{
			$idpf = $resultados['idpf'];
			$nombre = $resultados['nombre'];
			$estado = $resultados['estado'];
			$correoe = $resultados['correoe'];
			$giro = $resultados['giro'];
			$relacion = $resultados['relacion'];
			$area = $resultados['area'];

			//Output
			$mensaje .= '
			<tr>
			<td>
			<input type="checkbox" name="personad[]" value="' . $correoe . '" onChange="desmarcar(this.name);"> 
			</td><td>
			' . $nombre . '</td><td>
			' . $estado . '</td><td>
			' . $correoe . '</td><td>
			
			' . $giro . '</td><td>
			' . $relacion . '</td><td>
			' . $area . '</td></tr>
			
			';

		};//Fin while $resultados
	}; //Fin else $filas
};//Fin isset $consultaBusqueda

//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
echo '</table>';
?>


