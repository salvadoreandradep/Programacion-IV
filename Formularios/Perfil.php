<?php
// Iniciar sesión (si aún no se ha iniciado)
session_start();

// Verificar si el usuario ha iniciado sesión
if (!isset($_SESSION['user_id'])) {
    // Si el usuario no ha iniciado sesión, redirigirlo al formulario de inicio de sesión
    header("Location: Upss.php");
    exit();
}
if (isset($_GET['logout'])) {
    // Verificar si se ha confirmado la salida
    if ($_GET['logout'] == 'confirm') {
        session_destroy(); // Destruir todas las variables de sesión
        header("Location: /Iniciar_Sesion.php"); // Redirigir al usuario a la página de inicio de sesión
        exit();
    } else {
        // Si no se ha confirmado, redirigir al usuario a esta misma página con un parámetro 'confirm'
        header("Location: {$_SERVER['PHP_SELF']}?logout=confirm");
        exit();
    }
  }

// Obtener el ID de usuario de la sesión
$user_id = $_SESSION['user_id'];

// Conexión a la base de datos (ajusta estos valores según tu configuración)
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "legalcc";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los detalles del usuario de la base de datos
$sql = "SELECT nombre, apellido, telefono, tipo, correo FROM usuarios WHERE id = $user_id";
$result = $conn->query($sql);

// Cerrar conexión
$conn->close();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    

    <style>
.container {
    max-width: 800px;
    margin: 0 auto;
    padding: 20px;
    font-family: Bahnschrift, Arial, sans-serif; /* Agregamos Bahnschrift como primera opción */
}

h1 {
    text-align: center;
    margin-bottom: 20px;
    color: #242975;
    font-family: Bahnschrift, Arial, sans-serif; /* Agregamos Bahnschrift como primera opción */
    font-size: 30px;
}

/* Estilos para la tarjeta de usuario */
.user-card {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-bottom: 20px;
    font-family: Bahnschrift, Arial, sans-serif; /* Agregamos Bahnschrift como primera opción */
}

.user-card p {
    margin-bottom: 10px;
    font-family: Bahnschrift, Arial, sans-serif; /* Agregamos Bahnschrift como primera opción */
}

.user-card p strong {
    font-weight: bold;
    margin-right: 5px;
    font-family: Bahnschrift, Arial, sans-serif; /* Agregamos Bahnschrift como primera opción */
}

.edit-profile-btn {
    display: block;
    width: 100%;
    max-width: 200px;
    margin: 20px auto;
    padding: 10px 20px;
    background-color: #242975;
    color: #fff;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 5px;
    transition: background-color 0.3s;
    font-family: Bahnschrift, Arial, sans-serif; /* Agregamos Bahnschrift como primera opción */
}

.edit-profile-btn:hover {
    background-color: #2D6653;
}

:root {
  --main-color: #242975; /* Cambio de color principal */
  --accent-color: #2D6653; /* Nuevo color de acento */
}

* {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}

body {
  font-family: 'Roboto', sans-serif;
  overflow: hidden;
}

.main-header {
  background: var(--main-color); /* Usar el color principal */
  width: 100%;
  height: 50px;
  display: flex; /* Alinear el contenido del encabezado */
  align-items: center; /* Alinear verticalmente */
  justify-content: space-between; /* Espacio entre los elementos */
  padding: 0 20px; /* Agregar un poco de espacio alrededor del contenido */
}

nav {
  position: absolute;
  left: 0;
  top: 50px;
  width: 200px;
  height: calc(100vh - 50px);
  background: var(--accent-color); /* Usar el nuevo color de acento */
  transform: translateX(-100%);
  transition: .4s ease;
  background-color: #E6F0FF;
}

.navigation li {
  list-style: none;
  width: 100%;
  border-bottom: 1px solid rgba(255, 255, 255, 0.5);

  
}

.navigation a {
  color: #242975; /* Cambiar el color del texto a blanco */
  background-color: #E6F0FF;
  display: block;
  line-height: 3.5;
  padding: 15px 20px; /* Aumentar el espacio alrededor del texto */
  text-decoration: none;
  transition: .4s ease;
  font-family: Bahnschrift;
}

.navigation a:hover {
  background-color: #242975; /* Agregar un color de fondo al pasar el cursor */
  color: #E6F0FF;
  font-family: Bahnschrift;
}

#btn-nav {
  display: none;
}

#btn-nav:checked ~ nav {
  transform: translateX(0);
}

.btn-nav {
  color: #fff; /* Cambiar el color del botón a blanco */
  font-size: 20px; /* Reducir un poco el tamaño del botón */
  cursor: pointer;
  padding: 10px 15px; /* Ajustar el espacio alrededor del botón */
  transition: .2s ease;
  background: transparent; /* Hacer el botón transparente */
  border: none; /* Eliminar el borde del botón */
  outline: none; /* Eliminar el contorno del botón al hacer clic */
}

.btn-nav:hover {
  background: rgba(255, 255, 255, 0.1); /* Cambiar el color de fondo al pasar el cursor */
}

.circle-container {
        width: 70px;
        height: 70px;
        border-radius: 50%; /* Esto hace que el borde sea redondeado, creando un círculo */
        overflow: hidden; /* Oculta cualquier contenido fuera del círculo */
        margin: 50px; /* Añade un margen de 10px alrededor del círculo */
        border: 2px solid #ccc; /* Agrega un borde para mayor claridad */
    }
    
    /* Estilo para la imagen */
    .circle-image {
        width: 100%; /* Ajusta el ancho de la imagen al 100% del contenedor */
        height: auto; /* Mantiene la proporción de la imagen */
    }
    h2{
      color: black;
      font-size: 10px;
      font-family: Bahnschrift;
      font-size: 10px;
    }


    </style>
</head>
<body>

<header class="main-header">
    <label for="btn-nav" class="btn-nav">&#9776;</label>
    <input type="checkbox" id="btn-nav">
    <nav>
      <ul class="navigation">
<center>
<a href="/Formularios/Perfil.php">
<div class="circle-container">

    <img class="circle-image" src="/recursos/profile.png" alt="Tu imagen">

   </div>
  </a>
        <li><a href="/Pagina_principal.php">Inicio</a></li>
        <li><a href="">Audiencias</a></li>
        <li><a href="#">Casos</a></li>
        <li><a href="?logout">Cerrar Sesion</a></li>
        <h2>LegalConnect</h2>
      </ul>
    </nav>
    </center>
  </header>
  <div class="container">
    <h1>Bienvenido a LegalConnect</h1>

    <div class="user-card">
        <h2>Datos de Usuario</h2>
        <?php if ($result->num_rows > 0): ?>
            <?php $row = $result->fetch_assoc(); ?>
            <p><strong>Nombre:</strong> <?php echo $row['nombre']; ?></p>
            <p><strong>Apellido:</strong> <?php echo $row['apellido']; ?></p>
            <p><strong>Correo Electrónico:</strong> <?php echo $row['correo']; ?></p>
            <p><strong>Teléfono:</strong> <?php echo $row['telefono']; ?></p>
            <p><strong>Tipo de Usuario:</strong> <?php echo $row['tipo']; ?></p>
        <?php else: ?>
            <p>Error: No se encontraron detalles del usuario.</p>
        <?php endif; ?>
    </div>

    <a href="/Formularios/Editar_Perfil.php" class="edit-profile-btn">Editar Perfil</a>
</div>



<script>

document.querySelector('a[href="?logout"]').addEventListener('click', function(event) {
    if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) {
        event.preventDefault(); // Cancelar el evento de clic si el usuario no confirma
    }
});
</script>
</body>
</html>


