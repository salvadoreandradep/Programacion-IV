<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Matrículas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
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

<h2>Lista de Matrículas</h2>

<table>
    <thead>
        <tr>
            <th>Código Estudiante</th>
            <th>Nombre Estudiante</th>
            <th>Ciclo</th>
            <th>Fecha de Matrícula</th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "appacademica");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta para obtener las matrículas
        $query = "SELECT m.*, e.nombre FROM matriculas m
                  INNER JOIN estudiantes e ON m.codigo_estudiante = e.codigo";
        $result = $conexion->query($query);

        // Mostrar las matrículas en la tabla
        while ($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $row['codigo_estudiante'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['ciclo'] . "</td>";
            echo "<td>" . $row['fecha_matricula'] . "</td>";
            echo "</tr>";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </tbody>
</table>

</body>
</html>
