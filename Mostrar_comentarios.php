<?php
include "conexion.php"; 

//obtener la bitácora de comentarios
$queryComentarios = "SELECT * FROM comentarios";
$resultComentarios = mysqli_query($con, $queryComentarios);

if ($resultComentarios){
    //comentarios
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
    font-size: 25px; font-family: Arial, sans-serif; margin-bottom: 0%;'>Comentarios</h2>";
    echo "<br><br>";

    echo "<div style='margin: 0 auto; width: 19%;'>";

    echo "<table border='1'>";
    echo "<col style='width: 80%;'>";
    echo "<col style='width: 90%;'>"; // Ajusta el ancho de la segunda columna según tus necesidades

    echo "<tr><th style='color: white; background-color: #B185AE;font-size: 17px; font-family: Arial, sans-serif;'>ID</th>
        <th style='color: white; background-color: #B185AE; font-size: 17px; font-family: Arial, sans-serif;'>Comentarios</th></tr>";

    while ($row = mysqli_fetch_assoc($resultComentarios)) {
        echo "<tr>";
        echo "<td style='padding: 5px; text-align: center; font-size: 17px;'> " . $row['id'] . "</td>";
        echo "<td style='padding: 5px; text-align: center; font-size: 17px;'> " . $row['comentario'] . "</td>";
        echo "</tr>";
    }

    echo "</table>";

    echo "<br>";
}else {
    echo "Error al obtener la bitácora: " . mysqli_error($con);
}

mysqli_close($con);
?>