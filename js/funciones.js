			//Función de inicio. 
			$(document).ready(function() {
										$("#resultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro o &Aacute;rea.</p>');
										//document.getElementById('tipoPersona').select = "";
										document.getElementById('tipoBusqueda').value = 0;
										});
			
			//Función que mostrará el div de búsqueda, cada vez que se seleccione el tipo de persona.
			//Busqueda normal.
			function mostrarBusqueda()
			{
				if (document.getElementById('tipoBusqueda').value == 0)
				{
					document.getElementById('formEspacioBuscador').style.display = 'block';
					document.getElementById('cambioBusqueda').style.display = 'block';
					document.getElementById('busqueda').value = "";
					buscar();
				}
				else
				{
					document.getElementById('formFiltrosBusqueda2').style.display = 'none';
					document.getElementById('formFiltrosBusqueda3').style.display = 'none';
					cambioBusqueda();
				}
			};

			//Función para buscar registros
			function buscar() 
			{
				var textoBusqueda = $("input#busqueda").val();
				var tipoPersona = $("select#tipoPersona").val();
				
				if (tipoPersona != "")
				{
					if (textoBusqueda != "") 
					{
						document.getElementById('cambioBusqueda').style.display = 'none';
				
						if (textoBusqueda.length > 2)
						{
							$.post("buscar.php", {valorB: textoBusqueda, tipoP: tipoPersona}, function(mensaje) 
																				{
																					$("#formResultadoBusqueda").html(mensaje);																			
																				});
						}
						else
						{
							$("#formResultadoBusqueda").html('<p>Ingrese al menos tres letras o dos palabras.</p>');
						}
					}
					else 
					{
						document.getElementById('cambioBusqueda').style.display = 'block';
						$("#formResultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro, Relaci&oacute;n o &Aacute;rea.</p>');
					};
				};
			};
			
			//Función que envía correo a registros seleccionados.
			function enviaCorreo()
			{
				var mensajeCorreo = $("textarea#mensajeCorreo").val();
				var listaCorreos = crearCadenaCorreos();
				
				elementosAdjuntos();
				
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
			
			//Función que envía elementos adjuntos.
			function elementosAdjuntos()
			{
				alert('Entra en envio');
				var archivoarr = $(document.getElementById("archivo"));
				
				for (i=0; i<archivoarr.length; i++)
				{
					alert(archivoarr[i].value());
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
				var selected = [];
				
				//$('#formid input[type=checkbox]').each(function(){
					$('#seleccionarCuentasCorreo input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected.push($(this).val()+';');
																						}
																	}); 
				return selected;	
				
			};
			
			//respaldo
			//Función que concatena todos los correos seleccionados para enviarlos como una única cadena.
			/*
			function crearCadenaCorreos()
			{
				var selected = '';
				
				//$('#formid input[type=checkbox]').each(function(){
					$('#seleccionarCuentasCorreo input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected += $(this).val()+';';
																						}
																	}); 
				return selected;	
				
			};*/
						
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
			
			//Guardar adjuntos en server  ********
			function guardaAdjunto()
			{
				$.post("guarda1.php", {}, function(mensaje) 
				{
					$("#formAdjuntos").html(mensaje);																			
				});
				
			};			
			
			function abreCorreo()
			{	
				var listaCorreos = crearCadenaCorreos();
				
				if (listaCorreos != "")
				{
					document.directorioUPV.var_correos.value=listaCorreos;
					document.directorioUPV.submit();
				}
				else
				{
					alert('Seleccione al menos un registro para envio de correo.');
					document.getElementById("persona").focus(); 
				};
			};
			
			function validarEnvio()
			{	
				var tituloCorreo = $("#tituloCorreo").val().trim();
				var mensajeCorreo = $("#mensajeCorreo").val().trim();
				var listaDestinatarios = $("#destinatarios").val().trim();
				
				if (listaDestinatarios != "")
					if (tituloCorreo != "")
					{						
						if (mensajeCorreo != "")
						{
							document.formEnvio.var_correos.value= listaDestinatarios;
							document.formEnvio.submit();
						}	 
						else 
						{
							alert('No se puede enviar un  mensaje vacio. Favor de escribir algun mensaje para enviar');
							document.getElementById("mensajeCorreo").focus();
						}
					}
					else
					{
						alert('No se ha ingresado un titulo para el mensaje. Favor de escribir un titulo.');
						document.getElementById("tituloCorreo").focus();
					}
				else
				{
					alert('No se ha seleccionado ningun destinatario. Favor de escribir alguna cuenta para que reciba el  mensaje.');
					document.getElementById("destinatarios").focus();
				}
			};
			
			function cambioBusqueda()
			{				
				var tipoPersona = $("select#tipoPersona").val();
				
				document.getElementById('buscaPersonas').style.display = 'none';
				document.getElementById('buscaFiltros').style.display = 'block';
				document.getElementById('btnCambioBusqueda').style.display = 'none';
				document.getElementById('btnRegresaBusqueda').style.display = 'block';
				document.getElementById('tipoBusqueda').value = 1;
			
				$.post("seleccionFiltros.php", {tipoP: tipoPersona}, function(mensaje) 
																				{
																					$("#formFiltrosBusqueda").html(mensaje);																			
																				});
				//$("#formResultadoBusqueda").html('<p>SELECCIONE LOS FILTROS QUE REQUIERE PARA SU B&Uacute;SQUEDA.</p>');
				$("#formResultadoBusqueda").html('<p>SELECCIONE EL PRIMER FILTRO DE B&Uacute;SQUEDA.</p>');
				
				/* Original
				var tipoPersona = $("select#tipoPersona").val();
				
				document.getElementById('buscaPersonas').style.display = 'none';
				document.getElementById('buscaFiltros').style.display = 'block';
				document.getElementById('btnCambioBusqueda').style.display = 'none';
				document.getElementById('btnRegresaBusqueda').style.display = 'block';
				document.getElementById('tipoBusqueda').value = 1;
				
				
				$.post("filtroBusqueda.php", {tipoP: tipoPersona}, function(mensaje) 
																				{
																					$("#formFiltrosBusqueda").html(mensaje);																			
																				});
				$("#formResultadoBusqueda").html('<p>SELECCIONE LOS FILTROS QUE REQUIERE PARA SU B&Uacute;SQUEDA.</p>');
				*/
			};
			
			function regresaBusqueda()
			{
				var tipoPersona = $("select#tipoPersona").val();
				
				document.getElementById('buscaPersonas').style.display = 'block';
				document.getElementById('buscaFiltros').style.display = 'none';			
				document.getElementById('btnCambioBusqueda').style.display = 'block';
				document.getElementById('btnRegresaBusqueda').style.display = 'none';
				document.getElementById('tipoBusqueda').value = 0;
				
				$.post("blank.php", {}, function(mensaje) 
																				{
																					$("#formFiltrosBusqueda").html(mensaje);																			
																				});
				$("#formResultadoBusqueda").html('<p>Ingrese Nombre, Estado, Giro, Relaci&oacute;n o &Aacute;rea.</p>');
			};
			
			
			//Función para buscar registros
			function buscarConFiltros() 
			{
				var tipoPersona = $("select#tipoPersona").val();
				
				var listaEstados = crearCadenaEstados();
				var listaRelaciones = crearCadenaRelaciones();
				var listaGiros = crearCadenaGiros();
				var listaAreas = crearCadenaAreas();
				
				if (tipoPersona != "")
				{
					$.post("buscarFiltros.php", {tipoP: tipoPersona, listaE: listaEstados, listaR: listaRelaciones, listaG: listaGiros, listaA: listaAreas}, function(mensaje) 
																			{
																				$("#formResultadoBusqueda").html(mensaje);																			
																			});
				}; 
			};
			
			//Función para desmarcar el checkbox Estado, cada vez que se desmarque alguno de los registros.
			function desmarcarEstado()
			{
				if (document.getElementById('estado').checked == true)
				{
					document.getElementById('estado').checked = false;
				}				
			};
			
			//Función para desmarcar el checkbox Giro, cada vez que se desmarque alguno de los registros.
			function desmarcarGiro()
			{
				if (document.getElementById('giro').checked == true)
				{
					document.getElementById('giro').checked = false;
				}				
			};
			
			//Función para desmarcar el checkbox Relacion, cada vez que se desmarque alguno de los registros.
			function desmarcarRelacion()
			{
				if (document.getElementById('relacion').checked == true)
				{
					document.getElementById('relacion').checked = false;
				}				
			};
			
			//Función para desmarcar el checkbox Area, cada vez que se desmarque alguno de los registros.
			function desmarcarArea()
			{	
				if (document.getElementById('area').checked == true)
				{
					document.getElementById('area').checked = false;
				}				
			};
			
			//Función que concatena todos los estados seleccionados para enviarlos como una única cadena.
			function crearCadenaEstados()
			{
				var selected = '';
				
				$('#tablaEstados input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected += $(this).val()+';';
																						}
																	}); 
				return selected;				
			};
			
			//Función que concatena todas las relaciones seleccionadas para enviarlas como una única cadena.
			function crearCadenaRelaciones()
			{
				var selected = '';
				
				$('#tablaRelaciones input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected += $(this).val()+';';
																						}
																	}); 
				return selected;				
			};

			//Función que concatena todos los giros seleccionados para enviarlos como una única cadena.
			function crearCadenaGiros()
			{
				var selected = '';
				
				$('#tablaGiros input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected += $(this).val()+';';
																						}
																	}); 
				return selected;				
			};

			//Función que concatena todas las áreas seleccionadas para enviarlas como una única cadena.
			function crearCadenaAreas()
			{
				var selected = '';
				
				$('#tablaAreas input[type=checkbox]').each(function(){
																	if (this.checked) {
																						selected += $(this).val()+';';
																						}
																	}); 
				return selected;				
			};


			//Función para marcar/desmarcar todas las checkbox de Estado.
			function seleccionarTodoEstado()
			{				
				if (document.getElementById('estado').checked == true)
				{
					$('#tablaEstados input[type=checkbox]').each(function(){
																	if (this.checked) {}
																	else
																	{
																		this.checked = true;
																	}
																	}); 
				}
				else
				{
					$('#tablaEstados input[type=checkbox]').each(function(){
																	if (this.checked) {
																		this.checked = false;
																	};																	
																	}); 
				};

				buscarConFiltros();
			};
			
			//Función para marcar/desmarcar todas las checkbox de Relación.
			function seleccionarTodoRelacion()
			{
				
				if (document.getElementById('relacion').checked == true)
				{
					$('#tablaRelaciones input[type=checkbox]').each(function(){
																	if (this.checked) {}
																	else
																	{
																		this.checked = true;
																	}
																	}); 
				}
				else
				{
					$('#tablaRelaciones input[type=checkbox]').each(function(){
																	if (this.checked) {
																		this.checked = false;
																	};																	
																	}); 
				};
				
				buscarConFiltros();
			};
			
			//Función para marcar/desmarcar todas las checkbox de Giro.
			function seleccionarTodoGiro()
			{
				
				if (document.getElementById('giro').checked == true)
				{
					$('#tablaGiros input[type=checkbox]').each(function(){
																	if (this.checked) {}
																	else
																	{
																		this.checked = true;
																	}
																	}); 
				}
				else
				{
					$('#tablaGiros input[type=checkbox]').each(function(){
																	if (this.checked) {
																		this.checked = false;
																	};																	
																	}); 
				};
				
				buscarConFiltros();
			};
			
			//Función para marcar/desmarcar todas las checkbox de Área.
			function seleccionarTodoArea()
			{
				
				if (document.getElementById('area').checked == true)
				{
					$('#tablaAreas input[type=checkbox]').each(function(){
																	if (this.checked) {}
																	else
																	{
																		this.checked = true;
																	}
																	}); 
				}
				else
				{
					$('#tablaAreas input[type=checkbox]').each(function(){
																	if (this.checked) {
																		this.checked = false;
																	};																	
																	}); 
				};
				
				buscarConFiltros();
			};
			
			function seleccionarTodo()
			{
				if (document.getElementById('persona').checked == true)
				{
					$('#seleccionarCuentasCorreo input[type=checkbox]').each(function(){
																	if (this.checked) {}
																	else
																	{
																		this.checked = true;
																	}
																	}); 
				}
				else
				{
					$('#seleccionarCuentasCorreo input[type=checkbox]').each(function(){
																	if (this.checked) {
																		this.checked = false;
																	};																	
																	}); 
				};
			};
			
			function muestraFiltro()
			{
				var tipoFiltro = $("input[type='radio'][name='filtroBusqueda']:checked").val();
				var tipoPersona = $("select#tipoPersona").val();
				
				$.post("tresfiltrosprueba.php", {tipoF: tipoFiltro, tipoP: tipoPersona}, function(mensaje) 
																				{
																					$("#formFiltrosBusqueda2").html(mensaje);																			
																				});
				document.getElementById('formFiltrosBusqueda2').style.display = 'block';
				document.getElementById('formFiltrosBusqueda3').style.display = 'none';
				$("#formResultadoBusqueda").html('<p>SELECCIONE LOS CAMPOS EN LOS QUE DESEA BUSCAR.</p>');								
			};
			
			function muestraFiltros()
			{
				var tipoFiltro = $("input[type='radio'][name='filtroBusqueda']:checked").val();
				var filtros = $("select#primerFiltro").val();
				var tipoPersona = $("select#tipoPersona").val();
				
				if (filtros != null)
				{
					$.post("tresfiltrosprueba2.php", {filtrosE: filtros, tipoP: tipoPersona, tipoF: tipoFiltro}, function(mensaje) 
					//$.post("tresfiltrosprueba2.php", {filtrosE: filtros, tipoP: tipoPersona, tipoF: tipoFiltro, filtrosA: filtrosArea, filtrosR: filtrosRelacion, filtrosG: filtrosGiro, filtrosS: filtrosEstado}, function(mensaje) 
																				{
																					$("#formFiltrosBusqueda3").html(mensaje);																			
																				});
					document.getElementById('formFiltrosBusqueda3').style.display = 'block';
					$("#formResultadoBusqueda").html('<p>SELECCIONE LOS FILTROS QUE REQUIERE PARA SU B&Uacute;SQUEDA.</p>');
				}
				else
				{
					//document.getElementById('formFiltrosBusqueda2').style.display = 'none';
					document.getElementById('formFiltrosBusqueda3').style.display = 'none';
					$("#formResultadoBusqueda").html('<p>SELECCIONE UN FILTRO PARA CONTINUAR LA B&Uacute;SQUEDA.</p>');
				}
			};
			
			function muestraFiltros2(valor)
			{
				var tipoFiltro = $("input[type='radio'][name='filtroBusqueda']:checked").val();
				//var filtros = $("select#primerFiltro").val();
				var tipoPersona = $("select#tipoPersona").val();
				var filtrosArea = $("select#filtroarea").val();
				var filtrosRelacion = $("select#filtrorelacion").val();
				var filtrosGiro = $("select#filtrogiro").val();
				var filtrosEstado = $("select#filtroestado").val();
				
				var respuesta = jerarquiaFiltros(valor);
				
				var primerFiltro = $("#primerFiltro").val();
				var segundoFiltro = $("#segundoFiltro").val();
				var tercerFiltro = $("#tercerFiltro").val();
				var cuartoFiltro = $("#cuartoFiltro").val();
				
				
				/*
				if (respuesta == 2 )
				{
					alert('Borrar tercer filtro');
					if (tercerFiltro == '0')
						alert('Tercer filtro = Area');
					else if (tercerFiltro == '1')
						alert('Tercer filtro = Relacion' );
					else if (tercerFiltro == '2')
					{
						alert('Tercer filtro = Giro');
						alert(cuartoFiltro);
						if (cuartoFiltro != '')
						{
							alert('Borrar cuarto filtro');
							cuartoFiltro == '';
						}
					}
					else if (tercerFiltro == '3')
						alert('Tercer filtro = Estado');
				}
				else if (respuesta == 1)
					alert('Borrar segundo filtro');
				else if (respuesta == 0)
					alert('Borrar todos los filtros');
				
				if (respuesta == 0)
				{
					filtrosArea = null;
					filtrosRelacion = null;
					filtrosGiro = null;
					filtrosEstado = null;
				}
				else if (respuesta == 1)
				{
					if (segundoFiltro == 0)
					{
						filtrosRelacion = null;
						filtrosGiro = null;
						filtrosEstado = null;
					}
					else if(segundoFiltro == 1)
					{
						filtrosArea = null;
						filtrosGiro = null;
						filtrosEstado = null;
					}
					else if(segundoFiltro == 2)
					{
						filtrosRelacion = null;
						filtrosArea = null;
						filtrosEstado = null;
					}
					else if(segundoFiltro == 3)
					{
						filtrosRelacion = null;
						filtrosGiro = null;
						filtrosArea = null;
					}					
				}
				else if (respuesta == 2)
				{
					filtrosEstado = null;
					
				}
				*/
				
				if (primerFiltro != null)
				{
					$.post("tresfiltrosprueba21.php", {filtrosE: primerFiltro, tipoP: tipoPersona, tipoF: tipoFiltro, filtrosA: filtrosArea, filtrosR: filtrosRelacion, 
					filtrosG: filtrosGiro, filtrosS: filtrosEstado, segundoF: segundoFiltro, tercerF: tercerFiltro, cuartoF: cuartoFiltro}, function(mensaje) 
																				{
																					$("#formFiltrosBusqueda3").html(mensaje);																			
																				});
					document.getElementById('formFiltrosBusqueda3').style.display = 'block';
					$("#formResultadoBusqueda").html('<p>SELECCIONE LOS FILTROS QUE REQUIERE PARA SU B&Uacute;SQUEDA.</p>');
				}
				else
				{
					//document.getElementById('formFiltrosBusqueda2').style.display = 'none';
					document.getElementById('formFiltrosBusqueda3').style.display = 'none';
					$("#formResultadoBusqueda").html('<p>SELECCIONE UN FILTRO PARA CONTINUAR LA B&Uacute;SQUEDA.</p>');
				}
			};
			
			//Función para buscar registros
			function muestraResultadosFiltros(valor) 
			{
				muestraFiltros2(valor);
				
				var tipoPersona = $("#tipoPersona").val();
				
				var tipoFiltro = $("input[type='radio'][name='filtroBusqueda']:checked").val();
				var primerFiltro = $("select#primerFiltro").val();
								
				var filtroArea = $("select#filtroarea").val();
				var filtroRelacion = $("select#filtrorelacion").val();
				var filtroGiro = $("select#filtrogiro").val();
				var filtroEstado = $("select#filtroestado").val();
				
				if (tipoPersona != null)
				{
					
					if (filtroArea == null && filtroRelacion == null && filtroGiro == null && filtroEstado == null)
					{
						document.getElementById('formFiltrosBusqueda3').style.display = 'block';
						$("#formResultadoBusqueda").html('<p>SELECCIONE UN FILTRO PARA CONTINUAR LA B&Uacute;SQUEDA.</p>');
					}
					else
					{
						$.post("buscarFiltros2.php", {tipoP: tipoPersona, tipoF: tipoFiltro, primerF: primerFiltro, filtroA: filtroArea, 
						filtroR: filtroRelacion, filtroG: filtroGiro, filtroE: filtroEstado}, function(mensaje) 
																			{
																				$("#formResultadoBusqueda").html(mensaje);																			
																			});
					}					
				}; 
			};
			//Función para establecer la jerarquia de los filtros
			function jerarquiaFiltros(valor) 
			{
				var filtroArea = $("#filtroarea").val();
				var filtroRelacion = $("#filtrorelacion").val();
				var filtroGiro = $("#filtrogiro").val();
				var filtroEstado = $("#filtroestado").val();

				var retorno = 3;
				
				if (filtroArea == null && filtroRelacion == null && filtroGiro == null  && filtroEstado == null)
				{
					document.getElementById('segundoFiltro').value = '';
					document.getElementById('tercerFiltro').value = '';
					document.getElementById('cuartoFiltro').value = '';

					//regresas valor para limpiar todos los filtros.
					retorno = 0;
				}
				else 
				{
					if ((document.getElementById('segundoFiltro').value == '') || (document.getElementById('segundoFiltro').value == valor))
					{
						document.getElementById('segundoFiltro').value = valor;
						document.getElementById('tercerFiltro').value = '';
						document.getElementById('cuartoFiltro').value = '';
						
						//Si el segundo filtro queda vacío, también se limpiaran todos los filtros.
						retorno = 1;
					}
					else if ((document.getElementById('tercerFiltro').value == '') || (document.getElementById('tercerFiltro').value == valor))
					{
						document.getElementById('tercerFiltro').value = valor;
						//document.getElementById('cuartoFiltro').value = '';
						
						//si el tercer filtro queda vacío, solo se limpiaran tercer y cuarto filtro.
						retorno = 2;
					}
					else if ((document.getElementById('cuartoFiltro').value == '') || (document.getElementById('tercerFiltro').value == valor))
					{
						document.getElementById('cuartoFiltro').value = valor;
						
						//si el cuarto filtro queda vacío, ya no quedan más filtros, de forma que se conserva
						retorno = 3;
					}					
				}

				return retorno;
			};