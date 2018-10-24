<!doctype html>
<html>
	<head>
		<meta http-equiv="Content-type" content="text/html; charset=utf-8" /> 
		<title>Busquedas Directorio UPV</title>
		
		<style>
			table, th, td {
				border: 1px solid black;
				border-collapse: collapse;
			}
			th, td {
				padding: 5px;
				text-align: left;
			}
			table#t01 {
				width: 100%;    
				background-color: #f1f1c1;
			}
		</style>

		
		<!-- <script src="js/jquery-1.9.1.min.js"></script> -->
		<script src="jquery.min.js"></script>
		
		<script>
		
			$(document).ready(function() {
										$("#resultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro o Área</p>');										
										});
			
			function buscar() 
			{
				var textoBusqueda = $("input#busqueda").val();
				
				if (textoBusqueda != "") 
				{
					$.post("buscar.php", {valorB: textoBusqueda}, function(mensaje) 
																		{
																			$("#resultadoBusqueda").html(mensaje);																			
																		}); 
				} 
				else 
				{ 
					$("#resultadoBusqueda").html('<p>Los datos ingresados no regresaron ninguna coincidencia.</p>');
				};
			};
			
			function enviaCorreo()
			{
				//crearCadenaCorreos();
				
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
			

			
		</script>
		
		
	</head>

	<body>

		<form id="formid" name="directorioUPV" accept-charset="utf-8" method="POST">
		<h1 align = "center"> Buscar en el Directorio </h1>
		<BR>
		<div align = "center" >
			<input type="text" name="busqueda" id="busqueda" value="" placeholder="" maxlength="30" autocomplete="off" onKeyUp="buscar();" />
		</div>
		<div id="espacioCorreo" align = "center"></div>
		<div id="resultadoBusqueda" align ="center" ></div>
		
		</form>

	</body>
</html>