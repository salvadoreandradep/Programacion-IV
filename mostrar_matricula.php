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

<h2>Lista de Matrículas</h2>

<table>
<table>
    <thead>
        <tr>
            <th>Código Estudiante</th>
            <th>Nombre Estudiante</th>
            <th>Ciclo</th>
            <th>Fecha de Matrícula</th>
            <th>Acciones</th>
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
            echo "<tr id='fila-" . $row['id'] . "'>";
            echo "<td>" . $row['codigo_estudiante'] . "</td>";
            echo "<td>" . $row['nombre'] . "</td>";
            echo "<td>" . $row['ciclo'] . "</td>";
            echo "<td>" . $row['fecha_matricula'] . "</td>";
            echo "<td>";
            echo "<button class='btn btn-editar' onclick='editarMatricula(" . $row['id'] . ")'>Editar</button>";
            echo "<button class='btn btn-eliminar' onclick='eliminarMatricula(" . $row['id'] . ")'>Eliminar</button>";
            echo "</td>";
            echo "</tr>";

        }

        // Cerrar la conexión
        $conexion->close();
        ?>
    </tbody>
</table>

</body>
<script>
    function editarMatricula(id) {
        // Redirige a la página de edición con el ID de la matrícula
        window.location.href = "editar_matricula.php?id=" + id;
    }

    function eliminarMatricula(id) {
        if (confirm("¿Estás seguro de que deseas eliminar esta matrícula?")) {
            // Envia una solicitud POST al servidor para eliminar la matrícula
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "eliminar_matricula.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState === 4 && xhr.status === 200) {
                    // Elimina la fila de la tabla si la eliminación fue exitosa
                    var fila = document.getElementById("fila-" + id);
                    fila.parentNode.removeChild(fila);
                    alert("Matrícula eliminada exitosamente.");
                }
            };
            xhr.send("id=" + id);
        }
    }
</script>

</html>
