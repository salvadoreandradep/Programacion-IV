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
                <p><strong>Nombre:</strong> <?php echo $row['nombre']; ?></p>
                <p><strong>Apellido:</strong> <?php echo $row['apellido']; ?></p>
                <p><strong>Correo Electrónico:</strong> <?php echo $row['correo']; ?></p>
                <p><strong>Teléfono:</strong> <?php echo $row['telefono']; ?></p>
                <p><strong>Tipo de Usuario:</strong> <?php echo $row['tipo']; ?></p>
            </div>
        <?php else: ?>
            <p>Error: No se encontraron detalles del usuario.</p>
        <?php endif; ?>
        <a href="/Formularios/Editar_Perfil.php"><button>Editar Perfil</button></a>
    </div>
</body>
</html>


