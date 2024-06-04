<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
</head>
<body>
    <form action="register.php" method="post" enctype="multipart/form-data">
        <label for="fotografia">Fotografía:</label>
        <input type="file" name="fotografia" id="fotografia" required><br><br>

        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required><br><br>

        <label for="telefono">Teléfono:</label>
        <input type="text" name="telefono" id="telefono" required><br><br>

        <label for="profesion">Profesión:</label>
        <select name="profesion" id="profesion" required>
            <option value="Juez">Juez</option>
            <option value="Abogado">Abogado</option>
            <option value="Fiscal">Fiscal</option>
        </select><br><br>

        <label for="email">Correo Electrónico:</label>
        <input type="email" name="email" id="email" required><br><br>

        <label for="password">Contraseña:</label>
        <input type="password" name="password" id="password" required><br><br>

        <label for="confirm_password">Confirmar Contraseña:</label>
        <input type="password" name="confirm_password" id="confirm_password" required><br><br>

        <button type="submit">Registrar</button>
    </form>
</body>
</html>
