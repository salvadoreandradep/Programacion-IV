<!DOCTYPE html>
<html>
<head>
    <title>Modificar Inscripción</title>
</head>
<body>
    <h2>Modificar Inscripción</h2>
    <?php
    // Verificar si se ha pasado el ID de la inscripción a modificar
    if (isset($_GET['id'])) {
        // Datos de conexión a la base de datos (puedes modificarlos según tu configuración)
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "appacademica";

        // Crear conexión
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verificar conexión
        if ($conn->connect_error) {
            die("Error de conexión: " . $conn->connect_error);
        }

        // Obtener el ID de la inscripción a modificar
        $id_inscripcion = $_GET['id'];

        // Consulta SQL para obtener los datos de la inscripción a modificar
        $sql = "SELECT * FROM inscripcion WHERE id = $id_inscripcion";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Obtener los datos de la inscripción
            $row = $result->fetch_assoc();
            $codigo_estudiante = $row['codigo_estudiante'];
            $codigo_materia = $row['codigo_materia'];
            $ciclo = $row['ciclo'];
            $fecha_matricula = $row['fecha_matricula'];

            // Consulta SQL para obtener la lista de estudiantes
            $sql_estudiantes = "SELECT id, nombre FROM estudiantes";
            $result_estudiantes = $conn->query($sql_estudiantes);

            // Consulta SQL para obtener la lista de materias
            $sql_materias = "SELECT id, nombre FROM datos";
            $result_materias = $conn->query($sql_materias);

            ?>
            <form method="POST" action="actualizar_inscripcion.php">
                <input type="hidden" name="id" value="<?php echo $id_inscripcion; ?>">
                Estudiante: 
                <select name="codigo_estudiante">
                    <?php
                    // Mostrar opciones de estudiantes
                    while ($row_estudiante = $result_estudiantes->fetch_assoc()) {
                        $selected = ($row_estudiante['id'] == $codigo_estudiante) ? "selected" : "";
                        echo "<option value='" . $row_estudiante['id'] . "' $selected>" . $row_estudiante['nombre'] . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                Materia: 
                <select name="codigo_materia">
                    <?php
                    // Mostrar opciones de materias
                    while ($row_materia = $result_materias->fetch_assoc()) {
                        $selected = ($row_materia['id'] == $codigo_materia) ? "selected" : "";
                        echo "<option value='" . $row_materia['id'] . "' $selected>" . $row_materia['nombre'] . "</option>";
                    }
                    ?>
                </select>
                <br><br>
                Ciclo: <input type="text" name="ciclo" value="<?php echo $ciclo; ?>"><br><br>
                Fecha de Inscripción: <input type="date" name="fecha_matricula" value="<?php echo $fecha_matricula; ?>"><br><br>
                <input type="submit" value="Guardar Cambios">
            </form>
            <?php
        } else {
            echo "No se encontró la inscripción.";
        }

        // Cerrar conexión
        $conn->close();
    } else {
        // Si no se pasó el ID de la inscripción, redireccionar a la página de mostrar inscripciones
        header("Location: mostrar_inscripciones.php");
        exit;
    }
    ?>
</body>
</html>

