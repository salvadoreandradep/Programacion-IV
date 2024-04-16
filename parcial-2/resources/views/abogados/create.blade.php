

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>abogados</title>
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
            <li><a href="">Abogado</a></li>
         
        </ul>
    </nav>
    <center>
        <h1>Registrar abogado</h1>
    </center>

    <form method="POST" action="/abogados">
    @csrf
    <label>Código de abogado:</label>
    <input type="text" name="codigo" autocomplete="off" required><br>
    <label>Nombre de abogado:</label>
    <input type="text" name="nombre" autocomplete="off" required><br>
    <label>Correo Electronico:</label>
    <input type="text" name="direccion" autocomplete="off" required><br>
    <label>municipio:</label>
    <input type="text" name="municipio" autocomplete="off" required><br>
    <label>Departamento:</label>
    <input type="text" name="departamento" autocomplete="off" required><br>
    <label>Teléfono:</label>
    <input type="text" name="telefono" autocomplete="off" required><br>
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento"><br>
    <label>Sexo:</label>
    <select name="sexo">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select><br>
    <button type="submit">Guardar</button>
</form>
<center>
<button class="boton-redireccionador" onclick="window.location.href = 'abogados/create';">Tabla</button>

</center>


</body>
</html>

</html>

