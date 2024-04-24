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

// Procesar el formulario cuando se envíe
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Recopilar datos del formulario
    $titulo = $_POST["titulo"];
    $caso = $_POST["caso"];
    $modalidad = $_POST["modalidad"];
    $fecha = $_POST["fecha"];
    $hora = $_POST["hora"];
    $imputado = $_POST["imputado"];
    $victima = $_POST["victima"];
    $delito = $_POST["delito"];
    $descripcion = $_POST["descripcion"];
    $juzgado = $_POST["juzgado"];
    $abogado = $_POST["abogado"];
    $fiscal = $_POST["fiscal"];
    $sala = $_POST["sala"];
    $juez_suplente = $_POST["juez_suplente"];
    
    // Insertar datos en la base de datos
    $sql = "INSERT INTO audiencias (titulo, caso, modalidad, fecha, hora, imputado, victima, delito, descripcion, juzgado, abogado, fiscal, sala, juez_suplente)
    VALUES ('$titulo', '$caso', '$modalidad', '$fecha', '$hora', '$imputado', '$victima', '$delito', '$descripcion', '$juzgado', '$abogado', '$fiscal', '$sala', '$juez_suplente')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Audiencia registrada correctamente";
    } else {
        echo "Error al registrar la audiencia: " . $conn->error;
    }
    
    // Cerrar la conexión
    $conn->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registro de Audiencias</title>

    <style>
 label {
        font-weight: bold;
    }

    input[type="text"],
    input[type="date"],
    input[type="time"],
    select,
    textarea {
        width: 100%;
        padding: 8px;
        margin-top: 5px;
        margin-bottom: 15px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    
    /* Estilos para el botón */
    input[type="submit"] {
        background-color: #4caf50;
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

</style>

</head>
<body>





<h2>Registro de Audiencias</h2>

<div style="display: flex; justify-content: space-between; width: 100%;">
    <div style="width: 48%;">
        <form method="post" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <label>Tipo de Audiencia:</label><br>
            <input type="text" name="titulo" required><br><br>
        </div>
    <div style="width: 48%;">
            <label>Seleccionar Caso:</label><br>
            <select name="caso">
                <option value="Caso 1">Caso 1</option>
                <option value="Caso 2">Caso 2</option>
                <option value="Caso 3">Caso 3</option>
            </select><br><br>
        </div>
     </div>    

<div style="display: flex; justify-content: space-between; width: 100%;">
    <div style="width: 48%;">
            <label>Modalidad de Audiencias:</label><br>
            <select name="modalidad">
                <option value="Presencial">Presencial</option>
                <option value="Virtual">Virtual</option>
            </select><br><br>
        </div>
    <div style="width: 48%;">     
            <label>Seleccionar Fecha:</label><br>
            <input type="date" name="fecha" required><br><br>
        </div>
    <div style="width: 48%;"> 
            <label>Seleccionar Hora:</label><br>
            <input type="time" name="hora" required><br><br>
        </div>
</div>       

<div style="display: flex; justify-content: space-between; width: 100%;">
    <div style="width: 48%;">

            <label>Nombre del Imputado:</label><br>
            <input type="text" name="imputado" required><br><br>
            </div>
    <div style="width: 48%;">       
            <label>Nombre de la Víctima:</label><br>
            <input type="text" name="victima" required><br><br>
            </div>
    <div style="width: 48%;">       
            <label>Seleccionar Tipo de Delito:</label><br>
            <select name="delito">
                <option value="Homicidio">Homicidio</option>
                <option value="Violación">Violación</option>
                <option value="Hurto">Hurto</option>
            </select><br><br>
            </div>
</div>        
<div style="display: flex; justify-content: space-between; width: 100%;">
    <div style="width: 48%;">   
            <label>Descripción de la Audiencia:</label><br>
            <textarea name="descripcion" rows="4" cols="50"></textarea><br><br>
            </div>
</div>  
<div style="display: flex; justify-content: space-between; width: 100%;">
    <div style="width: 48%;">           
            <label>Seleccionar Juzgado:</label><br>
            <select name="juzgado">
                <option value="Juzgado 1">Juzgado 1</option>
                <option value="Juzgado 2">Juzgado 2</option>
                <option value="Juzgado 3">Juzgado 3</option>
            </select><br><br>
        </div>
    <div style="width: 48%;">           
            <label>Seleccionar Abogado:</label><br>
            <select name="abogado">
                <option value="Abogado 1">Abogado 1</option>
                <option value="Abogado 2">Abogado 2</option>
                <option value="Abogado 3">Abogado 3</option>
            </select><br><br>
        </div>
    <div style="width: 48%;">           
            <label>Seleccionar Fiscal:</label><br>
            <select name="fiscal">
                <option value="Fiscal 1">Fiscal 1</option>
                <option value="Fiscal 2">Fiscal 2</option>
                <option value="Fiscal 3">Fiscal 3</option>
            </select><br><br>
        </div>
</div>     

<div style="display: flex; justify-content: space-between; width: 100%;">
    <div style="width: 48%;"> 
            <label>Sala de Audiencias:</label><br>
            <select name="sala">
                <option value="Sala 1">Sala 1</option>
                <option value="Sala 2">Sala 2</option>
                <option value="Sala 3">Sala 3</option>
            </select><br><br>
        </div>
<div style="width: 48%;">               
            <label>Seleccionar Juez:</label><br>
            <select name="juez_suplente">
                <option value="Suplente 1">Juez 1</option>
                <option value="Suplente 2">Juez 2</option>
                <option value="Suplente 3">Juez 3</option>
            </select><br><br>
        </div>
</div>           
            <input type="submit" value="Registrar Audiencia">
        </form>


        
</body>
</html>


