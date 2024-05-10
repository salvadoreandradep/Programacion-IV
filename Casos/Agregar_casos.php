<h1>Formulario de Caso</h1>
    <form action="guardar_caso.php" method="post" enctype="multipart/form-data">
        <label for="referencia">Referencia de Caso:</label>
        <input type="text" name="referencia" id="referencia" required><br><br>
        
        <label for="documento">Documento:</label>
        <input type="file" name="documento" id="documento" required><br><br>
        
        <label for="victima">Víctima:</label>
        <input type="text" name="victima" id="victima" required><br><br>
        
        <label for="inputado">Inputado:</label>
        <input type="text" name="inputado" id="inputado" required><br><br>
        
        <label for="delito">Delito:</label>
        <input type="text" name="delito" id="delito" required><br><br>
        
        <label for="evidencia">Evidencia:</label>
        <input type="text" name="evidencia" id="evidencia" required><br><br>
        
        <button type="submit">Guardar Caso</button>
    </form>
