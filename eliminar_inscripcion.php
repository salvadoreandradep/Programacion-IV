<?php
// Verificar si se ha pasado el ID de la inscripción a eliminar
if (isset($_GET['id'])) {
    // Datos de conexión a la base de datos (puedes modificarlos según tu configuración)
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "appacademica";

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }

    // Obtener el ID de la inscripción a eliminar
    $id_inscripcion = $_GET['id'];

    // Consulta SQL para eliminar la inscripción
    $sql = "DELETE FROM inscripcion WHERE id = $id_inscripcion";

    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Estudiante registrado correctamente'); window.location.href='inscripcion.php';</script>";
    } else {
        echo "Error al eliminar la inscripción: " . $conn->error;
    }

    // Cerrar conexión
    $conn->close();
} else {
    // Si no se pasó el ID de la inscripción, redireccionar a la página de mostrar inscripciones
    header("Location: mostrar_inscripciones.php");
    exit;
}
?>
