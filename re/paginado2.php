<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Documento sin t&iacute;tulo</title>
</head>

<body>
<?php
include("conn02.php");

 oci_execute($con1);
//Obtiene TODO de la tabla
$obtener_todo_BD = "oci_parse($conn,SELECT CLAVE_CEDULA_AUTORIZACION FROM VWN_DETALLE_COADYUVANTES_PF)";

//Realiza la consulta
$consulta_todo = "oci_parse($conn,SELECT CLAVE_CEDULA_AUTORIZACION FROM VWN_DETALLE_COADYUVANTES_PF)";

//Cuenta el número total de registros
$total_registros = "oci_parse($conn,SELECT COUNT(*) FROM VWN_DETALLE_COADYUVANTES_PF)";

//Obtiene el total de páginas existentes
$total_paginas = ceil($total_registros / $cantidad_resultados_por_pagina); 

//Realiza la consulta en el orden de ID ascendente (cambiar "id" por, por ejemplo, "nombre" o "edad", alfabéticamente, etc.)
//Limitada por la cantidad de cantidad por página
/*$consulta_resultados = mysqli_query($conexion, "
SELECT * FROM `mmv004` 
ORDER BY `mmv004`.`id` ASC 
LIMIT $empezar_desde, $cantidad_resultados_por_pagina");

//Crea un bluce 'while' y define a la variable 'datos' ($datos) como clave del array
//que mostrará los resultados por nombre
while($datos = mysqli_fetch_array($consulta_resultados)) {
?>

<span class="persona">
<p><strong><?php echo $datos['nombre']; ?></strong> <br>
<?php echo $datos['edad']; ?></p>
</span>

<?php
};
?>*/

<hr><!----------------------------------------------->

| <?php
//Crea un bucle donde $i es igual 1, y hasta que $i sea menor o igual a X, a sumar (1, 2, 3, etc.)
//Nota: X = $total_paginas
for ($i=1; $i<=$total_paginas; $i++) {
	//En el bucle, muestra la paginación
	echo "<a href='?pagina=".$i."'>".$i."</a> | ";
}; ?>

</body>
</html>
