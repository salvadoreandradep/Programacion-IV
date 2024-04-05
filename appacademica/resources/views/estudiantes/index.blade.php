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
            <li><a href="/">Inicio</a></li>
            <li><a href="/estudiante">Estudiantes</a></li>
            <li><a href="/materia">Materia</a></li>
            <li><a href="/matricula">Matrícula</a></li>
            <li><a href="inscripcion.php">Inscripción</a></li>
        </ul>
    </nav>
<center>
    <input type="text" id="busqueda" placeholder="Buscar estudiantes..." autocomplete="off">
    </center>
<table  >
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


     
    }

    // Función para redirigir a la página de modificación de estudiante
    function modificarEstudiante(id) {
        
    }
</script>