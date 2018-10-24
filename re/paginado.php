<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<style>
.pagination {list-style:none; margin:0px; padding:0px;}
.pagination li{float:left; margin:3px;}
.pagination li a{   display:block; padding:3px 5px; color:#fff; background-color:#44b0dd; text-decoration:none;}
.pagination li a.active {border:1px solid #000; color:#000; background-color:#fff;}
.pagination li a.inactive {background-color:#eee; color:#777; border:1px solid #ccc;}
</style>
<script src="1286136086-jquery.js"></script>
<script src="jpaginate.js"></script>
<script>
$(document).ready(function(){
    $("#content").jPaginate();                       
});
</script>
</head>

<body>
<!--<div id='content'> -->
<?php
include("conn02.php");

$con1 = oci_parse($conn,"SELECT COUNT(*) FROM VWN_DETALLE_COADYUVANTES_PF");
 oci_execute($con1);
 $x=1;
 while ($row = oci_fetch_array($con1)){
	  $clave = $row ['0'];
	  echo "Total de Datos:".$clave."<p>";
	 }
	 
$total_fila = (int)$clave;
$res= $total_fila -10;

echo $res."<p>";
$FI='1';
$FF='10';

 $con1 = oci_parse($conn,"SELECT * FROM (SELECT VWN_DETALLE_COADYUVANTES_PF.*, ROWNUM AS FILAS FROM VWN_DETALLE_COADYUVANTES_PF) WHERE FILAS BETWEEN $FI AND $FF");
  oci_execute($con1);
 $x=1;
 
 while ($row = oci_fetch_array($con1)){
	  $nombre = $row ['NOMBRE'];
	  $clave = $row ['CLAVE_CEDULA_AUTORIZACION'];
	  $fila = $row ['FILAS'];
	  echo $fila." ".$nombre." - ".$clave."<p>";
	 }
	 oci_close($conn);
?>
<!--</div>-->
</body>
</html>
