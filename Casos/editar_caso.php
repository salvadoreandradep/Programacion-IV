<?php
// Verificar si se proporcionó una referencia de caso válida en la URL
if (isset($_GET['referencia'])) {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "legalcc";

    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar conexión
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Obtener la referencia del caso desde la URL
    $referencia = $_GET['referencia'];

    // Consulta para obtener los detalles del caso
    $sql = "SELECT * FROM casos WHERE referencia = '$referencia'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>
        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Caso</title>
            <style>
                body {
                    font-family: Arial, sans-serif;
                }
                .container {
                    max-width: 800px;
                    margin: 0 auto;
                    padding: 20px;
                }
                .container form {
                    margin-bottom: 20px;
                }
                .card {
                    border: 1px solid #ccc;
                    border-radius: 5px;
                    padding: 20px;
                    margin-bottom: 20px;
                }
                .card h3 {
                    margin-top: 0;
                }
                .evidencia img {
                    max-width: 100%;
                    height: auto;
                    margin-bottom: 10px;
                }
                .documento iframe {
                    width: 100%;
                    height: 500px;
                    border: none;
                }
                input[type="text"], input[type="file"] {
                    width: calc(100% - 20px);
                    padding: 10px;
                    margin-bottom: 10px;
                }
                input[type="submit"], .btn {
                    background-color: #4CAF50;
                    color: white;
                    padding: 10px 20px;
                    border: none;
                    border-radius: 5px;
                    cursor: pointer;
                }
                .btn {
                    display: inline-block;
                    margin-right: 10px;
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

    .select-container label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }
        .select-container select {
            width: 100%;
            padding: 10px;
            border-radius: 4px;
            border: 1px solid #ccc;
            font-size: 16px;
            box-sizing: border-box;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            background: url('data:image/svg+xml;charset=US-ASCII,%3Csvg%20xmlns%3D%22http%3A//www.w3.org/2000/svg%22%20viewBox%3D%220%200%204%205%22%3E%3Cpath%20fill%3D%22%23007bff%22%20d%3D%22M2%200L0%202h4L2%200zM2%205L0%203h4L2%205z%22/%3E%3C/svg%3E') no-repeat right 10px center;
            background-size: 12px;
        }
        .select-container select:focus {
            outline: none;
            border-color: #007bff;
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
            margin-left: 100px;
            margin-top: 80px;
        }

        #botonArribaIzquierda:hover {
            background-color: #0056b3;
            color: #fff;
        }
        </style>
        </head>
        <body>



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
    <li><a href="#">Inicio</a></li>
    <li><a href="/Audiencias/Buscar_Audiencias.php">Audiencias</a></li>
    <li><a href="/Casos/Agregar_Casos.php">Casos</a></li>
    <li><a href="?logout">Cerrar Sesion</a></li>
    <h1>LegalConnect v.1</h1>
  </ul>
</nav>
</center>
</header>


<a id="botonArribaIzquierda" href="/Casos/Buscar_Casos.php">Tabla de casos</a>

        
            <div class="container">
                <h2>Editar Caso</h2>
                <form action="actualizar_caso.php" method="post">
                    <input type="hidden" name="referencia" value="<?php echo $row['referencia']; ?>">
                    <label for="victima">Víctima:</label><br>
                    <input type="text" id="victima" name="victima" value="<?php echo $row['victima']; ?>"><br>
                    <label for="imputado">Imputado:</label><br>
                    <input type="text" id="imputado" name="imputado" value="<?php echo $row['imputado']; ?>"><br>
                    
                    <div class="select-container">
                    <label for="tipo_delito">Tipo de Delito:</label><br>
                    <select id="tipo_delito" name="tipo_delito">
                        <option value="robo" <?php if($row['tipo_delito'] == 'robo') echo 'selected'; ?>>Robo</option>
                        <option value="asalto" <?php if($row['tipo_delito'] == 'asalto') echo 'selected'; ?>>Asalto</option>
                        <option value="fraude" <?php if($row['tipo_delito'] == 'fraude') echo 'selected'; ?>>Fraude</option>
                        <option value="vandalismo" <?php if($row['tipo_delito'] == 'vandalismo') echo 'selected'; ?>>Vandalismo</option>
                        <option value="homicidio" <?php if($row['tipo_delito'] == 'homicidio') echo 'selected'; ?>>Homicidio</option>
                    </select><br>
                    </div>


                    
                    <input type="submit" value="Guardar Cambios">
                </form>
                <div class="card">
                    <h3>Evidencias</h3>
                    <form action="agregar_evidencia.php" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="referencia" value="<?php echo $row['referencia']; ?>">
                        <input type="file" name="evidencia[]" multiple>
                        <input type="submit" value="Agregar Evidencia" class="btn">
                    </form>
                    <?php
                    // Consulta para obtener las evidencias asociadas al caso
                    $sql_evidencia = "SELECT * FROM evidencias WHERE caso_referencia = '$referencia'";
                    $result_evidencia = $conn->query($sql_evidencia);
                    if ($result_evidencia->num_rows > 0) {
                        echo "<div class='evidencia'>";
                        while($row_evidencia = $result_evidencia->fetch_assoc()) {
                            echo "<div>";
                            echo "<img src='" . $row_evidencia["ubicacion_archivo"] . "' alt='Evidencia'>";
                            echo "<a href='eliminar_evidencia.php?id=" . $row_evidencia["id"] . "'>Eliminar</a>";
                            echo "</div>";
                        }
                        echo "</div>";
                    } else {
                        echo "<p>No hay evidencia asociada a este caso.</p>";
                    }
                    ?>
                </div>
                <div class="card">
                    <h3>Documento</h3>
                <form action="actualizar_documento.php" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="referencia" value="<?php echo $row['referencia']; ?>">
                    <input type="file" name="documento">
                    <input type="submit" value="Actualizar Documento" class="btn">
                </form>

                </div>
            </div>
        </body>
        </html>
        <?php
    } else {
        echo "No se encontraron detalles para la referencia de caso proporcionada.";
    }

    $conn->close();
} else {
    echo "No se proporcionó una referencia de caso válida.";
}
?>
