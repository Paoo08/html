<?php
$servername = "localhost:3308";
$database = "resgistro";
$username = "root";
$password = "";

$con = mysqli_connect($servername, $username, $password, $database);

//verificar conexión
if (!$con) {
    die("Conexión fallida: " . mysqli_connect_error());
}

$sql1 = "
CREATE TRIGGER bitacora_insert_usuarios
AFTER INSERT ON usuarios
FOR EACH ROW
BEGIN
    INSERT INTO bitacora_usuarios (fecha, sentencia, contrasentencia) VALUES (
        NOW(),
        CONCAT('INSERT INTO usuarios (id, nombre, apellido, celular, nacimiento, direccion, nameUser, correo, contra) VALUES 
        (', NEW.id, ', ''', NEW.nombre, ''', ''', NEW.apellido, ''', ''', NEW.celular, ''', ''', NEW.nacimiento, ''', ''', NEW.direccion, 
        ''', ''', NEW.nameUser, ''', ''', NEW.correo, ''', ''', NEW.contra, ''')'),
        CONCAT('DELETE FROM usuarios WHERE id = ', NEW.id)

    );
END;
";

$sql2 = "
CREATE TRIGGER bitacora_update_productos
AFTER UPDATE ON productos
FOR EACH ROW
BEGIN
    INSERT INTO bitacora_productos (fecha, sentencia, contrasentencia) VALUES (
        NOW(),
        CONCAT('UPDATE productos SET descripcion = ''', NEW.descripcion, ''', precio = ''', NEW.precio, ''', cantidad = ''', NEW.cantidad, ''', imagen = ''', NEW.imagen, ''' WHERE id = ', NEW.id),
        CONCAT('UPDATE productos SET descripcion = ''', OLD.descripcion, ''', precio = ''', OLD.precio, ''', cantidad = ''', OLD.cantidad, ''', imagen = ''', OLD.imagen, ''' WHERE id = ', OLD.id)
    );
END;
";

$sql3 = "
CREATE TRIGGER bitacora_delete_productos
AFTER DELETE ON productos
FOR EACH ROW
BEGIN
    INSERT INTO bitacora_productos (fecha, sentencia, contrasentencia) VALUES (
        NOW(),
        CONCAT('DELETE FROM productos WHERE id = ', OLD.id),
        CONCAT('INSERT INTO productos (id, descripcion, precio, cantidad, imagen) VALUES 
        (', OLD.id, ', ''', OLD.descripcion, ''', ''', OLD.precio, ''', ''', OLD.cantidad, ''', ', OLD.imagen, ''')')
    );
END;
";

$sql4 = "
CREATE TRIGGER bitacora_update_usuarios
AFTER UPDATE ON usuarios
FOR EACH ROW
BEGIN
    INSERT INTO bitacora_usuarios (fecha, sentencia, contrasentencia) VALUES (
        NOW(),
        CONCAT('UPDATE usuarios SET 
        nombre = ''', NEW.nombre, ''',
        apellido = ''', NEW.apellido, ''',
        celular = ''', NEW.celular, ''',
        nacimiento = ''', NEW.nacimiento, ''',
        direccion = ''', NEW.direccion, ''',
        nameUser = ''', NEW.nameUser, ''',
        correo = ''', NEW.correo, ''',
        contra = ''', NEW.contra, '''
        WHERE id = ', NEW.id),
        CONCAT('DELETE FROM usuarios WHERE id = ', OLD.id)
    );
END;
";

$sql5 = "
CREATE TRIGGER bitacora_delete_usuarios
AFTER DELETE ON usuarios
FOR EACH ROW
BEGIN
    INSERT INTO bitacora_usuarios (fecha, sentencia, contrasentencia) VALUES (
        NOW(),
        NULL,  -- No hay una operación de inserción en este caso
        CONCAT('DELETE FROM usuarios WHERE id = ', OLD.id)
    );
END;
";

if (mysqli_query($con, $sql6)) {
    echo "Triggers creados con éxito";
} else {
    echo "Error al crear los triggers: " . mysqli_error($con);
}

//cerrar conexión
mysqli_close($con);


?>