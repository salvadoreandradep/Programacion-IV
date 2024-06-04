<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
</head>
<body>
    <form action="login.php" method="post">
        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>
        <p id="error-msg" class="error"></p>

        <button type="submit">Iniciar Sesión</button>
    </form>
</body>

<script>
        const urlParams = new URLSearchParams(window.location.search);
        const error = urlParams.get('error');

        if(error) {
            const errorMessage = document.getElementById('error-msg');
            errorMessage.textContent = 'Correo electrónico o contraseña incorrectos.';

            setTimeout(function() {
                errorMessage.textContent = '';
            }, 5000);
        }
    </script>
</html>
