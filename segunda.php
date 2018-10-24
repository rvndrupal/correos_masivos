<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        echo"Inicio Sesión correctamente ";
        echo"<a href='cerrar.php'>Cerrar Sesión</a>";
        
    }else{
        header("Location: index.php");
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Segunda Página</title>
</head>
<body>
    <h1>Segunda Página</h1>
    <p>Esto es de la segunda página</p>
    <a href="sistema.php">Sistema</a><br>
    <a href="tercera.php">Admin</a>
</body>
</html>