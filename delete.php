<?php

    session_start();
    if(isset($_SESSION['usuario'])){
        echo"Inicio Sesión correctamente ";
        echo"<a href='cerrar.php'>Cerrar Sesión</a>";
        
    }else{
        header("Location: index.php");
    }


     include('Connections/conexion.php'); 
     $id=$_GET['id']; 
     $borrar="DELETE FROM $table where id=$id";
     $ejecutar=$con->query($borrar);
     header('Location: panel.php');

?>