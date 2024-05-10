<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "legalcc");

// Verifica la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Recupera los datos del formulario
$referencia = $_POST['referencia'];
$victima = $_POST['victima'];
$inputado = $_POST['inputado'];
$delito = $_POST['delito'];
$evidencia = $_POST['evidencia'];

// Procesa el archivo subido
$nombreArchivo = $_FILES['documento']['name'];
$rutaTemporal = $_FILES['documento']['tmp_name'];
$rutaDestino = "archivos/" . $nombreArchivo;
move_uploaded_file($rutaTemporal, $rutaDestino);

$evidenciaValidada = false;

if (strpos($evidencia, 'rojo') !== false && strpos($evidencia, 'verde') !== false) {
    $evidenciaValidada = true;
}

// Guarda los datos en la base de datos
$sql = "INSERT INTO casos (referencia, documento, victima, inputado, delito, evidencia)
        VALUES ('$referencia', '$rutaDestino', '$victima', '$inputado', '$delito', '$evidencia')";

if ($conexion->query($sql) === TRUE) {
    echo "Caso guardado correctamente.";
} else {
    echo "Error al guardar el caso: " . $conexion->error;
}

// Cierra la conexión
$conexion->close();
?>
