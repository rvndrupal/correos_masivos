<?php
	header('Content-Type: text/html; charset=UTF-8');

	//Archivo de conexión a la base de datos
	require('Connections\conexion.php');

	//Variable de búsqueda
	$tipoFiltro = isset($_POST['tipoF']) ? $_POST['tipoF'] : null;
	$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;

	//Filtro anti-XSS
	$caracteres_malos = array('<', '>', '"', '\'', '/', '<', '>', '\'', '/');
	$caracteres_buenos = array('&lt;', '&gt;', '&quot;', '&#x27;', '&#x2F;', '&#060;', '&#062;', '&#039;', '&#047;');
	$tipoFiltro = str_replace($caracteres_malos, $caracteres_buenos, $tipoFiltro);
	
	$mensaje = '';
	$mensaje = '<table style="width:45%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\'>		
							<tr>
								PRIMER FILTRO
							</tr>
							<tr>
								<th class=\'text-center\' width=100% style=\' color: #000; border: 1px solid black;\'>Busqueda por ';

	switch ($tipoFiltro)
	{
		//Area
		case '0':
			$mensaje .= 'Área<br>';
			
			if ($tipoPersona === '1') 
			{
				$qryBusqueda = 'SELECT distinct area FROM personas_fisicas order by area ';
			}
			else if ($tipoPersona === '2')
			{
				$qryBusqueda = 'SELECT distinct area FROM personas_morales order by area ';
			}
			else if ($tipoPersona === '3')
			{
				$qryBusqueda = 'SELECT distinct area FROM (select area from personas_fisicas union select area from personas_morales) as personas order by area ';
			}

			$variable = 'area';
			break;		
		//Relación
		case '1':
			$mensaje .= 'Relación<br>';
			
			if ($tipoPersona === '1')
			{
				$qryBusqueda = 'SELECT distinct relacion FROM personas_fisicas order by relacion ';
			}
			else if ($tipoPersona === '2')
			{
				$qryBusqueda = 'SELECT distinct relacion FROM personas_morales order by relacion ';
			}
			else if ($tipoPersona === '3')
			{
				$qryBusqueda = 'SELECT distinct relacion FROM (select relacion from personas_fisicas union select relacion from personas_morales) as personas order by relacion ';
			}
			
			$variable = 'relacion';
			break;
		//Giro
		case '2':
			$mensaje .= 'Giro<br>';
			
			if ($tipoPersona === '1')
			{
				$qryBusqueda = 'SELECT distinct giro FROM personas_fisicas order by giro ';
			}
			else if ($tipoPersona === '2')
			{
				$qryBusqueda = 'SELECT distinct giro FROM personas_morales order by giro ';
			}
			else if ($tipoPersona === '3')
			{
				$qryBusqueda = 'SELECT distinct giro FROM (select giro from personas_fisicas union select giro from personas_morales) as personas order by giro ';
			}
			
			$variable = 'giro';
			break;
	}
	
	$mensaje .= '				</th>								
							</tr>				
						</thead>
						<tbody>';
	
	$consulta = mysqli_query($conexion, $qryBusqueda);
	
	$criterio = '';
				
	while($resultados = mysqli_fetch_array($consulta)) 
	{
		$obtenido = $resultados[$variable];
		$criterio .= '<option value="'.$obtenido.'" >'.$obtenido.'</option>';	
	};

	$criterio .= '</select>';
	
	$mensaje .= '		<tr>
							<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'><select id="primerFiltro" name="primerFiltro" multiple onChange="muestraFiltros();" style="width:500px">'.$criterio.'</td>							
						</tr>';
	$mensaje .= '</tbody></table></div>';
			
	echo $mensaje;
	
	require('Connections\conexion_close.php');
?>