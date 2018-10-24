<?php
    session_start();
    if(isset($_SESSION['usuario'])){
       
        
    }else{
        header("Location: index.php");
    }


 include('Connections/conexion.php'); 
 $id=$_GET['id']; 

 $consulta="SELECT * FROM $table where id=$id";
 $ejecutar=$con->query($consulta);
 $r = mysqli_fetch_assoc($ejecutar);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="Content/css/estiloFonts.css" type="text/css" rel="stylesheet" />
    <link href="Content/bootstrap/bootstrap.css" type="text/css"  rel="stylesheet" />
    <link href="Content/css/estiloVisual.css" type="text/css"rel="stylesheet" />
    <link href="Content/css/generales.css" type="text/css"rel="stylesheet" />
    <script src="Content/bootstrap/jquery-1.11.1.min.js"></script>
    <script src="Content/bootstrap/bootstrap.js"></script>
    <title>Editar Usuario</title>
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
    <h1 class="editar_user">Editar Usuario</h1>
    <br>
    <form action="actualizar.php" method="POST">
    <div class="form-group">
        <label class="col-sm-4 text-right">Usuario:</label>
        <input type="text" title="Nombre" name="usuario_edit" placeholder="Nombre de Usuario" value="<?php echo $r['usuario'];  ?>" required>
         </div>

        <div class="form-group">
        <label class="col-sm-4 text-right">Password:</label>
        <input type="password" title="clave" name="clave_edit" placeholder="Password" value="<?php echo $r['clave'];  ?>" required>
        </div>

        <div class="form-group">
        <label class="col-sm-4 text-right">Email:</label>
        <input type="email" title="email" name="correo_edit" placeholder="Email" pattern="^[_a-z0-9-]+(.[_a-z0-9-]+)*@[a-z0-9-]+(.[a-z0-9-]+)*(.[a-z]{2,4})$" value="<?php echo $r['correo'];  ?>"required>
        </div>

        <div class="form-group">
        <label class="col-sm-4 text-right">Selecciona una Opcion:</label>
        <select name="rol_edit">
        <option value="admin">Administrador</option>
        <option value="user" selected>Usuario</option>    
        </select>
          </div>
        <input type="hidden" name="id" value="<?php echo $r['id'];  ?>" >
        <button type="submit" name="submit" class="boton_edit btn btn-sm btn-primary">Editar Cuenta</button>
        <a href="panel.php" class="btn btn-sm btn-primary lista">Lista</a>
    </form>

    </div>




<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</body>

</html>