<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles del Caso</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
        }
        .card {
            border: 1px solid #ccc;
            border-radius: 5px;
            padding: 20px;
            margin-bottom: 20px;
        }
        .card h3 {
            margin-top: 0;
        }
        .evidencia img {
            max-width: 100%;
            height: auto;
            margin-bottom: 10px;
        }
        .documento iframe {
            width: 100%;
            height: 500px;
            border: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        // Verificar si se proporcionó una referencia de caso válida en la URL
        if (isset($_GET['referencia'])) {
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

            // Obtener la referencia del caso desde la URL
            $referencia = $_GET['referencia'];

            // Consulta para obtener los detalles del caso
            $sql = "SELECT * FROM casos WHERE referencia = '$referencia'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                // Mostrar los detalles del caso
                echo "<div class='card'>";
                echo "<h3>Detalles del Caso</h3>";
                echo "<p><strong>Referencia:</strong> " . $row["referencia"] . "</p>";
                echo "<p><strong>Víctima:</strong> " . $row["victima"] . "</p>";
                echo "<p><strong>Imputado:</strong> " . $row["imputado"] . "</p>";
                echo "<p><strong>Tipo de Delito:</strong> " . $row["tipo_delito"] . "</p>";
                // Consulta para obtener la evidencia asociada al caso
                $sql_evidencia = "SELECT * FROM evidencias WHERE caso_referencia = '$referencia'";
                $result_evidencia = $conn->query($sql_evidencia);
                if ($result_evidencia->num_rows > 0) {
                    echo "<div class='evidencia'>";
                    echo "<h3>Evidencia</h3>";
                    while($row_evidencia = $result_evidencia->fetch_assoc()) {
                        // Obtener la extensión del archivo
                        $extension = pathinfo($row_evidencia["nombre_archivo"], PATHINFO_EXTENSION);
                        // Mostrar cada archivo de evidencia según su tipo
                        if ($extension == 'jpg' || $extension == 'jpeg' || $extension == 'png' || $extension == 'gif') {
                            // Archivo de imagen
                            echo "<img src='" . $row_evidencia["ubicacion_archivo"] . "' alt='Evidencia'>";
                        } elseif ($extension == 'mp4' || $extension == 'webm' || $extension == 'ogg') {
                            // Archivo de video
                            echo "<video controls>";
                            echo "<source src='" . $row_evidencia["ubicacion_archivo"] . "' type='video/" . $extension . "'>";
                            echo "Your browser does not support the video tag.";
                            echo "</video>";
                        } elseif ($extension == 'mp3' || $extension == 'ogg' || $extension == 'wav') {
                            // Archivo de audio
                            echo "<audio controls>";
                            echo "<source src='" . $row_evidencia["ubicacion_archivo"] . "' type='audio/" . $extension . "'>";
                            echo "<source src='" . $row_evidencia["ubicacion_archivo"] . "' type='audio/" . $extension . "'>";
                            echo "Your browser does not support the audio tag.";
                            echo "</audio>";
                            
                        } else {
                            // Otros tipos de archivos
                            echo "<p>No se puede mostrar la evidencia.</p>";
                        }
                    }
                    echo "</div>";
                } else {
                    echo "<p>No hay evidencia asociada a este caso.</p>";
                }
                
                // Consulta para obtener el documento asociado al caso
                $sql_documento = "SELECT * FROM documentos WHERE caso_referencia = '$referencia'";
                $result_documento = $conn->query($sql_documento);
                if ($result_documento->num_rows > 0) {
                    echo "<div class='documento'>";
                    echo "<h3>Documento</h3>";
                    while($row_documento = $result_documento->fetch_assoc()) {
                        // Mostrar el documento en un iframe
                        echo "<iframe src='" . $row_documento["ubicacion_archivo"] . "'></iframe>";
                    }
                    echo "</div>";
                } else {
                    echo "<p>No hay documento asociado a este caso.</p>";
                }
                echo "</div>"; // Cierre de la tarjeta de detalles del caso
            } else {
                echo "<p>No se encontraron detalles para la referencia de caso proporcionada.</p>";
            }

            $conn->close();
        } else {
            echo "<p>No se proporcionó una referencia de caso válida.</p>";
        }
        ?>
    </div>
</body>
</html>
