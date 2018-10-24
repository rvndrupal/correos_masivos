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


<?php
//include("menu.php");
	$v1 = isset($_POST['var_correos']) ? $_POST['var_correos'] : null;
	
	$primerCaracter = substr($v1, 0, 1);
	
	if ( $primerCaracter === ';')
	{
		$v1 = substr($v1, 1);	
	}

	echo '
	<!doctype html>
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

			<title>Envio de Correo Personas Seleccionadas</title>
			
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
				<div id="inicio"> <?php include("menu.php");?> </div>
				
				<br>
				
				<div id="formularioEnvio">				
					<form id="formEnvio" name="formEnvio" accept-charset="utf-8" method="POST" action="cargaEnvio.php" enctype="multipart/form-data">						
						<div id="formTitulos">
							<table >
								<th><input type="image" name="imageField" src="img/sagarpa.png" height="126" width="326" /></h1></th>
								<th width="600" height="40" scope="col"><h1 align = "center"> Envía Mensaje a Directorio </h1></th>
								<th><input type="image" name="imageField" src="img/SENASICA.jpg" height="126" width="326" /></h1></th>
							</table>
						</div>
						
						<br>
						<!-- <label>Destinatarios: </label> <input type="text" id="destinatarios" name="destinatarios" value="'.$v1.'" style=\'height:"200" width:"40"\'> -->
						<label>Destinatarios: </label><br><textarea id="destinatarios" name="destinatarios" value="'.$v1.'" rows="4" cols="100" >'.$v1.'</textarea>
						
						<br><br>
						<p>TÍTULO DEL MENSAJE</p>
						<input type="text" name="tituloCorreo" id="tituloCorreo" value="" placeholder="Escriba el título del mensaje." maxlength="150" autocomplete="off" size="50" />
					
						
						<br><br>
						<p>MENSAJE A ENVIAR</p>
						<textarea name="mensajeCorreo" id="mensajeCorreo" rows="10" cols="50" placeholder="Escriba el mensaje que desea enviar."></textarea>
					
						<br><br>			
						<div class="form-group" >
							<center>
							<!--<label class="col-sm-2 control-label" align="center">Archivos adjuntos</label>
							<div class="col-sm-4">
								<input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="" align ="center">
							</div> -->
								<table>
									<tr>
										<td><label >Archivos adjuntos </label></td>
										<td><input type="file" class="form-control" id="archivo[]" name="archivo[]" multiple="" align ="center"></td>
									</tr>
								</table>	
							</center>
						</div>
						
						<!-- <BR><br><button type="button" class="btn btn-primary" onClick= "validarEnvio(\''.$v1.'\');" >ENVIAR</button> -->
						<BR><br><button type="button" class="btn btn-primary" onClick= "validarEnvio();" >ENVIAR</button>

						<input type=hidden name=var_correos>
					</form>
				</div>
			</center>
		</body>
	</html>';
?>