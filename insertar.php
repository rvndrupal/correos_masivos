<?php
     session_start();
     if(isset($_SESSION['usuario'])){
         echo"Inicio Sesión correctamente ";
         echo"<a href='cerrar.php'>Cerrar Sesión</a>";
         
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
   
    <title>Alta Usuarios</title>
</head>
<body>
    
<?php
   

    $usuario=$_POST['usuario'];
    $clave=$_POST['clave'];
    $correo=$_POST['correo'];
    $rol=$_POST['rol'];

    

    include('Connections/conexion.php');
   

    if($con->connect_error){
        die("La conexion fallo". $con->connect_error);
    }

    $buscar=$con->query("SELECT * FROM $table WHERE usuario = '$usuario' or correo='$correo'");


    

    if($buscar->num_rows == 1){
        
        echo "<script>
        alert('El nombre de usuario ó el email ya Existe');
        window.location= 'registrar.php'
        </script>";
    }
    
    if($usuario == ""){
        echo "<script>
        alert('Falta el campo Nombre');
        window.location= 'registrar.php'
        </script>";
        }else if($clave==""){
            echo "<script>
            alert('El password no puede estar vacio');
            window.location= 'registrar.php'
            </script>";  
        }else if($correo==""){
            echo "<script>
            alert('El correo no puede estar vacio');
            window.location= 'registrar.php'
            </script>";  
        }else if(strlen($usuario) < 4){
            echo "<script>
            alert('El minimo de caracteres en el nombre es de tres');
            window.location= 'registrar.php'
            </script>";  
        }
        else if(strlen($clave) < 4){
            echo "<script>
            alert('El minimo de caracteres en el password es  de tres');
            window.location= 'registrar.php'
            </script>";  
        }
    
        //maximos
        else if(strlen($usuario) > 30){
            echo "<script>
            alert('El maximo de caracteres en el nombre es de Treinta');
            window.location= 'registrar.php'
            </script>";  
        }
        else if(strlen($clave) > 30){
            echo "<script>
            alert('El maximo de caracteres en el password es  de Treinta');
            window.location= 'registrar.php'
            </script>";  
        }
    
        //solo numeros y letras   
        else if(!preg_match("/^[0-9a-zA-Z_-]+$/",$usuario)){
            echo "<script>
            alert('El campo nombre solo acepta numeros y letras en Mayusculas y Minusculas guion( - _ ) sin acentos');
            window.location= 'registrar.php'
            </script>";  
        }
    
        else if(!preg_match("/^[0-9a-zA-Z_-]+$/",$clave)){
            echo "<script>
            alert('El campo nombre solo acepta numeros y letras en Mayusculas y Minusculas guion( - _ ) sin acentos');
            window.location= 'registrar.php'
            </script>";  
        }

        //email
        else if(!preg_match("/^[a-zA-Z0-9\._-]+@[a-zA-Z0-9-]{2,}[.][a-zA-Z]{2,4}$/",$correo)){
            echo "<script>
            alert('El Email no es valido');
            window.location= 'registrar.php'
            </script>";  
        }else{

        //$encriptado=hash("SHA256",$clave);

      $insertar="Insert into $table values ('','$usuario','$clave','$correo','$rol')";

      if($con->query($insertar))
      {
        echo "<script>
        alert('Dato insertado Correctamente');
        window.location= 'panel.php'
        </script>";
      }else{
          echo"No se inserto";
      }
    }


?>



</body>
</html>