<?php
      
     session_start();

     if(isset($_SESSION['usuario']) and $_SESSION['rol']=="admin"){
         
        //header("Location: panel.php");
         
     }else if(isset($_SESSION['usuario']) and $_SESSION['rol']=="user"){
        header("Location: busqueda.php");
     }
     
     else{
         header("Location: index.php");
     }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="Content/css/estiloFonts.css" type="text/css" rel="stylesheet" />
    <link href="Content/bootstrap/bootstrap.css" type="text/css"  rel="stylesheet" />
    <link href="Content/css/estiloVisual.css" type="text/css"rel="stylesheet" />
    <link href="Content/css/generales.css" type="text/css"rel="stylesheet" />
    <script src="Content/bootstrap/jquery-1.11.1.min.js"></script>
    <script src="Content/bootstrap/bootstrap.js"></script>
    
    <title>Panel Usuarios</title>
</head>
<body>

		<div class="tablaAnchoAltoCompleto">
   
        <!-- ==== PARTE 1: AREA DEL ENCABEZADO EN LA PLANTILLA ESTABLECIDA ==== -->
        <div class="pseudoTR">
            <div class="celdaCentradaVertical">
                <header>
                    <nav class="navbar navbar-inverse navbar-modificado navbar-fixed-top" role="navigation">
                        <div class="container">
                            <div class="navbar-header navbar-header-modificado">
                                <h2>Directorio de Usuarios</h2>                               
                                <div class="sesion"><?php echo"<a href='cerrar.php'>Cerrar Sesión</a>"; ?></div>
                            </div>
                        </div>
                    </nav>
                </header>
            </div>
        </div>

<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">                 

                    <a href="registrar.php" class="btn btn-sm btn-primary pull-right nuevo_btn">Nuevo</a>
                    <div class="usuario_sesion"><?php echo"Bienvenido ".$_SESSION['usuario'];  ?></div>
                   
                </div>
               

                <div class="panel-body">
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th width="10px">ID</th>
                                <th>Nombre</th>
                                <th>Correo</th>
                                <th>Rol</th>
                                <th colspan="3">&nbsp;</th>
                            </tr>
                        </thead>

                        <?php
                         include('Connections/conexion.php');                        
                         $consulta="SELECT * FROM $table";
                         $registros=$con->query($consulta);                         
                        ?>

                        <tbody>
                        <?php   
                        while ($reg=mysqli_fetch_array($registros)) {
                            
                            echo'
                            <tr>
                                <td> '.$reg["id"].' </td>
                                <td> '.$reg["usuario"].'</td>
                                <td>'.$reg["correo"].'</td>
                                <td>'.$reg["rol"].'</td>                               
                                <td width="10px">                                
                                <a href="editar.php?id='.$reg["id"].'" class="btn btn-sm btn-primary">Editar</a>
                                </td>
                                <td width="10px">
                                <a href="delete.php?id='.$reg["id"].'" class="btn btn-sm btn-danger">Eliminar</a>
                                </td>

                            </tr>
                            ';
                        }
                      // <a href="editar.php?id='.$reg["id"].'" class="btn btn-sm btn-primary">Editar</a>
                      //  <a href="delete.php?id='.$reg["id"].'" class="btn btn-sm btn-danger">Eliminar</a>
                        ?>      
                          
                        </tbody>
                    </table>

                   
                   
                </div>
            </div>
        </div>
    </div>
    <!--IR A LA PÁGINA PRINCIPAL-->
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
        <a href="busqueda.php" class="btn btn-sm btn-success pull-right ">Sistema</a>    
        </div>
    </div>


</div><!--container-->

<!-- ==== PARTE 3: AREA DEL PIE DE PAGINA EN LA PLANTILLA ESTABLECIDA ==== 
<div class="space_bottom"></div>
				<footer class="main-footer">
					<div class="container">
						<div class="row">
							<div class="col-sm-4">
								<img src="imagenes/plantilla/logoInstitucional.png" alt="Servicio Nacional de Sanidad, Inocuidad y Calidad Agroalimentaria" class="img-responsive center-block">
							</div>
							<div class="col-sm-4 col-sm-offset-4">
								<div class="nomSistema">
									<h2>Directorio</h2>
									<h3>Directorio de Usuarios</h3>
								</div>
							</div>
						</div>
					</div>
				</footer>
				<div class="pseudoTR">
					<div class="celdaCentradaVertical">
						<div class="barra01"></div>
						<div class="barra02"></div>
						<div class="barra03"></div>
					</div>
                </div>
                    </div>-->
                    



<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>
</html>