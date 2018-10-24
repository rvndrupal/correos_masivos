<!doctype html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="tcal.css" />

		<!--<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> -->
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

		<title>Busquedas Directorio UPV</title>
		
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
		
		

		
		<!-- <script src="js/jquery-1.9.1.min.js"></script> -->
		<script src="jquery.min.js"></script>
		
		<script>
		
			$(document).ready(function() {
										$("#resultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro o Área.</p>');										
										});
			
			function buscar() 
			{
				var textoBusqueda = $("input#busqueda").val();
				var tipoPersona = $("select#area").val();
				
				if (tipoPersona != "")
				{
					if (textoBusqueda != "") 
					{
						$.post("buscar.php", {valorB: textoBusqueda, tipoP: tipoPersona}, function(mensaje) 
																				{
																					$("#resultadoBusqueda").html(mensaje);																			
																				}); 
					} 
					else 
					{ 
						$("#resultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro o Área.</p>');
					};
				};
			};
			
			function enviaCorreo()
			{
				var mensajeCorreo = $("textarea#mensajeCorreo").val();
				//var listaCorreos = $("input#personad").val();
				var listaCorreos = crearCadenaCorreos();

				
				if (mensajeCorreo != "") 
				{
					$.post("enviar.php", {mensajeC: mensajeCorreo, listaEmail: listaCorreos}, function(mensaje) 
																		{
																			$("#resultadoBusqueda").html(mensaje);																			
																		}); 
				} 
				else 
				{ 
					$("#espacioCorreo").html('<p>MENSAJE VACIO</p>');
				};
			};
			
			
			
			function seleccionarTodo()
			{
				if (document.getElementById('persona').checked == true)
				{
					for (i=0;i<document.directorioUPV.elements.length;i++)
						if(document.directorioUPV.elements[i].type == "checkbox")
							document.directorioUPV.elements[i].checked=1;
				}
				else
				{
					for (i=0;i<document.directorioUPV.elements.length;i++)
						if(document.directorioUPV.elements[i].type == "checkbox")
							document.directorioUPV.elements[i].checked=0;
				}
			};
			
			function desmarcar()
			{
				if (document.getElementById('persona').checked == true)
				{
					document.getElementById('persona').checked = false;
				}				
			};
			
			
			function crearCadenaCorreos()
			{
				//alert('Entra en función de cadena de correos');
				var selected = '';
				
				$('#formid input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected += $(this).val()+';';
																						}
																	}); 

																	if (selected != '')
																	{
																		//alert('Has seleccionado: '+selected);
																		return selected;
																	}
																	else
																		alert('Seleccione al menos un registro.');
																return false;
																	        
			};

			function mostrarBusqueda()
			{
				document.getElementById('espacioBuscador').style.display = 'block';
				document.getElementById('busqueda').value = "";
				buscar();
			};
			
			function segundaBusqueda()
			{
				alert('Segunda busqueda');
				var textoBusqueda = $("input#busqueda").val();
				var tipoPersona = $("select#area").val();
				
				if (textoBusqueda != "") 
				{
					$.post("comi_res.php", {busqueda: textoBusqueda, primary: tipoPersona}, function(mensaje) 
																		{
																			$("#mainFrame").html(mensaje);																			
																		}); 
				} 
				else 
				{ 
					$("#mainFrame").html('<p>Los datos ingresados no regresaron ninguna coincidencia.</p>');
				};
			};
			

			
		</script>
		
		
	</head>

	<body>
		<center>
			<div id="inicio">
				<?php include("menu.php");?>
			</div>
			
			<br>


			<form id="formid" name="directorioUPV" accept-charset="utf-8" method="POST">
				
				<table >
					<th><input type="image" name="imageField" src="img/SENASICA.jpg" height="126" width="326" /></h1></th>
					<th width="600" height="40" scope="col"><h1 align = "center"> Buscar en el Directorio </h1></th>
					<th><input type="image" name="imageField" src="img/sagarpa.png" height="126" width="326" /></h1></th>
				</table>
				
				<br>
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
				
				<div id="espacioBuscador" style ="display:none" >
					<br>
					<table width="307" height="60" border="0">
						<th width="238" height="40" scope="col">
							<div align="right">
								<input type="text" name="busqueda" id="busqueda" value="" placeholder="Buscar una palabra o nombre en SENASICA" maxlength="40" autocomplete="off" onKeyUp="buscar();" class="input" size="40" />
							</div></th>
						<th width="103" height="40" scope="col"><h1 align="left">
							<input type="image" src="img/Boton.png" height="50" width="50" onClick="segundaBusqueda();"/></h1></th>
					</table>
					
					<div id="resultadoBusqueda" align ="center" ></div>			
					
				</div>
			
				<div id="espacioCorreo" align = "center"></div>
				
			</form>

			<div id="res"  height="150px">
				<iframe src="comi_res.php" name="mainFrame" height="700px" width="100%" frameborder="0"></iframe>
			</div>
		</center>
	</body>
</html>