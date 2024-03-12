<?php
// Verificar si se han enviado los datos del formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Datos de conexión a la base de datos (puedes modificarlos según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appacademica";

    // Obtener los datos del formulario
    $id_inscripcion = $_POST['id'];
    $codigo_estudiante = $_POST['codigo_estudiante'];
    $codigo_materia = $_POST['codigo_materia'];
    $ciclo = $_POST['ciclo'];
    $fecha_matricula = $_POST['fecha_matricula'];

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Consulta SQL para actualizar la inscripción en la base de datos
    $sql = "UPDATE inscripcion SET codigo_estudiante='$codigo_estudiante', codigo_materia='$codigo_materia', ciclo='$ciclo', fecha_matricula='$fecha_matricula' WHERE id=$id_inscripcion";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Estudiante registrado correctamente'); window.location.href='inscripcion.php';</script>";
    } else {
        echo "Error al actualizar la inscripción: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se han enviado los datos del formulario, redireccionar a la página de mostrar inscripciones
    header("Location: mostrar_inscripciones.php");
    exit;
}
?>
