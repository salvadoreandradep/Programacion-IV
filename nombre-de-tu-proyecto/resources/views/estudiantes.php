
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiantes</title>
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
    <center>
        <h1>Estudiantes</h1>
    </center>

<form action="guardar_estudiante.php" method="post">
    <label for="codigo">Código:</label>
    <input type="text" id="codigo" name="codigo" autocomplete="off" requiredrequired oninput="this.value = this.value.trim()">

    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" autocomplete="off" required required oninput="this.value = this.value.trim()">

    <label for="direccion">Dirección:</label>
    <input type="text" id="direccion" name="direccion" autocomplete="off" required required oninput="this.value = this.value.trim()">

    <label for="municipio">Municipio:</label>
    <input type="text" id="municipio" name="municipio" autocomplete="off" required required oninput="this.value = this.value.trim()">

    <label for="departamento">Departamento:</label>
    <input type="text" id="departamento" name="departamento" autocomplete="off" required required oninput="this.value = this.value.trim()">

    <label for="telefono">Teléfono:</label>
    <input type="tel" id="telefono" name="telefono" autocomplete="off" required required oninput="this.value = this.value.trim()">

    <label for="fecha_nacimiento">Fecha de Nacimiento:</label>
    <input type="date" id="fecha_nacimiento" name="fecha_nacimiento" autocomplete="off" required>

    <label for="sexo">Sexo:</label>
    <select id="sexo" name="sexo" required>
        <option value="Masculino">Masculino</option>
        <option value="Femenino">Femenino</option>
        <option value="Otro">Otro</option>
    </select>

    <input type="submit" value="Guardar">
</form>

<center>


<div>

<button class="boton-redireccionador" onclick="window.location.href = 'mostrar_estudiantes.php';">Tabla</button>

</div>
</center>
</html>