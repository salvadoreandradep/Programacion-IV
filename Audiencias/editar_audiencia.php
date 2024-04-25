<!DOCTYPE html>
<html>
<head>
    <title>Editar Audiencia</title>
</head>
<body>

<h2>Editar Audiencia</h2>

<?php
// Conexión a la base de datos MySQL
$servername = "localhost";
$username = "root";
$password = "";
$database = "legalcc";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}

// Si se envió el formulario de edición, actualizar la audiencia en la base de datos
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar datos del formulario
    $id = $_POST["id"];
    $titulo = $_POST["titulo"];
    $caso = $_POST["caso"];
    $modalidad = $_POST["modalidad"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $imputado = $_POST["imputado"];
    $victima = $_POST["victima"];
    $delito = $_POST["delito"];
    $descripcion = $_POST["descripcion"];
    $juzgado = $_POST["juzgado"];
    $abogado = $_POST["abogado"];
    $fiscal = $_POST["fiscal"];
    $sala = $_POST["sala"];
    $juez_suplente = $_POST["juez_suplente"];
    
    // Actualizar la audiencia en la base de datos
    $sql = "UPDATE audiencias SET titulo='$titulo', caso='$caso', modalidad='$modalidad', fecha='$fecha', hora='$hora', imputado='$imputado', victima='$victima', delito='$delito', descripcion='$descripcion', juzgado='$juzgado', abogado='$abogado', fiscal='$fiscal', sala='$sala', juez_suplente='$juez_suplente' WHERE id=$id";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: ver_audiencia.php?id=1");
        exit();
    } else {
        echo "Error al actualizar la audiencia: " . $conn->error;
    }
}

// Obtener el ID de la audiencia de la URL
$id = $_GET["id"];

// Consulta para obtener la información de la audiencia específica
$sql = "SELECT * FROM audiencias WHERE id = $id";
$result = $conn->query($sql);

// Mostrar el formulario de edición de la audiencia
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    ?>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        
        <label>Título de Audiencia:</label><br>
        <input type="text" name="titulo" value="<?php echo $row['titulo']; ?>"><br><br>
        
        <label>Seleccionar Caso:</label><br>
        <select name="caso">
            <option value="Caso 1" <?php if ($row['caso'] == 'Caso 1') echo 'selected'; ?>>Caso 1</option>
            <option value="Caso 2" <?php if ($row['caso'] == 'Caso 2') echo 'selected'; ?>>Caso 2</option>
            <option value="Caso 3" <?php if ($row['caso'] == 'Caso 3') echo 'selected'; ?>>Caso 3</option>
        </select><br><br>
        
        <label>Modalidad de Audiencia:</label><br>
        <select name="modalidad">
            <option value="Presencial" <?php if ($row['modalidad'] == 'Presencial') echo 'selected'; ?>>Presencial</option>
            <option value="Virtual" <?php if ($row['modalidad'] == 'Virtual') echo 'selected'; ?>>Virtual</option>
        </select><br><br>
        
        <label>Fecha:</label><br>
        <input type="date" name="fecha" value="<?php echo $row['fecha']; ?>"><br><br>
        
        <label>Hora:</label><br>
        <input type="time" name="hora" value="<?php echo $row['hora']; ?>"><br><br>
        
        <label>Imputado:</label><br>
        <input type="text" name="imputado" value="<?php echo $row['imputado']; ?>"><br><br>
        
        <label>Víctima:</label><br>
        <input type="text" name="victima" value="<?php echo $row['victima']; ?>"><br><br>
        
        <label>Tipo de Delito:</label><br>
        <select name="delito">
            <option value="Homicidio" <?php if ($row['delito'] == 'Homicidio') echo 'selected'; ?>>Homicidio</option>
            <option value="Violacion" <?php if ($row['delito'] == 'Violacion') echo 'selected'; ?>>Violación</option>
            <option value="Hurto" <?php if ($row['delito'] == 'Hurto') echo 'selected'; ?>>Hurto</option>
        </select><br><br>
        
        <label>Descripción de la Audiencia:</label><br>
        <textarea name="descripcion"><?php echo $row['descripcion']; ?></textarea><br><br>
        
        <label>Seleccionar Juzgado:</label><br>
        <select name="juzgado">
            <option value="Juzgado 1" <?php if ($row['juzgado'] == 'Juzgado 1') echo 'selected'; ?>>Juzgado 1</option>
            <option value="Juzgado 2" <?php if ($row['juzgado'] == 'Juzgado 2') echo 'selected'; ?>>Juzgado 2</option>
            <option value="Juzgado 3" <?php if ($row['juzgado'] == 'Juzgado 3') echo 'selected'; ?>>Juzgado 3</option>
        </select><br><br>
        
        <label>Seleccionar Abogado:</label><br>
        <select name="abogado">
            <option value="Abogado 1" <?php if ($row['abogado'] == 'Abogado 1') echo 'selected'; ?>>Abogado 1</option>
            <option value="Abogado 2" <?php if ($row['abogado'] == 'Abogado 2') echo 'selected'; ?>>Abogado 2</option>
            <option value="Abogado 3" <?php if ($row['abogado'] == 'Abogado 3') echo 'selected'; ?>>Abogado 3</option>
        </select><br><br>
        
        <label>Seleccionar Fiscal:</label><br>
        <select name="fiscal">
            <option value="Fiscal 1" <?php if ($row['fiscal'] == 'Fiscal 1') echo 'selected'; ?>>Fiscal 1</option>
            <option value="Fiscal 2" <?php if ($row['fiscal'] == 'Fiscal 2') echo 'selected'; ?>>Fiscal 2</option>
            <option value="Fiscal 3" <?php if ($row['fiscal'] == 'Fiscal 3') echo 'selected'; ?>>Fiscal 3</option>
        </select><br><br>
        
        <label>Sala de Audiencias:</label><br>
        <select name="sala">
            <option value="Sala 1" <?php if ($row['sala'] == 'Sala 1') echo 'selected'; ?>>Sala 1</option>
            <option value="Sala 2" <?php if ($row['sala'] == 'Sala 2') echo 'selected'; ?>>Sala 2</option>
            <option value="Sala 3" <?php if ($row['sala'] == 'Sala 3') echo 'selected'; ?>>Sala 3</option>
        </select><br><br>
        
        <label>Juez Suplente:</label><br>
        <select name="juez_suplente">
            <option value="Suplente 1" <?php if ($row['juez_suplente'] == 'Suplente 1') echo 'selected'; ?>>Suplente 1</option>
            <option value="Suplente 2" <?php if ($row['juez_suplente'] == 'Suplente 2') echo 'selected'; ?>>Suplente 2</option>
            <option value="Suplente 3" <?php if ($row['juez_suplente'] == 'Suplente 3') echo 'selected'; ?>>Suplente 3</option>
        </select><br><br>
        
        <input type="submit" value="Guardar Cambios">
    </form>
    <?php
} else {
    echo "No se encontró la audiencia.";
}

// Cerrar la conexión
$conn->close();
?>

</body>
</html>
