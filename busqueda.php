<?php
      
     session_start();

     if(isset($_SESSION['usuario']) and $_SESSION['rol']=="admin"){
         
        //header("Location: panel.php");
         
     }else if(isset($_SESSION['usuario']) and $_SESSION['rol']=="user"){
       // header("Location: busqueda.php");
     }
     
     else{
         header("Location: index.php");
     }

?>

<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Búsquedas Directorio UPV</title>
		
		<script src="jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" ></script>				
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<script src="js/funciones.js"></script>
		
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
	</head>

	<body>
		<center>
			<div id="inicio"> <?php include("menu.php");?> </div>
			
			<br>
			<div id="formularioPrincipal">
			
				<form id="formid" name="directorioUPV" accept-charset="utf-8" method="POST" action = "correo.php">
					
					<div id="formTitulos">
						<table >
							<!--<th><input type="image" name="imageField" src="img/sagarpa.png" height="126" width="326" /></h1></th>-->
							<th><img src="img/sagarpa.png" height="126" width="326" /></th>
							<th width="600" height="40" scope="col"><h1 align = "center"> Buscar en el Directorio </h1></th>
							<!-- <th width="600" height="40"><input type="image" name="imageField" src="img/logo.png" height="126" width="326" /></h1></th> -->
							<!--<th><input type="image" name="imageField" src="img/SENASICA.jpg" height="126" width="326" /></h1></th>-->
							<th><img src="img/SENASICA.jpg" height="126" width="326" /></th>
						</table>
					</div>
					
					<br><br>
					
					<div id="formTipoPersona">
						<table>
							<tr>
								<th><font color="#990000">*</font>Tipo de Persona: </th>	
								<th>&nbsp;</th>
								<th>
									<select required name="tipoPersona" id="tipoPersona" onChange="mostrarBusqueda();" >
										<option value="" disabled selected>Seleccione tipo de persona</option>
										<option value="1">PERSONAS FÍSICAS</option>
										<option value="2">PERSONAS MORALES</option>
										<option value="3">PERSONAS FÍSICAS Y MORALES</option>
									</select>									
								</th>
								<th>&nbsp;&nbsp;&nbsp;</th>
								<th>
									<div id="cambioBusqueda" style ="display:none">
										<input id="btnCambioBusqueda" name="btnCambioBusqueda" type="button" value="Búsqueda Avanzada" onClick="cambioBusqueda();" style='width:100px; height:70px; white-space:normal'/> 
										<input id="btnRegresaBusqueda" name="btnRegresaBusqueda"type="button" value="Búsqueda Normal" onClick="regresaBusqueda();" style ="display:none; width:100px; height:70px; white-space:normal" />
									</div>
								</th>
							</tr>
						</table>
					</div>									
					
					<div id="formEspacioBuscador" style ="display:none" >
						<div id="buscaPersonas">
							<br>
							<table width="307" height="60" border="0">
								<th width="238" height="40" scope="col">
									<div align="right">
										<input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar una palabra o nombre en SENASICA" maxlength="40" autocomplete="off" onKeyUp="buscar();" class="input" size="40" />
									</div></th>
								<th width="103" height="40" scope="col"><h1 align="left">
									<!--<input type="image" src="img/Boton.png" height="50" width="50" onclick="none";/></h1></th>-->
									<th><img src="img/Boton.png" height="50" width="50" /></th>
							</table>
						</div>
						
						<div id="buscaFiltros" style ="display:none" >						
							<div id="formFiltrosBusqueda" align ="center" height="150px"></div>
							<div id="formFiltrosBusqueda2" align ="center" height="150px"></div>
							<div id="formFiltrosBusqueda3" align ="center" height="150px"></div>						
						</div>
					</div>
					
					<div id="formEspacioCorreo" align = "center"></div>
					
					<div id="formAdjuntos" ></div>
					
					<div id="formResultadoBusqueda" align ="center" height="150px"></div>
					
					<input type=hidden name=var_correos>					
				</form>
			</div>

			<div id="res"  height="150px">
				<iframe src="comi_res.php" name="mainFrame" height="700px" width="100%" frameborder="0"></iframe>
			</div>
			<input type="hidden" id="tipoBusqueda" name="tipoBusqueda" value="0">
			<input type="hidden" id="segundoFiltro" name="segundoFiltro" value="">
			<input type="hidden" id="tercerFiltro" name="tercerFiltro" value="">
			<input type="hidden" id="cuartoFiltro" name="cuartoFiltro" value="">
			
		</center>
	</body>
</html>