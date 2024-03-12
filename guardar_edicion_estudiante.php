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
$direccion = $_POST['direccion'];
$municipio = $_POST['municipio'];
$departamento = $_POST['departamento'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];

// Consulta SQL para actualizar los datos del estudiante
$sql = "UPDATE estudiantes SET codigo='$codigo', nombre='$nombre', direccion='$direccion', municipio='$municipio', departamento='$departamento', telefono='$telefono', fecha_nacimiento='$fecha_nacimiento', sexo='$sexo' WHERE id=$id";

if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Estudiante Modificado correctamente'); window.location.href='estudiante.html';</script>";
} else {
    echo "Error al actualizar los datos del estudiante: " . $conn->error;
}

$conn->close();
?>
