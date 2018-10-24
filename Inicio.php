<?php include('Connections/directorio_coneccion.php'); ?>
<html>
	<head>
		<title>
			Directorio
		</title>
	</head>
	<body>
		Directorio de Usuarios.
		
		<form action="accion.php" method="post">
			<p>Área
			
			<?php
			
				$indice = 1;
				
				$consulta_sql = 'Select distinct area from directorio';
				$resultado_consulta = mysql_query($consulta_sql, $directorio_coneccion);
				
				echo '<select name="select'.$indice.'">';
				echo '<option value="'.$indice.'"></option>';
				while ($fila=mysql_fetch_array($resultado_consulta))
				{
					$indice = $indice + 1;
					echo "<select name='select".$indice."'>";
					echo "<option value=".$indice.">".$resultado_consulta."</option>";
				}
				
				
			?>

			<input type="text" name="nombre" /></p>
			<p>Su edad: <input type="text" name="edad" /></p>
			<p><input type="submit" /></p>
			<select name="select1">	<option value="1">Number 1</option>	<option value="2"  selected="selected">Number 2</option>	<option value="3">Number 3</option>	<option value="4">Number 4</option></select>
		</form>
	
	</body>
</html>