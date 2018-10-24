<?php
//$dbstr="(DESCRIPTION=              (ADORESS= (PROTOCOL=TCP)(HOST=10.24.22.47)(PORT = 1521)) (CONNECT_DATA=(SERVER = INT)(SERVICE_NAME = service_name)(INSTANCE_NAME = instance_name)))";
//DESARROLLO  
                 $dbstr="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS= (PROTOCOL=TCP)(HOST=10.24.22.45)(PORT = 1521)))(CONNECT_DATA=(SID=DES1)))";
//INTEGRACION  //$dbstr="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS= (PROTOCOL=TCP)(HOST=10.24.22.47)(PORT = 1521)))(CONNECT_DATA=(SERVICE_NAME = INT)))"; 
//LIVERACION   //$dbstr="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS= (PROTOCOL=TCP)(HOST=10.24.22.47)(PORT = 1521)))(CONNECT_DATA=(SERVICE_NAME = LIB)))";  
//                 $dbstr="(DESCRIPTION=(ADDRESS_LIST=(ADDRESS= (PROTOCOL=TCP)(HOST=10.24.22.168)(PORT = 1521)))(CONNECT_DATA=(SERVICE_NAME = PROD)))";   
global $conn;
$conn=oci_connect('DIRECTORIO_DTI_APPS','DiR3ct0r1o',$dbstr,'UTF8');
if(!$conn){
$e = oci_error();
trigger_error(htmlentities($e['message'],ENT_QUOTES), E_USER_ERROR);
}
global $conn;
//echo "conectado";
error_reporting(2);
?>