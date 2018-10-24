<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>BUSCADOR SENASICA</title>
<style>
h1 {
		position:relative;
		left: 0px;
		bottom: 5px;
	}
	
#inicio{    
        background-color:#000000;
		height:60px;
		
}  

#img1{
	position:relative;
	background-color:#000000;
	left: 800px;
	top: -70px;
	width: 126px;
	height: 41px;
}

	.Estilo1 {color: #FFFFFF}

a:link   
{   
 text-decoration:none;   
} 
#esc{
	position:absolute;
	left: 32px;
	top: 73px;
	width: 189px;
	height: 45px;
} 
#esc1{
	position:absolute;
	left: 1136px;
	top: 73px;
	width: 189px;
	height: 45px;
} 
</style>
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<!-- Acción sobre el botó con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {
				$("#imageField").click(function(event) {
					$("#res").load('res.php #contenido');
				});
			});
		</script>


<body>
<center>
  <div id="inicio">
	<?php include("men1.php");?>
  </div>
  
<form name="usuario" method="post" action="res.php" target="mainFrame" id="usuario" ><!--enctype="multipart/form-data" -->
	
  <p>&nbsp;</p>
  <table width="307" height="122" border="0">
    <tr>
      <th height="43" colspan="2" scope="col"><div align="left"><img src="img/DPF.png" target = iframe_a width="263" height="56" /></div></th>
      <tr>
      <th width="238" height="40" scope="col"><div align="right">
        <input name="nombre" class="input"  type="text" value="" size="40"  placeholder="Buscar una palabra o nombre en SENASICA"/>   <!--required="required" -->    
      </div></th>
      <th width="103" height="40" scope="col"><h1 align="left">
        <input type="image" name="imageField" src="img/Boton.png" height="50" width="50" /></h1></th>
    </tr>
	</table>
	<table border="0" CELLPADDING=0 CELLSPACING=9>
	<tr>
	<th>&Aacute;mbito</th>
	<th>Figura Coadyuvante</th>
	<th>Campo de Estudio</th>
	<th>Materia</th>
	<!--<th>Entidad</th> -->
	<th colspan="2">Fecha de inicio de Vigencia</th> 
	</tr>
	<tr>
	<th>
  <select name="organizacion" id id="contenido" style="width:150px" <!--onChange="submit();"-->>
  <option value="">TODO</option>
  <option value="DGSV" >VEGETAL (DGSV)<!-- DIRECCION GENERAL DE SANIDAD VEGETAL --></option>
  <option value="DGSA">ANIMAL (DGSA) <!--DIRECCION GENERAL DE SALUD ANIMAL --></option>
  <option value="DGIF">INSPECCION (DGIF) <!--DIRECCION GENERAL DE INSPECCION FITOZOOSANITARIA --></option>
  <option value="DGIAAP">INOCUIDAD (DGIAAP) <!--DIRECCION GENERAL DE INOCUIDAD AGROALIMENTARIA, ACUICOLA Y PESQUERA --></option>
  </select>
	</th>
	<th>
  <select name="organo" style="width:150px" <!--onChange="submit();" -->>
  <option value="">TODO</option>
  <option value="LB">(LB) LABORATORIO DE PRUEBAS</option>
  <option value="MVRA">(MVRA) MEDICO VETERINARIO RESPONSABLE AUTORIZADO</option>
  <option value="TEA">(TEA) TERCERO ESPECIALISTA AUTORIZADO</option>
  <option value="TEF">(TEF) TERCERO ESPECIALISTA FITOSANITARIO</option>
  <option value="PA">(PA) PROFESIONAL AUTORIZADO</option>
  <option value="OC">(OC) ORGANISMO DE CERTIFICACION</option>
  <option value="UV">(UV) UNIDAD DE VERIFICACION</option>
  <option value="PFA">(PFA) PROFESIONAL FITOSANITARIO AUTORIZADO</option>
  </select>
	</th>
<th>
  <select name="campo" style="width:150px" <!--onChange="submit();" -->>
  <option value="">TODO</option>
  <option value="5">CAMPA&Ntilde;AS FITOSANITARIA</option>
  <option value="6">ESTABLECIMIENTOS</option>
  <option value="7">DIAGN&Oacute;STICO DE PRODUCTOS VEGETALES</option>
  <option value="8">VERIFICACI&Oacute;N EN ORIGEN DE PRODUCTOS VEGETALES DE IMPORTACI&Oacute;N</option>
  <option value="10">UNIDADES DE PRODUCCI&Oacute;N PECUARIA</option>
  <option value="12">SISTEMAS DE REDUCCI&Oacute;N DE RIESGOS DE CONTAMINACI&Oacute;N(SRRC)</option>
  <option value="14">CERTIFICACI&Oacute;N DE LA MOVILIZACI&Oacute;N</option>
  <option value="15">VERIFICACI&Oacute;N</option>
  <option value="20">BUENAS PR&Aacute;CTICAS</option>
  <option value="21">VERIFICACI&Oacute;N DE PLAGUICIDAS</option>
  <option value="22">CONTROL DE CALIDAD INTERNO</option>
  <option value="23">BUENAS PR&Aacute;CTICAS PECUARIAS</option>
  <option value="24">ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS</option>
  <option value="26">VERIFICACI&Oacute;N DE MERCANC&Iacute;AS PARA SU EXPORTACI&Oacute;N</option>
  <option value="27">BUENAS PR&Aacute;CTICAS ACUICOLAS</option>
  <option value="28">BUENAS PR&Aacute;CTICAS PESQUERAS</option>
  <option value="29">EMPRESAS DE PLAGUICIDAS DE USO AGR&Iacute;COLA</option>
  </select>
</th>
<th>
  <select name="materia" style="width:150px" <!--onChange="submit();" -->>
  <option value="">TODO</option>
  <option value="1">UNIDADES DE PRODUCCI&Oacute;N DE RUMIANTES</option>
  <option value="2">UNIDADES DE PRODUCCI&Oacute;N DE PORCINOS</option>
  <option value="3">UNIDADES DE PRODUCCI&Oacute;N DE AVES</option>
  <option value="4">UNIDADES DE PRODUCCI&Oacute;N DE EQUINOS</option>
  <option value="5">UNIDADES DE PRODUCCI&Oacute;N DE ABEJAS</option>
  <option value="6">INDUSTRIALES</option>
  <option value="7">COMERCIALES</option>
  <option value="8">MOVILIZACI&Oacute;N</option>
  <option value="9">VERIFICACI&Oacute;N DE C&Aacute;RNICOS DE IMPORTACI&Oacute;N</option>
  <option value="13">CL&Igrave;NICAS Y HOSPITALES VETERINARIOS QUE COMERCIALIZAN PRODUCTOS PARA USO O CONSUMO ANIMAL</option>
  <option value="20">PLAGAS REGLAMENTADAS DEL AGUACATERO</option>
  <option value="21">PLAGAS REGLAMENTADAS DEL ALGODONERO</option>
  <option value="22">PLAGAS CUARENTENARIAS DE LOS C&Iacute;TRICOS</option>
  <option value="23">UNIDADES DE PRODUCCI&Oacute;N DE MATERIAL PROPAGATIVO DE C&Iacute;TRICOS</option>
  <option value="26">TRIPS ORIENTAL</option>
  <option value="51">VERIFICACI&Oacute;N DE LA MOVILIZACI&Oacute;N NACIONAL</option>
  <option value="53">IMPORTACI&Oacute;N DE MERCANC&Iacute;AS REGULADAS CON FINES COMERCIALES E IMPORTACI&Oacute;N DE MERCANC&Iacute;AS REGULADAS SIN FINES COMERCIALES</option>
  <option value="69">LABORATORIO DE CONTROL DE CALIDAD INTERNO</option>
  <option value="70">VERIFICACI&Oacute;N EN ORIGEN DE PRODUCTOS VEGETALES DE IMPORTACI&Oacute;N</option>
  <option value="71">BACTERIOLOG&Iacute;A</option>
  <option value="72">ENTOMOLOG&Iacute;A</option>
  <option value="73">MICOLOG&Iacute;A</option>
  <option value="74">NEMATOLOG&Iacute;A</option>
  <option value="75">VIROLOG&Iacute;A</option>
  <option value="76">&Aacute;CARO ROJO DE LAS PALMAS</option>
  <option value="77">MALEZAS REGLAMENTADAS</option>
  <option value="78">PLAGAS REGLAMENTADAS DEL AGAVE</option>
  <option value="79">ROYA DEL CAFETO</option>
  <option value="83">ESTABLECIMIENTOS TIF</option>
  <option value="84">PRODUCCI&Oacute;N PRIMARIA DE VEGETALES</option>
  <option value="85">PRODUCCI&Oacute;N Y PROCESAMIENTO PRIMARIO DE PRODUCTOS ACU&Iacute;COLAS Y PESQUEROS</option>
  <option value="86">PRODUCCI&Oacute;N PRIMARIA DE BIENES DE ORIGEN ANIMAL</option>
  <option value="87">EMPRESAS DE PLAGUICIDAS DE USO AGR&Iacute;COLA</option>
  <option value="88">ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS</option>
  <option value="96">MOSCAS DE LA FRUTA</option>
  <option value="101">MERCANC&Iacute;AS REGULADAS</option>
  <option value="105">ESTABLECIMIENTOS, ELABORADORES Y COMERCIALIZADORES DE PRODUCTOS PARA USO O CONSUMO ANIMAL</option>
  <option value="106">MALEZAS</option>
  <option value="108">ACUERDO HLB</option>
  <option value="111">PROCEDIMIENTO GCYR</option>
  <option value="113">BROCA DEL CAF&Eacute;</option>
  <option value="114">COCHINILLA ROSADA</option>
  <option value="118">NOM-001-FITO-2001</option>
  <option value="119">NOM-002-FITO-2000</option>
  <option value="120">NOM-022-FITO-1995</option>
  <option value="121">NOM-026-SAG/FITO-2014</option>
  <option value="122">NOM-031-FITO-2000</option>
  <option value="124">NOM-040-FITO-2002</option>
  <option value="125">NOM-041-FITO-2002</option>
  <option value="127">NOM-066-FITO-1995</option>
  <option value="128">NOM-068-SAG/FITO-2015</option>
  <option value="129">NOM-075-FITO-1997</option>
  <option value="130">NOM-079-FITO-2002</option>
  <option value="131">NOM-081</option>
  <option value="152">BIOTERIOS</option>
  <option value="158">RUMIANTES</option>
  <option value="159">PORCINOS</option>
  <option value="160">AVES</option>
  <option value="161">ABEJAS</option>
  <option value="162">ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS</option>
  <option value="176">PRODUCTOS DE ORIGEN ACU&Iacute;COLA</option>
  <option value="177">EMBARCACIONES MENORES</option>
  <option value="178">EMPRESAS DEDICADAS A LA COMERCIALIZADORAS, FABRICACI&Oacute;N, FORMULACI&Oacute;N, FORMULACI&Oacute;N POR MAQUILA, FORMULACI&Oacute;N Y/O MAQUILA, IMPORTACI&Oacute;N Y APLICACI&Oacute;N AEREA DE PLAGUICIDAS DE USO AGR&Iacute;COLAS</option>
  
  </select>
</th>
<!--<th>
  <select name="entidad" style="width:150px" onChange="submit();">
  <option value="">TODO</option>
  <option value="Aguascalientes">Aguascalientes</option>
  <option value="Baja California">Baja California</option>
  <option value="Baja California Sur">Baja California Sur</option>
  <option value="Campeche">Campeche</option>
  <option value="Chiapas">Chiapas</option>
  <option value="Chihuahua">Chihuahua</option>
  <option value="<php? phpecho utf8_encode('Ciudad de México')?>">Ciudad de M&eacute;xico</option>
  <option value="Coahuila de Zaragoza">Coahuila de Zaragoza</option>
  <option value="Colima">Colima</option>
  <option value="Durango">Durango</option>
  <option value="Guanajuato">Guanajuato</option>
  <option value="Guerrero">Guerrero</option>
  <option value="Hidalgo">Hidalgo</option>
  <option value="Jalisco">Jalisco</option>
  <option value="<?phpecho utf8_encode('México')?>">M&eacute;xico</option>
  <option value="<?phpecho utf8_encode('Michoacán de Ocampo')?>">Michoac&aacute;n de Ocampo</option>
  <option value="Morelos">Morelos</option>
  <option value="Nayarit">Nayarit</option>
  <option value="<?phpecho utf8_encode('Nuevo León')?>">Nuevo Le&oacute;n</option>
  <option value="Oaxaca">Oaxaca</option>
  <option value="Puebla">Puebla</option>
  <option value="<?phpecho utf8_encode('Querétaro de Arteaga')?>">Quer&eacute;taro de Arteaga</option>
  <option value="Quintana Roo">Quintana Roo</option>
  <option value="<?phpecho utf8_encode('San Luis Potosí')?>">San Luis Potos&iacute;</option>
  <option value="Sinaloa">Sinaloa</option>
  <option value="Sonora">Sonora</option>
  <option value="Tabasco">Tabasco</option>
  <option value="Tamaulipas">Tamaulipas</option>
  <option value="Tlaxcala">Tlaxcala</option>
  <option value="Veracruz de Ignacio de la Llave">Veracruz de Ignacio de la Llave</option>
  <option value="<?phpecho utf8_encode('Yucatán')?>">Yucat&aacute;n</option>
  <option value="Zacatecas">Zacatecas</option>
  </select>
	</th> -->
 <th>
	    <input type="text" name="date" class="tcal" style="width:70px"/>
		
	</th>
	 <th>
	    <input type="text" name="date1" class="tcal" style="width:70px"/>
	</th>
	</tr>
  </table>
</form>
<div id ="esc1"><img src="img/SENASICA.jpg" width="212" height="77" /></div> 
<div id ="esc"><img src="img/sagarpa.png" width="212" height="77" /></div>

<div id="res">
<iframe src="res.php" name="mainFrame" height="680px" width="100%" frameborder="0">
</iframe>
</div>
</center>
</body>
</html>