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

// Obtener el ID del estudiante a eliminar
$id = $_GET['id'];

// Consulta SQL para eliminar el estudiante
$sql = "DELETE FROM estudiantes WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Estudiante Eliminado correctamente'); window.location.href='estudiante.html';</script>";
} else {
    echo "Error al eliminar el estudiante: " . $conn->error;
}

$conn->close();
?>
