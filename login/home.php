<?php
session_start();
	if(isset($_SESSION['nam_user'])){
		echo "BIENVENIDO <P>";
	}
	else{
	header("location: index.php");
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Bienvenidos</title>
</head>
<body>

<h1>Bienvenido al Sistema.</h1>
<p>
<a href="quienes_somos.php">Quiénes Somos</a>

<div class="salir">
 <a href="salir.php">Salir</a>
</div>
	
</body>
</html>








