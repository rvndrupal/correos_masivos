<?php
	$mensaje = '';
	
	$mensaje .= '<P><B>FILTROS</b></p>
				<input type="radio" id="filtroBusqueda" name="filtroBusqueda" value="0" onChange="muestraFiltro();"> Área 
				<input type="radio" id="filtroBusqueda" name="filtroBusqueda" value="1" onChange="muestraFiltro();"> Relación
				<input type="radio" id="filtroBusqueda" name="filtroBusqueda" value="2" onChange="muestraFiltro();"> Giro<br><br>';
	
	echo $mensaje;
?>