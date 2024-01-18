<?php
include "conexion.php";

//valor de la descripción del formulario
$descripcion = $_POST['descripcion'];

// Consultar la base de datos para obtener los resultados
$query = "SELECT * FROM productos WHERE descripcion LIKE '%$descripcion%'";
$resultado = mysqli_query($con, $query);

//primera fila de resultados
$row = mysqli_fetch_assoc($resultado);

// Devolver los resultados como JSON
echo json_encode($row);

mysqli_close($con);
?>
