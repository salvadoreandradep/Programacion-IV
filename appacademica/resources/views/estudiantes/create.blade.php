

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
        #busqueda {
  padding: 10px;
  width: 100%;
  max-width: 700px; 
  border: 2px solid #ccc; 
  border-radius: 25px; 
  font-size: 18px; 
  outline: none;
  transition: border-color 0.3s ease; 
}

/* Estilos para el placeholder */
#busqueda::placeholder {
  color: #999;
}

/* Estilos para cuando el campo de búsqueda está enfocado */
#busqueda:focus {
  border-color: #66afe9; 
}
    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="inicio">Inicio</a></li>
            <li><a href="">Estudiantes</a></li>
            <li><a href="materia">Materia</a></li>
            <li><a href="matricula.php">Matrícula</a></li>
            <li><a href="inscripcion.php">Inscripción</a></li>
        </ul>
    </nav>
    <center>
        <h1>Estudiantes</h1>
    </center>

    <form method="POST" action="/estudiantes">
    @csrf
    <label>Código:</label>
    <input type="text" name="codigo"><br>
    <label>Nombre:</label>
    <input type="text" name="nombre"><br>
    <label>Dirección:</label>
    <input type="text" name="direccion"><br>
    <label>Municipio:</label>
    <input type="text" name="municipio"><br>
    <label>Departamento:</label>
    <input type="text" name="departamento"><br>
    <label>Teléfono:</label>
    <input type="text" name="telefono"><br>
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento"><br>
    <label>Sexo:</label>
    <select name="sexo">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select><br>
    <button type="submit">Guardar</button>
</form>

<button class="boton-redireccionador" onclick="window.location.href = 'estudiantes/create';">Tabla</button>

<center>


<input type="text" id="busqueda" placeholder="Buscar estudiantes..." autocomplete="off">
</center>
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
    <tbody id="tablaEstudiantes">
        <?php
        // Conexión a la base de datos
        $servername = "localhost";
        $username = "root";
        $password = "";
        $database = "laravel";

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
            echo "<tr><td colspan='9'>0 Resultados.</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

<script>
    // Obtener referencia al campo de búsqueda
    var inputBusqueda = document.getElementById('busqueda');
    // Obtener referencia a la tabla de estudiantes
    var tablaEstudiantes = document.getElementById('tablaEstudiantes');

    // Función para filtrar estudiantes según la búsqueda
    function filtrarEstudiantes() {
        var filtro = inputBusqueda.value.toUpperCase();
        var filas = tablaEstudiantes.getElementsByTagName('tr');
        
        for (var i = 0; i < filas.length; i++) {
            var datosEstudiante = filas[i].getElementsByTagName('td');
            var mostrarFila = false;

            for (var j = 0; j < datosEstudiante.length; j++) {
                var texto = datosEstudiante[j].innerText.toUpperCase();
                if (texto.indexOf(filtro) > -1) {
                    mostrarFila = true;
                    break;
                }
            }

            if (mostrarFila) {
                filas[i].style.display = "";
            } else {
                filas[i].style.display = "none";
            }
        }
    }

    // Escuchar el evento de cambio en el campo de búsqueda
    inputBusqueda.addEventListener('input', filtrarEstudiantes);

    // Función para eliminar un estudiante
    function eliminarEstudiante(id) {


     
    }

    // Función para redirigir a la página de modificación de estudiante
    function modificarEstudiante(id) {
        
    }
</script>

</body>
</html>

</html>

