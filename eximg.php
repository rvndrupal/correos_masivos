<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>IM&Aacute;GENES ADJUNTADAS </title>
</head>

<body>
<?php
$idve = $_GET["idve"];
include("sqlcon.php");

//echo $idve;
 $sql = "SELECT * FROM Vista_ImagenesVerificacion WHERE IdVerificacion='".$idve."'"; 
 $stmt = sqlsrv_query( $conn_sis, $sql );
	?>
	<table width="366" height="330" border="0" align="center">
  <tr>
  <?php
  $exists = false;
  while( $row = sqlsrv_fetch_array( $stmt) ) {
	$exists = true;
	$url = $row['url'];
  ?>
    
    <th width="124" scope="row"><img src="<?PHP echo $url;?>" width="328" height="322" /></th>
	<?php 
	}
	if(!$exists){
    echo "<br>";
	echo "<CENTER>No cuenta con documentos adjuntos</CENTER>";
	?>
	<th width="124" scope="row"><img src="img/noex.png" width="328" height="322" /></th>
	<?php
	} 
	?>
	</tr>
</table>
	<?php
	
	sqlsrv_free_stmt( $stmt); 
	sqlsrv_close( $conn_sis);
?>
</body>
</html>
