<?php
// Datos de conexión a la base de datos MySQL
$servername = "localhost"; // Cambia esto si tu servidor de base de datos tiene un nombre diferente
$username = "root"; // Cambia esto por el nombre de usuario de tu base de datos
$password = ""; // Cambia esto por la contraseña de tu base de datos
$database = "appacademica"; // Cambia esto por el nombre de tu base de datos

// Crear conexión
$conn = new mysqli($servername, $username, $password, $database);

// Comprobar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Consultar la base de datos para obtener los datos
$sql = "SELECT * FROM datos";
$result = $conn->query($sql);

// Mostrar los datos en una tabla HTML
if ($result->num_rows > 0) {
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Código</th><th>Nombre</th><th>Créditos</th></tr>";
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row["id"]. "</td>";
        echo "<td>" . $row["codigo"]. "</td>";
        echo "<td>" . $row["nombre"]. "</td>";
        echo "<td>" . $row["creditos"]. "</td>";
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No se encontraron datos en la base de datos.";
}

// Cerrar la conexión
$conn->close();
?>
