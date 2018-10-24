<?php

	header('Content-Type: text/html; charset=UTF-8');

	//Archivo de conexión a la base de datos
	require('Connections\conexion.php');

	//Variable de búsqueda
	$tipoPersona = isset($_POST['tipoP']) ? $_POST['tipoP'] : null;


	//Filtro anti-XSS
	$caracteres_malos = array('<', '>', '"', '\'', '/', '<', '>', '\'', '/');
	$caracteres_buenos = array('&lt;', '&gt;', '&quot;', '&#x27;', '&#x2F;', '&#060;', '&#062;', '&#039;', '&#047;');
	$tipoPersona = str_replace($caracteres_malos, $caracteres_buenos, $tipoPersona);

	//Variable vacía (para evitar los E_NOTICE)
	$mensaje = '';

	//Tabla contenedora principal
	$mensaje .= '<table style="width:95%" align="center" >
					<TR><TD style="width:100%">';
	
	switch ($tipoPersona) 
	{
		case '1':
		
			$mensaje .= '<div name="tablaEstados" id="tablaEstados">';
			
			//Estado
			$qryBusqueda = 'SELECT distinct estado FROM personas_fisicas order by estado ';
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			$mensaje .= '			
						<table style=\'width:100%\' align="center" >
							<thead style=\'color:white;background:#3C8DBC;\ width:100%\' align="center">
								<TR>
									<TD align="center" colspan="16" >
										SELECCIONAR TODOS LOS ESTADOS <input type="checkbox" id= "estado" name="estado" value="" onChange="seleccionarTodoEstado();">
									</TD>
								</TR>
							</thead>							
							<tbody>
								<tr>';

			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$estado = $resultados['estado'];
				
				//Output
				$mensaje .= '					
									<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="estados[]" value="' . $estado . '" onChange="desmarcarEstado(this.name); buscarConFiltros();"></b></td>
									<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$estado.'</td>';
				$contador = $contador + 1;
				if ($contador == 8)
				{
					$mensaje .= '</tr><tr>';
					$contador = 0;
				}
			};//Fin while $resultados
				
			$mensaje .= '</tr>';
			$mensaje .= '</tbody></table>';
			$mensaje .= '</div>';
			$mensaje .= '<br>';
			
			$mensaje .= '</TD></TR><TR><TD style="width:100%">';
	
			$mensaje .= '<div name="tablaRelaciones" id="tablaRelaciones">';
			
			//Relacion
			$qryBusqueda = 'SELECT distinct relacion FROM personas_fisicas order by relacion ';
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			$mensaje .= '
					<table style="width:100%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<TD COLSPAN="16" ALIGN = "CENTER">
								SELECCIONAR TODAS LAS RELACIONES <input type="checkbox" id= "relacion" name="relacion" value="" onChange="seleccionarTodoRelacion();"></div>
								</TD>
							</TR>
						</thead>
						<tbody>
							<tr>';


			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$relacion = $resultados['relacion'];
				
				if ($relacion != "")
				{
					//Output
					$mensaje .= '					
									<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="relaciones[]" value="' . $relacion . '" onChange="desmarcarRelacion(this.name); buscarConFiltros();"></b></td>
									<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$relacion.'</td>
								';
					$contador = $contador + 1;
					if ($contador == 8)
					{
						$mensaje .= '</tr><tr>';
						$contador = 0;
					}
				}
			
				
			};//Fin while $resultados
			
			$mensaje .= '</tr>';
			$mensaje .= '</tbody></table>';
			
			$mensaje .= '</div>';
	
			$mensaje .= '<br>';	
			
			$mensaje .= '</TD></TR><TR><TD>';
			
			$mensaje .= '<div name="tablaGiros" id="tablaGiros">';
		
			//Giro
			$qryBusqueda = 'SELECT distinct giro FROM personas_fisicas order by giro ';		
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			$mensaje .= '
				<table style="width:100%" align="center" >
					<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<Td COLSPAN="16" ALIGN = "CENTER">
									SELECCIONAR TODOS LOS GIROS <input type="checkbox" id= "giro" name="giro" value="" onChange="seleccionarTodoGiro();" >
								</Td>							
							</TR>
						</thead>
					<tbody>
						<tr>';

			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$giro = $resultados['giro'];
			
				//Output
				$mensaje .= '					
								<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="giros[]" value="' . $giro . '" onChange="desmarcarGiro(this.name); buscarConFiltros();" ></b></td>
								<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$giro.'</td>
							';
				$contador = $contador + 1;
				if ($contador == 8)
				{
					$mensaje .= '</tr><tr>';
					$contador = 0;
				}
			};//Fin while $resultados
				
			$mensaje .= '</tr>';
						
				
			$mensaje .= '</tbody></table>';
			
			$mensaje .= '</div>';
			
			$mensaje .= '<br>';
					
			$mensaje .= '</TD></TR><TR><TD>';
			
			$mensaje .= '<div name="tablaAreas" id="tablaAreas">';
			
			//Area
			$qryBusqueda = 'SELECT distinct area FROM personas_fisicas order by area ';
		
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			$mensaje .= '
					<table style=\' align:center \' >
						<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<Td COLSPAN="2" ALIGN = "CENTER"> SELECCIONAR TODAS LAS AREAS <input type="checkbox" id= "area" name="area" value="" onChange="seleccionarTodoArea();">
								</Td>
							</TR>
						</thead>
						<tbody>';


			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$area = $resultados['area'];
			
				//Output
				$mensaje .= '<tr>					
								<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="areas[]" value="' . $area . '" onChange="desmarcarArea(this.name); buscarConFiltros();" ></b></td>
								<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$area.'</td>
							</tr>';					
			};//Fin while $resultados
				
			$mensaje .= '</tbody></table>';
				
			$mensaje .= '</div>';
			
			
			$mensaje .= '</TD></TR></table>';


		break;		
		
		case '2':
		
			$mensaje .= '<div name="tablaEstados" id="tablaEstados">';
			
			//Estado
			$qryBusqueda = 'SELECT distinct estado FROM personas_morales order by estado ';
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			$mensaje .= '			
						<table style=\'width:100%\' align="center" >
							<thead style=\'color:white;background:#3C8DBC;\ width:100%\' align="center">
								<TR>
									<TD align="center" colspan="16" >
										SELECCIONAR TODOS LOS ESTADOS <input type="checkbox" id= "estado" name="estado" value="" onChange="seleccionarTodoEstado();">
									</TD>
								</TR>
							</thead>							
							<tbody>
								<tr>';

			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$estado = $resultados['estado'];
				
				//Output
				$mensaje .= '					
									<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="estados[]" value="' . $estado . '" onChange="desmarcarEstado(this.name); buscarConFiltros();"></b></td>
									<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$estado.'</td>';
				$contador = $contador + 1;
				if ($contador == 8)
				{
					$mensaje .= '</tr><tr>';
					$contador = 0;
				}
			};//Fin while $resultados
				
			$mensaje .= '</tr>';
			$mensaje .= '</tbody></table>';
			$mensaje .= '</div>';
			$mensaje .= '<br>';
			
			$mensaje .= '</TD></TR><TR><TD style="width:100%">';
	
			$mensaje .= '<div name="tablaRelaciones" id="tablaRelaciones">';
			
			//Relacion
			$qryBusqueda = 'SELECT distinct relacion FROM personas_morales order by relacion ';
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			$mensaje .= '
					<table style="width:100%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<TD COLSPAN="16" ALIGN = "CENTER">
								SELECCIONAR TODAS LAS RELACIONES <input type="checkbox" id= "relacion" name="relacion" value="" onChange="seleccionarTodoRelacion();"></div>
								</TD>
							</TR>
						</thead>
						<tbody>
							<tr>';


			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$relacion = $resultados['relacion'];
				
				if ($relacion != "")
				{
					//Output
					$mensaje .= '					
									<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="relaciones[]" value="' . $relacion . '" onChange="desmarcarRelacion(this.name); buscarConFiltros();"></b></td>
									<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$relacion.'</td>
								';
					$contador = $contador + 1;
					if ($contador == 8)
					{
						$mensaje .= '</tr><tr>';
						$contador = 0;
					}
				}
			
				
			};//Fin while $resultados
			
			$mensaje .= '</tr>';
			$mensaje .= '</tbody></table>';
			
			$mensaje .= '</div>';
	
			$mensaje .= '<br>';	
			
			$mensaje .= '</TD></TR><TR><TD>';
			
			$mensaje .= '<div name="tablaGiros" id="tablaGiros">';
		
			//Giro
			$qryBusqueda = "SELECT distinct giro FROM personas_morales order by giro ";		
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			$mensaje .= '
				<table style="width:100%" align="center" >
					<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<Td COLSPAN="16" ALIGN = "CENTER">
									SELECCIONAR TODOS LOS GIROS <input type="checkbox" id= "giro" name="giro" value="" onChange="seleccionarTodoGiro();" >
								</Td>							
							</TR>
						</thead>
					<tbody>
						<tr>';

			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$giro = $resultados['giro'];
			
				//Output
				$mensaje .= '					
								<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="giros[]" value="' . $giro . '" onChange="desmarcarGiro(this.name); buscarConFiltros();" ></b></td>
								<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$giro.'</td>
							';
				$contador = $contador + 1;
				if ($contador == 8)
				{
					$mensaje .= '</tr><tr>';
					$contador = 0;
				}
			};//Fin while $resultados
				
			$mensaje .= '</tr>';
						
				
			$mensaje .= '</tbody></table>';
			
			$mensaje .= '</div>';
			
			$mensaje .= '<br>';
					
			$mensaje .= '</TD></TR><TR><TD>';
			
			$mensaje .= '<div name="tablaAreas" id="tablaAreas">';
			
			//Area
			$qryBusqueda = 'SELECT distinct area FROM personas_morales order by area ';
		
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			$mensaje .= '
					<table style=\' align:center \' >
						<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<Td COLSPAN="2" ALIGN = "CENTER"> SELECCIONAR TODAS LAS AREAS <input type="checkbox" id= "area" name="area" value="" onChange="seleccionarTodoArea();">
								</Td>
							</TR>
						</thead>
						<tbody>';


			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$area = $resultados['area'];
			
				//Output
				$mensaje .= '<tr>					
								<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="areas[]" value="' . $area . '" onChange="desmarcarArea(this.name); buscarConFiltros();" ></b></td>
								<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$area.'</td>
							</tr>';					
			};//Fin while $resultados
				
			$mensaje .= '</tbody></table>';
				
			$mensaje .= '</div>';
			
			
			$mensaje .= '</TD></TR></table>';


		break;
	case '3':
	
			$mensaje .= '<div name="tablaEstados" id="tablaEstados">';
			
			//Estado
			//Personas físicas y morales
			$qryBusqueda = 'select distinct estado from 
							(select  distinct estado from personas_fisicas 
							 union
							 select distinct estado from personas_morales) unionEstados order by estado';
			
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			$mensaje .= '			
						<table style=\'width:100%\' align="center" >
							<thead style=\'color:white;background:#3C8DBC;\ width:100%\' align="center">
								<TR>
									<TD align="center" colspan="16" >
										SELECCIONAR TODOS LOS ESTADOS <input type="checkbox" id= "estado" name="estado" value="" onChange="seleccionarTodoEstado();">
									</TD>
								</TR>
							</thead>							
							<tbody>
								<tr>';

			$contador = 0;
			
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			//Bucle de personas físicas.
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$estado = $resultados['estado'];
				
				//Output
				$mensaje .= '					
									<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="estados[]" value="' . $estado . '" onChange="desmarcarEstado(this.name); buscarConFiltros();"></b></td>
									<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$estado.'</td>';
				$contador = $contador + 1;
				if ($contador == 8)
				{
					$mensaje .= '</tr><tr>';
					$contador = 0;
				}
			};//Fin while $resultados
							
			$mensaje .= '</tr>';
			$mensaje .= '</tbody></table>';
			$mensaje .= '</div>';
			$mensaje .= '<br>';
			
			
			$mensaje .= '</TD></TR><TR><TD style="width:100%">';
	
			$mensaje .= '<div name="tablaRelaciones" id="tablaRelaciones">';
			
			//Relacion
			//Personas físicas y morales
			$qryBusqueda = 'select distinct relacion from 
							(select  distinct relacion from personas_fisicas
							 union
							 select distinct relacion from personas_morales) unionRelaciones order by relacion';
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			$mensaje .= '
					<table style="width:100%" align="center" >
						<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<TD COLSPAN="16" ALIGN = "CENTER">
								SELECCIONAR TODAS LAS RELACIONES <input type="checkbox" id= "relacion" name="relacion" value="" onChange="seleccionarTodoRelacion();"></div>
								</TD>
							</TR>
						</thead>
						<tbody>
							<tr>';


			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$relacion = $resultados['relacion'];
				
				if ($relacion != "")
				{
					//Output
					$mensaje .= '					
									<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="relaciones[]" value="' . $relacion . '" onChange="desmarcarRelacion(this.name); buscarConFiltros();"></b></td>
									<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$relacion.'</td>
								';
					$contador = $contador + 1;
					if ($contador == 8)
					{
						$mensaje .= '</tr><tr>';
						$contador = 0;
					}
				}
			
				
			};//Fin while $resultados
			
			$mensaje .= '</tr>';
			$mensaje .= '</tbody></table>';
			
			$mensaje .= '</div>';
	
			$mensaje .= '<br>';	
			
			
			$mensaje .= '</TD></TR><TR><TD>';
			
			$mensaje .= '<div name="tablaGiros" id="tablaGiros">';
		
			//Giro
			$qryBusqueda = 'select distinct giro from 
							(select  distinct giro from personas_fisicas
							 union
							 select distinct giro from personas_morales) unionGiros order by giro';
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si existe alguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			$mensaje .= '
				<table style="width:100%" align="center" >
					<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<Td COLSPAN="16" ALIGN = "CENTER">
									SELECCIONAR TODOS LOS GIROS <input type="checkbox" id= "giro" name="giro" value="" onChange="seleccionarTodoGiro();" >
								</Td>							
							</TR>
						</thead>
					<tbody>
						<tr>';

			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$giro = $resultados['giro'];
			
				//Output
				$mensaje .= '					
								<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="giros[]" value="' . $giro . '" onChange="desmarcarGiro(this.name); buscarConFiltros();" ></b></td>
								<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$giro.'</td>
							';
				$contador = $contador + 1;
				if ($contador == 8)
				{
					$mensaje .= '</tr><tr>';
					$contador = 0;
				}
			};//Fin while $resultados
				
			$mensaje .= '</tr>';
						
				
			$mensaje .= '</tbody></table>';
			
			$mensaje .= '</div>';
			
			$mensaje .= '<br>';
					
			$mensaje .= '</TD></TR><TR><TD>';
			
			$mensaje .= '<div name="tablaAreas" id="tablaAreas">';
			
			//Area
			$qryBusqueda = 'select distinct area from 
							(select  distinct area from personas_fisicas
							 union
							 select distinct area from personas_morales) unionAreas order by area';
		
			$consulta = mysqli_query($conexion, $qryBusqueda);
			
			//Obtiene la cantidad de filas que hay en la consulta
			$filas = mysqli_num_rows($consulta);
			
			//Si no existe ninguna fila que sea igual a $consultaBusqueda, entonces mostramos el siguiente mensaje
			$mensaje .= '
					<table style=\' align:center \' >
						<thead style=\'color:white;background:#3C8DBC;\' align="center">		
							<TR>
								<Td COLSPAN="2" ALIGN = "CENTER"> SELECCIONAR TODAS LAS AREAS <input type="checkbox" id= "area" name="area" value="" onChange="seleccionarTodoArea();">
								</Td>
							</TR>
						</thead>
						<tbody>';


			$contador = 0;
			//La variable $resultado contiene el array que se genera en la consulta, así que obtenemos los datos y los mostramos en un bucle
			while($resultados = mysqli_fetch_array($consulta)) 
			{					
				$area = $resultados['area'];
			
				//Output
				$mensaje .= '<tr>					
								<td align = "center" class=\'text-center\' style=\'color:white;background:#ECEFF1;; color: #000; border: 1px solid black;\'><b><input type="checkbox" name="areas[]" value="' . $area . '" onChange="desmarcarArea(this.name); buscarConFiltros();" ></b></td>
								<td class=\'text-center\' style=\'color:white;background:#ECEFF1; color: #000; border: 1px solid black;\'>'.$area.'</td>
							</tr>';					
			};//Fin while $resultados
			
			
				
			$mensaje .= '</tbody></table>';
				
			$mensaje .= '</div>';
			
			
			$mensaje .= '</TD></TR></table>';

	
		break;
}		
			
//Devolvemos el mensaje que tomará jQuery
echo $mensaje;

require('Connections\conexion_close.php');
?>