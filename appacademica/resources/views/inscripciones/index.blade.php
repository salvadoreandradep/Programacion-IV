<!DOCTYPE html>
<html>
<head>
    <title>Lista de Inscripciones</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
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

<table>
    <thead>
        <tr>
            <th>Estudiante</th>
            <th>Materia</th>
            <th>Ciclo</th>
            <th>Fecha de Inscripción</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($inscripciones as $inscripcion)
        <tr>
            <td>{{ $inscripcion->estudiante->nombre }}</td>
            <td>{{ $inscripcion->materia->nombre }}</td>
            <td>{{ $inscripcion->ciclo }}</td>
            <td>{{ $inscripcion->fecha_inscripcion }}</td>
            <td>
                <form action="{{ route('inscripciones.destroy', $inscripcion->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                <a href="{{ route('inscripciones.edit', $inscripcion->id) }}">Modificar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
