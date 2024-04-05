<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar en Base de Datos</title>
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
    margin-bottom:5px;
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
<body>

    <nav>
        <ul>
            <li><a href="inicio">Inicio</a></li>
            <li><a href="estudiante">Estudiantes</a></li>
            <li><a href="">Materia</a></li>
            <li><a href="matricula.php">Matrícula</a></li>
            <li><a href="inscripcion.php">Inscripción</a></li>
        </ul>
    </nav>
  

<form method="POST" action="{{ route('materias.store') }}">
    @csrf
    <label>Código:</label>
    <input type="text" name="codigo" value="{{ old('codigo') }}"><br>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ old('nombre') }}"><br>
    <label>Creditos:</label>
    <input type="number" name="creditos" value="{{ old('creditos') }}"><br>
    <button type="submit">Guardar</button>
</form>




<button class="boton-redireccionador" onclick="window.location.href = 'materias';">Tabla</button>












<center>
<input type="text" id="busqueda" onkeyup="buscarEstudiante()" placeholder="Buscar Materia..." autocomplete="off">
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
        $database = "laravel";

        $conn = new mysqli($servername, $username, $password, $database);

        // Verificar la conexión
        if ($conn->connect_error) {
            die("Conexión fallida: " . $conn->connect_error);
        }

        // Consulta SQL para obtener los datos de los estudiantes
        $sql = "SELECT * FROM materias";
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