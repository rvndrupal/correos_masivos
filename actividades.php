<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<style>
#der{
float:inherit;
margin: 30px;
/*padding: 5px;*/
/*overflow-y:scroll;*/
height:600px;
width:800px;
}

/*body {
overflow-x:hidden;
overflow-y:hidden;
}
background-image: url(img/FON2.png);
 background-position: center center;
 background-repeat: no-repeat;
 background-attachment: fixed;
 background-size: cover;
*/
</style>
<title>Documento sin t&iacute;tulo</title>
</head>
<body>
<!--<center>
<div id="der"> -->

  <?php
  //include("conn.php");

  include("sqlcon.php");
  $curp =$_GET["curp"];
  $id = $_GET["id"];
$nom = $_GET["nom"];
$ap = $_GET["ap"];
$am = $_GET["am"];
$un = $_GET["un"];
$campo = $_GET["cm"];
$materia = $_GET["ma"];
$organo =$_GET["org"];
$id_tra =$_GET["id_tra"];
$siglas =$_GET["siglas"];
$id_materia =$_GET["id_materia"];
$clav_autorizacion =$_GET["clav_autorizacion"];

//echo $materia;
if($siglas == 'DGSV'){
  //echo $curp."<br>"; 
 
  $sqlu1 = "SELECT  COUNT (*) FROM Usuarios WHERE CURP='".$curp."'";
  $stmtu1 = sqlsrv_query( $conn_sis, $sqlu1 );
  while( $rowu1 = sqlsrv_fetch_array( $stmtu1) ) {
  $idu1 = $rowu1['0']; 
// echo $idu1; 
  }
 
 if($idu1 == '0'){echo 'No cuenta con Actividades';}
 
 else{
  $sqlu = "SELECT * FROM Usuarios WHERE CURP='".$curp."'";
  $stmtu = sqlsrv_query( $conn_sis, $sqlu );
  while( $rowu = sqlsrv_fetch_array( $stmtu) ) {
  $idu = $rowu['IdUsuario']; 
  //echo "ok".$idu;
  }
  
  $sqluu = "SELECT COUNT (*) FROM Vista_Verificaciones WHERE IdUsuario='".$idu."'";
  $stmtuu = sqlsrv_query( $conn_sis, $sqluu );
  while( $rowuu = sqlsrv_fetch_array( $stmtuu) ) {
  $iduu = $rowuu['0']; 
  
  } 
  
  if($iduu=='0'){echo "No ha realizado ninguna actividad";}
  else{
  echo "TOTAL DE ACTIVIDADES <font color='#2e86c1'>".$iduu."</font>";
  $sql = "SELECT * FROM Vista_Verificaciones WHERE IdUsuario='".$idu."'";
  $stmt = sqlsrv_query( $conn_sis, $sql );

	 
	while( $row = sqlsrv_fetch_array( $stmt) ) {
	//$mer = $row['Mercancia'];
	$idve = $row['IdVerificacion'];
	$fec = $row['FechaVer'];
	$uv = $row['UnidadVerificacion'];
	$tv = $row['TipoVerificacion'];
	$mv = $row['MateriaVerificacion'];
	$tes = $row['TipoEstablecimiento'];
	$tt = $row['TipoTratamiento'];
	$sv = $row['SitioVerficacion'];
	$gr = $row['Georeferencia'];
	$estado = $row['Estado'];
	$municipio = $row['Municipio'];
	$localidad = $row['Localidad'];	
	$hs = date_format($row['HoraDeSolicitud'],'g:ia');
	$hiv = date_format($row['HoraDeInicioVerificacion'],'g:ia');
	$ffv = $row['FechaFin'];
	$r = $row['Resultado'];
	$ob = $row['Observaciones'];
	$ta = $row['TiempoAcumulado'];
	$pa = $row['Pausa'];
	$us = $row['Usuario'];
	//$url = $row['url'];
	//echo "ok2".$idve;
?>
  <table width="553" border="0">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDAD</font></th>
    </tr>
	
    <tr>
      <th width="226" scope="row"><div align="right">Fecha:</div></th>
      <td width="417"><font color='#2e86c1'><?php echo $fec;?></font></td>
    </tr> 
    <tr>
      <th scope="row"><div align="right">Unidad de verificaci&oacute;n: </div></th>
      <td><font color='#2e86c1'><?php echo $uv;?></font></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Materia de verificacion: </div></th>
      <td><font color='#2e86c1'><?php echo $mv;?></font></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Tipo de verificaci&oacute;n: </div></th>
      <td><font color='#2e86c1'><?php echo $tv;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Tipo de establecimiento: </div></th>
      <td><font color='#2e86c1'><?php echo $tes;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Tipo de tratamiento: </div></th>
      <td><font color='#2e86c1'><?php echo $tt;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Sitio de verificacion: </div></th>
      <td><font color='#2e86c1'><?php echo $sv;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Mercancia verificadas: </div></th>
      <td><font color='#2e86c1'><?php
	  $sqlM = "SELECT * FROM Vista_MercanciasVerificadas WHERE IdVerificacion='".$idve."'"; 
      $stmtM = sqlsrv_query( $conn_sis, $sqlM ); 
	  while( $rowM = sqlsrv_fetch_array( $stmtM) ) {
	  $mer = $rowM ['Mercancia'];
	  echo "&bull;".$mer." "; 
	  }?></font></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Disposiciones legales aplicadas: </div></th>
      <td><font color='#2e86c1'><?php
	  $sqlD = "SELECT * FROM Vista_DisposicionesLegalesAplicadas WHERE IdVerificacion='".$idve."'"; 
      $stmtD = sqlsrv_query( $conn_sis, $sqlD ); 
	  while( $rowD = sqlsrv_fetch_array( $stmtD) ) {
	  $te = $rowD ['DisposicionLegal'];
	  echo "&bull;".$te." "; }?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Georeferencia:</div></th>
      <td><font color='#2e86c1'><?php echo $gr;?></font></td>
    </tr>
	<tr>
      <th scope="row"><div align="right">Estado:</div></th>
      <td><font color='#2e86c1'><?php echo $estado;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Municipio:</div></th>
	  <td><font color='#2e86c1'><?php echo $municipio;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Localidad:</div></th>
	  <td><font color='#2e86c1'><?php echo $localidad;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Hora de Solicitud:</div></th>
	  <td><font color='#2e86c1'><?php echo $hs;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Hora de Inicio:</div></th>
	  <td><font color='#2e86c1'><?php echo $hiv;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Fecha de Fin:</div></th>
	  <td><font color='#2e86c1'><?php echo $ffv;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Resultado:</div></th>
	  <td><font color='#2e86c1'><?php if ($r==1){ echo "Cumple";} else{echo "No Cumple";}?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Observaciones:</div></th>
	  <td><font color='#2e86c1'><?php echo $ob;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Tiempo acumulado:</div></th>
	  <td><font color='#2e86c1'><?php echo $ta;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Pausada:</div></th>
	  <td><font color='#2e86c1'><?php if ($pa=='0'){echo "NO";} else{echo"SI";}?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Usuario:</div></th>
	  <td><font color='#2e86c1'><?php echo $us;?></font></td>
    </tr>
	<tr>
	  <th scope="row"><div align="right">Fotos:</div></th>
	  <!--<td><font color='#2e86c1'><a href="javascript:Abrir_ventana('eximg.php?idve=<?php//echo $idve;?>')" target="_blank">img</a></font></td>   -->                           
          <td><font color='#2e86c1'><a href="javascript:window.open('eximg.php?idve=<?php echo $idve;?>','IM&Aacute;GENES ADJUNTADAS','width=1000,height=350,location=NO');">img</a></font></td>
	</tr>
	<!--tr>
	  <th scope="row"><div align="right">Fotos</div></th>
	  <td><?php//include'eximg.php'; ?></td>                             
    </tr>  -->
</table>
<?php
}	
   sqlsrv_free_stmt( $stmt); 
	sqlsrv_close( $conn_sis);
}
	}
  ?>
<!--</div>
</center>
 -->

<?PHP }//FIN DEL IF INICIAL
if($siglas=='DGIF'){
if($id_materia=='51'){
?>
<!--<table  border="0" width="701">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">EXPEDIENTE</font></th>

    </tr>
    <tr>
      <th colspan="2" scope="row"><div align="left"><font color='#2e86c1'><?phpecho $curp?></font></div></th>
	  </tr>
    <tr>
      <th width="149" scope="row"><div align="right">Nombre(s):</div></th>
      <td width="363"><div align="left"><font color='#2e86c1'><?phpecho $nom?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Primer Apellido: </div></th>
      <td><div align="left"><font color='#2e86c1'><?phpecho $ap?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Segundo Apellido: </div></th>
      <td><div align="left"><font color='#2e86c1'><?phpecho $am?></font></div></td>
      </tr>
    <tr>
      <th scope="row"><div align="right">Organizacion: </div></th>
      <td><div align="left"><font color='#2e86c1'><?phpecho $un?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Organo Coadyuvnte:</div></th>
      <td><div align="left"><font color='#2e86c1'><?phpecho $organo?></font></div></td>
    </tr>
    <tr>
      <th scope="row"><div align="right">Campo de Estudio:</div></th>
      <td><div align="left"><font color='#2e86c1'><?phpecho $campo?></font></div></td>
      </tr>
    <tr>
      <th scope="row"><div align="right">Materia:</div></th>
      <td><font color='#2e86c1'><?phpecho $materia?></font></td>
      </tr>
  </table> -->
<?php
include("conn.php");
$con = oci_parse($conn,"SELECT * FROM BDI_TERCEROS.VW_MOVILIZACION_NACIONAL WHERE CURP ='".$curp."' ");
oci_execute($con);
$exists = false;
$X='0';
	 while ($row = oci_fetch_array($con)){
$exists = true;
	 $PVIF = $row['PVIF'];
	 $TEA = $row['NOM_VERIFICADOR_TEA'];
	 $FECHA = $row['FECHA_HORA_VERIFICACION'];
	 $FORMATO = $row['TIPO_FORMATO'];
	 $VEHICULO = $row['VEHICULO_INSPECCIONADO'];
	 $PLACAS = $row['PLACAS_VEHICULO'];
	 $CLASIFICACION = $row['CLASIFICACION_MERCANCIA'];
	 $DOCUMENTO = $row['DOCUMENTO_AMPARA_MOVILIZACION'];
	 $FOLIO = $row['FOLIO'];
	 $PROPIETARIO = $row['PROPIETARIO_SOLICITANTE1'];
	 $AGRICOLA = $row['MERCANCIA_AGRICOLA'];
	 $CANTIDAD = $row['CANTIDAD'];
	 $MEDIDA1 = $row['UNIDAD_MEDIDA1'];
	 $MAS = $row['TRANSPORTA_MAS_MERCANCIA'];
	 $MERCANCIA2 = $row['MERCANCIA_2'];
	 $CANTIDAD2 = $row['CANTIDAD_2'];
	 $MERCANCIA3 = $row['MERCANCIA_3'];
	 $CANTIDAD3 = $row['CANTIDAD_3'];
	 $MERCANCIA4 = $row['MERCANCIA_4'];
	 $CANTIDAD4 = $row['CANTIDAD_4'];
	 $MERCANCIA5 = $row['MERCANCIA_5'];
	 $CANTIDAD5 = $row['CANTIDAD_5'];
	 $PECUARIA = $row['MERCANCIA_PECUARIA'];
	 $CANPEC = $row['CANTIDAD_PECUARIA'];
	 $UNIDAD = $row['UNIDAD_MEDIDA'];
	 $MOTIVO1 = $row['MOTIVO_MOVILIZACION1'];
	 $MUNICIPIO = $row['MUNICIPIO_ORIGEN_MOVILIZACION'];
	 $ESTADO = $row['ESTADO_DESTINO_MOVILIZACION'];
	 $MOTIVO1 = $row['MOTIVO_MOVILIZACION1'];
	 $MUNICIPIODES = $row['MUNICIPIO_DESTINO_MOVILIZACION'];
	 $FLEJE = $row['FLEJE'];
	 $DICTAMEN = $row['DICTAMEN_VERIFICACION'];
	 $OBSERVACIONES = $row['OBSERVACIONES'];
	 $MOTIVO = $row['MOTIVO_MOVILIZACION'];
	 $X++
?>

<table border="0">
<tr>
 <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDADE <?PHP echo $X;?></font></th>
</tr>
<tr>
<th width="204"><div align="right">PVIF:</div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $PVIF;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Nombre del TEA:</div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $TEA;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Fecha Y Hora de verificacion: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $FECHA;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Tipo de formato: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $FORMATO;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Vehiculo inspeccionado: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $VEHICULO;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Placas: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $PLACAS;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Clasificacion: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $CLASIFICACION;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Documento de Movilizacion: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $DOCUMENTO;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Folio: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $FOLIO;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Propietario Solisitante: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $PROPIETARIO;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Mercancia: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $AGRICOLA;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Cantidad: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $CANTIDAD." ".$MEDIDA1;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">&iquest;Transporta mas Mercancia?: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $MAS;?></font></div></th>
</tr>
<?PHP if($MERCANCIA2==""){}else{?>
<tr>
<th width="204"><div align="right">Mercancia 2: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $MERCANCIA2;?></font></div></th>
</tr>
<?php }?>
<?PHP if($CANTIDAD2==""){}else{?>
<tr>
<th width="204"><div align="right">Cantidad 2: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $CANTIDAD2;?></font></div></th>
</tr>
<?php }?>
<?PHP if($MERCANCIA3==""){}else{?>
<tr>
<th width="204"><div align="right">Mercancia 3: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $MERCANCIA3;?></font></div></th>
</tr>
<?php }?>
<?PHP if($CANTIDAD3==""){}else{?>
<tr>
<th width="204"><div align="right">Cantidad 3: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $CANTIDAD3;?></font></div></th>
</tr>
<?php }?>
<?PHP if($MERCANCIA4==""){}else{?>
<tr>
<th width="204"><div align="right">Mercancia 4: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $MERCANCIA3;?></font></div></th>
</tr>
<?php }?>
<?PHP if($CANTIDAD4==""){}else{?>
<tr>
<th width="204"><div align="right">Cantidad 4: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $CANTIDAD4;?></font></div></th>
</tr>
<?php }?>
<?PHP if($MERCANCIA5==""){}else{?>
<tr>
<th width="204"><div align="right">Mercancia 5: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $MERCANCIA5;?></font></div></th>
</tr>
<?php }?>
<?PHP if($CANTIDAD5==""){}else{?>
<tr>
<th width="204"><div align="right">Cantidad 5: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $CANTIDAD5;?></font></div></th>
</tr>
<?php }?>
<tr>
<th width="204"><div align="right">Mercancia Pecuaria: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $PECUARIA;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Cantidad Pecuaria: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $CANPEC." ".$UNIDAD;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Motivo de Movilizacion: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $MOTIVO1;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Municipio Origen: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $MUNICIPIO;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Estado de Destino: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo $ESTADO;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Municipio Destino: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo  $MUNICIPIODES;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">FIEJE: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo  $FIEJE;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Dictamen: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo  $DICTAMEN;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Observaciones: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo  $OBSERVACIONES;?></font></div></th>
</tr>
<tr>
<th width="204"><div align="right">Motivo de Movilizacion: </div></th>
<th width="339"><div align="left"><font color='#2e86c1'><?PHP echo  $MOTIVO;?></font></div></th>
</tr>
</table>
<?php
	 }
	 if(!$exists){
	 ?>
<table border="0">
<tr>
<th width="547"  bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDADES <?PHP echo $X;?></font></th>
</tr>
<tr><th><CENTER>No cuenta con Actividades</CENTER></th></tr>
</table>
	<?php
	}
oci_close($conn);
}//if
else {
?>
<!--<table  border="0" width="701">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">EXPEDIENTE</font></th>

    </tr>
    <tr>
      <th colspan="2" scope="row"><div align="left"><font color='#2e86c1'><?php echo $clav_autorizacion;?></font></div></th>
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
  </table> -->
<?php
include("conn.php");
$con = oci_parse($conn,"s ='".$clav_autorizacion."' ");
oci_execute($con);
$exists = false;
$X='0';
while ($row = oci_fetch_array($con)){
$exists = true;
 $OISA = $row['OISA'];
 $PUNTO_INGRESO = $row['PUNTO_INGRESO'];
 $PRODUCTO = $row['TIPO_PRODUCTO'];
 $DESCRIPCION = $row['DESCRIPCION_MERCANCIA'];
 $ORIGEN = $row['ORIGEN'];
 $PROCEDENCIA = $row['PROCEDENCIA'];
 $CANTIDAD = $row['CANTIDAD'];
 $UNIDAD_MEDIDA = $row['UNIDAD_MEDIDA'];
 $DICTAMEN = $row['DICTAMEN_TEA'];
 $RESOLUCION = $row['RESOLUCION_FINAL'];
 $TRANSPORTE = $row['TIPO_TRANSPORTE'];
 $IDENTIFICADOR = $row['IDENTIFICADOR_TRANSPORTE'];
 $NOMBRE_TEA = $row['NOMBRE_TEA'];
 $CLAVE_TEA = $row['CLAVE_TEA'];
 $OBSERVACIONES = $row['OBSERVACIONES'];
 $FECHA = $row['FECHA'];
 $X++
?>

<table border="0">
<tr>
 <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDADE <?PHP echo $X;?></font></th>
</tr>
<tr>
<th width="199"><div align="right">OISA:</div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $OISA;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Nombre del TEA:</div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $NOMBRE_TEA;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Fecha de verificacion: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $FECHA;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Producto: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $PRODUCTO;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Dscripcion: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $DESCRIPCION;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Origen: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $ORIGEN;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Procedencia: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $PROCEDENCIA;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Cantidad: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $CANTIDAD." ".$UNIDAD_MEDIDA;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Dictamen: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $DICTAMEN;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Resolucion: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $RESOLUCION;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Transporte: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $TRANSPORTE;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Clave de Autorizacion: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $CLAVE_TEA;?></font></div></th>
</tr>
<tr>
<th width="199"><div align="right">Observaciones: </div></th>
<th width="344"><div align="left"><font color='#2e86c1'><?PHP echo $OBSERVACIONES;?></font></div></th>
</tr>
</table>
<?PHP 
}//while
if(!$exists){
?>
<table border="0">
<tr>
<th width="544"  bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDADES <?PHP echo $X;?></font></th>
</tr>
<tr><th><CENTER>No cuenta con Actividades</CENTER></th></tr>
</table>
<?PHP
 }//exists
 oci_close($conn);
}//else
}//if inicial

if($siglas=='DGIAAP'){
?>
<!--<table  border="0" width="701">
    <tr>
      <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">EXPEDIENTE</font></th>

    </tr>
    <tr>
      <th colspan="2" scope="row"><div align="left"><font color='#2e86c1'><?php echo $curp;?></font></div></th>
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
  </table> -->
<?php
include("conn.php");
$con = oci_parse($conn,"SELECT * FROM BDI_TERCEROS.VW_INFORMES_ORG_CERT WHERE CURP_TEA ='".$curp."' ");
oci_execute($con);
$exists = false;
//$X='0';
while ($row = oci_fetch_array($con)){
$exists = true;
$ORGANISMO = $row['ORGANISMO_CERTIFICACION'];
$RFC = $row['RFC_ORG_CERTIFICACION'];
$FOLIO = $row['FOLIOS'];
$BENEFICIARIO = $row['BENEFICIARIO'];
$NOMBRE_TEA = $row['ELABORADO_TEA'];
$FECHA = $row['FECHA_VISITA_ESTABLECIMIENTO'];
$ESPECIE = $row['ESPECIE'];
$ORIGEN = $row['ORIGEN_RECURSO'];
$CAPACIDAD = $row['CAPACIDAD_PRODUCCION_ANUAL'];
//$X++

?>
<table>
<tr>
 <th colspan="2" bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDADE <?PHP echo $X;?></font></th>
</tr>
<tr>
<th width="195"><div align="right">Organismo:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $ORGANISMO;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">RFC:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $RFC;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">Folio:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $FOLIO;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">Beneficiario:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $BENEFICIARIO;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">Nombre del TEA:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $NOMBRE_TEA;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">Fecha:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $FECHA;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">Especie:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $ESPECIE;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">Origen:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $ORIGEN;?></font></div></th>
</tr>
<tr>
<th width="195"><div align="right">Capacidad:</div></th>
<th width="343"><div align="left"><font color='#2e86c1'><?PHP echo $CAPACIDAD;?></font></div></th>
</tr>
</table>
 
 <?PHP
 }//while
oci_close($conn);
if(!$exists){
?>
<table border="0">
<tr>
<th width="544"  bgcolor="#CCCCCC" scope="row"><font color="#FFFFFF">ACTIVIDADES <?PHP echo $X;?></font></th>
</tr>
<tr><th><CENTER>No cuenta con Actividades</CENTER></th></tr>
</table>
<?PHP
 }//exists

}//if inicial
?>
</body>
</html>
