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
        .acciones {
            display: flex;
            justify-content: space-between;
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
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        #busqueda {
  padding: 10px;
  width: 700px;
  border: 1px solid #ccc;
  border-radius: 50px;
  font-size: 16px;
  outline: none;
}

/* Estilos para el placeholder */
#busqueda::placeholder {
  color: #999;
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
<h2>Listado de Estudiantes</h2>

<input type="text" id="busqueda" onkeyup="buscarEstudiante()" placeholder="Buscar por nombre...">
</center>
<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Credito</th>
            

            <th>Acciones</th>
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
        $sql = "SELECT * FROM datos";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Mostrar los datos en la tabla
            while($row = $result->fetch_assoc()) {
                echo "<tr id='fila-" . $row["id"] . "'>";
                echo "<td>" . $row["codigo"] . "</td>";
                echo "<td>" . $row["nombre"] . "</td>";
                echo "<td>" . $row["creditos"] . "</td>";
                      
                echo "<td class='acciones'>";
                echo "<button onclick='eliminarEstudiante(" . $row["id"] . ")'>Eliminar</button>";
                echo "<button onclick='modificarEstudiante(" . $row["id"] . ")'>Modificar</button>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 Resultados.</td></tr>";
        }
        $conn->close();
        ?>
    </tbody>
</table>

<script>
    // Función para eliminar un estudiante
    function eliminarEstudiante(id) {
        if (confirm("¿Estás seguro de que deseas eliminar este estudiante?")) {
            // Realizar una solicitud AJAX para eliminar el estudiante
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    // Eliminar la fila de la tabla
                    var fila = document.getElementById("fila-" + id);
                    fila.parentNode.removeChild(fila);
                    alert("Estudiante eliminado correctamente");
                }
            };
            xhttp.open("GET", "eliminar_materia.php?id=" + id, true);
            xhttp.send();
        }
    }

    // Función para redirigir a la página de modificación de estudiante
    function modificarEstudiante(id) {
        // Redirigir a una página de edición con el ID del estudiante
        window.location.href = "editar_materia.php?id=" + id;
    }


    function buscarEstudiante() {
        var input, filtro, tabla, tr, td, i, txtValue;
        input = document.getElementById("busqueda");
        filtro = input.value.toUpperCase();
        tabla = document.querySelector("table");
        tr = tabla.getElementsByTagName("tr");

        // Iterar sobre todas las filas y ocultar aquellas que no coincidan con la búsqueda
        for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("td")[1]; // Cambia el índice si quieres buscar en otra columna
            if (td) {
                txtValue = td.textContent || td.innerText;
                if (txtValue.toUpperCase().indexOf(filtro) > -1) {
                    tr[i].style.display = "";
                } else {
                    tr[i].style.display = "none";
                }
            }
        }
    }
</script>

</script>


</body>
</html>
