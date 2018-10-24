<?php
session_start();
require "conexion.php";



$nom=$_POST['nombre'];
$pass=$_POST['password'];

	if($nom=="")
	{
		echo"Falta el campo nombre";	
		header("location: index.php");
		sleep(1);
	}
	elseif($pass=="")
	{
		echo"Falta el campo Password";		
		header("location: index.php");
		sleep(1);
	}
	else{
		   $consulta=mysqli_query($conexion,"select * from login where nombre='$nom' AND password='$pass'");



		  if($res=mysqli_fetch_array($consulta))
		  {
		  	$_SESSION['nam_user']=$nom;
		  	$_SESSION['pass_user']=$pass;
		  	header("location: home.php");
		  }
		  else
		  {
		  	header("location: index.php");
		  }

	}



?>