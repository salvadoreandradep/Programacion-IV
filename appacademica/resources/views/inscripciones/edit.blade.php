<!DOCTYPE html>
    <html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Editar Estudiante</title>
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
            <li><a href="/">Inicio</a></li>
            <li><a href="/estudiante">Estudiantes</a></li>
            <li><a href="/materia">Materia</a></li>
            <li><a href="/matricula">Matrícula</a></li>
            <li><a href="/inscricion">Inscripción</a></li>
        </ul>
    </nav>

<form method="POST" action="{{ route('inscripciones.update', $inscripcion->id) }}">
    @csrf
    @method('PUT')
    <label>Estudiante:</label>
    <select name="estudiante_id">
        <?php
        $conexion = new mysqli("localhost", "root", "", "laravel");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $query = "SELECT id, nombre FROM estudiantes";
        $result = $conexion->query($query);

        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }

        $conexion->close();
        ?>
    </select><br>
    <label>Materia:</label>
    <select name="materia_id">
            <?php
        $conexion = new mysqli("localhost", "root", "", "laravel");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $query = "SELECT id, nombre FROM materias";
        $result = $conexion->query($query);

        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }

        $conexion->close();
        ?>
    </select><br>
    <label>Ciclo:</label>
    <input type="text" name="ciclo" value="{{ $inscripcion->ciclo }}"><br>
    <label>Fecha de Inscripción:</label>
    <input type="date" name="fecha_inscripcion" value="{{ $inscripcion->fecha_inscripcion }}"><br>
    <button type="submit">Actualizar</button>
</form>
