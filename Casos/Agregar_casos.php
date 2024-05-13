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
      header("Location: Cerrardo.php"); // Redirigir al usuario a la página de inicio de sesión
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

<?php
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

// Función para generar la referencia automática
function generarReferencia() {
    $fechaHora = date('Y-m-d-H-i-s');
    $existencia = rand(1000, 9999); // Número de existencia aleatorio
    return $fechaHora . "-" . $existencia;
}

// Procesamiento del formulario cuando se envía
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $referencia = generarReferencia();
    $victima = $_POST['victima'];
    $imputado = $_POST['imputado'];
    $tipoDelito = $_POST['tipo_delito'];

    // Insertar caso en la base de datos
    $sql = "INSERT INTO casos (referencia, victima, imputado, tipo_delito) VALUES ('$referencia', '$victima', '$imputado', '$tipoDelito')";

    if ($conn->query($sql) === TRUE) {
        echo "Caso agregado correctamente.";

        // Procesar y guardar archivos de evidencia
        if(isset($_FILES['evidencia'])){
            $errors= array();
            foreach($_FILES['evidencia']['tmp_name'] as $key => $tmp_name ){
                $file_name = $_FILES['evidencia']['name'][$key];
                $file_size =$_FILES['evidencia']['size'][$key];
                $file_tmp =$_FILES['evidencia']['tmp_name'][$key];
                $file_type=$_FILES['evidencia']['type'][$key];
                if($file_size > 1000){
                    $errors[]='El tamaño del archivo debe ser menor a 2 MB';
                }      
                $desired_dir="uploads"; // Directorio donde se guardarán los archivos
                if(empty($errors)==true){
                    if(is_dir($desired_dir)==false){
                        mkdir("$desired_dir", 0700); // Crea el directorio si no existe
                    }
                    if(is_dir("$desired_dir/".$file_name)==false){
                        move_uploaded_file($file_tmp,"$desired_dir/".$file_name); // Mueve el archivo a la ubicación deseada
                    }else{
                        $new_dir="$desired_dir/".$file_name.time();
                        rename($file_tmp,$new_dir);                
                    }
                    // Insertar información de la evidencia en la base de datos
                    $sql_evidencia = "INSERT INTO evidencias (caso_referencia, nombre_archivo, tipo_archivo, ubicacion_archivo) VALUES ('$referencia', '$file_name', '$file_type', '$desired_dir/$file_name')";
                    if ($conn->query($sql_evidencia) === TRUE) {
                        echo "Evidencia subida correctamente.";
                    } else {
                        echo "Error al subir la evidencia: " . $conn->error;
                    }
                }else{
                    print_r($errors);
                }
            }
        }
        
        // Guardar documento PDF o DOC
        if(isset($_FILES['documento'])){
            $file_name = $_FILES['documento']['name'];
            $file_size = $_FILES['documento']['size'];
            $file_tmp = $_FILES['documento']['tmp_name'];
            $file_type = $_FILES['documento']['type'];
            $desired_dir = "documentos"; // Directorio donde se guardarán los documentos

            // Verificar el tipo de archivo (PDF o DOC)
            if ($file_type == 'application/pdf' || $file_type == 'application/docx') {
                if (move_uploaded_file($file_tmp, "$desired_dir/" . $file_name)) {
                    // Insertar información del documento en la base de datos
                    $sql_documento = "INSERT INTO documentos (caso_referencia, nombre_archivo, tipo_archivo, ubicacion_archivo) VALUES ('$referencia', '$file_name', '$file_type', '$desired_dir/$file_name')";
                    if ($conn->query($sql_documento) === TRUE) {
                        header("Location: /casos/buscar_casos.php"); 
                        exit();
                    } else {
                        echo "Error al subir el documento: " . $conn->error;
                    }
                } else {
                    echo "Error al subir el documento.";
                }
            } else {
                echo "Tipo de archivo no admitido. Se permiten solo archivos PDF o DOC.";
            }
        }
        
    } else {
        echo "Error al agregar el caso: " . $conn->error;
    }
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Agregar Caso</title>
</head>
<body>
    <h2>Agregar Caso</h2>
    <form method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
        <label for="victima">Victima:</label><br>
        <input type="text" id="victima" name="victima"><br>
        <label for="imputado">Imputado:</label><br>
        <input type="text" id="imputado" name="imputado"><br>
        <label for="tipo_delito">Tipo de Delito:</label><br>
        <input type="text" id="tipo_delito" name="tipo_delito"><br>
        <div id="evidencia-container">
            <label>Evidencia:</label><br>
            <input type="file" name="evidencia[]"><br>
        </div>
        <button type="button" onclick="agregarCampoEvidencia()">Agregar otro archivo de evidencia</button>
        <br>
        <label for="documento">Documento (PDF o DOC):</label><br>
        <input type="file" name="documento"><br>
        <br>
        <input type="submit" value="Agregar Caso">
    </form>

    <script>
        function agregarCampoEvidencia() {
            var container = document.getElementById("evidencia-container");
            var input = document.createElement("input");
            input.type = "file";
            input.name = "evidencia[]";
            container.appendChild(document.createElement("br"));
            container.appendChild(input);
        }
    </script>
</body>
</html>



