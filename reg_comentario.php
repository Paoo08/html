<?php
include "conexion.php";

$comentario = $_POST['comentario'];

$query ="INSERT INTO comentarios (comentario) VALUES ('$comentario')";

echo $query;

$sql = mysqli_query($con, $query);

 if($sql){
    echo "Usuario Agregado";
    header("location: index.php"); 
 }
 
 else{
    echo "Error" .$sql ."<br>" . mysqli_error($con);
}
mysqli_close($con);
?>