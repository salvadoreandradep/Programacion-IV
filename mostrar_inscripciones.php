<!DOCTYPE html>
<html>
<head>
    <title>Lista de Inscripciones</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        /* Estilos para el formulario */
        form {
            width: 50%;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-bottom: 10px;
        }
        input[type="text"], input[type="tel"], input[type="date"], select {
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        nav {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
        }
        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }
        nav ul li {
            display: inline;
            margin-right: 20px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        nav ul li a:hover {
            text-decoration: underline;
        }

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
        .boton-redireccionador {
      display: inline-block;
      padding: 10px 20px;
      background-color: #4CAF50;
      color: white;
      text-decoration: none;
      border: none;
      border-radius: 5px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .boton-redireccionador:hover {
      background-color: #45a049;
    }
    </style>
</head>
<body>
<nav>
        <ul>
            <li><a href="inicio.html">Inicio</a></li>
            <li><a href="estudiante.html">Estudiantes</a></li>
            <li><a href="materia.html">Materia</a></li>
            <li><a href="matricula.php">Matrícula</a></li>
            <li><a href="inscripcion.php">Inscripción</a></li>
        </ul>
    </nav>
    <h2>Lista de Inscripciones</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Estudiante</th>
            <th>Materia</th>
            <th>Ciclo</th>
            <th>Fecha de Inscripción</th>
            <th>Acciones</th>
        </tr>
        <?php
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

        // Consulta SQL para obtener las inscripciones
        $sql = "SELECT inscripcion.id, matriculas.codigo_estudiante as codigo_estudiante, datos.nombre as materia, inscripcion.ciclo, inscripcion.fecha_matricula 
        FROM inscripcion
        INNER JOIN matriculas ON inscripcion.codigo_estudiante = matriculas.id
        INNER JOIN datos ON inscripcion.codigo_materia = datos.id";
        $result = $conn->query($sql);

        // Verificar si la consulta tuvo éxito
        if ($result === false) {
            echo "Error en la consulta: " . $conn->error;
        } else {
            // Mostrar los datos en la tabla
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['id'] . "</td>";
                    echo "<td>" . $row['codigo_estudiante'] . "</td>";
                    echo "<td>" . $row['materia'] . "</td>";
                    echo "<td>" . $row['ciclo'] . "</td>";
                    echo "<td>" . $row['fecha_matricula'] . "</td>";
                    echo "<td>";
                echo "<a href='eliminar_inscripcion.php?id=" . $row['id'] . "'>Eliminar</a> | ";
            
                echo "</td>";
                echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>0 Resultados.</td></tr>";
            }
        }
        // Cerrar conexión
        $conn->close();
        ?>
    </table>
</body>
</html>