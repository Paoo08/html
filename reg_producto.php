<?php
include "conexion.php";

$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$cantidad = $_POST['cantidad'];
$imagen = $_POST['imagen'];

$query ="INSERT INTO productos (descripcion,
precio,cantidad,imagen) VALUES ('$descripcion','$precio','$cantidad','$imagen')";

echo $query;

$sql = mysqli_query($con, $query);

 if($sql){
   echo "Producto eliminado exitosamente";
    header("location: Producto.php"); 
 }
 
 else{
    echo "Error" .$sql ."<br>" . mysqli_error($con);
}
mysqli_close($con);
?>