<html>
<head>
<link rel="stylesheet" href="css.css" type="text/css" />
<link rel="stylesheet" href="OK.css" type="text/css" />
<style>
td {
text-transform: uppercase;
}
</style>
<meta charset="utf-8">
<title>Documento sin t&iacute;tulo</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
</head>
<body>

<?php

include("conn.php");


if (isset($_GET["nombre"])) {
 $nombre=$_GET['nombre'];
 $radio = $_REQUEST["radio"]; 
 $sigla = $_REQUEST["sigla"];

echo $nombre;
echo $radio;
echo $sigla;

switch($radio){
case 0;
$con = oci_parse($conn,"SELECT * FROM VWN_DIRECTORIO_COADYUVANTES_PM WHERE SIGLAS ='".$sigla."' AND upper(RAZON_SOCIAL||''||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||ENTIDAD||' '||CLAVE_CEDULA_AUTORIZACION||' '||CORREO_ELECTRONICO||' '||RFCPARTICIPANTE)like upper('%".$nombre."%')");
break;
case 1;
$con = oci_parse($conn,"SELECT * FROM VWN_DIRECTORIO_COADYUVANTES_PM WHERE SIGLAS ='".$sigla."' AND upper(RAZON_SOCIAL)like upper('%".$nombre."%')");
break;
case 2;
$con = oci_parse($conn,"SELECT * FROM VWN_DIRECTORIO_COADYUVANTES_PM WHERE SIGLAS ='".$sigla."' AND upper(CLAVE_CEDULA_AUTORIZACION)like upper('%".$nombre."%')");
break;
case 3;
$con = oci_parse($conn,"SELECT * FROM VWN_DIRECTORIO_COADYUVANTES_PM WHERE SIGLAS ='".$sigla."' AND upper(CORREO_ELECTRONICO)like upper('%".$nombre."%')");
break;
case 4;
$con = oci_parse($conn,"SELECT * FROM VWN_DIRECTORIO_COADYUVANTES_PM WHERE SIGLAS ='".$sigla."' AND upper(RFCPARTICIPANTE)like upper('%".$nombre."%')");
break;
}
                                          
   oci_execute($con);
   //$contar = oci_fetch($con);
   
   
  
   ?>
   <div id="padre" >
   
   <div id="izq">
     <?php
	
	 $exists = false;
	
echo"<table width='160' border='0'>";

echo"<tr>";
echo"<th  scope='row' bgcolor='#2E2E2E'><font color=#ffffff>FILTRO</font></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'>&raquo;$nombre &raquo;$sigla</th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#2E2E2E'><font color=#ffffff>DIRECCION GENERAL</font></th>";
echo"</tr>";

switch($sigla){
case 'DGSA';
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSA' style='color:#424242' target='mainFrame'>DGSA</a></th>";
echo"</tr>";
////////////// sub menu
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSA&acronimo=LAP&op=1' style='color:#424242' target='mainFrame'>&#8594;LAP</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSA&acronimo=OC&op=2' style='color:#424242' target='mainFrame'>&#8594;OC</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSA&acronimo=TEA&op=3' style='color:#424242' target='mainFrame'>&#8594;TEA</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSA&acronimo=TEF&op=4' style='color:#424242' target='mainFrame'>&#8594;TEF</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSA&acronimo=UV&op=5' style='color:#424242' target='mainFrame'>&#8594;UV</a></th>";
echo"</tr>";
/////////////////////
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSV' style='color:#424242' target='mainFrame'>DGSV</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIF' style='color:#424242' target='mainFrame'>DGIF</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIAAP' style='color:#424242' target='mainFrame'>DGIAAP</a></th>";
echo"</tr>";
break;
case 'DGSV';
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSA' style='color:#424242' target='mainFrame'>DGSA</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSV' style='color:#424242' target='mainFrame'>DGSV</a></th>";
echo"</tr>";

echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSV&acronimo=LAP&op=6' style='color:#424242' target='mainFrame'>&#8594;LAP</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSV&acronimo=OC&op=7' style='color:#424242' target='mainFrame'>&#8594;OC</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSV&acronimo=TEA&op=8' style='color:#424242' target='mainFrame'>&#8594;TEA</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSV&acronimo=TEF&op=9' style='color:#424242' target='mainFrame'>&#8594;TEF</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGSV&acronimo=UV&op=10' style='color:#424242' target='mainFrame'>&#8594;UV</a></th>";
echo"</tr>";

echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIF' style='color:#424242' target='mainFrame'>DGIF</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIAAP'' style='color:#424242' target='mainFrame'>DGIAAP</a></th>";
echo"</tr>";
break;
case 'DGIF';
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSA' style='color:#424242' target='mainFrame'>DGSA</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSV' style='color:#424242' target='mainFrame'>DGSV</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIF' style='color:#424242' target='mainFrame'>DGIF</a></th>";
echo"</tr>";

echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIF&acronimo=LAP&op=11' style='color:#424242' target='mainFrame'>&#8594;LAP</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIF&acronimo=OC&op=12' style='color:#424242' target='mainFrame'>&#8594;OC</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIF&acronimo=TEA&op=13' style='color:#424242' target='mainFrame'>&#8594;TEA</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIF&acronimo=TEF&op=14' style='color:#424242' target='mainFrame'>&#8594;TEF</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIF&acronimo=UV&op=15' style='color:#424242' target='mainFrame'>&#8594;UV</a></th>";
echo"</tr>";

echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIAAP'' style='color:#424242' target='mainFrame'>DGIAAP</a></th>";
echo"</tr>";
break;
case 'DGIAAP';
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSA' style='color:#424242' target='mainFrame'>DGSA</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGSV' style='color:#424242' target='mainFrame'>DGSV</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIF' style='color:#424242' target='mainFrame'>DGIF</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#A4A4A4'><a href='res01.php?nombre=$nombre&radio=$radio&sigla=DGIAAP'' style='color:#424242' target='mainFrame'>DGIAAP</a></th>";
echo"</tr>";

echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIAAP&acronimo=LAP&op=16' style='color:#424242' target='mainFrame'>&#8594;LAP</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIAAP&acronimo=OC&op=17' style='color:#424242' target='mainFrame'>&#8594;OC</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIAAP&acronimo=TEA&op=18' style='color:#424242' target='mainFrame'>&#8594;TEA</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIAAP&acronimo=TEF&op=19' style='color:#424242' target='mainFrame'>&#8594;TEF</a></th>";
echo"</tr>";
echo"<tr>";
echo"<th scope='row' bgcolor='#D8D8D8'><a href='sigla1.php?nombre=$nombre&radio=$radio&sigla=DGIAAP&acronimo=UV&op=20' style='color:#424242' target='mainFrame'>&#8594;UV</a></th>";
echo"</tr>";
break;
}
echo"</table>";

?>

   </div>
   <div id="der" name="der" style="height: 87%;width: 655px; overflow-y: auto;">  
   <?php
    $x= 0;
   echo"<table border='0'>";
  while ($row = oci_fetch_array($con)){
  $x++;
  $exists = true;
 $unidad = $row['UNIDAD_ORGANIZACIONAL'];
 $siglas = $row['SIGLAS'];
 $tipo = $row['TIPO_ORGANO_COADYUVANCIA'];
 $acronimo = $row['ACRONIMO'];
 $campo = $row['CAMPO_ESTUDIO'];
 $materia = $row['MATERIA'];
 $nom = $row['NOMBRE'];
 $ap = $row['APELLIDO_PATERNO'];
 $am = $row['APELLIDO_MATERNO'];
 $entidad = $row['ENTIDAD'];
 $inv = $row['INICIO_VIGENCIA'];
 $fnv = $row['FIN_VIGENCIA'];
 $estatus = $row['ESTATUS_GENERICO'];
 $curp = $row['CURP'];
 $correo = $row['CORREO_ELECTRONICO'];
 $tel = $row['TELEFONO'];
    
 echo "<tr>";
    echo"<th width='60' rowspan='11' scope='col'><img width='40' src='img/log.png'>".$x."</th>";
    //echo"<th width='1000' scope='col'>&nbsp;</th>";
    echo"</tr>";
	
	 echo"<tr>";
    echo"<td>&nbsp;</td>";
    echo"</tr>";
	
  echo"<tr>";
    echo"<td>".$unidad."  (".$siglas.")</td>";
    echo"</tr>";
  echo"<tr>";
    echo"<td>".$tipo." (".$acronimo.")</td>";
    echo"</tr>";
  echo"<tr>";
    echo"<td>CAMPO DE ESTUDIO: <font color='#2e86c1'>".$campo."</font></td>";
    echo"</tr>";
  echo"<tr>";
    echo"<td>MATERIA: <font color='#2e86c1'>".$materia."</font></td>";
    echo"</tr>";
  echo"<tr>";
    echo"<td>ESTATUS: <font color='#2e86c1'>".$estatus."</font> VIGENCIA: <font color='#2e86c1'>".$inv."</font> A <font color='#2e86c1'>".$fnv."</font></td>";
    echo"</tr>";
  echo"<tr>";
    echo"<td>ESTADO: <font color='#2e86c1'>".$entidad."</font></td>";
    echo"</tr>";
  echo"<tr>";
    echo"<td>NOMBRE: <font color='#2e86c1'>".$nom." ".$ap." ".$am."</font> CURP: <font color='#2e86c1'>".$curp."</font></td>";
    echo"</tr>";
   echo"<tr>";
    echo"<td>TELEFONO: <font color='#2e86c1'>".$tel."</font></td>";
    echo"</tr>";
  echo"<tr>";
    echo"<td>CORREO ELECTRONICO: <font color='#2e86c1'>".$correo."</font></td>";
    echo"</tr>"; 
  echo"<tr>";
    echo"<th colspan='2' scope='row'><center><hr width='75%'></center></th>";
    echo"</tr>";
   }//wilw 
   echo"</table>"; 
  //   }//else
   if(!$exists){
   echo "<CENTER>No se han encontrado resultados del filtro ''$nombre'' + ''".$sigla."''</CENTER>";
	}
  }//IF PRINSIPAL
   ?>
   </div>
   
   </div>
  </body>
</html>