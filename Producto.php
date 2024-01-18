<?php
include "conexion.php";

$sqlProductos = "SELECT * FROM productos WHERE cantidad > 0";
$resultado = mysqli_query($con, $sqlProductos);

if ($resultado) {
    $productos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);
} else {
    $productos = array(); 
}
?>

<?php
session_start();
include "conexion.php";

$administrador = 0;
$user = 0; 
    if (isset($_SESSION['correo'])) {

        //información del usuario
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
<?php
if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
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
                if ($user === 1) {
                    echo '<li><a href="CompraV.php"> Historial</a></li>';
                }
                ?>
                <?php
                    if($administrador === 1){
                     echo '<li><a href="RegProductoV.php"> Registro</a></li>';
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
    <p class="nameProducto">PRODUCTOS</p>
    
    <!-- <a href="trigger.php"><button type="button" class="buttonC">Trigger</button></a> -->

    <div class="producto">
        <div class="seccionesProductos1">
            <!-- <div class="arreglo">
                <img class="flores" src="imagenes/ramo1.jpeg">
                <br><br>
                <p class="info"> Combinado Ramo de 50 rosas </p>
                <p class="info">Precio: $790.00 </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/ramo2.webp">
                <br><br>
                <p class="info">Ramo de 24 rosas y 16 chocolates </p>
                <p class="info">Precio: $920.00 </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/ramo3.jpeg">
                <br><br>
                <p class="info">Ramo 100 rosas rosas/blancas </p>
                <p class="info">Precio: $1 , 600.00 </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a> 
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/ramo4.jpeg">
                <br><br>
                <p class="info">Bouquet Rosas Rosas </p>
                <p class="info">Precio: $480.00  </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/arreglo1.jpeg">
                <br><br>
                <p class="info">Arreglo de rosas rosas/rojas y azucena blanca</p>
                <br>
                <p class="info">Precio: $690.00 </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/arreglo2.webp">
                <br><br>
                <p class="info">Bouquet rosas multicolor </p>
                <p class="info">Precio: $1 , 590.00</p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/arreglo3.jpeg">
                <br><br>
                <p class="info">Arreglo de flores de cumpleaños </p>
                <p class="info">Precio: $2 , 590.00 </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/arreglo4.jpeg">
                <br><br>
                <p class="info">Arreglo de rosas rosas </p>
                <p class="info">Precio: $1 , 690.00 </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div>
            <div class="arreglo">
                <img class="flores" src="imagenes/arreglo5.webp">
                <br><br>
                <p class="info">Bouquet rosas multicolor</p>
                <p class="info">Precio: $1 , 890.00 </p>
                <a href="http://localhost/Conexion/pdf.php"><button type="button" class="buttonC">Comprar</button></a>
            </div> -->
            
            <?php foreach ($productos as $producto): ?>
            <div class="arreglo">
                <img class="flores" src="<?php echo $producto['imagen']; ?>">
                <br><br>
                <p class="info"><?php echo $producto['descripcion']; ?></p>
                <br>
                <p class="info">Precio: $<?php echo number_format($producto['precio'], 2, '.', ' , '); ?></p>
                <a href="carrito.php?id=<?php echo $producto['id']; ?>"><button type="button" class="buttonC">Agregar</button></a>
            </div>
        <?php endforeach; ?>
        </div>
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