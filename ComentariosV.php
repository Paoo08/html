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
<body style="background-color: #F8FCFD;">
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
                <li class="carrito-icon" src="imagenes/carrito.jpeg"><a href="CarritoV.php"><i class="fas fa-shopping-cart"></i></a></li>
                <li><a href="index.php"> Inicio</a></li>
                <li><a href="Producto.php"> Producto</a></li>
                <!-- <li><a href="RegProductoV.php"> Registro</a></li>
                <li><a href="Modificar.php"> Modificar</a></li>
                <li><a href="Eliminar.php"> Eliminar</a></li> -->
                <!-- <li><a href="RegProductoV.php"> Reg. Producto</a></li> -->
                <?php
                if($user === 1 || $administrador == 1){
                    echo '<li><a href="LoginV.php"> Log in</a></li>';
                    echo '<li><a href="RegistroV.php"> Registro</a></li>';
                    echo '<li><a href="Salir.php"> Salir</a></li>';        
                }else{
                    echo '<li><a href="Salir.php"> Salir</a></li>'; ;
                }
                ?>
            </ul>
        </nav>
    </header>
    <br><br>
    <p class="kali">KALISTA</p>
    <div class="registro">
        <form action="http://localhost/Conexion/reg_comentario.php" method="POST">
            <div>
            <h3>COMENTARIOS</h3>
                <!-- <label for="descripcion">Descripción: </label>
                <input type="text" id="descripcion" name="descripcion">
                <label for="precio">Precio: </label>
                <input type="text" id="precio" name="precio">
                <label for="cantidad">Cantidad: </label>
                <input type="text" id="cantidad" name="cantidad">
                <label for="imagen">URL de la imagen: </label>
                <input type="text" id="imagen" name="imagen"> -->
                <label for="comentario">Comentario: </label>
                <br>
                <textarea id="comentario" name="comentario" rows="4" style="width: 100%;" required></textarea> 
            </div>
            <div>
                <button type="submit" class="buttonMod">Enviar</button>
            </div>
        </form>
    </div>
    <br><br><br>
    <footer>
        <h4>Paola Guadalupe Perez Ramirez 
            4ºP
            Base de Datos y Desarrollo Web
        </h4>
    </footer>
</body>
</html>