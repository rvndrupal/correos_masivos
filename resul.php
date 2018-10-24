<html>
<head>
<link rel="stylesheet" href="css.css" type="text/css" />
<link rel="stylesheet" href="OK.css" type="text/css" />
<meta charset="utf-8">
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="menu-7.css" type="text/css" />
<style>
td {
text-transform: uppercase;
}

#menu ul li:focus ul, #menu ul li:active ul, #menu ul li a:active ul {display: block;
position: relative;width: 160px;border: solid 1px #FFF;border-top: none;background-color: #FFFFFF;}
#menu ul li:focus span, #menu ul li:active span, #menu ul li a:active {background-color: #CCCCCC;border-bottom: solid 1px #000;color: #000;border-left: solid 8px #000000;border-right: solid 8px #000000;
}

/*#izq{
background-color:#0099FF;
}
#der{
background-color:#FF0000;
}
#folder{
background-color:#00FF66;
}*/
.preloader {
  width: 70px;
  height: 70px;
  border: 10px solid #eee;
  border-top: 10px solid #666;
  border-radius: 50%;
  animation-name: girar;
  animation-duration: 1s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}
@keyframes girar {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}
.content {
	width:98%;
	margin:0 auto;
	height:97%;
	padding:10px;
	background-color:#FFFFFF; opacity:0.8;
	 z-index: 3;
	position:absolute;
	left: 14px;
	top: 3px;
}
.folder{
    /*background-color:#00CCFF;*/
	position:absolute;
	left: 1260px;
	top: 5px;
	width: 641px;
	height: 658px;
}
.iframe{
border:0;
height:98%;
width:98%;
}
</style>
<script type="text/javascript" src="jquery.js"></script>
<script type="text/javascript">
$(document).ready(function() {
    setTimeout(function() {
        $(".preloader,.content").fadeOut(1000);
    },1000);
});
</script>
</head>
<body>

<?php
//include("buscador.php");
include("conn02.php");
if (isset($_POST["nombre"])) {
$nombre = $_REQUEST["nombre"];
$radio = $_REQUEST["radio"];
$organo = $_REQUEST["organo"];
$organizacion = $_REQUEST["organizacion"];
$campo = $_REQUEST["campo"];
$materia = $_REQUEST["materia"];
$entidad = $_REQUEST["entidad"];
$fi = $_REQUEST["date"];
$ff = $_REQUEST["date1"];

echo $nombre;
echo $radio;
echo $organo;
echo $organizacion;
echo $campo;
echo $materia;
echo $entidad;
echo $fi."<br>";
echo $ff;
?>
 <div id="der" name="der" style="height: 660px; width: 867px; overflow-y: auto; position:absolute; left:508px; top:22px;">
<?PHP
if($organizacion=='' & $organo=='' & $campo=='' & $materia=='' & $entidad=='' & $fi=='' & $ff==''){
$con = oci_parse($conn,"SELECT * FROM VWN_DETALLE_COADYUVANTES_PM WHERE upper(RAZON_SOCIAL||' '||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||CLAVE_CEDULA_AUTORIZACION||' '||RFCPARTICIPANTE||' '||MATERIA)like upper('%".$nombre."%')");
 oci_execute($con);

$con0 = oci_parse($conn,"SELECT COUNT(*) FROM VWN_DETALLE_COADYUVANTES_PM WHERE upper(RAZON_SOCIAL||' '||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||CLAVE_CEDULA_AUTORIZACION||' '||FOLIO_SOLICITUD||' '||RFCPARTICIPANTE||' '||MATERIA)like upper('%".$nombre."%')");
     oci_execute($con0);
	 while ($row0 = oci_fetch_array($con0)){
	 $resultado0 = $row0['0'];
	 }
	 
$con1 = oci_parse($conn,"SELECT COUNT(*) FROM VWN_DETALLE_COADYUVANTES_PM WHERE SIGLAS='DGSA'AND upper(RAZON_SOCIAL||' '||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||CLAVE_CEDULA_AUTORIZACION||' '||FOLIO_SOLICITUD||' '||RFCPARTICIPANTE||' '||MATERIA)like upper('%".$nombre."%')");
     oci_execute($con1);
	 while ($row1 = oci_fetch_array($con1)){
	 $resultado1 = $row1['0'];
	 }

$con2 = oci_parse($conn,"SELECT COUNT(*) FROM VWN_DETALLE_COADYUVANTES_PM WHERE SIGLAS='DGSV' AND upper(RAZON_SOCIAL||' '||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||CLAVE_CEDULA_AUTORIZACION||' '||FOLIO_SOLICITUD||' '||RFCPARTICIPANTE||' '||MATERIA)like upper('%".$nombre."%')");
     oci_execute($con2);
	 while ($row2 = oci_fetch_array($con2)){
	 $resultado2 = $row2['0'];
	 }

$con3 = oci_parse($conn,"SELECT COUNT(*) FROM VWN_DETALLE_COADYUVANTES_PM WHERE SIGLAS='DGIF' AND upper(RAZON_SOCIAL||' '||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||CLAVE_CEDULA_AUTORIZACION||' '||FOLIO_SOLICITUD||' '||RFCPARTICIPANTE||' '||MATERIA)like upper('%".$nombre."%')");
     oci_execute($con3);
	 while ($row3 = oci_fetch_array($con3)){
	 $resultado3 = $row3['0'];
	 }

$con4 = oci_parse($conn,"SELECT COUNT(*) FROM VWN_DETALLE_COADYUVANTES_PM WHERE SIGLAS='DGIF' AND upper(RAZON_SOCIAL||' '||UNIDAD_ORGANIZACIONAL||' '||SIGLAS||' '||TIPO_ORGANO_COADYUVANCIA||' '||ACRONIMO||' '||CAMPO_ESTUDIO||' '||CLAVE_CEDULA_AUTORIZACION||' '||FOLIO_SOLICITUD||' '||RFCPARTICIPANTE||' '||MATERIA)like upper('%".$nombre."%')");
     oci_execute($con4);
	 while ($row4 = oci_fetch_array($con4)){
	 $resultado4 = $row4['0'];
	 }
	 
 $X=0;
 while ($row = oci_fetch_array($con)){
 $id_participante = $row['ID_PARTICIPANTE'];
 $rfc = $row['RFCPARTICIPANTE'];
 $razon = $row['RAZON_SOCIAL'];
 $organizacion = $row['RAZON_SOCIAL'];
 $unidad = $row['UNIDAD_ORGANIZACIONAL'];
 $sigla = $row['SIGLAS'];
 $organo = $row['TIPO_ORGANO_COADYUVANCIA'];
 $acronimo = $row['ACRONIMO'];
 $campo = $row['CAMPO_ESTUDIO'];
 $materia = $row['MATERIA'];
 $inicio_vi= $row["INICIO_VIGENCIA"];
 $fin_vi = $row['FIN_VIGENCIA'];
 $X++;
?>
<table width="832" height="151" border="0">
  <tr>
    <th width="82" rowspan="8" scope="row"><?PHP echo "<img width='40' src='img/log.png' aling >".$X."</a>";?></th>
    
  </tr>
  <tr>
    <td>RAZON SOCIAL: <font color='#2e86c1'><?PHP echo $razon;?></font></td>
  </tr>
  <tr>
    <td>ORGANIZACION: <font color='#2e86c1'><?PHP echo $unidad."(".$sigla.")";?></font></td>
  </tr>
  <tr>
    <td>ORGANO COADYUVANTE: <font color='#2e86c1'><?PHP echo $organo."(".$acronimo.")";?></font></td>
  </tr>
  <tr>
  <td>CAMPO DE ESTUDIO: <font color='#2e86c1'><?PHP echo $campo;?></font></td>
  </tr>
  <tr>
    <td>MATERIA: <font color='#2e86c1'><?PHP echo $materia;?></font></td>
  </tr>
  <tr>
    <td>VIGENCIA: <font color='#2e86c1'><?PHP echo $inicio_vi." A ".$fin_vi;?></font></td>
  </tr>
  <tr>
  <td>&nbsp;</td>
  </tr>
</table>
<?PHP
 
   }
 }
  oci_close($conn);
?>
</div>

<div id="izq" style="height: 614px; width: 376px; overflow-y: auto; position:absolute; left: 112px; top: 2px;">
 <div id="menu">
<ul>
<li class="nivel1 primera" tabindex="1">(<?PHP echo $resultado0; ?>) resultados encontrados para "<?php echo $nombre;?>"</li>
</ul>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">Ambito</span>
	<ul>
	<?php if($resultado1=='0'){} else {?>
		<li class="primera"><a href='res2.php?nombre=<?PHP echo $nombre;?>&organizacion=DGSA'><br>DGSA (<?php echo $resultado1;?>)</a></li>
		<?php }?>
	<?php if($resultado2=='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organizacion=DGSV'><br>DGSV (<?php echo $resultado2;?>)</a></li>
		<?php }?>
	<?php if($resultado3=='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organizacion=DGIF'><br>DGIF (<?php echo $resultado3;?>)</a></li>
		<?php }?>
	<?php if($resultado4=='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organizacion=DGIAAP'><br>DGIAAP (<?php echo $resultado4;?>)</a></li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="2"><span class="nivel1">Organo Coadyuvante</span>
	<ul>
	<?php if($resorgan0 =='0'){} else {?>
		<li  class="primera"><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=LB'>LABORATORIO DE PRUEBAS (<?php echo $resorgan0;?>)</a></li>
		<?php }?>
	<?php if($resorgan1 =='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=MVRA'>MEDICO VETERINARIO RESPONSABLE AUTORIZADO (<?php echo $resorgan1;?>)</a></li>
		<?php }?>
	<?php if($resorgan2 =='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=TEA'>TERCERO ESPECIALISTA AUTORIZADO (<?php echo $resorgan2;?>)</a></li>
		<?php }?>
	<?php if($resorgan3 =='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=TEF'>TERCERO ESPECIALISTA FITOSANITARIO (<?php echo $resorgan3;?>)</a></li>
		<?php }?>
	<?php if($resorgan4 =='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=PA'>PROFESIONAL AUTORIZADO (<?php echo $resorgan4;?>)</a></li>
		<?php }?>
	<?php if($resorgan5 =='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=OC'>ORGANISMO DE CERTIFICACION (<?php echo $resorgan5;?>)</a></li>
		<?php }?>
	<?php if($resorgan6 =='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=UV'>UNIDAD DE VERIFICACION (<?php echo $resorgan6;?>)</a></li>
		<?php }?>
	<?php if($resorgan7 =='0'){} else {?>
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&organo=PFA'>PROFESIONAL FITOSANITARIO AUTORIZADO (<?php echo $resorgan7;?>)</a></li>
		<?php }?>
	</ul>
</li>
  <li class="nivel1" tabindex="3"><span class="nivel1">Campo de Estudio</span>
	<ul>
		<?php if($resulcam0 =='0'){}else {?> 
		<li class="primera"><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=5'>CAMPA&Ntilde;AS FITOSANITARIA (<?php echo $resulcam0;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam1 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=6'>ESTABLECIMIENTOS (<?php echo $resulcam1;?>)</a></li>
		<?php }?>
		<?php if($resulcam2 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=7'>DIAGN&Oacute;STICO DE PRODUCTOS VEGETALES (<?php echo $resulcam2;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam3 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=8'>VERIFICACI&Oacute;N EN ORIGEN DE PRODUCTOS VEGETALES DE IMPORTACI&Oacute;N (<?php echo $resulcam3;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam4 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=10'>UNIDADES DE PRODUCCI&Oacute;N PECUARIA (<?php echo $resulcam4;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam5 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=12'>SISTEMAS DE REDUCCI&Oacute;N DE RIESGOS DE CONTAMINACI&Oacute;N(SRRC) (<?php echo $resulcam5;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam6 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=14'>CERTIFICACI&Oacute;N DE LA MOVILIZACI&Oacute;N (<?php echo $resulcam6;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam7 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=15'>VERIFICACI&Oacute;N (<?php echo $resulcam7;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam8 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=20'>BUENAS PR&Aacute;CTICAS (<?php echo $resulcam8;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam9 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=21'>VERIFICACI&Oacute;N DE PLAGUICIDAS (<?php echo $resulcam9;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam10 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=22'>CONTROL DE CALIDAD INTERNO (<?php echo $resulcam10;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam11 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=23'>BUENAS PR&Aacute;CTICAS PECUARIAS (<?php echo $resulcam11;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam12 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=24'>ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS (<?php echo $resulcam12;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam13 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=27'>BUENAS PR&Aacute;CTICAS ACUICOLAS (<?php echo $resulcam13;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam14 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=28'>BUENAS PR&Aacute;CTICAS PESQUERAS (<?php echo $resulcam14;?>)</a></li>
		<?PHP }?>
		<?php if($resulcam15 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=29'>EMPRESAS DE PLAGUICIDAS DE USO AGR&Iacute;COLA (<?php echo $resulcam15;?>)</a></li>
		<?PHP }?>	
		<?php if($resulcam16 =='0'){} else{?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&campo=26'>VERIFICACI&Oacute;N DE MERCANC&Iacute;AS PARA SU EXPORTACI&Oacute;N(<?php echo $resulcam16;?>)</a></li>
		<?PHP }?>		
	</ul>
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">Materia</span>
	<ul>
		<?php if($resmateria0 =='0'){}else {?> 
		<li class="primera"><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=1'>UNIDADES DE PRODUCCI&Oacute;N DE RUMIANTES (<?php echo $resmateria0;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria1 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=2'>UNIDADES DE PRODUCCI&Oacute;N DE PORCINOS (<?php echo $resmateria1;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria2 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=3'>UNIDADES DE PRODUCCI&Oacute;N DE AVES (<?php echo $resmateria2;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria3 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=4'>UNIDADES DE PRODUCCI&Oacute;N DE EQUINOS (<?php echo $resmateria3;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria4 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=5'>UNIDADES DE PRODUCCI&Oacute;N DE ABEJAS (<?php echo $resmateria4;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria5 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=6'>INDUSTRIALES (<?php echo $resmateria5;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria6 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=7'>COMERCIALES (<?php echo $resmateria6;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria7 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=8'>MOVILIZACI&Oacute;N (<?php echo $resmateria7;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria8 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=9'>VERIFICACI&Oacute;N DE C&Aacute;RNICOS DE IMPORTACI&Oacute;N (<?php echo $resmateria8;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria9 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=13'>CL&Igrave;NICAS Y HOSPITALES VETERINARIOS QUE COMERCIALIZAN PRODUCTOS PARA USO O CONSUMO ANIMAL (<?php echo $resmateria9;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria10 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=23'>UNIDADES DE PRODUCCI&Oacute;N DE MATERIAL PROPAGATIVO DE C&Iacute;TRICOS (<?php echo $resmateria10;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria11 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=51'>VERIFICACI&Oacute;N DE LA MOVILIZACI&Oacute;N NACIONAL (<?php echo $resmateria11;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria12 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=53'>IMPORTACI&Oacute;N DE MERCANC&Iacute;AS REGULADAS CON FINES COMERCIALES E IMPORTACI&Oacute;N DE MERCANC&Iacute;AS REGULADAS SIN FINES COMERCIALES (<?php echo $resmateria12;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria13 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=69'>LABORATORIO DE CONTROL DE CALIDAD INTERNO (<?php echo $resmateria13;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria14 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=70'>VERIFICACI&Oacute;N EN ORIGEN DE PRODUCTOS VEGETALES DE IMPORTACI&Oacute;N (<?php echo $resmateria14;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria15 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=71'>BACTERIOLOG&Iacute;A (<?php echo $resmateria15;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria16 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=72'>ENTOMOLOG&Iacute;A (<?php echo $resmateria16;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria17 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=73'>MICOLOG&Iacute;A (<?php echo $resmateria17;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria18 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=74'>NEMATOLOG&Iacute;A (<?php echo $resmateria18;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria19 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=75'>VIROLOG&Iacute;A (<?php echo $resmateria19;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria20 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=83'>ESTABLECIMIENTOS TIF (<?php echo $resmateria20;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria21 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=84'>PRODUCCI&Oacute;N PRIMARIA DE VEGETALES (<?php echo $resmateria21;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria22 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=85'>PRODUCCI&Oacute;N Y PROCESAMIENTO PRIMARIO DE PRODUCTOS ACU&Iacute;COLAS Y PESQUEROS (<?php echo $resmateria22;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria23 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=86'>PRODUCCI&Oacute;N PRIMARIA DE BIENES DE ORIGEN ANIMAL (<?php echo $resmateria23;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria24 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=87'>EMPRESAS DE PLAGUICIDAS DE USO AGR&Iacute;COLA (<?php echo $resmateria24;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria25 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=88'>ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS (<?php echo $resmateria25;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria26 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=96'>MOSCAS DE LA FRUTA (<?php echo $resmateria26;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria27 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=101'>MERCANC&Iacute;AS REGULADAS (<?php echo $resmateria27;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria28 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=105'>ESTABLECIMIENTOS, ELABORADORES Y COMERCIALIZADORES DE PRODUCTOS PARA USO O CONSUMO ANIMAL (<?php echo $resmateria28;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria29 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=106'>MALEZAS (<?php echo $resmateria29;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria30 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=108'>ACUERDO HLB (<?php echo $resmateria30;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria31 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=111'>PROCEDIMIENTO GCYR (<?php echo $resmateria31;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria32 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=114'>COCHINILLA ROSADA (<?php echo $resmateria32;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria33 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=118'>NOM-001-FITO-2001 (<?php echo $resmateria33;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria34 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=119'>NOM-002-FITO-2000 (<?php echo $resmateria34;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria35 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=120'>NOM-022-FITO-1995 (<?php echo $resmateria35;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria36 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=121'>NOM-026-SAG/FITO-2014 (<?php echo $resmateria36;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria37 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=122'>NOM-031-FITO-2000 (<?php echo $resmateria37;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria38 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=124'>NOM-040-FITO-2002 (<?php echo $resmateria38;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria39 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=125'>NOM-041-FITO-2002 (<?php echo $resmateria39;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria40 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=127'>NOM-066-FITO-1995 (<?php echo $resmateria40;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria41 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=128'>NOM-068-SAG/FITO-2015 (<?php echo $resmateria41;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria42 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=129'>NOM-075-FITO-1997 (<?php echo $resmateria42;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria43 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=130'>NOM-079-FITO-2002 (<?php echo $resmateria43;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria44 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=131'>NOM-081 (<?php echo $resmateria44;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria45 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=152'>BIOTERIOS (<?php echo $resmateria45;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria46 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=158'>RUMIANTES (<?php echo $resmateria46;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria47 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=159'>PORCINOS (<?php echo $resmateria47;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria48 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=160'>AVES (<?php echo $resmateria48;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria49 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=161'>ABEJAS (<?php echo $resmateria49;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria50 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=162'>ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS (<?php echo $resmateria50;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria51 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=176'>PRODUCTOS DE ORIGEN ACU?COLA (<?php echo $resmateria51;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria52 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=177'>EMBARCACIONES MENORES (<?php echo $resmateria52;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria53 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=178'>EMPRESAS DEDICADAS A LA COMERCIALIZADORAS, FABRICACI?N, FORMULACI?N, FORMULACI?N POR MAQUILA, FORMULACI?N Y/O MAQUILA, IMPORTACI?N Y APLICACI?N AEREA DE PLAGUICIDAS DE USO AGR?COLAS (<?php echo $resmateria53;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria54 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=20'>PLAGAS REGLAMENTADAS DEL AGUACATERO (<?php echo $resmateria54;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria55 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=21'>PLAGAS REGLAMENTADAS DEL ALGODONERO (<?php echo $resmateria55;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria56 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=22'>PLAGAS CUARENTENARIAS DE LOS C&Iacute;TRICOS (<?php echo $resmateria56;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria57 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=26'>TRIPS ORIENTAL (<?php echo $resmateria57;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria58 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=76'>&Aacute;CARO ROJO DE LAS PALMAS (<?php echo $resmateria58;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria59 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=77'>MALEZAS REGLAMENTADAS (<?php echo $resmateria59;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria60 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=78'>PLAGAS REGLAMENTADAS DEL AGAVE (<?php echo $resmateria60;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria61 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=79'>ROYA DEL CAFETO (<?php echo $resmateria61;?>)</a></li>
		<?PHP }?>
		<?php if($resmateria62 =='0'){}else {?> 
		<li><a href='res2.php?nombre=<?PHP echo $nombre;?>&materia=113'>BROCA DEL CAF&Eacute (<?php echo $resmateria62;?>)</a></li>
		<?PHP }?>
	</ul>
</ul>
</div> 
</div>
<?php
}
?>
</body>
</html>