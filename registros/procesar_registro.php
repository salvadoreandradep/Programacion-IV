<?php
// Conexión a la base de datos (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legalcc";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$tipo = $_POST['tipo'];
$correo = $_POST['correo'];
$contrasena = $_POST['contrasena'];

// Encriptar la contraseña
$contrasena_encriptada = password_hash($contrasena, PASSWORD_DEFAULT);

// Insertar los datos en la base de datos
$sql = "INSERT INTO usuarios (nombre, apellido, telefono, tipo, correo, contrasena) 
        VALUES ('$nombre', '$apellido', '$telefono', '$tipo', '$correo', '$contrasena_encriptada')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar conexión
$conn->close();
?>
