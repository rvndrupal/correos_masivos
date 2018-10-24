<?php
		//Como el elemento es un arreglos utilizamos foreach para extraer todos los valores
		foreach($_FILES["archivo"]['tmp_name'] as $key => $tmp_name)
		{
			//Validamos que el archivo exista
			if($_FILES["archivo"]["name"][$key]) {				
				
				$filename = $_FILES["archivo"]["name"][$key]; //Obtenemos el nombre original del archivo
				$source = $_FILES["archivo"]["tmp_name"][$key]; //Obtenemos un nombre temporal del archivo
				
					
					$directorio = '\\\\10.24.17.53\attachments'; //Declaramos un  variable con la ruta donde guardaremos los archivos
					
					$dir=opendir($directorio); //Abrimos el directorio de destino
					$target_path = $directorio.'/'.$filename; //Indicamos la ruta de destino, así como el nombre del archivo
					
					//Movemos y validamos que el archivo se haya cargado correctamente
					//El primer campo es el origen y el segundo el destino
					if(move_uploaded_file($source, $target_path)) {	
						echo "El archivo $filename se ha almacenado en forma exitosa.<br>";
						} else {	
						echo "Ha ocurrido un error, por favor inténtelo de nuevo.<br>";
					}
					closedir($dir); //Cerramos el directorio de destino			

			}
		}
	
?>