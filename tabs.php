<html>
<head>
<style>
/*body {font-family: "Lato", sans-serif;}*/

/* Style the tab */
div.tab {
    overflow: hidden;
    border: 1px solid #ccc;
    background-color: #f1f1f1;
}

/* Style the buttons inside the tab */
div.tab button {
    background-color: inherit;
    float: left;
    border: 1;
    outline: none;
    cursor: pointer;
    padding: 14px 16px;
    transition: 0.3s;
    font-size: 17px;
}

/* Change background color of buttons on hover */
div.tab button:hover {
    background-color: #ddd;
}

/* Create an active/current tablink class */
div.tab button.active {
    background-color: #ccc;
}

/* Style the tab content */
.tabcontent {
    display: none; 
    padding: 6px 12px;
    border: 1px solid #ccc;
    border-top: none;
	/*overflow-y:hidden;
	overflow-x:hidden;*/
}
.actividad{
overflow-y:hidden;
overflow-x:hidden;
}
</style>
<script>
function openCity(evt, cityName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(cityName).style.display = "block";
    evt.currentTarget.className += " active";
}
</script>
</head>
<body>
<?php	
include("conn02.php");
$idp = $_GET["id"];
$id_par = $_GET["id_par"];

?>
<div class="tab">
  <button class="tablinks" onClick="openCity(event, 'Detalle')">Detalle</button>
  <button class="tablinks" onClick="openCity(event, 'Expediente')">Expediente</button>
  <button  target="actividades" class="tablinks" onClick="openCity(event, 'Actividades')">Actividades</button>
</div>

<div id="Detalle" class="tabcontent">
<?php if($idp == ""){echo "<table borde='1'><tr><th>Da click en un ID para visualizar la informaci&oacute;n </th><th><img src='img/sengif2.gif' width='110' height='75'></th></tr></table>";} else{

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
  <!--<tr>
    <th height="21" colspan="2" bgcolor="#CCCCCC" scope="row"><span class="Estilo1">Detalle</span> </th>
	</tr> -->
  <tr>
    <th width="41%" height="23" align="right"  scope="row">Nombre(s):  </th>
	<td width="59%"><font color='#2e86c1'><?php echo $nom." ".$ap." ".$am;?></font></td>
  </tr>
  <tr>
    <th height="21" scope="row">&nbsp;</th>
    <td width="59%"><hr width="100%"></td>
  </tr>
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
   }
  //sqlsrv_close($condir)
  //sqlsrv_close($con)
  //sqlsrv_close($concor)
  //sqlsrv_close($contel)
  //sqlsrv_close($conn)
 ?>
</div>


<div id="Expediente" class="tabcontent">
<?php if($curp ==""){echo "<table borde='0'><tr><th>Da click en un ID para visualizar la informaci&oacute;n </th><th><img src='img/sengif2.gif' width='110' height='75'></th></tr></table>";}else{
echo "ID TRAMITE: <font color='#2e86c1'>".$id_tra."</font>";
 $con = oci_parse($conn,"SELECT * FROM VWN_DOCUMENTOS_COADYUVANTE WHERE ID_TRAMITE ='".$id_tra."'");
 oci_execute($con);
 ?>
 <table width="550" border="0">
 <?php
  $exists = false;
 while ($row = oci_fetch_array($con)){
  $exists = true;
	 $tipo_doc = $row['TIPO_DOCUMENTO'];
	 $ddocname= $row['DDOCNAME'];
	 ?>
<tr>
<th width="10" scope="row"><a href="javascript:window.open('pdf2.php?id_doc=<?php echo $tipo_doc;?>&dd=<?php echo $ddocname;?>','PDF','width=1000,height=350,location=NO');"><img src="img/pdf1.png" width="54" height="52" /></a></th>
<th width="543"><div align="left" class="Estilo1"><font color='#2e86c1'><?php echo $tipo_doc?></font></div></th>	                                       
    </tr>
	<tr>
	<th scope="row">&nbsp;</th>
	<th><hr width="100%"></th>
	</tr>
	 <?php
	 }//fin whilw
    if(!$exists){
    echo "<br>";
	echo "<CENTER>No cuenta con documentos adjuntos</CENTER>";
	}
	?>
	 </table>
	<?php
 }//fin del else 
 ?>
</div>

<div id="Actividades" class="tabcontent">
<?php if($idp == ""){echo "<table borde='1'><tr><th>Da click en un ID para visualizar la informaci&oacute;n </th><th><img src='img/sengif2.gif' width='110' height='75'></th></tr></table>";} else{?>
<iframe src="actividades.php?id=<?php echo $idp2;?>&nom=<?php echo $nom;?>&ap=<?php echo $ap;?>&am=<?php echo $am;?>&curp=<?php echo $curp;?>&un=<?php echo $unidad;?>&cm=<?php echo $campo;?>&ma=<?php echo $materia;?>&org=<?php echo $organo;?>&id_tra=<?php echo $id_tra;?>&siglas=<?php echo $siglas;?>&id_materia=<?php echo $id_materia;?>&clav_autorizacion=<?php echo $idp2;?>" name="actividades" height="680px" width="100%" frameborder="0">
<?php
} 
?>
</div>
</body>
</html> 