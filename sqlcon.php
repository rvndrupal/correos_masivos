<?php
$serverName = "10.24.22.154\ETCS01CNRFBD, 1433" ; 
$connectionInfo = array("Database"=>"SISUVF", "UID"=>"InvitadoSGUVF", "PWD"=>"Guest2017", "characterSet"=>"UTF-8");
$conn_sis = sqlsrv_connect($serverName, $connectionInfo);

if($conn_sis){
echo "";
}else{
echo "fallo la conecxion";
die(print_r(sqlsrv_errors(),true));
}
?>

