<?php

//mysql_connect("localhost", "frutos", "123") or
//    die("No se pudo conectar: " . mysql_error());
//mysql_select_db("senasica");


$servidor = "localhost:3307"; //el servidor que utilizaremos, en este caso será el localhost
$usuario = "root"; //El usuario que acabamos de crear en la base de datos
$contrasenha = ""; //La contraseña del usuario que utilizaremos
$BD = "directorio_upv"; //El nombre de la base de datos

//$conexion = @mysql_connect($servidor, $usuario, $contrasenha,'UTF8');
$conexion = mysqli_connect($servidor, $usuario, $contrasenha) or die ("No se puede conectar al servidor de  base de datos");
mysqli_select_db($conexion, $BD) or die ("No existe la base de datos");

//mysqli_query("SET NAMES 'utf8'");
//$acentos = $db->query("SET NAMES 'utf8'");

/*
mysql_set_charset('utf8');

 if (!$conexion) {
    die('<strong>INTENTE MAS TARDE PROBLEMAS DE CONEXION</strong> ' . mysql_error());
}else{
echo '';
}
mysql_select_db($BD, $conexion) or die(mysql_error($conexion));


$myConnection= mysqli_connect("$db_host","$db_username","$db_pass") or die ("could not connect to mysql"); 

mysqli_select_db($myConnection, "mrmagicadam") or die ("no database");  
*/
?>


