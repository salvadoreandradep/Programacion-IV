<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            background-color: #242975;
            font-family: Arial, sans-serif;
            color: #fff;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .container {
       
    border-radius: 10px;
    background-color: #E6F0FF;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 80px;
            max-width: 400px;
            max-height: 500px;
            width: 100%;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #000;
        }

        label {
            display: block;
            margin-bottom: 5px;
             color: #000;
        }

        input[type="email"],
        input[type="password"],
        button {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: none;
            border-radius: 5px;
            font-size: 16px;
            color: #000;
        }

        button {
            background-color: #42a5f5;
            color: #000;
            cursor: pointer;
        }

        button:hover {
            background-color: #2196f3;
        }

        .error {
            color: red;
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Iniciar Sesión</h2>
    
    <form action="procesar_login.php" method="POST">
        <label for="correo">Correo Electrónico:</label>
        <input type="email" id="correo" name="correo" required>
        <label for="contrasena">Contraseña:</label>
        <input type="password" id="contrasena" name="contrasena" required>

        <?php
    if(isset($_GET['error'])){
        echo "<p class='error'>Correo electrónico o contraseña incorrectos.</p>";
    }
    ?>
        <button type="submit">Iniciar Sesión</button>
    </form>
</div>

</body>
</html>
