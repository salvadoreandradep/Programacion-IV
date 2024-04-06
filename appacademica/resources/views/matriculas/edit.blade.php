<form method="POST" action="{{ route('matriculas.update', $matricula->id) }}">
    @csrf
    @method('PUT')
    <label>Código:</label>
    <input type="text" name="codigo" value="{{ $matricula->codigo }}"><br>
    <label>Estudiante:</label>
    <select name="estudiante_id">
        <?php
        $conexion = new mysqli("localhost", "root", "", "laravel");
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        $query = "SELECT id, nombre FROM estudiantes";
        $result = $conexion->query($query);

        while ($row = $result->fetch_assoc()) {
            echo "<option value='" . $row['id'] . "'>" . $row['nombre'] . "</option>";
        }

        $conexion->close();
        ?>
    </select><br>


    <label>Ciclo:</label>
    <input type="text" name="ciclo" value="{{ $matricula->ciclo }}"><br>
    <label>Fecha de Matrícula:</label>
    <input type="date" name="fecha_matricula" value="{{ $matricula->fecha_matricula }}"><br>
    <button type="submit">Actualizar</button>
</form>