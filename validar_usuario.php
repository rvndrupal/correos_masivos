<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">     
    <title>Validar Usuario</title>
</head>
<body>
    
<?php
 include('Connections/conexion.php');
   session_start();

   $usuario=$_POST['usuario'];
   $clave=$_POST['clave'];

  
   

   if($usuario == ""){
    echo "<script>
    alert('Falta el campo Nombre');
    window.location= 'index.php'
    </script>";
    }else if($clave==""){
        echo "<script>
        alert('El password no puede estar vacio');
        window.location= 'index.php'
        </script>";  
    }else if(strlen($usuario) < 4){
        echo "<script>
        alert('El minimo de caracteres en el nombre es de tres');
        window.location= 'index.php'
        </script>";  
    }
    else if(strlen($clave) < 4){
        echo "<script>
        alert('El minimo de caracteres en el password es  de tres');
        window.location= 'index.php'
        </script>";  
    }

    //maximos
    else if(strlen($usuario) > 30){
        echo "<script>
        alert('El maximo de caracteres en el nombre es de Treinta');
        window.location= 'index.php'
        </script>";  
    }
    else if(strlen($clave) > 30){
        echo "<script>
        alert('El maximo de caracteres en el password es  de Treinta');
        window.location= 'index.php'
        </script>";  
    }

    //solo numeros y letras   
    else if(!preg_match("/^[0-9a-zA-Z_-]+$/",$usuario)){
        echo "<script>
        alert('El campo nombre solo acepta numeros y letras en Mayusculas y Minusculas guion( - _ ) sin acentos');
        window.location= 'index.php'
        </script>";  
    }

    else if(!preg_match("/^[0-9a-zA-Z_-]+$/",$clave)){
        echo "<script>
        alert('El campo nombre solo acepta numeros y letras en Mayusculas y Minusculas guion( - _ ) sin acentos');
        window.location= 'index.php'
        </script>";  
    }
   
   
   
   
   
   else{

      $contador=0;

      
      //$encriptado=hash("SHA256",$clave);

      //var_dump($encriptado);
        
       $valido=$con->query("SELECT * FROM $table WHERE usuario= BINARY '$usuario' AND clave= BINARY '$clave' ");

       //con el BINARY valida mayusculas y minusculas

       if ($resultado=mysqli_fetch_array($valido)) {      
           $_SESSION['usuario']=$usuario;
           $_SESSION['rol']=$resultado['rol'];
          header("Location: panel.php");
         
       } else {
        echo "<script>
        alert('Usuario no encontrado favor de validar de nuevo');
        window.location= 'index.php'
        
        </script>"; 
       }
   }


?>


  
</body>
</html>