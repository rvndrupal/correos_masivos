<?php
	header('Content-Type: text/html; charset=UTF-8');

	//Archivo de conexión a la base de datos
	require('Connections\conexion.php');

	//Variable de búsqueda
	$filtros = isset($_POST['filtrosE']) ? $_POST['filtrosE'] : null;
	$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;
	$tipoFiltro = isset($_POST['tipoF']) ? $_POST['tipoF'] : null;
	
	//Prueba. Filtros para subconsulta
	$filtrosArea = isset($_POST['filtrosA']) ? $_POST['filtrosA'] : null;
	$filtrosRelacion = isset($_POST['filtrosR']) ? $_POST['filtrosR'] : null;
	$filtrosGiro = isset($_POST['filtrosG']) ? $_POST['filtrosG'] : null;
	$filtrosEstado = isset($_POST['filtrosS']) ? $_POST['filtrosS'] : null;
	
	
	//Filtro anti-XSS
	$caracteres_malos = array('<', '>', '"', '\'', '/', '<', '>', '\'', '/');
	$caracteres_buenos = array('&lt;', '&gt;', '&quot;', '&#x27;', '&#x2F;', '&#060;', '&#062;', '&#039;', '&#047;');
	$filtros = str_replace($caracteres_malos, $caracteres_buenos, $filtros);
	$tipoPersona = str_replace($caracteres_malos, $caracteres_buenos, $tipoPersona);
	
	$arregloCriteriosBusqueda = $filtros; //preg_split("/,/", $filtros);
				
	$mensaje = '';	
	$criterio = '';
	$criterioArea = '';
	$criterioRelacion = '';
	$criterioGiro = '';
	$criterioEstado = '';
	
	if ($tipoFiltro === '0')
	{
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$criterio .= 'area = \''.$value.'\' or ';
		}
		
		$filtro1 = 'relacion';
		$filtro2 = 'giro';
		$filtro3 = 'estado';			
	}
	else if ($tipoFiltro === '1')
	{
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$criterio .= 'relacion = \''.$value.'\' or ';
		}
		
		$filtro1 = 'area';
		$filtro2 = 'giro';
		$filtro3 = 'estado';
	}
	else if ($tipoFiltro === '2')
	{
		foreach ($arregloCriteriosBusqueda as $value)
		{
			$criterio .= 'giro = \''.$value.'\' or ';
		}
		
		$filtro1 = 'area';
		$filtro2 = 'relacion';
		$filtro3 = 'estado';
	}
	
	$criterio = substr($criterio, 0, -4);
	
	//Se agregan otros criterios de búsqueda.
	//Area
	if ($filtrosArea != null and $tipoFiltro != '0')
	{
		$criterioArea .= ' AND (';
		foreach ($filtrosArea as $value)
		{
			$criterioArea .= 'area = \''.$value.'\' or ';
		}
		$criterioArea = substr($criterioArea, 0, -4);
		$criterioArea .= ')';
	}
	//Relación
	if ($filtrosRelacion != null and $tipoFiltro != '1')
	{
		$criterioRelacion .= ' AND (';
		foreach ($filtrosRelacion as $value)
		{
			$criterioRelacion .= 'relacion = \''.$value.'\' or ';
		}
		$criterioRelacion = substr($criterioRelacion, 0, -4);
		$criterioRelacion .= ')';
	}
	//Giro
	if ($filtrosGiro != null and $tipoFiltro != '2')
	{
		$criterioGiro .= ' AND (';
		foreach ($filtrosGiro as $value)
		{
			$criterioGiro .= 'giro = \''.$value.'\' or ';
		}
		$criterioGiro = substr($criterioGiro, 0, -4);
		$criterioGiro .= ')';
	}
	//Estado
	if ($filtrosEstado != null)
	{
		$criterioGiro .= ' AND (';
		foreach ($filtrosEstado as $value)
		{
			$criterioEstado .= 'estado = \''.$value.'\' or ';
		}
		$criterioEstado = substr($criterioEstado, 0, -4);
		$criterioEstado .= ')';
	}
	
	$criterio2 = $criterioArea.$criterioRelacion.$criterioGiro.$criterioEstado;
	
	$criterio .= $criterio2;
	
	
	
	switch ($tipoFiltro)
	{
		//Area
		case '0':			
			if ($tipoPersona === '1')
			{
				$qryBusqueda1 = 'SELECT distinct relacion FROM personas_fisicas where ('.$criterio.') order by relacion ';
				$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$criterio.') order by giro ';
				$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$criterio.') order by estado ';
			}
			else if ($tipoPersona === '2')
			{
				$qryBusqueda1 = 'SELECT distinct relacion FROM personas_morales where ('.$criterio.') order by relacion ';
				$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$criterio.') order by giro ';
				$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$criterio.') order by estado ';
			}
			else if ($tipoPersona === '3')
			{
				$qryBusqueda1 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$criterio.') union  SELECT relacion FROM personas_morales WHERE ('.$criterio.')) as personas order by relacion' ;
				$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$criterio.') union  SELECT giro FROM personas_morales WHERE ('.$criterio.')) as personas order by giro' ;
				$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$criterio.') union  SELECT estado FROM personas_morales WHERE ('.$criterio.')) as personas order by estado' ;
			}			
			break;
		
		//Relación
		case '1':			
			if ($tipoPersona === '1')
			{
				$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$criterio.') order by area ';
				$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$criterio.') order by giro ';
				$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$criterio.') order by estado ';
			}
			else if ($tipoPersona === '2')
			{
				$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$criterio.') order by area ';
				$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$criterio.') order by giro ';
				$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$criterio.') order by estado ';
			}
			else if ($tipoPersona === '3')
			{
				$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$criterio.') union  SELECT area FROM personas_morales WHERE ('.$criterio.')) as personas order by area' ;
				$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$criterio.') union  SELECT giro FROM personas_morales WHERE ('.$criterio.')) as personas order by giro' ;
				$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$criterio.') union  SELECT estado FROM personas_morales WHERE ('.$criterio.')) as personas order by estado' ;
			}
			break;
		
		//Giro
		case '2':			
			if ($tipoPersona === '1')
			{
				$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$criterio.') order by area ';
				$qryBusqueda2 = 'SELECT distinct relacion FROM personas_fisicas where ('.$criterio.') order by relacion ';
				$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$criterio.') order by estado ';
			}
			else if ($tipoPersona === '2')
			{
				$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$criterio.') order by area ';
				$qryBusqueda2 = 'SELECT distinct relacion FROM personas_morales where ('.$criterio.') order by relacion ';
				$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$criterio.') order by estado ';
			}
			else if ($tipoPersona === '3')
			{
				$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$criterio.') union  SELECT area FROM personas_morales WHERE ('.$criterio.')) as personas order by area' ;
				$qryBusqueda2 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$criterio.') union  SELECT relacion FROM personas_morales WHERE ('.$criterio.')) as personas order by relacion' ;
				$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$criterio.') union  SELECT estado FROM personas_morales WHERE ('.$criterio.')) as personas order by estado' ;
			}
			break;
	}
	
	echo '<br>'.$qryBusqueda1.'<br>';
	echo '<br>'.$qryBusqueda2.'<br>';
	echo '<br>'.$qryBusqueda3.'<br>';
	
	
	$consulta1 = mysqli_query($conexion, $qryBusqueda1);
	$consulta2 = mysqli_query($conexion, $qryBusqueda2);
	$consulta3 = mysqli_query($conexion, $qryBusqueda3);
	
	
	$mensaje = '<BR>
	
				<table style="width:80%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\'>		
							<tr>
								FILTROS
							</tr>
							<tr>
								<th class=\'text-center\' style=\' color: #000; border: 1px solid black; width:33.33%;\'>Busqueda por '.$filtro1.'</th>
								<th class=\'text-center\' style=\' color: #000; border: 1px solid black; width:33.33%;\'>Busqueda por '.$filtro2.'</th>
								<th class=\'text-center\' style=\' color: #000; border: 1px solid black; width:33.33%;\'>Busqueda por '.$filtro3.'</th>';
								
	$mensaje .= '								
							</tr>				
						</thead>
						<tbody>';
	
	
	
	$opciones = '';
	
	while($resultados = mysqli_fetch_array($consulta1)) 
	{
		$obtenido = $resultados[$filtro1];
		$opciones .= '<option value="'.$obtenido.'" >'.$obtenido.'</option>';
	};

	$opciones .= '</select> ';
	
	$opciones2 = '';
	
	while($resultados = mysqli_fetch_array($consulta2)) 
	{
		$obtenido = $resultados[$filtro2];
		$opciones2 .= '<option value="'.$obtenido.'" >'.$obtenido.'</option>';
	};

	$opciones2 .= '</select> ';
	
	$opciones3 = '';
	
	while($resultados = mysqli_fetch_array($consulta3)) 
	{
		$obtenido = $resultados[$filtro3];
		$opciones3 .= '<option value="'.$obtenido.'" >'.$obtenido.'</option>';
	};

	$opciones3 .= '</select> ';
	
	
	$mensaje .= '
						<tr>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black; width:33.33%;\'><select id="filtro'.$filtro1.'" name="filtro'.$filtro1.'" multiple onChange="muestraResultadosFiltros();" style="width:300px">'.$opciones.'</td>							
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black; width:33.33%;\'><select id="filtro'.$filtro2.'" name="filtro'.$filtro2.'" multiple onChange="muestraResultadosFiltros();" style="width:300px">'.$opciones2.'</td>							
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black; width:33.33%;\'><select id="filtro'.$filtro3.'" name="filtro'.$filtro3.'" multiple onChange="muestraResultadosFiltros();" style="width:300px">'.$opciones3.'</td>							
						</tr>';
	$mensaje .= '</tbody></table></div>';
			
	echo $mensaje;
	
	require('Connections\conexion_close.php');
?>