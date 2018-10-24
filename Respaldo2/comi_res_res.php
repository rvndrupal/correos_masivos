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
				top: 51px;
				margin-top: -50px;
				left: 79px;
				width: 263px;
				height: 705px;
				overflow: auto;
			}
			#centro{
				/*background-color:#FF0000;*/
				position: absolute;
				top: 85px;
				margin-top: -50px;
				left: 383px;
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
										$nombre = $_REQUEST["nombre"];
										$area = $_REQUEST["area"];
										$giro = $_REQUEST["giro"];
										//$regimen = $_REQUEST["regimen"];
										$estado = $_REQUEST["estado"];

		?>
		
		<div id="padre">
		l
		<?PHP
			include("conexion.php");
			/*if($area==''){echo "<br><center><font color='#B40404'>Favor de Seleccionar una AREA</font></center>";}
			if($regimen==''){echo "<br><center><font color='#B40404'>Favor de Seleccionar un REGIMEN</font></center>";}
			else{ */
			switch ($area) {
				case 'DGIAAP':
					echo "i es igual a DGIAAP";
					
					break;

			    case 'DGSAF':

					if($area==!'' & $giro=='' &  $estado==''){
					$sql = mysql_query("SELECT * FROM dgsafisica WHERE NOMBRE LIKE '%".$nombre."%' OR GIRO LIKE '%".$nombre."%'",$conexion);
					$número_filas = mysql_num_rows($sql);
					if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
					}

					if($area==!'' & $giro==!'' &  $estado==''){
					$sql = mysql_query("SELECT * FROM dgsafisica WHERE GIRO = '".$giro."'",$conexion);
					$número_filas = mysql_num_rows($sql); 
					if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
					}

					if($area==!'' & $giro==!'' &  $estado==!''){
					$sql = mysql_query("SELECT * FROM dgsafisica WHERE GIRO = '".$giro."' AND ESTADO = '".$estado."'",$conexion);
					$número_filas = mysql_num_rows($sql); 
					if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
					}

					if($area==!'' & $giro=='' &  $estado==!''){
					$sql = mysql_query("SELECT * FROM dgsafisica WHERE ESTADO = '".$estado."'",$conexion);
					$número_filas = mysql_num_rows($sql); 
					if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
					}
		?>

		<div id="centro">
		
		<?php
					while($row=mysql_fetch_array($sql)){
						$id = $row['0'];
						$nom = $row[1]; 
						$nom2 = $row[2];
						$ap = $row[3];
						$am = $row[4];
						$regimen = $row[5];
						$estado = $row[6];
						$municipio =$row[7];
						$localidad = $row[8];
						$cp = $row[9];
						$correo = $row[10];
						$lada = $row[11];
						$ext = $row[12];
						$tel = $row[13];
						$giro = $row[14];
						$relacion = $row[15];
		?>

		<table width="1150" height="225" border="0">
			<tr>
				<th width="54" rowspan="9"><img width="40" src="img/log.png" aling></th>
				<th width="1038"><div align="left">NOMBRE: <font color='#2e86c1'><?php echo $nom." ".$nom2." ".$ap." ".$am;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">REGIMEN: <font color='#2e86c1'><?php echo $regimen;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">GIRO: <font color='#2e86c1'><?PHP echo $giro;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">TELEFONO: <font color='#2e86c1'><?PHP echo $tel;?></font> Ext.:<font color='#2e86c1'><?PHP echo $ext;?></div></th>
			</tr>
			<tr>
				<th><div align="left">CORREO ELECTRONICO:<font color='#2e86c1'> <a href="mailto:<?PHP echo $correo;?>"><?PHP echo $correo;?></a></font></div></th>
			</tr>
			<tr>
			   <th><div align="left">DOMICILIO:<font color='#2e86c1'> <?PHP echo $municipio." ".$localidad;?></font> C.P.:<font color='#2e86c1'> <?PHP echo $cp;?></font></div></th>
			</tr>
			<tr>
			   <th><div align="left">ESTADO: <font color='#2e86c1'><?PHP echo $estado;?></font></div></th>
			</tr>
			<tr>
			   <th><div align="left">RELACION: <font color='#2e86c1'><?PHP echo $relacion;?></font></div></th>
			</tr>
			<tr>
			   <th><center><hr width='75%'></center></th>
			</tr>
		</table>

		<?PHP
					}
		?>
	</div>
	<?php
	
					break;

				case 'DGSAM':
					$sql = mysql_query("SELECT * FROM dgsamoral WHERE  NOMBRE LIKE '%".$nombre."%'",$conexion);
					$número_filas = mysql_num_rows($sql);
					if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
	?>
	<div id="centro">
		<?php
				while($row=mysql_fetch_array($sql)){
					$id = $row['0'];
					$emp = $row['1'];
					$regimen = $row[2];
					$estado = $row[3];
					$municipio =$row[4];
					$localidad = $row[5];
					$cp = $row[6];
					$correo = $row[7];
					$lada = $row[8];
					$ext = $row[9];
					$tel = $row[10];
					$giro = $row[11];
					$nom = $row[12]; 
					$nom2 = $row[13];
					$ap = $row[14];
					$am = $row[15];
					$rel = $row[16];


					$relacion = $row[15];
		?>
		<table width="1150" height="225" border="0">
			<tr>
				<th width="54" rowspan="10"><img width="40" src="img/log.png" aling></th>
 
				<th width="1038"><div align="left">NOMBRE: <font color='#2e86c1'><?php echo $nom." ".$nom2." ".$ap." ".$am;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">EMPRESA:<font color='#2e86c1'><?PHP echo $emp;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">REGIMEN:<font color='#2e86c1'><?php echo $regimen;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">GIRO: <font color='#2e86c1'><?PHP echo $giro;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">TELEFONO: <font color='#2e86c1'><?PHP echo $tel;?></font> Ext.:<font color='#2e86c1'><?PHP echo $ext;?></div></th>
			</tr>
			<tr>
				<th><div align="left">CORREO ELECTRONICO:<font color='#2e86c1'> <?PHP echo $correo;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">DOMICILIO:<font color='#2e86c1'> <?PHP echo $municipio." ".$localidad;?></font> C.P.:<font color='#2e86c1'> <?PHP echo $cp;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">ESTADO: <font color='#2e86c1'><?PHP echo $estado;?></font></div></th>
			</tr>
			<tr>
				<th><div align="left">RELACION: <font color='#2e86c1'><?PHP echo $rel;?></font></div></th>
			</tr>
			<tr>
				<th><center><hr width='75%'></center></th>
			</tr>
		</table>
<?PHP
 }
?>
</div>
<?php
        break;

	case 'DGSVF':
	$sql = mysql_query("SELECT * FROM dgsvfisica WHERE  NOMBRE LIKE '%".$nombre."%'",$conexion);
$número_filas = mysql_num_rows($sql);
if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}
?>
<div id="centro">
<?php
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
?>
<table width="1150" height="225" border="0">
 <tr>
 <th width="54" rowspan="9"><img width="40" src="img/log.png" aling></th>
   <th width="1038"><div align="left">NOMBRE: <font color='#2e86c1'><?php echo $nom." ".$nom2." ".$ap." ".$am;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">REGIMEN: <font color='#2e86c1'><?php echo $regimen;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">GIRO: <font color='#2e86c1'><?PHP echo $giro;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">TELEFONO: <font color='#2e86c1'><?PHP echo $tel;?></font> Ext.:<font color='#2e86c1'><?PHP echo $ext;?></div></th>
   </tr>
 <tr>
   <th><div align="left">CORREO ELECTRONICO:<font color='#2e86c1'> <?PHP echo $correo;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">DOMICILIO:<font color='#2e86c1'> <?PHP echo $municipio." ".$localidad;?></font> C.P.:<font color='#2e86c1'> <?PHP echo $cp;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">ESTADO: <font color='#2e86c1'><?PHP echo $estado;?></font></div></th>
   </tr>
 <tr>
   <th><div align="left">RELACION: <font color='#2e86c1'><?PHP echo $relacion;?></font></div></th>
   </tr>
 <tr>
   <th><center><hr width='75%'></center></th>
   </tr>
</table>
<?PHP
 }
?>
</div>
<?php   
        break;
	case 'DGSVM':
        echo "i es igual a DGSV";
        break;
 /*}*/
 ?>
 </div>
 <?php
}
?>
<!--<div id="resultado">
</div>-->
</div>
<?PHP
}//IF


?>
</body>
</html>