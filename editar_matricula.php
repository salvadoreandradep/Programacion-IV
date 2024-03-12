<?php
// Verificar si se ha proporcionado un ID válido
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $id = $_GET['id'];

    // Aquí deberías redirigir al usuario a un formulario de edición prellenado con los datos de la matrícula identificada por $id
    // Por ejemplo, podrías redirigir a una página llamada "formulario_edicion.php?id=$id"
    header("Location: formulario_edicion.php?id=$id");
    exit;
} else {
    // Si no se proporcionó un ID válido, redirige al usuario a la página de lista de matrículas
    header("Location: lista_matriculas.php");
    exit;
}
?>
