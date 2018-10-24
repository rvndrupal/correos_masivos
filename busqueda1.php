<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Búsquedas Directorio UPV</title>
		
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
			body {
			padding-top: 20px;
			padding-bottom: 20px;
			}

		</style>
		
		<script src="jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>				
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="js/funciones.js"></script>

	</head>

	<body>
		<center>
			<div id="inicio">
				<?php include("menu.php");?>
			</div>
			
			<br>
			<div id="formularioPrincipal">
			
				<form id="formid" name="directorioUPV" accept-charset="utf-8" method="POST">
					
					<div id="formTitulos">
						<table >
							<th><input type="image" name="imageField" src="img/SENASICA.jpg" height="126" width="326" /></h1></th>
							<th width="600" height="40" scope="col"><h1 align = "center"> Buscar en el Directorio </h1></th>
							<!-- <th width="600" height="40"><input type="image" name="imageField" src="img/logo.png" height="126" width="326" /></h1></th> -->
							<th><input type="image" name="imageField" src="img/sagarpa.png" height="126" width="326" /></h1></th>
						</table>
					</div>
					
					<br>
					
					<div id="formTipoPersona">
						<table>
							<tr>
								<th><font color="#990000">*</font>Tipo de Persona:</th>			
							</tr>
							<tr>
								<th>
									<select required name="area" id="area" onChange="mostrarBusqueda();" >
										<option value="" disabled selected>Seleccione tipo de persona</option>
										<option value="1">PERSONAS FÍSICAS</option>
										<option value="2">PERSONAS MORALES</option>
										<option value="3">PERSONAS FÍSICAS Y MORALES</option>
									</select>
								</th>
							</tr>
						</table>
					</div>
					
					<div id="formEspacioBuscador" style ="display:none" >
						<br>
						<table width="307" height="60" border="0">
							<th width="238" height="40" scope="col">
								<div align="right">
									<input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar una palabra o nombre en SENASICA" maxlength="40" autocomplete="off" onKeyUp="buscar();" class="input" size="40" />
								</div></th>
							<th width="103" height="40" scope="col"><h1 align="left">
								<input type="image" src="img/Boton.png" height="50" width="50" onclick="none";/></h1></th>
						</table>
					</div>
				
					<div id="formEspacioCorreo" align = "center"></div>
					<div id="formAdjuntos" ></div>
					
					<div id="formResultadoBusqueda" align ="center" height="150px"></div>						
				</form>
			</div>

			<div id="res"  height="150px">
				<iframe src="comi_res.php" name="mainFrame" height="700px" width="100%" frameborder="0"></iframe>
			</div>
		</center>
	</body>
</html>