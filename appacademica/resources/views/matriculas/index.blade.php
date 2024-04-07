
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
    background-color: #2c3e50; /* Cambia el color de fondo según tu preferencia */
    color: #fff;
    text-align: center;
    padding: 20px 0; /* Incrementé el padding para un aspecto más espaciado */
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
    font-size: 18px; /* Aumenté el tamaño del texto */
    font-weight: bold; /* Hice el texto más audaz */
    padding: 10px; /* Agregué un espacio interno para mejorar la apariencia */
    transition: box-shadow 0.3s ease; /* Añadí una transición para suavizar el efecto */
}

nav ul li a:hover {
    box-shadow: 0 0 20px rgba(255, 255, 255, 0.7); /* Aumenté el radio de desenfoque y la opacidad */
    border-radius: 5px; /* Añadí bordes redondeados para un aspecto más suave */
    padding: 15px; /* Agregué relleno adicional al pasar el mouse */
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

div {
            width: 90%;
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

    <div>
        <center>
    <input type="text" id="busqueda" onkeyup="buscarEstudiante()" placeholder="Buscar Materia..." autocomplete="off">
        </center>
<table id="tablaEstudiantes">
    <thead>
        <tr>
            <th>Código</th>
            <th>Estudiante</th>
            <th>Ciclo</th>
            <th>Fecha de Matrícula</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($matriculas as $matricula)
        <tr>
            <td>{{ $matricula->codigo }}</td>
            <td>{{ $matricula->estudiante->nombre }}</td>
            <td>{{ $matricula->ciclo }}</td>
            <td>{{ $matricula->fecha_matricula }}</td>
            <td>
                <form action="{{ route('matriculas.destroy', $matricula->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                <a href="{{ route('matriculas.edit', $matricula->id) }}">Modificar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
    </div>
<script>
        function buscarEstudiante() {
            var input, filtro, tabla, tr, td, i, j, txtValor;
            input = document.getElementById("busqueda");
            filtro = input.value.toUpperCase();
            tabla = document.getElementById("tablaEstudiantes");
            tr = tabla.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                td = tr[i].getElementsByTagName("td");
                for (j = 0; j < td.length; j++) {
                    txtValor = td[j].textContent || td[j].innerText;
                    if (txtValor.toUpperCase().indexOf(filtro) > -1) {
                        tr[i].style.display = "";
                        break;
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }

        function eliminarEstudiante(btn) {
            var fila = btn.parentNode.parentNode;
            fila.parentNode.removeChild(fila);
        }
    </script>