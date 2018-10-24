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
					$("#res").load('comi_res.php #contenido');
				});
			});
		</script>


<body>
<center>
  <div id="inicio">
	<?php include("men1.php");?>
  </div>
  
<form name="usuario" method="post" action="comi_res1.php" target="mainFrame" id="usuario" ><!--enctype="multipart/form-data" -->
	
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
	<th>Giro</th>
	<th>Estado</th>
	</tr>
	<tr>
	<th>
	<select name="giro" id="giro">
	<option value="">TODO</option>
	<option value="Profesional Fitosanitario Autorizado">Profesional Fitosanitario Autorizado</option>
	</select>
	</th>
	<th>
	<select name="estado" id="estado">
	<option value="">TODO</option>
	<option value="Aguascalientes">Aguascalientes</option>
	<option value="Campeche">Campeche</option>
	<option value="Chiapas">Chiapas</option>
	<option value="Colima">Colima</option>
	<option value="Estado De México">Estado de M&eacute;xico</option>
	<option value="Guanajuato">Guanajuato</option>
	<option value="Guerrero">Guerrero</option>
	<option value="Hidalgo">Hidalgo</option>
	<option value="Jalisco">Jalisco</option>
	<option value="Michoacán">Michoac&aacute;n</option>
	<option value="Morelos">Morelos</option>
	<option value="Nayarit">Nayarit</option>
	<option value="Nuevo León">Nuevo Le&oacute;n</option>
	<option value="Oaxaca">Oaxaca</option>
	<option value="Puebla">Puebla</option>
	<option value="San Luís Potosí">San Lu&iacute;s Potos&iacute;</option>
	<option value="Sinaloa">Sinaloa</option>
	<option value="Tamaulipas">Tamaulipas</option>
	<option value="Veracruz">Veracruz</option>
	<option value="Zacatecas">Zacatecas</option>
	</select>
	</th>
	</tr>
	</table>
</form>
<div id="res"  height="150px">
<iframe src="comi_res1.php" name="mainFrame" height="700px" width="100%" frameborder="0">
</iframe>
</div>
</center>
</body>
</html>