<!-- resources/views/materias/edit.blade.php -->

<form method="POST" action="{{ route('materias.update', $materia->id) }}">
    @csrf
    @method('PUT')
    <label>Código:</label>
    <input type="text" name="codigo" value="{{ $materia->codigo }}"><br>
    <label>Nombre:</label>
    <input type="text" name="nombre" value="{{ $materia->nombre }}"><br>
    <label>Créditos:</label>
    <input type="number" name="creditos" value="{{ $materia->creditos }}"><br>
    <button type="submit">Actualizar</button>
</form>
