<?php
// Verificar si se han enviado los datos del formulario de edición
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar si se ha proporcionado un ID válido para la matrícula a editar
    if (isset($_POST['id']) && !empty($_POST['id'])) {
        $id = $_POST['id'];
        $ciclo = $_POST['ciclo'];
        $fecha_matricula = $_POST['fecha_matricula'];

        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "appacademica");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Preparar la consulta SQL para actualizar la matrícula
        $query = "UPDATE matriculas SET ciclo = '$ciclo', fecha_matricula = '$fecha_matricula' WHERE id = $id";

        // Ejecutar la consulta
        if ($conexion->query($query) === TRUE) {
            // Si la actualización fue exitosa, redirigir al usuario a la página de lista de matrículas
            header("Location: matricula.php");
            exit;
        } else {
            echo "Error al actualizar la matrícula: " . $conexion->error;
        }

        // Cerrar la conexión
        $conexion->close();
    } else {
        echo "ID de matrícula no proporcionado.";
    }
} else {
    // Si se intenta acceder directamente a este archivo sin enviar datos del formulario, redirigir al usuario a la página de lista de matrículas
    header("Location: lista_matriculas.php");
    exit;
}
?>
