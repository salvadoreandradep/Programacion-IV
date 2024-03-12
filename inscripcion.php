<!DOCTYPE html>
<html>
<head>
    <title>Inscripción de Estudiante</title>
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
    <h2>Inscripción de Estudiante</h2>
    <form method="POST" action="procesar_inscripcion.php">
        Nombre del Estudiante: 
        <select name="codigo_estudiante">
            <?php
            // Conexión a la base de datos
            $conexion = new mysqli("localhost", "root", "", "appacademica");
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta para obtener los estudiantes
            $query_estudiantes = "SELECT id, nombre FROM estudiantes";
            $result_estudiantes = $conexion->query($query_estudiantes);

            // Generar las opciones del select con los nombres de los estudiantes
            while ($row = $result_estudiantes->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
            }

            // Cerrar conexión
            $conexion->close();
            ?>
        </select>
        <br><br>
        Materia: 
        <select name="materia">
            <?php
            // Conexión a la base de datos (puedes modificar los datos de conexión según tu configuración)
            $conexion = new mysqli("localhost", "root", "", "appacademica");
            if ($conexion->connect_error) {
                die("Error de conexión: " . $conexion->connect_error);
            }

            // Consulta para obtener las materias
            $query_materias = "SELECT id, nombre FROM datos";
            $result_materias = $conexion->query($query_materias);

            // Generar las opciones del select con los nombres de las materias
            while ($row = $result_materias->fetch_assoc()) {
                echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
            }

            // Cerrar conexión
            $conexion->close();
            ?>
        </select>
        <br><br>
        Ciclo: <input type="text" name="ciclo"><br><br>
        Fecha de Inscripción: <input type="date" name="fecha_inscripcion"><br><br>
        <input type="submit" value="Inscribir">
    </form>

    <div>

        <button class="boton-redireccionador" onclick="window.location.href = 'mostrar_inscripciones.php';">Tabla</button>
        
        </div>
</body>
</html>

