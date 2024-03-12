<?php
// Verificar si se ha enviado un ID válido para eliminar la matrícula
if (isset($_POST['id']) && !empty($_POST['id'])) {
    $id = $_POST['id'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "appacademica");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Preparar la consulta SQL para eliminar la matrícula
    $query = "DELETE FROM matriculas WHERE id = $id";

    // Ejecutar la consulta
    if ($conexion->query($query) === TRUE) {
        // Si la eliminación fue exitosa, enviar una respuesta HTTP 200 OK
        http_response_code(200);
    } else {
        // Si ocurrió un error al eliminar la matrícula, enviar una respuesta HTTP 500 Internal Server Error
        http_response_code(500);
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    // Si no se proporcionó un ID válido, enviar una respuesta HTTP 400 Bad Request
    http_response_code(400);
}
?>
