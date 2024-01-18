<?php
session_start();

if (isset($_GET['id'])) {
    $productId = $_GET['id'];
    $usuario = $_SESSION['id'];
    include "conexion.php";

    $sql = "SELECT cantidad FROM productos WHERE id = $productId";
    $result = $con -> query($sql);
    $row = $result -> fetch_assoc();

    if(strcmp($row['cantidad'], "0") === 0){
         header("location: Producto.php");
         exit();
    }  
    else{
        // $sql = "SELECT id, cantidad FROM carrito_usuarios INNER JOIN productos WHERE id_usuario = $usuario AND id_producto = $productId";
        $sql = "SELECT id FROM carrito_usuarios WHERE id_usuario = $usuario AND id_producto = $productId";
        $result = $con -> query($sql);
        $row = $result -> fetch_assoc();

        // if(strcmp($row['cantidad'], "0") === 0){
        //     header("location: Producto.php");
        //     exit();
        // }    
        if(isset($row["id"])) {
            $query = "UPDATE carrito_usuarios SET cont = cont + 1 WHERE id_usuario = $usuario AND id_producto = $productId";
        }else{
            $query ="INSERT INTO carrito_usuarios (id_usuario, id_producto) 
            VALUES ('$usuario','$productId')";
        }
        echo $query;

        $sql = mysqli_query($con, $query);

        if($sql){
            echo "Usuario Agregado";
            header("location: Producto.php"); 
        }
        
        else{
            echo "Error" .$sql ."<br>" . mysqli_error($con);
        }
        mysqli_close($con);
    }
}

header("Location: Producto.php");
exit();
?>