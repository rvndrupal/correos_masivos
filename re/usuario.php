<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>

</head>

<body>

<!--//<center> -->
<div id="centro">
<?php
//include("conn.php");
include("conn02.php");
$idp = $_GET["id"];
$id_par = $_GET["id_par"];


$condir = oci_parse($conn,"SELECT N.ID_PARTICIPANTE, N.CALLE, N.NUMERO_EXTERIOR, O.LOCALIDAD, P.MUNICIPIO, Q.ENTIDAD, R.CODIGO_POSTAL 
FROM BDI_GENERALES.VW_CONTACTOS_DIRECCION N
          INNER JOIN BDI_CATALOGOS.VWC_LOCALIDADES O
             ON N.ID_LOCALIDAD = O.ID_LOCALIDAD
          INNER JOIN BDI_CATALOGOS.VWC_MUNICIPIOS P
             ON P.ID_MUNICIPIO = O.ID_MUNICIPIO
          INNER JOIN BDI_CATALOGOS.VWC_ENTIDADES Q
             ON Q.ID_ENTIDAD = P.ID_ENTIDAD
          INNER JOIN BDI_CATALOGOS.VWC_CODIGOS_POSTALES_SEPOMEX R
             ON R.ID_CODIGO_POSTAL = N.ID_CODIGO_POSTAL WHERE N.ID_PARTICIPANTE='".$id_par."'");
oci_execute($condir);
while ($rowdir = oci_fetch_array($condir)){
 $entidad = $rowdir['ENTIDAD'];
 $mun = $rowdir['MUNICIPIO'];
 $loca = $rowdir['LOCALIDAD'];
 $calle = $rowdir['CALLE'];
 $cp = $rowdir['CODIGO_POSTAL'];
 $ex =  $rowdir['NUMERO_EXTERIOR'];

}
//echo $idp;
//$con = oci_parse($conn,"SELECT * FROM VWN_DETALLE_COADYUVANTES_PF WHERE upper(NOMBRE||' '||APELLIDO_PATERNO||' '||APELLIDO_MATERNO||' '||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||CLAVE_CEDULA_AUTORIZACION||' '||CURP||' '||RFCPARTICIPANTE||' '||MATERIA)like upper('%".$nombre."%')");
 //oci_execute($con);
//$con = oci_parse($conn,"SELECT * FROM VWN_DIRECTORIO_COADYUVANTES_PF WHERE CLAVE_CEDULA_AUTORIZACION='".$idp."'");
$con = oci_parse($conn,"SELECT * FROM VWN_DETALLE_COADYUVANTES_PF WHERE CLAVE_CEDULA_AUTORIZACION='".$idp."'");
oci_execute($con);
 
 while ($row = oci_fetch_array($con)){
 
 $unidad = $row['UNIDAD_ORGANIZACIONAL'];
 $siglas = $row['SIGLAS'];
 $tipo = $row['TIPO_ORGANO_COADYUVANCIA'];
 $acronimo = $row['ACRONIMO'];
 $campo = $row['CAMPO_ESTUDIO'];
 $materia = $row['MATERIA'];
 $id_materia = $row['ID_MATERIA'];
 $nom = $row['NOMBRE'];
 $ap = $row['APELLIDO_PATERNO'];
 $am = $row['APELLIDO_MATERNO'];
 $inv = $row['INICIO_VIGENCIA'];
 $fnv = $row['FIN_VIGENCIA'];
 $estatus = $row['ESTATUS_GENERICO'];
 $id = $row['ID_ORGANO_COADYUVANCIA'];
 $organo = $row['TIPO_ORGANO_COADYUVANCIA'];
 $curp = $row['CURP'];
 $rfc = $row['RFCPARTICIPANTE'];
 $correo = $row['CORREO_ELECTRONICO'];
 $tel = $row['TELEFONO'];  
 $idp = $row['ID_PARTICIPANTE'];
 //$int = $row['NUMERO_INTERIOR'];
 $idp2 = $row['CLAVE_CEDULA_AUTORIZACION'];
 $id_tra = $row['ID_TRAMITE'];
 $id_par = $row ['ID_PARTICIPANTE'];
 ?>
 
  
   <table width="99%" height="579" border="0" align="center">
  <tr>
    <th height="21" colspan="2" bgcolor="#CCCCCC" scope="row"><span class="Estilo1">Detalle del Servidores P&uacute;blicos</span> </th>
	</tr>
  <tr>
    <th width="41%" height="23" align="right"  scope="row">Nombre(s):  </th>
	<td width="59%"><font color='#2e86c1'><?php echo $nom." ".$ap." ".$am;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td width="59%"><hr width="100%"></td>
  </tr>
  <!--<tr>
    <th scope="row" align="right">Primer Apellido:</th>
    <td ><font color='#2e86c1'><?phpecho $ap;?></font></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th scope="row" align="right">Segundo Apellido:</th>
    <td><font color='#2e86c1'><?phpecho $am;?></font></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th scope="row" align="right">Organizaci&oacute;n:</th>
    <td><font color='#2e86c1'><?phpecho "$unidad ($siglas)";?></font></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th scope="row" align="right">Campo de Estudio:</th>
    <td><font color='#2e86c1'><?phpecho $campo;?></font></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th scope="row" align="right">Materia:</th>
    <td><font color='#2e86c1'><?phpecho $materia;?></font></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr> -->
  <tr>
    <th height="21" align="right" scope="row">Vigencia:</th>
    <td><font color='#2e86c1'><?php echo "$inv  a $fnv";?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr 
  ><tr>
    <th height="21" align="right" scope="row">CURP:<br /></th>
    <td><font color='#2e86c1'><?php echo $curp;?></font></td>
  </tr>
   <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th height="21" align="right" scope="row">Clave de Autorizacion:<br /></th>
    <td><font color='#2e86c1'><?php echo $idp2;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th height="21" align="right" scope="row">Entidad:</th>
    <td><font color='#2e86c1'><?php echo $entidad;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row" >&nbsp;</th>
    <td><hr width="100%"></td>
	<tr>
    <th height="21" align="right" scope="row">Municipio:</th>
    <td><font color='#2e86c1'><?php echo $mun;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th height="21" align="right" scope="row">Localidad:</th>
    <td><font color='#2e86c1'><?php echo $loca;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th height="21" align="right" scope="row">Calle:</th>
    <td><font color='#2e86c1'><?php echo $calle;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th height="21" align="right" scope="row">C.P.:</th>
    <td><font color='#2e86c1'><?php echo $cp;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
  <tr>
    <th height="21" align="right" scope="row">No.Externo:</th>
    <td><font color='#2e86c1'><?php echo $ex;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
   <tr>
    <th height="21" align="right" scope="row">Tel&eacute;fono(s):</th>
    <td><font color='#2e86c1'><?php 
	$contel = oci_parse($conn,"SELECT * FROM VW_CONTACTOS_TELEFONO WHERE ID_PARTICIPANTE='".$id_par."'");
    oci_execute($contel);
	 while ($rowtel = oci_fetch_array($contel)){
	  $id_tel = $rowtel ['TELEFONO'];
	  echo $id_tel." ";
	 }
	?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
   <tr>
    <th height="21" align="right" scope="row">Correo Eletronico(s):</th>
    <td><font color='#2e86c1'><?php
	$concor = oci_parse($conn,"SELECT * FROM  VW_CONTACTOS_CORREO WHERE ID_PARTICIPANTE='".$id_par."'");
    oci_execute($concor);
	 while ($rowcor = oci_fetch_array($concor)){
	  $id_correo = $rowcor ['CORREO_ELECTRONICO'];
	  echo $id_correo." ";
	 }
	?></font></td>
  </tr>
  <tr>
    <th scope="row">&nbsp;</th>
    <td><hr width="100%"></td>
  </tr>
</table>
   <?php
 }
 ?>
</div>
<div id="ex">
<a href="expediente.php?id=<?php echo $idp2;?>&nom=<?php echo $nom;?>&ap=<?php echo $ap;?>&am=<?php echo $am;?>&curp=<?php echo $curp;?>&un=<?php echo $unidad;?>&cm=<?php echo $campo;?>&ma=<?php echo $materia;?>&org=<?php echo $organo;?>&id_tra=<?php echo $id_tra;?>"><img src="img/exp1.png" width="100" height="100" />EXPEDIENTE</a></div>

<div id="act">
<a href="actividades.php?id=<?php echo $idp2;?>&nom=<?php echo $nom;?>&ap=<?php echo $ap;?>&am=<?php echo $am;?>&curp=<?php echo $curp;?>&un=<?php echo $unidad;?>&cm=<?php echo $campo;?>&ma=<?php echo $materia;?>&org=<?php echo $organo;?>&id_tra=<?php echo $id_tra;?>&siglas=<?php echo $siglas;?>&id_materia=<?php echo $id_materia;?>&clav_autorizacion=<?php echo $idp2;?>"><img src="img/exp1.png" width="100" height="100" />ACTIVIDADES</a></div>
<!--</center> -->
<?php oci_close($conn);?>



</body>
</html>
