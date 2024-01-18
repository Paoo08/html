<?php
include "conexion.php";

//otener los datos del formulario
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$imagen = $_POST['imagen'];

// Consultar para actualizar los datos del producto
$query = "UPDATE productos SET 
          precio = '$precio', 
          cantidad = '$cantidad', 
          imagen = '$imagen' 
          WHERE descripcion = '$descripcion'";

$resultado = mysqli_query($con, $query);

if ($resultado) {
    echo "Producto modificado exitosamente";
    // header("location: Producto.php"); 
} else {
    echo "Error al modificar el producto: " . mysqli_error($con);
}

mysqli_close($con);
?>
