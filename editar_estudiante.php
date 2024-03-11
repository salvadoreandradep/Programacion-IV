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

// Obtener el ID del estudiante a editar
$id = $_GET['id'];

// Consulta SQL para obtener los datos del estudiante
$sql = "SELECT * FROM estudiantes WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Aquí puedes mostrar un formulario prellenado con los datos del estudiante para permitir su edición
    // Por ejemplo:
    ?>
    <!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Estudiante</title>
    </head>
    <body>
        <h2>Editar Estudiante</h2>
        <form action="guardar_edicion_estudiante.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="codigo">Código:</label>
    <input type="text" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>"><br>
    
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
    
    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" value="<?php echo $row['direccion']; ?>"><br>
    
    <label for="municipio">Municipio:</label>
    <input type="text" id="municipio" name="municipio" value="<?php echo $row['municipio']; ?>"><br>
    
    <label for="departamento">Departamento:</label>
    <input type="text" id="departamento" name="departamento" value="<?php echo $row['departamento']; ?>"><br>
    
    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" value="<?php echo $row['telefono']; ?>"><br>
    
    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $row['fecha_nacimiento']; ?>"><br>
    
    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo">
        <option value="Masculino" <?php if ($row['sexo'] == 'Masculino') echo 'selected'; ?>>Masculino</option>
        <option value="Femenino" <?php if ($row['sexo'] == 'Femenino') echo 'selected'; ?>>Femenino</option>
        <option value="Otro" <?php if ($row['sexo'] == 'Otro') echo 'selected'; ?>>Otro</option>
    </select><br>
    
    <input type="submit" value="Guardar Cambios">
</form>

    </body>
    </html>
    <?php
} else {
    echo "No se encontró ningún estudiante con ese ID.";
}

$conn->close();
?>
