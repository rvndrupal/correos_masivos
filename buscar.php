
<?php
	header('Content-Type: text/html; charset=UTF-8');

	//Archivo de conexión a la base de datos
	require('Connections\conexion.php');

	//Variable de búsqueda
	$consultaBusqueda = isset($_POST['valorB']) ? $_POST['valorB'] : null;
	$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;

	//Filtro anti-XSS
	$caracteres_malos = array('<', '>', '"', '\'', '/', '<', '>', '\'', '/');
	$caracteres_buenos = array('&lt;', '&gt;', '&quot;', '&#x27;', '&#x2F;', '&#060;', '&#062;', '&#039;', '&#047;');
	$consultaBusqueda = str_replace($caracteres_malos, $caracteres_buenos, $consultaBusqueda);
	$tipoPersona = str_replace($caracteres_malos, $caracteres_buenos, $tipoPersona);

	//Variable vacía (para evitar los E_NOTICE)
	$mensaje = '';
	$criterio = '';

	//Criterios de búsqueda
	$arregloCriteriosBusqueda = preg_split('/\s/', $consultaBusqueda);
	
	foreach ($arregloCriteriosBusqueda as $value)
	{
		$criterio .= 'nombre LIKE \'%'.$value.'%\' 
		OR estado LIKE \'%'.$value.'%\'
		OR area LIKE \'%'.$value.'%\'
		OR giro LIKE \'%'.$value.'%\'
		OR relacion LIKE \'%'.$value.'%\') and (';
	}
			
	$criterio = substr($criterio, 0, -6);

	switch ($tipoPersona) 
	{
		case '1':
			//Busqueda para personas físicas.
			$qryBusqueda = 'SELECT idpf AS id, nombre, estado, correoe, giro, relacion, area FROM personas_fisicas WHERE ('.$criterio.' ORDER BY nombre';
			break;
		case '2':
			//Busqueda para personas morales.
			$qryBusqueda = 'SELECT idpm AS id, nombre, estado, correoe, giro, relacion, area FROM personas_morales WHERE ('.$criterio.' ORDER BY nombre';
			break;
		case '3':
			//Busqueda para personas físicas y morales.
			$qryBusqueda = 'SELECT id, nombre, estado, correoe, giro, relacion, area FROM (SELECT idpf AS id, nombre, estado, correoe, giro, relacion, area FROM personas_fisicas ';
			$qryBusqueda .= 'UNION SELECT idpm AS id, nombre, estado, correoe, giro, relacion, area FROM personas_morales) AS personas WHERE ('.$criterio.' ORDER BY nombre';
			break;
	}
	
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
		$mensaje .= 'Resultados para <strong>'.$consultaBusqueda.'</strong> (se han encontrado <strong>'.$filas.' resultados)</strong>';
		$mensaje .= '<BR><br><button type="button" class="btn btn-primary" onClick = "abreCorreo();" >ENVIAR MENSAJE</button>	
		<br>
		<div id="seleccionarCuentasCorreo">
		<table style="width:90%" align="center" >
			<thead style=\'color:white;background:#3C8DBC;\'>		
				<tr>
					SELECCIONAR TODOS <input type="checkbox" id= "persona" name="persona" value="" onChange="seleccionarTodo();" >
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
		
		//La variable $resultados contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
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
		};		
		$mensaje .= '</tbody></table></div>';
	}

	echo $mensaje;
	
	require('Connections\conexion_close.php');
?>