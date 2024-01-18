<?php
include "conexion.php";

$userName = $_POST['userName'];
$correo = $_POST['correo'];
$contra = $_POST['contra'];

$query ="INSERT INTO administrador (userName, correo, contra) 
VALUES ('$userName','$correo','$contra')";

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