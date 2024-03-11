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

// Obtener datos del formulario
$codigo = $_POST['codigo'];
$nombre = $_POST['nombre'];
$direccion = $_POST['direccion'];
$municipio = $_POST['municipio'];
$departamento = $_POST['departamento'];
$telefono = $_POST['telefono'];
$fecha_nacimiento = $_POST['fecha_nacimiento'];
$sexo = $_POST['sexo'];

// Preparar la consulta SQL
$sql = "INSERT INTO estudiantes (codigo, nombre, direccion, municipio, departamento, telefono, fecha_nacimiento, sexo) 
        VALUES ('$codigo', '$nombre', '$direccion', '$municipio', '$departamento', '$telefono', '$fecha_nacimiento', '$sexo')";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "<script>alert('Estudiante registrado correctamente'); window.location.href='estudiante.html';</script>";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
