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
	
		<div align="center">
			<h1>Directorio UPV</h1>
		
		
			<div id="area" name="area">
			
				<p>Seleccione una área del siguiente menú:</p>
				<p>Área:
				<select>
					<option value="0"></option>
				
					<?php
						$query = $mysqli -> query ("SELECT distinct area FROM directorio");
						$i = 0;
					
						while ($valores = mysqli_fetch_array($query))
						{
							$i = $i + 1;
							echo '<option value="'.$valores['area'].'" onClick=>'.$valores['area'].'</option>';
						}
					?>
				</select>
			</div>
			
			<div id="area" name="area">
			
				<p>Seleccione tipo de persona:</p>
				<p>Persona:
				<select>
					<option value="0"></option>
				
					<?php
						$query = $mysqli -> query ("SELECT distinct area FROM directorio");
						$i = 0;
					
						while ($valores = mysqli_fetch_array($query))
						{
							$i = $i + 1;
							echo '<option value="'.$valores['area'].'" onClick=>'.$valores['area'].'</option>';
						}
					?>
				</select>
			</div>
			
			
      <button>Enviar</button>
    </p>
  </div>
</body>

</html>