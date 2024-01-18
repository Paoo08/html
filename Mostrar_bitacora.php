<?php
include "conexion.php"; 

//obtener la bitácora de productos
$queryProductos = "SELECT * FROM bitacora_productos";
$resultProductos = mysqli_query($con, $queryProductos);

//obtener la bitácora de usuarios
$queryUsuarios = "SELECT * FROM bitacora_usuarios";
$resultUsuarios = mysqli_query($con, $queryUsuarios);


if ($resultProductos && $resultUsuarios) {
    echo "<button style='margin: 12px 3em; font-size: 15px;
    color: white; background-color: #836096; padding: .3em 1.5em;
    border-radius: .4em; font-family: Arial, sans-serif;' 
    onclick='goBack()'>Regresar</button>";
    echo "<script>";
    echo "function goBack() {";
    echo "    window.history.back();";
    echo "}";
    echo "</script>";
    
    echo "<h2 style='color: #3F1D38; font-weight: bolder; text-align: center; 
    font-size: 25px; font-family: Arial, sans-serif; margin-bottom: 0%;'>Bitácora de Productos</h2>";
    echo "<br><br>";
    echo "<table border='2'>";
    echo "<col style='width: 20%;'>";
    echo "<col style='width: 40%;'>";
    echo "<col style='width: 40%;'>";

    echo "<tr><th style='color: white; background-color: #B185AE;font-size: 17px; font-family: Arial, sans-serif;'>Fecha</th>
        <th style='color: white; background-color: #B185AE; font-size: 17px; font-family: Arial, sans-serif;'>Sentencia</th>
        <th style='color: white; background-color: #B185AE; font-size: 17px; font-family: Arial, sans-serif;'>Contrasentencia</th></tr>";

    while ($row = mysqli_fetch_assoc($resultProductos)) {
        echo "<tr>";
        echo "<td style='padding: 5px; font-size: 15px;'> " . $row['fecha'] . "</td>";
        echo "<td style='padding: 5px; font-size: 15px;'> " . $row['sentencia'] . "</td>";
        echo "<td style='padding: 5px; font-size: 15px;'> " . $row['contrasentencia'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    //mostrar bitácora de usuarios
    echo "<br><br>";
    echo "<h2 style='color: #3F1D38; font-weight: bolder; text-align: center; 
    font-size: 25px; font-family: Arial, sans-serif; margin-bottom: 0%;'>Bitácora de Usuarios</h2>";
    echo "<br><br>";
    echo "<table border='2'>";
    echo "<col style='width: 20%;'>";
    echo "<col style='width: 40%;'>";
    echo "<col style='width: 40%;'>";

    echo "<tr><th style='color: white; background-color: #B185AE;font-size: 17px; font-family: Arial, sans-serif;'>Fecha</th>
        <th style='color: white; background-color: #B185AE; font-size: 17px; font-family: Arial, sans-serif;'>Sentencia</th>
        <th style='color: white; background-color: #B185AE; font-size: 17px; font-family: Arial, sans-serif;'>Contrasentencia</th></tr>";

    while ($row = mysqli_fetch_assoc($resultUsuarios)) {
        echo "<tr>";
        echo "<td style='padding: 5px; font-size: 15px;'> " . $row['fecha'] . "</td>";
        echo "<td style='padding: 5px; font-size: 15px;'> " . $row['sentencia'] . "</td>";
        echo "<td style='padding: 5px; font-size: 15px;'> " . $row['contrasentencia'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<br>";
} else {
    echo "Error al obtener la bitácora: " . mysqli_error($con);
}

mysqli_close($con);
?>