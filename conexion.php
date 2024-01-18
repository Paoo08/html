<?php
$servername = "localhost:3308";
$database = "resgistro";
// $database = "administrador";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password, $database);

if(!$con){
    die("Fallo la conexion " . mysqli_connect_error());
}
else{
    // echo "Conexion Exitosa";
}
?>