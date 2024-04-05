<form method="POST" action="{{ route('estudiantes.update', $estudiante->id) }}">
    @csrf
    @method('PUT')
    <label>Código:</label>
    <input type="text" name="codigo" value="{{ $estudiante->codigo }}"><br>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $estudiante->nombre }}"><br>
    <label>Dirección:</label>
    <input type="text" name="direccion" value="{{ $estudiante->direccion }}"><br>
    <label>Municipio:</label>
    <input type="text" name="municipio" value="{{ $estudiante->municipio }}"><br>
    <label>Departamento:</label>
    <input type="text" name="departamento" value="{{ $estudiante->departamento }}"><br>
    <label>Teléfono:</label>
    <input type="text" name="telefono" value="{{ $estudiante->telefono }}"><br>
    <label>Fecha de Nacimiento:</label>
    <input type="date" name="fecha_nacimiento" value="{{ $estudiante->fecha_nacimiento }}"><br>
    <label>Sexo:</label>
    <select name="sexo">
        <option value="M" {{ $estudiante->sexo == 'M' ? 'selected' : '' }}>Masculino</option>
        <option value="F" {{ $estudiante->sexo == 'F' ? 'selected' : '' }}>Femenino</option>
    </select><br>
    <button type="submit">Actualizar</button>
</form>
