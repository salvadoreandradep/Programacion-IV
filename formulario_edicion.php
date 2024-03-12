<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Matrícula</title>
</head>
<style>
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

<h2>Editar Matrícula</h2>

<?php
// Verificar si se ha proporcionado un ID válido para la matrícula a editar
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "appacademica");

    // Verificar la conexión
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta para obtener los datos de la matrícula
    $query = "SELECT * FROM matriculas WHERE id = $id";
    $result = $conexion->query($query);

    if ($result->num_rows > 0) {
        // Mostrar el formulario de edición con los datos de la matrícula
        $row = $result->fetch_assoc();
        ?>
        <form method="post" action="guardar_edicion_matricula.php">
            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
            <label for="ciclo">Ciclo:</label><br>
            <input type="text" name="ciclo" id="ciclo" value="<?php echo $row['ciclo']; ?>"><br><br>

            <label for="fecha_matricula">Fecha de Matrícula:</label><br>
            <input type="date" name="fecha_matricula" id="fecha_matricula" value="<?php echo $row['fecha_matricula']; ?>"><br><br>

            <input type="submit" value="Guardar Cambios">
        </form>
        <?php
    } else {
        echo "No se encontró la matrícula.";
    }

    // Cerrar la conexión
    $conexion->close();
} else {
    echo "ID de matrícula no proporcionado.";
}
?>

</body>
</html>
