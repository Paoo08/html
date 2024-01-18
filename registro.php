<?php
include "conexion.php";

$name = $_POST['name'];
$apellido = $_POST['apellido'];
$celular = $_POST['celular'];
$nacimiento = $_POST['nacimiento'];
$direccion = $_POST['direccion'];
$nameUser = $_POST['nameUser'];
$correo = $_POST['correo'];
$contra = $_POST['contra'];

$query ="INSERT INTO usuarios (nombre,
apellido,celular,nacimiento,direccion,nameUser,correo,
contra) VALUES ('$name','$apellido','$celular','$nacimiento',
'$direccion','$nameUser','$correo','$contra')";

echo $query;

$sql = mysqli_query($con, $query);

 if($sql){
    echo "Usuario Agregado";
    header("location: LoginV.php");
    
 }
 
 else{
    echo "Error" .$sql ."<br>" . mysqli_error($con);
}
mysqli_close($con);
?>