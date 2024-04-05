<form method="POST" action="/estudiantes">
    @csrf
    <label>Código:</label>
    <input type="text" name="codigo"><br>
    <label>Nombre:</label>
    <input type="text" name="nombre"><br>
    <label>Dirección:</label>
    <input type="text" name="direccion"><br>
    <label>Municipio:</label>
    <input type="text" name="municipio"><br>
    <label>Departamento:</label>
    <input type="text" name="departamento"><br>
    <label>Teléfono:</label>
    <input type="text" name="telefono"><br>
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento"><br>
    <label>Sexo:</label>
    <select name="sexo">
        <option value="M">Masculino</option>
        <option value="F">Femenino</option>
    </select><br>
    <button type="submit">Guardar</button>
</form>
