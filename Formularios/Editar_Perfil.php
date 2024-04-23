<?php
// Iniciar sesión (si aún no se ha iniciado)
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: Iniciar_Sesion.php");
    exit();
}

// Obtener el ID de usuario de la sesión
$user_id = $_SESSION['user_id'];

// Conexión a la base de datos (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legalcc";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los detalles del usuario de la base de datos
$sql = "SELECT nombre, apellido, telefono, tipo, correo FROM usuarios WHERE id = $user_id";
$result = $conn->query($sql);

// Si se envió el formulario de actualización
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los nuevos valores del formulario
    $nuevo_nombre = $_POST['nombre'];
    $nuevo_apellido = $_POST['apellido'];
    $nuevo_telefono = $_POST['telefono'];

    // Actualizar los datos del usuario en la base de datos
    $update_sql = "UPDATE usuarios SET nombre = '$nuevo_nombre', apellido = '$nuevo_apellido', telefono = '$nuevo_telefono' WHERE id = $user_id";
    if ($conn->query($update_sql) === TRUE) {
        // Actualización exitosa, redirigir para evitar envíos repetidos del formulario
        header("Location: /Formularios/Perfil.php");
        exit();
    } else {
        echo "Error al actualizar los datos: " . $conn->error;
    }
}

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Principal</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Bienvenido</h1>
        <?php if ($result->num_rows > 0): ?>
            <?php $row = $result->fetch_assoc(); ?>
            <div class="user-details">
                <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <p><strong>Nombre:</strong> <input type="text" name="nombre" value="<?php echo $row['nombre']; ?>"></p>
                    <p><strong>Apellido:</strong> <input type="text" name="apellido" value="<?php echo $row['apellido']; ?>"></p>
                    <p><strong>Correo Electrónico:</strong> <?php echo $row['correo']; ?></p>
                    <p><strong>Teléfono:</strong> <input type="text" name="telefono" value="<?php echo $row['telefono']; ?>"></p>
                    <input type="submit" value="Actualizar">
                </form>
            </div>
        <?php else: ?>
            <p>Error: No se encontraron detalles del usuario.</p>
        <?php endif; ?>
        <a href="Cerrar_Sesion.php" class="btn">Cerrar Sesión</a>
    </div>
</body>
</html>