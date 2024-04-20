<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesion</title>
</head>
<body>
    <style>
        
        body {
            background-color: #242975;
        }
        
    </style>
    <?php
    if(isset($_GET['error'])){
        echo "<p style='color: red;'>Correo electrónico o contraseña incorrectos.</p>";
    }
    ?>
<h2>Iniciar Sesión</h2>
    <form action="procesar_login.php" method="POST">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required>
        <br>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>


</body>
</html>