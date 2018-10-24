<?php

header('Content-Type: text/html; charset=UTF-8');

//Archivo de conexión a la base de datos
require('conexion.php');

//Variable de búsqueda
$consultaBusqueda = isset($_POST['valorB']) ? $_POST['valorB'] : null;
$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;


//Filtro anti-XSS
$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
$tipoPersona = str_replace($caracteres_malos, $caracteres_buenos, $tipoPersona);

//Variable vacía (para evitar los E_NOTICE)
$mensaje = "";

//Criterios de búsqueda
$arregloCriteriosBusqueda = preg_split('/\s/', $consultaBusqueda);


switch ($tipoPersona) 
{
	case '1':
		//Busqueda para personas físicas.
		$qryBusqueda = "SELECT * FROM personas_fisicas WHERE (";
		
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$qryBusqueda = $qryBusqueda."nombre LIKE '%$value%' 
			OR estado LIKE '%$value%'
			OR area LIKE '%$value%'
			OR giro LIKE '%$value%') and (";
		}
		
		$qryBusqueda = substr($qryBusqueda, 0, -6);

		//Comprueba si $consultaBusqueda está seteado
		if (isset($consultaBusqueda)) 
		{
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			if ($filas === 0) 
			{
				$mensaje = "<p>No se encontró información con los criterios de búsqueda.</p>";
			}
			else 
			{
				//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				echo 'Resultados para <strong>'.$consultaBusqueda.'</strong> (se han encontrado <strong>'.$filas.' resultados)</strong>';
				echo '<div id="seleccionarChecks" visibility = "true">
				<p>MENSAJE A ENVIAR
				<BR><textarea name="mensajeCorreo" id="mensajeCorreo" rows="10" cols="50"></textarea>
				<BR><button type="button" onClick="enviaCorreo();">ENVIAR</button>
				</p>
				<br>
				<table style="width:90%" align="center" >
					<thead style=\'color:white;background:#3C8DBC;\'>		
						<tr>
							SELECCIONAR TODO <input type="checkbox" id= "persona" name="persona" value="0" onChange="seleccionarTodo();" ></div>
						</tr>
						<tr>
							<th class=\'text-center\' width=5% style=\' color: #000; border: 1px solid black;\'></th>
							<th class=\'text-center\' width=20% style=\' color: #000; border: 1px solid black;\' ><b>NOMBRE</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>ESTADO </b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>E-MAIL</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>GIRO</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>RELACIÓN</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>ÁREA</b></th>
						</tr>				
					</thead>
					<tbody>';

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
						<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="personad[]" value="' . $correoe . '" onChange="desmarcar(this.name);"></b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$nombre.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$estado.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$correoe.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$giro.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$relacion.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$area.'</b></td>
					</tr>';
				};//Fin while $resultados
				
				$mensaje .= '</tbody></table>';
			}; //Fin else $filas
		};//Fin isset $consultaBusqueda
		break;					
	case '2':
		//Busqueda para personas morales.
		$qryBusqueda = "SELECT * FROM personas_morales WHERE (";
		
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$qryBusqueda = $qryBusqueda."nombre LIKE '%$value%' 
			OR estado LIKE '%$value%'
			OR area LIKE '%$value%'
			OR giro LIKE '%$value%') and (";
		}
		
		$qryBusqueda = substr($qryBusqueda, 0, -6);

		//Comprueba si $consultaBusqueda está seteado
		if (isset($consultaBusqueda)) 
		{
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			if ($filas === 0) 
			{
				$mensaje = "<p>No se encontró información con los criterios de búsqueda.</p>";
			}
			else 
			{
				//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				echo 'Resultados para <strong>'.$consultaBusqueda.'</strong> (se han encontrado <strong>'.$filas.' resultados)</strong>';
				echo '<div id="seleccionarChecks" visibility = "true">
				<p>MENSAJE A ENVIAR
				<BR><textarea name="mensajeCorreo" id="mensajeCorreo" rows="10" cols="50"></textarea>
				<BR><button type="button" onClick="enviaCorreo();">ENVIAR</button>
				</p>
				<br>
				<table style="width:90%" align="center" >
					<thead style=\'color:white;background:#3C8DBC;\'>		
						<tr>
							SELECCIONAR TODO <input type="checkbox" id= "persona" name="persona" value="0" onChange="seleccionarTodo();" ></div>
						</tr>
						<tr>
							<th class=\'text-center\' width=5% style=\' color: #000; border: 1px solid black;\'></th>
							<th class=\'text-center\' width=20% style=\' color: #000; border: 1px solid black;\' ><b>NOMBRE</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>ESTADO </b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>E-MAIL</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>GIRO</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>RELACIÓN</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>ÁREA</b></th>
						</tr>				
					</thead>
					<tbody>';

				//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
				while($resultados = mysqli_fetch_array($consulta)) 
				{
					$idpf = $resultados['idpm'];
					$nombre = $resultados['nombre'];
					$estado = $resultados['estado'];
					$correoe = $resultados['correoe'];
					$giro = $resultados['giro'];
					$relacion = $resultados['relacion'];
					$area = $resultados['area'];

				//Output
				$mensaje .= '
					<tr>
						<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="personad[]" value="' . $correoe . '" onChange="desmarcar(this.name);"></b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$nombre.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$estado.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$correoe.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$giro.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$relacion.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$area.'</b></td>
					</tr>';
				};//Fin while $resultados
				
				$mensaje .= '</tbody></table>';
			}; //Fin else $filas
		};//Fin isset $consultaBusqueda
		break;					
	case '3':
		//Busqueda para personas físicas y morales.
		$qryBusqueda = "SELECT * FROM personas_fisicas WHERE (";
		
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$qryBusqueda = $qryBusqueda."nombre LIKE '%$value%' 
			OR estado LIKE '%$value%'
			OR area LIKE '%$value%'
			OR giro LIKE '%$value%') and (";
		}
		
		$qryBusqueda = substr($qryBusqueda, 0, -6);

		//Comprueba si $consultaBusqueda está seteado
		if (isset($consultaBusqueda)) 
		{
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			if ($filas === 0) 
			{
				$mensaje = "<p>No se encontró información con los criterios de búsqueda.</p>";
			}
			else 
			{
				//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				echo 'Resultados para <strong>'.$consultaBusqueda.'</strong> (se han encontrado <strong>'.$filas.' resultados)</strong>';
				echo '<div id="seleccionarChecks" visibility = "true">
				<p>MENSAJE A ENVIAR
				<BR><textarea name="mensajeCorreo" id="mensajeCorreo" rows="10" cols="50"></textarea>
				<BR><button type="button" onClick="enviaCorreo();">ENVIAR</button>
				</p>
				<br>
				<table style="width:90%" align="center" >
					<thead style=\'color:white;background:#3C8DBC;\'>		
						<tr>
							SELECCIONAR TODO <input type="checkbox" id= "persona" name="persona" value="0" onChange="seleccionarTodo();" ></div>
						</tr>
						<tr>
							<th class=\'text-center\' width=5% style=\' color: #000; border: 1px solid black;\'></th>
							<th class=\'text-center\' width=20% style=\' color: #000; border: 1px solid black;\' ><b>NOMBRE</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>ESTADO </b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>E-MAIL</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>GIRO</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>RELACIÓN</b></th>
							<th class=\'text-center\' width=10% style=\' color: #000; border: 1px solid black;\' ><b>ÁREA</b></th>
						</tr>				
					</thead>
					<tbody>';

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
						<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="personad[]" value="' . $correoe . '" onChange="desmarcar(this.name);"></b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$nombre.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$estado.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$correoe.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$giro.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$relacion.'</b></td>
						<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><b>'.$area.'</b></td>
					</tr>';
				};//Fin while $resultados
				
				$mensaje .= '</tbody></table>';
			}; //Fin else $filas
		};//Fin isset $consultaBusqueda
		break;
}		
			
//Devolvemos el mensaje que tomará jQuery
echo $mensaje;
?>