<?php
	header('Content-Type: text/html; charset=UTF-8');

	//Archivo de conexión a la base de datos
	require('Connections\conexion.php');

	//Variable de búsqueda
	$filtros = isset($_POST['filtrosE']) ? $_POST['filtrosE'] : null;
	$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;
	$tipoFiltro = isset($_POST['tipoF']) ? $_POST['tipoF'] : null;
	$segundoFiltro = isset($_POST['segundoF']) ? $_POST['segundoF'] : '';
	$tercerFiltro = isset($_POST['tercerF']) ? $_POST['tercerF'] : '';
	$cuartoFiltro = isset($_POST['cuartoF']) ? $_POST['cuartoF'] : '';
	$filtrosArea = isset($_POST['filtrosA']) ? $_POST['filtrosA'] : null;
	$filtrosRelacion = isset($_POST['filtrosR']) ? $_POST['filtrosR'] : null;
	$filtrosGiro = isset($_POST['filtrosG']) ? $_POST['filtrosG'] : null;
	$filtrosEstado = isset($_POST['filtrosS']) ? $_POST['filtrosS'] : null;
	
	//Filtro anti-XSS
	$caracteres_malos = array('<', '>', '"', '\'', '/', '<', '>', '\'', '/');
	$caracteres_buenos = array('&lt;', '&gt;', '&quot;', '&#x27;', '&#x2F;', '&#060;', '&#062;', '&#039;', '&#047;');
	$filtros = str_replace($caracteres_malos, $caracteres_buenos, $filtros);
	$tipoPersona = str_replace($caracteres_malos, $caracteres_buenos, $tipoPersona);
	
	$mensaje = '';	
	$criterio = '';
	$criterioArea = '';
	$criterioRelacion = '';
	$criterioGiro = '';
	$criterioEstado = '';
	
	//echo '<br>Primer filtro: '.$tipoFiltro.'<br>';
	//echo '<br>Segundo filtro: '.$segundoFiltro.'<br>';
	//echo '<br>Tercer filtro: '.$tercerFiltro.'<br>';
	//echo '<br>Cuarto filtro: '.$cuartoFiltro.'<br>';
	
	//Se obienen filtros de acuerdo a los parámetros recibidos.
	if (!empty($filtrosArea))
		foreach ($filtrosArea as $value)
			$criterioArea .= 'area = \''.$value.'\' or ';
		
	if (!empty($filtrosRelacion))
		foreach ($filtrosRelacion as $value)
			$criterioRelacion .= 'relacion = \''.$value.'\' or ';
	
	if  (!empty($filtrosGiro))
		foreach ($filtrosGiro as $value)
			$criterioGiro .= 'giro = \''.$value.'\' or ';

	if (!empty($filtrosEstado))
		foreach ($filtrosEstado as $value)
			$criterioEstado .= 'estado = \''.$value.'\' or ';
	

	//Definición de tablas que se mostrarán.
	//Primer filtro
	$filtro3 = 'estado';	
	if ($tipoFiltro === '0')
	{
		foreach ($filtros as $value)
		{
			$criterio .= 'area = \''.$value.'\' or ';
		}		
		$filtro1 = 'relacion';
		$filtro2 = 'giro';		
		$filtro1Num = '1';
		$filtro2Num = '2';
	}
	else if ($tipoFiltro === '1')
	{
		foreach ($filtros as $value)
		{
			$criterio .= 'relacion = \''.$value.'\' or ';
		}		
		$filtro1 = 'area';
		$filtro2 = 'giro';		
		$filtro1Num = '0';
		$filtro2Num = '2';
	}
	else if ($tipoFiltro === '2')
	{
		foreach ($filtros as $value)
		{
			$criterio .= 'giro = \''.$value.'\' or ';
		}		
		$filtro1 = 'area';
		$filtro2 = 'relacion';
		$filtro1Num = '0';
		$filtro2Num = '1';
	}	
	$criterio = substr($criterio, 0, -4);	
	$criterio = '('.$criterio.')';
	
	//Siguientes filtros.
	//Cuarto Filtro. Empezamos desde el cuarto, para ir limpiandolos como sea necesario.
	$criterio4 = '';	
	if ($cuartoFiltro === '0')
		$criterio4 .= $criterioArea;
	else if ($cuartoFiltro === '1')
		$criterio4 .= $criterioRelacion;
	else if ($cuartoFiltro === '2')
		$criterio4 .= $criterioGiro;
	else if ($cuartoFiltro === '3')
		$criterio4 .= $criterioEstado;
	
	if ($criterio4 != '')
	{
		$criterio4 = substr($criterio4, 0, -4);
		$criterio4 = '('.$criterio4.')';
	}	
	
	//Tercer Filtro
	$criterio3 = '';	
	if ($tercerFiltro === '0')
		if (!empty($filtroArea))
			$criterio3 .= $criterioArea;
		else
		{
			//$cuartoFiltro = '';
			$criterio4 = '';
		}
	else if ($tercerFiltro === '1')
		if (!empty($filtrosRelacion))
			$criterio3 .= $criterioRelacion;				
		else
		{
			//$cuartoFiltro = '';
			$criterio4 = '';
		}
	else if ($tercerFiltro === '2')
		if (!empty($filtrosGiro))
			$criterio3 .= $criterioGiro;				
		else
		{
			//$cuartoFiltro = '';
			$criterio4 = '';
		}
	else if ($tercerFiltro === '3')
		if (!empty($filtrosEstado))
			$criterio3 .= $criterioEstado;
		else
		{
			//$cuartoFiltro = '';
			$criterio4 = '';
		}
					
	if ($criterio3 != '')
	{
		$criterio3 = substr($criterio3, 0, -4);
		$criterio3 = '('.$criterio3.')';
	}
	
	//Si se ha limpiado el criterio 4, no debe aparecer ningun miembro de la lista marcado.
	if ($criterio4 == '')
	{
		if ($cuartoFiltro == '0')
			$filtrosArea = null;
		else if ($cuartoFiltro == '1')
			$filtrosRelacion = null;
		else if ($cuartoFiltro == '2')
			$filtrosGiro = null;
		else if ($cuartoFiltro == '3')
			$filtrosEstado = null;
	}
		
	//Segundo Filtro
	$criterio2 = '';
	if ($segundoFiltro === '0')
		if (!empty($filtrosArea))
			$criterio2 .= $criterioArea;
		else
		{
			$tercerFiltro = '';
			$cuartoFiltro = '';
			$criterio3 = '';
			$criterio4 = '';
		}
	else if ($segundoFiltro === '1')
		if (!empty($filtrosRelacion))
			$criterio2 .= $criterioRelacion;
		else
		{
			$tercerFiltro = '';
			$cuartoFiltro = '';
			$criterio3 = '';
			$criterio4 = '';
		}
	else if ($segundoFiltro === '2')
		if (!empty($filtrosGiro))
			$criterio2 .= $criterioGiro;			
		else
		{
			$tercerFiltro = '';
			$cuartoFiltro = '';
			$criterio3 = '';
			$criterio4 = '';
		}
	else if ($segundoFiltro === '3')
		if (!empty($filtrosEstado))
			$criterio2 .= $criterioEstado;
		else
		{
			$tercerFiltro = '';
			$cuartoFiltro = '';
			$criterio3 = '';
			$criterio4 = '';
		}
	
	if ($criterio2 != '')
	{
		$criterio2 = substr($criterio2, 0, -4);
		$criterio2 = '('.$criterio2.')';
	}
	
	if ($criterio2 != '')
		$criterio2 = ' AND '.$criterio2;
	if ($criterio3 != '')
		$criterio3 = ' AND '.$criterio3;
	
	//echo '<br>Criterio inicial '.$criterio.'<br>';
	//echo '<br>Segundo criterio '.$criterio2.'<br>';
	//echo '<br>Tercer criterio '.$criterio3.'<br>';	
		
	
	$unFiltro = $criterio.$criterio2;
	$dosFiltros = $unFiltro.$criterio3;
	
	
	switch ($tipoFiltro)
	{
		//Area
		case '0':			
			if ($tipoPersona === '1')
			{
				if ($segundoFiltro == '1' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct relacion FROM personas_fisicas where ('.$criterio.') order by relacion ';
				else if ($tercerFiltro == '1')
					$qryBusqueda1 = 'SELECT distinct relacion FROM personas_fisicas where ('.$unFiltro.') order by relacion ';
				else 
					$qryBusqueda1 = 'SELECT distinct relacion FROM personas_fisicas where ('.$dosFiltros.') order by relacion ';
					
				if ($segundoFiltro == '2' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$criterio.') order by giro ';
				else if ($tercerFiltro == '2')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$unFiltro.') order by giro ';
				else 
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$dosFiltros.') order by giro ';
									
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$criterio.') order by estado ';
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$unFiltro.') order by estado ';
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$dosFiltros.') order by estado ';
			}
			else if ($tipoPersona === '2')
			{
				if ($segundoFiltro == '1' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct relacion FROM personas_morales where ('.$criterio.') order by relacion ';
				else if ($tercerFiltro == '1')
					$qryBusqueda1 = 'SELECT distinct relacion FROM personas_morales where ('.$unFiltro.') order by relacion ';
				else 
					$qryBusqueda1 = 'SELECT distinct relacion FROM personas_morales where ('.$dosFiltros.') order by relacion ';
					
				if ($segundoFiltro == '2' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$criterio.') order by giro ';
				else if ($tercerFiltro == '2')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$unFiltro.') order by giro ';
				else 
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$dosFiltros.') order by giro ';				
					
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$criterio.') order by estado ';
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$unFiltro.') order by estado ';
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$dosFiltros.') order by estado ';
			}
			else if ($tipoPersona === '3')
			{
				if ($segundoFiltro == '1' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$criterio.') union  SELECT relacion FROM personas_morales WHERE ('.$criterio.')) as personas order by relacion' ;
				else if ($tercerFiltro == '1')
					$qryBusqueda1 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT relacion FROM personas_morales WHERE ('.$unFiltro.')) as personas order by relacion' ;
				else 
					$qryBusqueda1 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT relacion FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by relacion' ;
					
				if ($segundoFiltro == '2' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$criterio.') union  SELECT giro FROM personas_morales WHERE ('.$criterio.')) as personas order by giro' ;
				else if ($tercerFiltro == '2')
					$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT giro FROM personas_morales WHERE ('.$unFiltro.')) as personas order by giro' ;
				else 
					$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT giro FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by giro' ;
									
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$criterio.') union  SELECT estado FROM personas_morales WHERE ('.$criterio.')) as personas order by estado' ;
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT estado FROM personas_morales WHERE ('.$unFiltro.')) as personas order by estado' ;
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT estado FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by estado' ;
			}			
			break;
		
		//Relación
		case '1':			
			if ($tipoPersona === '1')
			{
				if ($segundoFiltro == '0' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$criterio.') order by area ';
				else if ($tercerFiltro == '0')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$unFiltro.') order by area ';
				else 
					$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$dosFiltros.') order by area ';
				
				if ($segundoFiltro == '2' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$criterio.') order by giro ';
				else if ($tercerFiltro == '2')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$unFiltro.') order by giro ';
				else 
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_fisicas where ('.$dosFiltros.') order by giro ';
									
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$criterio.') order by estado ';
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$unFiltro.') order by estado ';
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$dosFiltros.') order by estado ';
			}
			else if ($tipoPersona === '2')
			{
				if ($segundoFiltro == '0' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$criterio.') order by area ';
				else if ($tercerFiltro == '0')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$unFiltro.') order by area ';
				else 
					$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$dosFiltros.') order by area ';
				
				if ($segundoFiltro == '2' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$criterio.') order by giro ';
				else if ($tercerFiltro == '2')
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$unFiltro.') order by giro ';
				else 
					$qryBusqueda2 = 'SELECT distinct giro FROM personas_morales where ('.$dosFiltros.') order by giro ';
									
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$criterio.') order by estado ';
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$unFiltro.') order by estado ';
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$dosFiltros.') order by estado ';
			}
			else if ($tipoPersona === '3')
			{
				if ($segundoFiltro == '0' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$criterio.') union  SELECT area FROM personas_morales WHERE ('.$criterio.')) as personas order by area' ;
				else if ($tercerFiltro == '1')
					$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT area FROM personas_morales WHERE ('.$unFiltro.')) as personas order by area' ;
				else 
					$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT area FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by area' ;
					
				if ($segundoFiltro == '2' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$criterio.') union  SELECT giro FROM personas_morales WHERE ('.$criterio.')) as personas order by giro' ;
				else if ($tercerFiltro == '2')
					$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT giro FROM personas_morales WHERE ('.$unFiltro.')) as personas order by giro' ;
				else 
					$qryBusqueda2 = 'SELECT distinct giro FROM (SELECT giro FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT giro FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by giro' ;
									
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$criterio.') union  SELECT estado FROM personas_morales WHERE ('.$criterio.')) as personas order by estado' ;
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT estado FROM personas_morales WHERE ('.$unFiltro.')) as personas order by estado' ;
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT estado FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by estado' ;
			}
			break;
		
		//Giro
		case '2':			
			if ($tipoPersona === '1')
			{
				if ($segundoFiltro == '0' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$criterio.') order by area ';
				else if ($tercerFiltro == '0')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$unFiltro.') order by area ';
				else 
					$qryBusqueda1 = 'SELECT distinct area FROM personas_fisicas where ('.$dosFiltros.') order by area ';
				
				if ($segundoFiltro == '1' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct relacion FROM personas_fisicas where ('.$criterio.') order by relacion ';
				else if ($tercerFiltro == '1')
					$qryBusqueda2 = 'SELECT distinct relacion FROM personas_fisicas where ('.$unFiltro.') order by relacion ';
				else 
					$qryBusqueda2 = 'SELECT distinct relacion FROM personas_fisicas where ('.$dosFiltros.') order by relacion ';
													
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$criterio.') order by estado ';
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$unFiltro.') order by estado ';
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_fisicas where ('.$dosFiltros.') order by estado ';				
			}
			else if ($tipoPersona === '2')
			{
				if ($segundoFiltro == '0' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$criterio.') order by area ';
				else if ($tercerFiltro == '0')
					$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$unFiltro.') order by area ';
				else 
					$qryBusqueda1 = 'SELECT distinct area FROM personas_morales where ('.$dosFiltros.') order by area ';
				
				if ($segundoFiltro == '1' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct relacion FROM personas_morales where ('.$criterio.') order by relacion ';
				else if ($tercerFiltro == '1')
					$qryBusqueda2 = 'SELECT distinct relacion FROM personas_morales where ('.$unFiltro.') order by relacion ';
				else 
					$qryBusqueda2 = 'SELECT distinct relacion FROM personas_morales where ('.$dosFiltros.') order by relacion ';
					
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$criterio.') order by estado ';
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$unFiltro.') order by estado ';
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM personas_morales where ('.$dosFiltros.') order by estado ';				
			}
			else if ($tipoPersona === '3')
			{
				if ($segundoFiltro == '0' or $segundoFiltro === '')
					$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$criterio.') union  SELECT area FROM personas_morales WHERE ('.$criterio.')) as personas order by area' ;
				else if ($tercerFiltro == '1')
					$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT area FROM personas_morales WHERE ('.$unFiltro.')) as personas order by area' ;
				else 
					$qryBusqueda1 = 'SELECT distinct area FROM (SELECT area FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT area FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by area' ;
					
				if ($segundoFiltro == '1' or $segundoFiltro === '')
					$qryBusqueda2 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$criterio.') union  SELECT relacion FROM personas_morales WHERE ('.$criterio.')) as personas order by relacion' ;
				else if ($tercerFiltro == '1')
					$qryBusqueda2 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT relacion FROM personas_morales WHERE ('.$unFiltro.')) as personas order by relacion' ;
				else 
					$qryBusqueda2 = 'SELECT distinct relacion FROM (SELECT relacion FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT relacion FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by relacion' ;
					
				if ($segundoFiltro == '3' or $segundoFiltro === '')
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$criterio.') union  SELECT estado FROM personas_morales WHERE ('.$criterio.')) as personas order by estado' ;
				else if ($tercerFiltro == '3')
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$unFiltro.') union  SELECT estado FROM personas_morales WHERE ('.$unFiltro.')) as personas order by estado' ;
				else
					$qryBusqueda3 = 'SELECT distinct estado FROM (SELECT estado FROM personas_fisicas WHERE ('.$dosFiltros.') union  SELECT estado FROM personas_morales WHERE ('.$dosFiltros.')) as personas order by estado' ;				
			}
			break;
	}
	
	//echo '<br>'.$qryBusqueda1.'<br>';
	//echo '<br>'.$qryBusqueda2.'<br>';
	//echo '<br>'.$qryBusqueda3.'<br>';
	
	
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
		$seleccionado = 0;
		
		if ($filtro1Num == '0')
		{
			if (!empty($filtrosArea))
			{
				foreach ($filtrosArea as $value)
				{
					if ($value == $obtenido) 
						$seleccionado = 1;		
				}
			}					
		}
		else if ($filtro1Num == '1')
		{
			if (!empty($filtrosRelacion))
			{
				foreach ($filtrosRelacion as $value)
				{
					if ($value == $obtenido) 
						$seleccionado = 1;		
				}
			}
		}
			
		if ($seleccionado === 1)
			$opciones .= '<option value="'.$obtenido.'" selected>'.$obtenido.'</option>';
		else
			$opciones .= '<option value="'.$obtenido.'" >'.$obtenido.'</option>';
	};
	$opciones .= '</select> ';

	
	$opciones2 = '';
	while($resultados = mysqli_fetch_array($consulta2)) 
	{
		$obtenido = $resultados[$filtro2];			
		$seleccionado = 0;
		
		if ($filtro2Num == '2')
		{
			if (!empty($filtrosGiro))
			{
				foreach ($filtrosGiro as $value)
				{
					if ($value == $obtenido) 
						$seleccionado = 1;		
				}
			}					
		}
		else if ($filtro2Num == '1')
		{
			if (!empty($filtrosRelacion))
			{
				foreach ($filtrosRelacion as $value)
				{
					if ($value == $obtenido) 
						$seleccionado = 1;		
				}
			}
		}
		
		if ($seleccionado === 1)
			$opciones2 .= '<option value="'.$obtenido.'" selected>'.$obtenido.'</option>';
		else
			$opciones2 .= '<option value="'.$obtenido.'" >'.$obtenido.'</option>';
	};
	$opciones2 .= '</select> ';

	
	$opciones3 = '';
	while($resultados = mysqli_fetch_array($consulta3)) 
	{
		$obtenido = $resultados[$filtro3];			
		$seleccionado = 0;
		
		if (!empty($filtrosEstado))
		{
			foreach ($filtrosEstado as $value)
			{
				if ($value == $obtenido) 
					$seleccionado = 1;		
			}
		}					
		
		if ($seleccionado === 1)
			$opciones3 .= '<option value="'.$obtenido.'" selected>'.$obtenido.'</option>';
		else
			$opciones3 .= '<option value="'.$obtenido.'" >'.$obtenido.'</option>';
	};
	$opciones3 .= '</select> ';
	
	
	$mensaje .= '
						<tr>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black; width:33.33%;\'><select id="filtro'.$filtro1.'" name="filtro'.$filtro1.'" multiple onChange="muestraResultadosFiltros(\''.$filtro1Num.'\');" style="width:300px">'.$opciones.'</td>							
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black; width:33.33%;\'><select id="filtro'.$filtro2.'" name="filtro'.$filtro2.'" multiple onChange="muestraResultadosFiltros(\''.$filtro2Num.'\');" style="width:300px">'.$opciones2.'</td>							
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black; width:33.33%;\'><select id="filtro'.$filtro3.'" name="filtro'.$filtro3.'" multiple onChange="muestraResultadosFiltros(\'3\');" style="width:300px">'.$opciones3.'</td>							
						</tr>';
	$mensaje .= '</tbody></table></div>';
			
	echo $mensaje;
	
	require('Connections\conexion_close.php');
?>