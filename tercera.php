<?php

    session_start();
    echo "<pre>"; 
    print_r($_SESSION); 
    echo "</pre>";


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
    <title>Sistema</title>
</head>
<body>

<?php
       
     include('conexion.php');
     $admin=$con->query("SELECT * FROM $table WHERE usuario= 'rodrigo' ");

     $resultado = mysqli_fetch_array($admin); 

     //var_dump($resultado['usuario']);

     $user_sesion=$_SESSION['usuario'];


     if($resultado['usuario'] == $user_sesion ){
         echo"<br>Eres el Adminstrador <br>";
         echo"<a href='sistema.php'>Segunda</a>";
        
     }else{
        session_destroy();

        header("Location: index.php");
         
     }
  

?>

    
</body>
</html>