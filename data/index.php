<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="js/datatable.css">
	<script src="js/jquery-3.1.1.min.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
	<script src="js/buscador.js"></script>

</head>
<body>

<?php
$conexion=mysqli_connect("localhost","root","","directorio_upv") or
    die("Problemas con la conexión");

$registros=mysqli_query($conexion,"select * from personas_fisicas") or
  die("Problemas en el select:".mysqli_error($conexion));
 
?>

	<input type="search" placeholder="Buscar">

		<table id="buscar" class="display compact" cellspacing="0" width="80%">
			<thead>
				<tr>
                
					<th></th>
					<th>NOMBRE</th>
					<th>ESTADO</th>
					<th>EMAIL</th>
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
					<th>EMAIL</th>
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
					<td><?php echo $reg['email']; ?></td>
					<td><?php echo $reg['giro']; ?></td>
					<td><?php echo $reg['relacion']; ?></td>
					<td><?php echo $reg['area']; ?></td>
				
				</tr> 
            <?php } ?>
      
			</tbody>
        
		</table>
    
	
</body>




</html>



