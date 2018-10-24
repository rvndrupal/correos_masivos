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
</head>
<body>
<center>
  <div id="inicio">
	<?php include("men1.php");?>
  </div>
<form name="usuario" method="post" action="resul.php" target="mainFrame" id="usuario"> <!--enctype="multipart/form-data" -->
	
  <p>&nbsp;</p>
  <table width="307" height="122" border="0">
    <tr>
      <th height="43" colspan="2" scope="col">
	  <div align="left">
	  <img src="img/DPM.png" target = iframe_a width="263" height="56"/>
	  </div>
	  </th>
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
  <option value="OC">(OC) ORGANISMO DE CERTIFICACION</option>
  <option value="UV">(UV) UNIDAD DE VERIFICACION</option>
  <option value="LAU">(LAU) LABORATORIO AUTORIZADO</option>
  <option value="LAP">(LAP) LABORATORIO APROBADO</option>
  <option value="LB">(LB) LABORATORIO DE PRUEBAS</option>
  </select>
	</th>
<th>
  <select name="campo" style="width:150px" <!--onChange="submit();" -->>
  <option value="">TODO</option>
  <option value="23">BUENAS PR&Aacute;CTICAS PECUARIAS</option>
  <option value="14">CERTIFICACI&Oacute;N DE LA MOVILIZACI&Oacute;N</option>
  <option value="22">CONTROL DE CALIDAD INTERNO</option>
  <option value="24">ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS</option>
  <option value="15">VERIFICACI&Oacute;N</option>
  <option value="31">PRODUCTOS ORG&Aacute;NICOS</option>
  <option value="13">DIAGN&Oacute;STICO</option>
  <option value="16">CONSTATACI&Oacute;N</option>
  </select>
</th>
<th>
  <select name="materia" style="width:150px"> <!--onChange="submit();" -->
  <option value="">TODO</option>
  <option value="31">ENTOMOLOG&Iacute;A</option>
  <option value="52">VERIFICACI&Oacute;N DE LA MOVILIZACI&Oacute;N NACIONAL</option>
  <option value="54">IMPORTACI&Oacute;N DE MERCANC&Iacute;AS REGULADAS SIN FINES COMERCIALES</option>
  <option value="56">PRODUCCI&Oacute;N VEGETAL</option>
  <option value="67">SALUD ANIMAL</option>
  <option value="89">AN&Aacute;LISIS DE MICROBIOLOG&Iacute;A</option>
  <option value="90">AN&Aacute;LISIS DE PLAGUICIDAS</option>
  <option value="91">BACTERIOLOG&Iacute;A</option>
  <option value="92">NEMATOLOG&Iacute;A</option>
  <option value="93">VIROLOG&Iacute;A</option>
  <option value="94">VERIFICACI&Oacute;N Y CERTIFICACI&Oacute;N DE PRODUCTOS REGULADOS</option>
  <option value="95">VERIFICACI&Oacute;N Y CERTIFICACI&Oacute;N DE EMPRESAS Y TRATAMIENTOS FITOSANITARIOS</option>
  <option value="98">DIAGN&Oacute;STICO</option>
  <option value="101">MERCANC&Iacute;AS REGULADAS</option>
  <option value="105">ESTABLECIMIENTOS, ELABORADORES Y COMERCIALIZADORES DE PRODUCTOS PARA USO O CONSUMO ANIMAL</option> 
  <option value="162">ESTUDIOS DE EFECTIVIDAD BIOLOGICA DE PLAGUICIDAS</option>
  <option value="163">BUENAS PRACTICAS PECUARIAS</option>
  <option value="164">PRODUCTOS ALIMENTICIOS</option>
  <option value="167">PRODUCTOS BIOL&Oacute;GICOS</option>
  <option value="168">PRODUCTOS QU&Iacute;MICO-FARMACE&Uacute;TICO</option>
  <option value="170">SANIDAD ACU&Iacute;COLA</option>
  <option value="171">SALUD ANIMAL</option>
  <option value="189">ACARICIDAS</option>
  <option value="192">FUNGICIDAS</option>
  <option value="199">RESIDUOS T&Oacute;XICOS Y CONTAMINANTES</option>
  </select>
</th>

 <th>
 <div >
	    <input type="text" name="date" class="tcal" style="width:70px"/>
		</div>
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