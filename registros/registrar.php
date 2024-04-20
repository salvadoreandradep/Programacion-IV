<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            background-color: #242975;
            font-family: Bahnschrift;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .box {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 80px;
            max-width: 800px;
            max-height: 500px;
            width: 100%;
        }

        .box h2 {
            margin-top: 0;
            text-align: center;
        }

        .box form {
            display: flex;
            flex-direction: column;
        }

        .box label {
            margin-bottom: 10px;
            font-weight: bold;
        }

        .box input,
        .box select {
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 5px;
            border: 1px solid #ccc;
            outline: none;
        }

        .box button {
            padding: 10px 20px;
            background-color: #1E90FF;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
            outline: none;
        }

        .box button:hover {
            background-color: #007bff;
        }
        
    </style>
</head>
<body>
<div class="box">
        <h2>Registro de Usuario</h2>
        <form action="procesar_registro.php" method="POST">
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="nombre">Nombre:</label>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div style="width: 48%;">
                    <label for="apellido">Apellido:</label>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="telefono">Teléfono:</label>
                    <input type="tel" id="telefono" name="telefono" required>
                </div>
                <div style="width: 48%;">
                <div style="width: 48%;">
                    <label for="tipo">Oficio:</label>
                    </div>
                    <select id="tipo" name="tipo" required>
                        <option value="" disabled selected hidden></option>
                        <option value="abogado">Abogado</option>
                        <option value="juez">Juez</option>
                        <option value="fiscal">Fiscal</option>
                    </select>
                </div>
            </div>
            <label for="correo">Correo Electrónico:</label>
            <input type="email" id="correo" name="correo" required>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                    <label for="contrasena">Contraseña:</label>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
                <div style="width: 48%;">
                    <label for="confirmar_contrasena">Confirmar Contraseña:</label>
                    <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
                </div>
            </div>
            <button type="submit">Registrarse</button>
        </form>
    </div>
</body>
<script>
    document.getElementById("tipo").addEventListener("change", function() {
        if (this.value === "") {
            this.setCustomValidity("Por favor, selecciona un oficio válido.");
        } else {
            this.setCustomValidity("");
        }
    });

    document.getElementById("contrasena").addEventListener("input", function() {
        var confirmarContrasenaInput = document.getElementById("confirmar_contrasena");
        if (this.value !== confirmarContrasenaInput.value) {
            confirmarContrasenaInput.setCustomValidity("Las contraseñas no coinciden");
        } else {
            confirmarContrasenaInput.setCustomValidity("");
        }
    });

    document.getElementById("confirmar_contrasena").addEventListener("input", function() {
        var contrasenaInput = document.getElementById("contrasena");
        if (this.value !== contrasenaInput.value) {
            this.setCustomValidity("Las contraseñas no coinciden");
        } else {
            this.setCustomValidity("");
        }
    });
</script>
</html>



