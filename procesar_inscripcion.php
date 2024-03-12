<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de conexión a la base de datos (puedes modificarlos según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appacademica";

    // Obtener los datos del formulario
    $codigo_estudiante = $_POST['codigo_estudiante'];
    $materia = $_POST['materia'];
    $ciclo = $_POST['ciclo'];
    $fecha_inscripcion = $_POST['fecha_inscripcion'];

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para insertar la inscripción en la base de datos
    $sql = "INSERT INTO inscripcion (codigo_estudiante, codigo_materia, ciclo, fecha_matricula) VALUES ('$codigo_estudiante', '$materia', '$ciclo', '$fecha_inscripcion')";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Estudiante registrado correctamente'); window.location.href='inscripcion.php';</script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se han enviado los datos del formulario, redireccionar al formulario de inscripción
    header("Location: formulario_inscripcion.php");
    exit;
}
?>
