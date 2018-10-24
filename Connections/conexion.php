<?php

//Credenciales de acceso.
$servidor = "localhost"; //el servidor que utilizaremos, en este caso ser� el localhost
$user = "rodrigo"; //El usuario que acabamos de crear en la base de datos
$pass = "rorro"; //La contrase�a del usuario que utilizaremos
$BD = "directorio"; //El nombre de la base de datos
$table="usuarios";

//Se establece la conexi�n.
/*
$conexion = mysqli_connect($servidor, $usuario, $contrasenha) or die ("No se puede conectar al servidor de  base de datos");
mysqli_select_db($conexion, $BD) or die ("No existe la base de datos");
*/
$conexion= mysqli_connect($servidor,$user,$pass,$BD);
$conexion->set_charset("utf8");
$con=new mysqli($servidor,$user,$pass,$BD);

    if($con){
        
    }else
    {
        echo"Error al conectar";
    }
//Se setea charset, para que sea utf8 (Caracteres raros).
//$conexion->set_charset("utf8");
  
?>


