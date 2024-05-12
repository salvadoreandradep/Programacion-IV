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
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Caso</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }
                .container form {
                    margin-bottom: 20px;
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
                input[type="text"], input[type="file"] {
                    width: calc(100% - 20px);
                    padding: 10px;
                    margin-bottom: 10px;
                }
                input[type="submit"], .btn {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
                .btn {
                    display: inline-block;
                    margin-right: 10px;
                }
            </style>
        </head>
        <body>
            <div class="container">
                <h2>Editar Caso</h2>
                <form action="actualizar_caso.php" method="post">
                    <input type="hidden" name="referencia" value="<?php echo $row['referencia']; ?>">
                    <label for="victima">Víctima:</label><br>
                    <input type="text" id="victima" name="victima" value="<?php echo $row['victima']; ?>"><br>
                    <label for="imputado">Imputado:</label><br>
                    <input type="text" id="imputado" name="imputado" value="<?php echo $row['imputado']; ?>"><br>
                    <label for="tipo_delito">Tipo de Delito:</label><br>
                    <input type="text" id="tipo_delito" name="tipo_delito" value="<?php echo $row['tipo_delito']; ?>"><br>
                    <input type="submit" value="Guardar Cambios">
                </form>
                <div class="card">
                    <h3>Evidencias</h3>
                    <form action="agregar_evidencia.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="referencia" value="<?php echo $row['referencia']; ?>">
                        <input type="file" name="evidencia[]" multiple>
                        <input type="submit" value="Agregar Evidencia" class="btn">
                    </form>
                    <?php
                    // Consulta para obtener las evidencias asociadas al caso
                    $sql_evidencia = "SELECT * FROM evidencias WHERE caso_referencia = '$referencia'";
                    $result_evidencia = $conn->query($sql_evidencia);
                    if ($result_evidencia->num_rows > 0) {
                        echo "<div class='evidencia'>";
                        while($row_evidencia = $result_evidencia->fetch_assoc()) {
                            echo "<div>";
                            echo "<img src='" . $row_evidencia["ubicacion_archivo"] . "' alt='Evidencia'>";
                            echo "<a href='eliminar_evidencia.php?id=" . $row_evidencia["id"] . "'>Eliminar</a>";
                            echo "</div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>No hay evidencia asociada a este caso.</p>";
                    }
                    ?>
                </div>
                <div class="card">
                    <h3>Documento</h3>
                    <!-- Puedes agregar un formulario para actualizar el documento aquí -->
                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontraron detalles para la referencia de caso proporcionada.";
    }

    $conn->close();
} else {
    echo "No se proporcionó una referencia de caso válida.";
}
?>
