<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "appacademica";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario de edición
$id = $_POST['id'];
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$creditos = $_POST['creditos'];

// Consulta SQL para actualizar los datos del estudiante
$sql = "UPDATE datos SET codigo='$codigo', nombre='$nombre', creditos='$creditos' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Estudiante Modificado correctamente'); window.location.href='materia.html';</script>";
} else {
    echo "Error al actualizar los datos del estudiante: " . $conn->error;
}

$conn->close();
?>
