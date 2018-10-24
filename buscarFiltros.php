<?php

	header('Content-Type: text/html; charset=UTF-8');

	//Archivo de conexión a la base de datos
	require('Connections\conexion.php');

	//Variable de búsqueda
	$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;

	$cadenaEstados = isset($_POST['listaE']) ? $_POST['listaE'] : "";
	$cadenaRelaciones = isset($_POST['listaR']) ? $_POST['listaR'] : "";
	$cadenaGiros = isset($_POST['listaG']) ? $_POST['listaG'] : "";
	$cadenaAreas = isset($_POST['listaA']) ? $_POST['listaA'] : "";


	//Filtro anti-XSS
	$caracteres_malos = array("<", ">", "\"", "'", "/", "<", ">", "'", "/");
	$caracteres_buenos = array("&lt;", "&gt;", "&quot;", "&#x27;", "&#x2F;", "&#060;", "&#062;", "&#039;", "&#047;");
	$tipoPersona = str_replace($caracteres_malos, $caracteres_buenos, $tipoPersona);

	//Variable vacía (para evitar los E_NOTICE)
	$mensaje = "";

	//Criterios de búsqueda
	//$arregloCriteriosBusqueda = preg_split('/\s/', $consultaBusqueda);
	$arregloEstados = preg_split('/;/', $cadenaEstados);
	$arregloRelaciones = preg_split('/;/', $cadenaRelaciones);
	$arregloGiros = preg_split('/;/', $cadenaGiros);
	$arregloAreas = preg_split('/;/', $cadenaAreas);


	if ($cadenaEstados == "" and $cadenaRelaciones == "" and $cadenaGiros == "" and $cadenaAreas == "")
	{
		$mensaje = "<p>No se han seleccionado filtros para la búsqueda. Seleccione al menos un filtro.</p>";
	}
	else
	{
		switch ($tipoPersona)
		{
			case '1':
	
				//Busqueda para personas físicas.
				$qryBusqueda = "SELECT * FROM personas_fisicas WHERE ((";
			
				if ($cadenaEstados != "")
				{
					foreach ($arregloEstados as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."estado = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				if ($cadenaRelaciones != "")
				{	
					if ($cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloRelaciones as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."relacion = '$value' OR ";
						}
					}
					
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaGiros != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloGiros as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."giro = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaAreas != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "" or $cadenaGiros != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloAreas as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."area = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				$qryBusqueda .= "))";
				
				
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
				$qryBusqueda = "SELECT * FROM personas_morales WHERE ((";
			
				if ($cadenaEstados != "")
				{
					foreach ($arregloEstados as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."estado = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				if ($cadenaRelaciones != "")
				{	
					if ($cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloRelaciones as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."relacion = '$value' OR ";
						}
					}
					
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaGiros != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloGiros as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."giro = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaAreas != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "" or $cadenaGiros != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloAreas as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."area = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				$qryBusqueda .= "))";
				
				
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
				//Primero búsqueda por personas físicas
				$qryBusqueda = "SELECT * FROM personas_fisicas WHERE ((";
			
				if ($cadenaEstados != "")
				{
					foreach ($arregloEstados as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."estado = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				if ($cadenaRelaciones != "")
				{	
					if ($cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloRelaciones as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."relacion = '$value' OR ";
						}
					}
					
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaGiros != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloGiros as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."giro = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaAreas != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "" or $cadenaGiros != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloAreas as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."area = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				$qryBusqueda .= "))";
				
				$qryBusquedaF = $qryBusqueda;
				
				
				//Búsqueda por personas morales
				$qryBusqueda = "SELECT * FROM personas_morales WHERE ((";
			
				if ($cadenaEstados != "")
				{
					foreach ($arregloEstados as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."estado = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				if ($cadenaRelaciones != "")
				{	
					if ($cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloRelaciones as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."relacion = '$value' OR ";
						}
					}
					
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaGiros != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloGiros as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."giro = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);				
				}
				
				if ($cadenaAreas != "")
				{
					if ($cadenaRelaciones != "" or $cadenaEstados != "" or $cadenaGiros != "")
					{
						$qryBusqueda .= ") AND (";
					}
					
					foreach ($arregloAreas as $value)
					{
						if ($value != "" and $value != "0")
						{
							$qryBusqueda = $qryBusqueda."area = '$value' OR ";
						}
					}
				
					$qryBusqueda = substr($qryBusqueda, 0, -4);
				}
				
				$qryBusqueda .= "))";
				
				$qryBusquedaM = $qryBusqueda;
				
				
				//Busquedas.
				$consultaF = mysqli_query($conexion, $qryBusquedaF);
				$consultaM = mysqli_query($conexion, $qryBusquedaM);
					
				//Obtiene la cantidad de filas que hay en la consulta
				$filasF = mysqli_num_rows($consultaF);
				$filasM = mysqli_num_rows($consultaM);
				
				$filasT = $filasF + $filasM;
				
				//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				if ($filasT === 0) 
				{
					$mensaje = "<p>No se encontró información con los criterios de búsqueda.</p>";
				}
				else 
				{
					//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
					echo 'Se han encontrado <strong>'.$filasT.' resultados)</strong> resultados.';
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
					while($resultados = mysqli_fetch_array($consultaF)) 
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
					
					//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle. Personas morales.
					while($resultados = mysqli_fetch_array($consultaM)) 
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
/*	
	case '3':
		//Busqueda para personas físicas y morales.
		//Primero se hace la búsqueda por personas físicas.
		$qryBusquedaF = "SELECT * FROM personas_fisicas WHERE (";
		
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$qryBusquedaF = $qryBusquedaF."nombre LIKE '%$value%' 
			OR estado LIKE '%$value%'
			OR area LIKE '%$value%'
			OR giro LIKE '%$value%') and (";
		}
		
		$qryBusquedaF = substr($qryBusquedaF, 0, -6);
		
		//Se prepara la consula para personas morales.
		$qryBusquedaM = "SELECT * FROM personas_morales WHERE (";
		
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$qryBusquedaM = $qryBusquedaM."nombre LIKE '%$value%' 
			OR estado LIKE '%$value%'
			OR area LIKE '%$value%'
			OR giro LIKE '%$value%'
			OR relacion LIKE '%$value%') and (";
		}
		
		$qryBusquedaM = substr($qryBusquedaM, 0, -6);

		//Comprueba si $consultaBusqueda está seteado
		if (isset($consultaBusqueda)) 
		{
			$consultaF = mysqli_query($conexion, $qryBusquedaF);
			$consultaM = mysqli_query($conexion, $qryBusquedaM);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filasF = mysqli_num_rows($consultaF);
			$filasM = mysqli_num_rows($consultaM);
			
			$tFilas = $filasF + $filasM;
			
			//Si no existe ninguna fila que sea igual a $consultaBusqueda, buscamos 
			if ($filasF === 0 && $filasM === 0) 
			{
				$mensaje = "<p>No se encontró información con los criterios de búsqueda.</p>";
			}
			else 
			{
				//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
				echo 'Resultados para <strong>'.$consultaBusqueda.'</strong> (se han encontrado <strong>'.$tFilas.' resultados)</strong>';
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

				//Datos obtenidos para personas físicas.
				while($resultados = mysqli_fetch_array($consultaF)) 
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
				
				//Datos obtenidos para personas morales.
				while($resultados = mysqli_fetch_array($consultaM)) 
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
*/
	}		
			
	//Devolvemos el mensaje que tomará jQuery
	echo $mensaje;
	require('Connections\conexion_close.php');
?>