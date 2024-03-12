<?php
// Recibir los datos del formulario
$codigo = $_POST['codigo'];
$ciclo = $_POST['ciclo'];
$fecha_matricula = $_POST['fecha_matricula'];

// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "appacademica");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Preparar la consulta SQL para insertar la matrícula
$query = "INSERT INTO matriculas (codigo_estudiante, ciclo, fecha_matricula) VALUES ('$codigo', '$ciclo', '$fecha_matricula')";

// Ejecutar la consulta
if ($conexion->query($query) === TRUE) {
    echo "<script>alert('Estudiante registrado correctamente'); window.location.href='matricula.php';</script>";
} else {
    echo "Error al registrar la matrícula: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
