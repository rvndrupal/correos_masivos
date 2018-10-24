<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<!--<script language="javascript"> 

function Abrir_ventana (pagina) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=yes, width=508, height=365, top=85, left=140";
window.open("eximg.php","",opciones);
}
</script> -->

<style type="text/css">
body {
background-image: url(img/FON2.png);
 background-position: center center;
 background-repeat: no-repeat;
 background-attachment: fixed;
 background-size: cover;
}
#centro{
overflow-y:scroll;
height:600px;
width:800px;

}
.Estilo1 {font-size: 14px}
#iz{
float:inherit;
margin: 30px;
padding: 50px;
overflow-y:scroll;
height:600px;
width:800px;
}
/*
#der{
float:inherit;
margin: 30px;
padding: 5px;
 overflow-y:scroll;
height:600px;
width:800px;
}*/
</style>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
<!--<script language="javascript"> 
function Abrir_ventana (pagina,correo) {
var opciones="toolbar=no, location=no, directories=no, status=no, menubar=no, scrollbars=no, resizable=no, width=50, height=50, top=70, left=100";
window.open(pagina,correo,"",opciones);
}
</script> -->
</head>
<?php
include("conn02.php");
$id = $_GET["id"];
$nom = $_GET["nom"];
$ap = $_GET["ap"];
$am = $_GET["am"];
$un = $_GET["un"];
$campo = $_GET["cm"];
$materia = $_GET["ma"];
$organo =$_GET["org"];
$id_tra =$_GET["id_tra"];
$curp =$_GET["curp"];
//echo $id_tra;
//echo $idp2." ".$nom." ".$ap." ".$am." ".$un;
//$con = oci_parse($conn,"SELECT * FROM VWN_DOCUMENTOS_COADYUVANTE WHERE ID_TRAMITE ='".$id_tra."'");
  $con = oci_parse($conn,"SELECT * FROM VWN_DOCUMENTOS_COADYUVANTE WHERE ID_TRAMITE ='".$id_tra."'");
 oci_execute($con);

?>

<body>
<center>
<div id="iz">
  <table  border="0" width="701">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">EXPEDIENTE</font></th>

    </tr>
    <tr>
      <th colspan="2" scope="row"><div align="left"><font color='#2e86c1'><?php echo $id?></font></div></th>
	  </tr>
    <tr>
      <th width="149" scope="row"><div align="right">Nombre(s):</div></th>
      <td width="363"><div align="left"><font color='#2e86c1'><?php echo $nom?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Primer Apellido: </div></th>
      <td><div align="left"><font color='#2e86c1'><?php echo $ap?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Segundo Apellido: </div></th>
      <td><div align="left"><font color='#2e86c1'><?php echo $am?></font></div></td>
      </tr>
    <tr>
      <th scope="row"><div align="right">Organizacion: </div></th>
      <td><div align="left"><font color='#2e86c1'><?php echo $un?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Organo Coadyuvnte:</div></th>
      <td><div align="left"><font color='#2e86c1'><?php echo $organo?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Campo de Estudio:</div></th>
      <td><div align="left"><font color='#2e86c1'><?php echo $campo?></font></div></td>
      </tr>
    <tr>
      <th scope="row"><div align="right">Materia:</div></th>
      <td><font color='#2e86c1'><?php echo $materia?></font></td>
      </tr>
  </table>
	<table width="701" border="0">
	<tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">DOCUMENTACION</font></th>
      </tr>
	  <?php 
	 $exists = false;
	 while ($row = oci_fetch_array($con)){
	 $exists = true;
	 $tipo_doc = $row['TIPO_DOCUMENTO'];
	 $ddocname= $row['DDOCNAME'];
	 
	?>
	  <tr>
     <!-- <th width="148" scope="row"><a href="pdf2.php?id_doc=<?//php echo $tipo_doc;?>&dd=<?php //echo $ddocname;?>" target="_blank"><img src="img/pdf1.png" width="54" height="52" /></a></th> -->
          <th width="148" scope="row"><a href="javascript:window.open('pdf2.php?id_doc=<?php echo $tipo_doc;?>&dd=<?php echo $ddocname;?>','PDF','width=1000,height=350,location=NO');"><img src="img/pdf1.png" width="54" height="52" /></a>
	  <th width="543"><div align="left" class="Estilo1"><font color='#2e86c1'><?php echo $tipo_doc?></font></div></th>
	                                       
    </tr>
	<tr>
	<th colspan="2"><hr width="100%"></th>
	</tr>
  <?php
  }
  ?>
  </table>
  	<?php
  if(!$exists){
    echo "<br>";
	echo "<CENTER>No cuenta con documentos adjuntos</CENTER>";
	}
  ?>
</div>
 </center>
<!--<div id="der">
  <?php/*
 include("sqlcon.php");
 $sql = "SELECT * FROM Usuarios WHERE curp='".$curp."'";
 //WHERE rfc='".$rfc."'
$stmt = sqlsrv_query( $conn_sis, $sql );
//if( $stmt === false) {
  //  die( print_r( sqlsrv_errors(), true) );
//}

	while( $row = sqlsrv_fetch_array( $stmt) ) {
	$a = $row['CURP'];
	$idv = $row['0'];
	//$id = $row['id'];
	//$id = $row['0'];
	
	echo $a." ";
	echo $idv;
	//echo $id;
	}
	*/
	
    
//Vista_Verificaciones order by fecha 	
//$sql = "SELECT * FROM Vista_Verificaciones WHERE IdUsuario='".$idv."'";
//$stmt = sqlsrv_query( $conn_sis, $sql );
//if( $stmt === false) {
//    die( print_r( sqlsrv_errors(), true) );
//}

	/*while( $row = sqlsrv_fetch_array( $stmt) ) {
	$idve = $row['IdVerificacion'];
	$fec = $row['Fecha'];
	$uv = $row['UnidadVerificacion'];
	$tv = $row['TipoVerificacion'];
	$mv = $row['MateriaVerificacion'];
	$te = $row['TipoEstablecimiento'];
	$tt = $row['TipoTratamiento'];
	$sv = $row['SitioVerficacion'];
	$gr = $row['Georeferencia'];
	$estado = $row['Estado'];
	$municipio = $row['Municipio'];
	$localidad = $row['Localidad'];	
	$hs = $row['HoraDeSolicitud'];
	$hiv = $row['HoraDeInicioVerificacion'];
	$ffv = $row['FechaDeFinVerificacion'];
	$r = $row['Resultado'];
	$ob = $row['Observaciones'];
	$ta = $row['TiempoAcumulado'];
	$pa = $row['Pausa'];
	$us = $row['Usuario'];
	$url = $row['url'];*/
?>
  <table width="653" border="0">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDADES</font></th>
    </tr>
	
    <tr>
      <th width="305" scope="row"><div align="right">Fecha:</div></th>
      <td width="332"><?php //echo $fec;?></td>
    </tr> 
    <tr>
      <th scope="row"><div align="right">Unidad de verificaci&oacute;n: </div></th>
      <td><font color='#2e86c1'><?php //echo $uv;?></font></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Materia de verificacion: </div></th>
      <td><font color='#2e86c1'><?php //echo $mv;?></font></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Tipo de verificaci&oacute;n: </div></th>
      <td><font color='#2e86c1'><?php //echo $tv;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Tipo de establecimiento: </div></th>
      <td><font color='#2e86c1'><?php //echo $te;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Tipo de tratamiento: </div></th>
      <td><font color='#2e86c1'><?php //echo $tt;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Sitio de verificacion: </div></th>
      <td><font color='#2e86c1'><?php //echo $sv;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Mercancia verificadas: </div></th>
      <td><font color='#2e86c1'><?php  ?></font></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Disposiciones legales aplicadas: </div></th>
      <td><font color='#2e86c1'><?php //echo $te;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Georeferencia:</div></th>
      <td><font color='#2e86c1'><?php //echo $gr;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Estado:</div></th>
      <td><font color='#2e86c1'><?php //echo $estado;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Municipio:</div></th>
	  <td><font color='#2e86c1'><?php //echo $municipio;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Localidad:</div></th>
	  <td><font color='#2e86c1'><?php //echo $localidad;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Hora de Solisitud:</div></th>
	  <td><font color='#2e86c1'><?php ?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Hora de Inicio:</div></th>
	  <td><font color='#2e86c1'><?php //echo hiv;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Hora de Fin:</div></th>
	  <td><font color='#2e86c1'><?php ?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Resultado:</div></th>
	  <td><font color='#2e86c1'><?php// echo $r;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Observaciones:</div></th>
	  <td><font color='#2e86c1'><?php// echo $ob;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Tiempo acumulado:</div></th>
	  <td><font color='#2e86c1'><?php //echo $ta;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Pausada:</div></th>
	  <td><font color='#2e86c1'><?php// if ($pa=='0'){echo "NO";} else{echo"SI";}?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Usuario:</div></th>
	  <td><font color='#2e86c1'><?php //echo $us;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Fotos:</div></th>
	  <!--<td><font color='#2e86c1'><a href="javascript:Abrir_ventana('eximg.php?idve=<?php //echo $idve;?>')" target="_blank">img</a></font></td>                            
          <td><font color='#2e86c1'><a href="javascript:window.open('eximg.php?idve=<?php echo $idve;?>','IM&Aacute;GENES ADJUNTADAS','width=1000,height=350,location=NO');">img</a></font></td> --> 
	</tr>
	<!--tr>
	  <th scope="row"><div align="right">Fotos</div></th>
	  <td><?php //include'eximg.php'; ?></td>                             
    </tr>  -->
<?php
//}	
//sqlsrv_free_stmt( $stmt); 
	//sqlsrv_close( $conn_sis);
  ?>
</div> 
</body>
</html>
