<?php
session_start();
include "conexion.php";

$administrador = 0;
$user = 0;  
    if (isset($_SESSION['correo'])) {

        //obtener información del usuario
        $correo = $_SESSION['correo'];
        $queryUser = "SELECT * FROM administrador WHERE correo = '$correo'";
        $queryUser2 = "SELECT * FROM usuarios WHERE correo = '$correo'";
        $resultUser = mysqli_query($con, $queryUser);
        $resultUser2 = mysqli_query($con, $queryUser2);

        if ($resultUser && mysqli_num_rows($resultUser) > 0) {
            $usuario = mysqli_fetch_assoc($resultUser);
            
            if ($usuario['Type'] = 'admin') {
                $administrador = 1;  
            }
            
        }elseif($resultUser2 && mysqli_num_rows($resultUser2) > 0){
            $usuario = mysqli_fetch_assoc($resultUser2);
            if ($usuario['Type'] = 'user'){
                $user = 1; 
                
            }
        }
        
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Styles.css">  
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" 
                           integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" 
                           crossorigin="anonymous" referrerpolicy="no-refferer">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Quattrocento:wght@700&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body style="background-color: #F8FCFD">
    <header>
        <nav>
        <input type="checkbox" id="click">
        <label for="click" class="btn">
            <i class="fa-solid fa-bars"></i>
        </label>
        <a href="#" class="ventanita">
            <img src="#" alt="" class="logo">
        </a>
            <ul>
            <?php
                    if ($user === 1) {
                        echo '<li class="carrito-icon" src="imagenes/carrito.jpeg"><a href="CarritoV.php"><i class="fas fa-shopping-cart"></i></a></li>';
                    }
                ?>
                <li><a href="index.php"> Inicio</a></li>
                <li><a href="Producto.php"> Producto</a></li>
                <?php
                    if($administrador === 1){
                     echo '<li><a href="RegProductoV.php"> Reg. Producto</a></li>';
                     echo '<li><a href="Modificar.php"> Modificar</a></li>';
                     echo '<li><a href="Eliminar.php"> Eliminar</a></li>';
                    }
                ?>
                <!-- <li><a href="RegProductoV.php"> Reg. Producto</a></li> -->
                <?php
                if($user === 1 || $administrador == 1){
                    echo '<li><a href="Salir.php"> Salir</a></li>';        
                }else{
                    echo '<li><a href="LoginV.php"> Log in</a></li>';
                    echo '<li><a href="RegistroV.php"> Registro</a></li>';
                }
                ?>
            </ul>
        </nav>
    </header>
    <br><br>
    <p class="kali">KALISTA</p>
    <!-- <h3>REGISTRO</h3> -->
    <div class="registro">
        <form action="http://localhost/Conexion/reg_usuarios.php" method="POST">
            <div>
                <h3>REGISTRO USUARIOS</h3>
                <label for="name">Nombre: </label>
                <input type="text" id="userName" name="userName">
                <span class="validity"></span>
                <label for="correo">Correo electronico: </label>
                <input type="email" id="correo" name="correo">
                <label for="contra">Contraseña:</label>
                <input type="password" id="contra" name="contra">
            </div>
            <div>
                <button type="submit" class="button">Registrar</button>
                <a href="Login.html" class="textButton">Log in</a>
            </div>
        </form>
    </div>
    <br><br>
    <footer>
        <h4>Paola Guadalupe Perez Ramirez 
            4ºP
            Base de Datos y Desarrollo Web
        </h4>
    </footer>
</body>
</html>