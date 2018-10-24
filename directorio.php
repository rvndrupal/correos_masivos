<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link rel="stylesheet" type="text/css" href="tcal.css" />
	<script type="text/javascript" src="tcal.js"></script>
	
 <script
	src="jquery.min.js">
</script>
<script>
var options = {
		"" : [""],
		DGIAAP : ["","ACUICOLA","AGRICOLA","INDUSTRIA PLAGUICIDAS","ORGANIZACIONES AGRICOLAS","ORGANIZACIONES PEC_AC","PECUARIO","PROCESADORES","SISTEMA PRODUCTO","UNIVERSIDADES"],
		DGSAF : ["","Comercializadora De Harina","Comercializadora De Harinas","Comercializadora De Sebo","Comercializadora De Visceras","Planta De Rendimiento","Productora","Comercializadora"],
		DGSAM : ["","Comercializadora De Grasas","Comercializadora De Harina","Comercializadora De Harinas","Comercializadora De Harina Y Grasas","Comercializadora De Harinas Y Grasas","Comercializadora De Sebo","Comercializadora De Visceras","Establecimiento","Organismo De Certificación","Organización","Planta De Rendimiento","Unidad De Verificación"],
		DGSVF : ["","Profesional Fitosanitario Autorizado"]
}

$(function(){
	var fillSecondary = function(){
		var selected = $('#primary').val();
		$('#secondary').empty();
		options[selected].forEach(function(element,index){
			$('#secondary').append('<option value="'+element+'">'+element+'</option>');
		});
	}
	$('#primary').change(fillSecondary);
	fillSecondary();
});
</script>

<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>DIRECTORIO UPV</title>
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
 select:required:invalid {
  color: gray;
}
option[value=""][disabled] {
  display: none;
}
option {
  color: black;
}
</style>
<!-- Libreria jQuery -->
		<script type='text/javascript' src="//ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
		<!-- Acción sobre el botó con id=boton y actualizamos el div con id=capa -->
		<script type="text/javascript">
			$(document).ready(function() {
				$("#imageField").click(function(event) {
					$("#res").load('comi_res.php #contenido');
				});
			});
		</script>


<body>
<center>
  <div id="inicio">
	<?php include("men1.php");?>
  </div>
  
<form name="usuario" method="post" action="comi_res.php" target="mainFrame" id="usuario" ><!--enctype="multipart/form-data" -->
	
  <p>&nbsp;</p>
  <table width="307" height="122" border="0">
    <!--<tr>
      <th height="43" colspan="2" scope="col"><div align="left"><img src="img/DPF.png" target = iframe_a width="263" height="56" /></div></th>
      <tr>-->
      <th width="238" height="40" scope="col"><div align="right">
        <input name="nombre" class="input"  type="text" value="" size="40"  placeholder="Buscar una palabra o nombre en SENASICA"/>   <!--required="required" -->    
      </div></th>
      <th width="103" height="40" scope="col"><h1 align="left">
        <input type="image" name="imageField" src="img/Boton.png" height="50" width="50" /></h1></th>
    </tr>
	</table>
	
	<table>
	<tr>
	<th><font color="#990000">*</font>Area</th>
	<th>Giro</th>
	<th><!--<font color="#990000">*</font>Regimen--></th>
	<th>Estado</th>
	</tr>
	<tr>
	<th>
	<select required name="area" id="primary" >
	<option value="" disabled selected>Obligatorio</option>
	<option value="DGIAAP">DGIAAP</option>
	<option value="DGSVF">DGSV PER FISICA</option>
	<option value="DGSAF">DGSA PER FISICA</option>
	<option value="DGSAM">DGSA PER MORAL</option>
	</select>
	</th>
	<th>
	<select name="giro" id="secondary">
	<!--<option value="">TODO</option>
	<option value="Industria Plaguicidas">Industria Plaguicidas</option>
	<option value="Organizaciones Agricolas">Organizaciones Agricolas</option>
	<option value="Organizaciones Pec_Ac">Organizaciones Pec_Ac</option>
	<option value="Sistema Producto">Sistema Producto</option>
	<option value="Procesadores">Procesadores</option>
	<option value="Universidades">Universidades</option>
	<option value="AGRICOLA">AGRICOLA</option>
	<option value="PECUARIO">PECUARIO</option>
	<option value="ACUICOLA">ACUICOLA</option>-->
	</select>
	</th>
	<th>
	<!--<select required name="regimen" id="regimen">
	<option value="" disabled selected>Obligatorio</option>
	<option value="PERSONA FISICA">PERSONA FISICA</option>
	<option value="PERSONA MORAL">PERSONA MORAL</option>
	</select>-->
	</th>
	<th>
	<select name="estado" id="estado">
	<option value="">TODO</option>
	<option value="AGUASCALIENTES">AGUASCALIENTES</option>
	<option value="BAJA CALIFORNIA">BAJA CALIFORNIA</option>
	<option value="BAJA CALIFORNIA SUR">BAJA CALIFORNIA SUR</option>
	<option value="CAMPECHE">CAMPECHE</option>
	<option value="CHIAPAS">CHIAPAS</option>
	<option value="CHIHUAHUA">CHIHUAHUA</option>
	<option value="CIUDAD DE MEXICO">CIUDAD DE MEXICO</option>
	<option value="COAHUILA">COAHUILA</option>
	<option value="COLIMA">COLIMA</option>
	<option value="DURANGO">DURANGO</option>
	<option value="GUANAJUATO">GUANAJUATO</option>
	<option value="GUERRERO">GUERRERO</option>
	<option value="HIDALGO">HIDALGO</option>
	<option value="JALISCO">JALISCO</option>
	<option value="MEXICO">MEXICO</option>
	<option value="MICHOACAN">MICHOACAN</option>
	<option value="MORELOS">MORELOS</option>
	<option value="NAYARIT">NAYARIT</option>
	<option value="NUEVO LEON">NUEVO LEON</option>
	<option value="OAXACA">OAXACA</option>
	<option value="PUEBLA">PUEBLA</option>
	<option value="QUERETARO">QUERETARO</option>
	<option value="QUINTANA ROO">QUINTANA ROO</option>
	<option value="SAN LUIS POTOSI">SAN LUIS POTOSI</option>
	<option value="SINALOA">SINALOA</option>
	<option value="SONORA">SONORA</option>
	<option value="TABASCO">TABASCO</option>
	<option value="TAMAULIPAS">TAMAULIPAS</option>
	<option value="TLAXCALA">TLAXCALA</option>
	<option value="VERACRUZ">VERACRUZ</option>
	<option value="YUCATAN">YUCATAN</option>
	<option value="ZACATECAS">ZACATECAS</option>
	</select>
	</th>
	</tr>
	</table>
</form>
<!--<div id ="esc1"><img src="img/SENASICA.jpg" width="212" height="77" /></div> 
<div id ="esc"><img src="img/sagarpa.png" width="212" height="77" /></div>-->

<div id="res"  height="150px">
<iframe src="comi_res.php" name="mainFrame" height="700px" width="100%" frameborder="0">
</iframe>
</div>
</center>
</body>
</html>