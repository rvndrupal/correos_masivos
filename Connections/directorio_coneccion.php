<?php
$hostname_directorio_coneccion = "localhost";
$database_directorio_coneccion = "test";//local
$username_directorio_coneccion = "root";//Usuario administrador local
$password_directorio_coneccion = "admin";//Usuario administrador local
$directorio_coneccion = mysql_pconnect($hostname_directorio_coneccion, $username_directorio_coneccion, $password_directorio_coneccion) or trigger_error(mysql_error(),E_USER_ERROR); 
?>