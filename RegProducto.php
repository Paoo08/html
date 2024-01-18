<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles.css">
    <title>Document</title>
</head>
<body style="background-color: #F8FCFD;">

<?php
include "conexion.php";

session_start();

$correo = $_POST['correo'];
$contra = $_POST['contra'];

$sql2 = "SELECT correo, contra FROM administrador WHERE correo = ? AND contra = ?";
$stmt2 = mysqli_prepare($con, $sql2);
mysqli_stmt_bind_param($stmt2, "ss", $correo, $contra);
mysqli_stmt_execute($stmt2);
mysqli_stmt_store_result($stmt2);
$Row2 = mysqli_stmt_num_rows($stmt2);

if ($Row2 == 1) {
    // Muestra la ventana solo si el usuario es administrador.
?>
    <header>
        <!-- ... tu código de encabezado ... -->
    </header>
    <br><br>
    <p class="kali">KALISTA</p>

    <div class="registro">
        <a href="Mostrar_bitacora.php" >
            <button type="submit" class="button">Bitacora</button>
        </a>
        <!-- ... tu formulario y contenido ... -->
    </div>

<?php
} else {
    // Si no es administrador, puedes mostrar un mensaje o redirigir a otra página.
    echo "<p>No tienes permisos para acceder a esta página.</p>";
}
?>

</body>
</html>
