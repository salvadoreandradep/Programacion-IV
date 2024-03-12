<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Matrículas</title>
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
<center>
<h2>Registro de Matrículas</h2>
</center>
<form method="post" action="guardar_matricula.php">
    <label for="codigo">Código del Estudiante:</label><br>
    <select name="codigo" id="codigo" required>
        <?php
        // Conexión a la base de datos
        $conexion = new mysqli("localhost", "root", "", "appacademica");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Consulta para obtener los nombres de los estudiantes
        $query = "SELECT codigo, nombre FROM estudiantes";
        $result = $conexion->query($query);

        // Mostrar los nombres de los estudiantes en un menú desplegable
        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['codigo'] . "'>" . $row['nombre'] . "</option>";
        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </select><br><br>

    <label for="ciclo">Ciclo:</label><br>
    <input type="text" name="ciclo" id="ciclo" autocomplete="off" required><br><br>

    <label for="fecha_matricula">Fecha de Matrícula:</label><br>
    <input type="date" name="fecha_matricula" id="fecha_matricula" autocomplete="off" required><br><br>

    <input type="submit" value="Registrar Matrícula">
</form>

<div>
<center>
<button class="boton-redireccionador" onclick="window.location.href = 'mostrar_matricula.php';">Tabla</button>
</center>
</div>
</body>
</html>
