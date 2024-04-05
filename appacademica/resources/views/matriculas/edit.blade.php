<form method="POST" action="{{ route('matriculas.update', $matricula->id) }}">
    @csrf
    @method('PUT')
    <label>Código:</label>
    <input type="text" name="codigo" value="{{ $matricula->codigo }}"><br>
    <label>Estudiante:</label>
    <input type="text" name="estudiante_id" value="{{ $matricula->estudiante_id }}"><br>
    <label>Ciclo:</label>
    <input type="text" name="ciclo" value="{{ $matricula->ciclo }}"><br>
    <label>Fecha de Matrícula:</label>
    <input type="date" name="fecha_matricula" value="{{ $matricula->fecha_matricula }}"><br>
    <button type="submit">Actualizar</button>
</form>
