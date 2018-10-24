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
			if (isset($_POST["busqueda"])) {
										$busqueda = $_REQUEST["busqueda"];
										$primary = $_REQUEST["primary"];										
		?>
		
		<div id="padre">
		l
		<?PHP
			include("conexion.php");
			switch ($primary) {
				case '0':
					echo "i es igual a DGIAAP";
					
					break;

			    case '1':
					if($busqueda==!'' & $primary=='')
					{
						$sql = mysqli_query($conexion, "SELECT * FROM personas_fisicas
								WHERE nombre LIKE '%".$busqueda."%' 
								OR estado LIKE '%".$busqueda."%'
								OR area LIKE '%".$busqueda."%'
								OR giro LIKE '%".$busqueda."%'	");							
						$número_filas = mysqli_num_rows($sql);
						if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}						
					}
		?>
		<div id="centro">
		<?php
					while($row=mysql_fetch_array($sql)){
						$idpf = $resultados['idpf'];
						$nombre = $resultados['nombre'];
						$estado = $resultados['estado'];
						$correoe = $resultados['correoe'];
						$giro = $resultados['giro'];
						$relacion = $resultados['relacion'];
						$area = $resultados['area'];
		?>

			<table width="1150" height="225" border="0">
				<tr>
					<th width="54" rowspan="9"><img width="40" src="img/log.png" aling></th>
					<th width="1038"><div align="left">NOMBRE: <font color='#2e86c1'><?php echo $nombre;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">ESTADO: <font color='#2e86c1'><?php echo $estado;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">CORREO: <font color='#2e86c1'><?PHP echo $correoe;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">GIRO: <font color='#2e86c1'><?PHP echo $giro;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">RELACION:<font color='#2e86c1'><?PHP echo $relacion;?></font></div></th>
				</tr>
				<tr>
				   <th><div align="left">AREA:<font color='#2e86c1'> <?PHP echo $area;?></font></div></th>
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
					
					case '2':
					if($busqueda==!'' & $primary=='')
					{
						$sql = mysqli_query($conexion, "SELECT * FROM personas_morales
								WHERE nombre LIKE '%".$busqueda."%' 
								OR estado LIKE '%".$busqueda."%'
								OR area LIKE '%".$busqueda."%'
								OR giro LIKE '%".$busqueda."%'	");							
						$número_filas = mysqli_num_rows($sql);
						if($número_filas=='0'){echo "<br><center>".$número_filas." RESULTADOS ENCONTRADOS</center>";}						
					}
		?>
		<div id="centro">
		<?php
					while($row=mysql_fetch_array($sql)){
						$idpf = $resultados['idpf'];
						$nombre = $resultados['nombre'];
						$estado = $resultados['estado'];
						$correoe = $resultados['correoe'];
						$giro = $resultados['giro'];
						$relacion = $resultados['relacion'];
						$area = $resultados['area'];
		?>

			<table width="1150" height="225" border="0">
				<tr>
					<th width="54" rowspan="9"><img width="40" src="img/log.png" aling></th>
					<th width="1038"><div align="left">NOMBRE: <font color='#2e86c1'><?php echo $nombre;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">ESTADO: <font color='#2e86c1'><?php echo $estado;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">CORREO: <font color='#2e86c1'><?PHP echo $correoe;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">GIRO: <font color='#2e86c1'><?PHP echo $giro;?></font></div></th>
				</tr>
				<tr>
					<th><div align="left">RELACION:<font color='#2e86c1'><?PHP echo $relacion;?></font></div></th>
				</tr>
				<tr>
				   <th><div align="left">AREA:<font color='#2e86c1'> <?PHP echo $area;?></font></div></th>
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
		?>
	</div>
	<?php
	}
	?>

</div>
<?PHP
}//IF


?>
</body>
</html>