<!-- resources/views/materias/index.blade.php -->

<table>
    <thead>
        <tr>
            <th>Código</th>
            <th>Nombre</th>
            <th>Créditos</th>
            <th>Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach($materias as $materia)
        <tr>
            <td>{{ $materia->codigo }}</td>
            <td>{{ $materia->nombre }}</td>
            <td>{{ $materia->creditos }}</td>
            <td>
                <form action="{{ route('materias.destroy', $materia->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Eliminar</button>
                </form>
                <a href="{{ route('materias.edit', $materia->id) }}">Modificar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
