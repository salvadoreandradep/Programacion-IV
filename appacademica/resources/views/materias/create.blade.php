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
            <li><a href="inicio">Inicio</a></li>
            <li><a href="estudiante">Estudiantes</a></li>
            <li><a href="">Materia</a></li>
            <li><a href="matricula">Matrícula</a></li>
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



<center>
<button class="boton-redireccionador" onclick="window.location.href = '/materias';">Tabla</button>
</center>



