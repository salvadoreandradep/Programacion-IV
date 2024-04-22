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
            border: 2px solid #1E90FF; /* Cambiado a azul más claro */
    border-radius: 10px;
    background-color: #E6F0FF;
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
    width: calc(50% - 15px); /* Ancho igual para todos los inputs y selects */
}


        .box button {
            font-family: Bahnschrift;
    padding: 10px 140px;
    font-size: 16px;
    border: 2px solid #E6F0FF; /* Cambiado a azul más claro */
    background-color: #1E90FF; /* Cambiado a azul más claro */
    border-radius: 10px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
        }

        .box button:hover {
            background-color: #242975;
    color: white; /* Cambiado a azul más claro */
        }
        
        .boton-registro {
    background-color: #007bff; /* Azul */
    color: white;
    padding: 10px 50px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }

  /* Estilo del botón al pasar el cursor por encima */
  .boton-registro:hover {
    background-color: #0056b3; /* Azul más oscuro */
  }
  .barra-negra {
    width: 80%;
    height: 2px;
    background-color:  #1E90FF;
    margin: 10px 0;
}

.letras{
    font-size: 12px;
    color: white;
}

.imagen-preview {
    width: 100px;
    height: 100px;
    border-radius: 50%; /* Esto hace que el contenedor sea circular */
    overflow: hidden; /* Oculta cualquier parte de la imagen que se desborde del contenedor */
    margin: auto; /* Centra el contenedor */
}

#imagen-preview {
    width: 100%;
    height: auto;
    display: block;
    margin: 0 auto;
    border-radius: 50%; /* Esto hace que la imagen sea circular */
}

        
    </style>
</head>
<body>
<div class="box">
        <h2>Registro de Usuario</h2>
        <form action="procesar_registro.php" method="POST">

       
        <div class="imagen-preview">
    <img id="imagen-preview" src="#" alt="Vista previa de la imagen">
        </div>
         <input type="file" id="imagen" name="imagen" accept="image/*" required>


            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                <div style="width: 48%;">
                    <label for="nombre">Nombre:</label>
                </div>
                    <input type="text" id="nombre" name="nombre" required>
                </div>
                <div style="width: 48%;">
                <div style="width: 48%;">
                    <label for="apellido">Apellido:</label>
                    </div>
                    <input type="text" id="apellido" name="apellido" required>
                </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                <div style="width: 48%;">
                    <label for="telefono">Teléfono:</label>
                    </div>
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
            <div style="width: 48%;">
            <label for="correo">Correo Electrónico:</label>
            </div>
            <input type="email" id="correo" name="correo" required>
            <div style="display: flex; justify-content: space-between;">
                <div style="width: 48%;">
                <div style="width: 48%;">
                    <label for="contrasena">Contraseña:</label>
                    </div>
                    <input type="password" id="contrasena" name="contrasena" required>
                </div>
                <div style="width: 48%;">
                <div style="width: 48%;">
                    <label for="confirmar_contrasena">Confirmar Contraseña:</label>
                    </div>
                    <input type="password" id="confirmar_contrasena" name="confirmar_contrasena" required>
                </div>
            </div>
            
            <div style="width: 80%;">
            <button type="submit" class="boton-registro">Registrarse</button>
            
            <p>¿Ya tienes una cuenta? <a href="#">Inicia sesión</a>
        </div>
      
        
       
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


    // Obtén el elemento de entrada de la imagen
var inputImagen = document.getElementById('imagen');

// Escucha el evento change en el elemento de entrada de la imagen
inputImagen.addEventListener('change', function(event) {
    // Obtén la imagen seleccionada
    var imagenSeleccionada = event.target.files[0];
    
    // Crea un objeto URL para la imagen seleccionada
    var urlImagen = URL.createObjectURL(imagenSeleccionada);
    
    // Actualiza el atributo src de la imagen de vista previa
    document.getElementById('imagen-preview').src = urlImagen;
});

</script>
</html>



