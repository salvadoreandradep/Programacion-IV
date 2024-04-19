<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Botones en una Caja</title>
    <style>
        body {
            background-color: #242975;
        }

.container {
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100vh;
}

.box {
    padding: 20px;
    border: 2px solid #1E90FF; /* Cambiado a azul más claro */
    border-radius: 10px;
    background-color: #E6F0FF; /* Cambiado a un tono de azul más claro */
    box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
  
    max-width: 400px; /* Ejemplo: máximo ancho de 400px */
    max-height: 400px; /* Ejemplo: máximo alto de 400px */
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Distribuir los elementos de manera uniforme */
}

#boton-arriba {
    padding: 10px 150px;
    font-size: 16px;
    border: 2px solid #E6F0FF; /* Cambiado a azul más claro */
    background-color: #1E90FF; /* Cambiado a azul más claro */
    border-radius: 50px;
    color: white;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

#boton-abajo {
    padding: 10px 145px;
    font-size: 16px;
    border: 2px solid #E6F0FF; /* Cambiado a azul más claro */
    background-color: #E6F0FF; /* Cambiado a azul más claro */
    border-radius: 50px;
    color: #1E90FF;
    cursor: pointer;
    transition: background-color 0.3s, color 0.3s;
}

#boton-arriba:hover{
    background-color: #242975;
    color: white; /* Cambiado a azul más claro */
}

#boton-abajo:hover {
    background-color: #1E90FF;
    color: white; /* Cambiado a azul más claro */
}

.barra-negra {
    width: 80%;
    height: 2px;
    background-color:  #1E90FF;
    margin: 10px 0;
}

    </style>
</head>
<body>
    
    <div class="container">
        <div class="box">
            <center>
            <img src="recursos\inicio.png" alt="Descripción de la imagen" width="150" height="150">
            <div style="flex-grow: 1;"></div> <!-- Espacio para empujar los botones hacia abajo -->
            <button id="boton-arriba">Registrarse</button>
            <div class="barra-negra"></div> <!-- Barra negra entre los botones -->
            <button id="boton-abajo">Iniciar Sesion</button>
        </div>
    </div>
</body>
</html>


