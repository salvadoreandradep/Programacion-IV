<?php
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
$nombre = $_POST['nombre'];
$apellido = $_POST['apellido'];
$telefono = $_POST['telefono'];
$profesion = $_POST['profesion'];
$email = $_POST['email'];
$password = $_POST['password'];
$confirm_password = $_POST['confirm_password'];


// Subir la fotografía
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fotografia"]["name"]);
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Verificar si el archivo es una imagen real
$check = getimagesize($_FILES["fotografia"]["tmp_name"]);
if ($check === false) {
    die("El archivo no es una imagen.");
}

// Mover el archivo a la carpeta de destino
if (!move_uploaded_file($_FILES["fotografia"]["tmp_name"], $target_file)) {
    die("Error al subir la fotografía.");
}

// Encriptar la contraseña
$hashed_password = password_hash($password, PASSWORD_DEFAULT);

// Insertar datos en la base de datos
$sql = "INSERT INTO users (fotografia, nombre, apellido, telefono, profesion, email, password)
        VALUES ('$target_file', '$nombre', '$apellido', '$telefono', '$profesion', '$email', '$hashed_password')";

if ($conn->query($sql) === TRUE) {
    echo "Registro exitoso.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
