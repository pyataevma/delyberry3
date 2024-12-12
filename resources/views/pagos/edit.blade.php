<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delyberry</title>
</head>
<body> 
    <h1>Edit Pago</h1>
    <form  action="{{ route('pagos.update', $pago->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <label for="metodo">Metodo_pago:</label>
        <input type="text" id="metodo" name="metodo" required>
        <br>

        <label for="estado">Estado:</label>
        <input type="text" id="estado" name="estado" required>
        <br>

        <label for="monto">Monto:</label>
        <textarea id="monto" name="monto"></textarea>
        <br>

        <button type="submit">Guardar</button>
        <a href="{{ route('pagos.index') }}">Cancel</a>
    </form>

</body>
</html>
