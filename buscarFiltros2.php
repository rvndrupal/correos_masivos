<?php

	header('Content-Type: text/html; charset=UTF-8');

	//Archivo de conexión a la base de datos
	require('Connections\conexion.php');

	//Variable de búsqueda
	$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;
	$tipoFiltro = isset($_POST['tipoF']) ? $_POST['tipoF'] : null;
	$primerFiltro = isset($_POST['primerF']) ? $_POST['primerF'] : null;
	$filtroArea = isset($_POST['filtroA']) ? $_POST['filtroA'] : null;
	$filtroRelacion = isset($_POST['filtroR']) ? $_POST['filtroR'] : null;
	$filtroGiro = isset($_POST['filtroG']) ? $_POST['filtroG'] : null;
	$filtroEstado = isset($_POST['filtroE']) ? $_POST['filtroE'] : null;	
	
	//Filtro anti-XSS
	$caracteres_malos = array('<', '>', '"', '\'', '/', '<', '>', '\'', '/');
	$caracteres_buenos = array('&lt;', '&gt;', '&quot;', '&#x27;', '&#x2F;', '&#060;', '&#062;', '&#039;', '&#047;');
	$tipoPersona = str_replace($caracteres_malos, $caracteres_buenos, $tipoPersona);

	$mensaje = '';
	
	if ($tipoFiltro === '0')
	{
		$filtroArea = $primerFiltro;
	}
	else if ($tipoFiltro === '1')
	{
		$filtroRelacion = $primerFiltro;
	}
	else if ($tipoFiltro === '2')
	{
		$filtroGiro = $primerFiltro;
	}
	
	if ($filtroArea == null and $filtroRelacion == null and $filtroGiro == null and $filtroEstado == null)
	{
		$mensaje = '<p>No se han seleccionado filtros para la búsqueda. Seleccione al menos un filtro.</p>';
	}
	else
	{
		switch ($tipoPersona)
		{
			case '1':
	
				//Busqueda para personas físicas.
				$qryBusqueda = 'SELECT * FROM personas_fisicas WHERE ((';
			
				if ($filtroArea != null)
				{
					foreach ($filtroArea as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'area = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				if ($filtroRelacion != null)
				{	
					if ($filtroArea != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroRelacion as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'relacion = \''.$value.'\' OR ';
						}
					}
					
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($filtroGiro != "")
				{
					if ($filtroRelacion != null or $filtroArea != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroGiro as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'giro = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($filtroEstado != null)
				{
					if ($filtroArea != null or $filtroRelacion != null or $filtroGiro != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroEstado as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'estado = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				$qryBusqueda .= '))';
				
				$consulta = mysqli_query($conexion, $qryBusqueda);
					
				//Obtiene la cantidad de filas que hay en la consulta
				$filas = mysqli_num_rows($consulta);
				
				//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				if ($filas === 0) 
				{
					$mensaje = '<p>No se encontró información con los criterios de búsqueda.</p>';
				}
				else 
				{
					//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
					echo 'Se han encontrado <strong>'.$filas.' resultados.</strong>';
					echo '<BR><br><button type="button" class="btn btn-primary" onClick = "abreCorreo();" >ENVIAR MENSAJE</button>	
					
					<br>
					<div id="seleccionarCuentasCorreo">
					<table style="width:90%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\'>		
							<tr>
								SELECCIONAR TODO <input type="checkbox" id= "persona" name="persona" value="" onChange="seleccionarTodo();" >
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
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$nombre.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$estado.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$correoe.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$giro.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$relacion.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$area.'</td>
						</tr>';
					};//Fin while $resultados
					
					$mensaje .= '</tbody></table></div>';
				}; //Fin else $filas
				break;
				
			case '2':
				
				//Busqueda para personas morales.
				$qryBusqueda = 'SELECT * FROM personas_morales WHERE ((';
			
				if ($filtroArea != null)
				{
					foreach ($filtroArea as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'area = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				if ($filtroRelacion != null)
				{	
					if ($filtroArea != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroRelacion as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'relacion = \''.$value.'\' OR ';
						}
					}
					
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($filtroGiro != "")
				{
					if ($filtroRelacion != null or $filtroArea != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroGiro as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'giro = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($filtroEstado != null)
				{
					if ($filtroArea != null or $filtroRelacion != null or $filtroGiro != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroEstado as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'estado = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				$qryBusqueda .= '))';
				
				$consulta = mysqli_query($conexion, $qryBusqueda);
					
				//Obtiene la cantidad de filas que hay en la consulta
				$filas = mysqli_num_rows($consulta);
				
				//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				if ($filas === 0) 
				{
					$mensaje = '<p>No se encontró información con los criterios de búsqueda.</p>';
				}
				else 
				{
					//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
					echo 'Se han encontrado <strong>'.$filas.' resultados.</strong>';
					echo '<BR><br><button type="button" class="btn btn-primary" onClick = "abreCorreo();" >ENVIAR MENSAJE</button>	
					
					<br>
					<div id="seleccionarCuentasCorreo">
					<table style="width:90%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\'>		
							<tr>
								SELECCIONAR TODO <input type="checkbox" id= "persona" name="persona" value="" onChange="seleccionarTodo();" >
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
						$idpm = $resultados['idpm'];
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
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$nombre.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$estado.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$correoe.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$giro.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$relacion.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$area.'</td>
						</tr>';
					};//Fin while $resultados
					
					$mensaje .= '</tbody></table></div>';
				}; //Fin else $filas
				break;
				
			case '3':
				
				//Busqueda para personas físicas y personas morales.
				$qryBusqueda = 'SELECT * from (';
				$qryBusqueda .= 'SELECT idpf id, nombre, estado, correoe, giro, relacion, area FROM personas_fisicas ';
				$qryBusqueda .= 'UNION ';
				$qryBusqueda .= 'SELECT idpm id, nombre, estado, correoe, giro, relacion, area FROM personas_morales) AS personas WHERE ((';

				if ($filtroArea != null)
				{
					foreach ($filtroArea as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'area = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				if ($filtroRelacion != null)
				{	
					if ($filtroArea != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroRelacion as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'relacion = \''.$value.'\' OR ';
						}
					}
					
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($filtroGiro != "")
				{
					if ($filtroRelacion != null or $filtroArea != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroGiro as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'giro = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($filtroEstado != null)
				{
					if ($filtroArea != null or $filtroRelacion != null or $filtroGiro != null)
					{
						$qryBusqueda .= ') AND (';
					}
					
					foreach ($filtroEstado as $value)
					{
						//if ($value != "" and $value != "0")
						if ($value != "0")
						{
							$qryBusqueda = $qryBusqueda.'estado = \''.$value.'\' OR ';
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				$qryBusqueda .= ')) order by nombre';
				
				//echo '<br>'.$qryBusqueda.'<br>';
				
				//Busquedas.
				$consulta = mysqli_query($conexion, $qryBusqueda);

					
				//Obtiene la cantidad de filas que hay en la consulta
				$filas = mysqli_num_rows($consulta);
				
				//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				if ($filas === 0) 
				{
					$mensaje = '<p>No se encontró información con los criterios de búsqueda.</p>';
				}
				else 
				{
					//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
					echo 'Se han encontrado <strong>'.$filas.' resultados)</strong> resultados.';
					echo '<BR><br><button type="button" class="btn btn-primary" onClick = "abreCorreo();" >ENVIAR MENSAJE</button>	
					
					<br>
					<div id="seleccionarCuentasCorreo">
					<table style="width:90%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\'>		
							<tr>
								SELECCIONAR TODO <input type="checkbox" id= "persona" name="persona" value="" onChange="seleccionarTodo();" >
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

					//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle. Personas físicas.
					while($resultados = mysqli_fetch_array($consulta)) 
					{
						$id = $resultados['id'];
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
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$nombre.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$estado.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$correoe.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$giro.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$relacion.'</td>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$area.'</td>
						</tr>';
					};//Fin while $resultados
					
					
					$mensaje .= '</tbody></table></div>';
				}; //Fin else $filas
				break;
		};
	}		
			
	//Devolvemos el mensaje que tomará jQuery
	echo $mensaje;
	require('Connections\conexion_close.php');
?>