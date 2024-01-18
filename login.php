<?php
include "conexion.php";

session_start();

$correo = $_POST['correo'];
$contra = $_POST['contra'];

$sql = "SELECT id, correo, contra FROM usuarios WHERE correo = ? AND contra = ?";
$stmt = mysqli_prepare($con, $sql);
mysqli_stmt_bind_param($stmt, "ss", $correo, $contra);
mysqli_stmt_execute($stmt);
mysqli_stmt_store_result($stmt);
$Row = mysqli_stmt_num_rows($stmt);

$sql2 = "SELECT correo, contra FROM administrador WHERE correo = ? AND contra = ?";
$stmt2 = mysqli_prepare($con, $sql2);
mysqli_stmt_bind_param($stmt2, "ss", $correo, $contra);
mysqli_stmt_execute($stmt2);
mysqli_stmt_store_result($stmt2);
$Row2 = mysqli_stmt_num_rows($stmt2);

$_SESSION['correo'] = $correo;

if ($Row == 1) {
    $sql = "SELECT id, correo, contra FROM usuarios WHERE correo = '$correo' AND contra = '$contra' ";
    $result = $con -> query($sql);
    $row = $result -> fetch_assoc();
    if(isset($row["id"])) {
    $_SESSION['id'] = $row["id"];
    }


    echo "<br><br>Bienvenido USUARIO";
    header("location: index.php");
    $_SESSION['Type'] = 'user';
} elseif ($Row2 == 1) {
    echo "<br><br>Bienvenido Administrador";
    header("location: index.php");
    $_SESSION['Type'] = 'admin';
} else {
    echo "<br><br>Contraseña o correo incorrectos...";
}

mysqli_stmt_close($stmt);
mysqli_stmt_close($stmt2);

mysqli_close($con);
?>
