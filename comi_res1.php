<html>
<head>
<link rel="stylesheet" href="css.css" type="text/css" />
<link rel="stylesheet" href="OK.css" type="text/css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<link rel="stylesheet" href="menu-7.css" type="text/css" />
<style>

#menu ul li:focus ul, #menu ul li:active ul, #menu ul li a:active ul {display: block;
position: relative;width: 160px;border: solid 1px #FFF;border-top: none;background-color: #FFFFFF;}
#menu ul li:focus span, #menu ul li:active span, #menu ul li a:active {background-color: #CCCCCC;border-bottom: solid 1px #000;color: #000;border-left: solid 8px #000000;border-right: solid 8px #000000;
}

#menu{
	/*background-color:#0099FF;*/
	position: absolute;
	top: 59px;
	margin-top: -50px;
	left: 39px;
	width: 263px;
	height: 705px;
	overflow: auto;
}
#centro{
	/*background-color:#FF0000;*/
	position: absolute;
	top: 81px;
	margin-top: -50px;
	left: 389px;
	height: 669px;
	overflow: auto;
	width: 1179px;
}
#resultado{
	/*background-color:#00FF66;*/
	position: absolute;
	top: 57px;
	margin-top: -50px;
	left: 1505px;
	width: 346px;
	height: 33px;
	
}
#padre{
/*background-color:#CCCCCC;*/
}
html { 
overflow-y:hidden; 
}
/*.preloader {
  width: 70px;
  height: 70px;
  border: 10px solid #eee;
  border-top: 10px solid #666;
  border-radius: 50%;
  animation-name: girar;
  animation-duration: 1s;
  animation-iteration-count: infinite;
  animation-timing-function: linear;
}*/
/*@keyframes girar {
  from {
    transform: rotate(0deg);
  }
  to {
    transform: rotate(360deg);
  }
}*/
/*.content {
	width:98%;
	margin:0 auto;
	height:97%;
	padding:10px;
	background-color:#FFFFFF; opacity:0.8;
	 z-index: 3;
	position:absolute;
	left: 14px;
	top: 3px;
}*/


/*.iframe{
border:0;
height:98%;
width:98%;
}*/
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
<body scroll="NO">
<?php
if (isset($_POST["nombre"])) {
$nombre = $_REQUEST["nombre"];
$giro = $_REQUEST["giro"];
$estado = $_REQUEST["estado"];

?>
<div id="padre">

<?PHP
include("conexion.php");

if($giro=='' & $estado==''){
$sql = mysql_query("SELECT * FROM dgsvfisica WHERE NOMBRE LIKE '%".$nombre."%' OR NOMBRE2 LIKE '%".$nombre."%' OR APELLIDO_P LIKE '%".$nombre."%' OR APELLIDO_M LIKE '%".$nombre."%' OR ESTADO LIKE '%".$nombre."%' OR CORREO LIKE '%".$nombre."%' OR GIRO LIKE '%".$nombre."%' OR RELACION LIKE '%".$nombre."%'",$conexion);
$resul = mysql_num_rows($sql);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";
}
?>
</div>
<?php
}
if($giro==!'' & $estado==''){
$sql = mysql_query("SELECT * FROM dgsvfisica WHERE GIRO ='".$giro."' AND NOMBRE LIKE '%".$nombre."%' OR NOMBRE2 LIKE '%".$nombre."%' OR APELLIDO_P LIKE '%".$nombre."%' OR APELLIDO_M LIKE '%".$nombre."%' OR ESTADO LIKE '%".$nombre."%' OR CORREO LIKE '%".$nombre."%' OR GIRO LIKE '%".$nombre."%' OR RELACION LIKE '%".$nombre."%'",$conexion);
$resul = mysql_num_rows($sql);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
</div>
<?php
}
if($giro=='' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgsvfisica WHERE ESTADO='".$estado."' and concat(NOMBRE,' ',NOMBRE2,' ',APELLIDO_P,' ',APELLIDO_M) LIKE '%".$nombre."_%' OR GIRO LIKE '%".$nombre."_%'",$conexion);
$resul = mysql_num_rows($sql);
$número_filas = mysql_num_rows($sql);

if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
</div>
<?php
}

/*if($area=='' & $orga=='' & $directorio=='' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE NOMBRE LIKE '%".$nombre."%' OR CARGO LIKE '%".$nombre."%' OR CORREO LIKE '%".$nombre."%' OR DIRECCION LIKE '%".$nombre."%' OR ORGANIZACION LIKE '%".$nombre."%' OR TIPO_DIRECTORIO LIKE '%".$nombre."%' OR ESTADO LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="2"><span class="nivel1">ORGANIZACION</span>
	<ul>
	<?php if($resul3=='0'){} else {?>
		<li class="primera"><br>Industria Plaguicidas(<?php echo $resul3;?>)</li>
		<?php }?>
	<?php if($resul4=='0'){} else {?>
		<li class="primera"><br>Organizaciones Agricolas(<?php echo $resul4;?>)</li>
		<?php }?>
	<?php if($resul5=='0'){} else {?>
		<li class="primera"><br>Organizaciones Pec_Ac (<?php echo $resul5;?>)</li>
		<?php }?>
	<?php if($resul6=='0'){} else {?>
		<li class="primera"><br>Sistema Producto(<?php echo $resul6;?>)</li>
		<?php }?>
	<?php if($resul7=='0'){} else {?>
		<li class="primera"><br>Procesadores(<?php echo $resul7;?>)</li>
		<?php }?>
	<?php if($resul8=='0'){} else {?>
		<li class="primera"><br>Universidades(<?php echo $resul8;?>)</li>
		<?php }?>
	<?php if($resul9=='0'){} else {?>
		<li class="primera"><br>AGRICOLA(<?php echo $resul9;?>)</li>
		<?php }?>
	<?php if($resul10=='0'){} else {?>
		<li class="primera"><br>PECUARIO (<?php echo $resul10;?>)</li>
		<?php }?>
	<?php if($resul11=='0'){} else {?>
		<li class="primera"><br>ACUICOLA (<?php echo $resul11;?>)</li>
		<?php }?>
       </ul>
</li>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>

</div>
<?php
}

if($area==!'' & $orga=='' & $directorio=='' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
//$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."'");
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}

?>
<div id="menu">
<?php
if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1" tabindex="2"><span class="nivel1">ORGANIZACION</span>
	<ul>
	<?php if($resul3=='0'){} else {?>
		<li class="primera"><br>Industria Plaguicidas(<?php echo $resul3;?>)</li>
		<?php }?>
	<?php if($resul4=='0'){} else {?>
		<li class="primera"><br>Organizaciones Agricolas(<?php echo $resul4;?>)</li>
		<?php }?>
	<?php if($resul5=='0'){} else {?>
		<li class="primera"><br>Organizaciones Pec_Ac (<?php echo $resul5;?>)</li>
		<?php }?>
	<?php if($resul6=='0'){} else {?>
		<li class="primera"><br>Sistema Producto(<?php echo $resul6;?>)</li>
		<?php }?>
	<?php if($resul7=='0'){} else {?>
		<li class="primera"><br>Procesadores(<?php echo $resul7;?>)</li>
		<?php }?>
	<?php if($resul8=='0'){} else {?>
		<li class="primera"><br>Universidades(<?php echo $resul8;?>)</li>
		<?php }?>
	<?php if($resul9=='0'){} else {?>
		<li class="primera"><br>AGRICOLA(<?php echo $resul9;?>)</li>
		<?php }?>
	<?php if($resul10=='0'){} else {?>
		<li class="primera"><br>PECUARIO (<?php echo $resul10;?>)</li>
		<?php }?>
	<?php if($resul11=='0'){} else {?>
		<li class="primera"><br>ACUICOLA (<?php echo $resul11;?>)</li>
		<?php }?>
       </ul>
</li>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>
</div>
<?php
}

if($area==!'' & $orga==!'' & $directorio=='' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php
if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>
</div>
  <?php
}

if($area==!'' & $orga=='' & $directorio==!'' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE  DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php
if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  
  <li class="nivel1" tabindex="2"><span class="nivel1">ORGANIZACION</span>
	<ul>
	<?php if($resul3=='0'){} else {?>
		<li class="primera"><br>Industria Plaguicidas(<?php echo $resul3;?>)</li>
		<?php }?>
	<?php if($resul4=='0'){} else {?>
		<li class="primera"><br>Organizaciones Agricolas(<?php echo $resul4;?>)</li>
		<?php }?>
	<?php if($resul5=='0'){} else {?>
		<li class="primera"><br>Organizaciones Pec_Ac (<?php echo $resul5;?>)</li>
		<?php }?>
	<?php if($resul6=='0'){} else {?>
		<li class="primera"><br>Sistema Producto(<?php echo $resul6;?>)</li>
		<?php }?>
	<?php if($resul7=='0'){} else {?>
		<li class="primera"><br>Procesadores(<?php echo $resul7;?>)</li>
		<?php }?>
	<?php if($resul8=='0'){} else {?>
		<li class="primera"><br>Universidades(<?php echo $resul8;?>)</li>
		<?php }?>
	<?php if($resul9=='0'){} else {?>
		<li class="primera"><br>AGRICOLA(<?php echo $resul9;?>)</li>
		<?php }?>
	<?php if($resul10=='0'){} else {?>
		<li class="primera"><br>PECUARIO (<?php echo $resul10;?>)</li>
		<?php }?>
	<?php if($resul11=='0'){} else {?>
		<li class="primera"><br>ACUICOLA (<?php echo $resul11;?>)</li>
		<?php }?>
       </ul>
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>
</div>
  <?php
}

if($area=='' & $orga=='' & $directorio=='' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}

?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="2"><span class="nivel1">ORGANIZACION</span>
	<ul>
	<?php if($resul3=='0'){} else {?>
		<li class="primera"><br>Industria Plaguicidas(<?php echo $resul3;?>)</li>
		<?php }?>
	<?php if($resul4=='0'){} else {?>
		<li class="primera"><br>Organizaciones Agricolas(<?php echo $resul4;?>)</li>
		<?php }?>
	<?php if($resul5=='0'){} else {?>
		<li class="primera"><br>Organizaciones Pec_Ac (<?php echo $resul5;?>)</li>
		<?php }?>
	<?php if($resul6=='0'){} else {?>
		<li class="primera"><br>Sistema Producto(<?php echo $resul6;?>)</li>
		<?php }?>
	<?php if($resul7=='0'){} else {?>
		<li class="primera"><br>Procesadores(<?php echo $resul7;?>)</li>
		<?php }?>
	<?php if($resul8=='0'){} else {?>
		<li class="primera"><br>Universidades(<?php echo $resul8;?>)</li>
		<?php }?>
	<?php if($resul9=='0'){} else {?>
		<li class="primera"><br>AGRICOLA(<?php echo $resul9;?>)</li>
		<?php }?>
	<?php if($resul10=='0'){} else {?>
		<li class="primera"><br>PECUARIO (<?php echo $resul10;?>)</li>
		<?php }?>
	<?php if($resul11=='0'){} else {?>
		<li class="primera"><br>ACUICOLA (<?php echo $resul11;?>)</li>
		<?php }?>
       </ul>
</li>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
</ul>
</center>

</div>
<?php
}

if($area==!'' & $orga=='' & $directorio=='' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1" tabindex="2"><span class="nivel1">ORGANIZACION</span>
	<ul>
	<?php if($resul3=='0'){} else {?>
		<li class="primera"><br>Industria Plaguicidas(<?php echo $resul3;?>)</li>
		<?php }?>
	<?php if($resul4=='0'){} else {?>
		<li class="primera"><br>Organizaciones Agricolas(<?php echo $resul4;?>)</li>
		<?php }?>
	<?php if($resul5=='0'){} else {?>
		<li class="primera"><br>Organizaciones Pec_Ac (<?php echo $resul5;?>)</li>
		<?php }?>
	<?php if($resul6=='0'){} else {?>
		<li class="primera"><br>Sistema Producto(<?php echo $resul6;?>)</li>
		<?php }?>
	<?php if($resul7=='0'){} else {?>
		<li class="primera"><br>Procesadores(<?php echo $resul7;?>)</li>
		<?php }?>
	<?php if($resul8=='0'){} else {?>
		<li class="primera"><br>Universidades(<?php echo $resul8;?>)</li>
		<?php }?>
	<?php if($resul9=='0'){} else {?>
		<li class="primera"><br>AGRICOLA(<?php echo $resul9;?>)</li>
		<?php }?>
	<?php if($resul10=='0'){} else {?>
		<li class="primera"><br>PECUARIO (<?php echo $resul10;?>)</li>
		<?php }?>
	<?php if($resul11=='0'){} else {?>
		<li class="primera"><br>ACUICOLA (<?php echo $resul11;?>)</li>
		<?php }?>
       </ul>
</li>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
</ul>
</center>
</div>
<?php
}

if($area=='' & $orga==!'' & $directorio=='' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}

?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>

</div>
<?php
}


if($area=='' & $orga==!'' & $directorio==!'' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}

?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>
</div>
<?php
}

if($area=='' & $orga==!'' & $directorio=='' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}

?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
 
</ul>
</center>

</div>
<?php
}

if($area=='' & $orga=='' & $directorio==!'' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="2"><span class="nivel1">ORGANIZACION</span>
	<ul>
	<?php if($resul3=='0'){} else {?>
		<li class="primera"><br>Industria Plaguicidas(<?php echo $resul3;?>)</li>
		<?php }?>
	<?php if($resul4=='0'){} else {?>
		<li class="primera"><br>Organizaciones Agricolas(<?php echo $resul4;?>)</li>
		<?php }?>
	<?php if($resul5=='0'){} else {?>
		<li class="primera"><br>Organizaciones Pec_Ac (<?php echo $resul5;?>)</li>
		<?php }?>
	<?php if($resul6=='0'){} else {?>
		<li class="primera"><br>Sistema Producto(<?php echo $resul6;?>)</li>
		<?php }?>
	<?php if($resul7=='0'){} else {?>
		<li class="primera"><br>Procesadores(<?php echo $resul7;?>)</li>
		<?php }?>
	<?php if($resul8=='0'){} else {?>
		<li class="primera"><br>Universidades(<?php echo $resul8;?>)</li>
		<?php }?>
	<?php if($resul9=='0'){} else {?>
		<li class="primera"><br>AGRICOLA(<?php echo $resul9;?>)</li>
		<?php }?>
	<?php if($resul10=='0'){} else {?>
		<li class="primera"><br>PECUARIO (<?php echo $resul10;?>)</li>
		<?php }?>
	<?php if($resul11=='0'){} else {?>
		<li class="primera"><br>ACUICOLA (<?php echo $resul11;?>)</li>
		<?php }?>
       </ul>
</li>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>

</div>
<?php
}

if($area=='' & $orga=='' & $directorio==!'' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
  <li class="nivel1" tabindex="2"><span class="nivel1">ORGANIZACION</span>
	<ul>
	<?php if($resul3=='0'){} else {?>
		<li class="primera"><br>Industria Plaguicidas(<?php echo $resul3;?>)</li>
		<?php }?>
	<?php if($resul4=='0'){} else {?>
		<li class="primera"><br>Organizaciones Agricolas(<?php echo $resul4;?>)</li>
		<?php }?>
	<?php if($resul5=='0'){} else {?>
		<li class="primera"><br>Organizaciones Pec_Ac (<?php echo $resul5;?>)</li>
		<?php }?>
	<?php if($resul6=='0'){} else {?>
		<li class="primera"><br>Sistema Producto(<?php echo $resul6;?>)</li>
		<?php }?>
	<?php if($resul7=='0'){} else {?>
		<li class="primera"><br>Procesadores(<?php echo $resul7;?>)</li>
		<?php }?>
	<?php if($resul8=='0'){} else {?>
		<li class="primera"><br>Universidades(<?php echo $resul8;?>)</li>
		<?php }?>
	<?php if($resul9=='0'){} else {?>
		<li class="primera"><br>AGRICOLA(<?php echo $resul9;?>)</li>
		<?php }?>
	<?php if($resul10=='0'){} else {?>
		<li class="primera"><br>PECUARIO (<?php echo $resul10;?>)</li>
		<?php }?>
	<?php if($resul11=='0'){} else {?>
		<li class="primera"><br>ACUICOLA (<?php echo $resul11;?>)</li>
		<?php }?>
       </ul>
</li>
</ul>
</center>
</div>
<?php
}

if($area==!'' & $orga==!'' & $directorio==!'' & $estado==''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='AGUASCALIENTES'",$conexion);
$resul14 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA'",$conexion);
$resul15 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='BAJA CALIFORNIA SUR'",$conexion);
$resul16 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CAMPECHE'",$conexion);
$resul17 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIAPAS'",$conexion);
$resul18 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CHIHUAHUA'",$conexion);
$resul19 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='CIUDAD DE MEXICO'",$conexion);
$resul20 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COAHUILA'",$conexion);
$resul21 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='COLIMA'",$conexion);
$resul22 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='DURANGO'",$conexion);
$resul23 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUANAJUATO'",$conexion);
$resul24 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='GUERRERO'",$conexion);
$resul25 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='HIDALGO'",$conexion);
$resul26 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='JALISCO'",$conexion);
$resul27 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MEXICO'",$conexion);
$resul28 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MICHOACAN'",$conexion);
$resul29 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='MORELOS'",$conexion);
$resul30 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NAYARIT'",$conexion);
$resul31 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='NUEVO LEON'",$conexion);
$resul32 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='OAXACA'",$conexion);
$resul33 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='PUEBLA'",$conexion);
$resul34 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUERETARO'",$conexion);
$resul35 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='QUINTANA ROO'",$conexion);
$resul36 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SAN LUIS POTOSI'",$conexion);
$resul37 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SINALOA'",$conexion);
$resul38 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='SONORA'",$conexion);
$resul39 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TABASCO'",$conexion);
$resul40 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TAMAULIPAS'",$conexion);
$resul41 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='TLAXCALA'",$conexion);
$resul42 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='VERACRUZ'",$conexion);
$resul43 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='YUCATAN'",$conexion);
$resul44 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='ZACATECAS'",$conexion);
$resul45 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>
</div>
<?php

}
if($area==!'' & $orga==!'' & $directorio=='' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio Comite Estatal'",$conexion);
$resul12 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND TIPO_DIRECTORIO='Directorio coadyuvantes'",$conexion);
$resul13 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1" tabindex="3"><span class="nivel1">DIRECTORIO</span>
	<ul>
	<?php if($resul12=='0'){} else {?>
		<li class="primera"><br>Directorio Comite Estatal(<?php echo $resul12;?>)</li>
		<?php }?>
	<?php if($resul13=='0'){} else {?>
		<li class="primera"><br>Directorio coadyuvantes(<?php echo $resul13;?>)</li>
		<?php }?>
	</ul>
</li>
</ul>
</center>
</div>
<?php
}

if($area=='' & $orga==!'' & $directorio==!'' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND DIRECCION='DGIAAP'",$conexion);
$resul = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND DIRECCION='DGSV'",$conexion);
$resul1 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND DIRECCION='DGSA'",$conexion);
$resul2 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1 primera" tabindex="1"><span class="nivel1">AREA</span>
	<ul>
	<?php if($resul=='0'){} else {?>
		<li class="primera"><br>DGIAPP (<?php echo $resul;?>)</li>
		<?php }?>
	<?php if($resul1=='0'){} else {?>
		<li class="primera"><br>DGSV(<?php echo $resul1;?>)</li>
		<?php }?>
	<?php if($resul2=='0'){} else {?>
		<li class="primera"><br>DGSA(<?php echo $resul2;?>)</li>
		<?php }?>
	</ul>
  </li>
</ul>
</center>
</div>
<?php
}

if($area==!'' & $orga=='' & $directorio==!'' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Industria Plaguicidas'",$conexion);
$resul3 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Agricolas'",$conexion);
$resul4 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Organizaciones Pec_Ac'",$conexion);
$resul5 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Sistema Producto'",$conexion);
$resul6 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Procesadores'",$conexion);
$resul7 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='Universidades'",$conexion);
$resul8 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='AGRICOLA'",$conexion);
$resul9 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='PECUARIO'",$conexion);
$resul10 = mysql_num_rows($sql);
$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND ORGANIZACION='ACUICOLA'",$conexion);
$resul11 = mysql_num_rows($sql);

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
<center>
<ul>
  <li class="nivel1" tabindex="4"><span class="nivel1">ESTADO</span>
	<ul>
	<?php if($resul14=='0'){} else {?>
		<li class="primera"><br>AGUASCALIENTES(<?php echo $resul14;?>)</li>
		<?php }?>
	<?php if($resul15=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA(<?php echo $resul15;?>)</li>
		<?php }?>
	<?php if($resul16=='0'){} else {?>
		<li class="primera"><br>BAJA CALIFORNIA SUR(<?php echo $resul16;?>)</li>
		<?php }?>
	<?php if($resul17=='0'){} else {?>
		<li class="primera"><br>CAMPECHE(<?php echo $resul17;?>)</li>
		<?php }?>
	<?php if($resul18=='0'){} else {?>
		<li class="primera"><br>CHIAPAS(<?php echo $resul18;?>)</li>
		<?php }?>
	<?php if($resul19=='0'){} else {?>
		<li class="primera"><br>CHIHUAHUA(<?php echo $resul19;?>)</li>
		<?php }?>
	<?php if($resul20=='0'){} else {?>
		<li class="primera"><br>CIUDAD DE MEXICO(<?php echo $resul20;?>)</li>
		<?php }?>
	<?php if($resul21=='0'){} else {?>
		<li class="primera"><br>COAHUILA(<?php echo $resul21;?>)</li>
		<?php }?>
	<?php if($resul22=='0'){} else {?>
		<li class="primera"><br>COLIMA(<?php echo $resul22;?>)</li>
		<?php }?>
	<?php if($resul23=='0'){} else {?>
		<li class="primera"><br>DURANGO(<?php echo $resul23;?>)</li>
		<?php }?>
	<?php if($resul24=='0'){} else {?>
		<li class="primera"><br>GUANAJUATO(<?php echo $resul24;?>)</li>
		<?php }?>
	<?php if($resul25=='0'){} else {?>
		<li class="primera"><br>GUERRERO(<?php echo $resul25;?>)</li>
		<?php }?>
	<?php if($resul26=='0'){} else {?>
		<li class="primera"><br>HIDALGO(<?php echo $resul26;?>)</li>
		<?php }?>
	<?php if($resul27=='0'){} else {?>
		<li class="primera"><br>JALISCO(<?php echo $resul27;?>)</li>
		<?php }?>
	<?php if($resul28=='0'){} else {?>
		<li class="primera"><br>MEXICO(<?php echo $resul28;?>)</li>
		<?php }?>
	<?php if($resul29=='0'){} else {?>
		<li class="primera"><br>MICHOACAN(<?php echo $resul29;?>)</li>
		<?php }?>
	<?php if($resul30=='0'){} else {?>
		<li class="primera"><br>MORELOS(<?php echo $resul30;?>)</li>
		<?php }?>
	<?php if($resul31=='0'){} else {?>
		<li class="primera"><br>NAYARIT(<?php echo $resul31;?>)</li>
		<?php }?>
	<?php if($resul32=='0'){} else {?>
		<li class="primera"><br>NUEVO LEON(<?php echo $resul32;?>)</li>
		<?php }?>
	<?php if($resul33=='0'){} else {?>
		<li class="primera"><br>OAXACA(<?php echo $resul33;?>)</li>
		<?php }?>
	<?php if($resul34=='0'){} else {?>
		<li class="primera"><br>PUEBLA(<?php echo $resul34;?>)</li>
		<?php }?>
	<?php if($resul35=='0'){} else {?>
		<li class="primera"><br>QUERETARO(<?php echo $resul35;?>)</li>
		<?php }?>
	<?php if($resul36=='0'){} else {?>
		<li class="primera"><br>QUINTANA ROO(<?php echo $resul36;?>)</li>
		<?php }?>
	<?php if($resul37=='0'){} else {?>
		<li class="primera"><br>SAN LUIS POTOSI(<?php echo $resul37;?>)</li>
		<?php }?>
	<?php if($resul38=='0'){} else {?>
		<li class="primera"><br>SINALOA(<?php echo $resul38;?>)</li>
		<?php }?>
	<?php if($resul39=='0'){} else {?>
		<li class="primera"><br>SONORA(<?php echo $resul39;?>)</li>
		<?php }?>
	<?php if($resul40=='0'){} else {?>
		<li class="primera"><br>TABASCO(<?php echo $resul40;?>)</li>
		<?php }?>
	<?php if($resul41=='0'){} else {?>
		<li class="primera"><br>TAMAULIPAS(<?php echo $resul41;?>)</li>
		<?php }?>
	<?php if($resul42=='0'){} else {?>
		<li class="primera"><br>TLAXCALA(<?php echo $resul42;?>)</li>
		<?php }?>
	<?php if($resul43=='0'){} else {?>
		<li class="primera"><br>VERACRUZ(<?php echo $resul43;?>)</li>
		<?php }?>
	<?php if($resul44=='0'){} else {?>
		<li class="primera"><br>YUCATAN(<?php echo $resul44;?>)</li>
		<?php }?>
	<?php if($resul45=='0'){} else {?>
		<li class="primera"><br>ZACATECAS(<?php echo $resul45;?>)</li>
		<?php }?>
	</ul>
</ul>
</center>

</div>
<?php 
}

if($area==!'' & $orga==!'' & $directorio==!'' & $estado==!''){

$sql = mysql_query("SELECT * FROM dgiaap1 WHERE DIRECCION='".$area."' AND ORGANIZACION='".$orga."' AND TIPO_DIRECTORIO='".$directorio."' AND ESTADO='".$estado."' AND NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="menu">
<?php if ($número_filas==''){}
else{echo $número_filas." RESULTADOS ENCONTRADOS";}
?>
</div>
<?php
}*/
?>
<div id="centro">
<?php
$x=0;
while($row=mysql_fetch_array($sql)){
$id = $row['0'];
$titulo = $row[1]; 
$nom = $row[2]; 
$nom2 = $row[3];
$ap = $row[4];
$am = $row[5];
$regimen = $row[6];
$estado = $row[7];
$municipio =$row[8];
$localidad = $row[9];
$cp = $row[10];
$correo = $row[11];
$lada = $row[12];
$ext = $row[13];
$tel = $row[14];
$giro = $row[15];
$relacion = $row[16];
$x++;
if($nombre == $nom){
echo "<font color='#FFFF00'>".$nom."</font>";
}
?>
<table width="1150" height="225" border="0">
 <tr>
 <th width="58" rowspan="9"><img width="40" src="img/log.png" aling><?php echo $x?></th>
   <th width="1038"><div align="left">NOMBRE: <font color='#2e86c1'><?php echo $nom." ".$nom2." ".$ap." ".$am;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">REGUIMEN FISCAL: <font color='#2e86c1'><?php echo $regimen;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">ESTADO: <font color='#2e86c1'><?PHP echo $estado;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">DOMICILIO: <font color='#2e86c1'><?PHP echo "Municipio: ".$municipio." Localidad: ".$localidad." C.P.: ".$cp;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">CORREO ELECTRONICO:<font color='#2e86c1'> <?PHP echo $correo;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">TELEFONO:<font color='#2e86c1'> <?PHP echo "LADA ".$lada." TEL. ".$tel." EXT.".$ext;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">GIRO: <font color='#2e86c1'><?PHP echo $giro;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">RELACION CON SENASICA: <font color='#2e86c1'><?PHP echo $relacion;?></font></div></th>
   </tr>
 <tr>
   <th><center><hr width='75%'></center></th>
   </tr>
</table>
<br>
 <?php
 }
?>
</div>
<div id="resultado">
</div>
</div>
<?PHP
}//IF
?>
</body>
</html>
