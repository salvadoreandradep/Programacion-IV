

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
        
      div{
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
<div>
    <form method="POST" action="/estudiantes">
    @csrf
    <label>Código:</label>
    <input type="text" name="codigo" autocomplete="off" required ><br>
    <label>Nombre:</label>
    <input type="text" name="nombre" autocomplete="off" required ><br>
    <label>Dirección:</label>
    <input type="text" name="direccion" autocomplete="off" required ><br>
    <label>Municipio:</label>
    <input type="text" name="municipio" autocomplete="off" required><br>
    <label>Departamento:</label>
    <input type="text" name="departamento" autocomplete="off" required><br>
    <label>Teléfono:</label>
    <input type="text" name="telefono" autocomplete="off" required><br>
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" autocomplete="off" required><br>
    <label>Sexo:</label>
    <select name="sexo">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select><br>
    <button type="submit">Guardar</button>
</form>
</div>
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
    <tbody id="tablaEstudiantes" >
        @foreach($estudiantes as $estudiante)
        <tr>
            <td>{{ $estudiante->codigo }}</td>
            <td>{{ $estudiante->nombre }}</td>
            <td>{{ $estudiante->direccion }}</td>
            <td>{{ $estudiante->municipio }}</td>
            <td>{{ $estudiante->departamento }}</td>
            <td>{{ $estudiante->telefono }}</td>
            <td>{{ $estudiante->fecha_nacimiento }}</td>
            <td>{{ $estudiante->sexo }}</td>
            <td>
                <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                <a href="{{ route('estudiantes.edit', $estudiante->id) }}">Modificar</a>
            </td>
        </tr>
        @endforeach
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
            xhttp.open("GET", "eliminar_estudiante.php?id=" + id, true);
            xhttp.send();
        }
    }

    // Función para redirigir a la página de modificación de estudiante
    function modificarEstudiante(id) {
        // Redirigir a una página de edición con el ID del estudiante
        window.location.href = "editar_estudiante.php?id=" + id;
    }
</script>

</html>



