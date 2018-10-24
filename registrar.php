<?php
     session_start();
     if(isset($_SESSION['usuario'])){
         
         
     }else{
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
    <title>Crear Cuenta</title>
</head>

<body>

   
   <!-- ==== PARTE 1: AREA DEL ENCABEZADO EN LA PLANTILLA ESTABLECIDA ==== -->
   <div class="pseudoTR">
       <div class="celdaCentradaVertical">
           <header>
               <nav class="navbar navbar-inverse navbar-modificado navbar-fixed-top" role="navigation">
                   <div class="container">
                       <div class="navbar-header navbar-header-modificado">
                           <h2 class="titulo_header">Directorio de Usuarios</h2>
                           <div class="sesion"><?php echo"<a href='cerrar.php'>Cerrar Sesión</a>"; ?></div>
                       </div>
                   </div>
               </nav>
           </header>
       </div>
   </div>

    <div class="container">
    <h1 class="titulo_add">Crear Cuenta</h1>
    <br>
    <form action="insertar.php" method="POST">
        <div class="form-group">
        <label class="col-sm-4 text-right">Usuario:</label>
        <input type="text" title="Nombre" name="usuario" placeholder="Nombre de Usuario" required>
        </div>

        <div class="form-group">
        <label class="col-sm-4 text-right">Password:</label>
        <input type="password" title="clave" name="clave" placeholder="Password" required>
        </div>

        <div class="form-group">
        <label class="col-sm-4 text-right">Email:</label>
        <input type="email" title="email" name="correo" placeholder="Email" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" required>
        </div>

        <div class="form-group">
        <label class="col-sm-4 text-right">Selecciona una Opcion:</label>
        <select name="rol">

        <option value="admin">Administrador</option>

        <option value="user" selected>Usuario</option>    
        </select>
          </div>


        <div class="form-group ">
        <button type="submit" name="submit" class="boton_add btn btn-sm btn-primary">Crear Cuenta</button>
        <a href="panel.php" class="btn btn-sm btn-primary lista">Lista</a>
        </div>
    </form>

    </div>



</body>

</html>