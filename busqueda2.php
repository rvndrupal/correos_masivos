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

		</style>
		
		<!-- <script src="jquery.min.js"></script> -->
		
		<link rel="stylesheet" href="js/datatable.css">
		<script src="js/jquery-3.1.1.min.js"></script>
		<script src="js/jquery.dataTables.min.js"></script>
		<script src="js/buscador.js"></script>


		<!-- Funciones -->
		<script>
			//Función de inicio. 
			$(document).ready(function() {
										$("#resultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro o Área.</p>');
										//document.getElementById('area').select = "3";
										});
			
			//Función para buscar registros
			function buscar() 
			{
				var textoBusqueda = $("input#busqueda").val();
				var tipoPersona = $("select#area").val();
				
				if (tipoPersona != "")
				{
					if (textoBusqueda != "") 
					{
						if (textoBusqueda.length > 2)
						{
							$.post("buscar.php", {valorB: textoBusqueda, tipoP: tipoPersona}, function(mensaje) 
																				{
																					$("#resultadoBusqueda").html(mensaje);																			
																				});
						}
						else
						{
							$("#resultadoBusqueda").html('<p>Ingrese al menos tres letras o dos palabras.</p>');
						}
					}
					else 
					{ 
						$("#resultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro o Área.</p>');
					};
				};
			};
			
			//Función que envía correo a registros seleccionados.
			function enviaCorreo()
			{
				var mensajeCorreo = $("textarea#mensajeCorreo").val();
				var listaCorreos = crearCadenaCorreos();
				
				if (listaCorreos != "")
				{
					if (mensajeCorreo != "")
					{
						$.post("enviar.php", {mensajeC: mensajeCorreo, listaEmail: listaCorreos}, function(mensaje) 
																			{
																				$("#resultadoBusqueda").html(mensaje);																			
																			}); 
					}	 
					else 
					{
						alert('No se puede enviar un  mensaje vacío. Favor de escribir algún mensaje para enviar');
						document.getElementById("mensajeCorreo").focus(); 
						//$("#espacioCorreo").html('<p>MENSAJE VACIO</p>');
					};
				}
				else
				{
					alert('Seleccione al menos un registro para envío de correo.');
					document.getElementById("resultadoBusqueda").focus(); 
				};	
			};
			
			//Función para marcar/desmarcar todas las checkbox del documento.
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
			
			//Función para desmarcar el checkbox de "Seleccionar todos", cada vez que se desmarque alguno de los registros.
			function desmarcar()
			{
				if (document.getElementById('persona').checked == true)
				{
					document.getElementById('persona').checked = false;
				}				
			};
			
			//Función que concatena todos los correos seleccionados para enviarlos como una única cadena.
			function crearCadenaCorreos()
			{
				var selected = '';
				
				$('#formid input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected += $(this).val()+';';
																						}
																	}); 
				return selected;				
			};

			//Función que mostrará el div de búsqueda, cada vez que se seleccione el tipo de persona.
			function mostrarBusqueda()
			{
				document.getElementById('espacioBuscador').style.display = 'block';
				document.getElementById('busqueda').value = "";
				buscar();
			};
			
			//Esta función ya no se va a utilizar.
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
					<!-- <th width="600" height="40"><input type="image" name="imageField" src="img/logo.png" height="126" width="326" /></h1></th> -->
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
							<input type="image" src="img/Boton.png" height="50" width="50" /></h1></th>
					</table>
					
									
				</div>
			
				<div id="espacioCorreo" align = "center"></div>
				
				<div id="resultadoBusqueda" align ="center" >
				
					<?php
						$conexion=mysqli_connect("localhost","root","","directorio_upv") or die("Problemas con la conexión");
						$registros=mysqli_query($conexion,"select * from personas_fisicas") or die("Problemas en el select:".mysqli_error($conexion));				 
					?>

					<table id="buscar" class="display compact" cellspacing="0" width="80%">
						<thead>
							<tr>
								<th></th>
								<th>NOMBRE</th>
								<th>ESTADO</th>
								<th>CORREOE</th>
								<th>GIRO</th>
								<th>RELACIÓN</th>
								<th>ÁREA</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th>NOMBRE</th>
								<th>ESTADO</th>
								<th>CORREOE</th>
								<th>GIRO</th>
								<th>RELACIÓN</th>
								<th>ÁREA</th>
							</tr>
						</tfoot>
						<tbody>    
						<?php while ($reg=mysqli_fetch_array($registros))
								{ ?>       
							<tr>
								<td></td>
								<td><?php echo $reg['nombre']; ?></td>
								<td><?php echo $reg['estado']; ?></td>
								<td><?php echo $reg['correoe']; ?></td>
								<td><?php echo $reg['giro']; ?></td>
								<td><?php echo $reg['relacion']; ?></td>
								<td><?php echo $reg['area']; ?></td>
							</tr> 
						<?php } ?>
						</tbody>
					</table>
			
				
				</div>		
				
				
				<div id="resultad" align ="center" >
				
					<?php
						$conexion=mysqli_connect("localhost","root","","directorio_upv") or die("Problemas con la conexión");
						$registros=mysqli_query($conexion,"select * from personas_fisicas") or die("Problemas en el select:".mysqli_error($conexion));				 
					?>

					<table id="buscar" class="display compact" cellspacing="0" width="80%">
						<thead>
							<tr>
								<th></th>
								<th>NOMBRE</th>
								<th>ESTADO</th>
								<th>CORREOE</th>
								<th>GIRO</th>
								<th>RELACIÓN</th>
								<th>ÁREA</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th></th>
								<th>NOMBRE</th>
								<th>ESTADO</th>
								<th>CORREOE</th>
								<th>GIRO</th>
								<th>RELACIÓN</th>
								<th>ÁREA</th>
							</tr>
						</tfoot>
						<tbody>    
						<?php while ($reg=mysqli_fetch_array($registros))
								{ ?>       
							<tr>
								<td></td>
								<td><?php echo $reg['nombre']; ?></td>
								<td><?php echo $reg['estado']; ?></td>
								<td><?php echo $reg['correoe']; ?></td>
								<td><?php echo $reg['giro']; ?></td>
								<td><?php echo $reg['relacion']; ?></td>
								<td><?php echo $reg['area']; ?></td>
							</tr> 
						<?php } ?>
						</tbody>
					</table>
			
				
				</div>		
			</form>
			
	

			<div id="imagen"  height="150px" align "center">
				<iframe src="img\fon.png" name="mainFrame" height="700px" width="100%" frameborder="0" align "center"></iframe>
			</div>
			<div id="res"  height="150px">
				<iframe src="comi_res.php" name="mainFrame" height="700px" width="100%" frameborder="0"></iframe>
			</div>
			
		</center>
	</body>
</html>