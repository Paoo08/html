<?php
session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $usuario = $_SESSION['id'];
    $tipo = $_GET['tipo'];

    include "conexion.php";

    if(strcmp($tipo, '1')=== 0){
        $sqlProductos = "SELECT * FROM carrito_usuarios INNER JOIN productos ON productos.id = id_producto WHERE id_usuario = $usuario AND id_producto = $productId";

        $result = $con -> query($sqlProductos);
        $row = $result -> fetch_assoc();
        echo $row["cont"];
        if($row["cont"] < $row['cantidad']){
            $query = "UPDATE carrito_usuarios SET cont = cont + 1 WHERE id_usuario = $usuario AND id_producto = $productId";
        }
        else{
            header("location: CarritoV.php");
        }
    }else{
        $sql = "SELECT cont FROM carrito_usuarios WHERE id_usuario = $usuario AND id_producto = $productId";

        $result = $con -> query($sql);
        $row = $result -> fetch_assoc();
        echo $row["cont"];
        if(strcmp($row["cont"], '0') === 1) {
            $query ="DELETE FROM carrito_usuarios WHERE id_usuario = $usuario AND id_producto = $productId";
        }else{
            $query = "UPDATE carrito_usuarios SET cont = cont - 1 WHERE id_usuario = $usuario AND id_producto = $productId";
        }

    }
    echo $query;

    $sql = mysqli_query($con, $query);

    if($sql){
        echo "Usuario Agregado";
        // header("location: Producto.php"); 
    }
    
    else{
        echo "Error" .$sql ."<br>" . mysqli_error($con);
    }
    mysqli_close($con);
}

header("Location: CarritoV.php");
exit();
?>
