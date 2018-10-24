<?php
	$mysqli = new mysqli('localhost', 'root', 'admin', 'test');
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<title>Directorio UPV</title>
		<meta http-equiv="content-type" content="text/html;charset=utf-8" />
		<meta name="generator" content="Geany 1.23.1" />
	</head>
	
	<body>
		<form id="frmDatos" name="frmDatos" method="post" action="">
			<label>Ciudades:
				<select name="selCiudades" size="6" id="selCiudades">
				<?php
					$tablaArea = mysql_query('SELECT * FROM directorio ORDER BY area ASC');
					while ($registroArea = mysql_fetch_array($tablaArea)) 
					{
				?>
					<option value="<?php echo $registroArea['id_directorio']; ?>"><?php echo $registroCiudad['area']; ?></option>
					<?php
						}
						mysql_free_result($tablaArea);
					?>
				</select>
			</label> 
			
			<label>Propiedades:
				<select name="selPropiedades" size="6" id="selPropiedades">
				</select>
			</label>
		</form> 
	</body>

</html>