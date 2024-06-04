<?php
session_start();

// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legalconnect";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Obtener datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Buscar el usuario en la base de datos
$sql = "SELECT * FROM users WHERE email='$email'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario encontrado
    $user = $result->fetch_assoc();
    if (password_verify($password, $user['password'])) {
        // Contraseña válida
        $_SESSION['user_id'] = $user['id'];
        header("Location: Pagina_principal.php");
    } else {
        
        header("Location: Iniciar_Sesion.php?error=1");
        exit();
    }
} else {
    // Usuario no encontrado
    echo "Usuario no encontrado.";
}

$conn->close();
?>
