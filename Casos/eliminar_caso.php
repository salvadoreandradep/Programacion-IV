<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "legalcc";

$conn = new mysqli($servername, $username, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Función para eliminar un archivo
function eliminarArchivo($ubicacion) {
    if (file_exists($ubicacion)) {
        unlink($ubicacion);
    }
}

// Función para eliminar los documentos asociados al caso
function eliminarDocumentos($referencia, $conn) {
    $sql = "SELECT ubicacion_archivo FROM documentos WHERE caso_referencia='$referencia'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            eliminarArchivo($row["ubicacion_archivo"]);
        }
    }
    // Eliminar los registros de documentos en la base de datos
    $sql = "DELETE FROM documentos WHERE caso_referencia='$referencia'";
    $conn->query($sql);
}

// Función para eliminar las evidencias relacionadas con el caso
function eliminarEvidencias($referencia, $conn) {
    // Eliminar los registros de evidencias en la base de datos
    $sql = "DELETE FROM evidencias WHERE caso_referencia='$referencia'";
    $conn->query($sql);
}

// Obtener la referencia del caso a eliminar
$referencia = $_GET["referencia"];

// Eliminar documentos asociados al caso
eliminarDocumentos($referencia, $conn);

// Eliminar evidencias relacionadas con el caso
eliminarEvidencias($referencia, $conn);

// Eliminar el caso en sí
$sql = "DELETE FROM casos WHERE referencia='$referencia'";
if ($conn->query($sql) === TRUE) {
    echo "Caso eliminado correctamente.";
} else {
    echo "Error al eliminar el caso: " . $conn->error;
}

$conn->close();
?>

