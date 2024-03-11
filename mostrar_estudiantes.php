<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Estudiantes</title>
    <style>
        /* Estilos para la tabla */
        table {
            width: 80%;
            border-collapse: collapse;
            margin: 20px auto;
        }
        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .acciones {
            display: flex;
            justify-content: space-between;
        }
    </style>
</head>
<body>

<h2>Listado de Estudiantes</h2>

<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Dirección</th>
            <th>Municipio</th>
            <th>Departamento</th>
            <th>Teléfono</th>
            <th>Fecha de Nacimiento</th>
            <th>Sexo</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "appacademica";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para obtener los datos de los estudiantes
        $sql = "SELECT * FROM estudiantes";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos en la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["codigo"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["direccion"] . "</td>";
                echo "<td>" . $row["municipio"] . "</td>";
                echo "<td>" . $row["departamento"] . "</td>";
                echo "<td>" . $row["telefono"] . "</td>";
                echo "<td>" . $row["fecha_nacimiento"] . "</td>";
                echo "<td>" . $row["sexo"] . "</td>";
                echo "<td class='acciones'>";
                echo "<button onclick='eliminarEstudiante(" . $row["id"] . ")'>Eliminar</button>";
                echo "<button onclick='modificarEstudiante(" . $row["id"] . ")'>Modificar</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </tbody>
</table>

<script>
    // Función para eliminar un estudiante
    function eliminarEstudiante(id) {
        if (confirm("¿Estás seguro de que deseas eliminar este estudiante?")) {
            // Realizar una solicitud AJAX para eliminar el estudiante
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Eliminar la fila de la tabla
                    var fila = document.getElementById("fila-" + id);
                    fila.parentNode.removeChild(fila);
                    alert("Estudiante eliminado correctamente");
                }
            };
            xhttp.open("GET", "eliminar_estudiante.php?id=" + id, true);
            xhttp.send();
        }
    }

    // Función para redirigir a la página de modificación de estudiante
    function modificarEstudiante(id) {
        // Redirigir a una página de edición con el ID del estudiante
        window.location.href = "editar_estudiante.php?id=" + id;
    }
</script>


</body>
</html>

