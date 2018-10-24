<?php
session_start();
	if(isset($_SESSION['nam_user']) && $_SESSION['pass_user']=="rorro"){
		echo"Bienvenido";
	}
	else{
	header("location: index.php");
	session_destroy();
	}

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Quienes Somos</title>
</head>
<body>

<h1>Quiénes Somos </h1>

<div class="salir">
 <a href="salir.php">Salir</a>
</div>

<a href="home.php">Home</a>
	
</body>
</html>