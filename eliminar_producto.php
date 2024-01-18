<?php
include "conexion.php";

//descripción del producto a eliminar
$descripcion = $_POST['descripcion'];

// Consultar para eliminar el producto
$query = "DELETE FROM productos WHERE descripcion = '$descripcion'";
$resultado = mysqli_query($con, $query);

if ($resultado) {
    echo "Producto eliminado exitosamente";
    //header("location: Producto.php"); 
} else {
    echo "Error al eliminar el producto: " . mysqli_error($con);
}

mysqli_close($con);
?>
