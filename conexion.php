<?php

    $host="localhost";
    $user="rodrigo";
    $pass="rorro";
    $db="login";
    $table="usuarios";

    $con=new mysqli($host,$user,$pass,$db);

    if($con){
        
    }else
    {
        echo"Error al conectar";
    }

?>