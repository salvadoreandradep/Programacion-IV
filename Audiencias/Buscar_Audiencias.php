<?php
session_start(); // Iniciar sesión

// Verificar si el usuario está autenticado
if (!isset($_SESSION['user_id'])) {
    // Redirigir al usuario a la página de inicio de sesión si no ha iniciado sesión
    header("Location: Upss.php"); 
    exit();
}

if (isset($_GET['logout'])) {
  // Verificar si se ha confirmado la salida
  if ($_GET['logout'] == 'confirm') {
      session_destroy(); // Destruir todas las variables de sesión
      header("Location: Cerrardo.php"); 
      exit();
  } else {
      // Si no se ha confirmado, redirigir al usuario a esta misma página con un parámetro 'confirm'
      header("Location: {$_SERVER['PHP_SELF']}?logout=confirm");
      exit();
  }
}

// Resto del código aquí (contenido de la página principal)
//___________________________________________HTML Normal_____________________________________________________________________________________
?>

<!DOCTYPE html>
<html>
<head>
    <title>Audiencias Registradas</title>


    <style>

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
    h1{
      color: W;
      font-size: 10px;
      font-family: Bahnschrift;
    }
    h2{
      color: white;
      font-size: 20px;
      font-family: Bahnschrift;
    }




    .content {
    margin-top: 50px; /* Espacio superior para separar del contenido anterior */
}

.table-container {
    margin: 0 auto;
    max-width: 800px; /* Ajusta el ancho máximo según sea necesario */
    height: 400px; /* Altura fija del contenedor */
        overflow-y: auto; /* Desplazamiento vertical */
    
    
}
.table-container2 {
    margin: 0 auto;
    max-width: 800px; /* Ajusta el ancho máximo según sea necesario */
    
    
}

.custom-table {
    display: flex;
    flex-direction: column;
    border: 1px solid #ddd;
    border-radius: 8px; /* Agregamos bordes redondeados */
    overflow: hidden; /* Para ocultar los bordes redondeados en las esquinas */
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Agregamos sombra */
}

.table-header,
.table-row {
    display: flex;
    
    
}

.table-cell {
    flex: 1;
    padding: 12px; /* Incrementamos el espacio de relleno */
    border-bottom: 1px solid #ddd;
    
}

.table-header {
    font-weight: bold;
    background-color: #f2f2f2;
}

.no-data {
    padding: 12px; /* Incrementamos el espacio de relleno */
    text-align: center; /* Centramos el texto */
}



    /* Estilos para el campo de búsqueda */
    #searchInput {
        padding: 10px;
        width: 700px; /* Ancho aumentado a 400px */
        border: 1px solid #ccc;
        border-radius: 5px;
        font-size: 16px;
        transition: border-color 0.3s ease;
        margin-top: 100px; /* Añadir margen superior */
        margin-block-end: 50px;
    }

    #searchInput:focus {
        outline: none;
        border-color: #66afe9;
    }

    /* Estilos para el placeholder del campo de búsqueda */
    ::placeholder {
        color: #aaa;
    }

    #botonArribaIzquierda {
            position: fixed;
            top: 20px;
            left: 20px;
            padding: 10px 20px;
            background-color: #007bff;
            color: white;
            text-decoration: none;
            border: 2px solid #007bff;
            border-radius: 5px;
            font-family: Arial, sans-serif;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
            margin-left: 1000px;
            margin-top: 50px;
        }

        #botonArribaIzquierda:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Estilos para el botón */
        .edit-button {
  display: inline-block;
  background-color: white; /* Color de fondo del botón */
  color: black; /* Color del texto del botón */
  padding: 10px 20px; /* Espaciado interno del botón */
  text-decoration: none; /* Eliminar subrayado del enlace */
  border: none; /* Quitar borde del botón */
  border-radius: 5px; /* Borde redondeado */
  cursor: pointer; /* Cambiar cursor al pasar sobre el botón */
}

/* Estilos para cuando el cursor pasa sobre el botón */
.edit-button:hover {
  background-color: #0056b3;
  color: white; /* Cambiar color de fondo cuando el cursor pasa sobre el botón */
}


    </style>
</head>
<body>

<a id="botonArribaIzquierda" href="/Audiencias/Principal_audiencias.php">Programar Audiencias</a>


<header class="main-header">

    <label for="btn-nav" class="btn-nav">&#9776;</label>
    <input type="checkbox" id="btn-nav">
    <h2>LegalConnect</h2>
    <nav>
      <ul class="navigation">
<center>
<a href="/Formularios/Perfil.php">
<div class="circle-container">

    <img class="circle-image" src="recursos/profile.png" alt="Tu imagen">

   </div>
   </a>
        <li><a href="/Pagina_principal.php">Inicio</a></li>
        <li><a href="/Audiencias/Buscar_Audiencias.php">Audiencias</a></li>
        <li><a href="/Casos/Agregar_Casos.php">Casos</a></li>
        <li><a href="?logout">Cerrar Sesion</a></li>
        <h1>LegalConnect v.1</h1>
      </ul>
    </nav>
    </center>
  </header>
<h2>Audiencias Registradas</h2>

<div class="table-container2">
<input type="text" id="searchInput" placeholder="Buscar...">
</div>
<div class="table-container">
    <center>
    
    </center>
    <div class="custom-table">
        <div class="table-header">
            <div class="table-cell">Título</div>
            <div class="table-cell">Referencia</div>
            <div class="table-cell">Modalidad</div>
            <div class="table-cell">Fecha</div>
            <div class="table-cell">Hora</div>
            <div class="table-cell">Imputado</div>
            <div class="table-cell">Víctima</div>
            <div class="table-cell">Delito</div>
            <div class="table-cell">Acciones</div>
        </div>
        <?php
    // Conexión a la base de datos MySQL
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "legalcc";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error de conexión a la base de datos: " . $conn->connect_error);
    }
// Eliminar registro si se ha enviado el ID
if(isset($_GET['id'])) {
  $id = $_GET['id'];
  $sql = "DELETE FROM audiencias WHERE id=$id";
  if ($conn->query($sql) === TRUE) {
    header("Location: Buscar_Audiencia.php");
  } else {
      echo "Error al eliminar el registro: " . $conn->error;
  }
}

    // Consulta para obtener todas las audiencias
    // Consulta para obtener todas las audiencias ordenadas por fecha de forma descendente
$sql = "SELECT * FROM audiencias ORDER BY fecha DESC";

    $result = $conn->query($sql);

    // Mostrar datos de cada audiencia
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          echo "<div class='table-row'>";
          echo "<div class='table-cell'>" . $row["titulo"] . "</a></div>";
          echo "<div class='table-cell'>" . $row["caso"] . "</div>";
          echo "<div class='table-cell'>" . $row["modalidad"] . "</div>";
          echo "<div class='table-cell'>" . $row["fecha"] . "</div>";
          echo "<div class='table-cell'>" . $row["hora"] . "</div>";
          echo "<div class='table-cell'>" . $row["imputado"] . "</div>";
          echo "<div class='table-cell'>" . $row["victima"] . "</div>";
          echo "<div class='table-cell'>" . $row["delito"] . "</div>";
          echo "<div class='table-cell'>";
          echo "<center><a class='edit-button' href='ver_audiencia.php?id=" . $row["id"] . "'><i class='fa fa-eye'></i> Ver </a></center>";
          echo "<a class='edit-button' href='#' onclick='eliminar(".$row["id"].")'><i class='fa fa-trash'></i> Eliminar</a>";
                    echo "</div>";
          echo "</div>";
        }
    } else {
        echo "<center>No hay audiencias registradas.</center>";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</table>
    </div>
</div>


<script>
    // Función para filtrar las filas de la tabla
    function filterTable() {
        var input, filter, table, tr, td, i, j, txtValue;
        input = document.getElementById("searchInput");
        filter = input.value.toUpperCase();
        table = document.querySelector(".custom-table");
        tr = table.querySelectorAll(".table-row");

        // Iterar sobre todas las filas y ocultar aquellas que no coincidan con la búsqueda
        for (i = 0; i < tr.length; i++) {
            td = tr[i].querySelectorAll(".table-cell");
            for (j = 0; j < td.length; j++) {
                txtValue = td[j].textContent || td[j].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    tr[i].style.display = "";
                    break; // Mostrar la fila si alguna celda coincide con la búsqueda
                } else {
                    tr[i].style.display = "none"; // Ocultar la fila si no hay coincidencia
                }
            }
        }
    }

    // Evento de escucha para el cambio en el campo de búsqueda
    document.getElementById("searchInput").addEventListener("input", filterTable);

        function eliminar(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este registro?")) {
                // Enviar una petición AJAX para eliminar el registro
                var xhr = new XMLHttpRequest();
                xhr.onreadystatechange = function() {
                    if (xhr.readyState == 4 && xhr.status == 200) {
                        // Recargar la página después de eliminar el registro
                        window.location.reload();
                    }
                };
                xhr.open("GET", "?id=" + id, true);
                xhr.send();
            }
        }


        document.querySelector('a[href="?logout"]').addEventListener('click', function(event) {
    if (!confirm('¿Estás seguro de que deseas cerrar sesión?')) {
        event.preventDefault(); // Cancelar el evento de clic si el usuario no confirma
    }
});

function verMas() {
        // Hacer scroll hacia abajo para mostrar más elementos
        window.scrollBy(0, window.innerHeight);
    }
    </script>

</body>
</html>

