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

// Obtener el ID del estudiante a editar
$id = $_GET['id'];

// Consulta SQL para obtener los datos del estudiante
$sql = "SELECT * FROM datos WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Aquí puedes mostrar un formulario prellenado con los datos del estudiante para permitir su edición
    // Por ejemplo:
    ?>
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
            <li><a href="inicio.html">Inicio</a></li>
            <li><a href="estudiante.html">Estudiantes</a></li>
            <li><a href="materia.html">Materia</a></li>
            <li><a href="matricula.php">Matrícula</a></li>
            <li><a href="inscripcion.php">Inscripción</a></li>
        </ul>
    </nav>
    <center>

        <h2>Editar Estudiante</h2>
        </center>
        <form action="guardar_edicion_materia.php" method="post">
    <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
    <label for="codigo">Código:</label>
    <input type="text" id="codigo" name="codigo" value="<?php echo $row['codigo']; ?>"><br>
    
    <label for="nombre">Nombre:</label>
    <input type="text" id="nombre" name="nombre" value="<?php echo $row['nombre']; ?>"><br>
    
    <label for="creditos">Dirección:</label>
    <input type="text" id="crditos" name="creditos" value="<?php echo $row['creditos']; ?>"><br>
    
    
    <input type="submit" value="Guardar Cambios">
</form>

    </body>
    </html>
    <?php
} else {
    echo "No se encontró ningún estudiante con ese ID.";
}

$conn->close();
?>