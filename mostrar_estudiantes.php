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
                echo "</tr>";
            }
        } else {
            echo "0 resultados";
        }
        $conn->close();
        ?>
    </tbody>
</table>

<form>
    <li><a href="estudiante.html">Volver</a></li>
</form>

</body>
</html>
