<?php
// Datos de conexión a la base de datos MySQL
$servername = "localhost"; // Cambia esto si tu servidor de base de datos tiene un nombre diferente
$username = "root"; // Cambia esto por el nombre de usuario de tu base de datos
$password = ""; // Cambia esto por la contraseña de tu base de datos
$database = "appacademica"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Recoger los datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$creditos = $_POST['creditos'];

// Preparar y ejecutar la consulta SQL para insertar los datos en la base de datos
$sql = "INSERT INTO datos (codigo, nombre, creditos) VALUES ('$codigo', '$nombre', '$creditos')";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Materia registrado correctamente'); window.location.href='materia.html';</script>";
} else {
    echo "Error al guardar los datos: " . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
