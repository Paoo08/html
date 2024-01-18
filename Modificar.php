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
                <li><a href="index.php"> Inicio</a></li>
                <li><a href="Producto.php"> Producto</a></li>
                <li><a href="RegProductoV.php"> Registro</a></li>
                <li><a href="Modificar.php"> Modificar</a></li>
                <li><a href="Eliminar.php"> Eliminar</a></li>
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
    
    <div class="buttonCompra">
        <a href="Mostrar_bitacora.php">
            <button type="submit" class="buttonC">Bitacora</button>
        </a>
    </div>
    <div class="buttonCompra2">
        <a href="Mostrar_comentarios.php">
            <button type="submit" class="buttonC">Comentarios</button>
        </a>
    </div>
    <p class="kali">KALISTA</p>
    <div class="registro">
        <form id="buscarForm" onsubmit="buscarProducto(); return false;">
            <div>
            <h3>MODIFICAR PRODUCTOS</h3>
                <label for="descripcion">Descripción: </label>
                <input type="text" id="descripcion" name="descripcion">
                <label for="precio">Precio: </label>
                <input type="text" id="precio" name="precio">
                <label for="cantidad">Cantidad: </label>
                <input type="text" id="cantidad" name="cantidad">
                <label for="imagen">URL de la imagen: </label>
                <input type="text" id="imagen" name="imagen">
            </div>
            <div class="buttonModContainer">
                <button type="submit" class="buttonMod">Buscar</button>
                <!-- <button type="button" class="buttonMod" onclick="modificarProducto()">Modificar</button> -->
                <button type="button" class="buttonMod" onclick="limpiarCampos()">Limpiar</button>
            </div>
                <!-- <button type="button" class="buttonModLimpiar" onclick="limpiarCampos()">Limpiar</button> -->
            <button type="button" class="buttonModLimpiar" onclick="modificarProducto()">Modificar</button>

          
        </form>

        <script>
            function buscarProducto() {
                //obtener el valor de la descripción
                var descripcion = document.getElementById("descripcion").value;

                //buscar el producto
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        var resultado = JSON.parse(xhr.responseText);

                        //actualizar los valores
                        document.getElementById("precio").value = resultado.precio;
                        document.getElementById("cantidad").value = resultado.cantidad;
                        document.getElementById("imagen").value = resultado.imagen;
                    }
                };

                //enviar la solicitud que manejará la búsqueda
                xhr.open("POST", "buscar_producto.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("descripcion=" + descripcion);
            }
            function limpiarCampos() {
                document.getElementById("descripcion").value = "";
                document.getElementById("precio").value = "";
                document.getElementById("cantidad").value = "";
                document.getElementById("imagen").value = "";
            }
            function modificarProducto() {
                var descripcion = document.getElementById("descripcion").value;
                var precio = document.getElementById("precio").value;
                var cantidad = document.getElementById("cantidad").value;
                var imagen = document.getElementById("imagen").value;

                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function () {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        alert(xhr.responseText); 
                    }
                };

                xhr.open("POST", "modificar_producto.php", true);
                xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
                xhr.send("descripcion=" + descripcion + "&precio=" + precio + "&cantidad=" + cantidad + "&imagen=" + imagen);
            }
            
        </script>    
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