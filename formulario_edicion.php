<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matrícula</title>
</head>
<body>

<h2>Editar Matrícula</h2>

<?php
// Verificar si se ha proporcionado un ID válido para la matrícula a editar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "appacademica");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta para obtener los datos de la matrícula
    $query = "SELECT * FROM matriculas WHERE id = $id";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        // Mostrar el formulario de edición con los datos de la matrícula
        $row = $result->fetch_assoc();
        ?>
        <form method="post" action="guardar_edicion_matricula.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="ciclo">Ciclo:</label><br>
            <input type="text" name="ciclo" id="ciclo" value="<?php echo $row['ciclo']; ?>"><br><br>

            <label for="fecha_matricula">Fecha de Matrícula:</label><br>
            <input type="date" name="fecha_matricula" id="fecha_matricula" value="<?php echo $row['fecha_matricula']; ?>"><br><br>

            <input type="submit" value="Guardar Cambios">
        </form>
        <?php
    } else {
        echo "No se encontró la matrícula.";
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "ID de matrícula no proporcionado.";
}
?>

</body>
</html>
