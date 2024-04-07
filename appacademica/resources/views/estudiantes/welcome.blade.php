<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Navegación</title>
    <style>
        /* Estilos básicos para el menú */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
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

    </style>
</head>
<body>

    <nav>
        <ul>
            <li><a href="/">Inicio</a></li>
            <li><a href="estudiante">Estudiantes</a></li>
            <li><a href="materia">Materia</a></li>
            <li><a href="/matricula">Matrícula</a></li>
            <li><a href="inscricion">Inscripción</a></li>
        </ul>
    </nav>

    

</body>
</html>